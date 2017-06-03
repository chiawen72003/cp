<!-- 左選單 end -->
<div id="wrapper">
<ul>
	<li><a class="button" title="回上一頁" onclick="history.back();">回上一頁</a></li>	
</ul>      
<table class="title">
	<tr>
		<td>
		編輯教師資料<br>
		</td>
	</tr>
</table>
<div class="accordionButton">
<?php 
$attributes = array( 'id' => 'Form1');
$hidden = array();
if(isset($num)){
	$hidden['num'] = $num;
}
if(isset($offsetDsc)){
	$hidden['offsetDsc'] = $offsetDsc;
}
echo form_open_multipart('teacherlist/setTeacherData', $attributes,$hidden);
?>
	<div class="mode_wrap">
		<div class="mode_item">
			<table class="tb_1" >
				<tr id="tr_title" >
					<td>
						<p>學校:
							<select class="put_2" name="schoolNum" >
				<?php
							if(count($schoolData) > 0){
								foreach($schoolData as $key => $value){
								$dsc = '';	
								if(isset($dataList['schoolNum']) and $dataList['schoolNum'] == $key){
									$dsc = 'selected';	
								}	
				?>
							<option value="<?php echo $key;?>" <?php echo $dsc;?>><?php echo $value;?></option>	
				<?php					
								}
							}
				?>
							</select>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<p>登入帳號:<input type="text" class="put_2" name="loginId" id="loginId" value="<?php echo isset($dataList['loginId'])?$dataList['loginId']:'';?>" <?php echo isset($num)?'disabled':''; ?>></p>
					</td>
				</tr>
				<tr>
					<td>
						<p>登入密碼:<input type="password" class="put_2" name="pw" id="pw" value="<?php echo isset($dataList['pw'])?$dataList['pw']:'';?>"></p>
					</td>
				</tr>
				<tr>
					<td>
						<p>姓名:<input type="text" class="put_2" name="c_name" id="c_name" value="<?php echo isset($dataList['c_name'])?$dataList['c_name']:'';?>"></p>
					</td>
				</tr>
				<tr>
					<td><span><a class="button" title="存檔" onclick="<?php echo isset($num)?'chkValue()':'chkIsSame()'; ?>">存檔</a></span></td>
				</tr>
			</table>
		</div>
	</div>	
</div>	
<?php 
echo form_close();
?>	
</div>
</div>

<script>
var dataIsSend = false;

//檢查帳號是否重複
function chkIsSame(){
	var userID = $('#loginId').val();
	if(userID > ''){
		$.ajax({
			url: '<?php echo  site_url('teacherlist/chkIsSame'); ?>',
			type:"POST",
			data: {user_ID:userID},
			error: function(xhr) {
				//alert('Ajax request 發生錯誤');
			},
			success: function(response) {				
				if( response == 'ok' ){
					chkValue();
				}else if( response == 'error'){
					alert('登入帳號重複!!');
				}else{
					console.log(response);
				}
			}
		});
	}else{
		alert('請輸入登入帳號!!');
	}
}

function chkValue(){
	var isGo = true;
	var err_dsc = '';
	var ck_array =  ["loginId","pw","c_name"];
	var err_array =  ["請輸入登入帳號!!","請輸入登入密碼!!","請輸入姓名!!"];
	var type_array =  ["text","text"];

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
				}else{	
					if( $('#'+ck_array[x]).val() < 1 || $('#'+ck_array[x]).val() > 99 ){
							err_dsc = err_dsc + "排序值需介於1~99!!\r\n";
							isGo = false;
					}
				}	
			break;
		}
	}
	
	if(isGo && !dataIsSend){
		$('#Form1').submit();
	}
	
	if(err_dsc !=''){
		alert(err_dsc);
	}
}
</script>