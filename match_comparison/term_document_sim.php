<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
function term_document_sim($term1,$term2,$dimension,$database_term_table,$database_svd_u_table,$database_svd_s_table,$database_svd_v_table){
         require('lsa_conn.php');
         //------計算文章的矩陣
         $document2= mb_convert_encoding($term2, "big5","utf-8"); 
         $fp=fopen("D:/wamp/www/LSA/input/document.txt","w");
         fputs($fp,$document2);
         fclose($fp);
         exec('java -jar CkipClient.jar ckipsocket.propeties input output');
         $str=file_get_contents("D:\wamp\www\LSA\output\document.txt");
         unlink("D:\wamp\www\LSA\input\document.txt");
         unlink("D:\wamp\www\LSA\output\document.txt");
         require("segmation.php");
         $new_txt= mb_convert_encoding($str, "utf-8","big5");   //big5轉utf-8
         $new_doc=segmation_str($new_txt);
         $sql="SELECT * from $database_term_table";
         $result=mysql_query($sql) or die("無法執行SQL");
         $num=mysql_num_rows($result);
         $i=0;   
         while($i<=count($new_doc)){
              mysql_query('SET NAMES utf8');                    // 解決網頁顯示中文字是亂碼
              mysql_query('SET CHARACTER_SET_CLIENT=utf8');     // 解決網頁顯示中文字是亂碼
              mysql_query('SET CHARACTER_SET_RESULTS=utf8');    // 解決網頁顯示中文字是亂碼
              $sql="SELECT * from $database_term_table WHERE word= binary '$new_doc[$i]'";
              $result=mysql_query($sql) or die("無法執行SQL");
              $row= mysql_fetch_array($result);
              $location=$row['id'];
              $vector[$location]=$vector[$location]+1;
              $vector[$location]=log($vector[$location]+1)*$row['global_weight'];
              $sql2="SELECT * from $database_svd_u_table  where id='$location'";
              $result2=mysql_query($sql2) or die("無法執行SQL");
              $row2=mysql_fetch_array($result2);
              for($j=1;$j<=$dimension;$j++){
                 $document_vector[$j][$i]=$vector[$location]*$row2[$j];
              } 
              $i++;                   
         } 
         for ($i=1;$i<=$dimension;$i++){
             $doc_vector[$i]=array_sum($document_vector[$i]);
            // echo $doc_vector[$i]."<br>";
         }
         $sql="SELECT * from $database_svd_v_table";
         $result=mysql_query($sql) or die("無法執行SQL");
         $loop=0;
         $b=0;
         while($row= mysql_fetch_array($result)){
              for($i=1;$i<=$dimension;$i++){
                 $doc_vector2[$i]=$doc_vector[$i]*$row[$i];              
              }     
              $txt_vector[$loop]=array_sum($doc_vector2);
              $a=$txt_vector[$loop]*$txt_vector[$loop];
              $b=$b+$a; 
              $loop++;       
         }
         $txt_vector_length=sqrt($b);
         //--------計算詞彙矩陣
         $sql="SELECT b.* from $database_term_table as a, $database_svd_u_table as b where a.word= binary '$term1' and a.id=b.id";        
         $result=mysql_query($sql) or die("無法執行SQL");
         $row= mysql_fetch_array($result);
         $sql2="SELECT * from $database_svd_s_table";
         $result2=mysql_query($sql2) or die("無法執行SQL");
         $row2= mysql_fetch_array($result2);
         for($i=1;$i<=$dimension;$i++){
            $term_vector[$i]=$row[$i]*$row2[$i];
         }
         $sql="SELECT * from $database_svd_v_table";
         $result=mysql_query($sql) or die("無法執行SQL");
         $num=mysql_num_rows($result);
         $loop=0;
         $b=0;
         while($row= mysql_fetch_array($result)){
              for($i=1;$i<=$dimension;$i++){
                 $term_vector2[$i]=$term_vector[$i]*$row[$i];              
              }     
              $word_vector[$loop]=array_sum($term_vector2);
              $a=$word_vector[$loop]*$word_vector[$loop];
              $b=$b+$a; 
              $loop++;       
         }
         $term_vector_length=sqrt($b);
         //--------計算詞彙與文件之語意相似度(cosine值)
         $term_document_dot=0;
         for ($i=1;$i<=$num;$i++){
             $c=$txt_vector[$i]*$word_vector[$i];
             $term_document_dot=$term_document_dot+$c;
         }
         $similarity=$term_document_dot/($txt_vector_length*$term_vector_length);
        echo $term1."與".$term2."語意關聯度為".round($similarity,4);          
}
?>
