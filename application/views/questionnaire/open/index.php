<div id="wrapper">
    <div class="search">
        <!--模組名稱搜尋：<input type="text" name="s_word" id="s_word" value="" ><a class="button" title="模組名稱搜尋：" onclick="search_word()">搜尋</a><a href="index.php" class="button" title="清除搜尋" >清除搜尋</a>-->
    </div>
    <ul>
        <li><a class="button" title="新增模組" href="<?php echo  site_url('questionnaire/addOpenPage'); ?>">新增開放問卷</a></li>
    </ul>
    <table class="title">
        <tbody>
        <tr>
            <td width="5%">編號</td>
            <td width="30%">問卷標題</td>
            <td width="10%">學校名稱</td>
            <td width="10%">班級名稱</td>
            <td width="10%">起始時間</td>
            <td width="10%">結束時間</td>
            <td width="25%">功能設定</td>
        </tr>
        </tbody>
    </table>
    <!-- 單元 -->
    <div class="accordionButton">
        <table class="list_item">
            <tbody>
            <?php
            foreach ($listData as $k => $v)
            {
            ?>
                <tr>
                    <td width="5%"><?php echo $k+1;?></td>
                    <td width="30%"><?php echo isset($quation_title[$v['questions_num']])?$quation_title[$v['questions_num']]:'';?></td>
                    <td width="10%"><?php echo isset($school[$v['school_num']])?$school[$v['school_num']]:'';?></td>
                    <td width="10%"><?php echo isset($class_data[$v['class_num']])?$class_data[$v['class_num']]:'';?></td>
                    <td width="10%"><?php echo $v['begin_date'];?></td>
                    <td width="10%"><?php echo $v['end_date'];?></td>
                    <td width="25%">
                        <a class="button" title="編輯" href="<?php echo  site_url("questionnaire/editOpenPage/");?>?pg=<?php echo $offsetDsc;?>&num=<?php echo $v['num'];?>">編輯</a>
                        <a class="button" title="刪除" onclick="del('<?php echo $v['num']; ?>')">刪除</a>
                    </td>
                </tr>
            <?php
            }
            ?>

            </tbody>
        </table>
    </div>
    <!-- 單元 End -->
</div>
<script>
    //刪除一個問卷
    function del(key_num){
        if(confirm("確定刪除嗎?\r\n")){
            $.ajax({
                url: '<?php echo  site_url('questionnaire/delOpenData'); ?>',
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
</script>