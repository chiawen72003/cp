<div id="m4_module_area"  style="display:none">
	<div class="speed">
		<ul>
			<li><div class="s_1">1</div></li>
		</ul>
	</div>	
	<!-- 關卡敘述-->
	<div class="wrap_title">
	<?php echo isset($model_data['modelData_4']['levelDsc']['1'])?$model_data['modelData_4']['levelDsc']['1']:'';?>
	</div>
	<!-- 關卡敘述 END -->

	<div class="drink_wrap">
	<div class="drink_area3">
		<div id="drink_s">
		<table class="d_tb">
			<tr>
				<th colspan="3">1. 請選擇消費族群:</th>
			</tr>
			<tr>
				<td class="on" id="m4_td_0" onclick="m4_swType('0')"><img src="<?php echo base_url('public/images/m4_people_0.png'); ?>" />小孩</td>
				<td  id="m4_td_1" onclick="m4_swType('1')"><img src="<?php echo base_url('public/images/m4_people_1.png'); ?>"/>年輕人</td>
				<td  id="m4_td_2" onclick="m4_swType('2')"><img src="<?php echo base_url('public/images/m4_people_2.png'); ?>"/>中年人</td>
			</tr>
		</table >
		<table class="d_tb_2">
			<tr>
				<th style="background-color:#999999;" colspan="3">2.請選擇甜度-冰塊-珍珠</th>
			</tr>
			<tr>
				<th>甜度</th>
				<th>冰塊</th>
				<th>珍珠</th>
			</tr>
			</tr>
		</table>	
		<div class="set_1">
			<table>
			<tr >
				<td class="m4_droppable_1" subid="10" id="m4_Area_1_1"><img src="<?php echo base_url('public/images/m4_point_0.png');?>" class="m4_draggable" id="d_1"  style="width:129px;height:54px;"></td>
				<td style="background:url(<?php echo base_url('public/images/m4_pic_1.png');?>) no-repeat;background-size:100% 100%;">一般10分</td>
			</tr>
			<tr >
				<td class="m4_droppable_1" subid="8" id="m4_Area_1_2"></td>
				<td style="background:url(<?php echo base_url('public/images/m4_pic_2.png');?>) no-repeat;background-size:100% 100%;">少糖8分</td>
			</tr>
			<tr >
				<td class="m4_droppable_1" subid="5" id="m4_Area_1_3"></td>
				<td style="background:url(<?php echo base_url('public/images/m4_pic_3.png');?>) no-repeat;background-size:100% 100%;">半糖5分</td>
			 </tr>
			<tr >
				<td  class="m4_droppable_1" subid="3" id="m4_Area_1_4"></td>
				<td style="background:url(<?php echo base_url('public/images/m4_pic_4.png');?>) no-repeat;background-size:100% 100%;">微糖2分</td>
			</tr>
			<tr >
				<td class="m4_droppable_1" subid="0" id="m4_Area_1_5"></td>
				<td style="background:url(<?php echo base_url('public/images/m4_pic_5.png');?>) no-repeat;background-size:100% 100%;">無糖0分</td>
			</tr>
		</table>
		</div>
		<div class="set_1">	
		<table>
			<tr >
				<td class="m4_droppable_2" subid="5" id="m4_Area_2_1"><img src="<?php echo base_url('public/images/m4_point_1.png');?>" class="m4_draggable" id="d_2"  style="width:129px;height:54px;"></td>
				<td style="background:url(<?php echo base_url('public/images/m4_pic_6.png');?>) no-repeat;background-size:100% 100%;">正常</td>
			</tr>
			<tr >
				<td width="200px" class="m4_droppable_2" subid="3"  id="m4_Area_2_2"></td>
				<td style="background:url(<?php echo base_url('public/images/m4_pic_7.png');?>) no-repeat;background-size:100% 100%;">少冰</td>
			</tr>
			<tr >
				<td width="200px" class="m4_droppable_2" subid="1"  id="m4_Area_2_3"></td>
				<td style="background:url(<?php echo base_url('public/images/m4_pic_8.png');?>) no-repeat;background-size:100% 100%;">微冰</td>
			</tr>
			<tr >
				<td width="200px" class="m4_droppable_2" subid="0"  id="m4_Area_2_4"></td>
				<td style="background:url(<?php echo base_url('public/images/m4_pic_9.png');?>) no-repeat;background-size:100% 100%;">去冰</td>
			</tr>
		</table>
		</div>
		<div class="set_1">	
		<table>
			<tr >
				<td width="200px" class="m4_droppable_3" subid="1"  id="m4_Area_3_1">
					<img src="<?php echo base_url('public/images/m4_point_2.png');?>" class="m4_draggable" id="d_3"   style="width:129px;height:54px;">
				</td>
				<td style="background:url(<?php echo base_url('public/images/m4_area_0.png');?>) no-repeat;background-size:100% 100%;color:#37495E">大珍珠</td>
			</tr>
			<tr >
				<td width="200px" class="m4_droppable_3" subid="0"  id="m4_Area_3_2"></td>
				<td style="background:url(<?php echo base_url('public/images/m4_area_1.png');?>) no-repeat;background-size:100% 100%;color:#37495E">小珍珠</td>
			</tr>
		</table>
		</div>
	</div>	
	</div>
		
	<div class="fbbox" style="">
		<div>
		<div class="abgne_tab">
			<ul class="tabs">
				<li id="m4_sales_1"><a onclick="m4_changePG('1')" >小孩</a></li>
				<li id="m4_sales_2"><a onclick="m4_changePG('2')" >年輕人</a></li>
				<li id="m4_sales_3"><a onclick="m4_changePG('3')" >中年人</a></li>
			</ul>
			<div class="tab_container">
				<div id="m4_sales_pg_1" class="tab_content">
				<table>
				<tr>
					<th>銷售量</th>
					<th>操作次數</th>
				</tr>
		<?php
		if(isset($model_data['modelData_4']['type0List']) and count($model_data['modelData_4']['type0List']) > 0){
			foreach($model_data['modelData_4']['type0List'] as $key => $tempArray){
				foreach($tempArray as $value){
		?>
				<tr>
					<td><?php echo $key; ?></td>
					<td>第<?php echo $value; ?>次</td>
				</tr>		
		<?php
				}
			}
		}
		?>
				</table>
		  </div>
		<div id="m4_sales_pg_2" class="tab_content">
			<table>
			<tr>
				<th>銷售量</th>
				<th>操作次數</th>
			</tr>
		<?php
		if(isset($model_data['modelData_4']['type1List']) and count($model_data['modelData_4']['type1List']) > 0){
			foreach($model_data['modelData_4']['type1List'] as $key => $tempArray){
				foreach($tempArray as $value){
		?>
				<tr>
					<td><?php echo $key; ?></td>
					<td>第<?php echo $value; ?>次</td>
				</tr>		
		<?php
				}
			}
		}
		?>
		</table>
	</div>
		<div id="m4_sales_pg_3" class="tab_content">
			<table>
			<tr>
				<th>銷售量</th>
				<th>操作次數</th>
			</tr>
		<?php
		if(isset($model_data['modelData_4']['type2List']) and count($model_data['modelData_4']['type2List']) > 0){
			foreach($model_data['modelData_4']['type2List'] as $key => $tempArray){
				foreach($tempArray as $value){
		?>
				<tr>
					<td><?php echo $key; ?></td>
					<td>第<?php echo $value; ?>次</td>
				</tr>		
		<?php
				}
			}
		}
		?>
		</table>
	</div>
	</div>
			</div>
		</div>	
	</div>	
	<!-----按鈕區----->
	<div id="but_mod">
		<div class="area">
			<ul>	
				<li class="aa"><button class="button button-raised" onclick="m4_goNext_Module()" type="button">結束</button></li>
				<li class="aa"><button class="button button-raised" onclick="m4_begin_make()" type="button">調製</button></li>				
			</ul>
		</div>
	</div>
	<!-----按鈕區END----->				  

	</div>
</div>
<script language="javascript">
var m4_getType = '0';//對象
var m4_getD_1 = '10';//甜度
var m4_getD_2 = '5';//冰塊
var m4_getD_3 = '1';//珍珠
var m4_swPeopleTimes_0 = 0;//小孩
var m4_swPeopleTimes_1 = 0;//年輕人
var m4_swPeopleTimes_2 = 0;//成年人
var	m4_next_level_a = false;
var	m4_next_level_b = false;	



$(function() {
	$( ".m4_draggable" ).draggable(
		{
		  helper: "clone"
		}
	);
	$( ".m4_droppable_1" ).droppable({
      drop: function( event, ui ) {
        if(ui.draggable.attr('id') == "d_1"){
			var clone_obj = ui.draggable.clone();
			$(this).append(ui.draggable);
			m4_getD_1 = $(this).attr('subid');
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm4_dragObj';//動作類型
				newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M4DragObj';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = $(this).attr('id');
				newOptionOBj.dataFunction_Value = clone_obj.attr('id');//動作內容敘述
			option_record.push(newOptionOBj);
			//紀錄動作 end 
			//紀錄閱卷資料
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '糖度調整';//動作類型
				newScoresOBj.data = m4_getD_1+ ' 分';//內容值
				newScoresOBj.title = '最佳銷售組合遊戲模組';//題目
			scores_record.push(newScoresOBj);			
			//紀錄閱卷資料 end
			
		}
      }
    });
	$( ".m4_droppable_2" ).droppable({
      drop: function( event, ui ) {
        if(ui.draggable.attr('id') == "d_2"){
			var clone_obj = ui.draggable.clone();
			$(this).append(ui.draggable);
			m4_getD_2 = $(this).attr('subid');
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm4_dragObj';//動作類型
				newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M4DragObj';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = $(this).attr('id');
				newOptionOBj.dataFunction_Value = clone_obj.attr('id');//動作內容敘述
			option_record.push(newOptionOBj);
			//紀錄動作 end 
			var ice_dsc = '';
			if(m4_getD_2 == '5'){
				ice_dsc = '正常';
			}
			if(m4_getD_2 == '3'){
				ice_dsc = '少冰';
			}
			if(m4_getD_2 == '1'){
				ice_dsc = '微冰';
			}
			if(m4_getD_2 == '0'){
				ice_dsc = '去冰';
			}
			
			//紀錄閱卷資料
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '冰塊調整';//動作類型
				newScoresOBj.data = ice_dsc;//內容值
				newScoresOBj.title = '最佳銷售組合遊戲模組';//題目
			scores_record.push(newScoresOBj);			
			//紀錄閱卷資料 end
		}
      }
    });	
	$( ".m4_droppable_3" ).droppable({
      drop: function( event, ui ) {
        if(ui.draggable.attr('id') == "d_3"){
			var clone_obj = ui.draggable.clone();
			$(this).append(ui.draggable);
			m4_getD_3 = $(this).attr('subid');
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm4_dragObj';//動作類型
				newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M4DragObj';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = $(this).attr('id');
				newOptionOBj.dataFunction_Value = clone_obj.attr('id');//動作內容敘述
			option_record.push(newOptionOBj);
			//紀錄動作 end
			var ice_dsc = '';
			if(m4_getD_2 == '1'){
				ice_dsc = '大珍珠';
			}
			if(m4_getD_2 == '0'){
				ice_dsc = '小珍珠';
			}

			//紀錄閱卷資料
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '珍珠顆粒調整';//動作類型
				newScoresOBj.data = ice_dsc;//內容值
				newScoresOBj.title = '最佳銷售組合遊戲模組';//題目
			scores_record.push(newScoresOBj);			
			//紀錄閱卷資料 end			
		}
      }
    });	
});

//開始調製
function m4_begin_make(){
	if(m4_getType == '0'){
		if( m4_swPeopleTimes_0 == '5' ){
			return;
		}else{
			m4_swPeopleTimes_0++;
		}
	}
	if(m4_getType == '1'){
		if( m4_swPeopleTimes_1 == '5' ){
			return;		
		}else{
			m4_swPeopleTimes_1++;
		}
	}
	if(m4_getType == '2'){
		if( m4_swPeopleTimes_2 == '5' ){
			return;		
		}else{
			m4_swPeopleTimes_2++;
		}
	}
	
	
	var sendData = { };
		sendData.room_id = roomID;
		sendData.com_dsc = 'web_m4_getMakeData';
		sendData.user_type = userType;
		sendData.sw_type = m4_getType;
		sendData.d_1 = m4_getD_1;
		sendData.d_2 = m4_getD_2;
		sendData.d_3 = m4_getD_3;
		var json_data = JSON.stringify(sendData);
		socket.emit('modelsComman', json_data); 
	//紀錄閱卷資料
	var newScoresOBj =  $.extend(true,{}, scores_obj);
		newScoresOBj.userType = '自己';
		newScoresOBj.event = '按下按鈕';//動作類型
		newScoresOBj.data = '調製';//內容值
		newScoresOBj.title = '最佳銷售組合遊戲模組';//題目
	scores_record.push(newScoresOBj);			
	//紀錄閱卷資料 end			
		
}

//只有B才有的function 預防萬一這邊也放置一個空的function 
function web_m4_getMakeData(){
	
}

function m4_changePG(getID){
	for(var x=1;x<4;x++){
		if(getID == x){
			$('#m4_sales_'+x).attr('class','active');
			$('#m4_sales_pg_'+x).show();
		}else{
			$('#m4_sales_'+x).attr('class','');
			$('#m4_sales_pg_'+x).hide();
		}
	}
}

function m4_swType(getNumber){
	var dsc='';
	m4_getType = getNumber;
	if(getNumber == '0'){
		$('#m4_td_0').attr('class','on');
		dsc='小孩';
	}else{
		$('#m4_td_0').attr('class','');
	}
	if(getNumber == '1'){
		$('#m4_td_1').attr('class','on');
		dsc='年輕人';		
	}else{
		$('#m4_td_1').attr('class','');
	}
	if(getNumber == '2'){
		$('#m4_td_2').attr('class','on');
		dsc='中年人';		
	}else{
		$('#m4_td_2').attr('class','');
	}
	
	if(!isView){
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm4_swType';//動作類型
			newOptionOBj.dataType_Dsc = '選擇族群';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M4SwType';//動作內容敘述
			//newOptionOBj.dataFunction_ObjID = $(this).attr('id');
			newOptionOBj.dataFunction_Value = getNumber;//動作內容敘述
		option_record.push(newOptionOBj);
		//紀錄動作 end
		//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '自己';
			newScoresOBj.event = '選擇族群';//動作類型
			newScoresOBj.data = dsc;//內容值
			newScoresOBj.title = '最佳銷售組合遊戲模組';//題目
		scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end
	}
}

$(document).ready(function() {
  $('#m4_sales_1').attr('class','active');
  $('#m4_sales_2').attr('class','');
  $('#m4_sales_3').attr('class','');
  $('#m4_sales_pg_1').show();
  $('#m4_sales_pg_2').hide();
  $('#m4_sales_pg_3').hide();
});


function m4_goNext_Module(){
	if( !m4_next_level_a ){
		var sendTalkData = {};
			sendTalkData.room_id = roomID;
			sendTalkData.com_dsc = 'web_m4_goNextModule';
			sendTalkData.user_type = userType;
		var json_data = JSON.stringify(sendTalkData);
			socket.emit('modelsComman', json_data); 
		m4_next_level_a = true;			
	}	
}

function web_m4_goNextModule(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m4_next_level_<?php echo ($model_data['userType'] == 'A')?'b':'a'; ?> = true;
		if(m4_next_level_a && m4_next_level_b){
			m4_next_level_a = false;
			m4_next_level_b = false;	
			get_NextModel();
		}			
	}		
}

</script>