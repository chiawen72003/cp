<!-- 左選單 end -->
<div id="wrapper">
	<!--列表標題-->
    <div class="search">
<?php
	if($this->session->userdata("loginType") == "root"){
?>
	目前使用的教師：<?php echo $this->session->userdata("tempTeacherName");?>
	<a class="button" title="更換教師" onclick="show_chagneTeacher()">更換教師</a>
<?php		
	}
?>		
	</div>    
	<ul> 
    </ul>  
<!--列表標題-->
<table class="title">
	<tr>
		<td width="5%">編號</td>
		<td width="10%">班級</td>
		<td width="10%">學生名稱</td>
		<td width="10%">學號</td>
		<td width="20%">試題題目</td>
		<td width="20%">存檔時間</td>
		<td width="25%">功能操作</td>
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
				<td width="10%"><?php
				$classID = $studentData[$tempArray['student_num']]['class_num'];
				echo isset($classData[$classID])?$classData[$classID]:'';?></td>
				<td width="10%"><?php echo isset($studentData[$tempArray['student_num']])?$studentData[$tempArray['student_num']]['c_name']:'';?></td>
				<td width="10%"><?php echo isset($studentData[$tempArray['student_num']])?$studentData[$tempArray['student_num']]['student_id']:'';?></td>
				<td width="20%"><?php echo isset($quationsData[$tempArray['questions_num']])?$quationsData[$tempArray['questions_num']]['title_dsc']:'';?></td>
				<td width="20%"><?php echo $tempArray['up_date'];?></td>
				<td width="25%"><a class="button" title="" href="<?php echo  site_url("recordlist/recordPG/");?>?num=<?php echo $tempArray['questions_num'];?>&r_num=<?php echo $tempArray['num'];?>&u_type=<?php echo $tempArray['student_type'];?>">觀看紀錄</a>
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
<?php
echo $pagination;
?>

<div id="editArea"  style="display:none;">
	<table>
<?php
if(isset($teacherList) and count($teacherList) >0)
{
	$maxNumber = count($teacherList);
	for($x=0;$x<$maxNumber;$x+=4){
?>
	<tr>
<?php
	for($y=0;$y<4;$y++){
		$i = $y+$x;
		if(isset($teacherList[$i]['c_name'])){
?>	
<td>
	<input type="button" value="<?php echo $teacherList[$i]['c_name'];?>" onclick="chagneTeacher('<?php echo $teacherList[$i]['num'];?>')">
</td>
<?php			
		}	
	}
?>	
	</tr>
<?php		
	}
}
?>	
	</table>
    <a class="button" onclick="$.colorbox.close();">取消</a>	
</div>

<script>
//更換教師
function show_chagneTeacher(){
	$('#editArea').show();
	$.colorbox({inline:true,href:"#editArea", width:"30%",open:true,onClosed:function(){
	$('#editArea').hide();
	}});
}

//
function chagneTeacher(getID){
	$.ajax({
		url: '<?php echo  site_url('recordlist/chgTeacher'); ?>',
		type:"POST",
		data: {keyNum:getID},
		error: function(xhr) {
			//alert('Ajax request 發生錯誤');
		},
		success: function(response) {
			location.href='<?php echo  site_url('recordlist/'); ?>';
		}
	});
}
</script>