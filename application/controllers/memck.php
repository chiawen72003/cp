<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*	人員登入介面
*	index() 學生登入
*	index_ta() 教師登入
*	index_ad() 管理員登入
*	LoginCheck() 學生登入資料驗證
*	LoginCheck_ta() 教師登入資料驗證
*	LoginCheck_ad() 管理員登入資料驗證
*	logout() 登出
*	getVerificationPic() 產生一個驗整碼圖片
*/
class Memck extends CI_Controller {
	public $msg = "";//提示訊息

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->helper(array('url','form'));
		
		$this->load->model('memck/membercheck', 'membercheck');
		$this->load->model('publicfunction/verificationpic', 'verificationpic');//產生圖片驗證碼
	}

	public function index()
	{	
		if( $this->session->userdata("loginType") > "" ){
			redirect('/questionslist/', 'refresh');
		}
		
		$data['base']= $this->config->item('base_url');
		$data['formPath'] = "memck/LoginCheck";			
		$data['verificationpic'] = $this->verificationpic->get_VerificationPic();//驗證碼圖片
		$this->load->view('memck/login',$data);
	}

	public function taLogin()
	{	
		if( $this->session->userdata("loginType") > "" ){
			redirect('/questionslist/', 'refresh');
		}
		
		$data['base']= $this->config->item('base_url');
		$data['formPath'] = "memck/LoginCheck_ta";			
		$data['verificationpic'] = $this->verificationpic->get_VerificationPic();//驗證碼圖片
		$this->load->view('memck/login_ta',$data);
	}

	public function adLogin()
	{	
		if( $this->session->userdata("loginType") > "" ){
			redirect('/questionslist/', 'refresh');
		}
		
		$data['base']= $this->config->item('base_url');
		$data['formPath'] = "memck/LoginCheck_ad";			
		$data['verificationpic'] = $this->verificationpic->get_VerificationPic();//驗證碼圖片
		$this->load->view('memck/login_root',$data);
	}
	
	public function LoginCheck(){
		//if( $this->input->post('mycode') == $this->session->userdata("VerificationPicValue")){	
			$chkType = FALSE;	
			$isOk=false;
			$whereArray = array();
			if($this->input->post('username') >'' && $this->input->post('password') >''){
				$whereArray = array(
					'is_del'=>'0',
					'loginId'=>$this->input->post('username'),
					'pw'=>base64_encode($this->input->post('password'))
				);
				$isOk = $this->membercheck->studentLoginCheck($whereArray);
				if($isOk){	
					echo 'testlist';//頁面轉向路徑		
				}else{
					echo 'error';
				}
			}
		//}else{
		//	echo 'codeErr';
		//}
	}
	
	public function LoginCheck_ad(){
		//if( $this->input->post('mycode') == $this->session->userdata("VerificationPicValue")){
			$chkType = FALSE;	
			$isOk=false;
			$whereArray = array();
			if($this->input->post('username') >'' && $this->input->post('password') >''){
				$whereArray = array(
				'loginId'=>$this->input->post('username'),
				'pw'=>base64_encode($this->input->post('password'))
				);
				$isOk = $this->membercheck->rootLoginCheck($whereArray);
				if($isOk){
					session_start();
					$_SESSION['tw_shop_ckfiner_key'] = 'get_key';
					$_SESSION['tw_shop_dirroot'] =  $this->config->item('base_url').'public/';
					echo 'modellist/';//頁面轉向路徑
				}else{
					echo 'error';
				}
			}
		//}else{
		//	echo 'codeErr';
		//}
	}

	public function LoginCheck_ta(){
		//if( $this->input->post('mycode') == $this->session->userdata("VerificationPicValue")){
			$chkType = FALSE;	
			$isOk=false;
			$whereArray = array();
			if($this->input->post('username') >'' && $this->input->post('password') >''){
				$whereArray = array(
				'loginId'=>$this->input->post('username'),
				'pw'=>base64_encode($this->input->post('password'))
				);
				$isOk = $this->membercheck->teacherLoginCheck($whereArray);
				if($isOk){
					session_start();
					$_SESSION['tw_shop_ckfiner_key'] = 'get_key';
					$_SESSION['tw_shop_dirroot'] =  $this->config->item('base_url').'public/';
					echo 'modellist/';//頁面轉向路徑
				}else{
					echo 'error';
				}
			}
		//}else{
		//	echo 'codeErr';
		//}
	}
	
	public function logout(){
		$getData = array(
			'loginType'=>'',
			'userName'=>'',
			'userID'=>'',
		);
		$this->session->unset_userdata($getData);
		session_start();
		$_SESSION['tw_shop_ckfiner_key'] = '';
		$_SESSION['tw_shop_dirroot'] =  '';
		
		session_destroy();
		redirect('/memck/', 'refresh');	
	}
	
	public function logout_admin(){
		$getData = array(
			'loginType'=>'',
			'userName'=>'',
			'userID'=>'',
		);
		$this->session->unset_userdata($getData);
		session_start();
		$_SESSION['tw_shop_ckfiner_key'] = '';
		$_SESSION['tw_shop_dirroot'] =  '';
		
		session_destroy();
		redirect('/memck/adLogin', 'refresh');	
	}
	
	public function logout_teacher(){
		$getData = array(
			'loginType'=>'',
			'userName'=>'',
			'userID'=>'',
		);
		$this->session->unset_userdata($getData);
		session_start();
		$_SESSION['tw_shop_ckfiner_key'] = '';
		$_SESSION['tw_shop_dirroot'] =  '';
		
		session_destroy();
		redirect('/memck/taLogin', 'refresh');	
	}	
	
	public function getVerificationPic(){
		echo $this->verificationpic->get_VerificationPic();
	}
	
}
