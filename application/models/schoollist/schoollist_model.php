<?php
/*
*/
class Schoollist_model extends CI_Model {
	public function __construct() {
        parent::__construct();
    }
	
	public function getListData($whereArray='',$limitDsc='',$offsetDsc='',$orderByArray=''){
		$class_Array = array();
		$return_Array = array();
		if( is_array($whereArray) ){
			foreach($whereArray as $key => $value ){
				$this->db->where($key,$value);
			}
		}
		if( is_array($orderByArray) ){
			foreach($orderByArray as $key => $value ){
				$this->db->order_by($key,$value);
			}
		}
		if( $limitDsc>''  and $offsetDsc>'' )
		{			
			$query = $this->db->get('school_list', $limitDsc, $offsetDsc)->result();
		}else{
			$query = $this->db->get('school_list')->result();
		}
		
		foreach( $query as $row ){
			$class_Array[] = $row->num;
			$tempArray = array();
			foreach($row as $key => $value){
				$tempArray[$key] = $value;
			}
			$return_Array[] = $tempArray;
		}
		
		return $return_Array;
		
	}
	
	public function getData($getID){
		$tempArray = array();
		$this->db->where('num',$getID);
		$query = $this->db->get('school_list')->result();

		foreach ($query as $row)
		{
			$tempArray['c_name'] = $row->c_name;
			$tempArray['num'] = $row->num;
		}
		
		return $tempArray;
	}
		
	public function insertSData(){
		$nowdate =  date("Y-m-d H:i",time());
		$tempArray = array(
			'c_name'=>$this->input->post("c_name"),
			'up_date'=>$nowdate			
		);

		$this->db->insert('school_list', $tempArray); 
	}
	
	public function updateSData($num){
		$nowdate =  date("Y-m-d H:i",time());
		$tempArray = array(
			'c_name'=>$this->input->post("c_name"),
			'up_date'=>$nowdate			
		);
		
		$this->db->where('num',$num);		
		$this->db->update('school_list', $tempArray); 
	}
	
	public function del_School($num){
		if( is_numeric($num) ){
			$tArray = array(
				'is_del'=>'1',
			);
			$this->db->where('num',$num);
			$this->db->update('school_list', $tArray); 
		}
	}
	
}