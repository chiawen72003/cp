<?php
/*
* 	getSqlData() 	取出對應資料表的資料，並回傳成陣列型態
	upSqlData()		更新單筆sql資料
	delSqlData()	刪除sql資料
	delArrayFile()	刪除單一檔案
	setSqlData()	新增一筆SQL資料
	get_pgTitle()	取出指定的後端選單名稱
	get_allDataNum() 取得指定資料表的總數量
	getPGData() 取出一頁數量的資料
*/
class Sqlfunction extends CI_Model {
	public function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->library('session');		
    }
	
	public function setSqlData($tableName='',$dataArray=''){
		$insert_id='';
		if($tableName>'' && is_array($dataArray)){
			$this->db->insert($tableName, $dataArray); 
			$insert_id = $this->db->insert_id();//新增資料後回傳回來的id值
		}
		return $insert_id;
	}

	public function getSqlData($tableName='',$whereDsc='',$orderDsc=''){
		$myDataArray= array();
		if(is_array($whereDsc)){
			foreach($whereDsc as $key =>$value){
				$this->db->where($key, $value);
			}
		}
		if(is_array($orderDsc)){
			foreach($orderDsc as $key =>$value){
				$this->db->order_by($key,$value);
			}
		}		
		if($tableName>''){
			$query = $this->db->get($tableName)->result();
			if(count($query)>0){
				foreach($query as $getData){
					$tempArray=array();
					foreach($getData as $key => $value){
						$tempArray[$key] = $value;
					}
					$myDataArray[] = $tempArray;
				}
			}
		}
		return $myDataArray;
	}
	
	public function upSqlData($tableName='',$whereDsc='',$updataArray=''){
		if(is_array($whereDsc)){
			foreach($whereDsc as $key =>$value){
				$this->db->where($key, $value);
			}
		}
		if($tableName>'' && is_array($updataArray)){
			$this->db->update($tableName,$updataArray); 
		}
	}
	
	public function delSqlData($tableName='',$whereDsc=''){
		$myDataArray= array();
		if(is_array($whereDsc)){
			foreach($whereDsc as $key =>$value){
				$this->db->where($key, $value);
			}
		}
		if($tableName>'' && is_array($whereDsc)){
			$this->db->delete($tableName); 
		}
	}
	
	public function delArrayFile($pathArray){
		if(is_array($pathArray)){
			foreach($pathArray as $value){
				if(file_exists($value)){				
				unlink($value);
				}
			}
		}
	}
	
	public function get_pgTitle($getNum){
		$dsc='';
		$this->db->where('num', $getNum);
		$query = $this->db->get('menutable')->result();
		if(count($query)==1){
			foreach($query as $getData){
				$dsc=$getData->menuName;
			}
		}
		return $dsc;
	}
	
	public function get_allDataNum($tableName='',$whereDsc='',$whereLikeArray=''){
		$totalNum=0;
		if(is_array($whereDsc)){
			foreach($whereDsc as $key =>$value){
				$this->db->where($key, $value);
			}
		}
		if(is_array($whereLikeArray)){
			foreach($whereLikeArray as $TempArray){
				$this->db->like($TempArray['tableName'],$TempArray['keyWordDSC'], $TempArray['typeDSC']);
			}
		}		
		if($tableName > ''){
			$totalNum = $this->db->count_all_results($tableName);
		}
		return $totalNum;
	}
	
	
	public function getPGData($tableName='',$whereArray='',$limitDsc='',$offsetDsc='',$orderByArray=''){
		$returnDataArray=array();
		if($tableName > ''){
			$getDataArray = array();
			$returnDataArray = array();		
			if(is_array($whereArray)){
				foreach($whereArray as $key => $value){
					$this->db->where($key,$value);
				}
			}
			
			if(is_array($whereArray)){
				foreach($whereArray as $key => $value){
					$this->db->order_by($key,$value);
				}
			}else{
				$this->db->order_by("num", "desc");
			}
			if(is_numeric($limitDsc) and is_numeric($offsetDsc)){
				$query = $this->db->get($tableName,$limitDsc,$offsetDsc)->result();
			}else{
				$query = $this->db->get($tableName)->result();
			}
			if(is_array($query)){
				foreach($query as $key=>$value){
					foreach($value as $gkey => $gValue){
						$getDataArray[$gkey] = $gValue;				
					}
					$returnDataArray[] = $getDataArray;
				}		
			}
		}
		return $returnDataArray;
	}
}
