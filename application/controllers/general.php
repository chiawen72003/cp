<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*	後端 一般設定介面 =>管理員專用
*/

class General extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->helper(array('url','form'));
		
		$this->load->model('general/general_model');
		$this->load->model('publicfunction/sqlfunction', 'sqlfunction');
		if($this->session->userdata("loginType") != "root"){
			redirect('/memck/logout','refresh');
		}
		
	}
	
	public function index()
	{
		$this->load->library('layout');//套用樣板為layout_main
		$this->layout->setLayout('layout/back/layout_root');//套用樣板
		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['generalData'] = $this->general_model->get_GeneralData();
		$this->layout->view('general/index',$data);
	}
	
	public function up_GeneralData(){
		if(isset($_POST) and count($_POST) > 0){
			$this->general_model->update_Data();
		}
	}
}
