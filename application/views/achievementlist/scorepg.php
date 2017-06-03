<table width="100%" class="record">
<tr><td>學號:<?php echo $scoreData['student_id'];?></td></tr>
<tr><td>班級:<?php echo $scoreData['classDsc'];?></td></tr>
<tr><td>姓名:<?php echo $scoreData['student_name'];?></td></tr>
<tr><td  height="20px" ></td></tr>
<!--
<tr><td  align="center" ><h1>團隊合作核心能力</td></tr>
<tr>
	<td>
	<table width="100%" class="record_list">
		<tr class="title">
			<td width="80%" align="center" >團隊合作核心能力</td>
			<td width="10%" align="center" >答對率</td>
			<td width="10%" align="center" >階段</td>
		</tr>
		<tr>
			<td align="center">建立及維持相互的理解</td>
			<td align="center"><?php echo $m0;?></td>
			<td align="center">
			<?php 
			if(is_numeric($m0)){
				if($m0 < 0.5){
					echo '待加強';
				}else if($m0 >= 0.8){
					echo '精熟';
				}else{
					echo '基礎';
				}		
			}
			?>		
			</td>
		</tr>
		<tr>
			<td align="center">採取適當的行動解決問題</td>
			<td align="center"><?php echo $m1;?></td>
			<td align="center">
			<?php 
			if(is_numeric($m1)){
				if($m1 < 0.5){
					echo '待加強';
				}else if($m1 >= 0.8){
					echo '精熟';
				}else{
					echo '基礎';
				}		
			}
			?>		
			</td>		
		</tr>
		<tr>
			<td align="center">建立及維持團隊合作</td>
			<td align="center"><?php echo $m2;?></td>
			<td align="center">
			<?php 
			if(is_numeric($m2)){
				if($m2 < 0.5){
					echo '待加強';
				}else if($m2 >= 0.8){
					echo '精熟';
				}else{
					echo '基礎';
				}		
			}
			?>		
			</td>		
			
		</tr>	
	</table>
	</td>
</tr>
<tr><td  height="40px" ></td></tr>
<tr><td  align="center" ><h1>問題解決認知行為歷程</h1></td></tr>
<tr><td  >
<table width="100%"  class="record_list">
	<tr class="title">
		<td width="80%" align="center" >問題解決認知行為歷程</td>
		<td width="10%" align="center" >答對率</td>
		<td width="10%" align="center" >階段</td>
		
	</tr>
	<tr>
		<td align="center">探究及理解</td>
		<td align="center"><?php echo $m3;?></td>
		<td align="center">
		<?php 
		if(is_numeric($m3)){
			if($m3 < 0.5){
				echo '待加強';
			}else if($m3 >= 0.8){
				echo '精熟';
			}else{
				echo '基礎';
			}		
		}
		?>		
		</td>		
		
	</tr>
	<tr>
		<td align="center">表達及系統性闡述</td>
		<td align="center"><?php echo $m4;?></td>
		<td align="center">
		<?php 
		if(is_numeric($m4)){
			if($m4 < 0.5){
				echo '待加強';
			}else if($m4 >= 0.8){
				echo '精熟';
			}else{
				echo '基礎';
			}		
		}
		?>		
		</td>
	</tr>
	<tr>
		<td align="center">計畫並執行</td>
		<td align="center"><?php echo $m5;?></td>
		<td align="center">
		<?php 
		if(is_numeric($m5)){
			if($m5 < 0.5){
				echo '待加強';
			}else if($m5 >= 0.8){
				echo '精熟';
			}else{
				echo '基礎';
			}		
		}
		?>		
		</td>		
	</tr>	
	<tr>
		<td align="center">監控及反思</td>
		<td align="center"><?php echo $m6;?></td>
		<td align="center">
		<?php 
		if(is_numeric($m6)){
			if($m6 < 0.5){
				echo '待加強';
			}else if($m6 >= 0.8){
				echo '精熟';
			}else{
				echo '基礎';
			}		
		}
		?>		
		</td>
	</tr>	
</table>
</td></tr>
-->
<tr><td  height="40px" ></td></tr>
<tr><td  align="center" ><h1>合作問題解決能力素養</h1></td></tr>
<tr><td  >
<table width="100%" border="1" class="record_list">
<tr class="title">
	<td width="80%" align="center" >合作問題解決能力素養</td>
	<td width="10%" align="center" >得分</td>
	<td width="10%" align="center" >階段</td>
</tr>

<tr>
	<td><?php echo isset($powerDsc['PowerDsc_A1'])?$powerDsc['PowerDsc_A1']:''; ?></td>
	<td><?php echo isset($scoreData['scoreList'][0])?$scoreData['scoreList'][0]:''; ?></td>
	<td align="center">	
	</td>
</tr>
<tr>
	<td><?php echo isset($powerDsc['PowerDsc_B1'])?$powerDsc['PowerDsc_B1']:''; ?></td>
	<td><?php echo isset($scoreData['scoreList'][3])?$scoreData['scoreList'][3]:''; ?></td>
	<td align="center"></td>
</tr>
<tr>
	<td><?php echo isset($powerDsc['PowerDsc_C1'])?$powerDsc['PowerDsc_C1']:''; ?></td>
	<td><?php echo isset($scoreData['scoreList'][6])?$scoreData['scoreList'][6]:''; ?></td>
	<td align="center"></td>
</tr>
<tr>
	<td><?php echo isset($powerDsc['PowerDsc_D1'])?$powerDsc['PowerDsc_D1']:''; ?></td>
	<td><?php echo isset($scoreData['scoreList'][9])?$scoreData['scoreList'][9]:''; ?></td>
	<td align="center"></td>
</tr>
<tr>
	<td><?php echo isset($powerDsc['PowerDsc_A2'])?$powerDsc['PowerDsc_A2']:''; ?></td>
	<td><?php echo isset($scoreData['scoreList'][1])?$scoreData['scoreList'][1]:''; ?></td>
	<td align="center"></td>
</tr>
<tr>
	<td><?php echo isset($powerDsc['PowerDsc_B2'])?$powerDsc['PowerDsc_B2']:''; ?></td>
	<td><?php echo isset($scoreData['scoreList'][4])?$scoreData['scoreList'][4]:''; ?></td>
	<td align="center"></td>
</tr>
<tr>
	<td><?php echo isset($powerDsc['PowerDsc_C2'])?$powerDsc['PowerDsc_C2']:''; ?></td>
	<td><?php echo isset($scoreData['scoreList'][7])?$scoreData['scoreList'][7]:''; ?></td>
	<td align="center"></td>
</tr>
<tr>
	<td><?php echo isset($powerDsc['PowerDsc_D2'])?$powerDsc['PowerDsc_D2']:''; ?></td>
	<td><?php echo isset($scoreData['scoreList'][10])?$scoreData['scoreList'][10]:''; ?></td>
	<td align="center"></td>
</tr>
<tr>
	<td><?php echo isset($powerDsc['PowerDsc_A3'])?$powerDsc['PowerDsc_A3']:''; ?></td>
	<td><?php echo isset($scoreData['scoreList'][2])?$scoreData['scoreList'][2]:''; ?></td>
	<td align="center"></td>
</tr>
<tr>
	<td><?php echo isset($powerDsc['PowerDsc_B3'])?$powerDsc['PowerDsc_B3']:''; ?></td>
	<td><?php echo isset($scoreData['scoreList'][5])?$scoreData['scoreList'][5]:''; ?></td>
	<td align="center"></td>
</tr>
<tr>
	<td><?php echo isset($powerDsc['PowerDsc_C3'])?$powerDsc['PowerDsc_C3']:''; ?></td>
	<td><?php echo isset($scoreData['scoreList'][8])?$scoreData['scoreList'][8]:''; ?></td>
	<td align="center"></td>
</tr>
<tr>
	<td><?php echo isset($powerDsc['PowerDsc_D3'])?$powerDsc['PowerDsc_D3']:''; ?></td>
	<td><?php echo isset($scoreData['scoreList'][11])?$scoreData['scoreList'][11]:''; ?></td>
	<td align="center"></td>
</tr>
</table>
</td></tr>
</table>