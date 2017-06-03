<?php
/*
* 	studentLoginCheck() 判斷學生的登入資料是否正確
* 	rootLoginCheck() 判斷系統管理員的登入資料是否正確
* 	teacherLoginCheck() 判斷教師的登入資料是否正確
*/
class Membercheck extends CI_Model {
	public function __construct() {
        parent::__construct();
    }

	public function rootLoginCheck($whereDscArray=''){
		$getDataArray=array();
		$user_data = array();
		if(is_array($whereDscArray)){
			foreach($whereDscArray as $key=>$value){
				$this->db->where($key,$value);
			}
		}
		$query = $this->db->get('admin_data')->result();
		if(count($query)==1){
			foreach($query as $getkey => $getData){
				$getData = array(
				'loginType'=>'root',
				);
				$this->session->set_userdata($getData);
			}
			
			//預設抓第一個教師當預設值
			$this->db->limit(1);
			$query = $this->db->get('teacher_data')->result();
			foreach($query as $row){
				$getData = array(
				'tempTeacherNum'=>$row->num,
				'tempTeacherName'=>$row->c_name,
				'tempTeacherCode'=>$row->s_code,
				);
				$this->session->set_userdata($getData);
			}
			
			return true;
		}
		return false;
	}
	
	public function teacherLoginCheck($whereDscArray=''){
		$getDataArray=array();
		$user_data = array();
		if(is_array($whereDscArray)){
			foreach($whereDscArray as $key=>$value){
				$this->db->where($key,$value);
			}
		}
		$query = $this->db->get('teacher_data')->result();
		if(count($query)==1){
			foreach($query as $getkey => $getData){
				$getData = array(
				'loginType'=>'teacher',
				'userName'=>$getData->c_name,
				'userID'=>$getData->num,
				'sCode'=>$getData->s_code,
				);
				$this->session->set_userdata($getData);
			}
			return true;
		}
		return false;
	}

	public function studentLoginCheck($whereDscArray=''){
		$getDataArray=array();
		$user_data = array();
		if(is_array($whereDscArray)){
			foreach($whereDscArray as $key=>$value){
				$this->db->where($key,$value);
			}
		}
		$query = $this->db->get('student_data')->result();
		if(count($query)==1){
			foreach($query as $getkey => $getData){
				$getData = array(
				'loginType'=>'student',
				'userName'=>$getData->c_name,
				'userID'=>$getData->num,
				'roomID'=>$getData->room_id,
				'roomTYPE'=>$getData->room_type,
				'teacherdataNum'=>$getData->teacherdataNum,
				'class_num'=>$getData->class_num,
				);
				$this->session->set_userdata($getData);
			}
			return true;
		}
		return false;
	}
}