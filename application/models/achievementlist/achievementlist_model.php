<?php
/*
*	
*/
class Achievementlist_model extends CI_Model {
	public function __construct() {
        parent::__construct();
    }
	
	public function getListData($studentData='',$limitDsc='',$offsetDsc='',$orderByArray=''){
		$return_Array = array();
		$whereInArray = array();
		if( is_array($studentData) ){
			foreach($studentData as $key => $value ){
				$whereInArray[] = $key;
			}
		}
		$this->db->where_in('student_num',$whereInArray);

		if( is_array($orderByArray) ){
			foreach($orderByArray as $key => $value ){
				$this->db->order_by($key,$value);
			}
		}

		if( $limitDsc > ''  and $offsetDsc > '' )
		{	
			$query = $this->db->get('scores_list', $limitDsc, $offsetDsc)->result();
		}else{
			$query = $this->db->get('scores_list',$limitDsc)->result();
		}
		
		foreach( $query as $row ){
			$tempArray = array();
			$tempArray['num'] = $row->num; 
			$tempArray['questions_num'] = $row->questions_num; 
			$tempArray['student_num'] = $row->student_num; 
			$tempArray['student_type'] = $row->student_type; 
			$tempArray['up_date'] = substr($row->up_date,0,10); 
			$tempArray['count_list'] = ''; 			
			if($row->count_list >''){
				$jsonArray = json_decode($row->count_list);
				foreach($jsonArray as $tempValue){
					$tempArray['count_list'][] = $tempValue;
				}
			}
			$return_Array[] = $tempArray;			
		}
		
		return $return_Array;
	}
	
	public function getCountListData($dataArray){
		$whereInArray = array();
		foreach($dataArray as $key=>$value){
			$whereInArray[] = $key;
		}
		$this->db->where_in('student_num',$whereInArray);
		$query = $this->db->get('scores_list')->result();
		return count($query);
	}
	
	public function getClassData($getNum=''){
		$returnArray = array();
		if($getNum >''){
			$this->db->where('user_num',$getNum);	
		}else{
			//如果是管理員，依照選擇的教師去撈資料
			if($this->session->userdata("loginType") == "root"){
				$this->db->where('user_num',$this->session->userdata("tempTeacherNum"));
			}else{
				$this->db->where('user_num',$this->session->userdata("userID"));	
			}
		}

		$this->db->where('user_type','teacher');		
		$this->db->where('is_del','0');
		$query = $this->db->get('class_list')->result();
		foreach( $query as $row ){
			$tempArray = array();
			$tempArray['className'] = $row->year_dsc .'年'. $row->class_dsc . '班';
			$tempArray['num'] = $row->num;
			$returnArray[$row->num] = $tempArray;
		}
		return $returnArray;
	}
	
	public function getStudentData($getNum){
		$returnArray = array();
		$this->db->where('class_num',$getNum);
		$this->db->where('is_del','0');
		$query = $this->db->get('student_data')->result();
		foreach( $query as $row ){
			$tempArray = array();
			foreach($row as $key => $value){
				$tempArray[$key] = $value;
			}
			$returnArray[$row->num] = $tempArray;
		}
		return $returnArray;

	}

	public function getTeacherData($getNum){
		$returnArray = array();
		$this->db->where('schoolNum',$getNum);
		$this->db->where('is_del','0');
		$query = $this->db->get('teacher_data')->result();
		foreach( $query as $row ){
			$returnArray[$row->num] = $row->c_name;
		}
		return $returnArray;

	}
	
	public function getAllTeacherData(){
		$returnArray = array();
		$this->db->where('is_del','0');
		$query = $this->db->get('teacher_data')->result();
		foreach( $query as $row ){
			$returnArray[$row->schoolNum][$row->num] = $row->c_name;
		}
		return $returnArray;
	}
	
	public function getQuationData($getNum=''){
		$returnData = array();
		$this->db->where('user_type','teacher');
		if($getNum > ''){
				$this->db->where('user_num',$getNum);
		}else{
			if($this->session->userdata("loginType") == "teacher"){
				$this->db->where('user_num',$this->session->userdata("userID"));
			}

			//如果是管理員，依照選擇的教師去撈資料
			if($this->session->userdata("loginType") == "root"){
				$this->db->where('user_num',$this->session->userdata("tempTeacherNum"));
			}
		}
		$query = $this->db->get('questions_list')->result();
		foreach( $query as $row ){
			$tempArray = array();
			foreach( $row as $key => $value){
				$tempArray[$key] = $value;
			}
			
			$returnData[$row->num] = $tempArray;
		}
		
		return $returnData;

	}
	
	public function chg_Teacher($num){
		$this->db->where('num',$num);
		$query = $this->db->get('teacher_data')->result();
		foreach ($query as $row)
		{
			$getData = array(
			'tempTeacherNum'=>$row->num,
			'tempTeacherName'=>$row->c_name,
			'tempTeacherCode'=>$row->s_code,			
			);
			$this->session->set_userdata($getData);
		}	
	}
	
	public function get_ScorePG($num){
		$dataArray = array();
		$this->db->where('num',$num);
		if($this->session->userdata("loginType") == "teacher"){
			$this->db->where('teacher_num',$this->session->userdata("userID"));
		}

		//如果是管理員，依照選擇的教師去撈資料
		if($this->session->userdata("loginType") == "root"){
			$this->db->where('teacher_num',$this->session->userdata("tempTeacherNum"));
		}
		$query = $this->db->get('scores_list')->result();
		foreach ($query as $row)
		{
			if($row->count_list > ''){
				$dataArray['scoreList'] = json_decode($row->count_list);	
			}
			//學生資料
			$this->db->where('student_data.num',$row->student_num);
			$this->db->join('class_list', 'class_list.num = student_data.class_num', 'left');
			$query_1 = $this->db->get('student_data')->result();
			foreach ($query_1 as $row_1)
			{
				$dataArray['student_id'] = $row_1->student_id;//學號
				$dataArray['classDsc'] = $row_1->year_dsc.'年'.$row_1->class_dsc.'班';//班級
				$dataArray['student_name'] = $row_1->c_name;//姓名
			}
			
		}
		return $dataArray;
	}
	
	public function get_GeneralData(){
		$dataArray = array();
		$query = $this->db->get('general_data')->result();
		foreach( $query as $row ){
			$dataArray[$row->weight_dsc] = $row->weight_value;
		}
		
		return $dataArray;
	}	
}