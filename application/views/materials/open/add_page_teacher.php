<!-- 左選單 end -->
<div id="wrapper">
<ul>
	<li><a class="button" title="回上一頁" onclick="history.back();">回上一頁</a></li>
</ul>

<table class="title">
	<tr>
		<td>
		編輯試卷教材開放資料<br>
		</td>
	</tr>
</table>
<div class="accordionButton">
	<table class="list_item">
        <tr id="tr_title" >
            <td >
                班級名稱： <select id="select_class" onchange="reset_student()">
                    <option value="">請選擇班級</option>
                    <?php
                    foreach($class_data as $v)
                    {
                    ?>
                    <option value="<?php echo $v['num'];?>"><?php echo $v['year_dsc'].'年'.$v['class_dsc'].'班';?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr id="tr_title" >
            <td >
                學生姓名： <select id="select_student" >
                    <option value="">請選擇學生</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><p>開放起始日期:<input type="text" class="datepicker" id="begin_date" value=""></td>
        </tr>
        <tr>
            <td><p>開放結束日期:<input type="text" class="datepicker"  id="end_date" value=""></td>
        </tr>
        <tr>
            <td><button onclick="chkValue()">送出</button></td>
        </tr>
	</table>
</div>
</div>

<script>
$(function() {
    $( ".datepicker" ).datepicker({dateFormat:"yy-mm-dd",});
});
var dataIsSend = false;
var student = [];
<?php
foreach($student as $v){
?>
student.push({
    'num':'<?php echo $v['num'];?>',
    'class_num':'<?php echo $v['class_num'];?>',
    'student_id':'<?php echo $v['student_id'];?>',
    'name':'<?php echo $v['c_name'];?>',
});
<?php
}
?>

$( document ).ready(function() {
});

/**
 * 重設學生資料
 */
function reset_student(){
    $("#select_student option").remove();
    $('#select_student').append(
        '<option value="">請選擇學生</option>'
    );
    var sw_class = $('#select_class').val();
    if(sw_class > '')
    {
        for(var x=0; x<student.length; x++)
        {
            if(student[x]['class_num'] == sw_class)
            {
                $('#select_student').append(
                    '<option value="'+student[x]['num']+'">'+student[x]['name']+'</option>'
                );
            }
        }
    }
}

function chkValue(){
	var isGo = true;
	var err_dsc = '';
	var ck_array =  ["select_class","begin_date"];
	var err_array =  ["請選擇班級!!","請輸入開放日期!!"];
	var type_array =  ["text","text"];

	for(var x=0;x< ck_array.length;x++){
		switch(type_array[x]){
			case "text":
			case "file":
				if($('#'+ck_array[x]).val() ==''){
				err_dsc = err_dsc + err_array[x] +'\r\n';
				isGo = false;
				}
			break;
			case "number":
				if(!$.isNumeric($('#'+ck_array[x]).val()) ){
					err_dsc = err_dsc + err_array[x] +'\r\n';
					isGo = false;
				}else{
					if( $('#'+ck_array[x]).val() < 1 || $('#'+ck_array[x]).val() > 99 ){
							err_dsc = err_dsc + "排序值需介於1~99!!\r\n";
							isGo = false;
					}
				}
			break;
		}
	}

	if(isGo && !dataIsSend){
        $.ajax({
            url: '<?php echo  site_url('materials/insertOpenData'); ?>',
            type:"POST",
            data: {
                materials_num:'<?php echo $materials_num;?>',
                class_num:$('#select_class').val(),
                student_num:$('#select_student').val(),
                begin_date:$('#begin_date').val(),
                end_date:$('#end_date').val(),
            },
            error: function(xhr) {
                alert('網路連線異常，請重新操作!!');
            },
            success: function(response) {
               alert('新增完畢!!');
                window.location.replace(document.referrer);
            }
        });
	}

	if(err_dsc !=''){
		alert(err_dsc);
	}
}
</script>