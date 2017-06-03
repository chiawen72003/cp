<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*	後端試題管理介面
*	addQuestions_Page() 新增測試題
*	addPractice_Page() 新增練習題
*	editQuestions_Page() 編輯測試題
*	editQuestions_SharePage() 編輯管理員分享的測驗題目(只能修改受測班級)
*	editPractice_Page() 編輯練習題
*/

class Questionslist extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->helper(array('url','form'));
		
		$this->load->model('questionslist/questionslist_model');
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
			$data['teacherList'] = $this->questionslist_model->getTeacherList();
		}
		
		$orderByArray = array('num'=>'DESC');
		$offsetDsc = 0;//目前頁面數
		$limitDsc = 10;//一頁顯示幾筆資料
		$data['offsetDsc'] = '';
		
		if(is_numeric($this->input->get('per_page'))){
			$offsetDsc = $this->input->get('per_page');
			$data['offsetDsc'] = $offsetDsc;			
		}
		
		$allNum = $this->sqlfunction->get_allDataNum('questions_list',$whereArray);//總資料數量
		$config['base_url'] = $data['base'].'index.php/questionslist/index/?xx=';
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
		$data['listData'] = $this->questionslist_model->getListData($whereArray,$limitDsc,$offsetDsc,$orderByArray);
		$data['pagination'] = $this->pagination->create_links();//ci產生的分頁html code
		$data['modelsName'] = $this->questionslist_model->get_ModelsName();
		$data['classData'] = $this->questionslist_model->get_classData();//該老師下面所有班級的資料
		$data['testClassData'] = $this->questionslist_model->get_TestClassData($data['listData']);//此次驗頁受測班級的資料
		
		$this->layout->view('questionslist/index',$data);
	}
	
		public function addQuestions_Page()
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
		$data['modelsData'] = $this->questionslist_model->get_ModelsData();
		$data['classData'] = $this->questionslist_model->get_classData();
		
		$this->layout->view('questionslist/editpg',$data);
	}
	
		public function editQuestions_Page()
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
			$data['dataList'] = $this->questionslist_model->getData($getID);
			$data['num'] = $getID;
			$data['offsetDsc'] = $offsetDsc;
			$data['modelsData'] = $this->questionslist_model->get_ModelsData();
			$data['classData'] = $this->questionslist_model->get_classData();
			
			$this->layout->view('questionslist/editpg',$data);			
		}	
	}
	
		public function editQuestions_SharePage()
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
			$data['dataList'] = $this->questionslist_model->getData($getID);
			$data['num'] = $getID;
			$data['offsetDsc'] = $offsetDsc;
			$data['modelsData'] = $this->questionslist_model->get_RootModelsData();
			$data['classData'] = $this->questionslist_model->get_classData();
			
			$this->layout->view('questionslist/editpg_share',$data);			
		}	
	}
	
		public function setQuestionsData()
	{
		$num = $this->input->post('num');
		$offsetDsc = $this->input->post('offsetDsc');
		
		if( $num == ''){
			$this->questionslist_model->insertQuestionsData();
		}else{
			$this->questionslist_model->updateQuestionsData($num);
		}
		redirect('/questionslist/index?per_page='.$offsetDsc, 'refresh');
	}
	
	
		public function del_QT()
	{
		$num = $this->input->post('keyNum');
		if( is_numeric($num) ){
			$this->questionslist_model->del_question($num);
		}
	}
	
	public function chgTeacher(){
		$num = $this->input->post('keyNum');
		//如果是管理員，依照選擇的教師去撈資料
		if($this->session->userdata("loginType") == "root"){
			$this->questionslist_model->chg_Teacher($num);
		}
	}
	
}
