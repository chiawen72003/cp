<?php
function segmation_str($new_txt){
         $new_txt=str_replace('COLONCATEGORY','',$new_txt);
         $new_txt=str_replace('COMMACATEGORY','',$new_txt);
         $new_txt=str_replace('DASHCATEGORY','',$new_txt);
         $new_txt=str_replace('ETCCATEGORY','',$new_txt);
         $new_txt=str_replace('EXCLANATIONCATEGORY','',$new_txt);
         $new_txt=str_replace('EXCLAMATIONCATEGORY','',$new_txt);         
         $new_txt=str_replace('PARENTHESISCATEGORY','',$new_txt);
         $new_txt=str_replace('PAUSECATEGORY','',$new_txt);
         $new_txt=str_replace('PERIODCATEGORY','',$new_txt);
         $new_txt=str_replace('QUESTIONCATEGORY','',$new_txt);
         $new_txt=str_replace('SEMICOLONCATEGORY','',$new_txt);
         $new_txt=str_replace('SPCHANGECATEGORY','',$new_txt);
         $new_txt=str_replace('POST','',$new_txt);
         $new_txt=str_replace('ADV','',$new_txt);
         $new_txt=str_replace('ASP','',$new_txt);         
         $new_txt=str_replace('DET','',$new_txt);         
         $new_txt=str_replace('Nv','',$new_txt);         
         $new_txt=str_replace('Vi','',$new_txt);
         $new_txt=str_replace('Vt','',$new_txt);
         $new_txt=str_replace('FW','',$new_txt);         
         $new_txt=str_replace('A','',$new_txt);
         $new_txt=str_replace('C','',$new_txt);
         $new_txt=str_replace('N','',$new_txt);
         $new_txt=str_replace('M','',$new_txt);
         $new_txt=str_replace('T','',$new_txt);
         $new_txt=str_replace('P','',$new_txt);
         $new_txt=str_replace('(','',$new_txt);       
         $new_txt=str_replace(')　',',',$new_txt);
         $new_txt=str_replace(')','',$new_txt);
         $new_txt=str_replace('　','',$new_txt);
         $new_txt=str_replace('，','',$new_txt);
         $new_txt=str_replace('...','',$new_txt); 
         $new_txt=str_replace('、','',$new_txt);
         $new_txt=str_replace('。','',$new_txt);  
         $new_doc= explode(",",$new_txt);
         return $new_doc;                             
}
?>
