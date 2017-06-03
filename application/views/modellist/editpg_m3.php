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
	<div class="mode_item">
		<table class="mode_tb">
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
					基本溫度設定<br>
					第1關 A學生溫度變化設定<br>
					第1關 B學生溫度變化設定
				</td>
				<td style="background-color:#F7F6F2;">
					共同選項設定
				</td>
				<td style="background-color:#DAE6EF;">
					第3關 A學生溫度變化設定<br>
					第3關 B學生溫度變化設定<br>
				</td>
			</tr>
		</table>
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
$hidden['module_type'] = 'm3';//設定模組種類
echo form_open_multipart('modellist/setModelData', $attributes,$hidden);
?>
	<table class="list_item">
		<tr id="tr_title" >
			<td style="background-color:#E9F0DE;" >
				<div class="mode_item">
					<table>
					<tr>
						<td><p>題目標題：<input type="text" class="put_1" name="title_dsc" id="title_dsc" value="<?php echo isset($dataList['title_dsc'])?$dataList['title_dsc']:'';?>"></p></td>
					</tr>
					<tr>
						<td>
							<p>題目內容：<textarea name="contents_dsc" class="tex_1" id="contents_dsc" ><?php echo isset($dataList['contents_dsc'])?$dataList['contents_dsc']:'';?></textarea></p>
						</td>
					</tr>
					<tr>
						<tr>		
							<td><span><a class="button" title="下一步驟" onclick="chk_title()">下一步驟</a></span></td>
						</tr>
					</tr>
					</table>
				</div>		
			</td>
		</tr>
		<tr id="L_1_A" style="display:none;">
			<td style="background-color:#E4DEE9;">第1關 A學生關卡敘述
				<textarea name="level_1_A" id="level_1_A" ><?php echo isset($levelDsc['1']['A'])?$levelDsc['1']['A']:'';?></textarea>
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
				<a class="button" title="下一步驟" onclick="changeArea('tr_1_base')">下一步驟</a>
			</td>
		</tr>
		<tr id="tr_1_base" style="display:none;">
			<td style="background-color:#FDE9D9;">
			<div class="mode_item">
				<h2>基本溫度設定：</h2>
				<ul>
					<li class="li_3" ><input type="number" name="baseTmp" id="baseTmp" value="<?php echo isset($modelsData['baseTmp'])?$modelsData['baseTmp']:'50';?>">度</li>
				</ul>
			</div>	
				<a class="button" title="上一步驟" onclick="changeArea('L_3_B')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_1_A')">下一步驟</a>
			</td>
		</tr>
		<tr id="tr_1_A" style="display:none;">
			<td style="background-color:#FDE9D9;">
			 <div class="mode_item">
				<h2>第1關 A學生溫度變化設定<h2>
				<table>
					<tr class="title">
						<td>30g鹽+30g冰塊</td>
						<td>降低溫度<input type="number" name="rule_1_A[]" value="<?php echo isset($modelsData['rule_1_A'][0])?$modelsData['rule_1_A'][0]:'0';?>">度</td>
					</tr>
					<tr class="title">
						<td>30g鹽+60g冰塊</td>
						<td>降低溫度<input type="number" name="rule_1_A[]" value="<?php echo isset($modelsData['rule_1_A'][1])?$modelsData['rule_1_A'][1]:'0';?>">度</td>
					</tr>
					<tr class="title">
						<td>30g鹽+90g冰塊</td>
						<td>降低溫度<input type="number" name="rule_1_A[]" value="<?php echo isset($modelsData['rule_1_A'][2])?$modelsData['rule_1_A'][2]:'0';?>">度</td>
					</tr>
					<tr class="title">
						<td>30g糖+30g冰塊</td>
						<td>降低溫度<input type="number" name="rule_1_A[]" value="<?php echo isset($modelsData['rule_1_A'][3])?$modelsData['rule_1_A'][3]:'0';?>">度</td>
					</tr>
					<tr class="title">
						<td>30g糖+60g冰塊</td>
						<td>降低溫度<input type="number" name="rule_1_A[]" value="<?php echo isset($modelsData['rule_1_A'][4])?$modelsData['rule_1_A'][4]:'0';?>">度</td>
					</tr>
					<tr class="title">
						<td>30g糖+90g冰塊</td>
						<td>降低溫度<input type="number" name="rule_1_A[]" value="<?php echo isset($modelsData['rule_1_A'][5])?$modelsData['rule_1_A'][5]:'0';?>">度</td>
					</tr>
				</table>
			</div>	
				<a class="button" title="上一步驟" onclick="changeArea('tr_1_base')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="chkTmp_1_A()">下一步驟</a>
			</td>
		</tr>		
		<tr id="tr_1_B" style="display:none;">
			<td style="background-color:#FDE9D9;">
			 <div class="mode_item">
			 <h2>第1關 B學生溫度變化設定</h2>
				<table>
					<tr class="title">
						<td>30g味精+30g冰塊</td>
						<td>降低溫度<input type="number" name="rule_1_B[]" value="<?php echo isset($modelsData['rule_1_B'][0])?$modelsData['rule_1_B'][0]:'0';?>">度</td>
					</tr>
					<tr class="title">
						<td>30g味精+60g冰塊</td>
						<td>降低溫度<input type="number" name="rule_1_B[]" value="<?php echo isset($modelsData['rule_1_B'][1])?$modelsData['rule_1_B'][1]:'0';?>">度</td>
					</tr>
					<tr class="title">
						<td>30g味精+90g冰塊</td>
						<td>降低溫度<input type="number" name="rule_1_B[]" value="<?php echo isset($modelsData['rule_1_B'][2])?$modelsData['rule_1_B'][2]:'0';?>">度</td>
					</tr>
					<tr class="title">
						<td>30g純水+30g冰塊</td>
						<td>降低溫度<input type="number" name="rule_1_B[]" value="<?php echo isset($modelsData['rule_1_B'][3])?$modelsData['rule_1_B'][3]:'0';?>">度</td>
					</tr>
					<tr class="title">
						<td>30g純水+60g冰塊</td>
						<td>降低溫度<input type="number" name="rule_1_B[]" value="<?php echo isset($modelsData['rule_1_B'][4])?$modelsData['rule_1_B'][4]:'0';?>">度</td>
					</tr>
					<tr class="title">
						<td>30g純水+90g冰塊</td>
						<td>降低溫度<input type="number" name="rule_1_B[]" value="<?php echo isset($modelsData['rule_1_B'][5])?$modelsData['rule_1_B'][5]:'0';?>">度</td>
					</tr>
				</table>
			</div>	
				<a class="button" title="上一步驟" onclick="changeArea('tr_1_A')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="chkTmp_1_B()">下一步驟</a>
			</td>
		</tr>
		<tr id="tr_2" style="display:none;">
			<td style="background-color:#F7F6F2;">
			  <div class="mode_item">
			  <h2>第2關 共同選項設定</h2>
			  <p><button type="button" onclick="add_option()">新增選項</button><p>
				<ul id="option_area">
<?php
if(isset($modelsData['options']) and count($modelsData['options']) > 0){
	foreach($modelsData['options'] as $key => $value){
?>
<li class="li_3" id="li_<?php echo $key+1;?>">
	<input type="button" value="移除" onclick="$('#li_<?php echo $key+1;?>').remove();">
	<input type="text" name="options[]" value="<?php echo $value;?>">
</li>
<?php		
	}
}
?>					
				</ul>
			</div>	
				<a class="button" title="上一步驟" onclick="changeArea('tr_1_B')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_3')">下一步驟</a>
			</td>
		</tr>
		<tr id="tr_3" style="display:none;">
			<td style="background-color:#F7F6F2;"
			<div class="mode_item">
				<h2>第3關 共同選項設定</h2>
				<p><button type="button" onclick="add_option3()">新增選項</button></p>
				<ul id="option_area3">
<?php
if(isset($modelsData['options3']) and count($modelsData['options3']) > 0){
	foreach($modelsData['options3'] as $key => $value){
?>
<li  class="" id="li3_<?php echo $key+1;?>">
	<input type="button" value="移除" onclick="$('#li3_<?php echo $key+1;?>').remove();">
	<input type="text" name="options3[]" value="<?php echo $value;?>">
</li>
<?php		
	}
}
?>					
				</ul>
			</div>	
				<a class="button" title="上一步驟" onclick="changeArea('tr_2')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_4_A')">下一步驟</a>
			</td>
		</tr>			
		<tr id="tr_4_A" style="display:none;">
			<td style="background-color:#DAE6EF;">第3關 A學生溫度變化設定
				<div class="mode_item">
				<table>
					<tr class="title">
						<td>30g鹽+150g冰塊</td>
						<td>降低溫度<input type="number" name="rule_2_A[]" value="<?php echo isset($modelsData['rule_2_A'][0])?$modelsData['rule_2_A'][0]:'0';?>">度</td>
					</tr>
					<tr class="title">
						<td>50g鹽+150g冰塊</td>
						<td>降低溫度<input type="number" name="rule_2_A[]" value="<?php echo isset($modelsData['rule_2_A'][1])?$modelsData['rule_2_A'][1]:'0';?>">度</td>
					</tr>
					<tr class="title">
						<td>70g鹽+150g冰塊</td>
						<td>降低溫度<input type="number" name="rule_2_A[]" value="<?php echo isset($modelsData['rule_2_A'][2])?$modelsData['rule_2_A'][2]:'0';?>">度</td>
					</tr>
				</table>
				</div>	
				<a class="button" title="上一步驟" onclick="changeArea('tr_3')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="chkTmp_4_A()">下一步驟</a>
			</td>
		</tr>		
		<tr id="tr_4_B" style="display:none;">
			<td style="background-color:#DAE6EF">第3關 B學生溫度變化設定
				<div class="mode_item">
				<table>
					<tr class="title">
						<td>100g鹽+150g冰塊</td>
						<td>降低溫度<input type="number" name="rule_2_B[]" value="<?php echo isset($modelsData['rule_2_B'][0])?$modelsData['rule_2_B'][0]:'0';?>">度</td>
					</tr>
					<tr class="title">
						<td>150g鹽+150g冰塊</td>
						<td>降低溫度<input type="number" name="rule_2_B[]" value="<?php echo isset($modelsData['rule_2_B'][1])?$modelsData['rule_2_B'][1]:'0';?>">度</td>
					</tr>
				</table>
				</div>
				<a class="button" title="上一步驟" onclick="changeArea('tr_4_A')">上一步驟</a>
				<a class="button" title="存檔" onclick="chkTmp_4_B()">存檔</a>
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
var tr_array = ['tr_title','L_1_A','L_2_A','L_3_A','L_1_B','L_2_B','L_3_B','tr_1_base','tr_1_base','tr_1_A','tr_1_B','tr_2','tr_3','tr_4_A','tr_4_B'];

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
		changeArea('tr_2');
	}else{
		alert('請檢查欄位值是否為數字，且數值需介於0~99!!');
	}	
}
function chkTmp_4_A(){
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
		changeArea('tr_4_B');
	}else{
		alert('請檢查欄位值是否為數字，且數值需介於0~99!!');
	}	
}

function chkTmp_4_B(){
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

//第2關 新增選項
var optionIndex=<?php echo (isset($modelsData['options']) and count($modelsData['options']) > 0)?count($modelsData['options']):'0';?>;
function add_option(){
	var dsc = '<li id="li_'+optionIndex+'"><input type="button" value="移除" onclick="$(\'#li_'+optionIndex+'\').remove();"><input type="text" name="options[]" value=""></li>';
	$('#option_area').append(dsc);	
	optionIndex++;
}

//第3關 新增選項
var optionIndex3=<?php echo (isset($modelsData['options3']) and count($modelsData['options3']) > 0)?count($modelsData['options3']):'0';?>;
function add_option3(){
	var dsc = '<li id="li3_'+optionIndex3+'"><input type="button" value="移除" onclick="$(\'#li3_'+optionIndex3+'\').remove();"><input type="text" name="options3[]" value=""></li>';
	$('#option_area3').append(dsc);	
	optionIndex3++;
}

var myeditor = CKEDITOR.replace('level_1_A', {
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
var myeditor = CKEDITOR.replace('level_3_A', {
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
var myeditor = CKEDITOR.replace('level_2_B', {
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
</script>