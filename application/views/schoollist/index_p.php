<!-- 左選單 end -->
<div id="wrapper">
	<!--列表標題-->
    <div class="search">學號搜尋：<input type="text" name="s_word" id="s_word" value="" ><a class="button" title="學號搜尋" onclick="search_word()">搜尋</a><a href="index.php" class="button" title="清除搜尋" >清除搜尋</a></div>    
  <ul>
    	<li><a class="button" title="新增學生" onclick="add_ST()">新增學生</a></li>    
    	<li><a class="button" title="回上一層" onclick="history.back()">回上一層</a></li>    
    </ul>    
    <table class="title">
        <tr>
            <td width="5%">編號</td>
            <td width="20%">帳號</td>
            <td width="10%">學號</td>
            <td width="10%">性別</td>
            <td width="20%">姓名</td>
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
                <td width="5%" ><?php echo $key+1;?></td>
                <td width="20%" ><?php echo $tempArray['loginId']; ?></td>
                <td width="10%" ><?php echo $tempArray['student_id']; ?></td>
                <td width="10%" ><?php echo $tempArray['sex_dsc']; ?></td>
                <td width="20%" ><?php echo $tempArray['c_name']; ?></td>
                <td width="35%">
					<a class="button" title="資料修改" onclick="edit_ST('<?php echo $tempArray['num']; ?>','<?php echo $tempArray['loginId']; ?>','<?php echo base64_decode($tempArray['pw']); ?>','<?php echo $tempArray['student_id']; ?>','<?php echo $tempArray['c_name']; ?>','<?php echo $tempArray['sex_dsc']; ?>')">資料修改</a> 

				</td>
            </tr>
        </table>             
  </div>
<!-- 單元 End -->
<?php		
	}
}
?>
</div>

<div id="editArea"  style="display:none;">
<!--table更改為ul排列-->
    <ul class="name">
        <li>
		<span>登入帳號：</span><input type="text" id="ST_LGID" value="" size="40" disabled>
		</li>
        <li>
		<span>登入密碼：</span><input type="password" id="ST_PW" value="" size="40">
		</li>
        <li>
		<span>學    號：</span><input type="text" id="ST_ID" value="" size="40">
		</li>
        <li>
		<span>姓    名：</span><input type="text" id="ST_NAME" value="" size="40">
		</li>
        <li>
		<span>性    別：</span>
		<select id="ST_SEX" >
			<option value="男">男</option>
			<option value="女">女</option>
		</select>
		</li>
    </ul>
    <a class="button" onclick="insert_ST()" id="insert_btn" >存檔</a>	
    <a class="button" onclick="$.colorbox.close();">取消</a>	
    <input type="hidden" id="ST_NUM" value="">    
    <input type="hidden" id="CL_NUM" value="<?php echo $num; ?>">    
</div>

<script >

//新增教師
function add_ST(){
	$("#ST_SEX option:first").attr("selected", "true");
	$('#ST_LGID').val('');
	$('#ST_PW').val('') ;
	$('#ST_ID').val('') ;
	$('#ST_NAME').val('') ;
	$('#ST_NUM').val('') ;
	
	$('#insert_btn').attr('onclick','insert_ST()');
	$('#editArea').show();
	$.colorbox({inline:true,href:"#editArea", width:"50%",open:true,onClosed:function(){
	$('#editArea').hide();
	}});
}

//修改學生資料
function edit_ST(getNUM,getLGID,getPW,getSTID,getName,getSTSEX){
	$('#insert_btn').attr('onclick','update_ST()');
	$('#editArea').show();
	$('#ST_LGID').val(getLGID);
	$('#ST_PW').val(getPW) ;
	$('#ST_ID').val(getSTID) ;
	$('#ST_NAME').val(getName) ;
	$('#ST_NUM').val(getNUM) ;
	
	$("#ST_SEX").children().each(function(){
		if ($(this).text()==getSTSEX){
			//jQuery給法
			$(this).attr("selected", "true"); 
		}
	});
	
	$.colorbox({inline:true,href:"#editArea", width:"50%",open:true,onClosed:function(){
	$('#editArea').hide();
	}});
}


function insert_ST(){
	var input_PW = $('#ST_PW').val();
	var input_ID = $('#ST_ID').val();
	var input_NAME = $('#ST_NAME').val();
	var input_SEX = $('#ST_SEX').val();
	
	if( input_ID > ''&& input_PW > '' && input_NAME > '' && input_SEX > '' ){
		$.ajax({
			url: '<?php echo  site_url('classlist/insert_ST'); ?>',
			type:"POST",
			data: {ID:input_ID,PW:input_PW,NAME:input_NAME,SEX:input_SEX,CLS:$('#CL_NUM').val()},
			error: function(xhr) {
				alert('網路連線異常，請重新操作!!');
			},
			success: function(response) {				
				alert('新增完畢!!');
				location.reload();
			}
		});
		
	}else{
		alert('請檢查欄位是否尚未填寫!!');
	}	
}

//更新教師
function update_ST(){
	var input_PW = $('#ST_PW').val();
	var input_ID = $('#ST_ID').val();
	var input_NAME = $('#ST_NAME').val();
	var input_SEX = $('#ST_SEX').val();
	var input_NUM = $('#ST_NUM').val();
	
	if( input_NUM > '' && input_PW > '' && input_NAME > '' && input_ID > '' && input_SEX > '' ){
		$.ajax({
			url: '<?php echo  site_url('classlist/update_ST'); ?>',
			type:"POST",
			data: {PW:input_PW,ID:input_ID,NAME:input_NAME,NUM:input_NUM,SEX:input_SEX,CLS:$('#CL_NUM').val()},
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
function del_ST(key_num,unit_dsc){
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