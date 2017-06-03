<!-- 左選單 end -->
<div id="wrapper">
	<!--列表標題-->
    <div class="search"></div>    
  <ul>
    	<li><a class="button" title="新增教師" href="<?php echo site_url("teacherlist/add_Page");?>">新增教師</a></li>    
    </ul>    
    <table class="title">
        <tr>
            <td width="5%">編號</td>
            <td width="15%">學校</td>
            <td width="30%">登入帳號</td>
            <td width="10%">教師代碼</td>
            <td width="20%">教師姓名</td>
            <td width="30%">功能設定</td>
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
                <td width="15%" ><?php echo isset($schoolData[$tempArray['schoolNum']])?$schoolData[$tempArray['schoolNum']]:''; ?></td>
                <td width="30%" ><?php echo $tempArray['loginId']; ?></td>
                <td width="10%" ><?php echo $tempArray['s_code']; ?></td>
                <td width="20%" ><?php echo $tempArray['c_name']; ?></td>
                <td width="30%">
					<!-- <a class="button" title="學生管理" href="<?php echo  site_url("teacherlist/editClassPeople_Page/");?>?f_pg=<?php echo $offsetDsc;?>&num=<?php echo $tempArray['num'];?>">學生管理</a> -->
					<a class="button" title="編輯" href="<?php echo  site_url("teacherlist/edit_Page/");?>?pg=<?php echo $offsetDsc;?>&num=<?php echo $tempArray['num'];?>">編輯</a> 
					<a class="button" title="刪除" onclick="del_CL('<?php echo $tempArray['num'];?>','<?php echo $tempArray['c_name']; ?>')">刪除</a>
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
<script >

//刪除一個題目
function del_CL(key_num,unit_dsc){
	if(confirm("確定刪除下列教師及教師內學生的資料嗎?\r\n"+unit_dsc)){	
		$.ajax({
			url: '<?php echo  site_url('teacherlist/del_TA'); ?>',
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

</script>