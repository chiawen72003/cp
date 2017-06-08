<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*	前端測驗題目列表
*	index() 測驗題目列表
*	recordlist() 操作紀錄列表
*	testPG() 測驗頁面
*	recordPG() 操作紀錄頁面
*	saveOptionData() 儲存操作紀錄
*	saveTempOptionData() 儲存暫存操作紀錄
*	getScorePG() 顯示得分頁面
*/

class Testlist extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->helper(array('url','form'));
		
		$this->load->model('testlist/testlist_model');
		$this->load->model('publicfunction/sqlfunction', 'sqlfunction');
		
		if($this->session->userdata("loginType") == ""){
			redirect('/memck/logout','refresh');
		}
	}
	
	public function index()
	{

		$this->load->library('layout');//套用樣板為layout_main
		$this->layout->setLayout('layout/front/layout');//套用樣板

		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['QuationsData'] = $this->testlist_model->getQuationsData();//老師設定的試題資料
		$data['QuationsClassData'] = $this->testlist_model->getQuationsClassData();//試題-班級對應資料
		
		$data['myName'] = $this->session->userdata("userName");
		$data['menuList'] = array(
			array(
			'name'=>'操作紀錄列表',
			'urlDsc'=>'testlist/recordlist/',
			),
		);
		
		$this->layout->view('testlist/index',$data);
	}
	
	public function testPG(){
		$num = $this->input->get('num');
		$mod = $this->input->post('mod');
		
		$canTest = $this->testlist_model->can_Test($num);
		if($canTest){
			$data = array();
			$data['base'] = $this->config->item('base_url');
			$data['roomID'] = $this->session->userdata("roomID");
			$data['GeneralData'] = $this->testlist_model->getGeneralData();//通用設定
			$data['num'] = $this->input->get('num');
			$data['TempRecordData'] = $this->testlist_model->get_TempRecordData($num);//取回暫存操作紀錄
		
			if( is_numeric($num) and is_numeric($mod) ){
				//載入下一個模組
				
				
			}else if( is_numeric($num) ){
				//預設進入點
				$this->load->library('layout');//套用樣板為layout_main
				$this->layout->setLayout('layout/testpg/layout');//套用樣板
				$data['model_data'] = $this->testlist_model->get_ModuleDsc($num,$mod);
				foreach($data['model_data']['switchModel'] as $value){
					//閱讀出題模組
					if($value == '1'){
						$data['model_data']['switchModelData'][] =  $this->load->view('modelpg/model1/index',$data,true);
					}
					//搶25遊戲模組
					if($value == '2'){
						if($data['model_data']['userType'] == 'A'){
							$data['model_data']['switchModelData'][] = $this->load->view('modelpg/model2/index_a',$data,true);
						}
						if($data['model_data']['userType'] == 'B'){
							$data['model_data']['switchModelData'][] = $this->load->view('modelpg/model2/index_b',$data,true);
						}
						
					}
					//思樂冰製作遊戲模組
					if($value == '3'){
						if($data['model_data']['userType'] == 'A'){
							$data['model_data']['switchModelData'][] = $this->load->view('modelpg/model3/index_a',$data,true);
						}
						if($data['model_data']['userType'] == 'B'){
							$data['model_data']['switchModelData'][] = $this->load->view('modelpg/model3/index_b',$data,true);
						}
					}
					//最佳銷售組合模組
					if($value == '4'){
						if($data['model_data']['userType'] == 'A'){
							$data['model_data']['switchModelData'][] = $this->load->view('modelpg/model4/index_a',$data,true);
						}
						if($data['model_data']['userType'] == 'B'){
							$data['model_data']['switchModelData'][] = $this->load->view('modelpg/model4/index_b',$data,true);
						}
					}
                    //數學渡河邏輯遊戲模組
                    if($value == '5'){
                        $data['model_data']['switchModelData'][] = $this->load->view('modelpg/model5/index',$data,true);
                    }
                    //腳本設計模組
                    if($value == '6'){
                        $page = '';
                        if(isset($data['model_data']['modelData_6']['model']))
                        {
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1/ntcu/public/Api/Model/Page/".$data['model_data']['modelData_6']['model']);
                            curl_setopt($ch, CURLOPT_HEADER, 0);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            $page = curl_exec($ch);
                            curl_close($ch);
                        }
                        $data['model_data']['modelData_6']['page_model'] = $page;
                        $data['model_data']['switchModelData'][] = $this->load->view('modelpg/model6/index',$data,true);
                    }
				}
				$this->layout->view('testlist/testpg',$data);
			}else{
				redirect('/memck/logout','refresh');
			}
		}else{
				redirect('/memck/logout','refresh');
		}

	}
	
	public function saveOptionData(){
		if(isset($_POST) and count($_POST) > 0){
			$this->testlist_model->save_OptionData();
		}
		redirect('/testlist/','refresh');
	}
	
	public function saveTempOptionData(){
		if(isset($_POST) and count($_POST) > 0){
			$this->testlist_model->save_TempOptionData();
		}
	}
	
	public function recordlist(){
		$this->load->library('layout');//套用樣板為layout_main
		$this->layout->setLayout('layout/front/layout');//套用樣板

		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['listData'] = $this->testlist_model->getRecordListData();
		$data['myName'] = $this->session->userdata("userName");
		$data['menuList'] = array(
			array(
			'name'=>'試題列表',
			'urlDsc'=>'testlist/',
			'target'=>'false',
			),
			array(
			'name'=>'匯出成績',
			'urlDsc'=>'testlist/getMyExcel',
			'target'=>'true',			
			),
		);
		$this->layout->view('testlist/recordlist',$data);
	}
	
	public function recordPG(){
		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['roomID'] = $this->session->userdata("roomID");
		$data['GeneralData'] = $this->testlist_model->getGeneralData();//通用設定
		$data['num'] = $this->input->get('num');
		$data['r_num'] = $this->input->get('num');

		$r_num = $this->input->get('r_num');
		$num = $this->input->get('num');
		
		$isMyRecord = $this->testlist_model->getIsMyRecord($r_num,$num);
		
		if( $isMyRecord ){
			$this->load->library('layout');//套用樣板為layout_main
			$this->layout->setLayout('layout/testpg/layout');//套用樣板
			$data['model_data'] = $this->testlist_model->get_ModuleDsc($num,'');
			foreach($data['model_data']['switchModel'] as $value){
				//閱讀出題模組
				if($value == '1'){
					$data['model_data']['switchModelData'][] =  $this->load->view('modelpg/model1/index',$data,true);
				}
				//搶25遊戲模組
				if($value == '2'){
					if($data['model_data']['userType'] == 'A'){
						$data['model_data']['switchModelData'][] = $this->load->view('modelpg/model2/index_a',$data,true);
					}
					if($data['model_data']['userType'] == 'B'){
						$data['model_data']['switchModelData'][] = $this->load->view('modelpg/model2/index_b',$data,true);
					}
					
				}
				//思樂冰製作遊戲模組
				if($value == '3'){
					if($data['model_data']['userType'] == 'A'){
						$data['model_data']['switchModelData'][] = $this->load->view('modelpg/model3/index_a',$data,true);
					}
					if($data['model_data']['userType'] == 'B'){
						$data['model_data']['switchModelData'][] = $this->load->view('modelpg/model3/index_b',$data,true);
					}
				}
				//最佳銷售組合模組
				if($value == '4'){
					if($data['model_data']['userType'] == 'A'){
						$data['model_data']['switchModelData'][] = $this->load->view('modelpg/model4/index_a',$data,true);
					}
					if($data['model_data']['userType'] == 'B'){
						$data['model_data']['switchModelData'][] = $this->load->view('modelpg/model4/index_b',$data,true);
					}
				}
				//數學渡河邏輯遊戲模組
				if($value == '5'){
					$data['model_data']['switchModelData'][] = $this->load->view('modelpg/model5/index',$data,true);
				}
			}
			
			$data['RecordData'] = $this->testlist_model->get_RecordData($r_num,$num);
			$data['backView'] = 'ok';
			$data['isView'] = 'true';
			
			$this->layout->view('testlist/testpg',$data);
		}else{
			redirect('/memck/logout','refresh');
		}
	}
	
	public function getMyExcel(){
		$excelDataArray = array();
		$allQData = $this->testlist_model->get_AllQData();//所有試題的資料
				
		$this->db->where('student_num',$this->session->userdata("userID"));
		$query = $this->db->get('scores_list')->result();
		if(!$query){return false;}
		$x=1;
		foreach( $query as $row ){
			$tempArray = array();
			$tempArray[] = $x;
			$tempArray[] = $this->session->userdata("userName");
			$tempArray[] = $allQData[$row->questions_num];
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

			// Starting the PHPExcel library
			$this->load->library('PHPExcel');
			$this->load->library('PHPExcel/IOFactory');

			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setTitle("export")->setDescription("none"); 
			$objPHPExcel->setActiveSheetIndex(0);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', '編號');
			$objPHPExcel->getActiveSheet()->setCellValue('B1', '學生名稱');
			$objPHPExcel->getActiveSheet()->setCellValue('C1', '試題題目');
			$objPHPExcel->getActiveSheet()->setCellValue('D1', '操作日期');
			$objPHPExcel->getActiveSheet()->setCellValue('E1', 'A1');		
			$objPHPExcel->getActiveSheet()->setCellValue('F1', 'A2');
			$objPHPExcel->getActiveSheet()->setCellValue('G1', 'A3');
			$objPHPExcel->getActiveSheet()->setCellValue('H1', 'B1');		
			$objPHPExcel->getActiveSheet()->setCellValue('I1', 'B2');
			$objPHPExcel->getActiveSheet()->setCellValue('J1', 'B3');
			$objPHPExcel->getActiveSheet()->setCellValue('K1', 'C1');		
			$objPHPExcel->getActiveSheet()->setCellValue('L1', 'C2');
			$objPHPExcel->getActiveSheet()->setCellValue('M1', 'C3');
			$objPHPExcel->getActiveSheet()->setCellValue('N1', 'D1');		
			$objPHPExcel->getActiveSheet()->setCellValue('O1', 'D2');
			$objPHPExcel->getActiveSheet()->setCellValue('P1', 'D3');
	 

				
			$objPHPExcel->getActiveSheet()->fromArray($excelDataArray, null, 'A2');//將資料以陣列方式填入excel
			for($x=0,$y=1;$x<50;$x++,$y++){
				$countArray[] = $y;
			}
		$objPHPExcel->setActiveSheetIndex(0);

		$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
		date_default_timezone_set('Asia/Taipei');
		// Sending headers to force the user to download the file
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$this->session->userdata("userName").'_測驗成績.xls"');
		header('Cache-Control: max-age=0');
		$objWriter->save('php://output');
	
	}
	
	public function getScorePG(){
		$num = $this->input->post('num');
		//如果是管理員，依照選擇的教師去撈資料
		if(is_numeric($num)){
			$data['scoreData'] = $this->testlist_model->get_ScorePG($num);
			$data['powerDsc'] = $this->testlist_model->get_GeneralData();
			$this->load->view('testlist/scorepg',$data);
		}
	}
}
