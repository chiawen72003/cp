<?php
function term_term_sim($term1,$term2,$dimension,$database_term_table,$database_svd_u_table,$database_svd_s_table,$database_svd_v_table){
         require('lsa_conn.php');         
         $sql = "SELECT * from $database_term_table WHERE word = binary '$term1' or word = binary '$term2' ";
         mysql_query('SET NAMES utf8');                    // 解決網頁顯示中文字是亂碼
         mysql_query('SET CHARACTER_SET_CLIENT=utf8');     // 解決網頁顯示中文字是亂碼
         mysql_query('SET CHARACTER_SET_RESULTS=utf8');    // 解決網頁顯示中文字是亂碼
         $result = mysql_query($sql) or die("無法執行SQL");
         $num=mysql_num_rows($result);
         if($num<=1){
           echo "$term1"."或"."$term2"."不存在"; 
         }else{
              $i=0;
              while ($row= mysql_fetch_array($result)){
                    $new_id[$i]=$row['id']; 
                    $i++;             
              }
              $sql_u= "SELECT * from $database_svd_u_table WHERE id='$new_id[0]' or id= '$new_id[1]'";
              $sql_s= "SELECT * from $database_svd_s_table ";
              $result_1= mysql_query($sql_u) or die("無法執行SQL");
              $result_2= mysql_query($sql_s) or die("無法執行SQL");
              $row_s=mysql_fetch_row($result_2);
              $i=0;
              while ($row_u=mysql_fetch_row($result_1)){
                    for($j=1;$j<=$dimension;$j++){
                        $u[$i][$j-1]=$row_u[$j];
                        $a[$i][$j-1]=$row_u[$j]*$row_u[$j]*$row_s[$j]*$row_s[$j];                              
                    }
                    $term_norm[$i]=sqrt(array_sum($a[$i]));
                    $i++;
              }
              for($j=1;$j<=$dimension;$j++){
                 $b[$j-1]=$u[0][$j-1]*$row_s[$j]*$row_s[$j]*$u[1][$j-1];     
              }
              $term_product=array_sum($b); 
              $sim=$term_product/($term_norm[0]*$term_norm[1]);
              echo "$term1"."與"."$term2"."的語意關聯度為";
              echo round($sim,3);       
         }      
}
?>
