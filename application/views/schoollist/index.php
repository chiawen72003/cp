<!-- 左選單 end -->
<div id="wrapper">
	<!--列表標題-->
    <div class="search">
	</div>    
  <ul>
    	<li><a class="button" title="新增學校" href="<?php echo site_url("schoollist/add_Page");?>">新增學校</a></li>    
    </ul>    
    <table class="title">
        <tr>
            <td width="5%">編號</td>
            <td width="40%">學校名稱</td>
            <td width="45%">功能設定</td>
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
                <td width="40%" ><?php echo $tempArray['c_name']; ?></td>
                <td width="45%">
					<a class="button" title="編輯" href="<?php echo  site_url("schoollist/edit_Page/");?>?pg=<?php echo $offsetDsc;?>&num=<?php echo $tempArray['num'];?>">編輯</a> 
					<a class="button" title="刪除" onclick="del_S('<?php echo $tempArray['num'];?>','<?php echo $tempArray['c_name']; ?>')">刪除</a>
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
function del_S(key_num,unit_dsc){
	if(confirm("確定刪除下列學校名稱的資料嗎?\r\n"+unit_dsc)){	
		$.ajax({
			url: '<?php echo  site_url('schoollist/del_S'); ?>',
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