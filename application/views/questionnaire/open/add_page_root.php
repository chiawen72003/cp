<!-- 左選單 end -->
<div id="wrapper">
<ul>
	<li><a class="button" title="回上一頁" onclick="history.back();">回上一頁</a></li>	
</ul>    
  
<table class="title">
	<tr>
		<td>
		編輯問卷開放資料<br>
		</td>
	</tr>
</table>
<div class="accordionButton">
	<table class="list_item">
        <tr id="tr_title" >
            <td >
                學校名稱：
                <select id="select_school"  onchange="reset_teacher()">
                    <option value="">請選擇學校</option>
                </select>
            </td>
        </tr>
        <tr id="tr_title" >
            <td >
                教師名稱：
                <select id="select_teacher"  onchange="reset_class()">
                    <option value="">請選擇教師</option>
                </select>
            </td>
        </tr>
        <tr id="tr_title" >
            <td >
                班級名稱： <select id="select_class" >
                    <option value="">請選擇班級</option>
                </select>
            </td>
        </tr>
        <tr id="tr_title" >
            <td >
                問卷名稱：<?php echo $q_data[$num];?>
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
var school_obj = [];
var teacher_obj = [];
var class_obj = [];
var quation_obj = [];
<?php
    foreach($school as $key => $v)
    {
?>
    school_obj.push(
        {
            'num':'<?php echo $key; ?>',
            'name':'<?php echo $v; ?>',
        }
    );
<?php
    }
?>

<?php
foreach($teacher as $v)
{
?>
teacher_obj.push(
    {
        'num':'<?php echo $v['num']; ?>',
        'school':'<?php echo $v['schoolNum']; ?>',
        'name':'<?php echo $v['c_name']; ?>',
    }
);
<?php
}
?>
<?php
foreach($class_data as $v)
{
?>
class_obj.push(
    {
        'num':'<?php echo $v['num']; ?>',
        'teacher_num':'<?php echo $v['user_num']; ?>',
        'year':'<?php echo $v['year_dsc']; ?>',
        'class':'<?php echo $v['class_dsc']; ?>',
    }
);
<?php
}
?>
$( document ).ready(function() {
    set_school();
});

function set_school() {
    for(var x=0; x<school_obj.length; x++)
    {
        $('#select_school').append(
            '<option value="'+school_obj[x]['num']+'">'+school_obj[x]['name']+'</option>'
        );
    }
}

/**
 *
 */
function reset_teacher() {
    $("#select_teacher option").remove();
    $("#select_class option").remove();
    $('#select_teacher').append(
        '<option value="">請選擇教師</option>'
    );
    $('#select_class').append(
        '<option value="">請選擇班級</option>'
    );
    var sw_school = $('#select_school').val();
    if(sw_school > '')
    {
        for(var x=0; x<teacher_obj.length; x++)
        {
            if(teacher_obj[x]['school'] == sw_school)
            {
                $('#select_teacher').append(
                    '<option value="'+teacher_obj[x]['num']+'">'+teacher_obj[x]['name']+'</option>'
                );
            }
        }
    }
}
/**
 *
 */
function reset_class() {
    $("#select_class option").remove();
    $('#select_class').append(
        '<option value="">請選擇班級</option>'
    );
    var sw_teacher = $('#select_teacher').val();
    if(sw_teacher > '')
    {
        for(var x=0; x<class_obj.length; x++)
        {
            if(class_obj[x]['teacher_num'] == sw_teacher)
            {
                $('#select_class').append(
                    '<option value="'+class_obj[x]['num']+'">'+class_obj[x]['year']+'年'+class_obj[x]['class']+'班</option>'
                );
            }
        }
    }
}
function chkValue(){
	var isGo = true;
	var err_dsc = '';
	var ck_array =  ["select_school","begin_date"];
	var err_array =  ["請選擇學校!!","請輸入開放日期!!"];
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
            url: '<?php echo  site_url('questionnaire/insertOpenData'); ?>',
            type:"POST",
            data: {
                questions_num:'<?php echo $num;?>',
                school_num:$('#select_school').val(),
                teacher_num:$('#select_teacher').val(),
                class_num:$('#select_class').val(),
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