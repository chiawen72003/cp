<div id="wrapper">
    <div class="search">
        <!--模組名稱搜尋：<input type="text" name="s_word" id="s_word" value="" ><a class="button" title="模組名稱搜尋：" onclick="search_word()">搜尋</a><a href="index.php" class="button" title="清除搜尋" >清除搜尋</a>-->
    </div>
    <ul>
        <li><a class="button" title="新增開放試卷" href="<?php echo  site_url('materials/addOpenPage').'?num='.$materials_num; ?>">新增開放試卷</a></li>
    </ul>
    <table class="title">
        <tbody>
        <tr>
            <td width="5%">編號</td>
            <td width="30%">教材標題</td>
            <td width="10%">學生姓名</td>
            <td width="10%">完成與否</td>
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
                    <td width="30%"><?php echo isset($materials_title[$v['materials_num']])?$materials_title[$v['materials_num']]:'';?></td>
                    <td width="10%"><?php echo isset($student_name[$v['student_num']])?$student_name[$v['student_num']]:'';?></td>
                    <td width="10%"><?php echo ($v['is_finish'] ==1)?'是':'否';?></td>
                    <td width="10%"><?php echo $v['begin_date'];?></td>
                    <td width="10%"><?php echo $v['end_date'];?></td>
                    <td width="25%">
                        <!--<a class="button" title="編輯" href="<?php echo  site_url("materials/editOpenPage/");?>?pg=<?php echo $offsetDsc;?>&num=<?php echo $v['num'];?>">編輯</a>-->
                        <?php
                        if($v['is_finish'] ==1){
                        ?>
                            <a class="button" title="查看" href="<?php echo  site_url("materials/view_data/");?>?num=<?php echo $v['num'];?>">查看</a>
                        <?php
                        }
                        ?>
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
                url: '<?php echo  site_url('materials/delOpenData'); ?>',
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