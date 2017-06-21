<?php

/*
*	insertQuestionsData() 插入一筆資料到資料庫
*/

class Questionslist_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getListData($whereArray = '', $limitDsc = '', $offsetDsc = '', $orderByArray = '')
    {

        $module_array = array(
            ' 模組一',
            ' 模組二',
            ' 模組三',
            ' 模組四',
            ' 模組五',
            ' 模組六',
        );

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
            $query = $this->db->get('questions_list', $limitDsc, $offsetDsc)->result();
        } else {
            $query = $this->db->get('questions_list')->result();
        }

        foreach ($query as $row) {

            $tempArray = array();
            foreach ($row as $key => $value) {
                if ($key == 'modules_dsc') {
                    $tArray = json_decode($value);
                    foreach ($tArray as $value) {
                        $tempArray['modules_dsc'][] = $value;
                    }
                } else {
                    $tempArray[$key] = $value;
                }
            }

            //測驗時間字串
            if ($tempArray['begin_date'] > '' and $tempArray['end_date'] > '') {
                $tempArray['test_date'] = $tempArray['begin_date'].'<br>至<br>'.$tempArray['end_date'];
            } else {
                $tempArray['test_date'] = '';
            }
            $return_Array[] = $tempArray;
        }

        return $return_Array;
    }

    public function get_TestClassData($listData)
    {
        $return_Array = array();
        $QuationNumArray = array();
        foreach ($listData as $tempArray) {
            $QuationNumArray[] = $tempArray['num'];
        }

        if (count($QuationNumArray) > 0) {
            $tempArray = array();
            $this->db->where_in('questions_num', $QuationNumArray);
            $query = $this->db->get('questions_class_list')->result();

            foreach ($query as $row) {
                $tempArray[$row->questions_num][] = $row->class_num;
            }
            $return_Array = $tempArray;
        }

        return $return_Array;
    }

    public function insertQuestionsData()
    {
        $userID = $this->session->userdata("userID");
        if ($this->session->userdata("loginType") == "root") {
            $userID = $this->session->userdata("tempTeacherNum");
        }

        $nowdate = date("Y-m-d H:i", time());

        $tempArray = array(
            'title_dsc' => $this->input->post('title_dsc'),
            'is_practice' => $this->input->post('is_practice'),
            'begin_date' => $this->input->post('begin_date'),
            'end_date' => $this->input->post('end_date'),
            'user_type' => 'teacher',
            'user_num' => $userID,
            'remark_dsc' => $this->input->post('remark_dsc'),
            'up_date' => $nowdate
        );

        //組合模組資訊與排序
        $mArray = array(
            'm1' => $this->input->post('m1'),
            'm2' => $this->input->post('m2'),
            'm3' => $this->input->post('m3'),
            'm4' => $this->input->post('m4'),
            'm5' => $this->input->post('m5'),
            'm6' => $this->input->post('m6'),
        );
        $tempArray['modules_dsc'] = json_encode($mArray);
        $tempArray['order_dsc'] = json_encode($this->input->post('module_order'));
        if (isset($_POST['analysis_words'])) {
            $tempArray['analysis_words'] = json_encode($this->input->post('analysis_words'));
        }

        //設定題目圖示的路徑
        $upFload = date("Ymd", time());
        $upFileFload = "./upIMG/questions/".$upFload;
        $upFile = $upFileFload."/";
        if (!is_dir($upFileFload)) {      //檢察upload資料夾是否存在
            if (!mkdir($upFile)) { //不存在的話就創建upload資料夾
                //die ("上傳目錄不存在，並且創建失敗");
            }
        }
        $config['upload_path'] = $upFileFload;//以根目錄為起點的位置
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        //$config['max_size']	= '100';
        //$config['max_width']  = '1024';
        //$config['max_height']  = '768';
        $config['encrypt_name'] = true;//隨機取名字
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('img_path')) {
            //$error = array('error' => $this->upload->display_errors());
        } else {
            $getDataArray = $this->upload->data();//取得資訊
            $tempArray['img_path'] = $upFload.'/'.$getDataArray['file_name'];
        }

        $this->db->insert('questions_list', $tempArray);
        $getID = $this->db->insert_id();

        //插入班級資料到對應表
        if (isset($_POST['swClass']) and count($_POST['swClass']) > 0) {
            $data = array();
            foreach ($_POST['swClass'] as $value) {
                $tempArray = array(
                    'questions_num' => $getID,
                    'class_num' => $value,
                    'up_date' => $nowdate
                );
                $data[] = $tempArray;
            }

            $this->db->insert_batch('questions_class_list', $data);
        }

    }

    public function updateQuestionsData($num)
    {
        $nowdate = date("Y-m-d H:i", time());
        //先檢查該試題是否為管理員分享的試題
        $isShare = false;
        $this->db->where('is_share', '1');
        $this->db->where('num', $num);
        $query = $this->db->get('questions_list')->result();
        if (count($query) == 1) {
            $isShare = true;
        }

        if ($isShare) {
            //清除資料然後插入班級資料到對應表
            $this->db->delete('questions_class_list', array('questions_num' => $num));

            if (isset($_POST['swClass']) and count($_POST['swClass']) > 0) {
                $data = array();
                foreach ($_POST['swClass'] as $value) {
                    $tempArray = array(
                        'questions_num' => $num,
                        'class_num' => $value,
                        'up_date' => $nowdate
                    );
                    $data[] = $tempArray;
                }

                $this->db->insert_batch('questions_class_list', $data);
            }

        } else {

            $tempArray = array(
                'begin_date' => $this->input->post('begin_date'),
                'end_date' => $this->input->post('end_date'),
                'title_dsc' => $this->input->post('title_dsc'),
                'is_practice' => $this->input->post('is_practice'),
                'remark_dsc' => $this->input->post('remark_dsc'),
                'up_date' => $nowdate
            );

            //組合模組資訊與排序
            $mArray = array(
                'm1' => $this->input->post('m1'),
                'm2' => $this->input->post('m2'),
                'm3' => $this->input->post('m3'),
                'm4' => $this->input->post('m4'),
                'm5' => $this->input->post('m5'),
                'm6' => $this->input->post('m6'),
            );
            $tempArray['modules_dsc'] = json_encode($mArray);
            $tempArray['order_dsc'] = json_encode($this->input->post('module_order'));
            if (isset($_POST['analysis_words'])) {
                $tempArray['analysis_words'] = json_encode($this->input->post('analysis_words'));
            }

            //設定題目圖示的路徑
            $upFload = date("Ymd", time());
            $upFileFload = "./upIMG/questions/".$upFload;
            $upFile = $upFileFload."/";
            if (!is_dir($upFileFload)) {      //檢察upload資料夾是否存在
                if (!mkdir($upFile)) { //不存在的話就創建upload資料夾
                    //die ("上傳目錄不存在，並且創建失敗");
                }
            }
            $config['upload_path'] = $upFileFload;//以根目錄為起點的位置
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            //$config['max_size']	= '100';
            //$config['max_width']  = '1024';
            //$config['max_height']  = '768';
            $config['encrypt_name'] = true;//隨機取名字
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img_path')) {
                //$error = array('error' => $this->upload->display_errors());
            } else {
                $getDataArray = $this->upload->data();//取得資訊
                $tempArray['img_path'] = $upFload.'/'.$getDataArray['file_name'];
            }

            $this->db->where('num', $num);
            $this->db->update('questions_list', $tempArray);


            //清除資料然後插入班級資料到對應表
            $this->db->delete('questions_class_list', array('questions_num' => $num));

            if (isset($_POST['swClass']) and count($_POST['swClass']) > 0) {
                $data = array();
                foreach ($_POST['swClass'] as $value) {
                    $tempArray = array(
                        'questions_num' => $num,
                        'class_num' => $value,
                        'up_date' => $nowdate
                    );
                    $data[] = $tempArray;
                }

                $this->db->insert_batch('questions_class_list', $data);
            }
        }
    }

    public function get_ModelsName()
    {
        $returnArray = array();
        /* $userID = $this->session->userdata("userID");
        if($this->session->userdata("loginType") == "root"){
            $userID = $this->session->userdata("tempTeacherNum");
        }
        $this->db->where('user_num',$userID);
        $this->db->where('user_type','teacher'); */
        $query = $this->db->get('module_list')->result();
        if (count($query) > 0) {
            foreach ($query as $row) {
                $returnArray[$row->num] = $row->title_dsc;
            }
        }

        return $returnArray;

    }

    public function get_ModelsData()
    {
        $return_array = array(
            'm1',
            'm2',
            'm3',
            'm4',
            'm5',
            'm6',
        );
        $userID = $this->session->userdata("userID");
        if ($this->session->userdata("loginType") == "root") {
            $userID = $this->session->userdata("tempTeacherNum");
        }

        $this->db->where('user_num', $userID);
        $this->db->where('user_type', 'teacher');
        $query = $this->db->get('module_list')->result();
        if (count($query) > 0) {
            foreach ($query as $row) {
                if ($row->module_type == 'm1') {
                    $return_array['m1'][] = array(
                        'num' => $row->num,
                        'title_dsc' => $row->title_dsc,
                    );
                }
                if ($row->module_type == 'm2') {
                    $return_array['m2'][] = array(
                        'num' => $row->num,
                        'title_dsc' => $row->title_dsc,
                    );

                }
                if ($row->module_type == 'm3') {
                    $return_array['m3'][] = array(
                        'num' => $row->num,
                        'title_dsc' => $row->title_dsc,
                    );

                }
                if ($row->module_type == 'm4') {
                    $return_array['m4'][] = array(
                        'num' => $row->num,
                        'title_dsc' => $row->title_dsc,
                    );

                }
                if ($row->module_type == 'm5') {
                    $return_array['m5'][] = array(
                        'num' => $row->num,
                        'title_dsc' => $row->title_dsc,
                    );

                }
                if ($row->module_type == 'm6') {
                    $return_array['m6'][] = array(
                        'num' => $row->num,
                        'title_dsc' => $row->title_dsc,
                    );

                }
            }
        }

        return $return_array;
    }

    public function get_RootModelsData()
    {
        $return_array = array(
            'm1',
            'm2',
            'm3',
            'm4',
            'm5',
            'm6',
        );

        $this->db->where('user_type', 'root');
        $query = $this->db->get('module_list')->result();
        if (count($query) > 0) {
            foreach ($query as $row) {
                if ($row->module_type == 'm1') {
                    $return_array['m1'][] = array(
                        'num' => $row->num,
                        'title_dsc' => $row->title_dsc,
                    );
                }
                if ($row->module_type == 'm2') {
                    $return_array['m2'][] = array(
                        'num' => $row->num,
                        'title_dsc' => $row->title_dsc,
                    );

                }
                if ($row->module_type == 'm3') {
                    $return_array['m3'][] = array(
                        'num' => $row->num,
                        'title_dsc' => $row->title_dsc,
                    );

                }
                if ($row->module_type == 'm4') {
                    $return_array['m4'][] = array(
                        'num' => $row->num,
                        'title_dsc' => $row->title_dsc,
                    );

                }
                if ($row->module_type == 'm5') {
                    $return_array['m5'][] = array(
                        'num' => $row->num,
                        'title_dsc' => $row->title_dsc,
                    );

                }
                if ($row->module_type == 'm6') {
                    $return_array['m6'][] = array(
                        'num' => $row->num,
                        'title_dsc' => $row->title_dsc,
                    );

                }
            }
        }

        return $return_array;
    }

    public function getData($getID)
    {
        $tempArray = array();
        $this->db->where('num', $getID);
        if ($this->session->userdata("loginType") == "root") {
            $this->db->where('user_num', $this->session->userdata("tempTeacherNum"));
        } else {
            $this->db->where('user_num', $this->session->userdata("userID"));
        }

        $query = $this->db->get('questions_list')->result();

        foreach ($query as $row) {
            $tempArray['title_dsc'] = $row->title_dsc;
            $tempArray['is_practice'] = $row->is_practice;
            $tempArray['remark_dsc'] = $row->remark_dsc;
            $tempArray['img_path'] = $row->img_path;
            $tempArray['begin_date'] = $row->begin_date;
            $tempArray['end_date'] = $row->end_date;
            $tempArray2 = json_decode($row->modules_dsc);
            foreach ($tempArray2 as $value) {
                $tempArray['modules_dsc'][] = $value;
            }
            $tempArray2 = json_decode($row->order_dsc);
            foreach ($tempArray2 as $value) {
                $tempArray['order_dsc'][] = $value;
            }
            if ($row->analysis_words > '') {
                $tempArray2 = json_decode($row->analysis_words);
                foreach ($tempArray2 as $value) {
                    $tempArray['analysis_words'][] = $value;
                }
            }
        }

        //調出試題-班級對應資料
        $this->db->where('questions_num', $getID);
        $query = $this->db->get('questions_class_list')->result();
        foreach ($query as $row) {
            $tempArray['swClass'][] = $row->class_num;
        }

        return $tempArray;
    }

    public function del_question($num)
    {
        if (is_numeric($num)) {
            $tArray = array(
                'is_del' => '1',
            );
            $this->db->where('num', $num);
            if ($this->session->userdata("loginType") == "root") {
                $this->db->where('user_num', $this->session->userdata("tempTeacherNum"));
            } else {
                $this->db->where('user_num', $this->session->userdata("userID"));
            }

            $this->db->update('questions_list', $tArray);
        }
    }


    public function get_classData()
    {
        $returnArray = array();
        if ($this->session->userdata("loginType") == "teacher" OR $this->session->userdata("loginType") == "root") {
            $userID = $this->session->userdata("userID");
            if ($this->session->userdata("loginType") == "root") {
                $userID = $this->session->userdata("tempTeacherNum");
            }


            $this->db->where('user_num', $userID);
            $this->db->where('is_del', '0');
            $this->db->where('user_type', 'teacher');
            $query = $this->db->get('class_list')->result();

            foreach ($query as $row) {
                $tempArray = array();
                foreach ($row as $key => $value) {
                    $tempArray[$key] = $value;
                }
                $returnArray[] = $tempArray;
            }
        }

        return $returnArray;
    }

    public function getTeacherList()
    {
        $returnArray = array();

        $query = $this->db->get('teacher_data')->result();
        foreach ($query as $row) {
            $tempArray = array();
            foreach ($row as $key => $value) {
                $tempArray[$key] = $value;
            }
            $returnArray[] = $tempArray;
        }

        return $returnArray;
    }

    public function chg_Teacher($num)
    {
        $this->db->where('num', $num);
        $this->db->where('is_del', '0');
        $query = $this->db->get('teacher_data')->result();
        foreach ($query as $row) {
            $getData = array(
                'tempTeacherNum' => $row->num,
                'tempTeacherName' => $row->c_name,
                'tempTeacherCode' => $row->s_code,
            );
            $this->session->set_userdata($getData);
        }
    }
}