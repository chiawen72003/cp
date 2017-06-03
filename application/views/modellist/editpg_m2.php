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
					A學生關卡敘述<br>
				</td>
				<td style="background-color:#B2DDE6;">
					B學生關卡敘述<br>
				</td>
				<td style="background-color:#F7F6F2;">
					遊戲規則設定<br>
				</td>
			</tr>
		</table>
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
$hidden['module_type'] = 'm2';//設定模組種類
echo form_open_multipart('modellist/setModelData', $attributes,$hidden);
?>
	<table class="list_item">
		<tr id="tr_title">
			<td style="background-color:#E9F0DE;">
			<div class="mode_item">
				<table>
					<tr>
						<td>
							<p>題目標題：<input type="text" class="put_1" name="title_dsc" id="title_dsc" value="<?php echo isset($dataList['title_dsc'])?$dataList['title_dsc']:'';?>"></p>			
						</td>
					</tr>
					<tr>
						<td>
							<p>題目內容：<textarea name="contents_dsc" class="tex_1" id="contents_dsc" ><?php echo isset($dataList['contents_dsc'])?$dataList['contents_dsc']:'';?></textarea></p>
						</td>
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
				<a class="button" title="下一步驟" onclick="changeArea('L_4_A')">下一步驟</a>
			</td>
		</tr>	
		<tr id="L_4_A" style="display:none;">
			<td style="background-color:#E4DEE9;">第4關 A學生關卡敘述
				<textarea name="level_4_A" id="level_4_A" ><?php echo isset($levelDsc['4']['A'])?$levelDsc['4']['A']:'';?></textarea>
				<a class="button" title="上一步驟" onclick="changeArea('L_3_A')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('L_5_A')">下一步驟</a>
			</td>
		</tr>	
		<tr id="L_5_A" style="display:none;">
			<td style="background-color:#E4DEE9;">第5關 A學生關卡敘述
				<textarea name="level_5_A" id="level_5_A" ><?php echo isset($levelDsc['5']['A'])?$levelDsc['5']['A']:'';?></textarea>
				<a class="button" title="上一步驟" onclick="changeArea('L_4_A')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('L_6_A')">下一步驟</a>
			</td>
		</tr>	
		<tr id="L_6_A" style="display:none;">
			<td style="background-color:#E4DEE9;">第6關 A學生關卡敘述
				<textarea name="level_6_A" id="level_6_A" ><?php echo isset($levelDsc['6']['A'])?$levelDsc['6']['A']:'';?></textarea>
				<a class="button" title="上一步驟" onclick="changeArea('L_5_A')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('L_1_B')">下一步驟</a>
			</td>
		</tr>			
		<tr id="L_1_B" style="display:none;">
			<td style="background-color:#B2DDE6;">第1關 B學生關卡敘述
				<textarea name="level_1_B" id="level_1_B" ><?php echo isset($levelDsc['1']['B'])?$levelDsc['1']['B']:'';?></textarea>
				<a class="button" title="上一步驟" onclick="changeArea('L_6_A')">上一步驟</a>
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
				<a class="button" title="下一步驟" onclick="changeArea('L_4_B')">下一步驟</a>
			</td>
		</tr>	
		<tr id="L_4_B" style="display:none;">
			<td style="background-color:#B2DDE6;">第4關 B學生關卡敘述
				<textarea name="level_4_B" id="level_4_B" ><?php echo isset($levelDsc['4']['B'])?$levelDsc['4']['B']:'';?></textarea>
				<a class="button" title="上一步驟" onclick="changeArea('L_3_B')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('L_5_B')">下一步驟</a>
			</td>
		</tr>	
		<tr id="L_5_B" style="display:none;">
			<td style="background-color:#B2DDE6;">第5關 B學生關卡敘述
				<textarea name="level_5_B" id="level_5_B" ><?php echo isset($levelDsc['5']['B'])?$levelDsc['5']['B']:'';?></textarea>
				<a class="button" title="上一步驟" onclick="changeArea('L_4_B')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('L_6_B')">下一步驟</a>
			</td>
		</tr>	
		<tr id="L_6_B" style="display:none;">
			<td style="background-color:#B2DDE6;">第6關 B學生關卡敘述
				<textarea name="level_6_B" id="level_6_B" ><?php echo isset($levelDsc['6']['B'])?$levelDsc['6']['B']:'';?></textarea>
				<a class="button" title="上一步驟" onclick="changeArea('L_5_B')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_game')">下一步驟</a>
			</td>
		</tr>
		<tr id="tr_game" style="display:none;">
			<td style="background-color:#F7F6F2;">
			<div class="mode_item">
				<p>一般規則設定</p>
				<ul>
					<li class="li_2">每回合最大可玩次數：<input type="number" name="MaxCount" id="MaxCount" value="<?php echo isset($modelsData->MaxCount)?$modelsData->MaxCount:'10';?>"></li>
					<li class="li_2">每回合最大值：<input type="number" name="MaxValue" id="MaxValue" value="<?php echo isset($modelsData->MaxValue)?$modelsData->MaxValue:'25';?>"></li>
					<li class="li_2">電腦對手出值的目標：<input type="text" name="computerPay" id="computerPay" value="<?php echo isset($modelsData->computerPay)?$modelsData->computerPay:'';?>"> 例:1;3;5;7;10</li>
				</ul>
				<p>第2關 規則設定</p>
				<ul>
					<li class="li_3">遊戲回合值：<input type="number" name="play_2_Rount" id="play_2_Rount" value="<?php echo isset($modelsData->play_2_Rount)?$modelsData->play_2_Rount:'3';?>"></li>
				</ul>				
				<p>第3關 規則設定</p>
				<ul>
					<li class="li_3">遊戲起始值：<input type="number" name="play_3_BeginNumber" id="play_3_BeginNumber" value="<?php echo isset($modelsData->play_3_BeginNumber)?$modelsData->play_3_BeginNumber:'15';?>"></li>
				</ul>
				<p>第4關 規則設定</p>
				<ul>
					<li class="li_3">遊戲起始值：<input type="number" name="play_4_BeginNumber" id="play_4_BeginNumber" value="<?php echo isset($modelsData->play_4_BeginNumber)?$modelsData->play_4_BeginNumber:'9';?>"></li>
				</ul>
			</div>	
				<a class="button" title="上一步驟" onclick="changeArea('L_6_B')">上一步驟</a>
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
var tr_array = ['tr_title','L_1_A','L_2_A','L_3_A','L_4_A','L_5_A','L_6_A','L_1_B','L_2_B','L_3_B','L_4_B','L_5_B','L_6_B','tr_game'];

function chkValue(){
	var isGo = true;
	var err_dsc = '';
	var ck_array =  ["title_dsc","contents_dsc",'MaxCount','MaxValue','play_2_Rount','play_3_BeginNumber','play_4_BeginNumber'];
	var err_array =  ["請輸入題目標題!!","請輸入題目內容!!","每回合最大可玩次數必須填入數字!!","每回合最大值必須填入數字!!","第2關遊戲回合值必須填入數字!!","第3關遊戲起始值必須填入數字!!","第4關遊戲起始值必須填入數字!!"];
	var type_array =  ["text","text","number","number","number","number","number"];

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

function changeArea(getID){
	for(var x=0;x < tr_array.length;x++){
		if(getID == tr_array[x]){
			$('#'+tr_array[x]).show();
		}else{
			$('#'+tr_array[x]).hide();
		}
	}
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
var myeditor = CKEDITOR.replace('level_4_A', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
var myeditor = CKEDITOR.replace('level_5_A', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
var myeditor = CKEDITOR.replace('level_6_A', {
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
var myeditor = CKEDITOR.replace('level_4_B', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
var myeditor = CKEDITOR.replace('level_5_B', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
var myeditor = CKEDITOR.replace('level_6_B', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});

</script>