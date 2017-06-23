<div class="content">
    <div class="content-title"><?php echo $list['title_dsc'];?></div>
    <div class="content-con"><?php echo $list['contents_dsc'];?></div>
    <?php
    foreach($list['file_data'] as $v)
    {
    ?>
        <div class="content-con">附件下載：<a href="<?php echo $base.'upFILE/materials/'.$v['file_path'];?>" target="_blank"><?php echo $v['file_name'];?></a></div>
    <?php
    }
    ?>

    <?php
    $attributes = array( 'id' => 'Form1');
    $hidden = array();
    if(isset($num)){
        $hidden['num'] = $num;
    }
    echo form_open_multipart('materials/setDo', $attributes,$hidden);
    ?>
    <?php if($list['can_write'] == 1)
    {
    ?>
        <div class="content-edit">
            <textarea name="ans_data"></textarea>
        </div>
    <?php
    }
    ?>
    <?php if($list['can_up_file'] == 1) {
        ?>
        <div class="content-upload">
            作業上傳
            <div id="dnd">
                <input type="file" name="up_file">
            </div>
        </div>
    <?php
    }
    echo form_close();
    ?>

    <div class="content-btn">
        <a onclick="history.back()" class="button button-primary">回上一頁</a>
        <a href="send()" class="button button-primary">上傳作業</a>
    </div>
</div>
