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
	<div class="drink_area1"><!-- 珍奶口味敘述 -->
		<div id="nav">
			<table class="title">
				<tr>
					<td class="on" id="m4_td_0" onclick="m4_swType('0')"><img src="<?php echo base_url('public/images/m4_people_0.png'); ?>" />小孩</td>
					<td  id="m4_td_1" onclick="m4_swType('1')"><img src="<?php echo base_url('public/images/m4_people_1.png'); ?>"/>年輕人</td>
					<td  id="m4_td_2" onclick="m4_swType('2')"><img src="<?php echo base_url('public/images/m4_people_2.png'); ?>"/>中年人</td>
				</tr>
			</table>
			<div class="bd">
				<div class="info on" id="m4_div_0">
					<?php 
						//顯示B端頁面
						if(isset($model_data['userType']) and $model_data['userType'] == 'B'){
							echo $model_data['modelData_4']['ckDsc_c'];
						}
					?>
				</div>
				<div class="info" id="m4_div_1">
					<?php 
						//顯示B端頁面
						if(isset($model_data['userType']) and $model_data['userType'] == 'B'){
							echo $model_data['modelData_4']['ckDsc_m'];
						}
					?>
				</div>
				<div class="info" id="m4_div_2">
					<?php 
						//顯示B端頁面
						if(isset($model_data['userType']) and $model_data['userType'] == 'B'){
							echo $model_data['modelData_4']['ckDsc_l'];
						}
					?>
				</div>
			</div>
		</div>	
	</div>
	<div class="drink_area2"><!-- 銷售顯示 -->
		<div class="drink_n">
			銷售量資訊
		</div>
		<div class="drink_sale">
			<div class="sal">
				<table>
					<tr>
						<td><input type="text" value="0" id="m4_total_num" disabled /></td>								
					</tr>
					<tr>
						<td>
						<!-- 銷售量直條圖案區 -->
						<div class="s_1" id="m4_total_area" style="background:url('<?php echo base_url('public/images/m4_sale.png');?>') no-repeat scroll -87px -5px transparent;"></div>
						<!-- 銷售量直條圖案區 end -->
						</td>
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
			<li id="m4_sales_3"><a onclick="m4_changePG('3')" >老人</a></li>
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
			</ul>
		</div>
	</div>
	<!-----按鈕區END----->							  
</div>
</div>

<script language="javascript">
var m4_m0 = ['1','1','2','2','3','3','4','4','4','5','5'];
var m4_i0 = ['1','2','2','3','3','4','4','4','4','5','5'];
var m4_b0 = ['1','2'];
var m4_m1 = ['1','1','2','4','3','5','4','4','3','5','2'];
var m4_i1 = ['1','4','2','3','3','2','4','4','4','5','5'];
var m4_b1 = ['1','2'];
var m4_m2 = ['4','5','2','5','3','3','4','4','2','5','1'];
var m4_i2 = ['4','3','2','2','3','1','4','4','4','5','5'];
var m4_b2 = ['2','1'];
var	m4_next_level_a = false;
var	m4_next_level_b = false;	


//計算
function m4_getMarkData(){
	var total_number = 0;
	if(getWebValue['sw_type'] == '0'){
		total_number = 10 * parseInt(m4_m0[getWebValue['d_1']]) + 10 * parseInt(m4_i0[getWebValue['d_2']]) + 2 * m4_b0[getWebValue['d_3']];
		ArrTest[0].push(total_number);
	}
	if(getWebValue['sw_type'] == '1'){
		total_number = 10 * parseInt(m4_m1[getWebValue['d_1']]) + 10 * parseInt(m4_i1[getWebValue['d_2']]) + 2 * m4_b1[getWebValue['d_3']];
		ArrTest[1].push(total_number);
	}
	if(getWebValue['sw_type'] == '2'){
		total_number = 10 * parseInt(m4_m2[getWebValue['d_1']]) + 10 * parseInt(m4_i2[getWebValue['d_2']]) + 2 * m4_b2[getWebValue['d_3']];
		ArrTest[2].push(total_number);		
	}
	m4_show_saleData(total_number);

	$('#m4_total_num').val(total_number);
	//紀錄動作
	var newOptionOBj =  $.extend(true,{}, option_obj);
		newOptionOBj.dataType = 'm4_markData';//動作類型
		newOptionOBj.dataType_Dsc = '模組4 計算數值';//動作類型敘述
		newOptionOBj.dataFunction = 'record_M4MarkData';//動作內容敘述
		newOptionOBj.dataFunction_ObjID = 'm4_total_num';
		newOptionOBj.dataFunction_Value = total_number;//動作內容敘述
	option_record.push(newOptionOBj);
	//紀錄動作 end 
}

//變更銷售紀錄圖案
function m4_show_saleData(total_number){
	var cssDsc = "url('<?php echo base_url('public/images/m4_sale.png');?>') no-repeat scroll -73px -5px transparent";
	$('#m4_total_area').css('background',cssDsc)
	for(var x=0,y=0,z=0;x<100;x+=10,y++){
		if(total_number > x ){
			if((y-1)>0){
				z=87 * (y);//z=>圖輿圖之間的間隙值
			}else{
				z=87;
			}
			
			var offsetV = 220 * (y) + z;
			console.log(offsetV);
			cssDsc = "url('<?php echo base_url('public/images/m4_sale.png');?>') no-repeat scroll -"+offsetV+"px -5px transparent";
			$('#m4_total_area').css('background',cssDsc)
		}
	}
}

function web_m4_getMakeData(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m4_getMarkData();
	}
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

$(document).ready(function() {
  $('#m4_sales_1').attr('class','active');
  $('#m4_sales_2').attr('class','');
  $('#m4_sales_3').attr('class','');
  $('#m4_sales_pg_1').show();
  $('#m4_sales_pg_2').hide();
  $('#m4_sales_pg_3').hide();
});

function m4_swType(getNum){
	for(var x=0;x<3;x++){
		if(x == getNum){
			$('#m4_td_'+x).attr('class','on');
			$('#m4_div_'+x).attr('class','info on');
		}else{
			$('#m4_div_'+x).attr('class','info');			
			$('#m4_td_'+x).attr('class','');			
		}
	}
	
	var dsc='';

	if(getNum == '0'){
		dsc='小孩';
	}
	if(getNum == '1'){
		dsc='年輕人';		
	}
	if(getNum == '2'){
		dsc='中年人';		
	}
	if(!isView){
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm4_swType';//動作類型
			newOptionOBj.dataType_Dsc = '選擇族群';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M4SwType';//動作內容敘述
			//newOptionOBj.dataFunction_ObjID = $(this).attr('id');
			newOptionOBj.dataFunction_Value = getNum;//動作內容敘述
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

function m4_goNext_Module(){
	if( !m4_next_level_b ){	
		var sendTalkData = {};
			sendTalkData.room_id = roomID;
			sendTalkData.com_dsc = 'web_m4_goNextModule';
			sendTalkData.user_type = userType;
		var json_data = JSON.stringify(sendTalkData);
			socket.emit('modelsComman', json_data); 
		m4_next_level_b = true;
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