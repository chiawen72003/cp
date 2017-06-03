<script>
	$(document).ready(function() {
		$('.purbtn:nth-child(1)').click(function () {
			$(".purbtn:nth-child(1)").addClass("a_purple");
			$(".purbtn:nth-child(2)").removeClass("a_purple");
			$(".purbtn:nth-child(3)").removeClass("a_purple");
			$(".purbtn:nth-child(4)").removeClass("a_purple");
			$(".purbtn:nth-child(5)").removeClass("a_purple");
		});	
		$('.purbtn:nth-child(2)').click(function () {
			$(".purbtn:nth-child(2)").addClass("a_purple");
			$(".purbtn:nth-child(1)").removeClass("a_purple");
			$(".purbtn:nth-child(3)").removeClass("a_purple");
			$(".purbtn:nth-child(4)").removeClass("a_purple");
			$(".purbtn:nth-child(5)").removeClass("a_purple");
		});
		$('.purbtn:nth-child(3)').click(function () {
			$(".purbtn:nth-child(3)").addClass("a_purple");
			$(".purbtn:nth-child(2)").removeClass("a_purple");
			$(".purbtn:nth-child(1)").removeClass("a_purple");
			$(".purbtn:nth-child(4)").removeClass("a_purple");
			$(".purbtn:nth-child(5)").removeClass("a_purple");
		});
		$('.purbtn:nth-child(4)').click(function () {
			$(".purbtn:nth-child(4)").addClass("a_purple");
			$(".purbtn:nth-child(2)").removeClass("a_purple");
			$(".purbtn:nth-child(3)").removeClass("a_purple");
			$(".purbtn:nth-child(1)").removeClass("a_purple");
			$(".purbtn:nth-child(5)").removeClass("a_purple");
		});
		$('.purbtn:nth-child(5)').click(function () {
			$(".purbtn:nth-child(5)").addClass("a_purple");
			$(".purbtn:nth-child(2)").removeClass("a_purple");
			$(".purbtn:nth-child(3)").removeClass("a_purple");
			$(".purbtn:nth-child(4)").removeClass("a_purple");
			$(".purbtn:nth-child(1)").removeClass("a_purple");
		});	
	});



</script>


<div id="m2_module_area" style="display:none">
<div class="speed" id="m2_levelTop_1">
	<ul>
		<li><div class="s_1">1</div></li>
		<li><div >2</div></li>
		<li><div >3</div></li>
		<li><div >4</div></li>
		<li><div >5</div></li>
		<li><div >6</div></li>
	</ul>
</div>
<div class="speed" id="m2_levelTop_2" style="display:none">
	<ul>
		<li><div >1</div></li>
		<li><div class="s_1">2</div></li>
		<li><div >3</div></li>
		<li><div >4</div></li>
		<li><div >5</div></li>
		<li><div >6</div></li>
	</ul>
</div>
<div class="speed" id="m2_levelTop_3" style="display:none">
	<ul>
		<li><div >1</div></li>
		<li><div >2</div></li>
		<li><div class="s_1" >3</div></li>
		<li><div >4</div></li>
		<li><div >5</div></li>
		<li><div >6</div></li>
	</ul>
</div>
<div class="speed" id="m2_levelTop_4" style="display:none">
	<ul>
		<li><div >1</div></li>
		<li><div >2</div></li>
		<li><div >3</div></li>
		<li><div class="s_1">4</div></li>
		<li><div >5</div></li>
		<li><div >6</div></li>
	</ul>
</div>
<div class="speed" id="m2_levelTop_5" style="display:none">
	<ul>
		<li><div >1</div></li>
		<li><div >2</div></li>
		<li><div >3</div></li>
		<li><div >4</div></li>
		<li><div class="s_1">5</div></li>
		<li><div >6</div></li>
	</ul>
</div>
<div class="speed" id="m2_levelTop_6" style="display:none">
	<ul>
		<li><div >1</div></li>
		<li><div >2</div></li>
		<li><div >3</div></li>
		<li><div >4</div></li>
		<li><div >5</div></li>
		<li><div class="s_1">6</div></li>
	</ul>
</div>
<!-- 關卡敘述-->
<div id='m2_leveldsc_1' class="wrap_title">
<?php echo $model_data['modelData_2']['levelDsc']['1'];?>
</div>
<div id='m2_leveldsc_2' style="display:none" class="wrap_title">
<?php echo $model_data['modelData_2']['levelDsc']['2'];?>
</div>
<div id='m2_leveldsc_3' style="display:none" class="wrap_title">
<?php echo $model_data['modelData_2']['levelDsc']['3'];?>
</div>
<div id='m2_leveldsc_4' style="display:none" class="wrap_title">
<?php echo $model_data['modelData_2']['levelDsc']['4'];?>
</div>
<div id='m2_leveldsc_5' style="display:none" class="wrap_title">
<?php echo $model_data['modelData_2']['levelDsc']['5'];?>
</div>
<div id='m2_leveldsc_6' style="display:none" class="wrap_title">
<?php echo $model_data['modelData_2']['levelDsc']['6'];?>
</div>
<!-- 關卡敘述 END -->
<div class="gb25_wrap">
	<div class="gb25_area1" id="m2_number_tab">
		<table>
			<tr>
				<th>Your number</th>
				<th id="m2_case_1_th1">我們的總和</th>
				<th id="m2_case_1_th2" style="display:none">我們的累加</th>
			</tr>
			<tr>
				<td>
					<button type="button" id="m2_btn_0" onclick="m2_setNumber('0')" class="purbtn" >0</button>
					<button type="button" id="m2_btn_1" onclick="m2_setNumber('1')" class="purbtn" >1</button>
					<button type="button" id="m2_btn_2" onclick="m2_setNumber('2')" class="purbtn" >2</button>
					<button type="button" id="m2_btn_3" onclick="m2_setNumber('3')" class="purbtn" >3</button>
					<button type="button" id="m2_btn_4" onclick="m2_setNumber('4')" class="purbtn" >4</button>
				</td>
				<td rowspan="3" id="m2_case_1_td1" class="get_1">
				<span id="m2_totalNum"/>0</span>
				</td>
				<td rowspan="3" id="m2_case_1_td2"  style="display:none"><input type="text" readonly id="m2_allTotalNum" /></td>
			</tr>
			<tr>
				<th>Partner’s number</th>
			</tr>
			<tr>
				<td>
					<button type="button" id="m2_friend_0"  class="bluebtn" >0</button>
					<button type="button" id="m2_friend_1"  class="bluebtn" >1</button>
					<button type="button" id="m2_friend_2"  class="bluebtn" >2</button>
					<button type="button" id="m2_friend_3"  class="bluebtn" >3</button>
					<button type="button" id="m2_friend_4"  class="bluebtn" >4</button>
				</td>
			</tr>
		</table>
	</div>
	<!-----按鈕區----->
	<div class="gb25_button">
		<button class="button button-raised" onclick="m2_goNext_2()" type="button" id="m2_game_1">下一關</button>
	</div>
	<!-----按鈕區END----->
<!--
	<div  >
		<table class="datainfo">
		<tr>
			<td><img src="<?php echo base_url('public/images/user_tt.png'); ?>" alt="TT"></td>
			<td width="250">
				<button type="button" id="m2_btn_0" onclick="m2_setNumber('0')" >0</button>
				<button type="button" id="m2_btn_1" onclick="m2_setNumber('1')" >1</button>
				<button type="button" id="m2_btn_2" onclick="m2_setNumber('2')" >2</button>
				<button type="button" id="m2_btn_3" onclick="m2_setNumber('3')" >3</button>
				<button type="button" id="m2_btn_4" onclick="m2_setNumber('4')" >4</button>
			</td>
			<td  class="vtop"><h4>夥伴出的值</h4><p id="m2_friend">0</p></td>
			<td  class="vtop"><h4>我們的總合</h4><p id="m2_totalNum">0</p></td>
			<td  class="vtop"><h4>累加的總合</h4><p id="m2_allTotalNum">0</p></td>
		</tr>
		</table>
	</div>
	-->
<div id="m2_game_2" style="display:none;" >
	<div class="gb25_area2">
		<table >
			<tr>
				<th colspan="2"></th>
		<?php  
		for($x=0;$x<$model_data['modelData_2']['MaxCount'];$x++){
		?>
				<th>我們</th>		
				<th>對手</th>		
		<?php	
		}
		?>		
					
			</tr>
<?php
	if(isset($model_data['modelData_2']['play_2_Rount']) and $model_data['modelData_2']['play_2_Rount'] >0){
		for($a=0,$b=1;$a<$model_data['modelData_2']['play_2_Rount'];$a++,$b++){
?>			
			
			<tr>
				<td rowspan="2" class="t_1">第<?php echo $b;?>回合</td>		
				<td class="t_2">提出</td>
		<?php  
		for($x=0,$y=0;$x<$model_data['modelData_2']['MaxCount'];$x++,$y+=2){
		?>
				<td id="m2_up_<?php echo $a.$y;?>" class="t_2"></td>		
				<td id="m2_up_<?php echo $a.($y+1);?>" class="t_2"></td>		
		<?php	
		}
		?>		
			</tr>
			<tr>
				<td>總和</td>		
		<?php  
		for($x=0,$y=0;$x<$model_data['modelData_2']['MaxCount'];$x++,$y+=2){
		?>
				<td id="m2_dw_<?php echo $a.$y;?>"></td>		
				<td id="m2_dw_<?php echo $a.($y+1);?>"></td>		
		<?php	
		}
		?>
			</tr>
<?php
	}
}
?>			
		</table>
	</div>
</div>	
<div id="m2_game_3" style="display:none;" >
	<div class="gb25_area2">
		<table >
			<tr>
			<th colspan="2"></th>
		<?php  
		for($x=0;$x<$model_data['modelData_2']['MaxCount'];$x++){
		?>
				<th>我們</th>		
				<th>對手</th>		
		<?php	
		}
		?>	
			</tr>
			<tr>
				<td rowspan="2" class="t_1">第1回合</td>		
				<td class="t_2">提出</td>		
		<?php  
		for($x=0,$y=0;$x<$model_data['modelData_2']['MaxCount'];$x++,$y+=2){
		?>
				<td id="m2_up_<?php echo ($model_data['modelData_2']['play_2_Rount']+0).$y;?>" class="t_2"></td>		
				<td id="m2_up_<?php echo ($model_data['modelData_2']['play_2_Rount']+0).($y+1);?>" class="t_2"></td>		
		<?php	
		}
		?>		

			</tr>
			<tr>
				<td>總和</td>		
		<?php  
		for($x=0,$y=0;$x<$model_data['modelData_2']['MaxCount'];$x++,$y+=2){
		?>
				<td id="m2_dw_<?php echo ($model_data['modelData_2']['play_2_Rount']+0).$y;?>"></td>		
				<td id="m2_dw_<?php echo ($model_data['modelData_2']['play_2_Rount']+0).($y+1);?>"></td>		
		<?php	
		}
		?>
			
			</tr>
		</table>
	</div>
</div>
<div id="m2_game_4" style="display:none;" >
	<div class="gb25_area2">
		<table >
			<tr>
				<th colspan="2"></th>
	<?php  
	for($x=0;$x<$model_data['modelData_2']['MaxCount'];$x++){
	?>
			<th>我們</th>		
			<th>對手</th>		
	<?php	
	}
	?>	
			
			</tr>
			<tr>
				<td rowspan="2" class="t_1">第1回合</td>		
				<td class="t_2">提出</td>		
	<?php  
	for($x=0,$y=0;$x<$model_data['modelData_2']['MaxCount'];$x++,$y+=2){
	?>
			<td id="m2_up_<?php echo ($model_data['modelData_2']['play_2_Rount']+1).$y;?>" class="t_2"></td>		
			<td id="m2_up_<?php echo ($model_data['modelData_2']['play_2_Rount']+1).($y+1);?>" class="t_2"></td>		
	<?php	
	}
	?>
			</tr>
			<tr>
				<td>總和</td>		
	<?php  
	for($x=0,$y=0;$x<$model_data['modelData_2']['MaxCount'];$x++,$y+=2){
	?>
			<td id="m2_dw_<?php echo ($model_data['modelData_2']['play_2_Rount']+1).$y;?>"></td>		
			<td id="m2_dw_<?php echo ($model_data['modelData_2']['play_2_Rount']+1).($y+1);?>"></td>		
	<?php	
	}
	?>
			</tr>
		</table>
	</div>
</div>
<div id="m2_game_5" style="display:none;" >
	<div class="gb25_checkbox" >
		<ul>
<?php  
for($x=1;$x <= $model_data['modelData_2']['MaxValue'];$x++){
?>
			<li><input type="checkbox" value="<?php echo $x;?>" id="m2_chkbox_<?php echo $x;?>" onclick="m2_setChkBox('<?php echo $x;?>')" ><p for="m2_chkbox_<?php echo $x;?>"><?php echo $x;?></p></li>		
<?php	
}
?>	
		</ul>
	</div>
	<!-----按鈕區----->
	<div class="gb25_button">
	<button class="button button-raised" onclick="m2_goNext_6()" type="button">下一關</button>
	</div>
	<!-----按鈕區END----->

</div>

<div id="m2_game_6" style="display:none;" >
	第五關選擇的數值：<span id="m2_swNumber_area"></span>

	<div class="gb25_area2">
		<table >
			<tr>
			<th colspan="2"></th>
	<?php  
	for($x=0;$x<$model_data['modelData_2']['MaxCount'];$x++){
	?>
			<th>我們</th>		
			<th>對手</th>		
	<?php	
	}
	?>	
			</tr>
			<tr>
				<td rowspan="2" class="t_1">第1回合</td>		
				<td class="t_2">提出</td>		
	<?php  
	for($x=0,$y=0;$x<$model_data['modelData_2']['MaxCount'];$x++,$y+=2){
	?>
			<td id="m2_up_<?php echo ($model_data['modelData_2']['play_2_Rount']+3).$y;?>" class="t_2"></td>		
			<td id="m2_up_<?php echo ($model_data['modelData_2']['play_2_Rount']+3).($y+1);?>" class="t_2"></td>		
	<?php	
	}
	?>
		
			</tr>
			<tr>
				<td>總和</td>		
	<?php  
	for($x=0,$y=0;$x<$model_data['modelData_2']['MaxCount'];$x++,$y+=2){
	?>
			<td id="m2_dw_<?php echo ($model_data['modelData_2']['play_2_Rount']+3).$y;?>"></td>		
			<td id="m2_dw_<?php echo ($model_data['modelData_2']['play_2_Rount']+3).($y+1);?>"></td>		
	<?php	
	}
	?>

			</tr>
		</table>
	</div>
</div>


<!-- 划龍舟 -->
<div id="boatShowArea" style="display:none;" class="gb25_area3">
<table>
	<tr>
<?php
for($x = 0;$x<26;$x++){
?>
	<th id="boat_area1_<?php echo $x;?>"></th>
<?php	
}
?>	
	</tr>
	<tr>
<?php
for($x = 0;$x<26;$x++){
?>
	<th id="boat_area2_<?php echo $x;?>"></th>
<?php	
}
?>	
	</tr>	
	<tr>
<?php
for($x=0;$x<26;$x++){
?>
	<td <? echo ($x==0)?'class="t_1"':'';?>><?php echo $x;?></td>
<?php	
}
?>	
	</tr>
</table> 
</div>
</div>
</div>

<script language="javascript">

var m2_totalNumber = 0;//累加的總和
var m2_nowNumber = 0;//我們的總和
var m2_game_type = 1;//目前遊戲在第幾關，預設第一關
var m2_rounds = 0;//第幾回合，預設0=>第一回合
var m2_times = 0;//第二關，第幾次
var m2_MaxNumber = <?php  echo $model_data['modelData_2']['MaxValue'];?>;//達標數值
var m2_beginNumber = new Array('<?php  echo $model_data['modelData_2']['play_3_BeginNumber'];?>','<?php echo $model_data['modelData_2']['play_4_BeginNumber'];?>');//預設起始值


//傳送數字給夥伴
function m2_setNumber(getValue){
	if(canSend){
		m2_totalNumber = m2_totalNumber + parseInt(getValue);
		$('#m2_allTotalNum').val(m2_totalNumber);
		
		//傳送資訊給對手
		var sendTalkData = { };
			sendTalkData.room_id = roomID;
			sendTalkData.com_dsc = 'web_m2_setNumber';
			sendTalkData.user_type = userType;
			sendTalkData.val_dsc = getValue;
		var json_data = JSON.stringify(sendTalkData);
		socket.emit('modelsComman', json_data); 
		//傳送資訊給對手 end
		
		if( m2_game_type == 1){//第1關
			m2_nowNumber =  parseInt(getValue);
			$('#m2_totalNum').html(m2_nowNumber);
			$('#m2_friend').html('0');
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm2_setNumber';//動作類型
				newOptionOBj.dataType_Dsc = '設定數字';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M2SetNumber';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = 'm2_totalNum||m2_friend';//動作內容敘述
				newOptionOBj.dataFunction_Value = m2_nowNumber+'||0';//動作內容敘述
			option_record.push(newOptionOBj);
			//紀錄動作 end
			//紀錄閱卷資料
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '按下數字鍵';//動作類型
				newScoresOBj.data = m2_nowNumber;//內容值
				newScoresOBj.title = '搶25遊戲模組';//題目
				scores_record.push(newScoresOBj);			
			//紀錄閱卷資料 end			
			
		}else{
			m2_nowNumber = m2_nowNumber + parseInt(getValue);			
			$('#m2_up_'+m2_rounds+m2_times).html(m2_nowNumber);
			$('#m2_dw_'+m2_rounds+m2_times).html(m2_totalNumber);
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'm2_setNumber';//動作類型
				newOptionOBj.dataType_Dsc = '設定數字';//動作類型敘述
				newOptionOBj.dataFunction = 'record_M2SetNumber';//動作內容敘述
				newOptionOBj.dataFunction_ObjID = 'm2_up_'+m2_rounds+m2_times+'||m2_dw_'+m2_rounds+m2_times;//動作內容敘述
				newOptionOBj.dataFunction_Value = m2_nowNumber+'||'+m2_totalNumber;//動作內容敘述
			option_record.push(newOptionOBj);
			//紀錄動作 end
			//紀錄閱卷資料
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '按下數字鍵';//動作類型
				newScoresOBj.data = m2_nowNumber;//內容值
				newScoresOBj.title = '搶25遊戲模組';//題目
				scores_record.push(newScoresOBj);			
			//紀錄閱卷資料 end	
		}
	}
	canSend = false;
} 


//接收電腦出的值
function web_m2_computerTime(){
	m2_times++;//往左一格
	m2_nowNumber = 0;
	m2_totalNumber  = m2_totalNumber + parseInt(getWebValue['val_dsc']);
	
	$('#m2_up_'+m2_rounds+m2_times).html(getWebValue['val_dsc']);
	$('#m2_dw_'+m2_rounds+m2_times).html(m2_totalNumber);
	
	//紀錄動作
	var newOptionOBj =  $.extend(true,{}, option_obj);
		newOptionOBj.dataType = 'm2_setNumber';//動作類型
		newOptionOBj.dataType_Dsc = '設定數字';//動作類型敘述
		newOptionOBj.dataFunction = 'record_M2SetNumber';//動作內容敘述
		newOptionOBj.dataFunction_ObjID = 'm2_up_'+m2_rounds+m2_times+'||m2_dw_'+m2_rounds+m2_times;//動作內容敘述
		newOptionOBj.dataFunction_Value = getWebValue['val_dsc']+'||'+m2_totalNumber;//動作內容敘述
	option_record.push(newOptionOBj);
	//紀錄動作 end
	
		m2_times++;//設定好在往左一格

}

//往下一回合，重新設定
function web_m2_resetAllValue(){
	m2_totalNumber = 0;//累加的總和
	m2_nowNumber = 0;//我們的總和
	m2_rounds++;//第二關，第一回合
	m2_times = 0;//第二關，第幾次
	canSend  = true;
	
	//重置自己端、對手端的按鈕顏色
	for(var x=0;x<5;x++){
			$('#m2_friend_'+x).attr('class','bluebtn');
			$('#m2_btn_'+x).attr('class','purbtn');
	}
	
	//移動龍船
	var boat = $('#boat_1');
	$('#boat_area1_0').append(boat);
	boat = $('#boat_2');
	$('#boat_area2_0').append(boat);
	
	//紀錄動作
	var newOptionOBj =  $.extend(true,{}, option_obj);
		newOptionOBj.dataType = 'm2_resetAllValue';//動作類型
		newOptionOBj.dataType_Dsc = '設定數字';//動作類型敘述
		newOptionOBj.dataFunction = 'record_M2ResetAllValue';//動作內容敘述
		newOptionOBj.dataFunction_ObjID = '';//動作內容敘述
		newOptionOBj.dataFunction_Value = '';//動作內容敘述
	option_record.push(newOptionOBj);
	//紀錄動作 end
	
}

//從夥伴端接收數字
function web_m2_setNumber(){
	var getValue = getWebValue['val_dsc'];
	m2_totalNumber = m2_totalNumber + parseInt(getValue);
	$('#m2_allTotalNum').val(m2_totalNumber);	
	$('#m2_friend').html(getValue);
	
	//更新夥伴端按鈕的顏色
	for(var x=0;x<5;x++){
		if(x == parseInt(getValue)){
			$('#m2_friend_'+x).attr('class','bluebtn a_blue');
		}else{
			$('#m2_friend_'+x).attr('class','bluebtn');
		}
	}
	
	
	if( m2_game_type == 1){//第一關
		m2_nowNumber =  m2_nowNumber + parseInt(getValue);
		$('#m2_totalNum').html(m2_nowNumber);
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm2_setNumber';//動作類型
			newOptionOBj.dataType_Dsc = '設定數字';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M2SetNumber';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'm2_allTotalNum||m2_friend||m2_totalNum';//動作內容敘述
			newOptionOBj.dataFunction_Value = m2_totalNumber+'||'+getValue+"||"+m2_nowNumber;//動作內容敘述
		option_record.push(newOptionOBj);
		//紀錄動作 end
		//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '夥伴';
			newScoresOBj.event = '按下數字鍵';//動作類型
			newScoresOBj.data = getValue;//內容值
			newScoresOBj.title = '搶25遊戲模組';//題目
			scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end	
		
	}else{
		m2_nowNumber = m2_nowNumber + parseInt(getValue);		
		$('#m2_up_'+m2_rounds+m2_times).html(m2_nowNumber);
		$('#m2_dw_'+m2_rounds+m2_times).html(m2_totalNumber);
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm2_setNumber';//動作類型
			newOptionOBj.dataType_Dsc = '設定數字';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M2SetNumber';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = 'm2_allTotalNum||m2_friend||m2_up_'+m2_rounds+m2_times+'||m2_dw_'+m2_rounds+m2_times;//動作內容敘述
			newOptionOBj.dataFunction_Value = m2_totalNumber+'||'+getValue+"||"+m2_nowNumber+"||"+m2_totalNumber;//動作內容敘述
		option_record.push(newOptionOBj);
		//紀錄動作 end
		//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '夥伴';
			newScoresOBj.event = '按下數字鍵';//動作類型
			newScoresOBj.data = getValue;//內容值
			newScoresOBj.title = '搶25遊戲模組';//題目
			scores_record.push(newScoresOBj);			
		//紀錄閱卷資料 end	
	}

	canSend = true;
}


var m2_next_level_a = false;
var m2_next_level_b = false;
//進入第二關
function m2_goNext_2(){
	var sendTalkData = {};
		sendTalkData.room_id = roomID;
		sendTalkData.com_dsc = 'web_m2_goNextLevel_2';
		sendTalkData.user_type = userType;
	var json_data = JSON.stringify(sendTalkData);
		socket.emit('modelsComman', json_data); 
		m2_next_level_a = true;

	
	if(m2_next_level_a && m2_next_level_b){
		var boat = $('#boat_1');
		$('#boat_area1_0').append(boat);
		boat = $('#boat_2');
		$('#boat_area2_0').append(boat);
		
		$('.vtop').hide();//隱藏左顯示區域
		$('#m2_game_1').hide();
		$('#m2_game_2').show();
		$('#boatShowArea').show();
		$('#m2_case_1_th1').remove();
		$('#m2_case_1_th2').remove('');
		$('#m2_case_1_td1').remove('');
		$('#m2_case_1_td2').remove('');		
		nowLevelType =2;
		
		m2_hideLevelDsc('2');
		m2_next_level_a = false;
		m2_next_level_b = false;
		m2_game_type =2;
		m2_totalNumber = 0;//累加的總和
		m2_nowNumber = 0;//我們的總和
		canSend  = true;
		
		

		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm2_goNext';//動作類型
			newOptionOBj.dataType_Dsc = '進入第二關';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M2GoNext';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = '';//動作內容敘述
			newOptionOBj.dataFunction_Value = '';//動作內容敘述
		option_record.push(newOptionOBj);
		//紀錄動作 end

		//重置自己端、對手端的按鈕顏色
		for(var x=0;x<5;x++){
				$('#m2_friend_'+x).attr('class','bluebtn');
				$('#m2_btn_'+x).attr('class','purbtn');
		}

	}	
}

function web_m2_goNextLevel_2(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m2_next_level_<?php echo ($model_data['userType'] == 'A')?'b':'a'; ?> = true;
	}
	if(m2_next_level_a && m2_next_level_b){
		var boat = $('#boat_1');
		$('#boat_area1_0').append(boat);
		boat = $('#boat_2');
		$('#boat_area2_0').append(boat);
		nowLevelType =2;
		
		$('.vtop').hide();//隱藏左顯示區域		
		$('#m2_game_1').hide();
		$('#m2_game_2').show();
		$('#boatShowArea').show();
		$('#m2_case_1_th1').remove();
		$('#m2_case_1_th2').remove('');
		$('#m2_case_1_td1').remove('');
		$('#m2_case_1_td2').remove('');
		
		m2_hideLevelDsc('2');		
		m2_next_level_a = false;
		m2_next_level_b = false;
		m2_game_type =2;
		m2_totalNumber = 0;//累加的總和
		m2_nowNumber = 0;//我們的總和
		canSend  = true;
		
		var boat = $('#boat_1');
		$('#boat_area1_'+m2_totalNumber).append(boat);
		boat = $('#boat_2');
		$('#boat_area2_'+m2_totalNumber).append(boat);
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm2_goNext';//動作類型
			newOptionOBj.dataType_Dsc = '進入第二關';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M2GoNext2';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = '';//動作內容敘述
			newOptionOBj.dataFunction_Value = '';//動作內容敘述
		option_record.push(newOptionOBj);
		//紀錄動作 end
		
		//重置自己端、對手端的按鈕顏色
		for(var x=0;x<5;x++){
				$('#m2_friend_'+x).attr('class','bluebtn');
				$('#m2_btn_'+x).attr('class','purbtn');
		}

	}	
}

//進入第3關
function web_m2_goNextLevel_3(){
	$('#m2_game_1').hide();
	$('#m2_game_2').hide();
	$('#m2_game_3').show();
	m2_hideLevelDsc('3');
	nowLevelType =3;
	
	m2_next_level_a = false;
	m2_next_level_b = false;
	m2_game_type =3;
	m2_totalNumber = parseInt(m2_beginNumber[0]);//設定起始值
	m2_nowNumber = 0;//我們的總和
	m2_rounds = <?php echo ($model_data['modelData_2']['play_2_Rount']+0);?>;//第3關，第一回合
	m2_times = 0;//第3關，第幾次
	var boat = $('#boat_1');
	$('#boat_area1_'+m2_totalNumber).append(boat);
	boat = $('#boat_2');
	$('#boat_area2_'+m2_totalNumber).append(boat);

	canSend  = true;
	
	//紀錄動作
	var newOptionOBj =  $.extend(true,{}, option_obj);
		newOptionOBj.dataType = 'm2_goNext3';//動作類型
		newOptionOBj.dataType_Dsc = '進入第3關';//動作類型敘述
		newOptionOBj.dataFunction = 'record_M2GoNext3';//動作內容敘述
		newOptionOBj.dataFunction_ObjID = '';//動作內容敘述
		newOptionOBj.dataFunction_Value = '';//動作內容敘述
	option_record.push(newOptionOBj);
	//紀錄動作 end
}

//進入第4關
function web_m2_goNextLevel_4(){
	$('#m2_game_1').hide();
	$('#m2_game_2').hide();
	$('#m2_game_3').hide();
	$('#m2_game_4').show();
	m2_hideLevelDsc('4');
	nowLevelType =4;
		
	m2_next_level_a = false;
	m2_next_level_b = false;
	m2_game_type =4;
	m2_totalNumber = parseInt(m2_beginNumber[1]);//累加的總和
	m2_nowNumber = 0;//我們的總和
	m2_rounds = <?php echo ($model_data['modelData_2']['play_2_Rount']+1);?>;//第3關，第一回合
	m2_times = 0;//第3關，第幾次
	var boat = $('#boat_1');
	$('#boat_area1_'+m2_totalNumber).append(boat);
	boat = $('#boat_2');
	$('#boat_area2_'+m2_totalNumber).append(boat);

	canSend  = true;
	
	//紀錄動作
	var newOptionOBj =  $.extend(true,{}, option_obj);
		newOptionOBj.dataType = 'm2_goNext4';//動作類型
		newOptionOBj.dataType_Dsc = '進入第4關';//動作類型敘述
		newOptionOBj.dataFunction = 'record_M2GoNext4';//動作內容敘述
		newOptionOBj.dataFunction_ObjID = '';//動作內容敘述
		newOptionOBj.dataFunction_Value = '';//動作內容敘述
	option_record.push(newOptionOBj);
	//紀錄動作 end
}

//進入第5關
function web_m2_goNextLevel_5(){
	$('#m2_game_4').hide();
	$('#m2_game_5').show();
	$('#gb25_area1').hide();	
	$('#boatShowArea').hide();
	$('#m2_number_tab').hide();
	nowLevelType =5;
	
	m2_hideLevelDsc('5');

	m2_next_level_a = false;
	m2_next_level_b = false;
	m2_game_type = 5;
	m2_totalNumber = 0;//累加的總和
	m2_nowNumber = 0;//我們的總和
	m2_rounds = <?php echo ($model_data['modelData_2']['play_2_Rount']+2);?>;//第3關，第一回合
	m2_times = 0;//第3關，第幾次
	var boat = $('#boat_1');
	$('#boat_area1_'+m2_totalNumber).append(boat);
	boat = $('#boat_2');
	$('#boat_area2_'+m2_totalNumber).append(boat);

	canSend  = true;
	
	//紀錄動作
	var newOptionOBj =  $.extend(true,{}, option_obj);
		newOptionOBj.dataType = 'm2_goNext5';//動作類型
		newOptionOBj.dataType_Dsc = '進入第5關';//動作類型敘述
		newOptionOBj.dataFunction = 'record_M2GoNext5';//動作內容敘述
		newOptionOBj.dataFunction_ObjID = '';//動作內容敘述
		newOptionOBj.dataFunction_Value = '';//動作內容敘述
	option_record.push(newOptionOBj);
	//紀錄動作 end
}

var m2_next_level6_a = false;
var m2_next_level6_b = false;
function m2_goNext_6(){
	var sendTalkData = {};
		sendTalkData.room_id = roomID;
		sendTalkData.com_dsc = 'web_m2_goNextLevel_6';
		sendTalkData.user_type = userType;
	var json_data = JSON.stringify(sendTalkData);
		socket.emit('modelsComman', json_data); 
		m2_next_level6_a = true;

	
	if(m2_next_level6_a && m2_next_level6_b){
		$('#m2_game_5').hide();
		$('#m2_game_6').show();
		$('#gb25_area1').show();	
		$('#boatShowArea').show();
		$('#m2_number_tab').show();
		nowLevelType =6;
		
		m2_hideLevelDsc('6');

		m2_next_level_a = false;
		m2_next_level_b = false;
		m2_game_type = 6;
		m2_totalNumber = 0;//累加的總和
		m2_nowNumber = 0;//我們的總和
		m2_rounds = <?php echo ($model_data['modelData_2']['play_2_Rount']+3);?>;//第3關，第一回合
		m2_times = 0;//第3關，第幾次
		var boat = $('#boat_1');
		$('#boat_area1_'+m2_totalNumber).append(boat);
		boat = $('#boat_2');
		$('#boat_area2_'+m2_totalNumber).append(boat);

		canSend  = true;
		m2_swt_SwitchNumber();
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm2_goNext6';//動作類型
			newOptionOBj.dataType_Dsc = '進入第6關';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M2GoNext6';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = '';//動作內容敘述
			newOptionOBj.dataFunction_Value = '';//動作內容敘述
		option_record.push(newOptionOBj);
		//紀錄動作 end


	}	
}

//進入第6關
function web_m2_goNextLevel_6(){
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		m2_next_level6_<?php echo ($model_data['userType'] == 'A')?'b':'a'; ?> = true;
	}
	if(m2_next_level6_a && m2_next_level6_b){
		$('#m2_game_5').hide();
		$('#m2_game_6').show();
		$('#gb25_area1').show();	
		$('#boatShowArea').show();
		$('#m2_number_tab').show();
		nowLevelType =6;
	
		m2_hideLevelDsc('6');

		m2_next_level_a = false;
		m2_next_level_b = false;
		m2_game_type = 6;
		m2_totalNumber = 0;//累加的總和
		m2_nowNumber = 0;//我們的總和
		m2_rounds = <?php echo ($model_data['modelData_2']['play_2_Rount']+3);?>;//第3關，第一回合
		m2_times = 0;//第3關，第幾次
		var boat = $('#boat_1');
		$('#boat_area1_'+m2_totalNumber).append(boat);
		boat = $('#boat_2');
		$('#boat_area2_'+m2_totalNumber).append(boat);

		canSend  = true;
		m2_swt_SwitchNumber();
		
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'm2_goNext6';//動作類型
			newOptionOBj.dataType_Dsc = '進入第6關';//動作類型敘述
			newOptionOBj.dataFunction = 'record_M2GoNext6';//動作內容敘述
			newOptionOBj.dataFunction_ObjID = '';//動作內容敘述
			newOptionOBj.dataFunction_Value = '';//動作內容敘述
		option_record.push(newOptionOBj);
		//紀錄動作 end
	}
}

//移動龍船
function web_m2_MoveBoat(){
	//移動龍船
	var boat = $('#'+getWebValue['boat_id']);
	if(getWebValue['boat_id'] == 'boat_1'){
		$('#boat_area1_'+getWebValue['get_value']).append(boat);
	}
	if(getWebValue['boat_id'] == 'boat_2'){
		$('#boat_area2_'+getWebValue['get_value']).append(boat);
	}
	
	//紀錄動作
	var newOptionOBj =  $.extend(true,{}, option_obj);
		newOptionOBj.dataType = 'm2_moveBoat';//動作類型
		newOptionOBj.dataType_Dsc = '移動龍船';//動作類型敘述
		newOptionOBj.dataFunction = 'record_M2MoveBoat';//動作內容敘述
		if(getWebValue['boat_id'] == 'boat_1'){
			newOptionOBj.dataFunction_ObjID = getWebValue['boat_id']+'||boat_area1_'+getWebValue['get_value'];//動作內容敘述
		}
		if(getWebValue['boat_id'] == 'boat_2'){
			newOptionOBj.dataFunction_ObjID = getWebValue['boat_id']+'||boat_area2_'+getWebValue['get_value'];//動作內容敘述
		}
		newOptionOBj.dataFunction_Value = '';//動作內容敘述
	option_record.push(newOptionOBj);
	//紀錄動作 end
}

//關卡敘述隱藏跟顯示
function m2_hideLevelDsc(getIndex){
	for(var x=1;x<7;x++){
		if(x==getIndex){
			$('#m2_leveldsc_'+x).show();
			$('#m2_levelTop_'+x).show();
		}else{
			$('#m2_leveldsc_'+x).hide();
			$('#m2_levelTop_'+x).hide();
		}
	}
}

//第5關互相討論
function m2_setChkBox(getNum){
	 if($("#m2_chkbox_"+getNum).prop("checked"))
   {
	   	var sendTalkData = {};
		sendTalkData.room_id = roomID;
		sendTalkData.com_dsc = 'web_m2_setChkBox';
		sendTalkData.user_type = userType;
		sendTalkData.val_dsc = getNum;
		sendTalkData.obj_id = "m2_chkbox_"+getNum;
		
		var json_data = JSON.stringify(sendTalkData);
		socket.emit('modelsComman', json_data); 

	   
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
		newOptionOBj.dataType = 'm2_setChkBox';//動作類型
		newOptionOBj.dataType_Dsc = '勾選數值';//動作類型敘述
		newOptionOBj.dataFunction = 'record_M2SetChkBox';//動作內容敘述
		newOptionOBj.dataFunction_ObjID = "m2_chkbox_"+getNum;//動作內容敘述
		newOptionOBj.dataFunction_Value = getNum;//動作內容敘述
		option_record.push(newOptionOBj);
		//紀錄動作 end  
   }
   else
   {
		var sendTalkData = {};
		sendTalkData.room_id = roomID;
		sendTalkData.com_dsc = 'web_m2_unSetChkBox';
		sendTalkData.user_type = userType;
		sendTalkData.val_dsc = getNum;
		sendTalkData.obj_id = "m2_chkbox_"+getNum;
		
		var json_data = JSON.stringify(sendTalkData);
		socket.emit('modelsComman', json_data); 
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
		newOptionOBj.dataType = 'm2_unSetChkBox';//動作類型
		newOptionOBj.dataType_Dsc = '取消勾選數值';//動作類型敘述
		newOptionOBj.dataFunction = 'record_M2UnSetChkBox';//動作內容敘述
		newOptionOBj.dataFunction_ObjID = "m2_chkbox_"+getNum;//動作內容敘述
		newOptionOBj.dataFunction_Value = getNum;//動作內容敘述
		option_record.push(newOptionOBj);
		//紀錄動作 end  
	}
}

function web_m2_setChkBox(){
	var objid = getWebValue['obj_id'];
	var objValue = getWebValue['val_dsc'];
	$('#'+objid).prop("checked", true);
	
	//紀錄動作
	var newOptionOBj =  $.extend(true,{}, option_obj);
		newOptionOBj.dataType = 'm2_setChkBox';//動作類型
		newOptionOBj.dataType_Dsc = '勾選數字';//動作類型敘述
		newOptionOBj.dataFunction = 'record_M2SetChkBox';//動作內容敘述
		newOptionOBj.dataFunction_ObjID = objid;//動作內容敘述
		newOptionOBj.dataFunction_Value = objValue;//動作內容敘述
	option_record.push(newOptionOBj);
	//紀錄動作 end		
	//紀錄閱卷資料
	var newScoresOBj =  $.extend(true,{}, scores_obj);
		newScoresOBj.userType = '夥伴';
		newScoresOBj.event = '勾選數字';//動作類型
		newScoresOBj.data = objValue;//內容值
		newScoresOBj.title = '搶25遊戲模組';//題目
		scores_record.push(newScoresOBj);			
	//紀錄閱卷資料 end	
}

function web_m2_unSetChkBox(){
	var objid = getWebValue['obj_id'];
	var objValue = getWebValue['val_dsc'];
	$('#'+objid).prop("checked", false);
	
	//紀錄動作
	var newOptionOBj =  $.extend(true,{}, option_obj);
		newOptionOBj.dataType = 'm2_unSetChkBox';//動作類型
		newOptionOBj.dataType_Dsc = '取消勾選數字';//動作類型敘述
		newOptionOBj.dataFunction = 'record_M2UnSetChkBox';//動作內容敘述
		newOptionOBj.dataFunction_ObjID = objid;//動作內容敘述
		newOptionOBj.dataFunction_Value = objValue;//動作內容敘述
	option_record.push(newOptionOBj);
	//紀錄動作 end		
	//紀錄閱卷資料
	var newScoresOBj =  $.extend(true,{}, scores_obj);
		newScoresOBj.userType = '夥伴';
		newScoresOBj.event = '取消勾選數字';//動作類型
		newScoresOBj.data = objValue;//內容值
		newScoresOBj.title = '搶25遊戲模組';//題目
		scores_record.push(newScoresOBj);			
	//紀錄閱卷資料 end	
}

//顯示第五關討論後勾選的值
function m2_swt_SwitchNumber()
{
	var dsc = '';
	for(var x=1;x <= m2_MaxNumber;x++){
		if($("#m2_chkbox_"+x).prop("checked"))
		{
			if(dsc == ''){
				dsc = dsc + x;
			}else{
				dsc = dsc +','+ x;
			}
		}
	}
	$('#m2_swNumber_area').append(dsc);
}

var boat_html = '<img src="<?php echo base_url('public/images/boat.gif'); ?>" id="boat_1">';
var boat_html_2 = '<img src="<?php echo base_url('public/images/boat2.gif'); ?>" id="boat_2">';
$('#boat_area1_0').append(boat_html);
$('#boat_area2_0').append(boat_html_2);
</script>