<!DOCTYPE html>
<html class="questionnaire">
<head>
    <meta charset="UTF-8">
    <title>Ntcu.</title>
    <!-- Style Sheets -->
    <link rel="stylesheet" href="<?php echo $base;?>public/css/questionnaire/style.css?v=0.12" />
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('public/js/html5shiv.js'); ?>"> </script>
    <![endif]-->
</head>
<body>
<?php
//此處插入資料
echo $content_for_layout;//顯示view的區塊
?>
</body>
</html>