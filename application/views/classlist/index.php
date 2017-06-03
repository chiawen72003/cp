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
    	<li><a class="button" title="新增班級" href="<?php echo site_url("classlist/addClass_Page");?>">新增班級</a></li>    
    </ul>    
    <table class="title">
        <tr>
            <td width="5%">編號</td>
            <td width="10%">年級</td>
            <td width="10%">班級</td>
            <td width="10%">學生人數</td>
            <td width="30%">備註</td>
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
                <td width="10%" ><?php echo $tempArray['year_dsc']; ?></td>
                <td width="10%" ><?php echo $tempArray['class_dsc']; ?></td>
                <td width="10%" ><?php echo isset($classPeople[$tempArray['num']])?$classPeople[$tempArray['num']]:'0'; ?></td>
                <td width="30%" ><?php echo $tempArray['memo_dsc']; ?></td>
                <td width="35%">
					<a class="button" title="學生管理" href="<?php echo  site_url("classlist/editClassPeople_Page/");?>?f_pg=<?php echo $offsetDsc;?>&num=<?php echo $tempArray['num'];?>">學生管理</a> 
					<a class="button" title="編輯" href="<?php echo  site_url("classlist/editClass_Page/");?>?pg=<?php echo $offsetDsc;?>&num=<?php echo $tempArray['num'];?>">編輯</a> 
					<a class="button" title="刪除" onclick="del_CL('<?php echo $tempArray['num'];?>','<?php echo $tempArray['year_dsc'];?>年<?php echo $tempArray['class_dsc'];?>班')">刪除</a>
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

<script >

//刪除一個題目
function del_CL(key_num,unit_dsc){
	if(confirm("確定刪除下列班級及班級內學生的資料嗎?\r\n"+unit_dsc)){	
		$.ajax({
			url: '<?php echo  site_url('classlist/del_CL'); ?>',
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
		url: '<?php echo  site_url('classlist/chgTeacher'); ?>',
		type:"POST",
		data: {keyNum:getID},
		error: function(xhr) {
			//alert('Ajax request 發生錯誤');
		},
		success: function(response) {
			location.href='<?php echo  site_url('classlist/'); ?>';
		}
	});
}
</script>