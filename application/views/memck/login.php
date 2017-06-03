<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript" src="<?php echo $base;?>public/js/jquery-1.10.1.min.js"></script>
<link rel="stylesheet" href="<?php echo $base;?>public/css/login/admin.css" />
<link rel="stylesheet" href="<?php echo $base;?>public/css/login/button.css" />
<script language="javascript">
function load_captcha(id,url){
　$("#"+id).html('');
　$("#"+id).load(url); 
}

var isSend = false;
function chk(){
	var get_NAME = $('#username').val();
	var get_PW = $('#password').val();
	//var get_MYCODE = $('#mycode').val();
	var get_MYCODE = ' ';

	if( get_NAME > '' && get_PW > '' && get_MYCODE > ''){
		$.ajax({
			url: '<?php echo site_url($formPath); ?>',
			type:"POST",
			data: {username:get_NAME,password:get_PW,mycode:get_MYCODE},
			error: function(xhr) {
				alert('網路連線異常，請重新操作!!');
			},
			success: function(response) {
				if( response == 'codeErr'){
					alert('驗證碼錯誤!!');
				}else if( response == 'error'){
					alert('錯誤的帳號或密碼!!');
				}else{
					location.href = "<?php echo $base;?>index.php/"+response;
				}
			}
		});
	}
}
</script>
</head>

<body id="login">
<h1><img src="<?php echo base_url('public/images/login_title.png');?>" alt="合作問題解決數位學系系統" /></h1>
<table>
	<tr>
		<td>帳　號</td>
		<td><input type="text" id="username"  placeholder="請輸入帳號" value="<?php echo set_value('username'); ?>" /></td>
	</tr>
	<tr>
		<td>密　碼</td>
		<td><i class="fa fa-lock"></i></div><input type="password" id="password"  placeholder="請輸入密碼" /></td>
	</tr>
	<tr>
        <td></td>
        <td align="right"><span class="button-wrap" style="margin:20px 0px 0px 20px;"><input type="button" value="清除" class="button button-caution button-circle button-jumbo"></span><span class="button-wrap" style="margin-left:20px;"><input type="button" value="送出" class="button button-caution button-circle button-jumbo" onclick="chk()"></td>
	</tr>	
</table>
</body>
</html>