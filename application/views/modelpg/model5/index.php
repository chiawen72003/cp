<div id="m5_module_area"  style="display:none">
	<div  id="m5_game_1" >
		<div class="speed">
				<ul>
					<li><div class="s_1">1</div></li>
					<li><div >2</div></li>
				</ul>
			</div>		
		<!-- 關卡敘述-->
		<div class="wrap_title">
		<?php echo $model_data['modelData_5']['levelDsc']['1'];?>
		</div>
		<!-- 關卡敘述 END -->
		<div class="river_wrap">
		<div class="river">
			<table class="river_bk">
				<tr>
					<td  valign ="bottom">
						<div id="m5_side_A">
						<img src="<?php echo base_url('public/images/m5_wolf.gif'); ?>" id="wolf">
						<img src="<?php echo base_url('public/images/m5_sheep.gif'); ?>" id="sheep" >
						<img src="<?php echo base_url('public/images/m5_vegetable.gif'); ?>"  id="vegetable" >
						</div>
					</td>
					<td style="width:380px;" >
						<div id="m5_ship_Area" class="m5_droppable" style="background-image:url(<?php echo base_url('public/images/m5_ship_1.png'); ?>);background-repeat: no-repeat;margin-left:-1%;width:230px;"  >
						<button class="button button-3d button-box button-rounded" type="button" value="開船" id="moveShip" onclick="<?php echo ($model_data['userType'] == 'A')?'m5_move_ship()':''; ?>">開船</button>
						<button class="button button-3d button-box button-rounded" type="button" value="下貨物" id="throwGoods" onclick="<?php echo ($model_data['userType'] == 'A')?'m5_throw_goods()':''; ?>">下貨物</button>
						</div>
					</td>
					<td valign ="bottom" style="width:27%;">
						<div id="m5_side_B">
						</div>
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td style="background-image:url(<?php echo base_url('public/images/m5_rivers.gif'); ?>); background-size:120px 100%;width:380px";>
					</td>
					<td>
					</td>
				</tr>			
			</table>
		<div class="fbbox" style="">
		  <div>
			<div class="abgne_tab">
				<ul class="tabs">
					<li class="active"><a onclick="">排行榜</a></li>
				</ul>
			<div class="tab_container">
			<div class="tab_content">
			<table>
			<tr>
				<th>名次</th>
				<th>操作次數</th>
			</tr>
	<?php
	if(isset($model_data['modelData_5']['orderList_1']) and count($model_data['modelData_5']['orderList_1']) > 0){
		foreach($model_data['modelData_5']['orderList_1'] as $key => $value){
	?>
			<tr>
				<td>第<?php echo $key+1; ?>名</td>
				<td><?php echo $value; ?>次</td>
			</tr>		
	<?php
		}
	}
	?>

			</table>
			</div>
			</div>
			</div>
		  </div>		
		</div>		
		
	</div>	
	<!-----按鈕區----->
	<div id="but_mod">
		<div class="area">
			<ul>	
				<li class="aa"><button class="button button-raised" onclick="m2_goNext()" type="button">下一關</button></li>								
			</ul>
		</div>
	</div>
	<!-----按鈕區END----->	
	</div>	
	</div>

	<div  id="m5_game_2"  style="display:none" >
		<div class="speed">
			<ul>
				<li><div >1</div></li>
				<li><div class="s_1">2</div></li>
			</ul>
		</div>		
		<!-- 關卡敘述-->
		<div class="wrap_title">
		<?php echo $model_data['modelData_5']['levelDsc']['2'];?>
		</div>
		<!-- 關卡敘述 END -->
<div class="river_wrap">
	<div class="river">
		<table class="river_bk" >
		<tr>
			<td valign ="bottom">
				<div id="m5_side_A_2">
					<img src="<?php echo base_url('public/images/m5_good_man.png'); ?>" subid="people_good" id="people_1">
					<img src="<?php echo base_url('public/images/m5_good_man.png'); ?>" subid="people_good" id="people_2">
					<img src="<?php echo base_url('public/images/m5_good_man.png'); ?>" subid="people_good" id="people_3">
					<img src="<?php echo base_url('public/images/m5_bad_man.png'); ?>" subid="people_bad"  id="people_4">
					<img src="<?php echo base_url('public/images/m5_bad_man.png'); ?>" subid="people_bad"  id="people_5">
					<img src="<?php echo base_url('public/images/m5_bad_man.png'); ?>" subid="people_bad"  id="people_6">
				</div>			
			</td>
			<td class="bottom" style="width:380px;">
				<div id="m5_ship_Area_2"  style="background-image:url(<?php echo base_url('public/images/m5_ship_2.png'); ?>);background-repeat: no-repeat;margin-left:-1%;width:230px;" >
					<ul>
						<li >
							<button class="button button-3d button-box button-rounded" id="moveShip_2" onclick="<?php echo ($model_data['userType'] == 'A')?'m5_move_ship_2()':''; ?>">開船</button>
							<button class="button button-3d button-box button-rounded" id="throwPeople_1" onclick='<?php echo ($model_data['userType'] == 'A')?'m5_throw_peoples("seat_1")':''; ?>'>下船</button>
							<button class="button button-3d button-box button-rounded" id="throwPeople_2" onclick='<?php echo ($model_data['userType'] == 'A')?'m5_throw_peoples("seat_2")':''; ?>'>下船</button>
						</li>
					</ul>
					<ul>
						
						<li class="m5_droppable2"  id="seat_1" style="width:50px;height:100px;"></li>
						<li class="m5_droppable2"  id="seat_2" style="width:50px;height:100px;"></li>
					</ul>
				</div>
			</td>
			<td valign ="bottom" style="width:27%;">
				<div id="m5_side_B_2">
				</div>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td style="background-image:url(<?php echo base_url('public/images/m5_rivers.gif'); ?>); background-size:120px 100%;width:380px";>
			</td>
			<td>
			</td>
		</tr>		
		</table>
		
		<div class="fbbox" style="">
		  <div>
			<div class="abgne_tab">
				<ul class="tabs">
					<li class="active"><a onclick="">排行榜</a></li>
				</ul>
			<div class="tab_container">
			<div class="tab_content">
			<table>
			<tr>
				<th>名次</th>
				<th>操作次數</th>
			</tr>
	<?php
	if(isset($model_data['modelData_5']['orderList_2']) and count($model_data['modelData_5']['orderList_2']) > 0){
		foreach($model_data['modelData_5']['orderList_2'] as $key => $value){
	?>
			<tr>
				<td>第<?php echo $key+1; ?>名</td>
				<td><?php echo $value; ?>次</td>
			</tr>		
	<?php
		}
	}
	?>

			</table>
		  </div>		
		</div>	
		</div>		
	</div>
	</div>
</div>	

<script language="javascript">
var m5_canAction = <?php echo ($model_data['userType'] == 'A')?'true':'false'; ?>;
var m5_sideType = "left";//船的位置
var m5_clone_obj = '';//船上的貨物
var m5_clone_people = '';//船上的人
var m5_clone_people_2 = '';//船上的人
var m5_has_goods = false;//船上目前是否有貨物
var m5_has_people_1 = false;//船上目前是否有人
var m5_has_people_2 = false;//船上目前是否有人

$(function() {
<?php 
	if($model_data['userType'] == 'A')
{
?>

	$( '#m5_side_A img' ).each(function(){
		$(this).draggable(
			{
			  helper: "clone"
			}
		);
	});
	$( '#m5_side_A_2 img' ).each(function(){
		$(this).draggable(
			{
			  helper: "clone"
			}
		);
	});
<?php
}
?>	
	$( ".m5_droppable" ).droppable({
      drop: function( event, ui ) {
		if(!m5_has_goods){
			var getID = ui.draggable.attr('id');
			m5_moveToShip(getID);
		}		
      }
    });
	
	$( ".m5_droppable2" ).droppable({
		drop: function( event, ui ) {
			var seat_dsc = $(this).attr('id');
			if( seat_dsc == "seat_1" && !m5_has_people_1){
				var getID = ui.draggable.attr('id');
				m5_moveToShip_2(seat_dsc,getID);
			}
			if( seat_dsc == "seat_2" && !m5_has_people_2){
				var getID = ui.draggable.attr('id');
				m5_moveToShip_2(seat_dsc,getID);
			}
		}
    });
});

//拖曳貨物
function m5_moveToShip(getID){
	m5_clone_obj = $('#'+getID).clone();
	m5_clone_obj.attr('class','');
	$('#'+getID).remove();
	$('#m5_ship_Area').append(m5_clone_obj);
	m5_has_goods = true;

	//紀錄動作
	var newOptionOBj =  $.extend(true,{}, option_obj);
		newOptionOBj.dataType = 'm5_dragObj';//動作類型
		newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
		newOptionOBj.dataFunction = 'record_M5DragObj';//動作內容敘述
		newOptionOBj.dataFunction_ObjID = 'm5_ship_Area';
		newOptionOBj.dataFunction_Value = m5_clone_obj.attr('id');
	option_record.push(newOptionOBj);
	//紀錄動作 end 
	
	if( m5_canAction ){

		var sendTalkData = { };
		sendTalkData.room_id = roomID;
		sendTalkData.com_dsc = 'web_m5_SetMoveToShip';
		sendTalkData.user_type = userType;
		sendTalkData.get_ID = getID;
		var json_data = JSON.stringify(sendTalkData);
		socket.emit('modelsComman', json_data); 
		
		//紀錄閱卷資料
		var objDsc = '';
		if(getID == 'wolf'){
			objDsc = '狼';
		}
		if(getID == 'sheep'){
			objDsc = '羊';
		}
		if(getID == 'vegetable'){
			objDsc = '蔬菜';
		}
		
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '自己';
			newScoresOBj.event = '拖曳物件';//動作類型
			newScoresOBj.data = '將'+objDsc+'拖上船';//內容值
			newScoresOBj.title = '數學渡河邏輯遊戲模組 1';//題目
		scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end

	}	
}

//人上船
function m5_moveToShip_2(seat_dsc,getID){
	if(seat_dsc == "seat_1"){
		m5_clone_people = $('#'+getID).clone();
		m5_clone_people.attr('class','');
		$('#'+getID).remove();
		$('#seat_1').append(m5_clone_people);
		m5_has_people_1 = true;//船上目前是否有人
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm5_dragObj';//動作類型
			newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M5DragObj';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'seat_1';
			newOptionOBj.dataFunction_Value = m5_clone_people.attr('id');
		option_record.push(newOptionOBj);
		//紀錄動作 end 
		//紀錄閱卷資料
		var objDsc = '';
		if(getID == 'people_1' || getID == 'people_2' || getID == 'people_3'){
			objDsc = '傳教士';
		}
		if(getID == 'people_4' || getID == 'people_5' || getID == 'people_6'){
			objDsc = '食人族';
		}
		
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '自己';
			newScoresOBj.event = '拖曳物件';//動作類型
			newScoresOBj.data = '將'+objDsc+'拖上船';//內容值
			newScoresOBj.title = '數學渡河邏輯遊戲模組 2';//題目
		scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end
	}
	if(seat_dsc == "seat_2"){
		m5_clone_people_2 = $('#'+getID).clone();
		m5_clone_people_2.attr('class','');
		$('#'+getID).remove();
		$('#seat_2').append(m5_clone_people_2);		
		m5_has_people_2 = true;//船上目前是否有人
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm5_dragObj';//動作類型
			newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M5DragObj';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'seat_2';
			newOptionOBj.dataFunction_Value = m5_clone_people_2.attr('id');
		option_record.push(newOptionOBj);
		//紀錄動作 end 
		//紀錄閱卷資料
		var objDsc = '';
		if(getID == 'people_1' || getID == 'people_2' || getID == 'people_3'){
			objDsc = '傳教士';
		}
		if(getID == 'people_4' || getID == 'people_5' || getID == 'people_6'){
			objDsc = '食人族';
		}
		
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '自己';
			newScoresOBj.event = '拖曳物件';//動作類型
			newScoresOBj.data = '將'+objDsc+'拖上船';//內容值
			newScoresOBj.title = '數學渡河邏輯遊戲模組 2';//題目
		scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end		
	}

	if(m5_canAction){
		var sendTalkData = { };
		sendTalkData.room_id = roomID;
		sendTalkData.com_dsc = 'web_setPeopleToSeat';
		sendTalkData.user_type = userType;
		sendTalkData.get_ID = getID;
		sendTalkData.get_seat = seat_dsc;		
		var json_data = JSON.stringify(sendTalkData);
		socket.emit('modelsComman', json_data); 
	}
	
}


//移動船
function m5_move_ship(){
	var x_y = $("#m5_ship_Area").offset();
	//從對岸開船傳送回來
	if( m5_sideType == "right" ){
		for(var x=0,y=0;x<10;x++,y+=20){
			var tempValue = x_y.left - y;
			$("#m5_ship_Area").offset({top:x_y.top,left:tempValue});
		}
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm5_moveShip';//動作類型
			newOptionOBj.dataType_Dsc = '移動船隻';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M5MoveShip';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'm5_ship_Area';
			newOptionOBj.dataFunction_Value = x_y.top+"||"+tempValue;
		option_record.push(newOptionOBj);
		//紀錄動作 end 
		
		//如果有貨物，自動載下貨物
		if(m5_has_goods){
			m5_clone_obj.attr('class','m5_draggable_left');
			$('#m5_side_A').append(m5_clone_obj);
			m5_has_goods = false;
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm5_dragObj';//動作類型
				newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M5DragObj';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = 'm5_side_A';
				newOptionOBj.dataFunction_Value = m5_clone_obj.attr('id');
			option_record.push(newOptionOBj);
			//紀錄動作 end 
		}
		
		if(m5_canAction){	
			//紀錄閱卷資料
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '按下按鈕';//動作類型
				newScoresOBj.data = '開船';//內容值
				newScoresOBj.title = '數學渡河邏輯遊戲模組 1';//題目
			scores_record.push(newScoresOBj);			
			//紀錄閱卷資料 end
			
			//左邊物件增加拖曳屬性，關閉右邊物件拖曳功能
			$( ".m5_draggable_right" ).draggable(
				{
				  helper: "clone"
				}
			);
			$('#m5_side_B img').each(function(){
				$(this).draggable( 'disable' );
			});
			
			//左邊物件增加拖曳屬性，並關閉拖曳功能
			$( ".m5_draggable_left" ).draggable(
				{
				  helper: "clone"
				}
			);
			$('#m5_side_A img').each(function(){
				$(this).draggable( 'disable' );
			});
			
			
			var sendTalkData = { };
			sendTalkData.room_id = roomID;
			sendTalkData.com_dsc = 'web_moveShip';
			sendTalkData.user_type = userType;
			var json_data = JSON.stringify(sendTalkData);
			socket.emit('modelsComman', json_data); 
			
			
			//夥伴可以動作
			var sendTalkData = { };
			sendTalkData.room_id = roomID;
			sendTalkData.com_dsc = 'web_m5_changeTime';
			sendTalkData.user_type = userType;
			var json_data = JSON.stringify(sendTalkData);
			socket.emit('modelsComman', json_data); 

			$('#moveShip').attr('onclick','');
			$('#throwGoods').attr('onclick','');
			m5_canAction = false;			
		}
			m5_sideType = "left";
			m5_chkRightSide();
		
			m5Charts_0++;//第一關次數加1
	}else if( m5_sideType == "left" ){
		//傳送到對岸
		for(var x=0,y=0;x<10;x++,y+=20){
			var tempValue = x_y.left + y;
			$("#m5_ship_Area").offset({top:x_y.top,left:tempValue});
		}
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm5_moveShip';//動作類型
			newOptionOBj.dataType_Dsc = '移動船隻';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M5MoveShip';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'm5_ship_Area';
			newOptionOBj.dataFunction_Value = x_y.top+"||"+tempValue;
		option_record.push(newOptionOBj);
		//紀錄動作 end 
		if(m5_canAction){
			//紀錄閱卷資料
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '按下按鈕';//動作類型
				newScoresOBj.data = '開船';//內容值
				newScoresOBj.title = '數學渡河邏輯遊戲模組 1';//題目
			scores_record.push(newScoresOBj);			
			//紀錄閱卷資料 end
			
			//右邊邊物件增加拖曳屬性，並啟動拖曳功能
			$( ".m5_draggable_right" ).draggable(
				{
				  helper: "clone"
				}
			);
			$('#m5_side_B img').each(function(){
				$(this).draggable( 'enable' );
			});
			//左邊物件增加拖曳屬性，並關閉拖曳功能
			$( ".m5_draggable_left" ).draggable(
				{
				  helper: "clone"
				}
			);			
			$('#m5_side_A img').each(function(){
				$(this).draggable( 'disable' );
			});
			
			var sendTalkData = { };
			sendTalkData.room_id = roomID;
			sendTalkData.com_dsc = 'web_moveShip';
			sendTalkData.user_type = userType;
			var json_data = JSON.stringify(sendTalkData);
			socket.emit('modelsComman', json_data); 
		}
			m5_sideType = "right";	
			m5_chkLeftSide();
	}
}

//丟下貨物
function m5_throw_goods(){
	if(m5_clone_obj > ''){		
		//船在右邊
		if( m5_sideType == "right" ){
			m5_clone_obj.attr('class','m5_draggable_right');
			$('#m5_side_B').append(m5_clone_obj);
			
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm5_dragObj';//動作類型
			newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M5DragObj';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'm5_side_B';
			newOptionOBj.dataFunction_Value = m5_clone_obj.attr('id');
		option_record.push(newOptionOBj);
		//紀錄動作 end 

			
			if(m5_canAction){
				
			//紀錄閱卷資料
			var objDsc = '';
			if(m5_clone_obj.attr('id') == 'wolf'){
				objDsc = '狼';
			}
			if(m5_clone_obj.attr('id') == 'sheep'){
				objDsc = '羊';
			}
			if(m5_clone_obj.attr('id') == 'vegetable'){
				objDsc = '蔬菜';
			}
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '拖曳物件';//動作類型
				newScoresOBj.data = '將'+objDsc+'放下船';//內容值
				newScoresOBj.title = '數學渡河邏輯遊戲模組 1';//題目
			scores_record.push(newScoresOBj);			
			//紀錄閱卷資料 end
				
				$( ".m5_draggable_right" ).draggable(
					{
					  helper: "clone"
					}
				);
			}
			
			var sendTalkData = { };
			sendTalkData.room_id = roomID;
			sendTalkData.com_dsc = 'web_throwGoods';
			sendTalkData.user_type = userType;
			var json_data = JSON.stringify(sendTalkData);
			socket.emit('modelsComman', json_data); 
			
			m5_chkIsWin();
		}else{
			//船在左邊
			m5_clone_obj.attr('class','m5_draggable_left');
			$('#m5_side_A').append(m5_clone_obj);
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm5_dragObj';//動作類型
				newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M5DragObj';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = 'm5_side_A';
				newOptionOBj.dataFunction_Value = m5_clone_obj.attr('id');
			option_record.push(newOptionOBj);
			//紀錄動作 end 
			
			if(m5_canAction){
				//紀錄閱卷資料
				var objDsc = '';
				if(m5_clone_obj.attr('id') == 'wolf'){
					objDsc = '狼';
				}
				if(m5_clone_obj.attr('id') == 'sheep'){
					objDsc = '羊';
				}
				if(m5_clone_obj.attr('id') == 'vegetable'){
					objDsc = '蔬菜';
				}
				var newScoresOBj =  $.extend(true,{}, scores_obj);
					newScoresOBj.userType = '自己';
					newScoresOBj.event = '拖曳物件';//動作類型
					newScoresOBj.data = '將'+objDsc+'放下船';//內容值
					newScoresOBj.title = '數學渡河邏輯遊戲模組 1';//題目
				scores_record.push(newScoresOBj);			
				//紀錄閱卷資料 end				
				
				$( ".m5_draggable_left" ).draggable(
					{
					  helper: "clone"
					}
				);
			}
			var sendTalkData = { };
			sendTalkData.room_id = roomID;
			sendTalkData.com_dsc = 'web_throwGoods';
			sendTalkData.user_type = userType;
			var json_data = JSON.stringify(sendTalkData);
			socket.emit('modelsComman', json_data); 
		}
	}
	m5_clone_obj = '';
	m5_has_goods = false;
}


//移動船
function m5_move_ship_2(){
	//船上必須要有一個人操作才能動
	if(	m5_has_people_1 || m5_has_people_2){
		var x_y = $("#m5_ship_Area_2").offset();
		//從對岸開船傳送回來
		if( m5_sideType == "right" ){
			for(var x=0,y=0;x<10;x++,y+=20){
				var tempValue = x_y.left - y;
				$("#m5_ship_Area_2").offset({top:x_y.top,left:tempValue});
			}
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm5_moveShip';//動作類型
				newOptionOBj.dataType_Dsc = '移動船隻';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M5MoveShip';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = 'm5_ship_Area_2';
				newOptionOBj.dataFunction_Value = x_y.top+"||"+tempValue;
			option_record.push(newOptionOBj);
			//紀錄動作 end 

			
			//如果有人，自動卸載人
			if(m5_has_people_1){
				m5_clone_people.attr('class','m5_draggable_left');
				$('#m5_side_A_2').append(m5_clone_people);
				m5_has_people_1 = false;
				
				//紀錄動作
				var newOptionOBj =  $.extend(true,{}, option_obj);
					newOptionOBj.dataType = 'm5_dragObj';//動作類型
					newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
					newOptionOBj.dataFunction = 'record_M5DragObj';//動作內容敘述
					newOptionOBj.dataFunction_ObjID = 'm5_side_A_2';
					newOptionOBj.dataFunction_Value = m5_clone_people.attr('id');
				option_record.push(newOptionOBj);
				//紀錄動作 end 
			}
			if(m5_has_people_2){
				m5_clone_people_2.attr('class','m5_draggable_left');
				$('#m5_side_A_2').append(m5_clone_people_2);
				m5_has_people_2 = false;
				
				//紀錄動作
				var newOptionOBj =  $.extend(true,{}, option_obj);
					newOptionOBj.dataType = 'm5_dragObj';//動作類型
					newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
					newOptionOBj.dataFunction = 'record_M5DragObj';//動作內容敘述
					newOptionOBj.dataFunction_ObjID = 'm5_side_A_2';
					newOptionOBj.dataFunction_Value = m5_clone_people_2.attr('id');
				option_record.push(newOptionOBj);
				//紀錄動作 end 
			}
			
			if(m5_canAction){
				//紀錄閱卷資料
				var newScoresOBj =  $.extend(true,{}, scores_obj);
					newScoresOBj.userType = '自己';
					newScoresOBj.event = '按下按鈕';//動作類型
					newScoresOBj.data = '開船';//內容值
					newScoresOBj.title = '數學渡河邏輯遊戲模組 2';//題目
				scores_record.push(newScoresOBj);			
				//紀錄閱卷資料 end
			
				//右邊物件增加拖曳屬性，並關閉拖曳功能
				$( ".m5_draggable_right" ).draggable(
					{
					  helper: "clone"
					}
				);
				
				$('#m5_side_B_2 img').each(function(){
					$(this).draggable( 'disable' );
				});
				
				//左邊物件增加拖曳屬性，並關閉拖曳功能
				$( ".m5_draggable_left" ).draggable(
					{
					  helper: "clone"
					}
				);
				$('#m5_side_A_2 img').each(function(){
					$(this).draggable( 'disable' );
				});
				
				
				var sendTalkData = { };
				sendTalkData.room_id = roomID;
				sendTalkData.com_dsc = 'web_moveShip_2';
				sendTalkData.user_type = userType;
				var json_data = JSON.stringify(sendTalkData);
				socket.emit('modelsComman', json_data); 
				
				
				//夥伴可以動作
				var sendTalkData = { };
				sendTalkData.room_id = roomID;
				sendTalkData.com_dsc = 'web_m5_changeTime_2';
				sendTalkData.user_type = userType;
				var json_data = JSON.stringify(sendTalkData);
				socket.emit('modelsComman', json_data); 

				$('#moveShip_2').attr('onclick','');
				$('#throwPeople_1').attr('onclick','');
				$('#throwPeople_2').attr('onclick','');
				m5_canAction = false;			
			}
				m5_sideType = "left";
			m5Charts_1++;//第2關次數加1

		}else if( m5_sideType == "left" ){

			//傳送到對岸
			for(var x=0,y=0;x<10;x++,y+=20){
				var tempValue = x_y.left + y;
				$("#m5_ship_Area_2").offset({top:x_y.top,left:tempValue});
			}
	
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm5_moveShip';//動作類型
				newOptionOBj.dataType_Dsc = '移動船隻';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M5MoveShip';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = 'm5_ship_Area_2';
				newOptionOBj.dataFunction_Value = x_y.top+"||"+tempValue;
			option_record.push(newOptionOBj);
			//紀錄動作 end 			
			
			if(m5_canAction){
				//紀錄閱卷資料
				var newScoresOBj =  $.extend(true,{}, scores_obj);
					newScoresOBj.userType = '自己';
					newScoresOBj.event = '按下按鈕';//動作類型
					newScoresOBj.data = '開船';//內容值
					newScoresOBj.title = '數學渡河邏輯遊戲模組 2';//題目
				scores_record.push(newScoresOBj);			
				//紀錄閱卷資料 end
				
				
				//開啟右邊物件拖曳功能
				$( ".m5_draggable_right" ).draggable(
					{
					  helper: "clone"
					}
				);
				//左邊物件增加拖曳屬性，並關閉拖曳功能
				$( ".m5_draggable_left" ).draggable(
					{
					  helper: "clone"
					}
				);
				
				$('#m5_side_A_2 img').each(function(){
					$(this).draggable( 'disable' );
				});
				$('#m5_side_B_2 img').each(function(){
					$(this).draggable( 'enable' );
				});
				
				var sendTalkData = { };
				sendTalkData.room_id = roomID;
				sendTalkData.com_dsc = 'web_moveShip_2';
				sendTalkData.user_type = userType;
				var json_data = JSON.stringify(sendTalkData);
				socket.emit('modelsComman', json_data); 
			}
				m5_sideType = "right";	
		}
		m5_chkAllSide();//檢查兩邊狀態
	}
}


//把人放下來
function m5_throw_peoples(seatDsc){
	if(m5_clone_people > '' && seatDsc == "seat_1"){		
		//船在右邊
		if( m5_sideType == "right" ){
			m5_clone_people.attr('class','m5_draggable_right');
			$('#m5_side_B_2').append(m5_clone_people);
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm5_dragObj';//動作類型
				newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M5DragObj';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = 'm5_side_B_2';
				newOptionOBj.dataFunction_Value = m5_clone_people.attr('id');
			option_record.push(newOptionOBj);
			//紀錄動作 end 
			
			if(m5_canAction){
				//紀錄閱卷資料
				var objDsc = '';
				var getID = m5_clone_people.attr('id');
				if(getID == 'people_1' || getID == 'people_2' || getID == 'people_3'){
					objDsc = '傳教士';
				}
				if(getID == 'people_4' || getID == 'people_5' || getID == 'people_6'){
					objDsc = '食人族';
				}
				
				var newScoresOBj =  $.extend(true,{}, scores_obj);
					newScoresOBj.userType = '自己';
					newScoresOBj.event = '拖曳物件';//動作類型
					newScoresOBj.data = '將'+objDsc+'放下船';//內容值
					newScoresOBj.title = '數學渡河邏輯遊戲模組 2';//題目
				scores_record.push(newScoresOBj);			
				//紀錄閱卷資料 end		
				
				$( ".m5_draggable_right" ).draggable(
					{
					  helper: "clone"
					}
				);
				$('#m5_side_B_2 img').each(function(){
					$(this).draggable( 'enable' );
				});
			}
			
			var sendTalkData = { };
			sendTalkData.room_id = roomID;
			sendTalkData.com_dsc = 'web_throwPeoples';
			sendTalkData.user_type = userType;
			sendTalkData.seat_Dsc = seatDsc;
			var json_data = JSON.stringify(sendTalkData);
			socket.emit('modelsComman', json_data); 
			
			m5_chkAllSide();//檢查兩邊狀態
		}else{
			//船在左邊
			m5_clone_people.attr('class','m5_draggable_left');
			$('#m5_side_A_2').append(m5_clone_people);
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm5_dragObj';//動作類型
				newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M5DragObj';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = 'm5_side_A_2';
				newOptionOBj.dataFunction_Value = m5_clone_people.attr('id');
			option_record.push(newOptionOBj);
			//紀錄動作 end 
			
			if(m5_canAction){
				//紀錄閱卷資料
				var objDsc = '';
				var getID = m5_clone_people.attr('id');
				
				if(getID == 'people_1' || getID == 'people_2' || getID == 'people_3'){
					objDsc = '傳教士';
				}
				if(getID == 'people_4' || getID == 'people_5' || getID == 'people_6'){
					objDsc = '食人族';
				}
				
				var newScoresOBj =  $.extend(true,{}, scores_obj);
					newScoresOBj.userType = '自己';
					newScoresOBj.event = '拖曳物件';//動作類型
					newScoresOBj.data = '將'+objDsc+'放下船';//內容值
					newScoresOBj.title = '數學渡河邏輯遊戲模組 2';//題目
				scores_record.push(newScoresOBj);			
				//紀錄閱卷資料 end		
				
				$( ".m5_draggable_left" ).draggable(
					{
					  helper: "clone"
					}
				);
			}
			$('#m5_side_A_2 img').each(function(){
					$(this).draggable( 'enable' );
			});
			
			var sendTalkData = { };
			sendTalkData.room_id = roomID;
			sendTalkData.com_dsc = 'web_throwPeoples';
			sendTalkData.user_type = userType;
			sendTalkData.seat_Dsc = seatDsc;
			var json_data = JSON.stringify(sendTalkData);
			socket.emit('modelsComman', json_data); 
		}
		m5_clone_people = '';
		m5_has_people_1 = false;

	}
	
	if(m5_clone_people_2 > '' && seatDsc == "seat_2"){		
		//船在右邊
		if( m5_sideType == "right" ){
			m5_clone_people_2.attr('class','m5_draggable_right');
			$('#m5_side_B_2').append(m5_clone_people_2);
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm5_dragObj';//動作類型
				newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M5DragObj';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = 'm5_side_B_2';
				newOptionOBj.dataFunction_Value = m5_clone_people_2.attr('id');
			option_record.push(newOptionOBj);
			//紀錄動作 end 		
			
			if(m5_canAction){
				//紀錄閱卷資料
				var objDsc = '';
				var getID = m5_clone_people_2.attr('id');
				
				if(getID == 'people_1' || getID == 'people_2' || getID == 'people_3'){
					objDsc = '傳教士';
				}
				if(getID == 'people_4' || getID == 'people_5' || getID == 'people_6'){
					objDsc = '食人族';
				}
				
				var newScoresOBj =  $.extend(true,{}, scores_obj);
					newScoresOBj.userType = '自己';
					newScoresOBj.event = '拖曳物件';//動作類型
					newScoresOBj.data = '將'+objDsc+'放下船';//內容值
					newScoresOBj.title = '數學渡河邏輯遊戲模組 2';//題目
				scores_record.push(newScoresOBj);			
				//紀錄閱卷資料 end		
				
				
				$( ".m5_draggable_right" ).draggable(
					{
					  helper: "clone"
					}
				);
			}
			
			var sendTalkData = { };
			sendTalkData.room_id = roomID;
			sendTalkData.com_dsc = 'web_throwPeoples';
			sendTalkData.user_type = userType;
			sendTalkData.seat_Dsc = seatDsc;
			
			var json_data = JSON.stringify(sendTalkData);
			socket.emit('modelsComman', json_data); 
			
			m5_chkAllSide();//檢查兩邊狀態
		}else{
			//船在左邊
			m5_clone_people_2.attr('class','m5_draggable_left');
			$('#m5_side_A_2').append(m5_clone_people_2);
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm5_dragObj';//動作類型
				newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M5DragObj';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = 'm5_side_A_2';
				newOptionOBj.dataFunction_Value = m5_clone_people_2.attr('id');
			option_record.push(newOptionOBj);
			//紀錄動作 end 	
			
			if(m5_canAction){
				//紀錄閱卷資料
				var objDsc = '';
				var getID = m5_clone_people_2.attr('id');
				
				if(getID == 'people_1' || getID == 'people_2' || getID == 'people_3'){
					objDsc = '傳教士';
				}
				if(getID == 'people_4' || getID == 'people_5' || getID == 'people_6'){
					objDsc = '食人族';
				}
				
				var newScoresOBj =  $.extend(true,{}, scores_obj);
					newScoresOBj.userType = '自己';
					newScoresOBj.event = '拖曳物件';//動作類型
					newScoresOBj.data = '將'+objDsc+'放下船';//內容值
					newScoresOBj.title = '數學渡河邏輯遊戲模組 2';//題目
				scores_record.push(newScoresOBj);			
				//紀錄閱卷資料 end		
				
				
				$( ".m5_draggable_left" ).draggable(
					{
					  helper: "clone"
					}
				);
			}
			var sendTalkData = { };
			sendTalkData.room_id = roomID;
			sendTalkData.com_dsc = 'web_throwPeoples';
			sendTalkData.user_type = userType;
			sendTalkData.seat_Dsc = seatDsc;
			
			var json_data = JSON.stringify(sendTalkData);
			socket.emit('modelsComman', json_data); 
		}
		m5_clone_people_2 = '';
		m5_has_people_2 = false;		
	}	
}

function m5_changeTime(){
	$('#moveShip').attr('onclick','m5_move_ship()');
	$('#throwGoods').attr('onclick','m5_throw_goods()');
	m5_canAction = true;
	m5_sideType = "left";
	m5_clone_obj = '';
	m5_has_goods = false;
	
	$( '#m5_side_A img' ).each(function(){
		$(this).draggable(
			{
			  helper: "clone"
			}
		);
		$(this).draggable( 'enable' );
	});
	$( '#m5_side_B img' ).each(function(){
		$(this).draggable(
			{
			  helper: "clone"
			}
		);

		$(this).draggable( 'disable' );
	});
}

function m5_changeTime_2(){
	$('#moveShip_2').attr('onclick','m5_move_ship_2()');
	$('#throwPeople_1').attr('onclick','m5_throw_peoples("seat_1")');
	$('#throwPeople_2').attr('onclick','m5_throw_peoples("seat_2")');
	m5_canAction = true;
	m5_sideType = "left";
	m5_clone_people = '';//船上的人
	m5_clone_people_2 = '';//船上的人
	m5_has_people_1 = false;//船上目前是否有人
	m5_has_people_2 = false;//船上目前是否有人
	
	$( '#m5_side_A_2 img' ).each(function(){
		$(this).draggable(
			{
			  helper: "clone"
			}
		);
		$(this).draggable( 'enable' );
	});
	$( '#m5_side_B_2 img' ).each(function(){
		$(this).draggable(
			{
			  helper: "clone"
			}
		);
		$(this).draggable( 'disable' );
	});
}

//第一關 左邊檢查
function m5_chkLeftSide(){
	var has_wolf = false;
	var has_sheep = false;
	var has_vegetable = false;
	
	$('#m5_side_A').children().each(function(){
		if($(this).attr('id') == 'wolf'){
			has_wolf = true;
		}
		if($(this).attr('id') == 'sheep'){
			has_sheep = true;
		}
		if($(this).attr('id') == 'vegetable'){
			has_vegetable = true;
		}
	});	
	
	if( has_wolf && has_sheep){
		m5_gameOver('狼吃掉羊');
	}
	if( has_vegetable && has_sheep){
		m5_gameOver('羊吃掉蔬菜');
	}
}

//右邊檢查
function m5_chkRightSide(){
	var has_wolf = false;
	var has_sheep = false;
	var has_vegetable = false;
	$('#m5_side_B').children().each(function(){
		if($(this).attr('id') == 'wolf'){
			has_wolf = true;
		}
		if($(this).attr('id') == 'sheep'){
			has_sheep = true;
		}
		if($(this).attr('id') == 'vegetable'){
			has_vegetable = true;
		}
	});	
	
	if( has_wolf && has_sheep && !has_vegetable){
		m5_gameOver('狼吃掉羊');
	}
	if( has_vegetable && has_sheep && !has_wolf){
		m5_gameOver('羊吃掉蔬菜');
	}
}

//檢查兩邊人數狀況
function m5_chkAllSide(){

	var good_number = 0;
	var bad_number = 0;
	var need_check = true;
	var check_result = '';
	
	if(need_check){
		//左邊人數
		$('#m5_side_A_2').children().each(function(){
			if($(this).attr('subid') == 'people_bad' ){
				bad_number++;
			}
			if($(this).attr('subid') == 'people_good' ){
				good_number++;
			}
		});
		
		
		//食人族大於傳教士且必須有傳教士
		if(bad_number > good_number && good_number > 0){
			need_check = false;
			check_result = 'over';
		}
	}
		good_number = 0;
		bad_number = 0;
	if(need_check){
		console.log('進入');
		//右邊人數
		$('#m5_side_B_2').children().each(function(){
			if($(this).attr('subid') == 'people_bad' ){
				bad_number++;
			}
			if($(this).attr('subid') == 'people_good' ){
				good_number++;
			}
		});
		
		//如果人都上岸了
		if(bad_number == 3 && good_number == 3){
			need_check = false;
			check_result = 'Win';
		}
		console.log('壞人'+bad_number);
		console.log('好人'+good_number);
		if(need_check){
			//船現在在右邊
			if(m5_sideType == "right"){
				$('li[id="seat_1"] img').each(function(){
					if($(this).attr('subid') == 'people_bad' ){
						bad_number++;
					}
					if($(this).attr('subid') == 'people_good' ){
						good_number++;
					}
				});
				
				$('li[id="seat_2"] img').each(function(){
					if($(this).attr('subid') == 'people_bad' ){
						bad_number++;
					}
					if($(this).attr('subid') == 'people_good' ){
						good_number++;
					}
				});			
			}		
			
			//食人族大於傳教士且必須有傳教士
			if(bad_number > good_number && good_number > 0){
				need_check = false;
				check_result = 'over';
			}
		
		}
	}
	
	if( check_result == "over"){
		m5_gameOver_2('傳教士被食人族吃掉了!!');
	}
	if( check_result == "Win"){
		var html_dsc = "<li>系統:恭喜您成功將人物都送到另一邊!!</li>";
		//html_dsc += "<li>系統:遊戲重新開始!!</li>";
		$('#chatRoom').append(html_dsc);
		if( userType == 'A'){
			//為了避免同時觸發導致A、B各呼叫一次，通一由A做下一關呼叫
			get_NextModel();
		}
		
		//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'nextModule';//動作類型
				newOptionOBj.dataType_Dsc = '載入下一個模組';//動作類型敘述
				newOptionOBj.dataFunction = 'record_NextModel';//動作內容敘述
				newOptionOBj.dataFunction_Value = '';//動作內容敘述
			option_record.push(newOptionOBj);
		//紀錄動作 end

	}
}

function m5_chkIsWin(){
	var has_wolf = false;
	var has_sheep = false;
	var has_vegetable = false;
	$( '#m5_side_B img' ).each(function(){
		if($(this).attr('id') == 'wolf'){
			has_wolf = true;
		}
		if($(this).attr('id') == 'sheep'){
			has_sheep = true;
		}
		if($(this).attr('id') == 'vegetable'){
			has_vegetable = true;
		}
	});	
	
	if( has_wolf && has_sheep && has_vegetable){
		var tempData = $('#chatRoom').val();
		var html_dsc = "系統:恭喜您成功將物品送到另一邊!!\r\n";
			html_dsc += "系統:下一關開始!!\r\n";
			$('#chatRoom').val(html_dsc+tempData);
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm5_beginGame2';//動作類型
			newOptionOBj.dataType_Dsc = '模組5 進入第2關';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M5BeginGame2';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = '';
			newOptionOBj.dataFunction_Value = html_dsc;
		option_record.push(newOptionOBj);
		//紀錄動作 end 
		
		m5_sideType = "left";//船的位置
		m5_canAction = <?php echo ($model_data['userType'] == 'A')?'true':'false'; ?>;
		m5_sideType = "left";//船的位置
		m5_clone_obj = '';//船上的貨物
		m5_clone_people = '';//船上的人
		m5_clone_people_2 = '';//船上的人
		m5_has_goods = false;//船上目前是否有貨物
		m5_has_people_1 = false;//船上目前是否有人
		m5_has_people_2 = false;//船上目前是否有人
		
		$('#m5_game_1').hide();
		$('#m5_game_2').show();
		nowLevelType =2;
	}
}

function m5_gameOver(getMsg){
	var tempData = $('#chatRoom').val();
	var html_dsc = "系統:"+getMsg+"!!\r\n";
		html_dsc += "系統:遊戲重新開始!!\r\n"+tempData;
		$('#chatRoom').val(html_dsc);
		m5Charts_0=0;//第1關次數歸零

	if(!isView){
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm5_reSetGame';//動作類型
			newOptionOBj.dataType_Dsc = '模組5 第一關重新設置';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M5ReSetGame';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = '';
			newOptionOBj.dataFunction_Value = getMsg;
		option_record.push(newOptionOBj);
		//紀錄動作 end 
		m5_reSetGame();
	}
}

function m5_gameOver_2(getMsg){
	var tempData = $('#chatRoom').val();
	var html_dsc = "系統:"+getMsg+"!!\r\n";
		html_dsc += "系統:遊戲重新開始!!\r\n"+tempData;
		$('#chatRoom').val(html_dsc);
		m5Charts_1=0;//第2關次數歸零

	if(!isView){
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm5_reSetGame_2';//動作類型
			newOptionOBj.dataType_Dsc = '模組5 第2關重新設置';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M5ReSetGame_2';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = '';
			newOptionOBj.dataFunction_Value = getMsg;
		option_record.push(newOptionOBj);
		//紀錄動作 end 
		m5_reSetGame_2();
	}
}

function m5_reSetGame(){	
	var dsc1 = '<img src="<?php echo base_url('public/images/m5_wolf.gif'); ?>" id="wolf">';
	var dsc2 = '<img src="<?php echo base_url('public/images/m5_sheep.gif'); ?>" id="sheep" >';
	var dsc3 = '<img src="<?php echo base_url('public/images/m5_vegetable.gif'); ?>"  id="vegetable" >';
	$( '#m5_side_A img' ).each(function(){
		$(this).remove();
	});	

	$( '#m5_side_B img' ).each(function(){
		$(this).remove();
	});	
	$( 'div[id="m5_ship_Area"] img' ).each(function(){
		$(this).remove();
	});	
	
	$('#m5_side_A').append(dsc1).append(dsc2).append(dsc3);	
	
	$("#m5_ship_Area").css('top', '');
	$("#m5_ship_Area").css('left', '');
	<?php 
		if($model_data['userType'] == 'A')
	{
	?>
		$( '#m5_side_A img' ).each(function(){
			$(this).draggable(
				{
				  helper: "clone"
				}
			);
		});

		$('#moveShip').attr('onclick','m5_move_ship()');
		$('#throwGoods').attr('onclick','m5_throw_goods()');
		m5_canAction = true;
		m5_sideType = "left";
		m5_clone_obj = '';
		m5_has_goods = false;
		
	<?php
	}else{
	?>
		$('#moveShip').attr('onclick','');
		$('#throwGoods').attr('onclick','');
		m5_canAction = false;
		m5_sideType = "left";
		m5_clone_obj = '';
		m5_has_goods = false;

	<?php	
	}
	?>
}

function m5_reSetGame_2(){	
	var dsc1 = '<img src="<?php echo base_url('public/images/m5_good_man.png'); ?>"  subid="people_good" id="people_1" >';
	var dsc2 = '<img src="<?php echo base_url('public/images/m5_good_man.png'); ?>"   subid="people_good" id="people_2" >';
	var dsc3 = '<img src="<?php echo base_url('public/images/m5_good_man.png'); ?>"   subid="people_good" id="people_3" >';
	var dsc4 = '<img src="<?php echo base_url('public/images/m5_bad_man.png'); ?>"   subid="people_bad"  id="people_4" >';
	var dsc5 = '<img src="<?php echo base_url('public/images/m5_bad_man.png'); ?>"   subid="people_bad"  id="people_5" >';
	var dsc6 = '<img src="<?php echo base_url('public/images/m5_bad_man.png'); ?>"   subid="people_bad"  id="people_6" >';
	$( '#m5_side_A_2 img' ).each(function(){
		$(this).remove();
	});	

	$( '#m5_side_B_2 img' ).each(function(){
		$(this).remove();
	});	
	$( '#seat_1' ).html('');
	$( '#seat_2' ).html('');
	
	$('#m5_side_A_2').append(dsc1).append(dsc2).append(dsc3).append(dsc4).append(dsc5).append(dsc6);	
	
	$("#m5_ship_Area_2").css('top', '0px');
	$("#m5_ship_Area_2").css('left', '0px');
	
	<?php 
		if($model_data['userType'] == 'A')
	{
	?>
		$( '#m5_side_A_2 img' ).each(function(){
			$(this).draggable(
				{
				  helper: "clone"
				}
			);
		});

		$('#moveShip_2').attr('onclick','m5_move_ship_2()');
		$('#throwPeople_1').attr('onclick','m5_throw_peoples("seat_1")');
		$('#throwPeople_2').attr('onclick','m5_throw_peoples("seat_2")');
		m5_canAction = true;
		m5_sideType = "left";
		m5_clone_people = '';//船上的人
		m5_clone_people_2 = '';//船上的人
		m5_has_people_1 = false;//船上目前是否有人
		m5_has_people_2 = false;//船上目前是否有人

	<?php
	}else{
	?>
		$('#moveShip_2').attr('onclick','');
		$('#throwPeople_1').attr('onclick','');
		$('#throwPeople_2').attr('onclick','');
		m5_canAction = false;
		m5_sideType = "left";
		m5_clone_people = '';//船上的人
		m5_clone_people_2 = '';//船上的人
		m5_has_people_1 = false;//船上目前是否有人
		m5_has_people_2 = false;//船上目前是否有人
	<?php	
	}
	?>		
	
	if(!isView){
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm5_reSetGame_2';//動作類型
			newOptionOBj.dataType_Dsc = '模組5 第2關重新設置';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M5ReSetGame_2';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = '';
			newOptionOBj.dataFunction_Value = '';
		option_record.push(newOptionOBj);
		//紀錄動作 end 
	}
}

//移動船隻
function web_m5_SetMoveToShip(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m5_moveToShip(getWebValue['get_ID']);
	}
}

//權限轉移
function web_m5_changeTime_2(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m5_changeTime_2();
	}
}

//船隻移動
function web_moveShip(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m5_move_ship();
	}
}


//船隻移動
function web_moveShip_2(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m5_move_ship_2();
	}
}
//權限轉移
function web_m5_changeTime(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m5_changeTime();
	}
}

//丟下貨物
function web_throwGoods(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m5_throw_goods();
	}
}

//人上船
function web_setPeopleToSeat(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m5_moveToShip_2(getWebValue['get_seat'],getWebValue['get_ID']);
	}
}

//人員下船
function web_throwPeoples(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m5_throw_peoples(getWebValue['seat_Dsc']);
	}
}

//=================================================
//人物動態模組
var delTime = 250;
var MaxRounTime = 3;
var RounTime = 0;
var picWidth = 50;
var picHeight = 95;
var delTime_2 = 250;
var MaxRounTime_2 = 4;
var RounTime_2 = 0;
var picWidth_2 = 50;
var picHeight_2 = 95;
function run_img(){			
	var newLeft = 483 + (RounTime * picWidth);
	var newTop = RounTime * picHeight;
	var cssDsc = "url('<?php echo base_url('public/images/m5_pic_2.gif'); ?>') no-repeat scroll -"+ newLeft +"px -335px transparent";

	$('#people_1').css('background',cssDsc);
	RounTime++;
	if(RounTime == MaxRounTime){
		RounTime = 0;
		setTimeout("run_img()", 2000 );

	}else{
		setTimeout("run_img()", delTime );
	}
	
}


function run_img2(){			
	var newLeft = 50 + (RounTime_2 * picWidth_2);
	var newTop = RounTime_2 * picHeight_2;
	var cssDsc = "url('<?php echo base_url('public/images/m5_pic_2.gif'); ?>') no-repeat scroll -"+ newLeft +"px -335px transparent";

	$('#people_2').css('background',cssDsc);
	RounTime_2++;
	if(RounTime_2 == MaxRounTime_2){
		RounTime_2 = 0;
	}
		setTimeout("run_img2()", delTime_2 );
		
}
$( document ).ready(function() {
	//setTimeout("run_img()", delTime );
	//setTimeout("run_img2()", delTime );
});
</script>