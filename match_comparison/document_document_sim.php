<?php
function document_vector($str,$dimension,$database_term_table,$database_svd_u_table,$database_svd_s_table,$database_svd_v_table){
         require('lsa_conn.php');
         //------------文件的語意結構矩陣 
		//  unlink("D:\wamp\www\LSA\input\document1.txt");
		//  unlink("D:\wamp\www\LSA\output\document1.txt");
         require_once("segmation.php");		
         $new_txt= mb_convert_encoding($str, "utf-8","big5");   //big5轉utf-8
         $new_txt=str_replace(array("\r","\n"),'',$new_txt);    //去除txt檔的換行符號
         $new_doc=segmation_str($new_txt);
         $i=0;
         $j=1;
         $term_id[$j]=0;
         while ($i<=count($new_doc)){
               mysql_query('SET NAMES utf8');                    // 解決網頁顯示中文字是亂碼
               mysql_query('SET CHARACTER_SET_CLIENT=utf8');     // 解決網頁顯示中文字是亂碼
               mysql_query('SET CHARACTER_SET_RESULTS=utf8');    // 解決網頁顯示中文字是亂碼                    // 解決網頁顯示中文字是亂碼
               $sql="SELECT * from $database_term_table WHERE word= binary '$new_doc[$i]'";
               $result=mysql_query($sql) or die($sql);
               $num=mysql_num_rows($result);
               if ($num!=0){
                  $row=mysql_fetch_array($result);
                  $location=$row['id'];
                  $result2=array_search($location,$term_id);
                  if ($result2!=0){
                     $vector[$result2]=$vector[$result2]+1;      //計算詞頻
                     $new_vector[$result2]=log($vector[$result2]+1)*$row['global_weight'];     //計算權重
                  }else{
                   $term_id[$j]=$location;
                   $vector[$j]=$vector[$j]+1;   //計算詞頻
                   $new_vector[$j]=log($vector[$j]+1)*$row['global_weight'];                   //計算權重
                   $j++;
                  }                    
               }           
               $i++;
         } 
         // 計算新的文件向量     
         $i=1;
         while($i<=count($new_vector)){
              $sql2="SELECT * from $database_svd_u_table  where id='$term_id[$i]'";
              $result2=mysql_query($sql2) or die("無法執行SQL3");
              $row2=mysql_fetch_array($result2);   
              for($k=1;$k<=$dimension;$k++){
                 $document_vector[$k][$i]=$new_vector[$i]*$row2[$k];
              }    
              $i++;
         }
         for ($i=1;$i<=$dimension;$i++){
             $doc_vector[$i]=array_sum($document_vector[$i]);
         }
         $sql="SELECT * from $database_svd_v_table";
         $result=mysql_query($sql) or die("無法執行SQL4");
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
         $txt_vector[txt_vector]=$txt_vector;
         $txt_vector[txt_vector_length]=$txt_vector_length; 
         return $txt_vector;      
}
function document_sim($txt_vector_1,$txt_vector_2,$term1,$term2){
         $document_document_dot=0;
         $doc_vector_1=$txt_vector_1;
         $doc_vector_2=$txt_vector_2;
         for ($i=1;$i<=count($doc_vector_1);$i++){
             $c[$i]=$doc_vector_1[$i]*$doc_vector_2[$i];       
         }
         $document_document_dot=array_sum($c);
         $similarity=$document_document_dot/($txt_vector_1['txt_vector_length']*$txt_vector_2['txt_vector_length']);
         return round($similarity,4);
}



?>