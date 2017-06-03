<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>合作問題解決數位學習系統</title>
<script src="<?php echo base_url('public/js/jquery-1.10.1.min.js'); ?>"> </script>
<script src="<?php echo base_url('public/js/jquery-ui.js'); ?>"> </script>


<script language="javascript">
</script>
</head>
<body>
<!--操作區-->
<div class="operate" >
<section>		
	<h2 id="step_dsc"></h2>
	<div id="module_area" style="" ><!-- 模組出題區域-->
	<?php
	//此處插入資料
	echo $content_for_layout;//顯示view的區塊
	?>

	</div>			
</section>
</div>
<!--操作區end-->
</body>
</html>