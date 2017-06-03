<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!--
Copyright: Darren Hester 2006, http://www.designsbydarren.com
License: Released Under the "Creative Commons License", 
http://creativecommons.org/licenses/by-nc/2.5/
-->

<head>

<!-- Meta Data -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Short description of your site here." />
<meta name="keywords" content="keywords, go, here, seperated, by, commas" />

<!-- Site Title -->
<title>潛在語意分析應用</title>

<!-- Link to Style External Sheet -->
<link href="css/style.css" type="text/css" rel="stylesheet" />

<style type="text/css">
<!--
.style11 {
	font-family: "微軟正黑體";
	font-weight: bold;
}
.style2 {font-size: 16px}
a:link {
	color: #999999;
}
a:visited {
	color: #999999;
}
a:hover {
	color: #0000FF;
}
.style15 {font-size: 16px; font-weight: bold; }
.style16 {	font-size: 18px;
	font-family: "微軟正黑體";
	font-weight: bold;
}
.style17 {font-size: 13px}
.style19 {font-size: 12px; }
.style23 {font-size: 12px; font-weight: bold; }
.style4 {font-size: 18px; font-family: "Times New Roman", Times, serif; }
.style5 {font-size: 18px;
	font-family: "微軟正黑體";
}
.style24 {font-size: 14px}
.style25 {font-size: 12px; font-weight: bold; color: #999999; }
-->
</style>
</head>

<body>

<div id="page_wrapper">
  <div id="content">

<h3>詞句語意關聯</h3>
<div class='featurebox_center'>
  <form id="form1" name="form1" method="post" action="LSA_pairwise_comparison.php">
    <label></label>
    <div align="center">
      <select name="corpus" class="style5">
        <option value="child_corpus">兒童語意空間</option>
        <option value="child_corpus_narrative">兒童語意空間(記敘文體)</option>
        <option value="asbc_corpus">成人語意空間(中研院語料庫)</option>
        <option value="eng_child_corpus">英文兒童語意空間</option>
        <option value="eng_high_school_corpus">英文語意空間(國中)</option>
      </select>
    </div>
    <p>&nbsp;</p>
    <div align="center">
      <table width="502" border="0" align="center">
        <tr>
          <td width="207"><span class="style4">Comparison Type</span></td>
          <td width="70"><select name="select" size="1" class="style5">
              <option value="term to term">詞彙與詞彙</option>
              <option value="term to document">詞彙與文件</option>
              <option value="document to document" selected>文件與文件</option>
          </select></td>
          <td width="211">&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style4">Dimension </span></td>
          <td><select name="select2" size="1" class="style4">
              <option value="300" selected>300</option>
              <option value="200">200</option>
              <option value="100">100</option>
          </select></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center"><span class="style5">詞彙或文件1</span></div></td>
          <td>&nbsp;</td>
          <td><div align="center"><span class="style5">詞彙或文件2</span></div></td>
        </tr>

        <tr>
          <td><textarea name="text1" rows="8">教師</textarea></td>
          <td>&nbsp;</td>
          <td><textarea name="text2" rows="8">學生</textarea></td>
        </tr>
        <tr>
          <td colspan="3"><label></label>
              <p align="left" class="style2">Word to Word: 教師 vs. 學生 </p>
              <p align="left" class="style2">Word to Document: 月亮 vs. 中秋節全家一起賞月</p></td>
        </tr>
      </table>
      <p>
        <input type="submit" name="Submit" value="送出" />
      </p>
      <p><span class="style24">
      <?php
$dimension=$_POST['select2'];
$term1=$_POST["text1"];
$term2=$_POST["text2"];
$corpus=$_POST["corpus"];
switch($corpus){
       case "child_corpus":
             $database_term_table="child_corpus_term";
             $database_svd_u_table="child_corpus_svd_u";
             $database_svd_s_table="child_corpus_svd_s";
             $database_svd_v_table="child_corpus_svd_v";
       break;
       case "child_corpus_narrative":
             $database_term_table="child_corpus_narration_term";
             $database_svd_u_table="child_corpus_narration_svd_u";
             $database_svd_s_table="child_corpus_narration_svd_s"; 
             $database_svd_v_table="child_corpus_narration_svd_v";                       
       break;
       case "asbc_corpus":
             $database_term_table="asbc_corpus_term";
             $database_svd_u_table="asbc_corpus_svd_u";
             $database_svd_s_table="asbc_corpus_svd_s";
             $database_svd_v_table="asbc_corpus_svd_v";
       break;
       case "eng_child_corpus":
             $database_term_table="eng_child_corpus_term";
             $database_svd_u_table="eng_child_corpus_svd_u";
             $database_svd_s_table="eng_child_corpus_svd_s";
             $database_svd_v_table="eng_child_corpus_svd_v";          
       break;
       case "eng_high_school_corpus":
             $database_term_table="eng_high_school_corpus_term";
             $database_svd_u_table="eng_high_school_corpus_svd_u";
             $database_svd_s_table="eng_high_school_corpus_svd_s";
             $database_svd_v_table="eng_high_school_corpus_svd_v";       
       break;            
}
switch ($_POST['select']){
       case "term to term":
            require_once("term_term_sim.php");
            term_term_sim($term1,$term2,$dimension,$database_term_table,$database_svd_u_table,$database_svd_s_table,$database_svd_v_table);              // 計算詞彙之間的語意相似度 function term_sim
            break;
       case "term to document":
            require_once("term_document_sim.php");
            term_document_sim($term1,$term2,$dimension,$database_term_table,$database_svd_u_table,$database_svd_s_table,$database_svd_v_table);     //計算詞彙與文件的語意相似度
            break;
       case "document to document":
            require_once("document_document_sim.php");
            document_document_txt($term1,$term2);
            $str=file_get_contents("./output/document1.txt");
            $txt_vector_1=document_vector($str,$dimension,"lsa_term","lsa_u","lsa_s","lsa_v"); //計算文件的語意向量
            $str2=file_get_contents("./output/document2.txt");
            $txt_vector_2=document_vector($str2,$dimension,"lsa_term","lsa_u","lsa_s","lsa_v"); //計算文件的語意向量
            document_sim($txt_vector_1,$txt_vector_2,$term1,$term2);
            break;
}
?>
      <?php
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
      </span></p>
    </div>
  </form>
  </div>

</div>

<div id="footer"></div>
</div>

</body>

</html>