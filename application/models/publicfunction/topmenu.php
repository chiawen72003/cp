<?php
/*
* 	get_TopMenu() 取出菜單資料
*/
class Topmenu extends CI_Model {
	public function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->library('session');		
    }

	public function get_TopMenu($whereDscArray=''){
		$getData=array();
		$this->db->order_by('orderNum');
		$this->db->where('fatherNum','0');
		
		$query = $this->db->get('menutable')->result();
		foreach($query as $key => $value){
			$user_data = array(				
				'num' => $value->num,
				'fatherNum' => $value->fatherNum,				
				'orderNum' => $value->orderNum,
				'menuName' => $value->menuName,				
				'routePath' => $value->routePath,				
				'upDate' => $value->upDate			
			);
			$getData[] = $user_data;
		}
		$childrenMenu = $this->get_childrenMenu();
		$resultData = array(
		'topMenu'=>$getData,
		'childMenu'=>$childrenMenu
		);
		
		return $resultData;
	}
	
	private function get_childrenMenu(){
		$getData=array();
		$this->db->where('fatherNum >','0');		
		$this->db->order_by('fatherNum,orderNum');		
		$query = $this->db->get('menutable')->result();
		foreach($query as $key => $value){
			$user_data = array(				
				'num' => $value->num,
				'fatherNum' => $value->fatherNum,				
				'orderNum' => $value->orderNum,
				'menuName' => $value->menuName,				
				'routePath' => $value->routePath,				
				'upDate' => $value->upDate			
			);
			$getData[$value->fatherNum][] = $user_data;
		}
		return $getData;	
	}
}