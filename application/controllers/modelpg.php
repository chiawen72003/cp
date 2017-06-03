<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*	m2 搶25
*	m3 製作思樂冰
*	m4 銷售
*	m5 過河
*/

class Modelpg extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->helper(array('url','form'));
		
		$this->load->model('modelpg/modelpg_model', 'modelpg_model');
	}
	
	public function index()
	{
		$this->load->library('layout');//套用樣板為layout_main
		$this->layout->setLayout('layout/layout');//套用樣板

		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['model_data'] = $this->modelpg_model->get_model2_data();
		
		
		$this->layout->view('modelpg/model2/index',$data);
	}
	
	public function index_b()
	{
		$this->load->library('layout');//套用樣板為layout_main
		$this->layout->setLayout('layout/layout');//套用樣板

		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['model_data'] = $this->modelpg_model->get_model2_data();
		$data['model_data']['userType'] = 'B';
		$data['model_data']['friendType'] = 'A';
		
		$this->layout->view('modelpg/model2/index',$data);
	}

	public function m3(){
		$this->load->library('layout');//套用樣板為layout_main
		$this->layout->setLayout('layout/layout');//套用樣板

		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['model_data'] = $this->modelpg_model->get_model3_data();
		
		
		$this->layout->view('modelpg/model3/index_a',$data);
	}
	
	public function m3_b(){
		$this->load->library('layout');//套用樣板為layout_main
		$this->layout->setLayout('layout/layout');//套用樣板

		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['model_data'] = $this->modelpg_model->get_model3_data();
		$data['model_data']['userType'] = 'B';
		$data['model_data']['friendType'] = 'A';
		
		$this->layout->view('modelpg/model3/index_b',$data);

	}
	
	public function m4(){
		$this->load->library('layout');//套用樣板為layout_main
		$this->layout->setLayout('layout/layout');//套用樣板

		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['model_data'] = $this->modelpg_model->get_model4_data();
		
		
		$this->layout->view('modelpg/model4/index_a',$data);
	}
	
	public function m4_b(){
		$this->load->library('layout');//套用樣板為layout_main
		$this->layout->setLayout('layout/layout');//套用樣板

		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['model_data'] = $this->modelpg_model->get_model4_data();
		$data['model_data']['userType'] = 'B';
		$data['model_data']['friendType'] = 'A';
		
		$this->layout->view('modelpg/model4/index_b',$data);

	}
	
	public function m5(){
		$this->load->library('layout');//套用樣板為layout_main
		$this->layout->setLayout('layout/layout');//套用樣板

		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['model_data'] = $this->modelpg_model->get_model2_data();
		
		
		$this->layout->view('modelpg/model5/index',$data);

	}
	
	public function m5_b(){
		$this->load->library('layout');//套用樣板為layout_main
		$this->layout->setLayout('layout/layout');//套用樣板

		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['model_data'] = $this->modelpg_model->get_model2_data();
		$data['model_data']['userType'] = 'B';
		$data['model_data']['friendType'] = 'A';
		
		$this->layout->view('modelpg/model5/index',$data);
	}

}
