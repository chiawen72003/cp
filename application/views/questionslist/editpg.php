<!-- 左選單 end -->
<div id="wrapper">
<ul>
	<li><a class="button" title="回上一頁" onclick="history.back();">回上一頁</a></li>	
</ul>
<table class="title">
	<tr>
		<td>新增試題</td>
	</tr>
</table>    
<div class="accordionButton">  
	<div class="mode_wrap">
		<div class="mode_item">  
			<table class="mode_tb">
				<tr>
					<td style="background-color:#E9F0DE;" >
					建立試題
					</td>
					<td style="background-color:#E9F0DE;">
					</td>
					<td style="background-color:#E4DEE9;">
					選擇模組
					</td>
					<td style="background-color:#B2DDE6;">
					模組排序
					</td>
					<td style="background-color:#FDE9D9;">
					選擇受測班級
					</td>
					<td style="background-color:#F7F6F2;">
					語意分析字詞設定
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>	
<div class="accordionButton">
<?php 
$attributes = array( 'id' => 'Form1');
$hidden = array();
if(isset($num)){
	$hidden['num'] = $num;
}
if(isset($offsetDsc)){
	$hidden['offsetDsc'] = $offsetDsc;
}
echo form_open_multipart('questionslist/setQuestionsData', $attributes,$hidden);
?>
	<table class="list_item">
		<tr id="tr_title" >
			<td style="background-color:#E9F0DE;" >
			<div class="mode_item">
				<table>
					<tr>
						<td><p>題目標題:<input type="text" class="put_2" name="title_dsc" id="title_dsc" value="<?php echo isset($dataList['title_dsc'])?$dataList['title_dsc']:'';?>"></p></td>
					</tr>
					<tr>
						<td><p>題目註解:<textarea name="remark_dsc" class="tex_2" id="remark_dsc" ><?php echo isset($dataList['remark_dsc'])?$dataList['remark_dsc']:'';?></textarea></p></td>
					</tr>
					<tr>
						<td><p>題目類型:<select name="is_practice" class="put_2" id="is_practice" >
							<option value="1" <?php echo (isset($dataList['is_practice']) and $dataList['is_practice']=='1')?'selected':'';?>>練習題</option>
							<option value="0" <?php echo (isset($dataList['is_practice']) and $dataList['is_practice']=='0')?'selected':'';?>>測驗題</option>
							</select></p>
						</td>
					</tr>
					<tr>
						<td>
							<p>題目圖示:<?php
if(isset($dataList['img_path'])){
?>
<img src="<?php echo $base;?>upIMG/questions/<?php echo $dataList['img_path'];?>" width="50px">
<?php	
}
?>			
			<input type="file" name="img_path" class="put_2" id="img_path" value="" accept="image/*"></p>
						</td>
					</tr>
					<tr>
						<td><p>測驗起始日期:<input type="text" class="datepicker" name="begin_date" id="begin_date" value="<?php echo isset($dataList['begin_date'])?$dataList['begin_date']:'';?>"></p></td>
					</tr>
					<tr>
						<td><p>測驗結束日期:<input type="text" class="datepicker"  name="end_date" id="end_date" value="<?php echo isset($dataList['end_date'])?$dataList['end_date']:'';?>"></p></td>
					</tr>
					<tr>
						<td><span><a class="button" title="下一步驟" onclick="goNext()">下一步驟</a></span></td>
					</tr>
				</table>
			</div>	
			</td>
		</tr>
		<tr id="tr_1" style="display:none;">
			<td style="background-color:#E4DEE9;">
			<div class="mode_item">
			<table>
				<tr class="title">
					<td>模組1 閱讀出題模組</td>
					<td>
					<input type="radio" name="m1" id="m1_null" value="" checked><label for="m1_null">不選用</label>
					
<?php 
if( isset($modelsData['m1']) and count($modelsData['m1']) > 0){
	foreach( $modelsData['m1'] as $key => $tempArray){
	$dsc = '';
	if(isset($dataList['modules_dsc'][0]) and $dataList['modules_dsc'][0] == $tempArray['num']){
	$dsc = 'checked';
	}
?>
					</td>
					<td>
					<input type="radio" name="m1" id="m1_<?php echo $key;?>" value="<?php echo $tempArray['num'];?>" <?php echo $dsc;?>><label for="m1_<?php echo $key;?>"><?php echo $tempArray['title_dsc'];?></label>
<?php		
	}
}
?>					
					
					</td>
				</tr>
				<tr class="title">
					<td>模組2 搶25遊戲模組</td>
					<td>
						<input type="radio" name="m2" id="m2_null" value="" checked><label for="m2_null">不選用</label>

<?php 
if( isset($modelsData['m2']) and count($modelsData['m2']) > 0){
	foreach( $modelsData['m2'] as $key => $tempArray){
	$dsc = '';
	if(isset($dataList['modules_dsc'][1]) and $dataList['modules_dsc'][1] == $tempArray['num']){
	$dsc = 'checked';
	}		
?>
					</td>
					<td>
						<input type="radio" name="m2" id="m2_<?php echo $key;?>" value="<?php echo $tempArray['num'];?>"  <?php echo $dsc;?>><label for="m2_<?php echo $key;?>"><?php echo $tempArray['title_dsc'];?></label>
<?php		
	}
}
?>						
					</td>
				</tr>
				<tr class="title">
					<td>模組3 思樂冰製作遊戲模組</td>
					<td>	
						<input type="radio" name="m3" id="m3_null" value="" checked><label for="m3_null">不選用</label>

<?php 
if( isset($modelsData['m3']) and count($modelsData['m3']) > 0){
	foreach( $modelsData['m3'] as $key => $tempArray){
	$dsc = '';
	if(isset($dataList['modules_dsc'][2]) and $dataList['modules_dsc'][2] == $tempArray['num']){
	$dsc = 'checked';
	}		
		
?>
					</td>
					<td>
						<input type="radio" name="m3" id="m3_<?php echo $key;?>" value="<?php echo $tempArray['num'];?>"  <?php echo $dsc;?>><label for="m3_<?php echo $key;?>"><?php echo $tempArray['title_dsc'];?></label>
<?php		
	}
}
?>						
					</td>
				</tr>
				<tr class="title">
					<td>模組4 最佳銷售組合遊戲模組</td>
					<td>
						<input type="radio" name="m4" id="m4_null" value="" checked><label for="m4_null">不選用</label>
					
<?php 
if( isset($modelsData['m4']) and count($modelsData['m4']) > 0){
	foreach( $modelsData['m4'] as $key => $tempArray){
	$dsc = '';
	if(isset($dataList['modules_dsc'][3]) and $dataList['modules_dsc'][3] == $tempArray['num']){
	$dsc = 'checked';
	}		
		
?>
					</td>
					<td>
						<input type="radio" name="m4" id="m4_<?php echo $key;?>" value="<?php echo $tempArray['num'];?>"  <?php echo $dsc;?>><label for="m4_<?php echo $key;?>"><?php echo $tempArray['title_dsc'];?></label>
<?php		
	}
}
?>						
					</td>
				</tr>
				<tr class="title">
					<td>模組5 數學渡河邏輯遊戲模組</td>
					<td>
						<input type="radio" name="m5" id="m5_null" value="" checked><label for="m5_null">不選用</label>
<?php 
if( isset($modelsData['m5']) and count($modelsData['m5']) > 0){
	foreach( $modelsData['m5'] as $key => $tempArray){
	$dsc = '';
	if(isset($dataList['modules_dsc'][4]) and $dataList['modules_dsc'][4] == $tempArray['num']){
	$dsc = 'checked';
	}		
		
?>
					</td>
					<td>
						<input type="radio" name="m5" id="m5_<?php echo $key;?>" value="<?php echo $tempArray['num'];?>" <?php echo $dsc;?>><label for="m5_<?php echo $key;?>"><?php echo $tempArray['title_dsc'];?></label>
<?php		
	}
}
?>					
					</td>
				</tr>
			</table>
			<br>
			<a class="button" title="上一步驟" onclick="changeArea('tr_title')">上一步驟</a>
			<a class="button" title="下一步驟" onclick="chkSwModels()">下一步驟</a>
			</td>
		</tr>
		<tr id="tr_2" style="display:none;">
			<td style="background-color:#B2DDE6;">
			<div class="mode_item">
			<ul id="moduleOrder" >
<?php
if( isset($dataList['order_dsc']) ){
	foreach($dataList['order_dsc'] as $value){
?>
<li >模組<?php echo $value;?> <input type="hidden" name="module_order[]" value="<?php echo $value;?>"> </li>
<?php
	}
}else{
?>
	<li >模組1 <input type="hidden" name="module_order[]" value="1"> </li>
	<li >模組2 <input type="hidden" name="module_order[]" value="2"> </li>
	<li >模組3 <input type="hidden" name="module_order[]" value="3"> </li>
	<li >模組4 <input type="hidden" name="module_order[]" value="4"> </li>
	<li >模組5 <input type="hidden" name="module_order[]" value="5"> </li>
<?php	
}
?>
			</ul>
			</div>
			<br/>
				<a class="button" title="上一步驟" onclick="changeArea('tr_1')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_3')">下一步驟</a>
			</td>
		</tr>
		<tr id="tr_3" style="display:none;">
		<td style="background-color:#FDE9D9;">
		<div class="mode_item">
			<ul>
<?php
	foreach($classData as $key => $tempArray){
		if(isset($dataList['swClass']) and in_array($tempArray['num'],$dataList['swClass'])){
			$dsc = 'checked';
		}else{
			$dsc = '';
		}		
?>	
			<li class="li_1"><input type="checkbox" name="swClass[]" value="<?php echo $tempArray['num'];?>" id="swClass_<?php echo $key;?>" <?php echo $dsc;?>><label for="swClass_<?php echo $key;?>"><?php echo $tempArray['year_dsc'];?>年<?php echo $tempArray['class_dsc'];?>班</label></li>
<?php		
	}
?>
			</ul>
		</div>	
			<a class="button" title="上一步驟" onclick="changeArea('tr_2')">上一步驟</a>
			<a class="button" title="下一步驟" onclick="changeArea('tr_4')">下一步驟</a>		
		</td>
		</tr>
	<tr id="tr_4" style="display:none;">
		<td style="background-color:#F7F6F2;">
		<div class="mode_item">
			<p><button type="button" onclick="add_analysis()">新增字詞</button><p>
			<ul id="analysis_area">
<?php
if(isset($dataList['analysis_words']) and count($dataList['analysis_words']) > 0){
	foreach($dataList['analysis_words'] as $key => $value){
?>
<li id="li_<?php echo $key+1;?>">
	<input type="button" value="移除" onclick="$('#li_<?php echo $key+1;?>').remove();">
	<input type="text" name="analysis_words[]" value="<?php echo $value;?>">
</li>
<?php		
	}
}
?>					
			</ul>
		</div>		
			<a class="button" title="上一步驟" onclick="changeArea('tr_3')">上一步驟</a>
			<a class="button" title="存檔" onclick="chkValue()">存檔</a>		
		</td>
		</tr>			
	</table>
<?php 
echo form_close();
?>	
</div>
</div>

<script>
var dataIsSend = false;
var tr_array = ['tr_title','tr_1','tr_2','tr_3','tr_4'];

function chkValue(){
	var isGo = true;
	var err_dsc = '';
	var ck_array =  ["title_dsc","remark_dsc"];
	var err_array =  ["請輸入題目標題!!","請輸入題目註解!!"];
	var type_array =  ["text","text"];

	for(var x=0;x< ck_array.length;x++){
		switch(type_array[x]){
			case "text":
			case "file":
				if($('#'+ck_array[x]).val() ==''){
				err_dsc = err_dsc + err_array[x] +'\r\n';
				isGo = false;
				}
			break;
			case "number":
				if(!$.isNumeric($('#'+ck_array[x]).val()) ){					
					err_dsc = err_dsc + err_array[x] +'\r\n';					
					isGo = false;				
				}else{	
					if( $('#'+ck_array[x]).val() < 1 || $('#'+ck_array[x]).val() > 99 ){
							err_dsc = err_dsc + "排序值需介於1~99!!\r\n";
							isGo = false;
					}
				}	
			break;
		}
	}
	
<?php
if(!isset($dataList['img_path'])){
?>
if($('#img_path').val() ==''){
	err_dsc = err_dsc + '請選擇題目圖示!!\r\n';
	isGo = false;
}
<?php	
}
?>	
	
	if(isGo && !dataIsSend){
		$('#Form1').submit();
	}
	
	if(err_dsc !=''){
		alert(err_dsc);
	}
}

function goNext(){
	var isGo = true;
	var err_dsc = '';
	var ck_array =  ["title_dsc","remark_dsc"];
	var err_array =  ["請輸入題目標題!!","請輸入題目註解!!"];
	var type_array =  ["text","text"];

	for(var x=0;x< ck_array.length;x++){
		switch(type_array[x]){
			case "text":
			case "file":
				if($('#'+ck_array[x]).val() ==''){
				err_dsc = err_dsc + err_array[x] +'\r\n';
				isGo = false;
				}
			break;
			case "number":
				if(!$.isNumeric($('#'+ck_array[x]).val()) ){					
					err_dsc = err_dsc + err_array[x] +'\r\n';					
					isGo = false;				
				}else{	
					if( $('#'+ck_array[x]).val() < 1 || $('#'+ck_array[x]).val() > 99 ){
							err_dsc = err_dsc + "排序值需介於1~99!!\r\n";
							isGo = false;
					}
				}	
			break;
			case "inputArray":
				if($('input[name="'+ck_array[x]+'"]').length == 0){
					err_dsc = err_dsc + err_array[x] +'\r\n';
					isGo = false;
				}
			break;
		}
	}
<?php
if(!isset($dataList['img_path'])){
?>
if($('#img_path').val() ==''){
	err_dsc = err_dsc + '請選擇題目圖示!!\r\n';
	isGo = false;
}
<?php	
}
?>	
	//測驗題需設定日期
	if( $('#is_practice').val() == '0'){
		if($('#begin_date').val() == ''){
			err_dsc = err_dsc + '請選擇測驗起始日期!!\r\n';
			isGo = false;
		}
		if($('#end_date').val() == ''){
			err_dsc = err_dsc + '請選擇測驗結束日期!!\r\n';
			isGo = false;
		}
	}

	console.log($('#is_practice').val());
	if(isGo){
		changeArea('tr_1');
	}
	
	if(err_dsc !=''){
		alert(err_dsc);
	}
}

//檢查模組是否都有選擇
function chkSwModels(){
	var err_dsc = '';
	if($('input[name="m1"]:checked').length == 0){
		err_dsc = err_dsc + '請選擇模組1的模組!!\r\n';
	}
	if($('input[name="m2"]:checked').length == 0){
		err_dsc = err_dsc + '請選擇模組2 的模組!!\r\n';
	}
	if($('input[name="m3"]:checked').length == 0){
		err_dsc = err_dsc + '請選擇模組3 的模組!!\r\n';
	}
	if($('input[name="m4"]:checked').length == 0){
		err_dsc = err_dsc + '請選擇模組4 的模組!!\r\n';
	}
	if($('input[name="m5"]:checked').length == 0){
		err_dsc = err_dsc + '請選擇模組5 的模組!!\r\n';
	}
	
	if( err_dsc == ''){
		changeArea('tr_2');
	}else{
		alert(err_dsc);
	}
}

function changeArea(getID){
	for(var x=0;x < tr_array.length;x++){
		if(getID == tr_array[x]){
			$('#'+tr_array[x]).show();
		}else{
			$('#'+tr_array[x]).hide();
		}
	}
}

$(function() {
	//設定模組排序
    $( "#moduleOrder" ).sortable();
	$( ".datepicker" ).datepicker({dateFormat:"yy-mm-dd",});
});


//語意分析字詞設定
var optionIndex=<?php echo (isset($dataList['analysis_words']) and count($dataList['analysis_words']) > 0)?count($dataList['analysis_words']):'0';?>;
function add_analysis(){
	var dsc = '<li id="li_'+optionIndex+'"><input type="button" value="移除" onclick="$(\'#li_'+optionIndex+'\').remove();"><input type="text" name="analysis_words[]" value=""></li>';
	$('#analysis_area').append(dsc);	
	optionIndex++;
}
</script>