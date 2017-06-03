<style>
ul.name{
	clear:both;
	display:block;
	width:99%;
	border:1px solid #ccc;
	margin:10px auto;
	background:#fff;
	border-radius: 4px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
}

ul.name li{
	display:block;
	border-bottom:1px solid #eee;
}

ul li:nth-child(odd) {
	background: #fff
}
ul li:nth-child(even) {
	background: #edf0f1;
}

ul.name li span{
	display:inline-block;
	width:120px;
	text-align:center;
	padding:20px 10px;
	margin-right:10px;
	color:#fff;
	background:#8c9fa6;
}

ul.name li span#old_loginId{
	text-align:left;
	width:inherit;
	padding:0;
	margin:0;
	color:#000;
	background:#fff;
}

input[type='button']{
	background:#b2b2b2;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border: 1px solid #cbcbcb;
	display:inline-block;
	cursor:pointer;
	color:#555;
	font: 14px "微軟正黑體", "新細明體" ,'Open Sans', sans-serif;
	padding:5px 14px;
	text-decoration:none;
	margin:0 3px;
	}
	input[type='button']:hover{
	background:#add54a;
	color:#333;
}

input[type='text']{
	margin:0 5px;
}
</style>

    <div class="main">
    	<div class="top_btn">
        	<a class="button" onclick="addNewTeahcerPG()" title="新增" ><i class="fa fa-plus"> 新增教師資料</i></a>
        </div>
    	<table class="topic_list">
            <thead>
            	<th width="5%">序號</th>
                <th width="12%">登入帳號</th>
                <th width="35%">姓名</th>
                <th width="29%">編輯</th>
            </thead>
<?php	
if(is_array($listData)){
	$tempX=1;
	foreach($listData as $tempArray){
?>
<tr>
            	<td><?php echo $tempX;?></td>
                <td><?php echo $tempArray['loginId'];?></td>
                <td class="name"><?php echo $tempArray['userName'];?></td>
                <td>	
				<a class="edit" onclick="editData('<?php echo $tempArray['num']; ?>','<?php echo urlencode($tempArray['loginId']); ?>','<?php echo urlencode($tempArray['userName']); ?>')" title="編輯" ><i class="fa fa-pencil-square-o"></i> 編輯</a> <a class="delet"  title="刪除" onclick="delData('<?php echo $tempArray['num'];?>','<?php echo  $tempArray['userName'];?>')" ><i class="fa fa-times"></i> 刪除</a></td>
            </tr>

<?php
	$tempX++;
	}
}
	?>	
        </table>
		<?php echo $pagination;?>
    </div> 
<div id="addMenuDiv"  style="display:none;">
    <ul class="name">
        <li><span>登入帳號</span><input type="text" id="loginId" value=""></li>
        <li><span>登入密碼</span><input type="password" id="pw" value=""></li>
        <li><span>確認登入密碼</span><input type="password" id="r_pw" value=""></li>
        <li><span>姓名</span><input type="text" id="userName" value=""></li>
    </ul>
    <input type="button" onclick="add_chk()" value="新增">
    <input type="button" onclick="$.colorbox.close();" value="取消">
</div>
<div id="editMenuDiv"  style="display:none;">
    <ul class="name">
        <li><span>登入帳號</span><span id="old_loginId" ></span></li>
        <li><span>登入密碼</span><input type="password" id="old_pw" value=""></li>
        <li><span>確認登入密碼</span><input type="password" id="old_r_pw" value=""></li>
        <li><span>姓名</span><input type="text" id="old_userName" value=""></li>
    </ul>
    <input type="hidden" id="oldNum" value="0">
    <input type="button" onclick="edit_chk()" value="儲存">
    <input type="button" onclick="$.colorbox.close();" value="取消">
</div>	
<script>	
//刪除資料
function delData(key_num,key_dsc){
	if(confirm("請確認是否刪除下列名稱的教師資料\r\n"+key_dsc))
	{
		$.ajax({
			url: '<?php echo $base;?>index.php/memck/delTeacher',
			type:"POST",
			data: {keyNum:key_num},
			error: function(xhr) {
				//alert('Ajax request 發生錯誤');
			},
			success: function(response) {				
				alert('刪除完畢!!');
				location.reload();
			}
		});
	}
}
//編輯老師資料
function editData(getNum,getID,getName){
	var tempValue = decodeURIComponent(getID);
	$('#oldNum').val(getNum);
	$('#old_loginId').html('').append(tempValue);
	tempValue = decodeURIComponent(getName);
	$('#old_userName').val(tempValue);
	$('#editMenuDiv').show();
	$.colorbox({inline:true,href:"#editMenuDiv", width:"30%",open:true,onClosed:function(){
	$('#editMenuDiv').hide();
	}});
}

function edit_chk(){
	var isGo = true;
	var dsc = '';

	if($('#old_pw').val() != '' || $('#old_r_pw').val() != ''){
		if($('#old_pw').val() == ''){
			isGo = false;
			dsc = dsc + '請輸入登入密碼!!\r\n';
		}else{
			if($('#old_r_pw').val() == ''){
				isGo = false;
				dsc = dsc + '登入密碼不一致!!\r\n';
			}else if($('#old_pw').val() != $('#old_r_pw').val()){
				isGo = false;
				dsc = dsc + '登入密碼不一致!!\r\n';
			}		
		}
	
		
	}
	
	if($('#old_userName').val() == ''){
		isGo = false;
		dsc = dsc + '請輸入姓名!!\r\n';
	}

	if(isGo && !isSend){
		isSend = true;
		$.ajax({
			url: '<?php echo $base;?>index.php/memck/updateTeacher',
			type:"POST",
			data: {keyNum:$('#oldNum').val(),pw:$('#old_pw').val(),userName:$('#old_userName').val()},
			error: function(xhr) {
				//alert('Ajax request 發生錯誤');
			},
			success: function(response) {				
				alert('更新完畢!!');
				location.reload();
			}
		});
	}
	
	if(dsc > ''){
		alert(dsc);
	}
	
}

//新增老師
function addNewTeahcerPG(){	
	$('#addMenuDiv').show();
	$.colorbox({inline:true,href:"#addMenuDiv", width:"30%",open:true,onClosed:function(){
	$('#addMenuDiv').hide();
	}});
}

var isSend = false;
function add_chk(){
	var isGo = true;
	var dsc = '';
	if($('#loginId').val() == ''){
		isGo = false;
		dsc = dsc + '請輸入登入帳號!!\r\n';
	}

	if($('#pw').val() == ''){
		isGo = false;
		dsc = dsc + '請輸入登入密碼!!\r\n';
	}else{
		if($('#r_pw').val() == ''){
			isGo = false;
			dsc = dsc + '登入密碼不一致!!\r\n';
		}else if($('#pw').val() != $('#r_pw').val()){
			isGo = false;
			dsc = dsc + '登入密碼不一致!!\r\n';
		}		
	}
	
	if($('#userName').val() == ''){
		isGo = false;
		dsc = dsc + '請輸入姓名!!\r\n';
	}

	if(isGo && !isSend){
		isSend = true;
		$.ajax({
			url: '<?php echo $base;?>index.php/memck/insertTeacher',
			type:"POST",
			data: {loginId:$('#loginId').val(),pw:$('#pw').val(),userName:$('#userName').val()},
			error: function(xhr) {
				//alert('Ajax request 發生錯誤');
			},
			success: function(response) {				
				alert('新增完畢!!');
				location.reload();
			}
		});
	}
	
	if(dsc > ''){
		alert(dsc);
	}
}
</script>