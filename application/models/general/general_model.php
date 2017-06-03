<?php
/*
*	
*/
class General_model extends CI_Model {
	public function __construct() {
        parent::__construct();
    }
	
	public function get_GeneralData(){
		$dataArray = array();
		$query = $this->db->get('general_data')->result();
		foreach( $query as $row ){
			$dataArray[$row->weight_dsc] = $row->weight_value;
		}
		
		return $dataArray;
	}
	
	public function update_Data(){
		foreach($_POST as $key => $value){
			$data = array(
               'weight_value' => $value,
            );
			$this->db->where('weight_dsc', $key);
			$this->db->update('general_data', $data); 	
		}
	}
}