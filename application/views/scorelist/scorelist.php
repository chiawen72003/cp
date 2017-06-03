<!-- 左選單 end -->
<div id="wrapper">
<ul>
	<li><a class="button" title="回上一頁" onclick="history.back();">回上一頁</a></li>	
	<li><a class="button" title="儲存" onclick="chkValue();">儲存</a></li>	
</ul>    
  
<table class="title">
	<tr>
		<td width="50%">記錄區</td>
		<td width="12%">能力指標</td>
		<td>積分區</td>
	</tr>
</table>
<?php 
$attributes = array( 'id' => 'Form1');
$hidden = array();
if(isset($num)){
	$hidden['num'] = $num;
}
if(isset($offsetDsc)){
	$hidden['offsetDsc'] = $offsetDsc;
}
echo form_open_multipart('scorelist/saveScoreData', $attributes,$hidden);
?>
<div class="accordionButton">
	<div class="score_tch">
	<!-- 資訊區域 -->	
		<div class="tch_1">
			<table>
				<tr>	
					<th>編號</th>
					<th>功能</thd>
					<th>對象</th>
					<th>事件</th>
					<th>內容</th>
					<th>資訊</th>
				</tr>
<?php
if(isset($scoreValues['decordData']) and count($scoreValues['decordData']) > 0){
	foreach($scoreValues['decordData'] as $key => $tmepArray){
?>
				<tr>	
					<td><?php echo $key+1;?></td>
					<td><input type="button" value="=>" onclick="addBtn('<?php echo $key;?>')"></td>
					<td><?php echo $tmepArray['userType'];?></td>
					<td><?php echo $tmepArray['event'];?></td>
					<td><?php echo $tmepArray['data'];?></td>
					<td><?php echo $tmepArray['title'];?></td>
				</tr>
<?php
	}
}
?>
			</table>
		</div>
		<!-- 資訊區域 End -->
		<div class="tch_2">
			<div>
				<ul>
					<li>
						<select onchange="chgType()" id="swType">
						<option value="1">A1</option>
						<option value="2">A2</option>
						<option value="3">A3</option>
						<option value="4">B1</option>
						<option value="5">B2</option>
						<option value="6">B3</option>
						<option value="7">C1</option>
						<option value="8">C2</option>
						<option value="9">C3</option>
						<option value="10">D1</option>
						<option value="11">D2</option>
						<option value="12">D3</option>
						</select>
					</li>
				</ul>	
			</div>
		</div>
		<div class="tch_3">
			<div class="tch_title">
				<ul>
					<li><input type="button" value="新增得分區" onclick="add_div()"></li>
				</ul>
			</div>
			<!-- 能力指標 區域 -->
<?php
	for($aa=0,$zz=1;$zz<13;$zz++,$aa++){
?>
<div <?php echo ($aa==0)?'':'display:none;';?>" id="div_Power_<?php echo $zz;?>">
<?php
if( isset($scoreValues['swData'][$aa]['numbers']) and count($scoreValues['swData'][$aa]['numbers']) > 0){
	$numbers = 	$scoreValues['swData'][$aa]['numbers'];
	$swObjs =  $scoreValues['swData'][$aa]['swObj'];
	for($x=0;$x<count($numbers);$x++){
?>
<ul style="border-width:2px;border-style:double;" id="div_<?php echo $zz;?>_<?php echo $x;?>" onclick="chgFocus('div_<?php echo $zz;?>_<?php echo $x;?>','<?php echo $x;?>')" subid="checkUL">得分:<input type="text" value="<?php echo isset($numbers[$x])?$numbers[$x]:'0';?>" name="number_<?php echo $zz;?>[]" onchange="chkIsNum(this)" id="totalNumber_<?php echo $zz;?>">分
<?php
	if(isset($swObjs[$x]) and count($swObjs[$x]) > 0){
		foreach($swObjs[$x] as $key => $value){
?>
	<li id="span_<?php echo $indexDsc;?>">
		<input type="button" value="刪除" onclick="del('span_<?php echo $indexDsc;?>')">
		編號<?php echo $value+1;?>:<?php echo isset($scoreValues['decordData'][$value]['data'])?$scoreValues['decordData'][$value]['data']:''; ?>
		<input type="hidden" value="<?php echo $value; ?>" name="scores_<?php echo $zz;?>_<?php echo $x;?>[]">
	</li>
<?php	
				$indexDsc++;
				}
			}
?>
</ul>
<?php
	$divArray[$zz]++;
	}
	
}

?>
</div>
<?php		
	}
?>

			<!-- 能力指標 區域 End -->
		</div>
	</div>	
</div>
<input type="hidden" name="max_index_1" id="max_index_1" value="0">
<input type="hidden" name="max_index_2" id="max_index_2" value="0">
<input type="hidden" name="max_index_3" id="max_index_3" value="0">
<input type="hidden" name="max_index_4" id="max_index_4" value="0">
<input type="hidden" name="max_index_5" id="max_index_5" value="0">
<input type="hidden" name="max_index_6" id="max_index_6" value="0">
<input type="hidden" name="max_index_7" id="max_index_7" value="0">
<input type="hidden" name="max_index_8" id="max_index_8" value="0">
<input type="hidden" name="max_index_9" id="max_index_9" value="0">
<input type="hidden" name="max_index_10" id="max_index_10" value="0">
<input type="hidden" name="max_index_11" id="max_index_11" value="0">
<input type="hidden" name="max_index_12" id="max_index_12" value="0">

<?php 
echo form_close();
?>	

<script>
var scoreList = <?php echo (isset($scoreValues['recordData']) and $scoreValues['recordData'] > '' )?$scoreValues['recordData']:'[]';?>;

function chgType(){
	var getType = $('#swType').val();
	for(var x=1;x<13;x++){
		if(getType == x){
			$('#div_Power_'+x).show();
		}else{
			$('#div_Power_'+x).hide();
		}
	}
}

var indexDsc = <?php echo isset($indexDsc)?$indexDsc:'0'; ?>;
var nowFocuesDiv = 'div_1_0';//預設要插入div的id
var nowIndex = '0';

function addBtn(getIndex){
	var getType = $('#swType').val();
	var maxlength = scoreList.length;
	for(var x=0;x<maxlength;x++){
		if(getIndex == x){
		var dsc = '<li id="span_'+indexDsc+'" ><input type="button" value="刪除" onclick="del(\'span_'+indexDsc+'\')">';
			dsc  = dsc + '編號' + (x+1) + ':'+scoreList[x]['data'];
			dsc  = dsc + '<input type="hidden" value="'+ x +'" name="scores_'+getType+'_'+nowIndex+'[]" subtype="'+scoreList[x]['event']+'" subValue="'+scoreList[x]['data']+'" >';
			dsc  = dsc + '</li>';
			$('#'+nowFocuesDiv).append(dsc);
			indexDsc++;
			break;
		}
	}
}

function del(getID){
	$('#'+getID).remove();
}


var dataIsSend = false;
function chkValue(){
	var canGo = true;
	$('ul[subid="checkUL"]').each(function(){
		var children = $(this).children('li');
		var count = children.length;
		
		if( count == 0){
			canGo = false;
		}
	});
	
	for(var x=1;x<13;x++){
		$('#max_index_'+x).val(max_index_array[x]);
	}
	
	if(!dataIsSend && canGo){
		$('#Form1').submit();
	}
	
	if(!canGo){
		alert('請檢查所有的得分區，是否都有選擇項目!!');
	}
}

function chkIsNum(getObj){
	var id = getObj.id;
	var getValue = $('#'+id).val();
	var ex = /^\d+$/;
	if (!ex.test(getValue)) {
		$('#'+id).val('0');
		alert('輸入值非數字，請重新設定!!');
	}else if( getValue < 0){
		$('#'+id).val('0');
		alert('輸入值必須大於0，請重新設定!!');
	}
}


//辭意判斷
var free_speech_type_dsc = '<?php echo isset($scoreValues['analysis_words'])?$scoreValues['analysis_words']:'';?>';//要比對的詞彙

function chk_speech_data(getName,getID){
	var get_data = '';
	$('input[name="'+getName+'[]"]').each(function(){
		if($(this).attr( 'subtype' ) == '對話'){
			if(get_data == ''){
				get_data = $(this).attr( 'subValue' );
			}else{
				get_data = get_data + '<tw>' +  $(this).attr( 'subValue' );
				
			}
		}		
	});
if(get_data > ''){	
	console.log(get_data);
	$.ajax({
		url: '<?php echo base_url('match_comparison/get_lsa_data.php'); ?>',
		data: {getData:get_data,dscArray:free_speech_type_dsc},
		type: "POST",
		error: function(xhr) {
			//setTimeout('chk_speech_data("'+get_data+'")', 2000);
			console.log(xhr);
		},
		success: function(response) {
			$('#'+getID).val(response);
		}
	});
}

}

//新增一個得分區域
var max_index_array = [0,<?php echo $divArray[1];?>,<?php echo $divArray[2];?>,<?php echo $divArray[3];?>,<?php echo $divArray[4];?>,<?php echo $divArray[5];?>,<?php echo $divArray[6];?>,<?php echo $divArray[7];?>,<?php echo $divArray[8];?>,<?php echo $divArray[9];?>,<?php echo $divArray[10];?>,<?php echo $divArray[11];?>,<?php echo $divArray[12];?>];//因為從1開始計算，所以多1個0。

function add_div(){
	var getType = $('#swType').val();
	var dsc = '<ul style="border-width:2px;border-style:double;" id="div_'+getType+'_'+ max_index_array[getType] +'" onclick="chgFocus(\'div_'+getType+'_'+ max_index_array[getType] +'\',\''+ max_index_array[getType] +'\')" subid="checkUL" >得分:<input type="text" value="0" name="number_'+getType+'[]" onchange="chkIsNum(this)" id="totalNumber_'+getType+'">分</ul>';
	nowFocuesDiv = 'div_'+getType+'_'+ max_index_array[getType];
	$("#div_Power_"+getType).append(dsc);
	nowIndex = max_index_array[getType];
	max_index_array[getType] = max_index_array[getType] + 1;
}

function chgFocus(getID,getIndex){
	nowFocuesDiv = getID;
	nowIndex = getIndex;
}
</script>
