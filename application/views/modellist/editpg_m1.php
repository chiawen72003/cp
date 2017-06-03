<!-- 左選單 end -->
<div id="wrapper">
<ul>
	<li><a class="button" title="回上一頁" onclick="history.back();">回上一頁</a></li>	
</ul>  
<table class="title">
	<tr>
		<td>新增模組</td>
	</tr>
</table> 
<div class="accordionButton">  
	<div class="mode_wrap">
		<div class="mode_item">
			<table class="mode_tb">
				<tr>
					<th></th>
					<th></th>
					<th></th>
				</tr>
				<tr>
					<td style="background-color:#E9F0DE;" >
						建立模組-標題-內容
					</td>
					<td style="background-color:#E4DEE9;">
						A學生關卡敘述
					</td>
					<td style="background-color:#B2DDE6;">
						B學生關卡敘述
					</td>
					<td style="background-color:#FDE9D9;">
						A學生資訊<br>
						B學生資訊<br>
						共同選項資訊
					</td>
					<td style="background-color:#F7F6F2;">
						遊戲規則設定
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
$hidden['module_type'] = 'm1';
echo form_open_multipart('modellist/setModelData', $attributes,$hidden);
?>
	<table class="list_item">
		<tr id="tr_title" >
			<td style="background-color:#E9F0DE;">
				<div class="mode_item">
					<table>
						<tr>
							<td>
								<p>題目標題:<input type="text" class="put_1" name="title_dsc" id="title_dsc" value="<?php echo isset($dataList['title_dsc'])?$dataList['title_dsc']:'';?>"></p>								
							</td>
						</tr>
						<tr>
							<td>
								<p>題目內容:<textarea name="contents_dsc" class="tex_1" id="contents_dsc" ><?php echo isset($dataList['contents_dsc'])?$dataList['contents_dsc']:'';?></textarea></p>
							</td>
						</tr>
						<tr>
							<td>
								<span><a class="button" title="下一步驟" onclick="chk_title()">下一步驟</a></span>						
							</td>
						</tr>	
					</table>
				</div>
			</td>
		</tr>
		<tr id="L_1_A" style="display:none;">
			<td style="background-color:#E4DEE9;">
			    第1關 A學生關卡敘述
				<textarea  class="tex_1" name="level_1_A" id="level_1_A" ><?php echo isset($levelDsc['1']['A'])?$levelDsc['1']['A']:'';?></textarea>
				<a class="button" title="上一步驟" onclick="changeArea('tr_title')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('L_2_A')">下一步驟</a>
			</td>
		</tr>	
		<tr id="L_2_A" style="display:none;">
			<td style="background-color:#E4DEE9;">第2關 A學生關卡敘述
				<textarea name="level_2_A" id="level_2_A" ><?php echo isset($levelDsc['2']['A'])?$levelDsc['2']['A']:'';?></textarea>
				<a class="button" title="上一步驟" onclick="changeArea('L_1_A')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('L_3_A')">下一步驟</a>
			</td>
		</tr>
		<tr id="L_3_A" style="display:none;">
			<td style="background-color:#E4DEE9;">第3關 A學生關卡敘述
				<textarea name="level_3_A" id="level_3_A" ><?php echo isset($levelDsc['3']['A'])?$levelDsc['3']['A']:'';?></textarea>
				<a class="button" title="上一步驟" onclick="changeArea('L_2_A')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('L_1_B')">下一步驟</a>
			</td>
		</tr>
		<tr id="L_1_B" style="display:none;">
			<td style="background-color:#B2DDE6;">第1關 B學生關卡敘述
				<textarea name="level_1_B" id="level_1_B" ><?php echo isset($levelDsc['1']['B'])?$levelDsc['1']['B']:'';?></textarea>			
				<a class="button" title="上一步驟" onclick="changeArea('L_3_A')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('L_2_B')">下一步驟</a>
			</td>
		</tr>
		<tr id="L_2_B" style="display:none;">
			<td style="background-color:#B2DDE6;">第2關 B學生關卡敘述
				<textarea name="level_2_B" id="level_2_B" ><?php echo isset($levelDsc['2']['B'])?$levelDsc['2']['B']:'';?></textarea>			
				<a class="button" title="上一步驟" onclick="changeArea('L_1_B')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('L_3_B')">下一步驟</a>
			</td>
		</tr>
		<tr id="L_3_B" style="display:none;">
			<td style="background-color:#B2DDE6;">第3關 B學生關卡敘述
				<textarea name="level_3_B" id="level_3_B" ><?php echo isset($levelDsc['3']['B'])?$levelDsc['3']['B']:'';?></textarea>			
				<a class="button" title="上一步驟" onclick="changeArea('L_2_B')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_1_A')">下一步驟</a>
			</td>
		</tr>		
		<tr id="tr_1_A" style="display:none;">
			<td style="background-color:#FDE9D9;">第1關 A學生資訊
				<textarea name="text_1_A" id="text_1_A" ><?php echo isset($dataList['modulesData']['text_1_A'])?$dataList['modulesData']['text_1_A']:'';?></textarea>
				<a class="button" title="上一步驟" onclick="changeArea('L_3_B')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_1_B')">下一步驟</a>
			</td>
		</tr>		
		<tr id="tr_1_B" style="display:none;">
			<td style="background-color:#FDE9D9;">第1關 B學生資訊
				<textarea name="text_1_B" id="text_1_B" ><?php echo isset($dataList['modulesData']['text_1_B'])?$dataList['modulesData']['text_1_B']:'';?></textarea>			
				<a class="button" title="上一步驟" onclick="changeArea('tr_1_A')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_1_C')">下一步驟</a>
			</td>
		</tr>		
		<tr id="tr_1_C" style="display:none;" >
			<td style="background-color:#FDE9D9;">
			<div class="mode_item">
			 <h2>第1關 共同選項資訊</h2>
			 <a class="button" title="新增選項" onclick="addOptions()">新增選項</a>
				<ul id="options_area">
<?php 
$option_1_number = 0;
if(isset($dataList['modulesData']['option_dsc']) and $dataList['modulesData']['option_dsc'] > '')
{
	$json_array = json_decode($dataList['modulesData']['option_dsc']);	
	foreach($json_array[0] as $key => $value){
?>
<li id="li_op1_<?php echo $key;?>">
	<input type="text" name="options_1[]" value="<?php echo $value;?>">
	<input type="button" value="刪除" onclick="removeLi('li_op1_<?php echo $key;?>')">
</li>
<?php	
	$option_1_number++;	
	}
}
?>				
				</ul>
			</div>	
				<a class="button" title="上一步驟" onclick="changeArea('tr_1_B')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="chkOption()">下一步驟</a>
			</td>
		</tr>
		<tr id="tr_2_A" style="display:none;">
			<td style="background-color:#E4DEE9;">第2關 A學生資訊
				<textarea name="text_2_A" id="text_2_A" ><?php echo isset($dataList['modulesData']['text_2_A'])?$dataList['modulesData']['text_1_A']:'';?></textarea>			
				<a class="button" title="上一步驟" onclick="changeArea('tr_1_C')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_2_B')">下一步驟</a>
			</td>
		</tr>		
		<tr id="tr_2_B" style="display:none;">
			<td style="background-color:#B2DDE6;">第2關 B學生資訊
				<textarea name="text_2_B" id="text_2_B" ><?php echo isset($dataList['modulesData']['text_2_B'])?$dataList['modulesData']['text_2_B']:'';?></textarea>			
				<a class="button" title="上一步驟" onclick="changeArea('tr_2_A')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_3_A')">下一步驟</a>
			</td>
		</tr>		
		<tr id="tr_3_A" style="display:none;">
			<td style="background-color:#E4DEE9;">第3關 A學生資訊
				<textarea name="text_3_A" id="text_3_A" ><?php echo isset($dataList['modulesData']['text_3_A'])?$dataList['modulesData']['text_3_A']:'';?></textarea>			
				<a class="button" title="上一步驟" onclick="changeArea('tr_2_B')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_3_B')">下一步驟</a>
			</td>
		</tr>		
		<tr id="tr_3_B" style="display:none;">
			<td style="background-color:#FDE9D9;">第3關 B學生資訊
				<textarea name="text_3_B" id="text_3_B" ><?php echo isset($dataList['modulesData']['text_3_B'])?$dataList['modulesData']['text_3_B']:'';?></textarea>			
				<a class="button" title="上一步驟" onclick="changeArea('tr_3_A')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_3_C')">下一步驟</a>
			</td>
		</tr>		
		<tr id="tr_3_C" style="display:none;">
			<td style="background-color:#FDE9D9;">
			<div class="mode_item">
			 <h2>第3關 共同選項資訊</h2>
				<ul id="options_area_2"><a class="button" title="新增選項" onclick="addOptions_2()">新增選項</a>
<?php 
$option_2_number = 0;
if(isset($dataList['modulesData']['option_dsc']) and $dataList['modulesData']['option_dsc'] > '')
{
	$json_array = json_decode($dataList['modulesData']['option_dsc']);	
	foreach($json_array[1] as $key => $value){
?>
<li id="li_op2_<?php echo $key;?>">
	<input type="text" name="options_2[]" value="<?php echo $value;?>">
	<input type="button" value="刪除" onclick="removeLi('li_op2_<?php echo $key;?>')">
</li>
<?php	
	$option_2_number++;	
	}
}
?>				
				</ul>
			</div>	
				<a class="button" title="上一步驟" onclick="changeArea('tr_3_B')">上一步驟</a>
				<a class="button" title="存檔" onclick="chkValue()">存檔</a>
			</td>
		</tr>
	</table>
<?php 
echo form_close();
?>	
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
var tr_array = ['tr_title','L_1_A','L_1_B','L_2_A','L_2_B','L_3_A','L_3_B','tr_1_A','tr_1_B','tr_1_C','tr_2_A','tr_2_B','tr_3_A','tr_3_B','tr_3_C'];

function chkValue(){
	var isGo = true;
	var err_dsc = '';
	var ck_array =  ["title_dsc","contents_dsc"];
	var err_array =  ["請輸入題目標題!!","請輸入題目內容!!"];
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
	
	if($('ul[id="options_area_2"] li').length == 0){
			err_dsc = err_dsc + '第3關 共同選項資訊至少要有一個選項!!\r\n';
			isGo = false;
	}	
	
	if(isGo && !dataIsSend){
		$('#Form1').submit();
	}
	
	if(err_dsc !=''){
		alert(err_dsc);
	}
}

function chk_title(){
	var isGo = true;
	var err_dsc = '';
	var ck_array =  ["title_dsc","contents_dsc"];
	var err_array =  ["請輸入題目標題!!","請輸入題目內容!!"];
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

	if(isGo){
		changeArea('L_1_A');
	}
	
	if(err_dsc !=''){
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

function removeLi(getObjID){
	$('#'+getObjID).remove();
}

function chkOption(){
	if($('ul[id="options_area"] li').length == 0){
			alert('第1關 共同選項資訊至少要有一個選項!!\r\n');
	}else{
		changeArea('tr_2_A');
	}
}

var objIndex = <?php echo $option_1_number;?>;
function addOptions(){
	var delButton = '<input type="button" value="刪除" onclick="removeLi(\'li_op1_' + objIndex + '\')">';
	var htmlDsc = '<li id="li_op1_'+objIndex+'"><input type="text" name="options_1[]">' + delButton + '</li>';
	$('#options_area').append(htmlDsc);
	objIndex++;
}

var objIndex2 = <?php echo $option_2_number;?>;
function addOptions_2(){
	var delButton = '<input type="button" value="刪除" onclick="removeLi(\'li_op2_' + objIndex2 + '\')">';
	var htmlDsc = '<li id="li_op2_'+objIndex2+'"><input type="text" name="options_2[]">' + delButton + '</li>';
	$('#options_area_2').append(htmlDsc);
	objIndex2++;
}
var myeditor = CKEDITOR.replace('level_1_A', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
var myeditor = CKEDITOR.replace('level_1_B', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
var myeditor = CKEDITOR.replace('level_2_A', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
var myeditor = CKEDITOR.replace('level_2_B', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
var myeditor = CKEDITOR.replace('level_3_A', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
var myeditor = CKEDITOR.replace('level_3_B', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
var myeditor = CKEDITOR.replace('text_1_A', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
var myeditor = CKEDITOR.replace('text_1_B', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
var myeditor = CKEDITOR.replace('text_2_A', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
var myeditor = CKEDITOR.replace('text_2_B', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
var myeditor = CKEDITOR.replace('text_3_A', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
var myeditor = CKEDITOR.replace('text_3_B', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
</script>