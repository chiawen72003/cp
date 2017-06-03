<?php
$speech_data = $_POST["getData"];//對話字串
$dscArray = $_POST["dscArray"];//用來比對的詞彙字串
$max_value = 0;
$return_value = 0;

if($speech_data !='' and $dscArray !='' ){
require_once("document_document_sim.php");
$dscArray_array = explode("<tw>",$dscArray);
$speech_data = explode("<tw>",$speech_data);
foreach($speech_data as $value){
	for($x=0;$x<count($dscArray_array);$x++){
		$term1=$value;
		$term2=$dscArray_array[$x];
		document_document_txt($term1,$term2);
		$str=file_get_contents("./output/document1.txt");
		$txt_vector_1=document_vector($str,"300","lsa_term","lsa_u","lsa_s","lsa_v"); //計算文件的語意向量
		$str2=file_get_contents("./output/document2.txt");
		$txt_vector_2=document_vector($str2,"300","lsa_term","lsa_u","lsa_s","lsa_v"); //計算文件的語意向量
		$getValue = document_sim($txt_vector_1,$txt_vector_2,$term1,$term2);
		if($getValue<0){
			
		}else{
			$return_value = $return_value + $getValue;
		}
	}
}

	echo $return_value;
}
// 文件斷詞          
function document_document_txt($term1,$term2){
         $document1=$term1;
         $document1= mb_convert_encoding($document1, "big5","utf-8"); 
         $fp=fopen("./input/document1.txt","w");
         fputs($fp,$document1);
         fclose($fp);
         $document2=$term2;
         $document2= mb_convert_encoding($document2, "big5","utf-8"); 
         $fp=fopen("./input/document2.txt","w");
         fputs($fp,$document2);
         fclose($fp);
         exec('java -jar CkipClient.jar ckipsocket.propeties input output');
} 
?>
    