<!-- 左選單 end -->
<div id="wrapper">
	<!--列表標題-->
    <div class="search">教師名稱搜尋：<input type="text" name="s_word" id="s_word" value="" ><a class="button" title="單元名稱搜尋" onclick="search_word()">搜尋</a><a href="index.php" class="button" title="清除搜尋" >清除搜尋</a></div>    
  <ul>
    	<li><a class="button" title="新增教師" onclick="add_TA()">新增教師</a></li>
    </ul>    
    <table class="title">
        <tr>
            <td width="5%">編號</td>
            <td width="10%">登入帳號</td>
            <td width="40%">教師名稱</td>
            <td width="35%">功能設定</td>
        </tr>
    </table>
<?php
if(isset($listData) and count($listData) > 0){
	foreach($listData as $key => $tempArray){
?>
	<!-- 單元 -->
    <div class="accordionButton">
        <table class="list_item">
            <tr>
                <td  ><?php echo $key+1;?></td>
                <td ><?php echo $tempArray['loginId'];?></td>
                <td><?php echo $tempArray['c_name'];?></td>
                <td >
					<a class="button" title="學生列表" href="<?php echo  site_url('memberlist/students_list/?t_num=').$tempArray['num']; ?>">學生列表</a>
					<a class="button" title="編輯" onclick="edit_TA('<?php echo $tempArray['num'];?>','<?php echo $tempArray['loginId'];?>','<?php echo $tempArray['pw'];?>','<?php echo $tempArray['c_name'];?>')">編輯</a>               
					<a class="button" title="刪除" onclick="del_TA('<?php echo $tempArray['num'];?>','<?php echo $tempArray['c_name'];?>')">刪除</a>
              </td>
            </tr>
        </table>             
  </div>
<!-- 單元 End -->
<?php		
	}
}
?>
<?php
echo $pagination;
?>
</div>

<div id="edit_ta_area"  style="display:none;">
<!--table更改為ul排列-->
    <ul class="name">
        <li>
		<span>登入帳號：</span><input type="text" id="AT_ID" value="" size="40">
		</li>
        <li>
		<span>登入密碼：</span><input type="password" id="AT_PW" value="" size="40">
		</li>
        <li>
		<span>姓    名：</span><input type="text" id="AT_NAME" value="" size="40">
		</li>
    </ul>
    <a class="button" onclick="insert_TA()" id="insert_btn" >存檔</a>	
    <a class="button" onclick="$.colorbox.close();">取消</a>	
    <input type="hidden" id="AT_NUM" value="">    
</div>
<script >
//新增教師
function add_TA(){
	$('#AT_ID').removeAttr('disabled');
	$('#insert_btn').attr('onclick','insert_TA()');
	$('#edit_ta_area').show();
	$.colorbox({inline:true,href:"#edit_ta_area", width:"30%",open:true,onClosed:function(){
	$('#edit_ta_area').hide();
	}});
}

//修改教師
function edit_TA(getNUM,getID,getPW,getName){
	$('#insert_btn').attr('onclick','update_TA()');
	$('#edit_ta_area').show();
	$('#AT_ID').val(getID).attr('disabled',true);
	$('#AT_PW').val(getPW) ;
	$('#AT_NAME').val(getName) ;
	$('#AT_NUM').val(getNUM) ;
	
	$.colorbox({inline:true,href:"#edit_ta_area", width:"30%",open:true,onClosed:function(){
	$('#edit_ta_area').hide();
	}});
}


function insert_TA(){
	var input_ID = $('#AT_ID').val();
	var input_PW = $('#AT_PW').val();
	var input_NAME = $('#AT_NAME').val();
	
	if( input_ID > ''&& input_PW > '' && input_NAME > '' ){
		$.ajax({
			url: '<?php echo  site_url('memberlist/check_loginID'); ?>',
			type:"POST",
			data: {getID:input_ID},
			error: function(xhr) {
				alert('網路連線異常，請重新操作!!');
			},
			success: function(response) {				
				if(response == 'ok'){
					$.ajax({
						url: '<?php echo  site_url('memberlist/insert_TA'); ?>',
						type:"POST",
						data: {ID:input_ID,PW:input_PW,NAME:input_NAME},
						error: function(xhr) {
							alert('網路連線異常，請重新操作!!');
						},
						success: function(response) {				
							alert('新增完畢!!');
							location.reload();
						}
					});
				}
				if(response == 'error'){
					alert('登入帳號重複!!');
				}
			}
		});
		
	}else{
		alert('請檢查欄位是否尚未填寫!!');
	}	
}

//更新教師
function update_TA(){
	var input_PW = $('#AT_PW').val();
	var input_NAME = $('#AT_NAME').val();
	var input_NUM = $('#AT_NUM').val();
	
	if( input_NUM > '' && input_PW > '' && input_NAME > '' ){
		$.ajax({
			url: '<?php echo  site_url('memberlist/update_TA'); ?>',
			type:"POST",
			data: {PW:input_PW,NAME:input_NAME,NUM:input_NUM},
			error: function(xhr) {
				alert('網路連線異常，請重新操作!!');
			},
			success: function(response) {
				alert('更新完畢!!');
				location.reload();
			}
		});
	}
}

//刪除教師
function del_TA(key_num,unit_dsc){
	if(confirm("確定刪除下列名稱的教師資料及其管理的學生資料嗎?\r\n"+unit_dsc)){	
		$.ajax({
			url: '<?php echo  site_url('memberlist/del_TA'); ?>',
			type:"POST",
			data: {NUM:key_num},
			error: function(xhr) {
				alert('網路連線異常，請重新操作!!');
			},
			success: function(response) {				
				alert('刪除完畢!!');
				location.reload();
			}
		});
	}
}
</script>