<?php
/*
*	
*/
class Memberlist_model extends CI_Model {
	public function __construct() {
        parent::__construct();
    }
	
	public function get_ListData($whereArray='',$limitDsc='',$offsetDsc='',$orderByArray=''){
		
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
			$query = $this->db->get('teacher_data', $limitDsc, $offsetDsc)->result();
		}else{
			$query = $this->db->get('teacher_data')->result();
		}
		
		foreach( $query as $row ){
			$tempArray = array();
			foreach($row as $key => $value){
				if($key == 'pw'){					
					$tempArray['pw'] = base64_decode($value);
				}else{
					$tempArray[$key] = $value;
				}
			}
			$return_Array[] = $tempArray;
		}
		
		return $return_Array;
	}
	
	public function is_same($get_LoginID){
		$this->db->where('loginId',$get_LoginID);
		$query = $this->db->get('teacher_data')->result();
		if(count($query) > 0){
			return true;
		}
			return false;
	}
	
	public function insert_TA_data($get_ID,$get_PW,$get_NAME){
		$nowdate =  date("Y-m-d H:i",time());
		$tempArray = array(
			'loginId'=>$get_ID,
			'pw'=>base64_encode($get_PW),
			'c_name'=>$get_NAME,			
			'up_date'=>$nowdate			
		);
		$this->db->insert('teacher_data', $tempArray); 		
	}
	
	public function update_TA_data($get_NUM,$get_PW,$get_NAME){
		$nowdate =  date("Y-m-d H:i",time());
		$tempArray = array(
			'pw'=>base64_encode($get_PW),
			'c_name'=>$get_NAME,			
			'up_date'=>$nowdate			
		);
		$this->db->where('num', $get_NUM); 		
		$this->db->update('teacher_data', $tempArray); 		
	}
	
	public function del_teacher($get_NUM){
		$tempArray = array(
			'is_del'=>'1',
		);
		$this->db->where('num', $get_NUM); 		
		$this->db->update('teacher_data', $tempArray);
		
		$tempArray = array(
			'is_del'=>'1',
		);
		$this->db->where('teacherdataNum', $get_NUM); 		
		$this->db->update('student_data', $tempArray); 		
	}
	
}