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

<!-- questionnaireList -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="<?php echo $base;?>public/css/back/questionnaire.css?v=0.31">
<!-- questionnaireList end -->


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
	<h1><img src="<?php echo $base;?>public/images/back/title_1.png" title="合作問題解決數位學習系統" style="width:98%;" /></h1>
	<ul>
    	<li><a href="<?php echo site_url('general/'); ?>" title="基本設定"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />基本設定</a></li>
    	<li><a href="<?php echo site_url('modellist/'); ?>" title="模組管理"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />模組管理</a></li>		
    	<li><a href="<?php echo site_url('sharelist/'); ?>" title="分享試題列表"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />分享試題列表</a></li>		
    	<li><a href="<?php echo site_url('questionslist/'); ?>" title="試題列表"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />試題列表</a></li>
    	<li><a href="<?php echo site_url('schoollist/'); ?>" title="學校管理"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />學校管理</a></li>
    	<li><a href="<?php echo site_url('teacherlist/'); ?>" title="教師管理"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />教師管理</a></li>
    	<li><a href="<?php echo site_url('classlist/'); ?>" title="學生管理"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />學生管理</a></li>
    	<li><a href="<?php echo site_url('recordlist/'); ?>" title="操作紀錄列表"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />操作紀錄列表</a></li>
        <li><a href="<?php echo site_url('achievementlist/schoolList'); ?>" title="成績列表"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />成績列表</a></li>
        <li><a href="<?php echo site_url('questionnaire/'); ?>" title="問卷列表"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />問卷列表</a></li>
    	<li><a href="<?php echo site_url('memck/logout_admin'); ?>" title="登出"><img src="<?php echo base_url('public/images/back/icon_add.png');?>" />登出</a></li>
    </ul>
</aside>
<?php
	//此處插入資料
	echo $content_for_layout;//顯示view的區塊
?>
</body>
</html>
