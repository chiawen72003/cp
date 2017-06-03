<!-- 左選單 end -->
<div id="wrapper">
	<!--列表標題-->
    <div class="search">
	</div>    
	<ul> 
    </ul>  
<!--列表標題-->
<table class="title">
	<tr>
		<td width="5%">編號</td>
		<td width="20%">學校名稱</td>
		<td width="20%">教師名稱</td>
		<td width="55%">功能</td>
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
				<td width="5%"><?php echo $key + 1; ?></td>
				<td width="20%"><?php echo isset($tempArray['c_name'])?$tempArray['c_name']:'';?></td>
				<td width="20%">
<?php
if(isset($teacherList[$tempArray['num']]) and count($teacherList[$tempArray['num']]) > 0){
	foreach($teacherList[$tempArray['num']] as $tNum => $tName){
?>
	<input type="button" value="<?php echo $tName;?>" onclick="chagneTeacher('<?php echo $tNum;?>')"><br>
<?php		
	}
}

?>				
				
				
				</td>
				<td width="55%">
					<a class="button" title="匯出學校完整Excel" onclick="OutExcel('<?php echo $tempArray['num'];?>','<?php echo $tempArray['c_name'];?>')">匯出學校完整Excel</a>
				</td>
			</tr>
				</table>
				</td>
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
<script>

//產生excel
function OutExcel(getNum,getSName){
	var res = encodeURI(getSName);
	window.open('<?php echo  site_url('achievementlist/getSchoolExcel'); ?>?swSchool='+getNum+'&sName='+res);
}

function chagneTeacher(getID){
	$.ajax({
		url: '<?php echo  site_url('achievementlist/chgTeacher'); ?>',
		type:"POST",
		data: {keyNum:getID},
		error: function(xhr) {
			//alert('Ajax request 發生錯誤');
		},
		success: function(response) {
			//console.log(response);
			location.href='<?php echo  site_url('achievementlist/'); ?>';
		}
	});
}
</script>