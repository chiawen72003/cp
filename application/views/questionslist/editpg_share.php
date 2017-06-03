<!-- 左選單 end -->
<div id="wrapper">
<ul>
	<li><a class="button" title="回上一頁" onclick="history.back();">回上一頁</a></li>	
</ul>    
<table class="title">
	<tr>
		<td>編輯</td>
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
					選擇模組<br>
					</td>
					<td style="background-color:#B2DDE6;">
					模組排序<br>
					</td>
					<td style="background-color:#FDE9D9;">
					選擇受測班級<br>
					</td>
					<td style="background-color:#F7F6F2;">
					語意分析字詞設定<br>
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
							<td><p>題目標題：<input type="text" class="put_2"  value="<?php echo isset($dataList['title_dsc'])?$dataList['title_dsc']:'';?>" readonly /></p></td>
						</tr>
						<tr>
							<td><p>題目註解：<input type="text" class="put_2"  value="<?php echo isset($dataList['remark_dsc'])?$dataList['remark_dsc']:'';?>" readonly /></p></td>
						</tr>
						<tr>
							<td><p>題目類型：<select name="is_practice" class="put_2" id="is_practice"><option value="1" <?php echo (isset($dataList['is_practice']) and $dataList['is_practice']=='1')?'練習題':'';?>>練習題</option>
							<option value="0" <?php echo (isset($dataList['is_practice']) and $dataList['is_practice']=='0')?'測驗題':'';?>>測驗題</option></select></p></td>
						</tr>
						<tr>
							<td><p>題目圖示：<?php
	if(isset($dataList['img_path'])){
	?><img src="<?php echo $base;?>upIMG/questions/<?php echo $dataList['img_path'];?>" width="50px"><br>
	<?php	
	}
	?>	</p></td>
						</tr>
						<tr><td><p>測驗起始日期：<input type="text" class="put_2" value="<?php echo isset($dataList['begin_date'])?$dataList['begin_date']:'';?>" readonly /></p></td></tr>
						<tr><td><p>測驗結束日期：<input type="text" class="put_2" value="<?php echo isset($dataList['end_date'])?$dataList['end_date']:'';?>" readonly /></p></td></tr>
						<tr><td><span><a class="button" title="下一步驟" onclick="changeArea('tr_1')">下一步驟</a></span></td></tr>
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
					
<?php 
$dsc = '不選用';
if( isset($modelsData['m1']) and count($modelsData['m1']) > 0){
	foreach( $modelsData['m1'] as $key => $tempArray){
		if(isset($dataList['modules_dsc'][0]) and $dataList['modules_dsc'][0] == $tempArray['num']){
		$dsc = $tempArray['title_dsc'];
		}
	}
}
echo $dsc;
?>					
					
					</td>
				</tr>
				<tr class="title">
					<td>模組2 搶25遊戲模組</td>
					<td>
<?php 
$dsc = '不選用';
if( isset($modelsData['m2']) and count($modelsData['m2']) > 0){
	foreach( $modelsData['m2'] as $key => $tempArray){
	if(isset($dataList['modules_dsc'][1]) and $dataList['modules_dsc'][1] == $tempArray['num']){
		$dsc = $tempArray['title_dsc'];
	}			
	}
}
echo $dsc;
?>						
					</td>
				</tr>
				<tr class="title">
					<td>模組3 思樂冰製作遊戲模組</td>
					<td>	
<?php 
$dsc = '不選用';
if( isset($modelsData['m3']) and count($modelsData['m3']) > 0){
	foreach( $modelsData['m3'] as $key => $tempArray){
	if(isset($dataList['modules_dsc'][2]) and $dataList['modules_dsc'][2] == $tempArray['num']){
	$dsc = $tempArray['title_dsc'];
	}
	}
}
echo $dsc;
?>						
					</td>
				</tr>
				<tr class="title">
					<td>模組4 最佳銷售組合遊戲模組</td>
					<td>
<?php 
$dsc = '不選用';
if( isset($modelsData['m4']) and count($modelsData['m4']) > 0){
	foreach( $modelsData['m4'] as $key => $tempArray){
	if(isset($dataList['modules_dsc'][3]) and $dataList['modules_dsc'][3] == $tempArray['num']){
		$dsc = $tempArray['title_dsc'];
	}
	}
}
echo $dsc;
?>						
					</td>
				</tr>
				<tr class="title">
					<td>模組5 數學渡河邏輯遊戲模組</td>
					<td>
<?php 
$dsc = '不選用';
if( isset($modelsData['m5']) and count($modelsData['m5']) > 0){
	foreach( $modelsData['m5'] as $key => $tempArray){
	if(isset($dataList['modules_dsc'][4]) and $dataList['modules_dsc'][4] == $tempArray['num']){
	$dsc = $tempArray['title_dsc'];
	}	
	}
}
echo $dsc;
?>					
					</td>
				</tr>
			</table>
			</div>
			<br>
			<a class="button" title="上一步驟" onclick="changeArea('tr_title')">上一步驟</a>
			<a class="button" title="下一步驟" onclick="changeArea('tr_2')">下一步驟</a>
			</td>
		</tr>
		<tr id="tr_2" style="display:none;">
			<td style="background-color:#B2DDE6;">
			<div class="mode_item">
			<ul  >
<?php
if( isset($dataList['order_dsc']) ){
	foreach($dataList['order_dsc'] as $value){
?>
<li >模組<?php echo $value;?> </li>
<?php
	}
}else{
?>
	<li >模組1  </li>
	<li >模組2  </li>
	<li >模組3  </li>
	<li >模組4  </li>
	<li >模組5  </li>
<?php	
}
?>
			</ul>
			</div>
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
			<a class="button" title="上一步驟" onclick="changeArea('tr_2')">上一步驟</a>
			<a class="button" title="下一步驟" onclick="changeArea('tr_4')">下一步驟</a>
		</div>		
		</td>
		</tr>
	<tr id="tr_4" style="display:none;">
		<td style="background-color:#F7F6F2;">
		<div class="mode_item">
		<ul id="analysis_area">
<?php
if(isset($dataList['analysis_words']) and count($dataList['analysis_words']) > 0){
	foreach($dataList['analysis_words'] as $key => $value){
?>
<li class="li_1">
	<?php echo $value;?>
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
	if(!dataIsSend){
		dataIsSend = true;
		$('#Form1').submit();
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

</script>