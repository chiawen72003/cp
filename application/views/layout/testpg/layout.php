<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>合作問題解決數位學習系統</title>
<script src="<?php echo base_url('public/js/jquery-1.10.1.min.js'); ?>"> </script>
<script src="<?php echo base_url('public/js/jquery-ui.js'); ?>"> </script>
<script type="text/javascript" src="<?php echo base_url('public/js/speech.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('public/js/record-function.js'); ?>"></script> 
<script src="<?php echo base_url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('public/css/testpg/test.css?v=0.2'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/css/testpg/Button.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/css/testpg/sh-style_1.css'); ?>"/>

<script language="javascript">
var isView = <?php echo isset($isView)?'true':'false';?>;//操作紀錄觀察模式

//m4排行榜
var ArrTest = new Array();
	ArrTest[0] = new Array();
	ArrTest[1] = new Array();
	ArrTest[2] = new Array();
	
var m5Charts_0 = 0;//m5排行榜 第一關
var m5Charts_1 = 0;//m5排行榜 第二關
	
var useModel = [<?php echo isset($model_data['switchDsc'])?substr($model_data['switchDsc'],0,-1):'';?>];
var useModelIndex = 0;
var userType = "<?php echo $model_data['userType'];?>";
var canSend = <?php echo ($model_data['userType'] == 'A')?'true':'false'; ?>;//是否可以傳送數值出去
//=====================================================================================
//webSocket 連接
var getWebValue;//透過webSocket取得的資料
var roomID = '<?php echo isset($roomID)?$roomID:'testRoom';?>';//房間號
var roomData = { };
var MediaSwitch = <?php echo (isset($GeneralData['MediaSwitch']) and $GeneralData['MediaSwitch'] == '1')?'true':'false';?>;//是否讓聊天文字轉語音發音

//roomData.k = { };
roomData.room_id = roomID;
roomData.user_type = userType;
roomData.action_data = '';
roomData.com_dsc = 'web_friendLogin';
if(!isView){
	var json_data = JSON.stringify(roomData);
	var socket = io.connect('http://<?php echo isset($GeneralData['node_server'])?$GeneralData['node_server']:'127.0.0.1';?>:8081');
	socket.on('connect', function() {
		var roomID = '<?php echo isset($roomID)?$roomID:'testRoom';?>';//房間號
		var roomData = { };
		roomData.room_id = roomID;
		roomData.user_id = socket.id;
		roomData.com_dsc = 'web_friendLogin';
		socket.emit('userLogin', roomData); 
		
	});
	socket.on('message', function(data){
		getWebValue =  JSON.parse (data);
		web_setMSG();
	});
	socket.on('friendLogin', function(data){
		web_friendLogin();
	});
	socket.on('friendIsInRoom', function(data){
		web_friendIsInRoom();
	});	
	socket.on('friendLogout', function(data){
		web_friendLogout();
	});
	socket.on('getNextModel', function(data){
		web_getNextModel();
	});

	//收到模組指令
	socket.on('modelsComman', function(data){
		getWebValue =  JSON.parse ( data );
		eval(getWebValue['com_dsc'] + '()');//將字串轉成對應的function
	});
}	
//=================================
//操作紀錄區 預設變數
var option_record = [];
var option_obj = {
	'roomId':roomID,
	'userType':userType,
	'userName':'<?php echo $this->session->userdata("userName"); ?>',
	'dataType':'',
	'dataType_Dsc':'',
	'dataFunction':'',
	'dataFunction_ObjID':'',
	'dataFunction_Value':'',
	};

//評分區 預設變數
var scores_record = [];
var scores_obj = {
	'userType':'',
	'event':'',
	'data':'',
	'title':'',
	};	
	
//====================================
function sendMSG(){
	var get_msg = $('#msgInput').val();
	
	if(get_msg > ''){
		//var tempData = $('#chatRoom').val();
		var htmlDsc = '<div class="tak-1">自己:'+ get_msg +'</div>';
		$('#chatRoom').append(htmlDsc);
		
		if(!isView){
			var sendTalkData = { };
				sendTalkData.room_id = roomID;
				sendTalkData.com_dsc = 'web_setMSG';
				sendTalkData.user_type = userType;
				sendTalkData.talk_msg = get_msg;
			var json_data = JSON.stringify(sendTalkData);
			socket.emit('message',json_data); 
			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'talk';//動作類型
				newOptionOBj.dataType_Dsc = '發送訊息給夥伴';//動作類型敘述
				newOptionOBj.dataFunction = 'record_send_talk';//動作內容敘述
				newOptionOBj.dataFunction_Value = get_msg;//動作內容敘述
			option_record.push(newOptionOBj);
		
			//紀錄閱卷資料
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '對話';//動作類型
				newScoresOBj.data = get_msg;//內容值
				newScoresOBj.title = '';//題目
			scores_record.push(newScoresOBj);
		
			if(MediaSwitch){
				var tempHtml = '<?php echo base_url('public/robot/robot_img.php'); ?>?dsc='+ get_msg +'&head_type=1';
				$('#robot').attr('src',tempHtml);
			}		
		}
		$('#msgInput').val('');
        $("#chatRoom").scrollTop(9999);

	}
}

//同伴登入
var nowModuleType = '';//現在使用的模組資料
var nowLevelType = '1';//現在的關卡資料
function web_friendLogin(){	
	//var tempData = $('#chatRoom').val();
	var htmlDsc = '<div class="tak-2">同伴<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>登入遊戲</div>';
	$('#chatRoom').append(htmlDsc);
    $("#chatRoom").scrollTop(9999);
	//檢查雙方的模組是否一致
	var sendTalkData = { };
		sendTalkData.room_id = roomID;
		sendTalkData.com_dsc = 'web_checkModuleType';
		sendTalkData.user_type = userType;
		sendTalkData.type_dsc = nowModuleType;
		sendTalkData.level_dsc = nowLevelType;
	var json_data = JSON.stringify(sendTalkData);
	socket.emit('modelsComman',json_data);
	
}

//通知自己房間已經有同伴在裡面
function web_friendIsInRoom(){	
	var htmlDsc = '<div class="tak-2">同伴<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>登入遊戲</div>';
	$('#chatRoom').append(htmlDsc);
    $("#chatRoom").scrollTop(9999);
}

//對方檢查模組是否一樣
function web_checkModuleType(){
	//nowLevelType
	var type_dsc = getWebValue['type_dsc'];
	var level_dsc = getWebValue['level_dsc'];
	if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
		if(type_dsc != nowModuleType || level_dsc != nowLevelType){
			var sendTalkData = { };
				sendTalkData.room_id = roomID;
				sendTalkData.com_dsc = 'web_exit';
				sendTalkData.user_type = userType;
				sendTalkData.type_dsc = '';
			var json_data = JSON.stringify(sendTalkData);
			socket.emit('modelsComman',json_data);
		}
	}
}

//強制登出
function web_exit(){
	alert('因為雙方的操作模組不一致，請退出後再次登入操作!!');
	history.back();
}
//同伴登出
function web_friendLogout(){
	var tempData = $('#chatRoom').val();
	var htmlDsc = '<div class="tak-2">同伴<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>登出遊戲</div>'+tempData;
	$('#chatRoom').append(htmlDsc);
    $("#chatRoom").scrollTop(9999);
}

//收到夥伴傳來的訊息
function web_setMSG(){
	//var tempData = $('#chatRoom').val();
	var get_msg = getWebValue['talk_msg'];
	var htmlDsc = '<div class="tak-2">'+get_msg+':夥伴</div>';
	$('#chatRoom').append(htmlDsc);
    $("#chatRoom").scrollTop(9999);
	
	if(!isView){
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'talk';//動作類型
			newOptionOBj.dataType_Dsc = '收到夥伴傳送來的訊息';//動作類型敘述
			newOptionOBj.dataFunction = 'record_get_talk';//動作內容敘述
			newOptionOBj.dataFunction_Value = get_msg;//動作內容敘述
		option_record.push(newOptionOBj);
	
		//紀錄閱卷資料
		var newScoresOBj =  $.extend(true,{}, scores_obj);
			newScoresOBj.userType = '夥伴';
			newScoresOBj.event = '對話';//動作類型
			newScoresOBj.data = get_msg;//內容值
			newScoresOBj.title = '';//題目
		scores_record.push(newScoresOBj);
		
		if(MediaSwitch){
			var tempHtml = '<?php echo base_url('public/robot/robot_img.php'); ?>?dsc='+ getWebValue['talk_msg'] +'&head_type=2';
			$('#robot').attr('src',tempHtml);
		}	
	}
}

$( document ).ready(function() {
	if( useModel.length > 0){
<?php 
if(isset($TempRecordData['next_model_index']) and $TempRecordData['next_model_index'] > ''){
?>
useModelIndex = <?php echo $TempRecordData['next_model_index'];?>;
option_record = <?php echo $TempRecordData['record_value'];?>;

<?php	
}
?>		
	  var modelDsc = useModel[useModelIndex];
	  $('#m' + modelDsc + '_module_area').show();
	  nowModuleType	= 'm' + modelDsc + '_module_area';//紀錄目前使用的模組區域
	}
});

function web_getNextModel(){
	var modelDsc = useModel[useModelIndex];
	$('#m' + modelDsc + '_module_area').hide();
	useModelIndex++;
	modelDsc = useModel[useModelIndex];
	nowModuleType	= 'm' + modelDsc + '_module_area';//更新紀錄目前使用的模組區域
	
	if(!isView){
		//紀錄動作
		var newOptionOBj =  $.extend(true,{}, option_obj);
			newOptionOBj.dataType = 'nextModule';//動作類型
			newOptionOBj.dataType_Dsc = '載入下一個模組';//動作類型敘述
			newOptionOBj.dataFunction = 'record_NextModel';//動作內容敘述
			newOptionOBj.dataFunction_Value = '';//動作內容敘述
		option_record.push(newOptionOBj);
	}
	if( useModel.length == useModelIndex){
		endGame();//結束測驗
	}else{
		modelDsc = useModel[useModelIndex];
		$('#m' + modelDsc + '_module_area').show();
		canSend = <?php echo ($model_data['userType'] == 'A')?'true':'false'; ?>;
		nowLevelType =1;

		//存暫存檔
		$.ajax({
				url: '<?php echo site_url('testlist/saveTempOptionData'); ?>',
				type:"POST",
				data: {
					tNum:'<?php echo $this->session->userdata("teacherdataNum"); ?>',
					sNum:'<?php echo $this->session->userdata("userID"); ?>',
					sType:userType,
					qNum:'<?php echo $num;?>',
					record:option_record,
					nextIndex:useModelIndex,
				},
				error: function(xhr) {
					console.log(xhr);
					//endGame();
				},
				success: function(response) {

					
				}
		});
		
	}
	
	
}

//通知對方要換到下一個模組
function get_NextModel(){
	var sendTalkData = { };
		sendTalkData.room_id = roomID;
		sendTalkData.com_dsc = 'web_getNextModel';
		sendTalkData.user_type = userType;
		var json_data = JSON.stringify(sendTalkData);
		socket.emit('getNextModel', json_data); 
}

//紀錄checkbox的動作
function option_checkbox(obj){
	if(!isView){
		var id = obj.id;
		 if($('#'+id).prop("checked"))
	   {			
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'setCheckbox';//動作類型
				newOptionOBj.dataType_Dsc = '勾選checkbox選項';//動作類型敘述
				newOptionOBj.dataFunction = 'record_SetCheckBox';//動作內容敘述
				newOptionOBj.dataFunction_Value = id;//動作內容敘述
			option_record.push(newOptionOBj);
			//紀錄動作 end 
			
			//紀錄閱卷資料
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '勾選';//動作類型
				newScoresOBj.data = $('#'+id).val();//內容值
				newScoresOBj.title = '';//題目
			scores_record.push(newScoresOBj);
	   }
	   else
	   {
			//紀錄動作
			var newOptionOBj =  $.extend(true,{}, option_obj);
				newOptionOBj.dataType = 'unSetCheckbox';//動作類型
				newOptionOBj.dataType_Dsc = '取消勾選checkbox選項';//動作類型敘述
				newOptionOBj.dataFunction = 'record_UnSetCheckBox';//動作內容敘述
				newOptionOBj.dataFunction_Value = id;//動作內容敘述
			option_record.push(newOptionOBj);
			//紀錄動作 end
			//紀錄閱卷資料
			var newScoresOBj =  $.extend(true,{}, scores_obj);
				newScoresOBj.userType = '自己';
				newScoresOBj.event = '取消勾選';//動作類型
				newScoresOBj.data = $('#'+id).val();//內容值
				newScoresOBj.title = '';//題目
			scores_record.push(newScoresOBj);			
	   }
	}
}

//紀錄input type="text"的動作
function option_input(id){
	var getVal = $('#'+id).val();
	//紀錄動作
	var newOptionOBj =  $.extend(true,{}, option_obj);
		newOptionOBj.dataType = 'setInput';//動作類型
		newOptionOBj.dataType_Dsc = '輸入Input的值';//動作類型敘述
		newOptionOBj.dataFunction = 'record_SetInput';//動作內容敘述
		newOptionOBj.dataFunction_ObjID = id;
		newOptionOBj.dataFunction_Value = getVal;//動作內容敘述
	option_record.push(newOptionOBj);
	//紀錄動作 end
	//紀錄閱卷資料
	var newScoresOBj =  $.extend(true,{}, scores_obj);
		newScoresOBj.userType = '自己';
		newScoresOBj.event = '填入答案';//動作類型
		newScoresOBj.data = getVal;//內容值
		newScoresOBj.title = '';//題目
	scores_record.push(newScoresOBj);			

	
}

//紀錄Select的動作
function option_select(id){
	var getVal = $('#'+id).val();
	//紀錄動作
	var newOptionOBj =  $.extend(true,{}, option_obj);
		newOptionOBj.dataType = 'setSelect';//動作類型
		newOptionOBj.dataType_Dsc = '輸入Select的值';//動作類型敘述
		newOptionOBj.dataFunction = 'record_SetSelect';//動作內容敘述
		newOptionOBj.dataFunction_ObjID = id;
		newOptionOBj.dataFunction_Value = getVal;//動作內容敘述
	option_record.push(newOptionOBj);
	//紀錄動作 end

	//紀錄閱卷資料
	var newScoresOBj =  $.extend(true,{}, scores_obj);
		newScoresOBj.userType = '自己';
		newScoresOBj.event = '選擇Select的值';//動作類型
		newScoresOBj.data = getVal;//內容值
		newScoresOBj.title = '';//題目
	scores_record.push(newScoresOBj);			
	//紀錄閱卷資料 end

}
//退出遊戲並紀錄資料
function endGame(){
	var recordDSC = JSON.stringify(option_record);//將操作紀錄檔轉換成json格式
	$('#record').val(recordDSC);
	var tempDsc = JSON.stringify(ArrTest);//將操作紀錄檔轉換成json格式
	$('#m4Charts').val(tempDsc);
	$('#m5Charts0').val(m5Charts_0);
	$('#m5Charts1').val(m5Charts_1);
	var scoresDsc = JSON.stringify(scores_record);//將操作紀錄檔轉換成json格式
	$('#scores').val(scoresDsc);
	$('#sType').val(userType);
	
	alert('測驗結束!!');
	if(!isView){
		$('#recordForm').submit();
	}else{
		history.back();
	}
}

<?php 
//有操作紀錄
if(isset($RecordData)){
?>
option_record = <?php echo $RecordData?>;

$( document ).ready(function() {
	showRecord();
});
<?php	
}
?>


//排行榜
$(document).ready(function() {
  $(".fbbox").hover(function(){
	  $(this).stop().animate({right: "0"}, "medium");
	  }, function(){
		$(this).stop().animate({right: "-250"}, "medium");
  }, 500);
});


$('#msgInput').keydown(function(e){
	if ((e.which == 13) || (e.which == keyCode.ENTER)) {
		alert("enter pressed");
	}
});
</script>
</head>
<body oncontextmenu="return false;">
<div id="wraper">
	<!--聊天框-->
	<div id="talk">
		<a href="#" class="t_btnBack">回上一頁</a>
		<div class="t_message">
			<div class="speak-1" id="chatRoom" rows="30" cols="30"></div>
			<div class="t_but">
				<input type="text" id="msgInput">
				<button id="startStopButton" class="button button-tiny button-small" onclick="startButton(event)">語音辨識</button>
				<button class="button button-tiny button-small" onclick="sendMSG()">送出訊息</button>  
			</div>
		</div>
	</div>
	<!--聊天框 end -->
	<!--測驗區 -->
	<div id="content">
	<?php
		//此處插入資料
		echo $content_for_layout;//顯示view的區塊
	?>	
	</div>
	<!--測驗區 end -->

</div>
<?php 
if(isset($GeneralData['MediaSwitch']) and $GeneralData['MediaSwitch'] == '1'){
?>
	<!--對話 robot-->
	<div style="display:none;">                
	<IFRAME id="robot" src="robot_img.php?dsc=<?php echo $dsc_first;?>&head_type=<?php echo $head_type;?>" width="1" height="1"  scrolling="no" frameborder="0"></IFRAME><!--大頭貼-->
	</div>
	<!--對話 robot end-->
<?php	
}
?>
<form action="<?php echo site_url('testlist/saveOptionData'); ?>" method="POST" style="display:none" id="recordForm">
<input type="text" name="tNum" value="<?php echo $this->session->userdata("teacherdataNum"); ?>">
<input type="text" name="sNum" value="<?php echo $this->session->userdata("userID"); ?>">
<input type="text" name="sType" id="sType" value="">
<input type="text" name="qNum" value="<?php echo $num;?>">
<textarea name="record" id="record"></textarea>
<textarea name="scores" id="scores"></textarea>
<textarea name="m4Charts" id="m4Charts"></textarea>
<input type="text" name="m5Charts0" id="m5Charts0" value="">
<input type="text" name="m5Charts1" id="m5Charts1" value="">

</form>
<script>
//偵測聊天輸入區是否有按下 Enter
$('#msgInput').keydown(function(e){
	if (e.which == 13) {
		if($('#msgInput').val() > ''){
			sendMSG();
		}
	}
});
</script>

</body>
</html>
