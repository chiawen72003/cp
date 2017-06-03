<div class="main">
	<form action="<?php echo $base;?>index.php/memck/upMyData" method="POST" id="Form2" >
    	<h1><i class="fa fa-angle-double-right"></i>個人資料編輯</h1>	
    	<!--按鈕列-->
        <div class="top_btn">
        	<button type="button" onclick="chkData()">儲存</button>
        </div>
    	<!--/按鈕列-->
    	<!--基本設訂-->
        <ul class="initial">
            <li><span>登入帳號</span><?php echo isset($mainDataArray[0]['loginId'])?$mainDataArray[0]['loginId']:"";?></li>
            <li><span>新的登入密碼</span><input type="password" id="pw" name="pw" value="" size="60"></li>
            <li><span>確認登入密碼</span><input type="password" id="re_pw" name="re_pw" value="" size="60"></li>
            <li>
                <span>姓名</span><input type="text" id="userName" name="userName" value="<?php echo isset($mainDataArray[0]['userName'])?$mainDataArray[0]['userName']:"";?>" size="60">
            </li>
        </ul>
	</form>
</div>  
<script language="javascript">
var dataIsSend = false;
function chkData(){
	var isGo = true;
	var err_dsc = '';
	var ck_array =  ["userName"];
	var err_array =  ["請輸入姓名!!"];
	var type_array =  ["text"];
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
				}		
			break;
		}
	}
	
	if($('#pw').val() > '' || $('#re_pw').val() > ''){
		if($('#pw').val() != $('#re_pw').val()){
			err_dsc = err_dsc + '登入密碼不一致!!\r\n';
			isGo = false;
		}
	}
	
	if(isGo && !dataIsSend){
		dataIsSend = true;
		$('#Form2').submit();
	}
	
	if(err_dsc !=''){
		alert(err_dsc);
	}
}
</script>