<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*	教師管理介面
*	index 教師資料列表
*	chkIsSame 檢查登入帳號是否重複
*/

class Teacherlist extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->helper(array('url','form'));
		
		$this->load->model('teacherlist/teacherlist_model');
		$this->load->model('publicfunction/sqlfunction', 'sqlfunction');
		if( $this->session->userdata("loginType") != "root" ){		
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
		
		$orderByArray = array('num'=>'DESC');
		$offsetDsc = 0;//目前頁面數
		$limitDsc = 10;//一頁顯示幾筆資料
		$data['offsetDsc'] = '';
		
		if(is_numeric($this->input->get('per_page'))){
			$offsetDsc = $this->input->get('per_page');
			$data['offsetDsc'] = $offsetDsc;			
		}
		
		$allNum = $this->sqlfunction->get_allDataNum('teacher_data',$whereArray);//總資料數量
		$config['base_url'] = $data['base'].'index.php/teacherlist/index/?xx=';
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
		$data['listData'] = $this->teacherlist_model->getListData($whereArray,$limitDsc,$offsetDsc,$orderByArray);
		$data['pagination'] = $this->pagination->create_links();//ci產生的分頁html code
		$data['schoolData'] = $this->teacherlist_model->getSchoolData();
		
		$this->layout->view('teacherlist/index',$data);
	}
	
	public function chkIsSame(){
		$dsc = 'error';
		$userID = $this->input->post('user_ID');
		if( $userID > ''){
			$dsc = $this->teacherlist_model->chk_IsSame($userID);
		}
		echo $dsc;
	}	
	
	public function add_Page()
	{
		$this->load->library('layout');//套用樣板為layout_main
		$this->layout->setLayout('layout/back/layout_root');//套用樣板

		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['schoolData'] = $this->teacherlist_model->getSchoolData();
		$this->layout->view('teacherlist/editpg',$data);
	}
	
	public function edit_Page()
	{
		if(is_numeric($this->input->get('num'))){
			$getID = $this->input->get('num');
			$offsetDsc = $this->input->get('pg');
			
			$this->load->library('layout');//套用樣板為layout_main
			$this->layout->setLayout('layout/back/layout_root');//套用樣板

			$data = array();
			$data['base'] = $this->config->item('base_url');
			$data['dataList'] = $this->teacherlist_model->getData($getID);
			$data['num'] = $getID;
			$data['offsetDsc'] = $offsetDsc;
			$data['schoolData'] = $this->teacherlist_model->getSchoolData();


			$this->layout->view('teacherlist/editpg',$data);			
		}	
	}
	
		public function del_TA()
	{
		$num = $this->input->post('keyNum');
		if( is_numeric($num) ){
			$this->teacherlist_model->del_Teacher($num);
		}
	}
	
	public function setTeacherData()
	{
		$num = $this->input->post('num');
		$offsetDsc = $this->input->post('offsetDsc');
		
		if( $num == ''){
			$this->teacherlist_model->insertTAData();
		}else{
			$this->teacherlist_model->updateTAData($num);
		}
		redirect('/teacherlist/index?per_page='.$offsetDsc, 'refresh');
	}
}
