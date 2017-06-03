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
    	<li><a class="button" title="新增試題" href="<?php echo site_url("questionslist/addQuestions_Page");?>">新增試題</a></li>    
    </ul>    
    <table class="title">
        <tr>
            <td width="5%">編號</td>
            <td width="10%">試題類型</td>
            <td width="10%">題目圖形</td>
            <td width="20%">使用的模組</td>
            <td width="20%">測試時間</td>
            <td width="15%">測試班級</td>
            <td width="20%">功能設定</td>
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
				<td width="15%">
<?php
if( isset($testClassData[$tempArray['num']]) ){
	foreach($testClassData[$tempArray['num']] as $classValue){
		foreach( $classData as $cArray){
			if($cArray['num'] == $classValue){
	echo $cArray['year_dsc']."年".$cArray['class_dsc']."班<br>";
			}
		}
	}
}

?>				
				</td>
                <td width="20%">
<?php
if($tempArray['is_share'] == '0'){
?>
					<a class="button" title="編輯" href="<?php echo  site_url("questionslist/editQuestions_Page/");?>?pg=<?php echo $offsetDsc;?>&num=<?php echo $tempArray['num'];?>">編輯</a>
					<a class="button" title="刪除" onclick="del_QT('<?php echo $tempArray['num'];?>','<?php echo $tempArray['title_dsc'];?>')">刪除</a>
<?php
}else{
//管理員分享的題目，只能進去編輯測驗班級資料	
?>
					<a class="button" title="編輯" href="<?php echo  site_url("questionslist/editQuestions_SharePage/");?>?pg=<?php echo $offsetDsc;?>&num=<?php echo $tempArray['num'];?>">編輯</a>
<?php	
}
?>					
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
function del_QT(key_num,unit_dsc){
	if(confirm("確定刪除下列標題的題目嗎?\r\n"+unit_dsc)){	
		$.ajax({
			url: '<?php echo  site_url('questionslist/del_QT'); ?>',
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
		url: '<?php echo  site_url('questionslist/chgTeacher'); ?>',
		type:"POST",
		data: {keyNum:getID},
		error: function(xhr) {
			//alert('Ajax request 發生錯誤');
		},
		success: function(response) {
			location.href='<?php echo  site_url('questionslist/'); ?>';
		}
	});
}
</script>