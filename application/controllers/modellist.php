<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*	模組管理(包含新增、編輯、刪除)
*	del_model() 刪除一個模組
*/

class Modellist extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->helper(array('url','form'));
		
		$this->load->model('modellist/modellist_model');
		$this->load->model('publicfunction/sqlfunction', 'sqlfunction');
		if( $this->session->userdata("loginType") == "root" || $this->session->userdata("loginType") == "teacher"){
			
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
		if($this->session->userdata("loginType") == "root"){
			$whereArray['user_type'] = 'root';
		}
		
		$orderByArray = array('num'=>'DESC');
		$offsetDsc = 0;//目前頁面數
		$limitDsc = 10;//一頁顯示幾筆資料
		$data['offsetDsc'] = '';
		
		if(is_numeric($this->input->get('per_page'))){
			$offsetDsc = $this->input->get('per_page');
			$data['offsetDsc'] = $offsetDsc;			
		}
		
		$allNum = $this->sqlfunction->get_allDataNum('module_list',$whereArray);//總資料數量
		$config['base_url'] = $data['base'].'index.php/modellist/index/?xx=';
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
		$data['listData'] = $this->modellist_model->getListData($whereArray,$limitDsc,$offsetDsc,$orderByArray);
		$data['pagination'] = $this->pagination->create_links();//ci產生的分頁html code
		
		$this->layout->view('modellist/index',$data);
	}
	
	public function addModel_Page()
	{
		$switch_mod = 'm1';
		$this->load->library('layout');//套用樣板為layout_main
		if($this->session->userdata("loginType") == "teacher"){
			$this->layout->setLayout('layout/back/layout_ta');//套用樣板
		}
		if($this->session->userdata("loginType") == "root"){
			$this->layout->setLayout('layout/back/layout_root');//套用樣板
		}
		
		
		if($this->input->get('mod') > ''){
			$switch_mod = $this->input->get('mod');			
		}

		$data = array();
		$data['base'] = $this->config->item('base_url');
		if( $switch_mod == 'm1' ){	
			$this->layout->view('modellist/editpg_m1',$data);
		}
		if( $switch_mod == 'm2' ){	
			$this->layout->view('modellist/editpg_m2',$data);
		}
		if( $switch_mod == 'm3' ){	
			$this->layout->view('modellist/editpg_m3',$data);
		}
		if( $switch_mod == 'm4' ){	
			$this->layout->view('modellist/editpg_m4',$data);
		}
        if( $switch_mod == 'm5' ){
            $this->layout->view('modellist/editpg_m5',$data);
        }
        if( $switch_mod == 'm6' ){
            $json_data = file_get_contents("http://127.0.0.1/ntcu/public/Api/Model/list");
            $data['model_options'] = json_decode($json_data, true);
            $this->layout->view('modellist/editpg_m6',$data);
        }
	}

	public function editModel_Page(){
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
			$data['dataList'] = $this->modellist_model->getModelData($getID);
			$data['num'] = $getID;
			$data['offsetDsc'] = $offsetDsc;
			if(isset($data['dataList']['module_type']) and $data['dataList']['module_type'] == 'm1'){
				$data['levelDsc'] = $this->modellist_model->getLevelData('m1',$getID);//關卡敘述
				$this->layout->view('modellist/editpg_m1',$data);
			}
			if(isset($data['dataList']['module_type']) and $data['dataList']['module_type'] == 'm2')
			{
				$jsonArray = json_decode($data['dataList']['modulesData']['value_dsc']);
				$data['modelsData'] = $jsonArray;			
				$data['levelDsc'] = $this->modellist_model->getLevelData('m2',$getID);//關卡敘述
				$this->layout->view('modellist/editpg_m2',$data);
			}
			
			if(isset($data['dataList']['module_type']) and $data['dataList']['module_type'] == 'm3')
			{
				$jsonArray = json_decode($data['dataList']['modulesData']['value_dsc']);
				foreach($jsonArray as $key => $value){
					$data['modelsData'][$key] = $value;
				}
				$data['levelDsc'] = $this->modellist_model->getLevelData('m3',$getID);//關卡敘述
				
				$this->layout->view('modellist/editpg_m3',$data);
			}
			if(isset($data['dataList']['module_type']) and $data['dataList']['module_type'] == 'm4'){
				$data['modelsData'] = $data['dataList']['modulesData'];
				$data['levelDsc'] = $this->modellist_model->getLevelData('m4',$getID);//關卡敘述
				
				$this->layout->view('modellist/editpg_m4',$data);
			}
			if(isset($data['dataList']['module_type']) and $data['dataList']['module_type'] == 'm5'){
				$data['levelDsc'] = $this->modellist_model->getLevelData('m5',$getID);//關卡敘述
				
				$this->layout->view('modellist/editpg_m5',$data);
			}
            if(isset($data['dataList']['module_type']) and $data['dataList']['module_type'] == 'm6'){
                $data['modelsData'] = $data['dataList']['modulesData'];
                $data['levelDsc'] = $this->modellist_model->getLevelData('m6',$getID);//關卡敘述
                $json_data = file_get_contents("http://127.0.0.1/ntcu/public/Api/Model/list");
                $data['model_options'] = json_decode($json_data, true);

                $this->layout->view('modellist/editpg_m6',$data);
            }
		}	
	}
	
	public function setModelData(){
		$num = $this->input->post('num');
		$offsetDsc = $this->input->post('offsetDsc');
		
		if( $num == ''){
			$this->modellist_model->insertModelData();
		}else{
			$this->modellist_model->updateModelData($num);
		}
		redirect('/modellist/index?per_page='.$offsetDsc, 'refresh');

	}
	
	public function delModel(){
		$num = $this->input->post('keyNum');
		if( is_numeric($num) ){
			$this->modellist_model->del_Model($num);
		}
	}
}
