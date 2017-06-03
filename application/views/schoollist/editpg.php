<!-- 左選單 end -->
<div id="wrapper">
<ul>
	<li><a class="button" title="回上一頁" onclick="history.back();">回上一頁</a></li>	
</ul>    
  
<table class="title">
	<tr>
		<td>
		編輯學校資料<br>
		</td>
	</tr>
</table>
<div class="accordionButton">
<?php 
$attributes = array( 'id' => 'Form1');
$hidden = array();
if(isset($num)){
	$hidden['num'] = $num;
}
if(isset($offsetDsc)){
	$hidden['offsetDsc'] = $offsetDsc;
}
echo form_open_multipart('schoollist/setSchoolData', $attributes,$hidden);
?>

	<table class="list_item">
		<tr id="tr_title" >
			<td >
			學校名稱：<input type="text" class="put_2" name="c_name" id="c_name" value="<?php echo isset($dataList['c_name'])?$dataList['c_name']:'';?>" ><br>
			<a class="button" title="存檔" onclick="chkValue()">存檔</a>			
			</td>
		</tr>
	</table>
<?php 
echo form_close();
?>	
</div>
</div>

<script>
var dataIsSend = false;

function chkValue(){
	var isGo = true;
	var err_dsc = '';
	var ck_array =  ["c_name"];
	var err_array =  ["請輸入學校名稱!!"];
	var type_array =  ["text"];

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
		$('#Form1').submit();
	}
	
	if(err_dsc !=''){
		alert(err_dsc);
	}
}
</script>