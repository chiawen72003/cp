<!-- 左選單 end -->
<div id="wrapper">
	<!--列表標題-->
    <div class="search">

	</div>    
  <ul>
    	<li><a class="button" title="新增試題" href="<?php echo site_url("sharelist/addshare_Page");?>">新增試題</a></li>    
    </ul>    
    <table class="title">
        <tr>
            <td width="5%">編號</td>
            <td width="10%">試題類型</td>
            <td width="10%">題目圖形</td>
            <td width="20%">使用的模組</td>
            <td width="20%">測試時間</td>
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
                <td width="10%" ><?php echo ($tempArray['is_practice']=='1')?'練習題':'測驗題'; ?></td>
                <td  width="10%"><img  src="<?php echo base_url('upIMG/questions/')."/".$tempArray['img_path'];?>"  >
				<br>
				<?php echo $tempArray['title_dsc'];?>
				</td >
                <td width="20%">
                	<div id="po">
                        <ul>
<?php
foreach( $tempArray['modules_dsc'] as $value ){
	if($value >''){
?>
<li><a class="button" title="<?php echo isset($modelsName[$value])?$modelsName[$value]:'';?>" id="" onclick="#"><?php echo isset($modelsName[$value])?$modelsName[$value]:'';?></a></li>
<?php	
	}
}
?>
                        </ul>
                     </div>
                </td>
				<td width="20%">
<?php echo isset($tempArray['test_date'])?$tempArray['test_date']:''; ?>
				</td>
                <td width="35%">
					<a class="button" title="編輯" href="<?php echo  site_url("sharelist/editshare_Page/");?>?pg=<?php echo $offsetDsc;?>&num=<?php echo $tempArray['num'];?>">編輯</a>
					<a class="button" title="刪除" onclick="del_QT('<?php echo $tempArray['num'];?>','<?php echo $tempArray['title_dsc'];?>')">刪除</a>
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
function del_QT(key_num,unit_dsc){
	if(confirm("確定刪除下列標題的題目嗎?\r\n"+unit_dsc)){	
		$.ajax({
			url: '<?php echo  site_url('sharelist/del_QT'); ?>',
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