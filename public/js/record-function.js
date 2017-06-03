//開始跑操作紀錄
function showRecord(){
	var delTime = 1000;
	var maxNumber = option_record.length;
	for(var x=0;x<maxNumber;x++){
		if(option_record[x].dataType == "talk"){
			setTimeout(option_record[x].dataFunction+'("'+option_record[x].dataFunction_Value+'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "nextModule"){			
			setTimeout(option_record[x].dataFunction+'()', delTime);
			delTime  = delTime + 1000;
		}
		if(option_record[x].dataType == "setCheckbox"){			
			setTimeout(option_record[x].dataFunction+'("'+ option_record[x].dataFunction_Value +'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "setSelect"){			
			setTimeout(option_record[x].dataFunction+'("'+ option_record[x].dataFunction_ObjID +'","'+ option_record[x].dataFunction_Value +'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "unSetCheckbox"){			
			setTimeout(option_record[x].dataFunction+'("'+ option_record[x].dataFunction_Value +'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m1_goNext"){			
			setTimeout(option_record[x].dataFunction+'()', delTime);
			delTime  = delTime + 1000;
		}
		if(option_record[x].dataType == "m1_goNext2"){			
			setTimeout(option_record[x].dataFunction+'()', delTime);
			delTime  = delTime + 1000;
		}
		if(option_record[x].dataType == "setTextArea"){	
			var tempDsc = encodeURIComponent(option_record[x].dataFunction_Value);		
			setTimeout(option_record[x].dataFunction+'("'+ option_record[x].dataFunction_ObjID +'","'+ tempDsc +'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "setInput"){			
			setTimeout(option_record[x].dataFunction+'("'+ option_record[x].dataFunction_ObjID +'","'+ option_record[x].dataFunction_Value +'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m2_setNumber"){			
			setTimeout(option_record[x].dataFunction+'("'+ option_record[x].dataFunction_ObjID +'","'+ option_record[x].dataFunction_Value +'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m2_goNext"){			
			setTimeout(option_record[x].dataFunction+'()', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m2_goNext3"){			
			setTimeout(option_record[x].dataFunction+'()', delTime);
			delTime  = delTime + 500;
		}		
		if(option_record[x].dataType == "m2_goNext4"){			
			setTimeout(option_record[x].dataFunction+'()', delTime);
			delTime  = delTime + 500;
		}		
		if(option_record[x].dataType == "m2_goNext5"){			
			setTimeout(option_record[x].dataFunction+'()', delTime);
			delTime  = delTime + 500;
		}		
		if(option_record[x].dataType == "m2_goNext6"){			
			setTimeout(option_record[x].dataFunction+'()', delTime);
			delTime  = delTime + 500;
		}		
		if(option_record[x].dataType == "m2_moveBoat"){			
			setTimeout(option_record[x].dataFunction+'("'+option_record[x].dataFunction_ObjID+'")', delTime);
			delTime  = delTime + 1000;
		}
		if(option_record[x].dataType == "m2_resetAllValue"){			
			setTimeout(option_record[x].dataFunction+'()', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m2_setChkBox"){			
			setTimeout(option_record[x].dataFunction+'("'+option_record[x].dataFunction_ObjID+'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m2_unSetChkBox"){			
			setTimeout(option_record[x].dataFunction+'("'+option_record[x].dataFunction_ObjID+'")', delTime);
			delTime  = delTime + 500;
		}		
		if(option_record[x].dataType == "m3_dragObj"){			
			setTimeout(option_record[x].dataFunction+'("'+option_record[x].dataFunction_ObjID+'","'+option_record[x].dataFunction_Value+'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m3_beginMark"){	
			var tempDsc = encodeURIComponent(option_record[x].dataFunction_Value);		
		
			setTimeout(option_record[x].dataFunction+'("'+option_record[x].dataFunction_ObjID+'","'+tempDsc+'","'+option_record[x].dataFunction_ObjID2+'","'+option_record[x].dataFunction_tempValue+'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m3_reSet"){			
			setTimeout(option_record[x].dataFunction+'()', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m3_reSet2"){			
			setTimeout(option_record[x].dataFunction+'()', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m3_goNext"){			
			setTimeout(option_record[x].dataFunction+'()', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m3_goNext2"){			
			setTimeout(option_record[x].dataFunction+'()', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m3_getHtmlData"){	
			var tempDsc = encodeURIComponent(option_record[x].dataFunction_Value);
			setTimeout(option_record[x].dataFunction+'("'+option_record[x].dataFunction_ObjID+'","'+tempDsc+'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m4_dragObj"){			
			setTimeout(option_record[x].dataFunction+'("'+option_record[x].dataFunction_ObjID+'","'+option_record[x].dataFunction_Value+'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m4_markData"){			
			setTimeout(option_record[x].dataFunction+'("'+option_record[x].dataFunction_ObjID+'","'+option_record[x].dataFunction_Value+'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m4_swType"){			
			setTimeout(option_record[x].dataFunction+'("'+option_record[x].dataFunction_Value+'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m5_dragObj"){			
			setTimeout(option_record[x].dataFunction+'("'+option_record[x].dataFunction_ObjID+'","'+option_record[x].dataFunction_Value+'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m5_moveShip"){			
			setTimeout(option_record[x].dataFunction+'("'+option_record[x].dataFunction_ObjID+'","'+option_record[x].dataFunction_Value+'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m5_reSetGame"){	
			var tempDsc = encodeURIComponent(option_record[x].dataFunction_Value);		
		
			setTimeout(option_record[x].dataFunction+'("'+tempDsc+'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m5_reSetGame_2"){	
			var tempDsc = encodeURIComponent(option_record[x].dataFunction_Value);		
		
			setTimeout(option_record[x].dataFunction+'("'+tempDsc+'")', delTime);
			delTime  = delTime + 500;
		}
		if(option_record[x].dataType == "m5_beginGame2"){
			var tempDsc = encodeURIComponent(option_record[x].dataFunction_Value);		
			
			setTimeout(option_record[x].dataFunction+'("'+tempDsc+'")', delTime);
			delTime  = delTime + 500;
		}
	}
}

//自己發送訊息
function record_send_talk(get_msg){
	var tempData = $('#chatRoom').val();
	var htmlDsc = "自己:"+ get_msg +"\r\n"+tempData;
	$('#chatRoom').val(htmlDsc);
}
//接收夥伴的訊息
function record_get_talk(get_msg){
	var tempData = $('#chatRoom').val();
	var htmlDsc = "夥伴:"+get_msg+"\r\n"+tempData;
	$('#chatRoom').val(htmlDsc);
}

//進入下一個關卡
function record_NextModel(){
	var modelDsc = useModel[useModelIndex];
	$('#m' + modelDsc + '_module_area').hide();
	useModelIndex++;
	if( useModel.length == useModelIndex){
		endGame();//結束測驗
	}else{
		modelDsc = useModel[useModelIndex];
		$('#m' + modelDsc + '_module_area').show();
		canSend = false;
	}
}

//勾選一個checkbox
function record_SetCheckBox(getID){
	 $('#'+getID).prop("checked", true);
}

//取消勾選一個checkbox
function record_UnSetCheckBox(getID){
	 $('#'+getID).prop("checked", false);
}

//設定文字區域的文字資料
function record_SetTextArea(getID,getValue){
	var tempDsc = decodeURIComponent(getValue);
	 $('#'+getID).val(tempDsc);
}

//設定input的資料
function record_SetInput(getID,getValue){
	 $('#'+getID).val(getValue);
} 

//設定Select的資料
function record_SetSelect(getID,getValue){
	 $("#"+getID).attr("value",getValue);
} 


//模組1進入第2關
function record_M1_GoNext(){
	$('#m1_game_1').hide();
	$('#m1_game_2').show();
	$('#m1_game_3').hide();
	m1_next_level_a = false;
	m1_next_level_b = false;
}

//模組1進入第2關
function record_M1_GoNext2(){
	$('#m1_game_1').hide();
	$('#m1_game_2').hide();
	$('#m1_game_3').show();
	m1_next_level_a = false;
	m1_next_level_b = false;
}

//模組2 設定數字
function record_M2SetNumber(getID,getValue){
	var IDArray = getID.split("||");
	var ValueArray = getValue.split("||");
	for(var x=0;x<IDArray.length;x++ ){
		$('#'+IDArray[x]).html(ValueArray[x]);
	}
}

//模組2 移動龍船
function record_M2MoveBoat(getID){
	var IDArray = getID.split("||");
	var boat = $('#'+IDArray[0]);
	$('#'+IDArray[1]).append(boat);
}


//模組2 重置參數
function record_M2ResetAllValue(){
	//移動龍船
	var boat = $('#boat_1');
	$('#boat_area1_0').append(boat);
	boat = $('#boat_2');
	$('#boat_area2_0').append(boat);
}

//模組2 進入第2關
function record_M2GoNext2(){
	//移動龍船
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
	m2_hideLevelDsc('2');
}

//模組2 進入第3關
function record_M2GoNext3(){
	$('#m2_game_1').hide();
	$('#m2_game_2').hide();
	$('#m2_game_3').show();
	m2_totalNumber = parseInt(m2_beginNumber[0]);//累加的總和
	m2_hideLevelDsc('3');
	
	var boat = $('#boat_1');
	$('#boat_area1_'+m2_totalNumber).append(boat);
	boat = $('#boat_2');
	$('#boat_area2_'+m2_totalNumber).append(boat);
}

//模組2 進入第4關
function record_M2GoNext4(){
	$('#m2_game_1').hide();
	$('#m2_game_2').hide();
	$('#m2_game_3').hide();
	$('#m2_game_4').show();
	m2_totalNumber = parseInt(m2_beginNumber[1]);//累加的總和
	
	var boat = $('#boat_1');
	$('#boat_area1_'+m2_totalNumber).append(boat);
	boat = $('#boat_2');
	$('#boat_area2_'+m2_totalNumber).append(boat);
	m2_hideLevelDsc('4');
}

//模組2 進入第5關
function record_M2GoNext5(){
	$('#m2_game_4').hide();
	$('#m2_game_5').show();
	$('#gb25_area1').hide();	
	$('#boatShowArea').hide();
	$('#m2_number_tab').hide();	
	m2_totalNumber = 0;//累加的總和
		
	var boat = $('#boat_1');
	$('#boat_area1_'+m2_totalNumber).append(boat);
	boat = $('#boat_2');
	$('#boat_area2_'+m2_totalNumber).append(boat);
}

//模組2 進入第6關
function record_M2GoNext6(){
	m2_swt_SwitchNumber();
	$('#m2_game_5').hide();
	$('#m2_game_6').show();
	$('#gb25_area1').show();	
	$('#boatShowArea').show();
	$('#m2_number_tab').show();
	
	m2_totalNumber = 0;//累加的總和
		
	var boat = $('#boat_1');
	$('#boat_area1_'+m2_totalNumber).append(boat);
	boat = $('#boat_2');
	$('#boat_area2_'+m2_totalNumber).append(boat);
}

//模組2 設定第五關的勾選項目
function record_M2SetChkBox(getID){
	$('#'+getID).prop("checked", true);
}

//模組2 移除第五關的勾選項目
function record_M2UnSetChkBox(getID){
	$('#'+getID).prop("checked", false);
}

//模組3 拖曳物件到拖曳區
function record_M3DragObj(getID,getValue){
	$('#'+getValue).hide();
}

//模組3 插入量測值
function record_M3BeginMark(getID,getValue,getID2,getTempValue){
	var tempDsc = decodeURIComponent(getValue);
	$('#'+getID).append(tempDsc);
	$('#'+getID2).val(getTempValue);
}

//模組3 重置資料
function record_M3ReSet(){
	m3_reSet();
}
//模組3 重置資料
function record_M3ReSet2(){
	m3_reSet_2();
}

//模組3 進入第2關
function record_M3GoNext(){
	$('#m3_game_1').hide();
	$('#m3_game_2').show();
}

//模組3 進入第3關
function record_M3GoNext2(){
	$('#m3_game_1').hide();
	$('#m3_game_2').hide();
	$('#m3_game_3').show();
	$( ".m3_draggable" ).draggable(
		{
		  revert: true 
		}
	).draggable( 'enable' );	
}

//模組3 顯示夥伴的量測值資料
function record_M3GetHtmlData(getID,getValue){
	var tempDsc = decodeURIComponent(getValue);
	$('#'+getID).html('').append(tempDsc);
}

//模組4 拖曳物件到拖曳區
function record_M4DragObj(getID,getValue){
	var tempObj = $('#'+getValue);
	$('#'+getID).append(tempObj);
}

//模組4 計算數值
function record_M4MarkData(getID,getValue){
	$('#'+getID).val(getValue);
	m4_show_saleData(getValue);
}

//模組4 
function record_M4SwType(getValue){
	m4_swType(getValue);
}

//模組5 拖曳物件到拖曳區
function record_M5DragObj(getID,getValue){
	var tempObj = $('#'+getValue);
	$('#'+getID).append(tempObj);
}

//模組5 移動船隻
function record_M5MoveShip(getID,getValue){
	var ValueArray = getValue.split("||");
	$("#"+getID).offset({top:ValueArray[0],left:ValueArray[1]});
}

//模組5 第1關重新設置
function record_M5ReSetGame(getValue){
	var tempDsc = decodeURIComponent(getValue);
	
	m5_gameOver(tempDsc);
}

//模組5 第2關重新設置
function record_M5ReSetGame_2(getValue){
	var tempDsc = decodeURIComponent(getValue);

	m5_gameOver_2(tempDsc);
}

//模組5 進入第二關
function record_M5BeginGame2(getValue){
	var tempDsc = decodeURIComponent(getValue);
	var tempData = $('#chatRoom').val();
	var	html_dsc = tempDsc + tempData;
	$('#chatRoom').val(html_dsc);
	
	$('#m5_game_1').hide();
	$('#m5_game_2').show();
}