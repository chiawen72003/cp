<?php
/*
*/
class Classlist_model extends CI_Model {
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
			$query = $this->db->get('class_list', $limitDsc, $offsetDsc)->result();
		}else{
			$query = $this->db->get('class_list')->result();
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
	
	public function getClassPeople($getData){
		$return_Array = array();
		$whereInArray = array();
		foreach($getData as $tempArray){
			$whereInArray[] = $tempArray['num'];
		}
		
		if(count($whereInArray) > 0){
			$this->db->select('class_num, count(*) as totalNum');
			$this->db->where('is_del','0');
			$this->db->where_in('class_num',$whereInArray);
			$this->db->group_by('class_num');
			$query = $this->db->get('student_data')->result();
			foreach( $query as $row ){
				$return_Array[$row->class_num] = $row->totalNum;
			}
		}
		return $return_Array;
	}
	
	public function insertClassData(){
		$userID = $this->session->userdata("userID");
		if($this->session->userdata("loginType") == "root"){
			$userID = $this->session->userdata("tempTeacherNum");
		}
		$nowdate =  date("Y-m-d H:i",time());
		$tempArray = array(
			'year_dsc'=>$this->input->post('year_dsc'),
			'class_dsc'=>$this->input->post('class_dsc'),
			'user_type'=>'teacher',
			'user_num'=>$userID,
			'memo_dsc'=>$this->input->post('memo_dsc'),
			'up_date'=>$nowdate			
		);

		$this->db->insert('class_list', $tempArray); 
	}
	
	public function updateClassData($num){
		$nowdate =  date("Y-m-d H:i",time());
		$tempArray = array(
			'year_dsc'=>$this->input->post('year_dsc'),
			'class_dsc'=>$this->input->post('class_dsc'),
			'memo_dsc'=>$this->input->post('memo_dsc'),
			'up_date'=>$nowdate			
		);
		
		$this->db->where('num',$num);		
		$this->db->update('class_list', $tempArray); 
	}

	public function getData($getID){
		$tempArray = array();
		$this->db->where('num',$getID);
		if($this->session->userdata("loginType") == "root"){
			$this->db->where('user_num',$this->session->userdata("tempTeacherNum"));
		}else{
			$this->db->where('user_num',$this->session->userdata("userID"));
		}		
		$query = $this->db->get('class_list')->result();

		foreach ($query as $row)
		{
			$tempArray['year_dsc'] = $row->year_dsc;
			$tempArray['class_dsc'] = $row->class_dsc;
			$tempArray['memo_dsc'] = $row->memo_dsc;
			$tempArray['num'] = $row->num;
		}
		
		return $tempArray;
	}
	
	public function del_class($num){
		if( is_numeric($num) ){
			$tArray = array(
				'is_del'=>'1',
			);
			$this->db->where('num',$num);
			if($this->session->userdata("loginType") == "root"){
				$this->db->where('user_num',$this->session->userdata("tempTeacherNum"));
			}else{
				$this->db->where('user_num',$this->session->userdata("userID"));
			}
			
			$this->db->update('class_list', $tArray); 
		}
	}
	
	public function del_Student($num){
		if( is_numeric($num) ){
			$get_CLS='';
			$this->db->where('num',$num);
			$query = $this->db->get('student_data')->result();

			foreach ($query as $row)
			{
				$get_CLS = $row->class_num;
			}
			
			$tArray = array(
				'is_del'=>'1',
			);
			$this->db->where('num',$num);
			if($this->session->userdata("loginType") == "root"){
				$this->db->where('teacherdataNum',$this->session->userdata("tempTeacherNum"));
			}else{
				$this->db->where('teacherdataNum',$this->session->userdata("userID"));
			}
			
			$this->db->update('student_data', $tArray);

			$this->reSetRoom($get_CLS);			
		}
	}
	
	
	public function getPeopleData($num){
		$return_array = array();
		$this->db->where('class_num',$num);
		$this->db->where('is_del','0');
		if($this->session->userdata("loginType") == "root"){
			$this->db->where('teacherdataNum',$this->session->userdata("tempTeacherNum"));
		}else{
			$this->db->where('teacherdataNum',$this->session->userdata("userID"));
		}
		
		$query = $this->db->get('student_data')->result();

		foreach ($query as $row)
		{
			$tempArray = array();	
			foreach( $row as $key => $value ){
				if( $key == 'loginId'){
					$idArray = explode('-',$value);
					$tempArray[$key] = $idArray[1];
				}else{
				$tempArray[$key] = $value;
				}
			}
			$return_array[] = $tempArray;
		}
		
		return $return_array;
	}

	public function insert_ST_data($get_CLS,$get_PW,$get_NAME,$get_ID,$get_SEX){
		if( is_numeric($get_CLS) ){
			$nowdate =  date("Y-m-d H:i",time());
			$tArray = array(
				'class_num'=>$get_CLS,			
				'pw'=>base64_encode($get_PW),
				'student_id'=>$get_ID,
				'sex_dsc'=>$get_SEX,
				'c_name'=>$get_NAME,
				'up_date'=>$nowdate,
			);
			
			//目前該老師的學生數量+1
			if($this->session->userdata("loginType") == "teacher"){
				$this->db->where('teacherdataNum',$this->session->userdata("userID"));
			}
			if($this->session->userdata("loginType") == "root"){
				$this->db->where('teacherdataNum',$this->session->userdata("tempTeacherNum"));
			}	
			$query = $this->db->get('student_data')->result();
			$beginNum = count($query) + 1;
			$beginNum = str_pad($beginNum,6,'0',STR_PAD_LEFT);
			if($this->session->userdata("loginType") == "teacher"){
				$tArray['teacherdataNum'] = $this->session->userdata("userID");
				$tArray['loginId'] = $this->session->userdata("sCode").'-'.$beginNum;
			}
			if($this->session->userdata("loginType") == "root"){
				$tArray['teacherdataNum'] = $this->session->userdata("tempTeacherNum");
				$tArray['loginId'] = $this->session->userdata("tempTeacherCode").'-'.$beginNum;
			}		
			
			$this->db->insert('student_data', $tArray); 
			
			$this->reSetRoom($get_CLS);
		}
	}
	
	public function update_ST_data($get_NUM,$get_CLS,$get_PW,$get_NAME,$get_ID,$get_SEX){
		if( is_numeric($get_NUM) and is_numeric($get_CLS) ){
			$tArray = array(
				'pw'=>base64_encode($get_PW),
				'student_id'=>$get_ID,
				'sex_dsc'=>$get_SEX,
				'c_name'=>$get_NAME,
			);
			$this->db->where('num',$get_NUM);
			$this->db->where('class_num',$get_CLS);
			if($this->session->userdata("loginType") == "teacher"){
				$this->db->where('teacherdataNum',$this->session->userdata("userID"));
			}
			if($this->session->userdata("loginType") == "root"){
				$this->db->where('teacherdataNum',$this->session->userdata("tempTeacherNum"));
			}
			
			$this->db->update('student_data', $tArray); 
		}
	}
	
	public function reSetRoom($getClassID){
		$roomCode = '';
		if($this->session->userdata("loginType") == "teacher"){
			$roomCode = $this->session->userdata("sCode");
		}
		if($this->session->userdata("loginType") == "root"){
			$roomCode = $this->session->userdata("tempTeacherCode");
		}		
		
		$tempArray = array();
		$this->db->where('is_del','0');
		$this->db->where('class_num',$getClassID);
		$query = $this->db->get('student_data')->result();
		foreach ($query as $row)
		{
			$tempArray[] = $row->num;
		}	
		
		for($x=0,$y=0,$roomID=1;$x<count($tempArray);$x++){
			$upArray = array();
			if($y == 0){
				$upArray['room_type'] = 'A';
				$y = 1;
				$upArray['room_id'] = $roomCode.'-'.$getClassID.'-'.$roomID;
				$this->db->where('num',$tempArray[$x]);
				$this->db->update('student_data', $upArray);
			}else{
				$upArray['room_type'] = 'B';
				$y = 0;
				$upArray['room_id'] = $roomCode.'-'.$getClassID.'-'.$roomID;
				$this->db->where('num',$tempArray[$x]);
				$this->db->update('student_data', $upArray);
				$roomID++;
			}
			
		}
		
	}
	
	public function getTeacherList(){
		$returnArray = array();
		$this->db->where('is_del','0');
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
	
	public function insert_Excel($num){
		$nowdate =  date("Y-m-d H:i",time());

		
		//設定題目圖示的路徑
		$upFload = date("Ymd",time());
		$upFileFload = "./upFILE/tempexcel/".$upFload;
		$upFile = $upFileFload."/";
		if (!is_dir($upFileFload)) {      //檢察upload資料夾是否存在
			if (!mkdir($upFile)){ //不存在的話就創建upload資料夾
			//die ("上傳目錄不存在，並且創建失敗");
			}
		}
		$config['upload_path'] = $upFileFload;//以根目錄為起點的位置
		$config['allowed_types'] = '*';
		//$config['max_size']	= '100';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';
		$config['encrypt_name']  = true;//隨機取名字
		$this->load->library('upload',$config);
		if ( ! $this->upload->do_upload('up_excel'))
		{
		//$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$getDataArray = $this->upload->data();//取得資訊
			
			// Starting the PHPExcel library
			$this->load->library('PHPExcel');
			$this->load->library('PHPExcel/IOFactory');
			
			//檔案路徑
			$inputFileName = $upFileFload.'/'.$getDataArray['file_name'];
			
			//檔案類型 (不是副檔名，而是 Excel5, Excel2007, CSV, Excel2003XML 這種字串)
			$inputFileType = IOFactory::identify($inputFileName);
 
				/**  Create a new Reader of the type that has been identified  **/
				$objReader = IOFactory::createReader($inputFileType);
				 
				/**  Load $inputFileName to a PHPExcel Object  **/
				$objPHPExcel = $objReader->load($inputFileName);
				 
				$sheet = $objPHPExcel->getActiveSheet(0); //讀取第一個工作表(編號從 0 開始)
				$colString = $sheet->getHighestColumn(); //最大欄位的英文代號
				$highestColumns = PHPExcel_Cell::columnIndexFromString($colString); //最大欄位的數字編號。A=0, B=1, C=2....
				$highestRows = $sheet->getHighestRow(); //最高行數。從1開始
				
				$uploadArray = array();
				
				for ($r = 2; $r <= $highestRows; $r++) {
					$tempArray = array();
					$value_0 = $sheet->getCellByColumnAndRow(0, $r)->getValue();//密碼
					$value_0 = preg_replace('/\s+/', '', $value_0);
					$value_1 = $sheet->getCellByColumnAndRow(1, $r)->getValue();//學號
					$value_1 = preg_replace('/\s+/', '', $value_1);					
					$value_2 = $sheet->getCellByColumnAndRow(2, $r)->getValue();//姓名
					$value_2 = preg_replace('/\s+/', '', $value_2);					
					$value_3 = $sheet->getCellByColumnAndRow(3, $r)->getValue();//性別
					$value_3 = preg_replace('/\s+/', '', $value_3);
					
					
					if($value_0 > '' and $value_2 > '' and $value_3 > ''){
						if($this->session->userdata("loginType") == "teacher"){
							$tempArray['teacherdataNum'] = $this->session->userdata("userID");
						}
						if($this->session->userdata("loginType") == "root"){
							$tempArray['teacherdataNum'] = $this->session->userdata("tempTeacherNum");
						}
						
						$tempArray['class_num'] = $num;
						$tempArray['pw'] = base64_encode($value_0);
						$tempArray['student_id'] = $value_1;
						$tempArray['c_name'] = $value_2;
						$tempArray['sex_dsc'] = $value_3;
						$tempArray['loginId'] = '';
						$tempArray['up_date'] = $nowdate;					
						
						$uploadArray[] = $tempArray;						
					}					
				}
				
				if(count($uploadArray) > 0){
					//目前該老師的學生數量+1
					if($this->session->userdata("loginType") == "teacher"){
						$this->db->where('teacherdataNum',$this->session->userdata("userID"));
					}
					if($this->session->userdata("loginType") == "root"){
						$this->db->where('teacherdataNum',$this->session->userdata("tempTeacherNum"));
					}	
					$query = $this->db->get('student_data')->result();
					$beginNum = count($query) + 1;
					foreach($uploadArray as $key => $tempArray){
						if($this->session->userdata("loginType") == "teacher"){
							$uploadArray[$key]['loginId'] = $this->session->userdata("sCode").'-'.str_pad($beginNum,6,'0',STR_PAD_LEFT);
						}
						if($this->session->userdata("loginType") == "root"){
							$uploadArray[$key]['loginId'] = $this->session->userdata("tempTeacherCode").'-'.str_pad($beginNum,6,'0',STR_PAD_LEFT);
						}	
						$beginNum++;
					}

					$this->db->insert_batch('student_data', $uploadArray); 
					$this->reSetRoom($num);
				}
				
				//移除上傳的檔案
				unlink($inputFileName); 
		}
		
		
	}
}