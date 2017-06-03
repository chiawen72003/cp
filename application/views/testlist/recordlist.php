<!--列表標題-->
<table class="title">
	<tr>
		<td width="5%">編號</td>
		<td width="50%">試題題目</td>
		<td width="30%">成績</td>
		<td width="20%">操作日期</td>
	</tr>
</table>
<?php
if(isset($listData['recordList']) and count($listData['recordList']) > 0){
	foreach($listData['recordList'] as $key => $tempArray){
?>
	<!-- 單元 -->
    <div class="accordionButton">
        <table class="list_item">
            <tr>
				<td width="5%"><?php echo $key + 1; ?></td>
                <td width="50%"><a class="button" title="" href="<?php echo  site_url("testlist/recordPG/");?>?num=<?php echo $tempArray['questions_num'];?>&r_num=<?php echo $tempArray['num'];?>"><?php echo $listData['questionsList'][$tempArray['questions_num']];?></a>
				</td>
				<td width="30%">
					<a class="button" onclick="show_msg_box('<?php echo $tempArray['num'];?>')">觀看成績</a>
				</td>
				<td width="20%"><?php echo $tempArray['up_date']; ?></td>
            </tr>
        </table>             
  </div>
<!-- 單元 End -->
<?php		
	}
}
?>
<div id="show_MsgBox_area" style="display:none;">

</div>
<script>
function show_msg_box(getValue){
	$.ajax({
		url: '<?php echo  site_url('testlist/getScorePG'); ?>',
		data: {num:getValue},
		type:"POST",
		error: function(xhr) {
			console.log(xhr);
			//alert('Ajax request 發生錯誤');
		},
		success: function(response) {
			$('#show_MsgBox_area').html('').append(response).dialog({
				height: '550',
				width: '768'	
			});
		}
	});

}
</script>