<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*	成績顯示模組( for 管理員、教師 )
*	index 教師觀看各自班級的頁面
*	getClassExcel 取得指定班級的excel資料
*	getClassExcel 取得指定學校下面所有的excel資料
*/

class Achievementlist extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->helper(array('url','form'));

		$this->load->model('achievementlist/achievementlist_model','a_model');
		$this->load->model('publicfunction/sqlfunction', 'sqlfunction');
		if( $this->session->userdata("loginType") == "root" OR $this->session->userdata("loginType") == "teacher"){

		}else{		
			redirect('/memck/logout','refresh');
		}

	}

	public function index()
	{
		$this->load->library('pagination');

		$this->load->library('layout');//套用樣板為layout_main
		if($this->session->userdata("loginType") == "teacher"){
			$this->layout->setLayout('layout/back/layout_ta');//套用樣板
		}
		if($this->session->userdata("loginType") == "root"){
			$this->layout->setLayout('layout/back/layout_root');//套用樣板
		}

		$data = array();
		$data['base'] = $this->config->item('base_url');
		//處理分頁
		$whereArray = array(
		);
		
		
		//先取得該老師所有管轄的班級
		$data['classData'] = $this->a_model->getClassData();
		//取出指定班級的學生資料
		$swClass = '';//目前指定的班級
		if($this->input->get('swClass') > ''){
			$getSwClass = $this->input->get('swClass');
			//有選擇班級			
			if(count($data['classData']) > 0 and isset($data['classData'][$getSwClass])){
				$swClass = $this->input->get('swClass');
			}
		}else{
			if(count($data['classData']) > 0){
				$x=0;
				foreach($data['classData'] as $key =>$value){
					if($x == 0){
						$swClass = $key;
					}
					$x++;
				}				
			}
		}
		
		$data['studentData'] = array();
		
		if($swClass > ''){
			$data['studentData'] = $this->a_model->getStudentData($swClass);//指定班級下，學生資料
			$data['className'] = $data['classData'][$swClass]['className'];//指定班級名稱
		}
		$data['swClass'] = $swClass;//目前指定的班級
		
		$orderByArray = array('num'=>'DESC');
		$offsetDsc = 0;//目前頁面數
		$limitDsc = 10;//一頁顯示幾筆資料
		$data['offsetDsc'] = '';
		
		if(is_numeric($this->input->get('per_page'))){
			$offsetDsc = $this->input->get('per_page');
			$data['offsetDsc'] = $offsetDsc;			
		}
		
		$allNum = 0;//總資料數量
		if(count($data['studentData']) > 0){
			$allNum = $this->a_model->getCountListData($data['studentData']);//總資料數量
		}
		
		$config['base_url'] = $data['base'].'index.php/achievementlist/index/?swClass='.$swClass;
		$config['total_rows'] = $allNum;
		$config['per_page'] = $limitDsc;
		$config['page_query_string'] = true;
		$this->pagination->initialize($config);
		
		//取出所需資料
		$data['listData'] = array();
		if(count($data['studentData']) > 0){
			$data['listData'] = $this->a_model->getListData($data['studentData'],$limitDsc,$offsetDsc,$orderByArray);
		}
		
		$data['quationsData'] = $this->a_model->getQuationData();//教師的試題資料
		$data['pagination'] = $this->pagination->create_links();//ci產生的分頁html code
		$this->layout->view('achievementlist/index',$data);
	}
	
	public function schoolList(){
		$this->load->library('pagination');

		$this->load->library('layout');//套用樣板為layout_main
		if($this->session->userdata("loginType") == "teacher"){
			redirect('/memck/logout','refresh');
		}
		if($this->session->userdata("loginType") == "root"){
			$this->layout->setLayout('layout/back/layout_root');//套用樣板
		}

		$data = array();
		$data['base'] = $this->config->item('base_url');
		//處理分頁
		$whereArray = array(
		'is_del'=>'0',
		);
		
		$orderByArray = array('num'=>'DESC');
		$offsetDsc = 0;//目前頁面數
		$limitDsc = 10;//一頁顯示幾筆資料
		$data['offsetDsc'] = '';
		
		if(is_numeric($this->input->get('per_page'))){
			$offsetDsc = $this->input->get('per_page');
			$data['offsetDsc'] = $offsetDsc;			
		}
		
		$allNum = $this->sqlfunction->get_allDataNum('school_list',$whereArray);//總資料數量
		
		$config['base_url'] = $data['base'].'index.php/achievementlist/schoolList/?x=';
		$config['total_rows'] = $allNum;
		$config['per_page'] = $limitDsc;
		$config['page_query_string'] = true;
		$this->pagination->initialize($config);
		
		//取出所需資料
		$data['listData'] = $this->sqlfunction->getPGData('school_list',$whereArray,$limitDsc,$offsetDsc,$orderByArray);
		
		$data['quationsData'] = $this->a_model->getQuationData();//教師的試題資料
		$data['pagination'] = $this->pagination->create_links();//ci產生的分頁html code
		$data['teacherList'] = $this->a_model->getAllTeacherData();
		
		
		$this->layout->view('achievementlist/schoollist',$data);
	}
	
	public function getClassExcel(){
		$powerDsc = $this->a_model->get_GeneralData();//12項能力指標
		
		$isMyClass = false;
		$getClass = $this->input->get('swClass');
		$excelDataArray = array();
		//先取得該老師所有管轄的班級
		$classData = $this->a_model->getClassData();
		$className ='';//指定班級名稱

		if(is_numeric($getClass) and $getClass > 0 and isset($classData[$getClass])){
			$studentData = $this->a_model->getStudentData($getClass);//指定班級下，學生資料
			$className = $classData[$getClass]['className'];//指定班級名稱
			$quationsData = $this->a_model->getQuationData();//教師的試題資料
			if(count($studentData) > 0){
				$whereInArray = array();
				if( is_array($studentData) ){
					foreach($studentData as $key => $value ){
						$whereInArray[] = $key;
					}
				}
				$this->db->where_in('student_num',$whereInArray);
				$query = $this->db->get('scores_list')->result();
				if(!$query){return false;}
				$x=1;
				foreach( $query as $row ){
					$tempArray = array();
					$tempArray[] = $x;
					$tempArray[] = $className;
					$tempArray[] = $studentData[$row->student_num]['c_name'];
					$tempArray[] = $quationsData[$row->questions_num]['title_dsc'];
					$tempArray[] = substr($row->up_date,0,10); 
					
					if($row->count_list >''){
						$jsonArray = json_decode($row->count_list);
						foreach($jsonArray as $tempValue){
							$tempArray[] = $tempValue;
						}
					}else{
						for($y=0;$y<12;$y++){
						$tempArray[] = '0'; 
						}
					}
					$excelDataArray[] = $tempArray;			
					$x++;
				}
			}
		}

			// Starting the PHPExcel library
			$this->load->library('PHPExcel');
			$this->load->library('PHPExcel/IOFactory');

			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setTitle("export")->setDescription("none"); 
			$objPHPExcel->setActiveSheetIndex(0);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', '編號');
			$objPHPExcel->getActiveSheet()->setCellValue('B1', '班級');
			$objPHPExcel->getActiveSheet()->setCellValue('C1', '學生名稱');
			$objPHPExcel->getActiveSheet()->setCellValue('D1', '試題題目');
			$objPHPExcel->getActiveSheet()->setCellValue('E1', '存檔時間');
			$objPHPExcel->getActiveSheet()->setCellValue('F1', $powerDsc['PowerDsc_A1']);		
			$objPHPExcel->getActiveSheet()->setCellValue('G1', $powerDsc['PowerDsc_A2']);
			$objPHPExcel->getActiveSheet()->setCellValue('H1', $powerDsc['PowerDsc_A3']);
			$objPHPExcel->getActiveSheet()->setCellValue('I1', $powerDsc['PowerDsc_B1']);		
			$objPHPExcel->getActiveSheet()->setCellValue('J1', $powerDsc['PowerDsc_B2']);
			$objPHPExcel->getActiveSheet()->setCellValue('K1', $powerDsc['PowerDsc_B3']);
			$objPHPExcel->getActiveSheet()->setCellValue('L1', $powerDsc['PowerDsc_C1']);		
			$objPHPExcel->getActiveSheet()->setCellValue('M1', $powerDsc['PowerDsc_C2']);
			$objPHPExcel->getActiveSheet()->setCellValue('N1', $powerDsc['PowerDsc_C2']);
			$objPHPExcel->getActiveSheet()->setCellValue('O1', $powerDsc['PowerDsc_D1']);		
			$objPHPExcel->getActiveSheet()->setCellValue('P1', $powerDsc['PowerDsc_D2']);
			$objPHPExcel->getActiveSheet()->setCellValue('Q1', $powerDsc['PowerDsc_D3']);
	 

				
			$objPHPExcel->getActiveSheet()->fromArray($excelDataArray, null, 'A2');//將資料以陣列方式填入excel
			for($x=0,$y=1;$x<50;$x++,$y++){
				$countArray[] = $y;
			}
		$objPHPExcel->setActiveSheetIndex(0);

		$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
		date_default_timezone_set('Asia/Taipei');
		// Sending headers to force the user to download the file
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$className.'_測驗成績.xls"');
		header('Cache-Control: max-age=0');
		$objWriter->save('php://output');
	
	}
	
	public function getSchoolExcel(){
		if($this->session->userdata("loginType") != "root"){
			redirect('/memck/logout','refresh');
		}
		
		$powerDsc = $this->a_model->get_GeneralData();//12項能力指標
		
		/*
			學校->老師->學生
		*/
		$isMyClass = false;
		$getSchool = $this->input->get('swSchool');
		$getSchoolName = urldecode($this->input->get('sName'));
		
		$excelDataArray = array();
		
		$teacherList = $this->a_model->getTeacherData($getSchool);//該校下所有老師資料
		if( count($teacherList) > 0 ){
			foreach($teacherList as $key => $teacherName){
				//先取得該老師所有管轄的班級
				$classData = $this->a_model->getClassData($key);
				$className ='';//指定班級名稱
				$scoresArray = array();//該老師下面所有學生的成績資料
				$x=1;
				foreach($classData as $getClass => $tArray){
					$studentData = $this->a_model->getStudentData($getClass);//指定班級下，學生資料
					$className = $classData[$getClass]['className'];//指定班級名稱
					$quationsData = $this->a_model->getQuationData($key);//教師的試題資料
					if(count($studentData) > 0){
						$whereInArray = array();
						if( is_array($studentData) ){
							foreach($studentData as $tempkey => $value ){
								$whereInArray[] = $tempkey;
							}
						}
						$this->db->where_in('student_num',$whereInArray);
						$query = $this->db->get('scores_list')->result();
						if(count($query) > 0){
							foreach( $query as $row ){
								$tempArray = array();
								$tempArray[] = $x;
								$tempArray[] = $className;
								$tempArray[] = $studentData[$row->student_num]['c_name'];
								$tempArray[] = $quationsData[$row->questions_num]['title_dsc'];
								$tempArray[] = substr($row->up_date,0,10); 
								
								if($row->count_list >''){
									$jsonArray = json_decode($row->count_list);
									foreach($jsonArray as $tempValue){
										$tempArray[] = $tempValue;
									}
								}else{
									for($y=0;$y<12;$y++){
									$tempArray[] = '0'; 
									}
								}
								$scoresArray[] = $tempArray;			
								$x++;
							}
						}
					}
				}
				
				$excelDataArray[] = $scoresArray;
			}
		}
		
		
			// Starting the PHPExcel library
			$this->load->library('PHPExcel');
			$this->load->library('PHPExcel/IOFactory');

			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
			$objPHPExcel->setActiveSheetIndex(0);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', '編號');
			$objPHPExcel->getActiveSheet()->setCellValue('B1', '班級');
			$objPHPExcel->getActiveSheet()->setCellValue('C1', '學生名稱');
			$objPHPExcel->getActiveSheet()->setCellValue('D1', '試題題目');
			$objPHPExcel->getActiveSheet()->setCellValue('E1', '存檔時間');
			$objPHPExcel->getActiveSheet()->setCellValue('F1', $powerDsc['PowerDsc_A1']);		
			$objPHPExcel->getActiveSheet()->setCellValue('G1', $powerDsc['PowerDsc_A2']);
			$objPHPExcel->getActiveSheet()->setCellValue('H1', $powerDsc['PowerDsc_A3']);
			$objPHPExcel->getActiveSheet()->setCellValue('I1', $powerDsc['PowerDsc_B1']);		
			$objPHPExcel->getActiveSheet()->setCellValue('J1', $powerDsc['PowerDsc_B2']);
			$objPHPExcel->getActiveSheet()->setCellValue('K1', $powerDsc['PowerDsc_B3']);
			$objPHPExcel->getActiveSheet()->setCellValue('L1', $powerDsc['PowerDsc_C1']);		
			$objPHPExcel->getActiveSheet()->setCellValue('M1', $powerDsc['PowerDsc_C2']);
			$objPHPExcel->getActiveSheet()->setCellValue('N1', $powerDsc['PowerDsc_C2']);
			$objPHPExcel->getActiveSheet()->setCellValue('O1', $powerDsc['PowerDsc_D1']);		
			$objPHPExcel->getActiveSheet()->setCellValue('P1', $powerDsc['PowerDsc_D2']);
			$objPHPExcel->getActiveSheet()->setCellValue('Q1', $powerDsc['PowerDsc_D3']);
			if( count($teacherList) > 0 ){
				$x=0;
				foreach($teacherList as $key => $teacherName){
				if($x > 0){
					$objPHPExcel->createSheet($x);
				}
					$objPHPExcel->setActiveSheetIndex($x);
					$objPHPExcel->getActiveSheet()->setTitle($teacherName);
					$objPHPExcel->getActiveSheet()->setCellValue('A1', '編號');
					$objPHPExcel->getActiveSheet()->setCellValue('B1', '班級');
					$objPHPExcel->getActiveSheet()->setCellValue('C1', '學生名稱');
					$objPHPExcel->getActiveSheet()->setCellValue('D1', '試題題目');
					$objPHPExcel->getActiveSheet()->setCellValue('E1', '存檔時間');
					$objPHPExcel->getActiveSheet()->setCellValue('F1', $powerDsc['PowerDsc_A1']);
					$objPHPExcel->getActiveSheet()->setCellValue('G1', $powerDsc['PowerDsc_A2']);
					$objPHPExcel->getActiveSheet()->setCellValue('H1', $powerDsc['PowerDsc_A3']);
					$objPHPExcel->getActiveSheet()->setCellValue('I1', $powerDsc['PowerDsc_B1']);
					$objPHPExcel->getActiveSheet()->setCellValue('J1', $powerDsc['PowerDsc_B2']);
					$objPHPExcel->getActiveSheet()->setCellValue('K1', $powerDsc['PowerDsc_B3']);
					$objPHPExcel->getActiveSheet()->setCellValue('L1', $powerDsc['PowerDsc_C1']);
					$objPHPExcel->getActiveSheet()->setCellValue('M1', $powerDsc['PowerDsc_C2']);
					$objPHPExcel->getActiveSheet()->setCellValue('N1', $powerDsc['PowerDsc_C2']);
					$objPHPExcel->getActiveSheet()->setCellValue('O1', $powerDsc['PowerDsc_D1']);
					$objPHPExcel->getActiveSheet()->setCellValue('P1', $powerDsc['PowerDsc_D2']);
					$objPHPExcel->getActiveSheet()->setCellValue('Q1', $powerDsc['PowerDsc_D3']);
					$objPHPExcel->getActiveSheet()->fromArray($excelDataArray[$x], null, 'A2');//將資料以陣列方式填入excel
					$x++;
				}
			}	
		
		$objPHPExcel->setActiveSheetIndex(0);

		$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
		date_default_timezone_set('Asia/Taipei');
		// Sending headers to force the user to download the file
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$getSchoolName.'_測驗成績.xls"');
		header('Cache-Control: max-age=0');
		$objWriter->save('php://output');
	
	}	
	
	public function chgTeacher(){
		$num = $this->input->post('keyNum');
		//如果是管理員，依照選擇的教師去撈資料
		if($this->session->userdata("loginType") == "root"){
			$this->a_model->chg_Teacher($num);
		}
	}
	
	public function getScorePG(){
		$num = $this->input->post('num');
		//如果是管理員，依照選擇的教師去撈資料
		if(is_numeric($num)){
			$data['scoreData'] = $this->a_model->get_ScorePG($num);
			$data['powerDsc'] = $this->a_model->get_GeneralData();
			$this->load->view('achievementlist/scorepg',$data);
		}
	}

}
