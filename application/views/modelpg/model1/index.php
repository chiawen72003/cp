<div id="m1_module_area" style="display:none">
	<div id="m1_game_1" >
		<div class="speed">
			<ul>
				<li><div class="s_1">1</div></li>
				<li><div >2</div></li>
				<li><div >3</div></li>
			</ul>
		</div>	

		<!-- 關卡敘述-->
		<div class="wrap_title">
		<?php echo $model_data['modelData_1']['levelDsc']['1'];?>
		</div>
		<!-- 關卡敘述 END -->
		<div class="news"><h2>資訊區</h2></div>
		<div id="ckedit_area_1" class="wrap_title_2">
		<?php echo isset($model_data['modelData_1']['level_1'])?$model_data['modelData_1']['level_1']:'';?>
		</div>
<!-- 選擇項目 -->
		<div class="travel_tb">
			<table>
				<tr>
					<th></th>
					<th></th>
				</tr>
		<?php
		if(isset($model_data['modelData_1']['option_dsc'][0]) and count($model_data['modelData_1']['option_dsc'][0]) >0){
			$x=false;
			$dsc = '';
			foreach($model_data['modelData_1']['option_dsc'][0] as $key => $value){
				if($x){
					$x = false;
					$dsc = 'class="s_1"';
				}else{
					$x = true;
					$dsc = '';
				}
		?>
		<tr>
		<td <?php echo $dsc;?> >
			<input type="checkbox" name="option_1" id="option_1_<?php echo $key;?>" value="<?php echo $value;?>" onclick="option_checkbox(this)">
		</td>
		<td <?php echo $dsc;?>>
		<label for="option_1_<?php echo $key;?>" ><?php echo $value;?></label>
		</td>
		</tr>
		<?php		
			}
		}
		?>
			</table>
		<!-----按鈕區----->
		<div id="but_mod">
			<div class="area">
				<ul>	
					<li class="aa"><button class="button button-raised" onclick="m1_goNext()" type="button">下一關</button></li>								
				</ul>
			</div>
		</div>
		<!-----按鈕區END----->
		</div>
<!-- 選擇項目 end-->		
	</div>
	<div id="m1_game_2" style="display:none">
		<div class="speed">
			<ul>
				<li><div >1</div></li>
				<li><div class="s_1">2</div></li>
				<li><div >3</div></li>
			</ul>
		</div>	
		<!-- 關卡敘述-->
		<div class="wrap_title">
		<?php echo $model_data['modelData_1']['levelDsc']['2'];?>
		</div>
		<!-- 關卡敘述 END -->
		<div class="news"><h2>資訊區</h2></div>		
		<div class="wrap_title_2">
		<?php echo isset($model_data['modelData_1']['level_2'])?$model_data['modelData_1']['level_2']:'';?>
		</div>
		<div class="travel_tb">
		
		<table >
			<tr>
				<th width="20%"></th>
				<th width="20%"><p>中部</p></th>
				<th width="20%"><p>北部</p></th>
			</tr>
			<tr>
				<td style="text-align:center">遊樂園</td>
				<td>
				<textarea onchange="m1_setTextArea('textarea_1')" id="textarea_1"></textarea>
				</td>
				<td>
				<textarea onchange="m1_setTextArea('textarea_2')" id="textarea_2"></textarea>
				</td>
			</tr>
			<tr>
				<td class="s_1" style="text-align:center">文化涵養</td>
				<td class="s_1">
				<textarea onchange="m1_setTextArea('textarea_3')" id="textarea_3"></textarea>
				</td>
				<td class="s_1">
				<textarea onchange="m1_setTextArea('textarea_4')" id="textarea_4"></textarea>
				</td>
			</tr>	
			<tr>
				<td style="text-align:center">自然景觀</td>
				<td>
				<textarea onchange="m1_setTextArea('textarea_5')" id="textarea_5"></textarea>
				</td>
				<td>
				<textarea onchange="m1_setTextArea('textarea_6')" id="textarea_6"></textarea>
				</td>
			</tr>
		</table>
		<!-----按鈕區----->
		<div id="but_mod">
			<div class="area">
				<ul>	
					<li class="aa"><button class="button button-raised" onclick="m1_goNext_2()" type="button">下一關</button></li>								
				</ul>
			</div>
		</div>
		<!-----按鈕區END----->
		</div>
	</div>
	<div id="m1_game_3"  style="display:none">
		<div class="speed">
				<ul>
					<li><div >1</div></li>
					<li><div >2</div></li>
					<li><div  class="s_1">3</div></li>
				</ul>
			</div>	
		<!-- 關卡敘述-->
		<div class="wrap_title">
		<?php echo $model_data['modelData_1']['levelDsc']['3'];?>
		</div>
		<!-- 關卡敘述 END -->
		<!-- 學生資訊 -->
		<div class="news"><h2>資訊區</h2></div>
		<div class="wrap_title_2">
		<?php echo isset($model_data['modelData_1']['level_3'])?$model_data['modelData_1']['level_3']:'';?>
		</div>
		<!-- 學生資訊END -->	
<!-- 選擇項目 -->
	<div class="travel_tb">
		<div class="travel_area1">
			<div class="travel_tb">
		
			<table>
				<tr>
					<th></th>
					<th></th>
				</tr>
<?php
if(isset($model_data['modelData_1']['option_dsc'][1]) and count($model_data['modelData_1']['option_dsc'][1]) >0){
		$x=false;
		$dsc = '';
	foreach($model_data['modelData_1']['option_dsc'][1] as $key => $value){
		if($x){
			$x = false;
			$dsc = 'class="s_1"';
		}else{
			$x = true;
			$dsc = '';
		}
?>
<tr>
	<td <?php echo $dsc; ?>>
		<input type="checkbox" name="option_2" id="option_2_<?php echo $key;?>" value="<?php echo $value;?>" onclick="option_checkbox(this)">
	</td>
	<td <?php echo $dsc; ?>>
		<label for="option_2_<?php echo $key;?>"><?php echo $value;?></label>
	</td>
</tr>
<?php		
	}
}
?>		
	</table>
<!-----按鈕區----->
	<div id="but_mod">
		<div class="area">
			<ul>	
				<li class="aa"><button class="button button-raised" onclick="m1_goNext_Module()" type="button">下一關</button></li>								
			</ul>
		</div>
	</div>
<!-----按鈕區END----->	
		</div>
	</div>
</div>
<!-- 選擇項目 end-->			
	</div>	
</div>
<script language="javascript">
//過濾ck區內的A連結
$( document ).ready(function() {
	$("#ckedit_area_1 a").each(function(){
		var hrefDsc = $(this).attr('href');
		if(hrefDsc != '#'){
			var htmlDsc = "window.open('"+ hrefDsc +"','', config='toolbar=no,location=no,status=no,titlebar=no');";
		//console.log(htmlDsc);
			$(this).attr('onclick',htmlDsc).attr('target','_blank').attr('href','#');
		}
	});
});


var m1_next_level_a = false;
var m1_next_level_b = false;

function m1_goNext(){
	var sendTalkData = {};
		sendTalkData.room_id = roomID;
		sendTalkData.com_dsc = 'web_m1_goNextLevel';
		sendTalkData.user_type = userType;
	var json_data = JSON.stringify(sendTalkData);
		socket.emit('modelsComman', json_data); 
<?php 
if($model_data['userType'] == 'A'){
?>
m1_next_level_a = true;
<?php
}else{
?>
m1_next_level_b = true;
<?php
}
?>	
	
	if(m1_next_level_a && m1_next_level_b){
		nowLevelType =2;
		$('#m1_game_1').hide();
		$('#m1_game_2').show();
		$('#m1_game_3').hide();
		m1_next_level_a = false;
		m1_next_level_b = false;

		if(!isView){
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm1_goNext';//動作類型
				newOptionOBj.dataType_Dsc = '模組1進入第2關';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M1_GoNext';//動作內容敘述
				newOptionOBj.dataFunction_Value = '';//動作內容敘述
			option_record.push(newOptionOBj);
		}		
	}	
}


function web_m1_goNextLevel(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m1_next_level_<?php echo ($model_data['userType'] == 'A')?'b':'a'; ?> = true;
	}
	if(m1_next_level_a && m1_next_level_b){
		nowLevelType =2;
		
		$('#m1_game_1').hide();
		$('#m1_game_2').show();
		$('#m1_game_3').hide();
		m1_next_level_a = false;
		m1_next_level_b = false;
		if(!isView){
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm1_goNext';//動作類型
				newOptionOBj.dataType_Dsc = '模組1進入第2關';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M1_GoNext';//動作內容敘述
				newOptionOBj.dataFunction_Value = '';//動作內容敘述
			option_record.push(newOptionOBj);
		}
	}	
}

function m1_goNext_2(){
	var sendTalkData = {};
		sendTalkData.room_id = roomID;
		sendTalkData.com_dsc = 'web_m1_goNextLevel_2';
		sendTalkData.user_type = userType;
	var json_data = JSON.stringify(sendTalkData);
		socket.emit('modelsComman', json_data); 

<?php 
if($model_data['userType'] == 'A'){
?>
m1_next_level_a = true;
<?php
}else{
?>
m1_next_level_b = true;
<?php
}
?>	
	
	if(m1_next_level_a && m1_next_level_b){
		nowLevelType =3;
		
		$('#m1_game_1').hide();
		$('#m1_game_2').hide();
		$('#m1_game_3').show();
		m1_next_level_a = false;
		m1_next_level_b = false;
		if(!isView){
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm1_goNext2';//動作類型
				newOptionOBj.dataType_Dsc = '模組1進入第3關';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M1_GoNext2';//動作內容敘述
				newOptionOBj.dataFunction_Value = '';//動作內容敘述
			option_record.push(newOptionOBj);
		}
	}	
}

function m1_goNext_Module(){

<?php 
if($model_data['userType'] == 'A'){
?>
if( !m1_next_level_a ){
	var sendTalkData = {};
		sendTalkData.room_id = roomID;
		sendTalkData.com_dsc = 'web_m1_goNextModule';
		sendTalkData.user_type = userType;
	var json_data = JSON.stringify(sendTalkData);
		socket.emit('modelsComman', json_data); 
		m1_next_level_a = true;
}

<?php
}else{
?>
if( !m1_next_level_b){
	var sendTalkData = {};
		sendTalkData.room_id = roomID;
		sendTalkData.com_dsc = 'web_m1_goNextModule';
		sendTalkData.user_type = userType;
	var json_data = JSON.stringify(sendTalkData);
		socket.emit('modelsComman', json_data); 
	m1_next_level_b = true;	
}

<?php
}
?>  
}


function web_m1_goNextLevel_2(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m1_next_level_<?php echo ($model_data['userType'] == 'A')?'b':'a'; ?> = true;
	}
	if(m1_next_level_a && m1_next_level_b){
		nowLevelType =3;

		$('#m1_game_1').hide();
		$('#m1_game_2').hide();
		$('#m1_game_3').show();
		m1_next_level_a = false;
		m1_next_level_b = false;
		if(!isView){
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm1_goNext2';//動作類型
				newOptionOBj.dataType_Dsc = '模組1進入第3關';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M1_GoNext2';//動作內容敘述
				newOptionOBj.dataFunction_Value = '';//動作內容敘述
			option_record.push(newOptionOBj);
		}		
	}		
}

function web_m1_goNextModule(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m1_next_level_<?php echo ($model_data['userType'] == 'A')?'b':'a'; ?> = true;
		if(m1_next_level_a && m1_next_level_b){
				m1_next_level_a = false;
				m1_next_level_b = false;
				get_NextModel();
		}			
	}
		
}

//內容同步
function m1_setTextArea(getID){
	var getValue =  $('#'+getID).val();
	var sendTalkData = {};
		sendTalkData.room_id = roomID;
		sendTalkData.com_dsc = 'web_m1_setTextArea';
		sendTalkData.user_type = userType;
		sendTalkData.obj_id = getID;
		sendTalkData.obj_value = getValue;
	var json_data = JSON.stringify(sendTalkData);
		socket.emit('modelsComman', json_data); 
		
	if(!isView){
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'setTextArea';//動作類型
			newOptionOBj.dataType_Dsc = '設定文字區域的文字資料';//動作類型敘述
			newOptionOBj.dataFunction = 'record_SetTextArea';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = getID;//對象ID
			newOptionOBj.dataFunction_Value = getValue;//動作內容敘述
		option_record.push(newOptionOBj);
		
		//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '自己';
			newScoresOBj.event = '填入答案';//動作類型
			newScoresOBj.data = getValue;//內容值
			newScoresOBj.title = '閱讀出題模組 2';//題目
		scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end

	}		
}

//從夥伴那邊接收到文字資料並修改欄位值
function m1_getTextArea(getID,getValue){
	$('#'+getID).val(getValue);
	if(!isView){
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'setTextArea';//動作類型
			newOptionOBj.dataType_Dsc = '設定文字區域的文字資料';//動作類型敘述
			newOptionOBj.dataFunction = 'record_SetTextArea';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = getID;//對象ID
			newOptionOBj.dataFunction_Value = getValue;//動作內容敘述
		option_record.push(newOptionOBj);
		
		//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '夥伴';
			newScoresOBj.event = '填入答案';//動作類型
			newScoresOBj.data = getValue;//內容值
			newScoresOBj.title = '閱讀出題模組 2';//題目
		scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end

	}
}

//內容同步
function web_m1_setTextArea(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m1_getTextArea(getWebValue['obj_id'],getWebValue['obj_value']);
	}
}

</script>