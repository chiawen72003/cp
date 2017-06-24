<!-- 左選單 end -->
<div id="wrapper">
<ul>
	<li><a class="button" title="回上一頁" onclick="history.back();">回上一頁</a></li>
</ul>

<table class="title">
	<tr>
		<td>檢視學生上傳資料</td>
	</tr>
</table>
<div class="accordionButton">
	<table class="list_item">
        <tr id="tr_title" >
            <td >
                標題： <?php echo $record['title_dsc'];?>
            </td>
        </tr>
        <tr id="tr_title" >
            <td >
                <div>教材內容：<?php echo $record['contents_dsc'];?></div>
            </td>
        </tr>
        <?php
        if($record['can_write'] == 1){
        ?>
            <tr>
                <td><p>學生作答內容:<?php echo $record['ans_data'];?></td>
            </tr>
        <?php
        }
        ?>
        <?php
        if($record['can_up_file'] == 1){
            foreach ($record['file_data'] as $v){
                ?>
                <tr>
                    <td><p>學生上傳物件:<a href="<?php echo $base.'upFILE/materials/'.$v['file_path'];?>" target="_blank"><?php echo $v['file_name'];?></a></p></td>
                </tr>
                <?php
            }
        }
        ?>
	</table>
</div>
</div>

<script>
</script>