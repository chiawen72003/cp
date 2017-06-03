<?php
if(isset($QuationsData) and count($QuationsData) > 0){
	foreach($QuationsData as $key => $tempArray){
if( $tempArray['is_practice'] == '1' ){
?>
<!-- 單元 -->
	<div class="crsl-item">
		<div class="thumbnail">
			<a title="開始測驗" href="<?php echo  site_url("testlist/testPG/");?>?num=<?php echo $tempArray['num'];?>"><img  src="<?php echo base_url('upIMG/questions/')."/".$tempArray['img_path'];?>"  ></a>
		</div>
	</div>
<!-- 單元 End -->
<?php	
}		
if( $tempArray['is_practice'] == '0' ){
	$nowdate =  date("Y-m-d",time());
	if(in_array($tempArray['num'],$QuationsClassData)){
		if( $nowdate >= $tempArray['begin_date'] and  $nowdate <= $tempArray['end_date']){
?>
<!-- 單元 -->
	<div class="crsl-item">
		<div class="thumbnail">
			<a  title="開始測驗" href="<?php echo  site_url("testlist/testPG/");?>?num=<?php echo $tempArray['num'];?>"><img  src="<?php echo base_url('upIMG/questions/')."/".$tempArray['img_path'];?>"  ></a>
		</div>
	</div>
<!-- 單元 End -->
<?php			
		}
	}
}		
	}
}
?>
