<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>合作問題解決數位學習系統</title>
<link rel="stylesheet" href="<?php echo $base;?>public/css/back/admin.css" />
<!--<link rel="stylesheet" href="<?php echo $base;?>public/css/back/style.css" />-->
<link rel="stylesheet" href="<?php echo $base;?>public/css/back/normalize.css" />
<link rel="stylesheet" href="<?php echo $base;?>public/css/back/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo $base;?>public/css/back/colorbox.css" />

<script src="<?php echo $base;?>public/js/back/jquery-2.1.1.min.js"> </script>
<script src="<?php echo $base;?>public/js/back/jquery-ui.js"></script>
<script src="<?php echo $base;?>public/js/back/datepicker-zh-TW.js"></script>
<script src="<?php echo $base;?>public/js/back/jquery.colorbox.js"></script>
<script src="<?php echo $base;?>public/js/back/ckeditor/ckeditor.js"></script>


<script language="javascript">
function add_Questions(){
	
} 
$(function(){
//$('#showShareData').colorbox({width:"100%",height:"70%",iframe: true});//註冊登箱內的超連結
});
</script>
</head>
<body>
<!-- 左選單 -->
<aside>
	<h1><img src="<?php echo $base;?>public/images/back/title.png" title="合作問題解決數位學習系統" style="width:98%;" /></h1>
	<ul>
    	<li><a href="<?php echo site_url('modellist/'); ?>" title="模組管理"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />模組管理</a></li>
    	<li><a href="<?php echo site_url('questionslist/'); ?>" title="試題列表"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />試題列表</a></li>
    	<li><a href="<?php echo site_url('classlist/'); ?>" title="班級管理"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />班級管理</a></li>
    	<li><a href="<?php echo site_url('recordlist/'); ?>" title="操作紀錄列表"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />操作紀錄列表</a></li>
    	<li><a href="<?php echo site_url('scorelist/'); ?>" title="評分列表"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />評分列表</a></li>
    	<li><a href="<?php echo site_url('achievementlist/'); ?>" title="成績列表"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />成績列表</a></li>
    	<li><a href="<?php echo site_url('memck/logout_teacher'); ?>" title="登出"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />登出</a></li>
    </ul>
</aside>
<?php
	//此處插入資料
	echo $content_for_layout;//顯示view的區塊
?>
</body>
</html>
