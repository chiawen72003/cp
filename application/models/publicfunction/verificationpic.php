<?php
/*
* 	get_VerificationPic() 輸出驗證碼圖片
*/
class Verificationpic extends CI_Model {
	public function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->library('session');	
		$this->load->helper('captcha');        //載入驗證碼函式		
    }

	//輸出驗證碼圖片
public function get_VerificationPic(){
//設定網頁基本位址
$base = $this->config->item('base_url');
//rand()取亂數後轉為md5碼，並只取前四碼，str用來小寫轉大寫
$rand = strtoupper(substr(md5(rand()),0,4));
//存入陣列
$session_rand = array("VerificationPicValue"=>$rand);
//紀錄 session
$this->session->set_userdata($session_rand);
$img = array(
'word'                 => $rand,
'img_path'         => './public/images/captcha/',
'img_url'         => $base.'/public/images/captcha/',        //請先建好權限777的 captcha 資料夾
'font_path'        => './public/publicfont/arial.ttf',        //設置字體，避免跑版
'img_width'        => '100',
'expiration'        => 10        //設定圖片刪除時間 = 10秒
);
$rec = create_captcha($img);
return $rec['image']; //輸出img驗證圖片		
}

}