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
						基本設定
					</td>
					<td style="background-color:#E4DEE9;">
						題目內容<br>
					</td>
					<td style="background-color:#B2DDE6;">
						模組初始化設定<br>
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
$hidden['module_type'] = 'm6';//設定模組種類
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
							<td>
                                <p>請選擇單元：<select name="unit" id="unit" >
                                    <option value="1">單元01</option>
                                    <?php
                                    for($x=2;$x<30;$x++){
                                    ?>
                                        <option value="<?php echo $x;?>" <?php echo (isset($modelsData['unit']) and $modelsData['unit'] == $x)?'selected':'';?>>單元<?php echo str_pad($x,2,'0',STR_PAD_LEFT);?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </p>
                            </td>
						</tr>
                        <tr>
                            <td>
                                <p>請選擇試卷：<select name="paper" id="paper" >
                                        <option value="1">試卷01</option>
                                        <?php
                                        for($x=2;$x<30;$x++){
                                            ?>
                                            <option value="<?php echo $x;?>" <?php echo (isset($modelsData['paper']) and $modelsData['paper'] == $x)?'selected':'';?>>試卷<?php echo str_pad($x,2,'0',STR_PAD_LEFT);?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>請選擇試題：<select name="questions" id="questions" >
                                        <option value="1">試題01</option>
                                        <?php
                                        for($x=2;$x<30;$x++){
                                            ?>
                                            <option value="<?php echo $x;?>" <?php echo (isset($modelsData['questions']) and $modelsData['questions'] == $x)?'selected':'';?>>試題<?php echo str_pad($x,2,'0',STR_PAD_LEFT);?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>請選擇模組類型：<select name="model" id="model" >
                                        <?php
                                        if(isset($model_options))
                                        {
                                            foreach($model_options as $v)
                                            {
                                        ?>
                                                <option value="<?php echo $v['id']; ?>" <?php echo (isset($modelsData['model']) and $modelsData['model'] == $v['id'])?'selected':'';?>><?php echo $v['name']; ?></option>
                                        <?php
                                            }
                                        }

                                        ?>
                                    </select>
                                </p>
                            </td>
                        </tr>
						<tr>
							<td><span><a class="button" title="下一步驟" onclick="chk_title()">下一步驟</a></span></td>
						</tr>
					</table>
				</div>	
			</td>
		</tr>
		<tr id="tr_content" style="display:none;">
			<td style="background-color:#E4DEE9;">題目內容
				<textarea name="contents_dsc" id="contents_dsc" ><?php echo isset($levelDsc['1']['A'])?$levelDsc['1']['A']:'';?></textarea>
                <a class="button" title="上一步驟" onclick="changeArea('tr_title')">上一步驟</a>
				<a class="button" title="下一步驟" onclick="changeArea('tr_build_option')">下一步驟</a>
			</td>
		</tr>
		<tr id="tr_build_option" style="display:none;">
			<td style="background-color:#B2DDE6;">模組初始化設定[模組不需初始化資料時，不需設定此項目]
				<textarea name="build_option" id="build_option" ><?php echo isset($modelsData['build_option'])?$modelsData['build_option']:'[]';?></textarea>
				<a class="button" title="上一步驟" onclick="changeArea('tr_content')">上一步驟</a>
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
var tr_array = ['tr_title', 'tr_content', 'tr_build_option'];

function chkValue(){
	var isGo = true;
	var err_dsc = '';
	var ck_array =  ["title_dsc",];
	var err_array =  ["請輸入題目標題!!"];
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
	var ck_array =  ["title_dsc","unit", "paper", "questions", "model"];
	var err_array =  ["請輸入題目標題!!", "請選擇單元!!", "請選擇試卷!!", "請選擇試題!!", "請選擇模組類型!!"];
	var type_array =  ["text","text","text","text","text"];

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
		changeArea('tr_content');
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
var myeditor = CKEDITOR.replace('contents_dsc', {
	filebrowserBrowseUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl : '<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl:'<?php echo $base; ?>public/js/back/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
</script>