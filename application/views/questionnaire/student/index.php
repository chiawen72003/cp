<table class="title">
    <tbody>
    <tr>
        <td width="5%">編號</td>
        <td width="50%">試題題目</td>
        <td width="15%">提交狀態</td>
        <td width="30%">截止日期</td>
    </tr>
    </tbody>
</table>
<table class="list_detial">
    <tbody>
    <?php
    foreach ($list as $k => $v){
    ?>
        <tr>
            <td width="5%"><?php echo $k+1;?></td>
            <td width="50%"><a href="<?php echo  site_url('questionnaire/doPage').'?num='.$v['num']; ?>"><?php echo $v['title_dsc'];?></a></td>
            <td width="15%">尚未提交</td>
            <td width="30%"><?php echo $v['end_date'];?></td>
        </tr>
    <?php
    }
    ?>

    </tbody>
</table>