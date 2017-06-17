<?php
/*
*	
*/
class Questionnaire_model extends CI_Model {
    private $input_data = array(
        'num' => null,
    );

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
			$query = $this->db->get('questionnaire_list', $limitDsc, $offsetDsc)->result();
		}else{
			$query = $this->db->get('questionnaire_list')->result();
		}
		
		foreach( $query as $row ){
			$tempArray = array();
			foreach($row as $key => $value){
                $tempArray[$key] = $value;
			}
			$return_Array[] = $tempArray;
		}

		return $return_Array;
	}

    /**
     * 取得單一問卷的設定資料
     */
	public function get_data()
    {
        $t = array();
        if($this->input_data['num'])
        {
            $this->db->where('num', $this->input_data['num']);
            $query = $this->db->get('questionnaire_list')->result();
            foreach( $query as $row ){
                $t['title_dsc'] = $row ->title_dsc;
                $t['contents_dsc'] = $row ->contents_dsc;
                $t['item_data'] = '';

                $this->db->where('questionnaire_list_num', $this->input_data['num']);
                $query2 = $this->db->get('questionnaire_data')->result();
                foreach( $query2 as $row2 ){
                    $t['item_data'] = $row2 -> item_data;
                }
            }
        }

        return $t;
    }

    /**
     * 新增問卷資料
     *
     */
	public function insertData(){
        $tempArray = array();
        $tempArray['title_dsc'] = $this -> input_data['title_dsc'];
        $tempArray['contents_dsc'] = $this -> input_data['contents_dsc'];
        $tempArray['up_date'] = date("Y-m-d H:i",time());

        if($this->session->userdata("loginType") == "teacher"){
            $tempArray['user_type'] = 'teacher';
            $tempArray['user_num'] = $this->session->userdata("userID");
        }
        if($this->session->userdata("loginType") == "root"){
            $tempArray['user_type'] = 'root';
        }
        $this->db->insert('questionnaire_list', $tempArray);
        $getID = $this->db->insert_id();

        //整理問卷物件，插入資料表
        $t_array = array();
        $item_area_num = $this -> input_data['item_area_num'];
        if(is_array($item_area_num))
        {
            foreach ($item_area_num as $key => $num)
            {
                $temp_data = array();
                $temp_data['title'] = $this -> input_data['item_title'][$key];
                $temp_data['type'] = $this -> input_data['item_type'][$key];
                $temp_data['items'] = array();
                if($temp_data['type'] == 'checkbox' )
                {
                    $temp_data['items'] = $this -> input_data['checkbox_value_'. $num];
                }
                if($temp_data['type'] == 'radiobox')
                {
                    $temp_data['items'] = $this -> input_data['radiobox_value_'. $num];
                }
                $t_array[] = $temp_data;
            }
        }
        $tempArray = array();
        $tempArray['questionnaire_list_num'] = $getID;
        $tempArray['item_data'] = json_encode($t_array);
        $this->db->insert('questionnaire_data', $tempArray);
    }

    /**
     * 更新問卷資料
     *
     * @param $num
     */
	public function updateData(){
	    if($this -> input_data['num'])
	    {

            $tempArray['title_dsc'] = $this -> input_data['title_dsc'];
            $tempArray['contents_dsc'] = $this -> input_data['contents_dsc'];
            $tempArray['up_date'] = date("Y-m-d H:i",time());

            if($this->session->userdata("loginType") == "teacher"){
                $tempArray['user_type'] = 'teacher';
                $tempArray['user_num'] = $this->session->userdata("userID");
            }
            if($this->session->userdata("loginType") == "root"){
                $tempArray['user_type'] = 'root';
            }
            $this->db->where('num',$this-> input_data['num']);
            $this->db->update('questionnaire_list', $tempArray);

            //整理問卷物件，插入資料表
            $t_array = array();
            $item_area_num = $this -> input_data['item_area_num'];
            if(is_array($item_area_num))
            {
                foreach ($item_area_num as $key => $num)
                {
                    $temp_data = array();
                    $temp_data['title'] = $this -> input_data['item_title'][$key];
                    $temp_data['type'] = $this -> input_data['item_type'][$key];
                    $temp_data['items'] = array();
                    if($temp_data['type'] == 'checkbox' )
                    {
                        $temp_data['items'] = $this -> input_data['checkbox_value_'. $num];
                    }
                    if($temp_data['type'] == 'radiobox')
                    {
                        $temp_data['items'] = $this -> input_data['radiobox_value_'. $num];
                    }
                    $t_array[] = $temp_data;
                }
            }
            $tempArray = array();
            $tempArray['item_data'] = json_encode($t_array);
            $this->db->where('questionnaire_list_num',$this-> input_data['num']);
            $this->db->update('questionnaire_data', $tempArray);
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