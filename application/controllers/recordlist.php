<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*	操作紀錄介面( for 管理員、教師 )
*/

class Recordlist extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->helper(array('url','form'));
		
		$this->load->model('recordlist/recordlist_model');
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
		if($this->session->userdata("loginType") == "teacher"){
			$whereArray['teacher_num'] = $this->session->userdata("userID");		
		}

		//如果是管理員，依照選擇的教師去撈資料
		if($this->session->userdata("loginType") == "root"){
			$whereArray['teacher_num'] = $this->session->userdata("tempTeacherNum");
			$data['teacherList'] = $this->recordlist_model->getTeacherList();
		}
		
		$orderByArray = array('num'=>'DESC');
		$offsetDsc = 0;//目前頁面數
		$limitDsc = 10;//一頁顯示幾筆資料
		$data['offsetDsc'] = '';
		
		if(is_numeric($this->input->get('per_page'))){
			$offsetDsc = $this->input->get('per_page');
			$data['offsetDsc'] = $offsetDsc;			
		}
		
		$allNum = $this->sqlfunction->get_allDataNum('option_record',$whereArray);//總資料數量
		$config['base_url'] = $data['base'].'index.php/recordlist/index/?xx=';
		$config['total_rows'] = $allNum;
		$config['per_page'] = $limitDsc;
		$config['page_query_string'] = true;
/* 		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['cur_tag_open'] = '<li class="current"><a>';//目前頁面左邊標籤。
		$config['cur_tag_close'] = '</a></li>';//目前頁面右邊標籤。
		$config['num_tag_open'] = '<li>';//分頁數字連結左邊標籤。
		$config['num_tag_close'] = '</li>';//分頁數字連結右邊標籤。
		$config['next_tag_open'] = '<li class="arrow">';//下一頁連結左邊標籤。
		$config['next_tag_close'] = '</li>';//下一頁連結右邊標籤。		
		$config['prev_tag_open'] = '<li class="arrow unavailable">';//上一頁連結左邊標籤。
		$config['prev_tag_close'] = '</li>';//上一頁連結右邊標籤。	
		$config['next_tag_open'] = '<li class="arrow">';//下一頁連結左邊標籤。
		$config['next_tag_close'] = '</li>';//下一頁連結右邊標籤。		
		$config['first_tag_open'] = '<li >';//第一頁連結左邊標籤。
		$config['first_tag_close'] = '</li>';//第一頁連結右邊標籤。		
		$config['last_tag_open'] = '<li>';//最後一頁連結左邊標籤。
		$config['last_tag_close'] = '</li>';//最後一頁連結右邊標籤。 */		
		$this->pagination->initialize($config);
		
		//取出所需資料
		$data['listData'] = $this->recordlist_model->getListData($whereArray,$limitDsc,$offsetDsc,$orderByArray);
		$data['studentData'] = $this->recordlist_model->getStudentData();//教師下所有學生資料
		$data['quationsData'] = $this->recordlist_model->getQuationData();//教師的試題資料
		$data['classData'] = $this->recordlist_model->getClassData();//教師的班級資料
		$data['pagination'] = $this->pagination->create_links();//ci產生的分頁html code
		$this->layout->view('recordlist/index',$data);
	}
	
	public function recordPG(){
		$data = array();
		$data['base'] = $this->config->item('base_url');
		$data['roomID'] = $this->session->userdata("roomID");
		$data['GeneralData'] = $this->recordlist_model->getGeneralData();//通用設定
		$data['num'] = $this->input->get('num');
		$data['r_num'] = $this->input->get('num');
		$data['u_type'] = $this->input->get('u_type');

		$r_num = $this->input->get('r_num');//操作紀錄的num
		$num = $this->input->get('num');//試題的num
		$u_type = $this->input->get('u_type');//學生類別
		
		
		$this->load->library('layout');//套用樣板為layout_main
		$this->layout->setLayout('layout/testpg/layout');//套用樣板
		$data['model_data'] = $this->recordlist_model->get_ModuleDsc($num,$u_type);
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
		
		$data['RecordData'] = $this->recordlist_model->get_RecordData($r_num,$num);
		$data['backView'] = 'yes';
		$data['isView'] = 'true';
		
		$this->layout->view('testlist/testpg',$data);
	}
	
	public function chgTeacher(){
		$num = $this->input->post('keyNum');
		//如果是管理員，依照選擇的教師去撈資料
		if($this->session->userdata("loginType") == "root"){
			$this->recordlist_model->chg_Teacher($num);
		}
	}

    /**
     * 輸出操作紀錄成excel
     */
    public function getExcel()
    {
        $record_num = $this->input->get('num');//option_record的num
        $questions_num = $this->input->get('qnum');
        $whereArray = array(
            'num' => $record_num,
            'questions_num' => $questions_num,
        );
        $record_data = $this->recordlist_model->getListData($whereArray);
        if(is_array($record_data))
        {
            foreach ($record_data as $data)
            {
                $record_data = json_decode($data['record_value'], true);
            }
        }

        // Starting the PHPExcel library
        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'roomId');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'userType');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'userName');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'dataType');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'dataType_Dsc');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'dataFunction');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'dataFunction_ObjID');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'dataFunction_Value');
        $objPHPExcel->getActiveSheet()->fromArray($record_data, null, 'A2');//將資料以陣列方式填入excel
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
        date_default_timezone_set('Asia/Taipei');
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="操作紀錄.xls"');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');

    }
}
