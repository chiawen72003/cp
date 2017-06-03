<?php
/*
*	
*/
class Recordlist_model extends CI_Model {
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
			$query = $this->db->get('option_record', $limitDsc, $offsetDsc)->result();
		}else{
			$query = $this->db->get('option_record')->result();
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
	
	
	public function get_ModuleDsc($num,$userType){
		$returnData = array(
		'userType',
		'friendType',
		'switchModel'=>array(),
		'switchDsc'=>'',
		'switchModelData'=>array(),
		);
		if($userType == "A"){
			$returnData['userType'] = 'A';
			$returnData['friendType'] = 'B';
		}
		if($userType == "B"){
			$returnData['userType'] = 'B';
			$returnData['friendType'] = 'A';
		}
		
		$this->db->where('num',$num);
		$query = $this->db->get('questions_list')->result();
		foreach( $query as $row ){
			$tArray = json_decode($row->order_dsc);
			$mArray = json_decode($row->modules_dsc);
			foreach($tArray as $value){
				
				//取出模組所需預設參數
				if($value == '1' and $mArray->m1 > ''){
					$returnData['switchDsc'].= '"'.$value.'",';
					$returnData['switchModel'][] = $value;					
					$modelData_1 = $this->get_model1_data($mArray->m1);
					$returnData['modelData_1'] = $modelData_1;
				}	
				if($value == '2' and $mArray->m2 > ''){
					$returnData['switchDsc'].= '"'.$value.'",';
					$returnData['switchModel'][] = $value;	
					$modelData_2 = $this->get_model2_data($mArray->m2);
					$returnData['modelData_2'] = $modelData_2;
				}	
				if($value == '3' and $mArray->m3 > ''){
					$returnData['switchDsc'].= '"'.$value.'",';
					$returnData['switchModel'][] = $value;	
					
					$modelData_3 = $this->get_model3_data($mArray->m3);
					$returnData['modelData_3'] = $modelData_3;
				}	
				if($value == '4' and $mArray->m4 > ''){
					$returnData['switchDsc'].= '"'.$value.'",';
					$returnData['switchModel'][] = $value;	
					
					$modelData_4 = $this->get_model4_data($mArray->m4);
					$returnData['modelData_4'] = $modelData_4;
				}	
				if($value == '5' and $mArray->m5 > ''){
					$returnData['switchDsc'].= '"'.$value.'",';
					$returnData['switchModel'][] = $value;	
					
					$modelData_5 = $this->get_model5_data($mArray->m5);
					$returnData['modelData_5'] = $modelData_5;
				}	
			}
		}
		
		return $returnData;
	}
	
	public function get_model1_data($getNum){
		$tempArray = array();
		$this->db->where('key_num',$getNum);		
		$query = $this->db->get('module_1_data')->result();
		foreach( $query as $row ){
			if($this->session->userdata("roomTYPE") == "A"){
				$tempArray['level_1'] = $row->text_1_A;
				$tempArray['level_2'] = $row->text_2_A;
				$tempArray['level_3'] = $row->text_3_A;
				$jsonArray = json_decode($row->option_dsc);
				foreach($jsonArray as $tArray){
					$tempArray['option_dsc'][] = $tArray;
				}
			}
			if($this->session->userdata("roomTYPE") == "B"){
				$tempArray['level_1'] = $row->text_1_B;
				$tempArray['level_2'] = $row->text_2_B;
				$tempArray['level_3'] = $row->text_3_B;
				$jsonArray = json_decode($row->option_dsc);
				foreach($jsonArray as $tArray){
					$tempArray['option_dsc'][] = $tArray;
				}
			}
		}
		
		//取出關卡敘述
		$this->db->where('module_type','m1');		
		$this->db->where('module_list_num',$getNum);
		if($this->session->userdata("roomTYPE") == "A"){
			$this->db->where('user_type','A');
		}
		if($this->session->userdata("roomTYPE") == "B"){
			$this->db->where('user_type','B');
		}
		$query = $this->db->get('leveldsc_list')->result();
		foreach( $query as $row ){
			$tempArray['levelDsc'][$row->level_dsc] = $row->html_dsc;
		}
		
		return $tempArray;
	}
	public function get_model2_data($getNum){
		if($this->session->userdata("roomTYPE") == "A"){		
			$returnData = array(
				'userType'=>'A',
				'friendType'=>'B',
			);
		}
		
		if($this->session->userdata("roomTYPE") == "B"){
			$returnData = array(
				'userType'=>'B',
				'friendType'=>'A',
			);
		}
		
		
		$this->db->where('key_num',$getNum);		
		$query = $this->db->get('module_2_data')->result();
		foreach( $query as $row ){			
			$jsonArray = json_decode($row->value_dsc);
			foreach($jsonArray as $key => $Value){
				if( $key == 'computerPay' ){
					$tArray = explode(';',$Value);
					$tDsc = '';
					if(count($tArray) > 0){
						foreach($tArray as $tempValue){
							$tDsc .= '"'.$tempValue.'",';
						}
						$tDsc = substr($tDsc,0,-1);
					}
					$returnData['ComputerPay'] = $tDsc;
				}else{
					$returnData[$key] = $Value;
				}
			}
		}
		
		//取出關卡敘述
		$this->db->where('module_type','m2');		
		$this->db->where('module_list_num',$getNum);
		if($this->session->userdata("roomTYPE") == "A"){
			$this->db->where('user_type','A');
		}
		if($this->session->userdata("roomTYPE") == "B"){
			$this->db->where('user_type','B');
		}
		$query = $this->db->get('leveldsc_list')->result();
		foreach( $query as $row ){
			$returnData['levelDsc'][$row->level_dsc] = $row->html_dsc;
		}
		return $returnData;
	}
	public function get_model3_data($getNum){
		if($this->session->userdata("roomTYPE") == "A"){		
			$returnData = array(
				'userType'=>'A',
				'friendType'=>'B',
			);
		}
		
		if($this->session->userdata("roomTYPE") == "B"){
			$returnData = array(
				'userType'=>'B',
				'friendType'=>'A',
			);
		}
		
		$this->db->where('key_num',$getNum);		
		$query = $this->db->get('module_3_data')->result();
		foreach( $query as $row ){			
			$jsonArray = json_decode($row->value_dsc);
			foreach($jsonArray->rule_1_A as $Value){
				$returnData['rule_1_A'][] = $Value;
			}
			foreach($jsonArray->rule_1_B as $Value){
				$returnData['rule_1_B'][] = $Value;
			}
			foreach($jsonArray->rule_2_A as $Value){
				$returnData['rule_2_A'][] = $Value;
			}
			foreach($jsonArray->rule_2_B as $Value){
				$returnData['rule_2_B'][] = $Value;
			}
		}
		//取出關卡敘述
		$this->db->where('module_type','m3');		
		$this->db->where('module_list_num',$getNum);
		if($this->session->userdata("roomTYPE") == "A"){
			$this->db->where('user_type','A');
		}
		if($this->session->userdata("roomTYPE") == "B"){
			$this->db->where('user_type','B');
		}
		$query = $this->db->get('leveldsc_list')->result();
		foreach( $query as $row ){
			$returnData['levelDsc'][$row->level_dsc] = $row->html_dsc;
		}
		return $returnData;
	}
	public function get_model4_data($getNum){
		$tempArray = array();

		$tempDsc = '';
		$this->db->where('key_num',$getNum);		
		$query = $this->db->get('module_4_data')->result();
		foreach( $query as $row ){
			if($this->session->userdata("roomTYPE") == "A"){
				
			}
			if($this->session->userdata("roomTYPE") == "B"){
				$tempArray['ckDsc'] = $row->value_dsc;
			}
		}
		//取出關卡敘述
		$this->db->where('module_type','m4');		
		$this->db->where('module_list_num',$getNum);
		if($this->session->userdata("roomTYPE") == "A"){
			$this->db->where('user_type','A');
		}
		if($this->session->userdata("roomTYPE") == "B"){
			$this->db->where('user_type','B');
		}
		$query = $this->db->get('leveldsc_list')->result();
		foreach( $query as $row ){
			$tempArray['levelDsc'][$row->level_dsc] = $row->html_dsc;
		}
		return $tempArray;
	}
	public function get_model5_data($getNum){
		if($this->session->userdata("roomTYPE") == "A"){		
			$returnData = array(
				'userType'=>'A',
				'friendType'=>'B',
			);
		}
		
		if($this->session->userdata("roomTYPE") == "B"){
			$returnData = array(
				'userType'=>'B',
				'friendType'=>'A',
			);
		}
		//取出關卡敘述
		$this->db->where('module_type','m5');		
		$this->db->where('module_list_num',$getNum);
		if($this->session->userdata("roomTYPE") == "A"){
			$this->db->where('user_type','A');
		}
		if($this->session->userdata("roomTYPE") == "B"){
			$this->db->where('user_type','B');
		}
		$query = $this->db->get('leveldsc_list')->result();
		foreach( $query as $row ){
			$returnData['levelDsc'][$row->level_dsc] = $row->html_dsc;
		}
		return $returnData;
	}
	
	public function getGeneralData(){
		$tempArray = array();
		$query = $this->db->get('general_data')->result();
		foreach( $query as $row ){
			$tempArray[$row->weight_dsc] = $row->weight_value;
		}
		return $tempArray;
	}
	
	public function save_OptionData(){
		$nowdate =  date("Y-m-d H:i",time());

		$tempArray = array(		
		   'teacher_num' => $this->input->post('tNum'),
		   'student_num' => $this->input->post('sNum'),
		   'student_type' => $this->input->post('sType'),
		   'questions_num' => $this->input->post('qNum'),
		   'record_value' => $this->input->post('record'),
			'up_date'=>$nowdate,
		);

		$this->db->insert('option_record', $tempArray); 
	}
	
	public function getRecordListData(){
		$returnData = array();
		$whereInArray = array();
		if($this->session->userdata("loginType") == "student"){
			$this->db->where('student_num',$this->session->userdata("userID"));
		}
		$query = $this->db->get('option_record')->result();
		foreach( $query as $row ){
			if(!in_array($row->questions_num,$whereInArray)){
				$whereInArray[] = $row->questions_num;
			}
			$returnData['recordList'][] = array(
				'num'=>$row->num,
				'questions_num'=>$row->questions_num,
				'up_date'=>$row->up_date,
			);
		}
		
		$this->db->where_in('num',$whereInArray);
		$query = $this->db->get('questions_list')->result();
		foreach( $query as $row ){
			$returnData['questionsList'][$row->num] = $row->img_path;
		}
		
		return $returnData;
	}
	
	public function getIsMyRecord($r_num,$num){
		$isOk = false;
		if($this->session->userdata("loginType") == "student"){
			$this->db->where('student_num',$this->session->userdata("userID"));
		}
		$this->db->where('num',$r_num);
		$this->db->where('questions_num',$num);
		$query = $this->db->get('option_record')->result();
		
		if(count($query) == 1){
			$isOk = true;
		}
		return $isOk;
	}
	
	public function get_RecordData($r_num,$num){
		$returnData = '';

		$this->db->where('num',$r_num);
		$this->db->where('questions_num',$num);
		$query = $this->db->get('option_record')->result();
		foreach( $query as $row ){
			$returnData = $row->record_value;
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
		$this->db->where('is_del','0');
		
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
}