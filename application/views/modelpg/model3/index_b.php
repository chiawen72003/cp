<div id="m3_module_area"  style="display:none">
	<div id="m3_game_1">
		<div class="speed">
			<ul>
				<li><div class="s_1">1</div></li>
				<li><div >2</div></li>
				<li><div >3</div></li>
			</ul>
		</div>		

		<!-- 關卡敘述-->
		<div class="wrap_title">
		<?php echo $model_data['modelData_3']['levelDsc']['1'];?>
		</div>
		<!-- 關卡敘述 END -->
		<!-- 功能操作區-->
		<div class="making_ice_wrap">
			<div class="making_area_1">
				<div>
					<table>
						<tr>
							<th><div class="m3_droppable" id="m3_receiving_area"></div></th><!-- 拖曳區 -->
							<th class="ice_result">
								<input type="text" id="m3_count_tmp_1" value="<?php echo isset($model_data['modelData_3']['baseTmp'])?$model_data['modelData_3']['baseTmp']:'0';?>" disabled   /><!-- 溫度 -->
							</th>
						</tr>
					</table>
				</div>
				<div>
					<table>
						<tr>
							<td >
								<div><img src="<?php echo base_url('public/images/m3_pic_msg.png'); ?>" alt="味精" id="msg_0" subtype="MSG" class="m3_draggable"/></div>
							</td>
							<td  >
								<div><img src="<?php echo base_url('public/images/m3_pic_water.png'); ?>" alt="純水" id="water_0" subtype="Water" class="m3_draggable"/></div>
							</td>
							<td  >
								<div><img src="<?php echo base_url('public/images/m3_pic_ice.png'); ?>" alt="冰塊 30g" id="ice_0" subtype="ice" subValue="30" class="m3_draggable"/></div>
							</td>
							<td  >
								<div><img src="<?php echo base_url('public/images/m3_pic_ice.png'); ?>" alt="冰塊 60g" id="ice_1" subtype="ice" subValue="60" class="m3_draggable"/></div>
							</td>
							<td   >
								<div><img src="<?php echo base_url('public/images/m3_pic_ice.png'); ?>" alt="冰塊 90g" id="ice_2" subtype="ice" subValue="90" class="m3_draggable"/></div>
							</td>
						</tr>
						<tr>
							<td class="nab"><input type="text" value="30g"/></td>
							<td class="nab"><input type="text" value="30g"/></td>
							<td class="nab"><input type="text" value="30g"/></td>
							<td class="nab"><input type="text" value="60g"/></td>
							<td class="nab"><input type="text" value="90g"/></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="making_area_2"><!-- 表單區 -->
				<div class="test">
					<table id="m3_result_area">
						<tr>
							<th colspan="2"><p>紀錄</p></th>
						</tr>						
					</table>
				</div>
			</div>
			<!-----按鈕區----->
			<div id="but_mod">
				<div class="area">
					<ul>	
						<li class="aa"><button class="button button-raised" type="button" value="測溫" onclick="m3_begin_make()" id="m3_beginMake" >測溫</button></li>
						<li class="aa"><button class="button button-raised" type="button" value="重置" onclick="m3_reSet()" >重置</button></li>
						<li class="aa"><button class="button button-raised" onclick="m3_goNext()" type="button">下一關</button></li>
					</ul>
				</div>
			</div>
			<!-----按鈕區END----->
		</div>
	<!-- 功能操作區 結束 -->
	</div>
	<div id="m3_game_2" style="display:none;">
		<div class="speed">
			<ul>
				<li><div >1</div></li>
				<li><div class="s_1">2</div></li>
				<li><div >3</div></li>
			</ul>
		</div>	
	
		<!-- 關卡敘述-->
		<div class="wrap_title">
		<?php echo $model_data['modelData_3']['levelDsc']['2'];?>
		</div>
		<!-- 關卡敘述 END -->
		<div class="making_ice_wrap">
			<div class="ice_tb_wrap" >
				<div class="ice_tb s_tb">
					<table>
						<tr>
							<th colspan="4"></th>
						</tr> 
						<tr>
							<td>鹽:冰塊最佳比例=</td>
							<td><input type="text" value="" id="input_1_1"  onchange="option_input('input_1_1')">：<input type="text" value="" id="input_1_2"  onchange="option_input('input_1_2')"></td>
							<td>溫度</td>
							<td><input type="text" value="" id="input_1_3"  onchange="option_input('input_1_3')"></td>
						</tr>
						<tr>
							<td class="s_1">糖:冰塊最佳比例=</td>
							<td class="s_1"><input type="text" value="" id="input_2_1" onchange="option_input('input_2_1')">：<input type="text" value="" id="input_2_2" onchange="option_input('input_2_2')"></td>
							<td class="s_1">溫度</td>
							<td class="s_1"><input type="text" value="" id="input_2_3" onchange="option_input('input_2_3')"></td>
						</tr>
						<tr>
							<td>味精:冰塊最佳比例=</td>
							<td><input type="text" value="" id="input_3_1" onchange="option_input('input_3_1')">：<input type="text" value="" id="input_3_2" onchange="option_input('input_3_2')"></td>
							<td>溫度</td>
							<td><input type="text" value="" id="input_3_3" onchange="option_input('input_3_3')"></td>
						</tr>
						<tr>
							<td class="s_1">純水:冰塊最佳比例=</td>
							<td class="s_1"><input type="text" value="" id="input_4_1" onchange="option_input('input_4_1')">：<input type="text" value="" id="input_4_2" onchange="option_input('input_4_2')"></td>
							<td class="s_1">溫度</td>
							<td class="s_1"><input type="text" value="" id="input_4_3" onchange="option_input('input_4_3')"></td>
						</tr>
						<tr>
						<td colspan="5">哪一個效果最佳?</td>
						</tr>
						<tr>
							<td colspan="5">
<?php
if(isset($model_data['modelData_3']['options']) and count($model_data['modelData_3']['options']) > 0){
foreach($model_data['modelData_3']['options'] as $key => $tempValue){
?>
<input type="checkbox" value="<?php echo $tempValue; ?>" id="m3_input_<?php echo $key;?>" onclick="option_checkbox(this)" ><?php echo $tempValue; ?>
<?php	
}
}
?>  30g + <input type="text" value="" id="ICE_INPUT" onchange="option_input('ICE_INPUT')" style="width:80px;height:20px;"> g冰塊
							</td>
						</tr>
					</table>
				</div>
				<!-- 分享區 -->
				<div class="making_area_2 s_area">
					<div>
						<table class="parscore" id="m3_information_area">
							<tr>
								<th colspan="2"><p>夥伴的紀錄</p></th>
							</tr>
							
						</table>
						<table class="myscore" id="m3_myInformation_area">
							<tr>
								<th colspan="2"><p>你的紀錄</p></th>
							</tr>
						</table>
					</div>
				</div>
				<!-- 分享區 end -->
				<!-----按鈕區----->
				<div id="but_mod">
					<div class="area">
						<ul>
							<li class="aa">
								<button class="button button-raised" type="button" value="分享" onclick="m3_share_it()">分享</button>
							</li>
							<li class="aa">
								<button class="button button-raised" type="button" value="下一關" onclick="m3_goNext_2()">下一關</button>
							</li>								
						</ul>
					</div>
				</div>
			<!-----按鈕區END----->
			</div>
		</div>	
	</div>
	<div id="m3_game_3" style="display:none;">
		<div class="speed">
			<ul>
				<li><div >1</div></li>
				<li><div >2</div></li>
				<li><div class="s_1">3</div></li>
			</ul>
		</div>	
	
		<!-- 關卡敘述-->
		<div class="wrap_title">
		<?php echo $model_data['modelData_3']['levelDsc']['3'];?>
		</div>
		<!-- 關卡敘述 END -->
		<div class="making_ice_wrap">
			<div class="making_area_1"><!-- 思樂冰區 -->
				<div><!-- 思樂調製呈現區 -->
					<table>
						<tr>
							<th><div class="m3_droppable_2" id="m3_receiving_area_2"></div></th>
							<th class="ice_result" ><input type="text" id="m3_count_tmp_2" value="<?php echo isset($model_data['modelData_3']['baseTmp'])?$model_data['modelData_3']['baseTmp']:'0';?>" disabled /></th>
						</tr>
					</table>
				</div>
				<div><!-- 思樂材料區 -->
					<table>
						<tr>
							<td  >
								<img src="<?php echo base_url('public/images/m3_pic_salt.png'); ?>" alt="鹽"  id="salt_2_1" subtype="salt" subValue="100" class="m3_draggable"/>
							</td>
							<td >
								<img src="<?php echo base_url('public/images/m3_pic_salt.png'); ?>" alt="鹽" id="salt_2_2" subtype="salt" subValue="150" class="m3_draggable" />
							</td>
							<td  >
								<img src="<?php echo base_url('public/images/m3_pic_ice.png'); ?>" alt="冰塊 150g" id="ice_2_1"  subtype="ice" subValue="150" class="m3_draggable" />
							</td>
						</tr>
						<tr>
							<td class="nab"><input type="text" value="100g"/></td>
							<td class="nab"><input type="text" value="150g"/></td>
							<td class="nab"><input type="text" value="150g"/></td>
						</tr>												
					</table>
				</div>
			</div>
			<div class="making_area_2"><!-- 表單區 -->
				<div>
					<table id="m3_result_area_2">
						<tr>
							<th colspan="2"><p>紀錄</p></th>
						</tr>						
					</table>
				</div>
			</div>			
			<!-----按鈕區----->
		<div class="ice_tb">
		<table>
			<tr>
				<td colspan="2" >
				那一個效果最佳?
				</td>
			</tr>
			<tr><td>
<?php
if(isset($model_data['modelData_3']['options3']) and count($model_data['modelData_3']['options3']) > 0){
	foreach($model_data['modelData_3']['options3'] as $key => $tempValue){
?>
	<input type="checkbox" value="<?php echo $tempValue; ?>" id="m3_input3_<?php echo $key;?>" onclick="option_checkbox(this);m3_canGoNext();" name="m3_input3[]"><label for="m3_input3_<?php echo $key;?>"><?php echo $tempValue; ?></label>
<?php	
	}
}
?>+<input type="text" value="" id="ICE_INPUT_2" onchange="option_input('ICE_INPUT_2');m3_canGoNext();">g冰塊
				</td>
			</tr>		
		</table>
		</div>
			
			<div id="but_mod">
				<div class="area">
					<ul>	
						<li class="aa"><button class="button button-raised" type="button" value="測溫" onclick="m3_begin_make_2()" id="m3_beginMake_2">測溫</button></li>
						<li class="aa"><button class="button button-raised" type="button" value="重置" onclick="m3_reSet_2()">重置</button></li>
						<li class="aa"><button class="button button-raised" type="button" value="下一關" onclick="m3_goNextModel();" id="m3_GetNextModel" disabled>下一關</button></li>
					</ul>
				</div>
			</div>
			<!-----按鈕區END----->
		</div>
	</div>
</div>
<script language="javascript">
var m3_left_0 = '';
var m3_right_0 = '';
var m3_next_level_a = false;
var m3_next_level_b = false;
var m3_baseTmp = <?php echo isset($model_data['modelData_3']['baseTmp'])?$model_data['modelData_3']['baseTmp']:'0';?>;


$(function() {
	$( ".m3_draggable" ).draggable(
		{
		  revert: true 
		}
	);
	$( ".m3_droppable" ).droppable({
      drop: function( event, ui ) {
        if(ui.draggable.attr('subtype') == "ice"){
			m3_right_0 = ui.draggable.attr('subValue');
			//關閉冰塊物件拖曳功能
			$('#ice_0').draggable( 'disable' );
			$('#ice_1').draggable( 'disable' );
			$('#ice_2').draggable( 'disable' );
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm3_dragObj';//動作類型
				newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M3DragObj';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = 'm3_receiving_area';
				newOptionOBj.dataFunction_Value = ui.draggable.attr('id');//動作內容敘述
			option_record.push(newOptionOBj);
			//紀錄動作 end   	

			//紀錄閱卷資料
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '拖曳冰塊';//動作類型
				newScoresOBj.data = m3_right_0+' g';//內容值
				newScoresOBj.title = '思樂冰製作遊戲模組 1';//題目
				scores_record.push(newScoresOBj);			
			//紀錄閱卷資料 end
			ui.draggable.hide();//隱藏拖曳物件
			//倒入冰塊的動作
			m3_run_ice_img('m3_receiving_area',0);
			
			
		}
		if(ui.draggable.attr('subtype') == "MSG"){
			m3_left_0 = 'MSG';
			//關閉純水物件拖曳功能
			$('#water_0').draggable( 'disable' );
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm3_dragObj';//動作類型
				newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M3DragObj';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = 'm3_receiving_area';
				newOptionOBj.dataFunction_Value = ui.draggable.attr('id');//動作內容敘述
			option_record.push(newOptionOBj);
			//紀錄動作 end  
			//紀錄閱卷資料
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '拖曳味精';//動作類型
				newScoresOBj.data = '30 g';//內容值
				newScoresOBj.title = '思樂冰製作遊戲模組 1';//題目
				scores_record.push(newScoresOBj);			
			//紀錄閱卷資料 end
			
			ui.draggable.hide();//隱藏拖曳物件
			//倒入粉末的動作
			m3_run_powder_img('m3_receiving_area',0);

 			
		}
		if(ui.draggable.attr('subtype') == "Water"){
			m3_left_0 = 'Water';
			
			//關閉味精物件拖曳功能
			$('#msg_0').draggable( 'disable' );
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm3_dragObj';//動作類型
				newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M3DragObj';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = 'm3_receiving_area';
				newOptionOBj.dataFunction_Value = ui.draggable.attr('id');//動作內容敘述
			option_record.push(newOptionOBj);
			//紀錄動作 end  
			//紀錄閱卷資料
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '拖曳純水';//動作類型
				newScoresOBj.data = '30 g';//內容值
				newScoresOBj.title = '思樂冰製作遊戲模組 1';//題目
				scores_record.push(newScoresOBj);			
			//紀錄閱卷資料 end			
			ui.draggable.hide();//隱藏拖曳物件
			m3_run_water_img('m3_receiving_area',0);
		}			
      }
    });
	$( ".m3_droppable_2" ).droppable({
      drop: function( event, ui ) {
        if(ui.draggable.attr('subtype') == "ice"){
			m3_right_0 = ui.draggable.attr('subValue');
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm3_dragObj';//動作類型
				newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M3DragObj';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = 'm3_receiving_area_2';
				newOptionOBj.dataFunction_Value = ui.draggable.attr('id');//動作內容敘述
			option_record.push(newOptionOBj);
			//紀錄動作 end  
			//紀錄閱卷資料
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '拖曳冰塊';//動作類型
				newScoresOBj.data = '150 g';//內容值
				newScoresOBj.title = '思樂冰製作遊戲模組 3';//題目
				scores_record.push(newScoresOBj);			
			//紀錄閱卷資料 end	
			
			ui.draggable.hide();//隱藏拖曳物件
			//倒入冰塊的動作
			m3_run_ice_img('m3_receiving_area_2',0);

		}
		if(ui.draggable.attr('subtype') == "salt"){
			m3_left_0  = ui.draggable.attr('subValue');

			//關閉鹽巴物件拖曳功能
			$('#salt_2_1').draggable( 'disable' );
			$('#salt_2_2').draggable( 'disable' );
			$('#salt_2_3').draggable( 'disable' );
			
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm3_dragObj';//動作類型
				newOptionOBj.dataType_Dsc = '拖曳物件';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M3DragObj';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = 'm3_receiving_area_2';
				newOptionOBj.dataFunction_Value = ui.draggable.attr('id');//動作內容敘述
			option_record.push(newOptionOBj);
			//紀錄動作 end  
			//紀錄閱卷資料
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '拖曳鹽巴';//動作類型
				newScoresOBj.data = m3_left_0+' g';//內容值
				newScoresOBj.title = '思樂冰製作遊戲模組 3';//題目
				scores_record.push(newScoresOBj);			
			//紀錄閱卷資料 end
			
			ui.draggable.hide();//隱藏拖曳物件
			//倒入粉末的動作
			m3_run_powder_img('m3_receiving_area_2',0);			
		}			
      }
    });		
});

//開始測溫
function m3_begin_make(){
	if(m3_left_0 == 'MSG' && m3_right_0 == '30'){
		var htmlDsc = '<tr><td><input type="text" value="30g味精 + 30g冰塊"/></td><td>降低溫度<input type="text" class="tmp" value="<?php echo isset($model_data['modelData_3']['rule_1_B'][0])?$model_data['modelData_3']['rule_1_B'][0]:''; ?>" title="tmp" disabled />度</td></tr>';
		$('#m3_result_area').append(htmlDsc);

		var countTmp = m3_baseTmp - <?php echo isset($model_data['modelData_3']['rule_1_B'][0])?$model_data['modelData_3']['rule_1_B'][0]:'0'; ?>;
		$('#m3_count_tmp_1').val(countTmp);
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm3_beginMark';//動作類型
			newOptionOBj.dataType_Dsc = '量測溫度';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M3BeginMark';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'm3_result_area';
			newOptionOBj.dataFunction_ObjID2 = 'm3_count_tmp_1';
			newOptionOBj.dataFunction_Value = htmlDsc;//動作內容敘述
			newOptionOBj.dataFunction_tempValue = countTmp;//動作內容敘述			
		option_record.push(newOptionOBj);
		//紀錄動作 end  		
	}
	if(m3_left_0 == 'MSG' && m3_right_0 == '60'){
		var htmlDsc = '<tr><td><input type="text" value="30g味精 + 60g冰塊"/></td><td>降低溫度<input type="text" class="tmp" value="<?php echo isset($model_data['modelData_3']['rule_1_B'][1])?$model_data['modelData_3']['rule_1_B'][1]:''; ?>" title="tmp" disabled />度</td></tr>';
		$('#m3_result_area').append(htmlDsc);

		var countTmp = m3_baseTmp - <?php echo isset($model_data['modelData_3']['rule_1_B'][1])?$model_data['modelData_3']['rule_1_B'][1]:'0'; ?>;
		$('#m3_count_tmp_1').val(countTmp);
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm3_beginMark';//動作類型
			newOptionOBj.dataType_Dsc = '量測溫度';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M3BeginMark';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'm3_result_area';
			newOptionOBj.dataFunction_ObjID2 = 'm3_count_tmp_1';
			newOptionOBj.dataFunction_Value = htmlDsc;//動作內容敘述
			newOptionOBj.dataFunction_tempValue = countTmp;//動作內容敘述						
		option_record.push(newOptionOBj);
		//紀錄動作 end  
		//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '自己';
			newScoresOBj.event = '按下按鈕';//動作類型
			newScoresOBj.data = '30g味精 + 60g冰塊 降低溫度 <?php echo isset($model_data['modelData_3']['rule_1_B'][1])?$model_data['modelData_3']['rule_1_B'][1]:''; ?> 度';//內容值
			newScoresOBj.title = '思樂冰製作遊戲模組 1';//題目
			scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end
	}
	if(m3_left_0 == 'MSG' && m3_right_0 == '90'){
		var htmlDsc = '<tr><td><input type="text" value="30g味精 + 90g冰塊"/></td><td>降低溫度<input type="text" class="tmp" value="<?php echo isset($model_data['modelData_3']['rule_1_B'][2])?$model_data['modelData_3']['rule_1_B'][2]:''; ?>" title="tmp" disabled />度</td></tr>';
		$('#m3_result_area').append(htmlDsc);

		var countTmp = m3_baseTmp - <?php echo isset($model_data['modelData_3']['rule_1_B'][2])?$model_data['modelData_3']['rule_1_B'][2]:'0'; ?>;
		$('#m3_count_tmp_1').val(countTmp);
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm3_beginMark';//動作類型
			newOptionOBj.dataType_Dsc = '量測溫度';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M3BeginMark';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'm3_result_area';
			newOptionOBj.dataFunction_ObjID2 = 'm3_count_tmp_1';
			newOptionOBj.dataFunction_Value = htmlDsc;//動作內容敘述
			newOptionOBj.dataFunction_tempValue = countTmp;//動作內容敘述						
		option_record.push(newOptionOBj);
		//紀錄動作 end  	
	//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '自己';
			newScoresOBj.event = '按下按鈕';//動作類型
			newScoresOBj.data = '30g味精 + 90g冰塊 降低溫度 <?php echo isset($model_data['modelData_3']['rule_1_B'][2])?$model_data['modelData_3']['rule_1_B'][2]:''; ?> 度';//內容值
			newScoresOBj.title = '思樂冰製作遊戲模組 1';//題目
			scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end			
	}
	if(m3_left_0 == 'Water' && m3_right_0 == '30'){
		var htmlDsc = '<tr><td><input type="text" value="30g純水 + 30g冰塊"/></td><td>降低溫度<input type="text" class="tmp" value="<?php echo isset($model_data['modelData_3']['rule_1_B'][3])?$model_data['modelData_3']['rule_1_B'][3]:''; ?>" title="tmp" disabled />度</td></tr>';
		$('#m3_result_area').append(htmlDsc);

		var countTmp = m3_baseTmp - <?php echo isset($model_data['modelData_3']['rule_1_B'][3])?$model_data['modelData_3']['rule_1_B'][3]:'0'; ?>;
		$('#m3_count_tmp_1').val(countTmp);
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm3_beginMark';//動作類型
			newOptionOBj.dataType_Dsc = '量測溫度';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M3BeginMark';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'm3_result_area';
			newOptionOBj.dataFunction_ObjID2 = 'm3_count_tmp_1';			
			newOptionOBj.dataFunction_Value = htmlDsc;//動作內容敘述
			newOptionOBj.dataFunction_tempValue = countTmp;//動作內容敘述						
		option_record.push(newOptionOBj);
		//紀錄動作 end 
		//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '自己';
			newScoresOBj.event = '按下按鈕';//動作類型
			newScoresOBj.data = '30g純水 + 30g冰塊 降低溫度 <?php echo isset($model_data['modelData_3']['rule_1_B'][3])?$model_data['modelData_3']['rule_1_B'][3]:''; ?> 度';//內容值
			newScoresOBj.title = '思樂冰製作遊戲模組 1';//題目
			scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end			
 		
	}
	if(m3_left_0 == 'Water' && m3_right_0 == '60'){
		var htmlDsc = '<tr><td><input type="text" value="30g純水 + 60g冰塊"/></td><td>降低溫度<input type="text" class="tmp" value="<?php echo isset($model_data['modelData_3']['rule_1_B'][4])?$model_data['modelData_3']['rule_1_B'][4]:''; ?>" title="tmp" disabled />度</td></tr>';
		$('#m3_result_area').append(htmlDsc);

		var countTmp = m3_baseTmp - <?php echo isset($model_data['modelData_3']['rule_1_B'][4])?$model_data['modelData_3']['rule_1_B'][4]:'0'; ?>;
		$('#m3_count_tmp_1').val(countTmp);		
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm3_beginMark';//動作類型
			newOptionOBj.dataType_Dsc = '量測溫度';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M3BeginMark';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'm3_result_area';
			newOptionOBj.dataFunction_ObjID2 = 'm3_count_tmp_1';			
			newOptionOBj.dataFunction_Value = htmlDsc;//動作內容敘述
			newOptionOBj.dataFunction_tempValue = countTmp;//動作內容敘述						
		option_record.push(newOptionOBj);
		//紀錄動作 end  
	//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '自己';
			newScoresOBj.event = '按下按鈕';//動作類型
			newScoresOBj.data = '30g純水 + 60g冰塊 降低溫度 <?php echo isset($model_data['modelData_3']['rule_1_B'][4])?$model_data['modelData_3']['rule_1_B'][4]:''; ?> 度';//內容值
			newScoresOBj.title = '思樂冰製作遊戲模組 1';//題目
			scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end					
	}
	if(m3_left_0 == 'Water' && m3_right_0 == '90'){
		var htmlDsc = '<tr><td><input type="text" value="30g純水 + 90g冰塊"/></td><td>降低溫度<input type="text" class="tmp" value="<?php echo isset($model_data['modelData_3']['rule_1_B'][5])?$model_data['modelData_3']['rule_1_B'][5]:''; ?>" title="tmp" disabled />度</td></tr>';
		$('#m3_result_area').append(htmlDsc);

		var countTmp = m3_baseTmp - <?php echo isset($model_data['modelData_3']['rule_1_B'][5])?$model_data['modelData_3']['rule_1_B'][5]:'0'; ?>;
		$('#m3_count_tmp_1').val(countTmp);
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm3_beginMark';//動作類型
			newOptionOBj.dataType_Dsc = '量測溫度';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M3BeginMark';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'm3_result_area';
			newOptionOBj.dataFunction_ObjID2 = 'm3_count_tmp_1';			
			newOptionOBj.dataFunction_Value = htmlDsc;//動作內容敘述
			newOptionOBj.dataFunction_tempValue = countTmp;//動作內容敘述			
		option_record.push(newOptionOBj);
		//紀錄動作 end  	
		//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '自己';
			newScoresOBj.event = '按下按鈕';//動作類型
			newScoresOBj.data = '30g純水 + 90g冰塊 降低溫度 <?php echo isset($model_data['modelData_3']['rule_1_B'][5])?$model_data['modelData_3']['rule_1_B'][5]:''; ?> 度';//內容值
			newScoresOBj.title = '思樂冰製作遊戲模組 1';//題目
			scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end					
	}
	$('#m3_beginMake').attr('onclick','');
}

//進入下一關
function m3_goNext(){
	nowLevelType =2;
	var tempString = $('#m3_result_area').clone();	
	tempString.find('tr:first').remove();
	var tempString2 = tempString.html();
	$('#m3_myInformation_area').append(tempString2);
	
	$('#m3_game_1').hide();
	$('#m3_game_2').show();
	//紀錄動作
	var newOptionOBj =  $.extend(true,{}, option_obj);
		newOptionOBj.dataType = 'm3_goNext';//動作類型
		newOptionOBj.dataType_Dsc = '進入第二關';//動作類型敘述
		newOptionOBj.dataFunction = 'record_M3GoNext';//動作內容敘述
		newOptionOBj.dataFunction_ObjID = '';
		newOptionOBj.dataFunction_Value = '';//動作內容敘述
	option_record.push(newOptionOBj);
	//紀錄動作 end 	
}

function m3_goNext_2(){
	if(!m3_next_level_b){
		var sendTalkData = {};
			sendTalkData.room_id = roomID;
			sendTalkData.com_dsc = 'web_m3_goNextLevel';
			sendTalkData.user_type = userType;
		var json_data = JSON.stringify(sendTalkData);
			socket.emit('modelsComman', json_data); 
		m3_next_level_b = true;
	}
	
	
	if(m3_next_level_a && m3_next_level_b){
		nowLevelType =3;
		
		$('#m3_game_1').hide();
		$('#m3_game_2').hide();
		$('#m3_game_3').show();
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm3_goNext2';//動作類型
			newOptionOBj.dataType_Dsc = '進入第三關';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M3GoNext2';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = '';
			newOptionOBj.dataFunction_Value = '';//動作內容敘述
		option_record.push(newOptionOBj);
		//紀錄動作 end 		
	}	
}

function m3_share_it(){
	var tempString = $('#m3_result_area').clone();
	tempString.find('tr:first').remove();
	var sendTalkData = {};
		sendTalkData.room_id = roomID;
		sendTalkData.com_dsc = 'web_m3_getHtmlData';
		sendTalkData.user_type = userType;		
		sendTalkData.html_data = tempString.html();
	var json_data = JSON.stringify(sendTalkData);
		socket.emit('modelsComman', json_data); 
	//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '自己';
			newScoresOBj.event = '按下按鈕';//動作類型
			newScoresOBj.data = '分享';//內容值
			newScoresOBj.title = '思樂冰製作遊戲模組 2';//題目
			scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end							
}

//開始測溫
function m3_begin_make_2(){
if(m3_left_0 > '' && m3_right_0 > '')
{	
	if(m3_left_0 == '100' && m3_right_0 == '150'){
		var htmlDsc = '<tr><td><input type="text" value="100g鹽 + 150g冰塊"/></td><td>降低溫度<input type="text" class="tmp" value="<?php echo isset($model_data['modelData_3']['rule_2_B'][0])?$model_data['modelData_3']['rule_2_B'][0]:''; ?>" title="tmp" disabled />度</td></tr>';
		$('#m3_result_area_2').append(htmlDsc);

		var countTmp = m3_baseTmp - <?php echo isset($model_data['modelData_3']['rule_2_B'][0])?$model_data['modelData_3']['rule_2_B'][0]:'0'; ?>;
		$('#m3_count_tmp_2').val(countTmp);
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm3_beginMark';//動作類型
			newOptionOBj.dataType_Dsc = '量測溫度';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M3BeginMark';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'm3_result_area_2';
			newOptionOBj.dataFunction_ObjID2 = 'm3_count_tmp_2';			
			newOptionOBj.dataFunction_Value = htmlDsc;//動作內容敘述
			newOptionOBj.dataFunction_tempValue = countTmp;//動作內容敘述			
			
		option_record.push(newOptionOBj);
		//紀錄動作 end 	
		//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '自己';
			newScoresOBj.event = '按下按鈕';//動作類型
			newScoresOBj.data = '100g鹽 + 150g冰塊 降低溫度 <?php echo isset($model_data['modelData_3']['rule_2_B'][0])?$model_data['modelData_3']['rule_2_B'][0]:''; ?> 度';//內容值
			newScoresOBj.title = '思樂冰製作遊戲模組 3';//題目
			scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end				
		
	}
	if(m3_left_0 == '150' && m3_right_0 == '150'){
		var htmlDsc = '<tr><td><input type="text" value="150g鹽 + 150g冰塊"/></td><td>降低溫度<input type="text" class="tmp" value="<?php echo isset($model_data['modelData_3']['rule_2_B'][1])?$model_data['modelData_3']['rule_2_B'][1]:''; ?>" title="tmp" disabled />度</td></tr>';
		$('#m3_result_area_2').append(htmlDsc);

		var countTmp = m3_baseTmp - <?php echo isset($model_data['modelData_3']['rule_2_B'][1])?$model_data['modelData_3']['rule_2_B'][1]:'0'; ?>;
		$('#m3_count_tmp_2').val(countTmp);
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm3_beginMark';//動作類型
			newOptionOBj.dataType_Dsc = '量測溫度';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M3BeginMark';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'm3_result_area_2';
			newOptionOBj.dataFunction_ObjID2 = 'm3_count_tmp_2';
			newOptionOBj.dataFunction_Value = htmlDsc;//動作內容敘述
			newOptionOBj.dataFunction_tempValue = countTmp;//動作內容敘述			
			
		option_record.push(newOptionOBj);
		//紀錄動作 end 	
		//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '自己';
			newScoresOBj.event = '按下按鈕';//動作類型
			newScoresOBj.data = '150g鹽 + 150g冰塊 降低溫度 <?php echo isset($model_data['modelData_3']['rule_2_B'][1])?$model_data['modelData_3']['rule_2_B'][1]:''; ?> 度';//內容值
			newScoresOBj.title = '思樂冰製作遊戲模組 3';//題目
			scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end				
		
	}
	
	m3_left_0 = '';
	m3_right_0 = '';
	$('#m3_beginMake_2').attr('onclick','');	
}
}

//重置
function m3_reSet_2(){
	$('#salt_2_1').draggable( 'enable' ).show();
	$('#salt_2_2').draggable( 'enable' ).show();
	$('#ice_2_1').draggable('enable' ).show();
	$('#m3_count_tmp_2').val(m3_baseTmp);

	var cssDsc = "url('<?php echo base_url('public/images/m3_pic_3.png'); ?>') no-repeat scroll -60px -15px transparent";
	$('#m3_receiving_area_2').css('background',cssDsc);
	$('#m3_beginMake_2').attr('onclick','m3_begin_make_2()');
	$('#m3_count_tmp_2').val(m3_baseTmp);	

	if(!isView){
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm3_reSet2';//動作類型
			newOptionOBj.dataType_Dsc = '重置資料';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M3ReSet2';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = '';
			newOptionOBj.dataFunction_Value = '';//動作內容敘述
		option_record.push(newOptionOBj);
		//紀錄動作 end 
		//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '自己';
			newScoresOBj.event = '按下按鈕';//動作類型
			newScoresOBj.data = '資料重置';//內容值
			newScoresOBj.title = '思樂冰製作遊戲模組 3';//題目
			scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end			
	}
}

//重置
function m3_reSet(){
	$('#ice_0').draggable( 'enable' ).show();
	$('#ice_1').draggable( 'enable' ).show();
	$('#ice_2').draggable('enable' ).show();
	$('#msg_0').draggable('enable' ).show();
	$('#water_0').draggable('enable' ).show();
	$('#m3_count_tmp_1').val(m3_baseTmp);

	var cssDsc = "url('<?php echo base_url('public/images/m3_pic_3.png'); ?>') no-repeat scroll -60px -15px transparent";
	$('#m3_receiving_area').css('background',cssDsc);
	$('#m3_beginMake').attr('onclick','m3_begin_make()');
	
	if(!isView){
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm3_reSet';//動作類型
			newOptionOBj.dataType_Dsc = '重置資料';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M3ReSet';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = '';
			newOptionOBj.dataFunction_Value = '';//動作內容敘述
		option_record.push(newOptionOBj);
		//紀錄動作 end 
		//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '自己';
			newScoresOBj.event = '按下按鈕';//動作類型
			newScoresOBj.data = '資料重置';//內容值
			newScoresOBj.title = '思樂冰製作遊戲模組 1';//題目
			scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end			
	}
}

function web_m3_goNextLevel(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m3_next_level_a = true;
		if( m3_next_level_a && m3_next_level_b){
			m3_goNext_2();
		}
	}
}


//收到分享的資料
function web_m3_getHtmlData(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		var tempHtml = getWebValue['html_data'];
		$('#m3_information_area').html('').append('<tr><th colspan="2"><p>夥伴的紀錄</p></th></tr>').append(tempHtml);
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm3_getHtmlData';//動作類型
			newOptionOBj.dataType_Dsc = '顯示分享資料';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M3GetHtmlData';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'm3_information_area';
			newOptionOBj.dataFunction_Value = tempHtml;//動作內容敘述
		option_record.push(newOptionOBj);
		//紀錄動作 end 
		//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '夥伴';
			newScoresOBj.event = '按下按鈕';//動作類型
			newScoresOBj.data = '分享';//內容值
			newScoresOBj.title = '思樂冰製作遊戲模組 2';//題目
			scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end			
		
	}
}

function m3_canGoNext(){
	var lengthValue = $('input[name="m3_input3[]"]:checked').length;
	if(lengthValue > 0 && $('#ICE_INPUT_2').val() > ''){	
		$('#m3_GetNextModel').attr('disabled', false);
	}else{
		$('#m3_GetNextModel').attr('disabled', true);
	}
}

var m3_next_model_a = false;
var m3_next_model_b = false;
function m3_goNextModel(){
	m3_next_model_b = true;
	var sendTalkData = {};
	sendTalkData.room_id = roomID;
	sendTalkData.com_dsc = 'web_m3_goNextModel';
	sendTalkData.user_type = userType;
	var json_data = JSON.stringify(sendTalkData);
	socket.emit('modelsComman', json_data); 
	
	if(m3_next_model_a && m3_next_model_b){
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm3_goNextModel';//動作類型
			newOptionOBj.dataType_Dsc = '進入下一個模組';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M3GoNextModel';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = '';//動作內容敘述
			newOptionOBj.dataFunction_Value = '';//動作內容敘述
		option_record.push(newOptionOBj);
		//紀錄動作 end
	}
}

function web_m3_goNextModel(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m3_next_model_<?php echo ($model_data['userType'] == 'A')?'b':'a'; ?> = true;
	}
	if(m3_next_model_a && m3_next_model_b){
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm3_goNextModel';//動作類型
			newOptionOBj.dataType_Dsc = '進入下一個模組';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M3GoNextModel';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = '';//動作內容敘述
			newOptionOBj.dataFunction_Value = '';//動作內容敘述
		option_record.push(newOptionOBj);
		//紀錄動作 end
		get_NextModel();
	}
}

//=================================================
//倒冰塊動態模組
function m3_run_ice_img(getID,getRounTime){
	var m3_delTime = 350;
	var MaxRounTime = 3;
	
	var newTop = getRounTime * 270;//top
	var cssDsc = "url('<?php echo base_url('public/images/m3_pic_3.png'); ?>') no-repeat scroll -300px -"+ newTop +"px transparent";
	$('#'+getID).css('background',cssDsc);
	$('#'+getID).css('background-color','#8CC63F');
	getRounTime++;
	if(getRounTime == MaxRounTime){
		
	}else{
		setTimeout("m3_run_ice_img('"+getID+"','"+getRounTime+"')", m3_delTime );
	}
}

//=================================================
//倒純水動態模組
function m3_run_water_img(getID,getRounTime){
	var m3_delTime = 350;
	var MaxRounTime = 2;
	
	var newTop = getRounTime * -280;//top
	var cssDsc = "url('<?php echo base_url('public/images/m3_pic_3.png'); ?>') no-repeat scroll -980px -"+ newTop +"px transparent";
	
	
	if(getRounTime == MaxRounTime){
	 if(m3_right_0 > ''){
			//有冰塊
			cssDsc = "url('<?php echo base_url('public/images/m3_pic_3.png'); ?>') no-repeat scroll -980px -800px transparent";
			$('#'+getID).css('background',cssDsc);
		}else{
			cssDsc = "url('<?php echo base_url('public/images/m3_pic_3.png'); ?>') no-repeat scroll -980px -550px transparent";
			$('#'+getID).css('background',cssDsc);
		}
		
	}else{
		$('#'+getID).css('background',cssDsc);
		getRounTime++;
		setTimeout("m3_run_water_img('"+getID+"','"+getRounTime+"')", m3_delTime );
	}
}

//=================================================
//倒鹽巴、味精動態模組
function m3_run_powder_img(getID,getRounTime){
	var m3_delTime = 350;
	var MaxRounTime = 2;
	
	var newTop = getRounTime * 300;//top
	var cssDsc = "url('<?php echo base_url('public/images/m3_pic_3.png'); ?>') no-repeat scroll -500px -"+ newTop +"px transparent";
	
	
	if(getRounTime == MaxRounTime){
	 if(m3_right_0 > ''){
			//有冰塊
			cssDsc = "url('<?php echo base_url('public/images/m3_pic_3.png'); ?>') no-repeat scroll -500px -800px transparent";
			$('#'+getID).css('background',cssDsc);
		}else{
			cssDsc = "url('<?php echo base_url('public/images/m3_pic_3.png'); ?>') no-repeat scroll -500px -550px transparent";
			$('#'+getID).css('background',cssDsc);
		}
		
	}else{
		$('#'+getID).css('background',cssDsc);
		getRounTime++;
		setTimeout("m3_run_powder_img('"+getID+"','"+getRounTime+"')", m3_delTime );
	}
}
</script>