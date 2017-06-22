<?php

/*
*	
*/

class Materials_model extends CI_Model
{
    private $input_data = array(
        'num' => null,
        'user_type' => null,
        'user_num' => null,
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function init($getData = array())
    {
        foreach ($getData as $k => $v) {
            $this->input_data[$k] = $v;
        }
    }

    /**
     * 取得試卷教材列表資料
     *
     * @param string $whereArray
     * @param string $limitDsc
     * @param string $offsetDsc
     * @param string $orderByArray
     *
     * @return array
     */
    public function getListData($whereArray = '', $limitDsc = '', $offsetDsc = '', $orderByArray = '')
    {
        $return_Array = array();
        if (is_array($whereArray)) {
            foreach ($whereArray as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        if (is_array($orderByArray)) {
            foreach ($orderByArray as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }
        if ($limitDsc > '' and $offsetDsc > '') {
            $query = $this->db->get('materials_list', $limitDsc, $offsetDsc)->result();
        } else {
            $query = $this->db->get('materials_list')->result();
        }

        foreach ($query as $row) {
            $tempArray = array();
            foreach ($row as $key => $value) {
                $tempArray[$key] = $value;
            }
            $return_Array[] = $tempArray;
        }

        return $return_Array;
    }

    /**
     * 取得試卷教材num跟title組合的資料
     *
     * @param string $whereArray
     * @param string $limitDsc
     * @param string $offsetDsc
     * @param string $orderByArray
     *
     * @return array
     */
    public function getTitleData()
    {
        $return_Array = array();
        $query = $this->db->get('materials_list')->result();

        foreach ($query as $row) {
            $return_Array[$row->num] = $row->title_dsc;
        }

        return $return_Array;
    }


    /**
     * 取得單一試卷教材的設定資料
     */
    public function get_data()
    {
        $t = array();
        if ($this->input_data['num']) {
            $this->db->where('num', $this->input_data['num']);
            if (!is_null($this->input_data['user_type'])) {
                $this->db->where('user_type', $this->input_data['user_type']);
            }
            if (!is_null($this->input_data['user_num'])) {
                $this->db->where('user_num', $this->input_data['user_num']);
            }
            $query = $this->db->get('materials_list')->result();
            foreach ($query as $row) {
                $t['title_dsc'] = $row->title_dsc;
                $t['contents_dsc'] = $row->contents_dsc;
                $t['can_up_file'] = $row->can_up_file;
                $t['can_write'] = $row->can_write;
                $t['file_data'] = json_decode($row->file_data, true);
            }

        }

        return $t;
    }

    /**
     * 新增試卷教材資料
     *
     */
    public function insertData()
    {
        $tempArray = array();
        $tempArray['title_dsc'] = $this->input_data['title_dsc'];
        $tempArray['contents_dsc'] = $this->input_data['contents_dsc'];
        if(isset($this -> input_data['can_up_file']))
        {
            $tempArray['can_up_file'] = $this -> input_data['can_up_file'];
        }
        if(isset($this -> input_data['can_write']))
        {
            $tempArray['can_write'] = $this -> input_data['can_write'];
        }

        $tempArray['up_date'] = date("Y-m-d H:i", time());

        if ($this->session->userdata("loginType") == "teacher") {
            $tempArray['user_type'] = 'teacher';
            $tempArray['user_num'] = $this->session->userdata("userID");
        }
        if ($this->session->userdata("loginType") == "root") {
            $tempArray['user_type'] = 'root';
        }

        //設定附件的路徑
        $upFload = date("Ymd", time());
        $upFileFload = "./upFILE/materials/".$upFload;
        $upFile = $upFileFload."/";
        if (!is_dir($upFileFload)) {      //檢察upload資料夾是否存在
            if (!mkdir($upFile)) { //不存在的話就創建upload資料夾
                //die ("上傳目錄不存在，並且創建失敗");
            }
        }
        $file_data = array();

        $config['upload_path'] = $upFileFload;//以根目錄為起點的位置
        $config['allowed_types'] = '*';
        //$config['max_size']	= '100';
        //$config['max_width']  = '1024';
        //$config['max_height']  = '768';
        $config['encrypt_name'] = true;//隨機取名字
        $this->load->library('upload', $config);
       // die(var_dump($this->upload->do_upload('up_img') ));
        if (!$this->upload->do_upload('up_file')) {
           // $error = array('error' => $this->upload->display_errors());
        } else {
            $getDataArray = $this->upload->data();//取得資訊
            $t  = array(
                'file_path' => $upFload.'/'.$getDataArray['file_name'],
                'file_name' => $getDataArray['orig_name'],
            );

            $file_data[] = $t;
        }
        $tempArray['file_data'] = json_encode($file_data);
        $this->db->insert('materials_list', $tempArray);
        $this->db->insert_id();
    }

    /**
     * 更新試卷教材資料
     *
     * @param $num
     */
    public function updateData()
    {
        if ($this->input_data['num']) {

            $tempArray['title_dsc'] = $this->input_data['title_dsc'];
            $tempArray['contents_dsc'] = $this->input_data['contents_dsc'];
            $tempArray['can_up_file'] =  isset($this -> input_data['can_up_file'])?'1':'0';
            $tempArray['can_write'] =  isset($this -> input_data['can_write'])?'1':'0';
            $tempArray['up_date'] = date("Y-m-d H:i", time());
            //設定附件的路徑
            $upFload = date("Ymd", time());
            $upFileFload = "./upFILE/materials/".$upFload;
            $upFile = $upFileFload."/";
            if (!is_dir($upFileFload)) {      //檢察upload資料夾是否存在
                if (!mkdir($upFile)) { //不存在的話就創建upload資料夾
                    //die ("上傳目錄不存在，並且創建失敗");
                }
            }
            $config['upload_path'] = $upFileFload;//以根目錄為起點的位置
            $config['allowed_types'] = '*';
            //$config['max_size']	= '100';
            //$config['max_width']  = '1024';
            //$config['max_height']  = '768';
            $config['encrypt_name'] = true;//隨機取名字
            $this->load->library('upload', $config);
            // die(var_dump($this->upload->do_upload('up_img') ));
            if (!$this->upload->do_upload('up_file')) {
                // $error = array('error' => $this->upload->display_errors());
            } else {
                $file_data = array();
                $getDataArray = $this->upload->data();//取得資訊
                $t  = array(
                    'file_path' => $upFload.'/'.$getDataArray['file_name'],
                    'file_name' => $getDataArray['orig_name'],
                );
                $file_data[] = $t;
                $tempArray['file_data'] = json_encode($file_data);
            }
            $this->db->where('num', $this->input_data['num']);
            //教師只能更新自己的資料
            if ($this->session->userdata("loginType") == "teacher") {
                $this->db->where('user_type', 'teacher');
                $this->db->where('user_num', $this->session->userdata("userID"));
            }
            $this->db->update('materials_list', $tempArray);
        }
    }

    /**
     * 刪除試卷教材資料
     *
     * @param $num
     */
    public function del()
    {
        if ($this->input_data['num']) {
            $tArray = array(
                'is_del' => '1',
            );

            if ($this->session->userdata("loginType") == "teacher") {
                $this->db->where('user_type', 'teacher');
                $this->db->where('user_num', $this->session->userdata("userID"));
            }
            $this->db->where('num', $this->input_data['num']);
            $this->db->update('materials_list', $tArray);
        }
    }

    /**
     * 增加 學生作答的試卷教材資料
     */
    public function insert_materials_data()
    {
        if ($this->input_data['num']) {
            $tempArray = array();
            $tempArray['materials_list_num'] = $this->input_data['num'];
            $tempArray['student_num'] = $this->session->userdata("userID");
            $t_array = $this->input_data;
            unset($t_array['num']);
            unset($t_array['user_type']);
            unset($t_array['user_num']);
            $tempArray['ans_data'] = json_encode($t_array);
            $tempArray['up_date'] = date("Y-m-d H:i", time());
            $this->db->insert('materials_data', $tempArray);
            $this->db->insert_id();
            die();
        }
    }

    /*
    * 取得試卷教材開放的資料
    *
    * @param string $whereArray
    * @param string $limitDsc
    * @param string $offsetDsc
    * @param string $orderByArray
    * @return array
    */
    public function get_open_data($whereArray = '', $limitDsc = '', $offsetDsc = '', $orderByArray = '')
    {
        $return_Array = array();
        if (is_array($whereArray)) {
            foreach ($whereArray as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        if (is_array($orderByArray)) {
            foreach ($orderByArray as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }
        if ($limitDsc > '' and $offsetDsc > '') {
            $query = $this->db->get('materials_student_list', $limitDsc, $offsetDsc)->result();
        } else {
            $query = $this->db->get('materials_student_list')->result();
        }

        foreach ($query as $row) {
            $tempArray = array();
            foreach ($row as $key => $value) {
                $tempArray[$key] = $value;
            }
            $return_Array[] = $tempArray;
        }

        return $return_Array;
    }

    /**
     * 新增試卷教材開放設定
     */
    public function insert_open_data()
    {
        if (!is_null($this->input_data['user_type'])
            AND !is_null($this->input_data['user_num'])
        ) {
            $tempArray = array();
            $tempArray['user_type'] = $this->input_data['user_type'];
            $tempArray['user_num'] = $this->input_data['user_num'];
            $tempArray['questions_num'] = $this->input_data['questions_num'];
            $tempArray['school_num'] = $this->input_data['school_num'];
            $tempArray['teacher_num'] = $this->input_data['teacher_num'];
            $tempArray['class_num'] = $this->input_data['class_num'];
            $tempArray['begin_date'] = $this->input_data['begin_date'];
            $tempArray['end_date'] = $this->input_data['end_date'];
            $tempArray['up_date'] = date("Y-m-d H:i", time());
            $this->db->insert('materials_student_list', $tempArray);
            $this->db->insert_id();

            return 'success';
        }

        return 'error';
    }


    /**
     * 更新試卷教材開放設定
     */
    public function update_open_data()
    {
        if (!is_null($this->input_data['num'])) {
            $tArray = array();
            $tArray['questions_num'] = $this->input_data['questions_num'];
            $tArray['school_num'] = $this->input_data['school_num'];
            $tArray['teacher_num'] = $this->input_data['teacher_num'];
            $tArray['class_num'] = $this->input_data['class_num'];
            $tArray['begin_date'] = $this->input_data['begin_date'];
            $tArray['end_date'] = $this->input_data['end_date'];
            $tArray['up_date'] = date("Y-m-d H:i", time());
            if ($this->session->userdata("loginType") == "teacher") {
                $this->db->where('user_type', 'teacher');
                $this->db->where('user_num', $this->session->userdata("userID"));
            }
            $this->db->where('num', $this->input_data['num']);
            $this->db->update('materials_student_list', $tArray);

            return 'success';
        }

        return 'error';
    }

    /**
     * 刪除試卷教材資料
     *
     * @param $num
     */
    public function del_open_data()
    {
        if ($this->input_data['num']) {
            $data = array(
                'num' => $this->input_data['num'],
            );
            if ($this->session->userdata("loginType") == "teacher") {
                $data['teacher_num'] = $this->session->userdata("userID");
            }
            $this->db->delete('materials_student_list', $data);

            return 'success';
        }

        return 'error';
    }
}