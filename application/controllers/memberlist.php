<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*	成員管理(包含新增、編輯、刪除)
*	index() 教師列表
*	student_list() 學生列表
*	insert_TA() 新增一筆教師資料
*	update_TA() 更新一筆教師資料
*	check_loginID() 檢查教師帳號是否重複
*/

class Memberlist extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->helper(array('url','form'));
		
		$this->load->model('publicfunction/sqlfunction', 'sqlfunction');
		$this->load->model('memberlist/memberlist_model');
		if($this->session->userdata("loginType") != "root" and $this->session->userdata("loginType") != "teacher"){
			redirect('/memck/logout','refresh');
		}
	}
	
	public function index()
	{
		$this->load->library('pagination');

		$this->load->library('layout');//套用樣板為layout_main
		if($this->session->userdata("loginType") == "teacher"){
			$this->layout->setLayout('layout/back/layout_ta');//套用樣板
		}
		if($this->session->userdata("loginType") == "root"){
			$this->layout->setLayout('layout/back/layout_root');//套用樣板
		}

		$data = array();
		$data['base'] = $this->config->item('base_url');
		
		//處理分頁
		$whereArray = array(
			'is_del'=>'0',
		);
		if($this->session->userdata("loginType") == "teacher"){
			$whereArray = array();
			$whereArray['user_type'] = 'teacher';
			$whereArray['user_num'] = $this->session->userdata("userID");		
		}
		
		$orderByArray = array('num'=>'DESC');
		$offsetDsc = 0;//目前頁面數
		$limitDsc = 10;//一頁顯示幾筆資料
		$data['offsetDsc'] = '';
		
		if(is_numeric($this->input->get('per_page'))){
			$offsetDsc = $this->input->get('per_page');
			$data['offsetDsc'] = $offsetDsc;			
		}
		
		$allNum = $this->sqlfunction->get_allDataNum('teacher_data',$whereArray);//總資料數量
		$config['base_url'] = $data['base'].'index.php/memberlist/index/?xx=';
		$config['total_rows'] = $allNum;
		$config['per_page'] = $limitDsc;
		$config['page_query_string'] = true;
/* 		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['cur_tag_open'] = '<li class="current"><a>';//目前頁面左邊標籤。
		$config['cur_tag_close'] = '</a></li>';//目前頁面右邊標籤。
		$config['num_tag_open'] = '<li>';//分頁數字連結左邊標籤。
		$config['num_tag_close'] = '</li>';//分頁數字連結右邊標籤。
		$config['next_tag_open'] = '<li class="arrow">';//下一頁連結左邊標籤。
		$config['next_tag_close'] = '</li>';//下一頁連結右邊標籤。		
		$config['prev_tag_open'] = '<li class="arrow unavailable">';//上一頁連結左邊標籤。
		$config['prev_tag_close'] = '</li>';//上一頁連結右邊標籤。	
		$config['next_tag_open'] = '<li class="arrow">';//下一頁連結左邊標籤。
		$config['next_tag_close'] = '</li>';//下一頁連結右邊標籤。		
		$config['first_tag_open'] = '<li >';//第一頁連結左邊標籤。
		$config['first_tag_close'] = '</li>';//第一頁連結右邊標籤。		
		$config['last_tag_open'] = '<li>';//最後一頁連結左邊標籤。
		$config['last_tag_close'] = '</li>';//最後一頁連結右邊標籤。 */		
		$this->pagination->initialize($config);
		
		//取出所需資料
		$data['listData'] = $this->memberlist_model->get_ListData($whereArray,$limitDsc,$offsetDsc,$orderByArray);
		$data['pagination'] = $this->pagination->create_links();//ci產生的分頁html code
		
		$this->layout->view('memberlist/index',$data);
	}
	
	public function check_loginID(){
		$get_LoginID = $this->input->post('getID');
		$check_result = $this->memberlist_model->is_same($get_LoginID);
		if($check_result){
			echo 'error';
		}else{
			echo 'ok';
		}
	}
	
	public function insert_TA(){
		$get_ID = $this->input->post('ID');
		$get_PW = $this->input->post('PW');
		$get_NAME = $this->input->post('NAME');
		if( $get_ID > '' and $get_PW > '' and $get_NAME > '' ){
			$this->memberlist_model->insert_TA_data($get_ID,$get_PW,$get_NAME);
		}
	}
	
	public function update_TA(){
		$get_PW = $this->input->post('PW');
		$get_NAME = $this->input->post('NAME');
		$get_NUM = $this->input->post('NUM');
		if( is_numeric($get_NUM) and  $get_PW > '' and $get_NAME > '' ){
			$this->memberlist_model->update_TA_data($get_NUM,$get_PW,$get_NAME);
		}
	}
	
	public function del_TA(){
		$get_NUM = $this->input->post('NUM');
		if( is_numeric($get_NUM) ){
			$this->memberlist_model->del_teacher($get_NUM);
		}
	}
}
