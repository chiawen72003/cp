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
					<td style="background-color:#E9F0DE;" >
						建立模組-標題-內容
					</td>
					<td style="background-color:#E4DEE9;">
						A學生關卡敘述<br>
					</td>
					<td style="background-color:#B2DDE6;">
						B學生關卡敘述<br>
					</td>
					<td style="background-color:#FDE9D9;">
						B學生 小孩   喜好資訊<br>
						B學生 年輕人 喜好資訊<br>
						B學生 中年人 喜好資訊<br>
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
$hidden['module_type'] = 'm4';//設定模組種類
echo form_open_multipart('modellist/setModelData', $attributes,$hidden);
?>

	<table class="list_item">
		<tr id="tr_title" >
			<td style="background-color:#E9F0DE;">
				<div class="mode_item">
					<table>
						<tr>
							<td><p>題目標題：<input type="text" class="put_1" name="title_dsc" id="title_dsc" value="<?php echo isset($dataList['title_dsc'])?$dataList['title_dsc']:'';?>"></p></td>
						</tr>
						<tr>
							<td><p>題目內容：<textarea name="contents_dsc" class="tex_1" id="contents_dsc" ><?php echo isset($dataList['contents_dsc'])?$dataList['contents_dsc']:'';?></textarea></p></td>
						</tr>
						<tr>
							<td><span><a class="button" title="下一步驟" onclick="chk_title()">下一步驟</a></span></td>
						</tr>
					</table>
				</div>	
			</td>
		</tr>
		<tr id="L_1_A" style="display:none;">
			<td style="background-color:#E4DEE9;">第1關 A學生關卡敘述
				<textarea name="level_1_A" id="level_1_A" ><?php echo isset($levelDsc['1']['A'])?$levelDsc['1']['A']:'';?></textarea>
				<a class="button" title="上一步驟" onclick="changeArea('tr_title')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('L_1_B')">下一步驟</a>
			</td>
		</tr>
		<tr id="L_1_B" style="display:none;">
			<td style="background-color:#B2DDE6;">第1關 B學生關卡敘述
				<textarea name="level_1_B" id="level_1_B" ><?php echo isset($levelDsc['1']['B'])?$levelDsc['1']['B']:'';?></textarea>
				<a class="button" title="上一步驟" onclick="changeArea('L_1_A')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_1')">下一步驟</a>
			</td>
		</tr>			
		<tr id="tr_1"  style="display:none;" >
			<td style="background-color:#FDE9D9;">
				B學生 小孩 喜好資訊：<textarea name="value_dsc_c" id="value_dsc_c" ><?php echo isset($modelsData['value_dsc_c'])?$modelsData['value_dsc_c']:'';?></textarea><br>
				<a class="button" title="上一步驟" onclick="changeArea('L_1_B')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_2')">下一步驟</a>			
			</td>
		</tr>
		<tr id="tr_2"  style="display:none;" >
			<td style="background-color:#FDE9D9;" >
				B學生 年輕人 喜好資訊：<textarea name="value_dsc_m" id="value_dsc_m" ><?php echo isset($modelsData['value_dsc_m'])?$modelsData['value_dsc_m']:'';?></textarea><br>
				<a class="button" title="上一步驟" onclick="changeArea('tr_1')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_3')">下一步驟</a>
			</td>
		</tr>
		<tr id="tr_3"  style="display:none;" >
			<td style="background-color:#FDE9D9;">
				B學生 中年人 喜好資訊：<textarea name="value_dsc_l" id="value_dsc_l" ><?php echo isset($modelsData['value_dsc_l'])?$modelsData['value_dsc_l']:'';?></textarea><br>
				<a class="button" title="上一步驟" onclick="changeArea('tr_2')">上一步驟</a>
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
var tr_array = ['tr_title','L_1_A','L_1_B','tr_1','tr_2','tr_3'];

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

function chkTmp_1_A(){
	isGo = true;
	$('input[name="rule_1_A[]"]').each(function(){
		if(!$.isNumeric($(this).val()) ){					
			isGo = false;				
		}else{	
			if( $(this).val() < 0 || $(this).val() > 99 ){
				isGo = false;
			}
		}	
	});
	if(isGo){
		changeArea('tr_1_B');
	}else{
		alert('請檢查欄位值是否為數字，且數值需介於0~99!!');
	}	
}
function chkTmp_1_B(){
	isGo = true;
	$('input[name="rule_1_B[]"]').each(function(){
		if(!$.isNumeric($(this).val()) ){					
			isGo = false;				
		}else{	
			if( $(this).val() < 0 || $(this).val() > 99 ){
				isGo = false;
			}
		}	
	});
	if(isGo){
		changeArea('tr_2_A');
	}else{
		alert('請檢查欄位值是否為數字，且數值需介於0~99!!');
	}	
}
function chkTmp_2_A(){
	isGo = true;
	$('input[name="rule_2_A[]"]').each(function(){
		if(!$.isNumeric($(this).val()) ){					
			isGo = false;				
		}else{	
			if( $(this).val() < 0 || $(this).val() > 99 ){
				isGo = false;
			}
		}	
	});
	if(isGo){
		changeArea('tr_2_B');
	}else{
		alert('請檢查欄位值是否為數字，且數值需介於0~99!!');
	}	
}

function chkTmp_2_B(){
	isGo = true;
	$('input[name="rule_2_B[]"]').each(function(){
		if(!$.isNumeric($(this).val()) ){					
			isGo = false;				
		}else{	
			if( $(this).val() < 0 || $(this).val() > 99 ){
				isGo = false;
			}
		}	
	});
	if(isGo){
		chkValue();
	}else{
		alert('請檢查欄位值是否為數字，且數值需介於0~99!!');
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
var myeditor = CKEDITOR.replace('value_dsc_c', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});

var myeditor = CKEDITOR.replace('value_dsc_m', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});


var myeditor = CKEDITOR.replace('value_dsc_l', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});

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
</script>