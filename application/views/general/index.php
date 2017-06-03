<!-- 左選單 end -->
<div id="wrapper">
<ul>
	<li><a class="button" title="存檔" onclick="chkValue()">存檔</a></li>	
</ul>    
  
<table class="title">
	<tr>
		<td>
			基本設定<br>
		</td>
	</tr>
</table>
<div class="accordionButton">
	<table class="list_item">
		<tr id="tr_title" >
			<td>
				語音輸出功能：
				<select name="MediaSwitch" id="MediaSwitch">
					<option value="0" <?php echo (isset($generalData['MediaSwitch']) and $generalData['MediaSwitch']=='0')?'selected':''; ?>>關閉</option>
					<option value="1" <?php echo (isset($generalData['MediaSwitch']) and $generalData['MediaSwitch']=='1')?'selected':''; ?>>開啟</option>
				</select>
			</td>
		</tr>
		<tr id="tr_title" >
			<td >
				互動連線伺服器網址：
				<input type="text" name="node_server" class="put_1" id="node_server" value="<?php echo (isset($generalData['node_server']))?$generalData['node_server']:''; ?>">
			</td>
		</tr>
		<tr id="tr_title" >
			<td >
				能力指標 A1：
				<input type="text" name="PowerDsc_A1" class="put_1"  id="PowerDsc_A1" value="<?php echo (isset($generalData['PowerDsc_A1']))?$generalData['PowerDsc_A1']:''; ?>">
			</td>
		</tr>
		<tr id="tr_title" >
			<td >
				能力指標 A2：
				<input type="text" name="PowerDsc_A2" class="put_1"  id="PowerDsc_A2" value="<?php echo (isset($generalData['PowerDsc_A2']))?$generalData['PowerDsc_A2']:''; ?>">
			</td>
		</tr>
		<tr id="tr_title" >
			<td >
				能力指標 A3：
				<input type="text" name="PowerDsc_A3" class="put_1"  id="PowerDsc_A3" value="<?php echo (isset($generalData['PowerDsc_A3']))?$generalData['PowerDsc_A3']:''; ?>">
			</td>
		</tr>
		<tr id="tr_title" >
			<td >
				能力指標 B1：
				<input type="text" name="PowerDsc_B1"  class="put_1" id="PowerDsc_B1" value="<?php echo (isset($generalData['PowerDsc_B1']))?$generalData['PowerDsc_B1']:''; ?>">
			</td>
		</tr>
		<tr id="tr_title" >
			<td >
				能力指標 B2：
				<input type="text" name="PowerDsc_B2" class="put_1"  id="PowerDsc_B2" value="<?php echo (isset($generalData['PowerDsc_B2']))?$generalData['PowerDsc_B2']:''; ?>">
			</td>
		</tr>
		<tr id="tr_title" >
			<td >
				能力指標 B3：
				<input type="text" name="PowerDsc_B3" class="put_1"  id="PowerDsc_B3" value="<?php echo (isset($generalData['PowerDsc_B3']))?$generalData['PowerDsc_B3']:''; ?>">
			</td>
		</tr>
		<tr id="tr_title" >
			<td >
				能力指標 C1：
				<input type="text" name="PowerDsc_C1"  class="put_1" id="PowerDsc_C1" value="<?php echo (isset($generalData['PowerDsc_C1']))?$generalData['PowerDsc_C1']:''; ?>">
			</td>
		</tr>
		<tr id="tr_title" >
			<td >
				能力指標 C2：
				<input type="text" name="PowerDsc_C2"  class="put_1" id="PowerDsc_C2" value="<?php echo (isset($generalData['PowerDsc_C2']))?$generalData['PowerDsc_C2']:''; ?>">
			</td>
		</tr>
		<tr id="tr_title" >
			<td >
				能力指標 C3：
				<input type="text" name="PowerDsc_C3" class="put_1"  id="PowerDsc_C3" value="<?php echo (isset($generalData['PowerDsc_C3']))?$generalData['PowerDsc_C3']:''; ?>">
			</td>
		</tr>
		<tr id="tr_title" >
			<td >
				能力指標 D1：
				<input type="text" name="PowerDsc_D1"  class="put_1" id="PowerDsc_D1" value="<?php echo (isset($generalData['PowerDsc_D1']))?$generalData['PowerDsc_D1']:''; ?>">
			</td>
		</tr>
		<tr id="tr_title" >
			<td >
				能力指標 D2：
				<input type="text" name="PowerDsc_D2"  class="put_1" id="PowerDsc_D2" value="<?php echo (isset($generalData['PowerDsc_D2']))?$generalData['PowerDsc_D2']:''; ?>">
			</td>
		</tr>
		<tr id="tr_title" >
			<td >
				能力指標 D3：
				<input type="text" name="PowerDsc_D3"  class="put_1" id="PowerDsc_D3" value="<?php echo (isset($generalData['PowerDsc_D3']))?$generalData['PowerDsc_D3']:''; ?>">
			</td>
		</tr>		
	</table>
</div>
</div>
<script>
var dataIsSend = false;

function chkValue(){
	var isGo = true;
	var err_dsc = '';
	var ck_array =  ["MediaSwitch","node_server"];
	var err_array =  ["請選擇語音輸出功能!!","請輸入互動連線伺服器網址!!"];
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
			url: 'general/up_GeneralData',
			data: {MediaSwitch:$('#MediaSwitch').val(),node_server:$('#node_server').val(),PowerDsc_A1:$('#PowerDsc_A1').val(),PowerDsc_A2:$('#PowerDsc_A2').val(),PowerDsc_A3:$('#PowerDsc_A3').val(),PowerDsc_B1:$('#PowerDsc_B1').val(),PowerDsc_B2:$('#PowerDsc_B2').val(),PowerDsc_B3:$('#PowerDsc_B3').val(),PowerDsc_C1:$('#PowerDsc_C1').val(),PowerDsc_C2:$('#PowerDsc_C2').val(),PowerDsc_C3:$('#PowerDsc_C3').val(),PowerDsc_D1:$('#PowerDsc_D1').val(),PowerDsc_D2:$('#PowerDsc_D2').val(),PowerDsc_D3:$('#PowerDsc_D3').val()},
			type:"POST",
			error: function(xhr) {
				chkValue();
			},
			success: function(response) {
				alert("存檔完畢!!");
			}
		});
	}
	
	if(err_dsc !=''){
		alert(err_dsc);
	}
}
</script>