<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*	班級管理介面
*	addClass_Page() 新增班級頁面
*	editClass_Page() 修改班級頁面
*	editClassPeople_Page() 修改班級學生資料頁面
*	setClassData() 新增或更新班級資料
*	del_CL() 刪除一筆班級資料
*	insertExcel() 上傳一個班級的學生資料
*/

class Classlist extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->helper(array('url','form'));
		
		$this->load->model('classlist/classlist_model');
		$this->load->model('publicfunction/sqlfunction', 'sqlfunction');
		if( $this->session->userdata("loginType") == "root" OR $this->session->userdata("loginType") == "teacher"){
			
		}else{		
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
			$whereArray['user_type'] = 'teacher';
			$whereArray['user_num'] = $this->session->userdata("userID");		
		}

		//如果是管理員，依照選擇的教師去撈資料
		if($this->session->userdata("loginType") == "root"){
			$whereArray['user_type'] = 'teacher';
			$whereArray['user_num'] = $this->session->userdata("tempTeacherNum");
			$data['teacherList'] = $this->classlist_model->getTeacherList();
		}
		
		$orderByArray = array('num'=>'DESC');
		$offsetDsc = 0;//目前頁面數
		$limitDsc = 10;//一頁顯示幾筆資料
		$data['offsetDsc'] = '';
		
		if(is_numeric($this->input->get('per_page'))){
			$offsetDsc = $this->input->get('per_page');
			$data['offsetDsc'] = $offsetDsc;			
		}
		
		$allNum = $this->sqlfunction->get_allDataNum('class_list',$whereArray);//總資料數量
		$config['base_url'] = $data['base'].'index.php/classlist/index/?xx=';
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
		$data['listData'] = $this->classlist_model->getListData($whereArray,$limitDsc,$offsetDsc,$orderByArray);
		$data['classPeople'] = $this->classlist_model->getClassPeople($data['listData']);//班級人數
		$data['pagination'] = $this->pagination->create_links();//ci產生的分頁html code

		
		$this->layout->view('classlist/index',$data);
	}
	
		public function addClass_Page()
	{
		$this->load->library('layout');//套用樣板為layout_main
		if($this->session->userdata("loginType") == "teacher"){
			$this->layout->setLayout('layout/back/layout_ta');//套用樣板
		}
		if($this->session->userdata("loginType") == "root"){
			$this->layout->setLayout('layout/back/layout_root');//套用樣板
		}

		$data = array();
		$data['base'] = $this->config->item('base_url');
		
		$this->layout->view('classlist/editpg',$data);
	}
	
		public function editClass_Page()
	{
		if(is_numeric($this->input->get('num'))){
			$getID = $this->input->get('num');
			$offsetDsc = $this->input->get('pg');
			
			$this->load->library('layout');//套用樣板為layout_main
			if($this->session->userdata("loginType") == "teacher"){
				$this->layout->setLayout('layout/back/layout_ta');//套用樣板
			}
			if($this->session->userdata("loginType") == "root"){
				$this->layout->setLayout('layout/back/layout_root');//套用樣板
			}

			$data = array();
			$data['base'] = $this->config->item('base_url');
			$data['dataList'] = $this->classlist_model->getData($getID);
			$data['num'] = $getID;
			$data['offsetDsc'] = $offsetDsc;
			
			$this->layout->view('classlist/editpg',$data);			
		}	
	}
	
		public function editClassPeople_Page()
	{
		if(is_numeric($this->input->get('num'))){
			$getID = $this->input->get('num');//選擇班級的num
			$f_pg = $this->input->get('f_pg');//班級管理的分頁
			
			$this->load->library('layout');//套用樣板為layout_main
			if($this->session->userdata("loginType") == "teacher"){
				$this->layout->setLayout('layout/back/layout_ta');//套用樣板
			}
			if($this->session->userdata("loginType") == "root"){
				$this->layout->setLayout('layout/back/layout_root');//套用樣板
			}

			$data = array();
			$data['base'] = $this->config->item('base_url');
			$data['listData'] = $this->classlist_model->getPeopleData($getID);
			$data['num'] = $getID;
			$data['f_pg'] = $f_pg;
			if($this->session->userdata("loginType") == "teacher"){
				$data['sCode'] = $this->session->userdata("sCode");
			}
			if($this->session->userdata("loginType") == "root"){
				$data['sCode'] = $this->session->userdata("tempTeacherCode");
			}
			$this->layout->view('classlist/index_p',$data);			
		}	
	}	
	
		public function setClassData()
	{
		$num = $this->input->post('num');
		$offsetDsc = $this->input->post('offsetDsc');
		
		if( $num == ''){
			$this->classlist_model->insertClassData();
		}else{
			$this->classlist_model->updateClassData($num);
		}
		redirect('/classlist/index?per_page='.$offsetDsc, 'refresh');
	}

	
		public function del_CL()
	{
		$num = $this->input->post('keyNum');
		if( is_numeric($num) ){
			$this->classlist_model->del_class($num);
		}
	}
	
		public function insert_ST()
	{
		$get_PW = $this->input->post('PW');
		$get_NAME = $this->input->post('NAME');
		$get_ID = $this->input->post('ID');
		$get_SEX = $this->input->post('SEX');
		$get_CLS = $this->input->post('CLS');
		if( is_numeric($get_CLS) and  $get_PW > '' and $get_NAME > '' and $get_ID > '' and $get_SEX > '' ){
			$this->classlist_model->insert_ST_data($get_CLS,$get_PW,$get_NAME,$get_ID,$get_SEX);
		}
	}
		public function update_ST()
	{
		$get_PW = $this->input->post('PW');
		$get_NAME = $this->input->post('NAME');
		$get_NUM = $this->input->post('NUM');
		$get_ID = $this->input->post('ID');
		$get_SEX = $this->input->post('SEX');
		$get_CLS = $this->input->post('CLS');
		if( is_numeric($get_NUM) and  $get_PW > '' and $get_NAME > '' and is_numeric($get_CLS) and $get_ID > '' and $get_SEX > '' ){
			$this->classlist_model->update_ST_data($get_NUM,$get_CLS,$get_PW,$get_NAME,$get_ID,$get_SEX);
		}
	}
	
	public function del_ST()
	{
		$num = $this->input->post('keyNum');
		if( is_numeric($num) ){
			$this->classlist_model->del_Student($num);
		}
	}
	
	public function chgTeacher(){
		$num = $this->input->post('keyNum');
		//如果是管理員，依照選擇的教師去撈資料
		if($this->session->userdata("loginType") == "root"){
			$this->classlist_model->chg_Teacher($num);
		}
	}
	
	public function insertExcel(){
		$num = $this->input->post('num');
		$f_pg = $this->input->post('f_pg');
		if( is_numeric($num) ){
			$this->classlist_model->insert_Excel($num);
		}
		redirect('/classlist/editClassPeople_Page?f_pg='.$f_pg.'&num='.$num,'refresh');

	}
}
