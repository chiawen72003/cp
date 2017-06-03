<!-- 左選單 end -->
<div id="wrapper">
<ul>
	<li><a class="button" title="回上一頁" onclick="history.back();">回上一頁</a></li>	
	<li><a class="button" title="存檔" onclick="chkValue()">存檔</a></li>
</ul>    
  
<table class="title">
	<tr>
		<td>
		編輯題目標題<br>
		編輯題目註解<br>
		選擇題目圖示<br>
		</td>
		<td>
		選擇模組<br>
		</td>
	</tr>
</table>
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
echo form_open_multipart('rootcontroller/setQuestionsData', $attributes,$hidden);
?>

	<table class="list_item">
		<tr id="tr_1" >
			<td >
			題目標題：<input type="text" name="title_dsc" id="title_dsc" value="<?php echo isset($dataList['title_dsc'])?$dataList['title_dsc']:'';?>"><br>
			題目註解：<textarea name="remark_dsc" id="remark_dsc" ><?php echo isset($dataList['remark_dsc'])?$dataList['remark_dsc']:'';?></textarea><br>
			題目圖示：
<?php
if(isset($dataList['img_path'])){
?>
<img src="<?php echo $base;?>upIMG/questions/<?php echo $dataList['img_path'];?>" width="50px">
<?php	
}
?>			
			<input type="file" name="img_path" id="img_path" value="" accept="image/*"><br>
			<a class="button" title="下一步驟" onclick="goNext()">下一步驟</a>			
			</td>
		</tr>
		<tr id="tr_2" style="display:none;">
			<td>
			<ul id="modules_area">選用的模組: <a class="button" title="新增模組" onclick="addModules()">新增模組</a>
<?php
if(isset($dataList['modules_dsc'])){
	foreach($dataList['modules_dsc'] as $key => $value){
?>
<li id="li_<?php echo  $key; ?>">
	<select name="swModules[]" >
		<option value="1" <?php echo ($value == '1')?'selected':'';?>>閱讀出題模組</option>
		<option value="2" <?php echo ($value == '2')?'selected':'';?>>搶25遊戲模組</option>
		<option value="3" <?php echo ($value == '3')?'selected':'';?>>思樂冰製作遊戲模組</option>
		<option value="4" <?php echo ($value == '4')?'selected':'';?>>最佳銷售組合遊戲模組</option>
		<option value="5" <?php echo ($value == '5')?'selected':'';?>>數學渡河邏輯遊戲模組</option>	
	</select>
	<input type="button" value="刪除" onclick="removeLi('<?php echo  $key; ?>')">	
</li>
<?php		
	}
}
?>			
			</ul><br>
			<a class="button" title="上一步驟" onclick="goBack()">上一步驟</a>			
			<a class="button" title="存檔" onclick="chkValue()">存檔</a>			
			
			</td>
		</tr>		
	</table>
<?php 
echo form_close();
?>	
</div>
</div>
<div id="swModuleObj" style="display:none;" >
	<select name="swModules[]" >
		<option value="1">閱讀出題模組</option>
		<option value="2">搶25遊戲模組</option>
		<option value="3">思樂冰製作遊戲模組</option>
		<option value="4">最佳銷售組合遊戲模組</option>
		<option value="5">數學渡河邏輯遊戲模組</option>	
	</select>
</div>
<script>
var dataIsSend = false;

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
	
	if($('ul[id="modules_area"] li').length == 0){
			err_dsc = err_dsc + '至少必須選擇一個模組!!\r\n';
			isGo = false;
	}
	
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
	if(isGo){
		$('#tr_1').hide();
		$('#tr_2').show();
	}
	
	if(err_dsc !=''){
		alert(err_dsc);
	}
}

var objIndex = <?php echo isset($dataList['modules_dsc'])?count($dataList['modules_dsc']):'0';?>;
function addModules(){
	var swDsc = $('#swModuleObj').html();
	var delButton = '<input type="button" value="刪除" onclick="removeLi(\'' + objIndex + '\')">';
	var htmlDsc = '<li id="li_'+objIndex+'">'+ swDsc + delButton + '</li>';
	$('#modules_area').append(htmlDsc);
	objIndex++;
}

function removeLi(getObjIndex){
	$('#li_'+getObjIndex).remove();
}

function goBack(){
	$('#tr_2').hide();
	$('#tr_1').show();
}
</script>