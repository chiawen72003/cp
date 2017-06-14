<?php
/*
*	
*/
class Questionnaire_model extends CI_Model {
    private $input_data = array();

	public function __construct() {
        parent::__construct();
    }

    public function init($getData = array())
    {
        foreach($getData as $k => $v)
        {
            $this -> input_data[$k] = $v;
        }
    }

    /**
     * 取得問卷列表資料
     *
     * @param string $whereArray
     * @param string $limitDsc
     * @param string $offsetDsc
     * @param string $orderByArray
     * @return array
     */
	public function getListData($whereArray='',$limitDsc='',$offsetDsc='',$orderByArray=''){
		$module_array = array(
		'm1' => '閱讀出題模組',
		'm2' => '搶25遊戲模組',
		'm3' => '思樂冰製作遊戲模組',
		'm4' => '最佳銷售組合遊戲模組',
        'm5' => '數學渡河邏輯遊戲模組',
        'm6' => '腳本設計模組',
		);
		
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
			$query = $this->db->get('module_list', $limitDsc, $offsetDsc)->result();
		}else{
			$query = $this->db->get('module_list')->result();
		}
		
		foreach( $query as $row ){
			$tempArray = array();
			foreach($row as $key => $value){
				if($key == 'module_type'){
					$tempArray['module_type'] = $module_array[$value];
				}else{
					$tempArray[$key] = $value;
				}
			}
			$return_Array[] = $tempArray;
		}		
		return $return_Array;
	}

    /**
     * 新增問卷資料
     *
     */
	public function insertData(){
		$sw_model = $this->input->post('module_type');
		$nowdate =  date("Y-m-d H:i",time());
		$tempArray = array(
			'module_type'=>$sw_model,
			'title_dsc'=>$this->input->post('title_dsc'),
			'contents_dsc'=>$this->input->post('contents_dsc'),
			'up_date'=>$nowdate			
		);
		
		if($this->session->userdata("loginType") == "teacher"){
			$tempArray['user_type'] = 'teacher';
			$tempArray['user_num'] = $this->session->userdata("userID");		
		}
		if($this->session->userdata("loginType") == "root"){
			$tempArray['user_type'] = 'root';
		}
		
		$this->db->insert('module_list', $tempArray); 
		$getID = $this->db->insert_id();
		
		//插入資料到模組1
		if( $sw_model == 'm1'){
			$tempArray = array();
			$tempArray[] = $this->input->post('options_1');
			$tempArray[] = $this->input->post('options_2');
			$json_data = json_encode($tempArray);
			$tempArray = array(
				'key_num'=>$getID,
				'text_1_A'=>$this->input->post('text_1_A'),
				'text_1_B'=>$this->input->post('text_1_B'),
				'text_2_A'=>$this->input->post('text_2_A'),
				'text_2_B'=>$this->input->post('text_2_B'),
				'text_3_A'=>$this->input->post('text_3_A'),
				'text_3_B'=>$this->input->post('text_3_B'),
				'option_dsc'=>$json_data,				
				'up_date'=>$nowdate			
			);
			$this->db->insert('module_1_data', $tempArray); 
			//插入關卡敘述leveldsc_list
			$data = array();
			for($x=1;$x<4;$x++){
				$data[] = array(
				  'module_type' => 'm1' ,
				  'module_list_num' => $getID,
				  'level_dsc' => $x,
				  'user_type' => 'A',
				  'html_dsc' => $this->input->post('level_'.$x.'_A'),
				  'up_date'=>$nowdate,
			   );
			}
			for($x=1;$x<4;$x++){
				$data[] = array(
				  'module_type' => 'm1' ,
				  'module_list_num' => $getID,
				  'level_dsc' => $x,
				  'user_type' => 'B',
				  'html_dsc' => $this->input->post('level_'.$x.'_B'),
				  'up_date'=>$nowdate,
			   );
			}		

			$this->db->insert_batch('leveldsc_list', $data);
		}
		
		//插入資料到模組2
		if( $sw_model == 'm2'){
			$json_data = json_encode($_POST);
			$tempArray = array(
				'key_num'=>$getID,
				'value_dsc'=>$json_data,
				'up_date'=>$nowdate			
			);
			$this->db->insert('module_2_data', $tempArray); 

			//插入關卡敘述leveldsc_list
			$data = array();
			for($x=1;$x<7;$x++){
				$data[] = array(
				  'module_type' => 'm2' ,
				  'module_list_num' => $getID,
				  'level_dsc' => $x,
				  'user_type' => 'A',
				  'html_dsc' => $this->input->post('level_'.$x.'_A'),
				  'up_date'=>$nowdate,
			   );
			}
			for($x=1;$x<7;$x++){
				$data[] = array(
				  'module_type' => 'm2' ,
				  'module_list_num' => $getID,
				  'level_dsc' => $x,
				  'user_type' => 'B',
				  'html_dsc' => $this->input->post('level_'.$x.'_B'),
				  'up_date'=>$nowdate,
			   );
			}
			$this->db->insert_batch('leveldsc_list', $data);		
			
		}	
		
		//插入資料到模組3
		if( $sw_model == 'm3'){
			$json_data = json_encode($_POST);
			$tempArray = array(
				'key_num'=>$getID,
				'value_dsc'=>$json_data,
				'up_date'=>$nowdate			
			);
			$this->db->insert('module_3_data', $tempArray); 
			
			//插入關卡敘述leveldsc_list
			$data = array();
			for($x=1;$x<4;$x++){
				$data[] = array(
				  'module_type' => 'm3' ,
				  'module_list_num' => $getID,
				  'level_dsc' => $x,
				  'user_type' => 'A',
				  'html_dsc' => $this->input->post('level_'.$x.'_A'),
				  'up_date'=>$nowdate,
			   );
			}
			for($x=1;$x<4;$x++){
				$data[] = array(
				  'module_type' => 'm3' ,
				  'module_list_num' => $getID,
				  'level_dsc' => $x,
				  'user_type' => 'B',
				  'html_dsc' => $this->input->post('level_'.$x.'_B'),
				  'up_date'=>$nowdate,
			   );
			}
			$this->db->insert_batch('leveldsc_list', $data);
		}
		//插入資料到模組4
		if( $sw_model == 'm4'){
			$tempArray = array(
				'key_num'=>$getID,
				'value_dsc_c'=>$this->input->post('value_dsc_c'),				
				'value_dsc_m'=>$this->input->post('value_dsc_m'),				
				'value_dsc_l'=>$this->input->post('value_dsc_l'),				
				'up_date'=>$nowdate			
			);
			$this->db->insert('module_4_data', $tempArray); 
			//插入關卡敘述leveldsc_list
			$data = array();
			for($x=1;$x<2;$x++){
				$data[] = array(
				  'module_type' => 'm4' ,
				  'module_list_num' => $getID,
				  'level_dsc' => $x,
				  'user_type' => 'A',
				  'html_dsc' => $this->input->post('level_'.$x.'_A'),
				  'up_date'=>$nowdate,
			   );
			}
			for($x=1;$x<2;$x++){
				$data[] = array(
				  'module_type' => 'm4' ,
				  'module_list_num' => $getID,
				  'level_dsc' => $x,
				  'user_type' => 'B',
				  'html_dsc' => $this->input->post('level_'.$x.'_B'),
				  'up_date'=>$nowdate,
			   );
			}		

			$this->db->insert_batch('leveldsc_list', $data);
		}
        //插入資料到模組5
        if( $sw_model == 'm5'){
            $tempArray = array(
                'key_num'=>$getID,
                'up_date'=>$nowdate
            );
            $this->db->insert('module_5_data', $tempArray);

            //插入關卡敘述leveldsc_list
            $data = array();
            for($x=1;$x<3;$x++){
                $data[] = array(
                    'module_type' => 'm5' ,
                    'module_list_num' => $getID,
                    'level_dsc' => $x,
                    'user_type' => 'A',
                    'html_dsc' => $this->input->post('level_'.$x.'_A'),
                    'up_date'=>$nowdate,
                );
            }
            for($x=1;$x<3;$x++){
                $data[] = array(
                    'module_type' => 'm5' ,
                    'module_list_num' => $getID,
                    'level_dsc' => $x,
                    'user_type' => 'B',
                    'html_dsc' => $this->input->post('level_'.$x.'_B'),
                    'up_date'=>$nowdate,
                );
            }

            $this->db->insert_batch('leveldsc_list', $data);
        }
		//插入資料到模組6
		if( $sw_model == 'm6'){
			$tempArray = array(
				'key_num'=>$getID,
				'up_date'=>$nowdate,
                'unit' => $this->input->post('unit'),
                'paper' => $this->input->post('paper'),
                'questions' => $this->input->post('questions'),
                'model' => $this->input->post('model'),

            );
			$this->db->insert('module_6_data', $tempArray);

			//插入關卡敘述leveldsc_list
			$data = array();
            $data[] = array(
              'module_type' => 'm6' ,
              'module_list_num' => $getID,
              'level_dsc' => '1',
              'user_type' => 'A',
              'html_dsc' => $this->input->post('contents_dsc'),
              'up_date'=>$nowdate,
           );

            $data[] = array(
                'module_type' => 'm6' ,
                'module_list_num' => $getID,
                'level_dsc' => '1',
                'user_type' => 'B',
                'html_dsc' => $this->input->post('contents_dsc'),
                'up_date'=>$nowdate,
            );

			$this->db->insert_batch('leveldsc_list', $data);			
		}

    }

    /**
     * 更新問卷資料
     *
     * @param $num
     */
	public function updateModelData($num){
		$sw_model = $this->input->post('module_type');
		$nowdate =  date("Y-m-d H:i",time());
		$tempArray = array(
			'module_type'=>$sw_model,
			'title_dsc'=>$this->input->post('title_dsc'),
			'contents_dsc'=>$this->input->post('contents_dsc'),
			'up_date'=>$nowdate			
		);

		if($this->session->userdata("loginType") == "teacher"){
			$tempArray['user_type'] = 'teacher';
			$tempArray['user_num'] = $this->session->userdata("userID");		
		}
		if($this->session->userdata("loginType") == "root"){
			$tempArray['user_type'] = 'root';
		}		
		
		$this->db->where('num',$num);		
		$this->db->update('module_list', $tempArray); 
		
		//更新資料到模組1
		if( $sw_model == 'm1'){
			$tempArray = array();
			$tempArray[] = $this->input->post('options_1');
			$tempArray[] = $this->input->post('options_2');
			$json_data = json_encode($tempArray);
			$tempArray = array(
				'text_1_A'=>$this->input->post('text_1_A'),
				'text_1_B'=>$this->input->post('text_1_B'),
				'text_2_A'=>$this->input->post('text_2_A'),
				'text_2_B'=>$this->input->post('text_2_B'),
				'text_3_A'=>$this->input->post('text_3_A'),
				'text_3_B'=>$this->input->post('text_3_B'),
				'option_dsc'=>$json_data,				
				'up_date'=>$nowdate			
			);
			$this->db->where('key_num',$num);		
			$this->db->update('module_1_data', $tempArray); 
			
			//刪除關卡敘述
			$this->db->where('module_type', 'm1');
			$this->db->where('module_list_num', $num);
			$this->db->delete('leveldsc_list'); 
			//插入關卡敘述
			$data = array();
			for($x=1;$x<4;$x++){
				$data[] = array(
				  'module_type' => 'm1' ,
				  'module_list_num' => $num,
				  'level_dsc' => $x,
				  'user_type' => 'A',
				  'html_dsc' => $this->input->post('level_'.$x.'_A'),
				  'up_date'=>$nowdate,
			   );
			}
			for($x=1;$x<4;$x++){
				$data[] = array(
				  'module_type' => 'm1' ,
				  'module_list_num' => $num,
				  'level_dsc' => $x,
				  'user_type' => 'B',
				  'html_dsc' => $this->input->post('level_'.$x.'_B'),
				  'up_date'=>$nowdate,
			   );
			}
			$this->db->insert_batch('leveldsc_list', $data);
		}
		
		//更新資料到模組2
		if( $sw_model == 'm2'){
			$json_data = json_encode($_POST);
			$tempArray = array(
				'value_dsc'=>$json_data,
				'up_date'=>$nowdate			
			);
			$this->db->where('key_num',$num);		
			$this->db->update('module_2_data', $tempArray); 
			//刪除關卡敘述
			$this->db->where('module_type', 'm2');
			$this->db->where('module_list_num', $num);
			$this->db->delete('leveldsc_list'); 
			//插入關卡敘述
			$data = array();
			for($x=1;$x<7;$x++){
				$data[] = array(
				  'module_type' => 'm2' ,
				  'module_list_num' => $num,
				  'level_dsc' => $x,
				  'user_type' => 'A',
				  'html_dsc' => $this->input->post('level_'.$x.'_A'),
				  'up_date'=>$nowdate,
			   );
			}
			for($x=1;$x<7;$x++){
				$data[] = array(
				  'module_type' => 'm2' ,
				  'module_list_num' => $num,
				  'level_dsc' => $x,
				  'user_type' => 'B',
				  'html_dsc' => $this->input->post('level_'.$x.'_B'),
				  'up_date'=>$nowdate,
			   );
			}
			$this->db->insert_batch('leveldsc_list', $data);			
		}	
		//更新資料到模組3
		if( $sw_model == 'm3'){
			$json_data = json_encode($_POST);
			$tempArray = array(
				'value_dsc'=>$json_data,
				'up_date'=>$nowdate			
			);
			$this->db->where('key_num',$num);		
			$this->db->update('module_3_data', $tempArray); 
			//刪除關卡敘述
			$this->db->where('module_type', 'm3');
			$this->db->where('module_list_num', $num);
			$this->db->delete('leveldsc_list'); 
			//插入關卡敘述
			$data = array();
			for($x=1;$x<4;$x++){
				$data[] = array(
				  'module_type' => 'm3' ,
				  'module_list_num' => $num,
				  'level_dsc' => $x,
				  'user_type' => 'A',
				  'html_dsc' => $this->input->post('level_'.$x.'_A'),
				  'up_date'=>$nowdate,
			   );
			}
			for($x=1;$x<4;$x++){
				$data[] = array(
				  'module_type' => 'm3' ,
				  'module_list_num' => $num,
				  'level_dsc' => $x,
				  'user_type' => 'B',
				  'html_dsc' => $this->input->post('level_'.$x.'_B'),
				  'up_date'=>$nowdate,
			   );
			}
			$this->db->insert_batch('leveldsc_list', $data);			
		}
		//更新資料到模組4
		if( $sw_model == 'm4'){
			$tempArray = array(
				'value_dsc_c'=>$this->input->post('value_dsc_c'),				
				'value_dsc_m'=>$this->input->post('value_dsc_m'),				
				'value_dsc_l'=>$this->input->post('value_dsc_l'),				
				'up_date'=>$nowdate			
			);
			$this->db->where('key_num',$num);		
			$this->db->update('module_4_data', $tempArray); 
			//刪除關卡敘述
			$this->db->where('module_type', 'm4');
			$this->db->where('module_list_num', $num);
			$this->db->delete('leveldsc_list'); 
			//插入關卡敘述
			$data = array();
			for($x=1;$x<2;$x++){
				$data[] = array(
				  'module_type' => 'm4' ,
				  'module_list_num' => $num,
				  'level_dsc' => $x,
				  'user_type' => 'A',
				  'html_dsc' => $this->input->post('level_'.$x.'_A'),
				  'up_date'=>$nowdate,
			   );
			}
			for($x=1;$x<2;$x++){
				$data[] = array(
				  'module_type' => 'm4' ,
				  'module_list_num' => $num,
				  'level_dsc' => $x,
				  'user_type' => 'B',
				  'html_dsc' => $this->input->post('level_'.$x.'_B'),
				  'up_date'=>$nowdate,
			   );
			}
			$this->db->insert_batch('leveldsc_list', $data);			
		}
		//更新資料到模組5
		if( $sw_model == 'm5'){
			$tempArray = array(
				'up_date'=>$nowdate			
			);
			$this->db->where('key_num',$num);		
			$this->db->update('module_5_data', $tempArray); 
			
			//刪除關卡敘述
			$this->db->where('module_type', 'm5');
			$this->db->where('module_list_num', $num);
			$this->db->delete('leveldsc_list'); 
			//插入關卡敘述
			$data = array();
			for($x=1;$x<3;$x++){
				$data[] = array(
				  'module_type' => 'm5' ,
				  'module_list_num' => $num,
				  'level_dsc' => $x,
				  'user_type' => 'A',
				  'html_dsc' => $this->input->post('level_'.$x.'_A'),
				  'up_date'=>$nowdate,
			   );
			}
			for($x=1;$x<3;$x++){
				$data[] = array(
				  'module_type' => 'm5' ,
				  'module_list_num' => $num,
				  'level_dsc' => $x,
				  'user_type' => 'B',
				  'html_dsc' => $this->input->post('level_'.$x.'_B'),
				  'up_date'=>$nowdate,
			   );
			}
			$this->db->insert_batch('leveldsc_list', $data);			
		}
        //更新資料到模組6
        if( $sw_model == 'm6'){
            $tempArray = array(
                'up_date'=>$nowdate,
                'unit' => $this->input->post('unit'),
                'paper' => $this->input->post('paper'),
                'questions' => $this->input->post('questions'),
                'model' => $this->input->post('model'),
            );
            $this->db->where('key_num',$num);
            $this->db->update('module_6_data', $tempArray);

            //刪除關卡敘述
            $this->db->where('module_type', 'm6');
            $this->db->where('module_list_num', $num);
            $this->db->delete('leveldsc_list');
            //插入關卡敘述
            $data = array();
            $data[] = array(
                'module_type' => 'm6' ,
                'module_list_num' => $num,
                'level_dsc' => '1',
                'user_type' => 'A',
                'html_dsc' => $this->input->post('contents_dsc'),
                'up_date'=>$nowdate,
            );

            $data[] = array(
                'module_type' => 'm6' ,
                'module_list_num' => $num,
                'level_dsc' => '1',
                'user_type' => 'B',
                'html_dsc' => $this->input->post('contents_dsc'),
                'up_date'=>$nowdate,
            );

            $this->db->insert_batch('leveldsc_list', $data);
        }
	}

    /**
     * 刪除問卷資料
     *
     * @param $num
     */
	public function del($num){
		if( is_numeric($num) ){
			$tArray = array(
				'is_del'=>'1',
			);
			
			if($this->session->userdata("loginType") == "teacher"){
				$this->db->where('user_type','teacher');	
				$this->db->where('user_num',$this->session->userdata("userID"));			
			}
			$this->db->where('num',$num);
			$this->db->update('module_list', $tArray); 
		}
	}
}