<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*	評分列表( for 教師 )
*	scorePG() 評分頁面
*	saveScoreData() 儲存評分資訊
*	getScorePG() 顯示得分頁面
*/

class Scorelist extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->helper(array('url','form'));
		
		$this->load->model('scorelist/scorelist_model');
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
		);
		if($this->session->userdata("loginType") == "teacher"){
			$whereArray['teacher_num'] = $this->session->userdata("userID");		
		}

		//如果是管理員，依照選擇的教師去撈資料
		if($this->session->userdata("loginType") == "root"){
			$whereArray['teacher_num'] = $this->session->userdata("tempTeacherNum");
			$data['teacherList'] = $this->scorelist_model->getTeacherList();
		}
		
		$orderByArray = array('num'=>'DESC');
		$offsetDsc = 0;//目前頁面數
		$limitDsc = 10;//一頁顯示幾筆資料
		$data['offsetDsc'] = '';
		
		if(is_numeric($this->input->get('per_page'))){
			$offsetDsc = $this->input->get('per_page');
			$data['offsetDsc'] = $offsetDsc;			
		}
		
		$allNum = $this->sqlfunction->get_allDataNum('scores_list',$whereArray);//總資料數量
		$config['base_url'] = $data['base'].'index.php/scorelist/index/?xx=';
		$config['total_rows'] = $allNum;
		$config['per_page'] = $limitDsc;
		$config['page_query_string'] = true;
		$this->pagination->initialize($config);
		
		//取出所需資料
		$data['listData'] = $this->scorelist_model->getListData($whereArray,$limitDsc,$offsetDsc,$orderByArray);
		$data['studentData'] = $this->scorelist_model->getStudentData();//教師下所有學生資料
		$data['quationsData'] = $this->scorelist_model->getQuationData();//教師的試題資料
		$data['classData'] = $this->scorelist_model->getClassData();//教師的班級資料
		
		$data['pagination'] = $this->pagination->create_links();//ci產生的分頁html code
		$this->layout->view('scorelist/index',$data);
	}
	
	public function scorePG(){
		$this->load->library('layout');//套用樣板為layout_main
		
		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['canComparison'] = false;
		
		if($this->session->userdata("loginType") == "teacher"){
			$this->layout->setLayout('layout/back/layout_ta');//套用樣板
		}
		if($this->session->userdata("loginType") == "root"){
			$this->layout->setLayout('layout/back/layout_root');//套用樣板
			$data['canComparison'] = true;
		}

		$data['num'] = $this->input->get('num');
		$data['scoreValues']  =  $this->scorelist_model->getScoreValues($data['num']);
		$data['backView'] = 'yes';
		$data['indexDsc'] = 0;
		$data['divArray'] = array(
		0,0,0,0,0,0,0,0,0,0,0,0,0
		);
		
		$this->layout->view('scorelist/scorelist',$data);
	}
	
	public function saveScoreData(){
		$num = $this->input->post('num');
		$offsetDsc = $this->input->post('offsetDsc');
		
		if( is_numeric($num)){
			$this->scorelist_model->updateData();
		}
		
		redirect('/scorelist/index?per_page='.$offsetDsc, 'refresh');
	}

	public function chgTeacher(){
		$num = $this->input->post('keyNum');
		//如果是管理員，依照選擇的教師去撈資料
		if($this->session->userdata("loginType") == "root"){
			$this->scorelist_model->chg_Teacher($num);
		}
	}
	
	public function getScorePG(){
	
		$num = $this->input->post('num');
		//如果是管理員，依照選擇的教師去撈資料
		if(is_numeric($num)){
			$data['scoreData'] = $this->scorelist_model->get_ScorePG($num);
			$data['powerDsc'] = $this->scorelist_model->get_GeneralData();
			$this->load->view('scorelist/scorepg',$data);
		}
	}
		
}
