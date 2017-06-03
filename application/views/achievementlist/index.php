<!-- 左選單 end -->
<div id="wrapper">
	<!--列表標題-->
    <div class="search">
	目前使用的班級：<?php echo isset($className)?$className:'';?><a class="button" title="更換班級" onclick="show_chagneClass()">更換班級</a>
	</div>    
	<ul> 
<?php
	if($this->session->userdata("loginType") == "root"){
?>
	<a class="button" title="回學校列表" onclick="location.href='<?php echo  site_url('achievementlist/schoolList'); ?>';">回學校列表</a>
<?php		
	}
?>
	
		<li><a class="button" title="匯出成績" onclick="OutExcel()">匯出成績</a></li>
    </ul>  
<!--列表標題-->
<table class="title">
	<tr>
		<td width="5%">編號</td>
		<td width="10%">班級</td>
		<td width="10%">學生名稱</td>
		<td width="20%">試題題目</td>
		<td width="15%">存檔時間</td>
		<td width="15%">分數</td>
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
				<td width="10%"><?php echo isset($className)?$className:'';?></td>
				<td width="10%"><?php echo isset($studentData[$tempArray['student_num']])?$studentData[$tempArray['student_num']]['c_name']:'';?></td>
				<td width="20%"><?php echo isset($quationsData[$tempArray['questions_num']])?$quationsData[$tempArray['questions_num']]['title_dsc']:'';?></td>
				<td width="15%"><?php echo $tempArray['up_date'];?></td>
				<td width="15%">
					<a class="button" onclick="show_msg_box('<?php echo $tempArray['num'];?>')">觀看成績</a>
				
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


<div id="tArea"  style="display:none;">
	<ul>
<?php
if(isset($classData) and count($classData) >0)
{
	foreach($classData as  $tempArray){
?>
	<li>
	<input type="button" value="<?php echo $tempArray['className'];?>" onclick="chagneClass('<?php echo $tempArray['num'];?>')">
	</li>
<?php		
	}
}
?>	
    <a class="button" onclick="$.colorbox.close();">取消</a>	
</div>
<div id="show_MsgBox_area" style="display:none;">

</div>

<script>
//更換班級
function show_chagneClass(){
	$('#tArea').show();
	$.colorbox({inline:true,href:"#tArea", width:"30%",open:true,onClosed:function(){
	$('#tArea').hide();
	}});
}
function chagneClass(getID){
	location.href='<?php echo  site_url('achievementlist/index?swClass='); ?>'+getID;
}


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
		url: '<?php echo  site_url('scorelist/chgTeacher'); ?>',
		type:"POST",
		data: {keyNum:getID},
		error: function(xhr) {
			//alert('Ajax request 發生錯誤');
		},
		success: function(response) {
			location.href='<?php echo  site_url('scorelist/'); ?>';
		}
	});
}

//產生excel
function OutExcel(){
	window.open('<?php echo  site_url('achievementlist/getClassExcel'); ?>?swClass=<?php echo $swClass?>');
}

function show_msg_box(getValue){
	$.ajax({
		url: '<?php echo  site_url('achievementlist/getScorePG'); ?>',
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