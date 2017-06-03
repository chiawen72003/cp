<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*	後端試題管理介面
*	addshare_Page() 新增測試題
*	addPractice_Page() 新增練習題
*	editshare_Page() 編輯測試題
*	editPractice_Page() 編輯練習題
*/

class Sharelist extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->helper(array('url','form'));
		
		$this->load->model('sharelist/sharelist_model');
		$this->load->model('publicfunction/sqlfunction', 'sqlfunction');
		if( $this->session->userdata("loginType") == "root" ){
			
		}else{		
			redirect('/memck/logout','refresh');
		}
		
	}
	
	public function index()
	{
		$this->load->library('pagination');

		$this->load->library('layout');//套用樣板為layout_main
		$this->layout->setLayout('layout/back/layout_root');//套用樣板

		$data = array();
		$data['base'] = $this->config->item('base_url');
		
		//處理分頁
		$whereArray = array(
			'is_del'=>'0',
		);
		
		$whereArray['user_type'] = 'root';
		
		$orderByArray = array('num'=>'DESC');
		$offsetDsc = 0;//目前頁面數
		$limitDsc = 10;//一頁顯示幾筆資料
		$data['offsetDsc'] = '';
		
		if(is_numeric($this->input->get('per_page'))){
			$offsetDsc = $this->input->get('per_page');
			$data['offsetDsc'] = $offsetDsc;			
		}
		
		$allNum = $this->sqlfunction->get_allDataNum('questions_list',$whereArray);//總資料數量
		$config['base_url'] = $data['base'].'index.php/sharelist/index/?xx=';
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
		$data['listData'] = $this->sharelist_model->getListData($whereArray,$limitDsc,$offsetDsc,$orderByArray);
		$data['pagination'] = $this->pagination->create_links();//ci產生的分頁html code
		$data['modelsName'] = $this->sharelist_model->get_ModelsName();
		
		$this->layout->view('sharelist/index',$data);
	}
	
		public function addshare_Page()
	{
		$this->load->library('layout');//套用樣板為layout_main
		$this->layout->setLayout('layout/back/layout_root');//套用樣板

		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['modelsData'] = $this->sharelist_model->get_ModelsData();
		$data['schoolData'] = $this->sharelist_model->get_schoolData();
		$data['teacherData'] = $this->sharelist_model->get_teacherData();
		$data['li_index'] = '0';
		
		$this->layout->view('sharelist/editpg',$data);
	}
	
		public function editshare_Page()
	{
		if(is_numeric($this->input->get('num'))){
			$getID = $this->input->get('num');
			$offsetDsc = $this->input->get('pg');
			
			$this->load->library('layout');//套用樣板為layout_main
			$this->layout->setLayout('layout/back/layout_root');//套用樣板
			
			$data = array();
			$data['base'] = $this->config->item('base_url');
			$data['dataList'] = $this->sharelist_model->getData($getID);
			$data['num'] = $getID;
			$data['offsetDsc'] = $offsetDsc;
			$data['modelsData'] = $this->sharelist_model->get_ModelsData();
			$data['schoolData'] = $this->sharelist_model->get_schoolData();
			$data['teacherData'] = $this->sharelist_model->get_teacherData();
			$data['teacherNameData'] = $this->sharelist_model->get_teacherNameData();
			$data['li_index'] = '0';
			
			$this->layout->view('sharelist/editpg',$data);			
		}	
	}
	
		public function setShareData()
	{
		$num = $this->input->post('num');
		$offsetDsc = $this->input->post('offsetDsc');
		
		if( $num == ''){
			$this->sharelist_model->insertShareData();
		}else{
			$this->sharelist_model->updateShareData($num);
		}
		redirect('/sharelist/index?per_page='.$offsetDsc, 'refresh');
	}

	
		public function del_QT()
	{
		$num = $this->input->post('keyNum');
		if( is_numeric($num) ){
			$this->sharelist_model->del_question($num);
		}
	}
}
