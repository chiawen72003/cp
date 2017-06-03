<?php
/*
*	
*/
class Scorelist_model extends CI_Model {
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
			$query = $this->db->get('scores_list', $limitDsc, $offsetDsc)->result();
		}else{
			$query = $this->db->get('scores_list')->result();
		}
		
		foreach( $query as $row ){
			$class_Array[] = $row->num;
			$tempArray = array();
			foreach($row as $key => $value){
				if($key == 'count_list' and $value > ''){
					$tempArray2 = array();
					$jsonArray = json_decode($value);//12項能力值 總值
					foreach($jsonArray as  $value2){
						$tempArray2[] = $value2;
					}
					$tempArray['count_list'] = $tempArray2;
				}else{
					$tempArray[$key] = $value;
				}
				
				
			}
			$return_Array[] = $tempArray;
		}
		
		return $return_Array;
	}
	
	public function getStudentData(){
		$returnData = array();
		if($this->session->userdata("loginType") == "teacher"){
			$this->db->where('teacherdataNum',$this->session->userdata("userID"));		
		}

		//如果是管理員，依照選擇的教師去撈資料
		if($this->session->userdata("loginType") == "root"){
			$this->db->where('teacherdataNum',$this->session->userdata("tempTeacherNum"));
		}
		$query = $this->db->get('student_data')->result();
		foreach( $query as $row ){
			$tempArray = array();
			foreach( $row as $key => $value){
				$tempArray[$key] = $value;
			}
			
			$returnData[$row->num] = $tempArray;
		}
		
		return $returnData;
		
	}

	public function getClassData(){
		$returnData = array();
		if($this->session->userdata("loginType") == "teacher"){
			$this->db->where('user_num',$this->session->userdata("userID"));		
		}

		//如果是管理員，依照選擇的教師去撈資料
		if($this->session->userdata("loginType") == "root"){
			$this->db->where('user_num',$this->session->userdata("tempTeacherNum"));
		}
		$query = $this->db->get('class_list')->result();
		foreach( $query as $row ){
			$returnData[$row->num] = $row->year_dsc.'年'.$row->class_dsc.'班';
		}
		
		return $returnData;
	}
	
	public function getQuationData(){
		$returnData = array();
		$this->db->where('user_type','teacher');

		if($this->session->userdata("loginType") == "teacher"){
			$this->db->where('user_num',$this->session->userdata("userID"));
		}

		//如果是管理員，依照選擇的教師去撈資料
		if($this->session->userdata("loginType") == "root"){
			$this->db->where('user_num',$this->session->userdata("tempTeacherNum"));
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
	
	public function getScoreValues($getNum){
		$returnData = array(
			'recordData'=>'',
			'decordData'=>array(),
		);
		$this->db->where('num',$getNum);
		$query = $this->db->get('scores_list')->result();
		foreach ($query as $row)
		{
			$returnData['recordData'] = $row->scores_value;//原始的評分紀錄
			$jsonArray = json_decode($row->scores_value);
			foreach($jsonArray as $value){
				$tempArray = array();
				$tempArray['userType'] = $value->userType;
				$tempArray['event'] = $value->event;
				$tempArray['data'] = $value->data;
				$tempArray['title'] = $value->title;
				$returnData['decordData'][]= $tempArray;//解碼過的評分紀錄
			}
			
			if($row->sw_data > ''){
				$jsonArray = json_decode($row->sw_data);//12項能力值選擇的項目
				$x=0;
				foreach($jsonArray as $tempObj){
					$returnData['swData'][$x] = array(
						'numbers'=>array(),
						'swObj'=>array(),
					);
					
					
					foreach($tempObj->setNumber as $value){
						$returnData['swData'][$x]['numbers'][] = $value;
					}
					foreach($tempObj->swData as $tempArray){
						$returnData['swData'][$x]['swObj'][] = $tempArray;
					}
					$x++;
				}
			}
			
			if($row->count_list > ''){
				$jsonArray = json_decode($row->count_list);//12項能力值 總值
				//$x=0;
				foreach($jsonArray as $key => $value){
					$returnData['count_list'][$key] = $value;
				}
			}
			
			//拉出詞彙資料
			$this->db->where('num',$row->questions_num);
			$query_1 = $this->db->get('questions_list')->result();
			foreach ($query_1 as $row_1)
			{
				if($row_1->analysis_words >''){
					$dsc = '';
					$jsonArray = json_decode($row_1->analysis_words);
					foreach($jsonArray as $tempValue){
						if($dsc == ''){
						$dsc = 	$tempValue;
						}else{
						$dsc = $dsc.'<tw>'.$tempValue;
						}
					}
					$returnData['analysis_words'] = $dsc;
				}
			}
		}
		return $returnData;
	}

	public function updateData(){
		$scoreArray = array('0','0','0','0','0','0','0','0','0','0','0','0');//12項能力加總值
		$swArray = array(
				array('setNumber'=>array(),'swData'=>array()),
				array('setNumber'=>array(),'swData'=>array()),
				array('setNumber'=>array(),'swData'=>array()),
				array('setNumber'=>array(),'swData'=>array()),
				array('setNumber'=>array(),'swData'=>array()),
				array('setNumber'=>array(),'swData'=>array()),
				array('setNumber'=>array(),'swData'=>array()),
				array('setNumber'=>array(),'swData'=>array()),
				array('setNumber'=>array(),'swData'=>array()),
				array('setNumber'=>array(),'swData'=>array()),
				array('setNumber'=>array(),'swData'=>array()),
				array('setNumber'=>array(),'swData'=>array()),
		);//12項能力選擇的資料 setNumber=>得分	swData=>各子區塊選擇的項目
		$indexArray = array();
		for($x=1;$x<13;$x++){
			$indexArray[] = $this->input->post('max_index_'.$x);
		}//各能力區塊的子區塊數量
		
		//計算各能力值、區塊資料
		for($x=1,$y=0;$x<13;$x++,$y++){
			if(isset($_POST['number_'.$x]) and count($_POST['number_'.$x]) > 0){
				$tempNum = 0;
				$tempArray = array();
				foreach($_POST['number_'.$x] as $value){
					$tempNum += (int)$value;
					$tempArray[] = (int)$value;
				}
				$swArray[$y]['setNumber'] = $tempArray;
				$scoreArray[$y] = $tempNum;
				//處理選擇的項目
				$maxNum = $this->input->post('max_index_'.$x);
				$tempArray = array();
				$tempArray2 = array();
				for($z=0;$z<$maxNum;$z++){
					if(isset($_POST['scores_'.$x.'_'.$z])){
						$tempArray = array();
						foreach($_POST['scores_'.$x.'_'.$z] as $value){
							$tempArray[] = $value;
						}
						$tempArray2[] = $tempArray;
					}
				}
				$swArray[$y]['swData'] = $tempArray2;
			}
		}
		
		$data = array(
               'sw_data' => json_encode($swArray),
               'count_list' => json_encode($scoreArray),
            );

		$this->db->where('num', $this->input->post('num'));
		$this->db->update('scores_list', $data); 
	}	
	
	public function getTeacherList(){
		$returnArray = array();
		
		$query = $this->db->get('teacher_data')->result();
		foreach ($query as $row)
		{
			$tempArray = array();
			foreach($row as $key => $value){
				$tempArray[$key] = $value;
			}
			$returnArray[] = $tempArray;
		}	
		return $returnArray;
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