<?php
/*
*/
class Teacherlist_model extends CI_Model {
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
			$query = $this->db->get('teacher_data', $limitDsc, $offsetDsc)->result();
		}else{
			$query = $this->db->get('teacher_data')->result();
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

    /**
     * 所有教師num跟姓名的資料
     *
     * @return mixed
     */
    public function getNameData(){
        $returnArray = array();
        $query = $this->db->get('teacher_data')->result();
        foreach( $query as $row ){
            $return_Array[ $row->num ] = $row->c_name;
        }

        return $return_Array;
    }


    public function getSchoolData(){
		$returnArray = array();
		$query = $this->db->get('school_list')->result();
		foreach( $query as $row ){
			$return_Array[ $row->num ] = $row->c_name;
		}
		return $return_Array;
	}
	
	public function insertTAData(){
		$codeArray = array(
			'a','b','c','d','e','f','g','h','i','j',
		);
		$nowdate =  date("Y-m-d H:i",time());
		$tempArray = array(
			'loginId'=>$this->input->post('loginId'),
			'pw'=>base64_encode($this->input->post('pw')),
			'c_name'=>$this->input->post("c_name"),
			'schoolNum'=>$this->input->post("schoolNum"),
			'up_date'=>$nowdate			
		);

		$this->db->insert('teacher_data', $tempArray); 
		$getID = ''.$this->db->insert_id();
		
		//插入教師的代碼
		$getCode = '';
		$maxNum = strlen($getID);
		for($x=0;$x<$maxNum;$x++){
			$tempValue = substr($getID,$x,1);
			$getCode .= $codeArray[$tempValue];
		}
		$tempArray = array(
			's_code'=>$getCode
		);
		
		$this->db->where('num',$getID);		
		$this->db->update('teacher_data', $tempArray); 
	}
	
	public function updateTAData($num){
		$nowdate =  date("Y-m-d H:i",time());
		$tempArray = array(
			'pw'=>base64_encode($this->input->post('pw')),
			'c_name'=>$this->input->post("c_name"),
			'schoolNum'=>$this->input->post("schoolNum"),			
			'up_date'=>$nowdate			
		);
		
		$this->db->where('num',$num);		
		$this->db->update('teacher_data', $tempArray); 
	}

	public function getData($getID){
		$tempArray = array();
		$this->db->where('num',$getID);
		$query = $this->db->get('teacher_data')->result();

		foreach ($query as $row)
		{
			$tempArray['loginId'] = $row->loginId;
			$tempArray['pw'] = base64_decode($row->pw);
			$tempArray['c_name'] = $row->c_name;
			$tempArray['num'] = $row->num;
			$tempArray['schoolNum'] = $row->schoolNum;
		}
		
		return $tempArray;
	}
	
	public function del_Teacher($num){
		if( is_numeric($num) ){
			$tArray = array(
				'is_del'=>'1',
			);
			$this->db->where('num',$num);
			$this->db->update('teacher_data', $tArray); 
		}
	}
	
	public function chk_IsSame($userID){
		$dsc = 'error';
		$this->db->where('loginId',$userID);
		$query = $this->db->get('teacher_data')->result();
		if(count($query) == '0'){
			$dsc = 'ok';
		}
		return $dsc;
	}
}