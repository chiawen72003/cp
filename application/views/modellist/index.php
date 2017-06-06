<!-- 左選單 end -->
<div id="wrapper">
	<!--列表標題-->
    <div class="search">
	<!--模組名稱搜尋：<input type="text" name="s_word" id="s_word" value="" ><a class="button" title="模組名稱搜尋：" onclick="search_word()">搜尋</a><a href="index.php" class="button" title="清除搜尋" >清除搜尋</a>--></div>    
	<ul>
		<li><a class="button" title="新增模組" onclick="add_Model()">新增模組</a></li>
	</ul>    
    <table class="title">
        <tr>
            <td width="5%">編號</td>
            <td width="30%">模組類型</td>
            <td width="20%">模組標題</td>
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
                <td width="5%"><?php echo $key+1;?></td>
                <td width="26%"><?php echo $tempArray['module_type'];?></td>
                <td width="26%"><?php echo $tempArray['title_dsc'];?></td>
                <td width="45%">
					<a class="button" title="編輯" href="<?php echo  site_url("modellist/editModel_Page/");?>?pg=<?php echo $offsetDsc;?>&num=<?php echo $tempArray['num'];?>">編輯</a>
					<a class="button" title="刪除" onclick="del_model('<?php echo $tempArray['num'];?>','<?php echo $tempArray['title_dsc'];?>')">刪除</a>
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
<div id="switch_model"  style="display:none;">
<!--table更改為ul排列-->
    <ul class="name">請選擇模組類型：
        <li>
			<a class="button" title="閱讀出題模組" href="<?php echo  site_url('modellist/addModel_Page')."?mod=m1"; ?>">閱讀出題模組</a>
		</li>
        <li>
			<a class="button" title="搶25遊戲模組" href="<?php echo  site_url('modellist/addModel_Page')."?mod=m2"; ?>">搶25遊戲模組</a>
		</li>
        <li>
			<a class="button" title="思樂冰製作遊戲模組" href="<?php echo  site_url('modellist/addModel_Page')."?mod=m3"; ?>">思樂冰製作遊戲模組</a>
		</li>
        <li>
			<a class="button" title="最佳銷售組合遊戲模組" href="<?php echo  site_url('modellist/addModel_Page')."?mod=m4"; ?>">最佳銷售組合遊戲模組</a>
		</li>
        <li>
            <a class="button" title="數學渡河邏輯遊戲模組" href="<?php echo  site_url('modellist/addModel_Page')."?mod=m5"; ?>">數學渡河邏輯遊戲模組</a>
        </li>
        <li>
            <a class="button" title="腳本設計模組" href="<?php echo  site_url('modellist/addModel_Page')."?mod=m6"; ?>">腳本設計模組</a>
        </li>
    </ul>
    <a class="button" onclick="$.colorbox.close();">取消</a>	
</div>
<script >
//新增一個模組
function add_Model(){
	$('#switch_model').show();
	$.colorbox({inline:true,href:"#switch_model", width:"30%",open:true,onClosed:function(){
	$('#switch_model').hide();
	}});
}

//刪除一個題目
function del_model(key_num){
	if(confirm("確定刪除模組的資料嗎?\r\n")){	
		$.ajax({
			url: '<?php echo  site_url('modellist/delModel'); ?>',
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