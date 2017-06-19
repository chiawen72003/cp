<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//  問卷列表
class Questionnaire extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'form'));
        $this->load->model('questionnaire/questionnaire_model');
        $this->load->model('teacherlist/teacherlist_model');
        $this->load->model('classlist/classlist_model');
        $this->load->model('publicfunction/sqlfunction', 'sqlfunction');
        if ($this->session->userdata("loginType") == "root" || $this->session->userdata("loginType") == "teacher") {

        } else {
            redirect('/memck/logout', 'refresh');
        }
    }

    /**
     * 問卷列表的首頁
     */
    public function index()
    {
        $this->load->library('pagination');

        $this->load->library('layout');//套用樣板為layout_main
        if ($this->session->userdata("loginType") == "teacher") {
            $this->layout->setLayout('layout/back/layout_ta');//套用樣板
        }
        if ($this->session->userdata("loginType") == "root") {
            $this->layout->setLayout('layout/back/layout_root');//套用樣板
        }

        $data = array();
        $data['base'] = $this->config->item('base_url');

        //處理分頁
        $whereArray = array(
            'is_del' => '0',
        );
        if ($this->session->userdata("loginType") == "teacher") {
            $whereArray['user_type'] = 'teacher';
            $whereArray['user_num'] = $this->session->userdata("userID");
        }
        if ($this->session->userdata("loginType") == "root") {
            $whereArray['user_type'] = 'root';
        }

        $orderByArray = array('num' => 'DESC');
        $offsetDsc = 0;//目前頁面數
        $limitDsc = 10;//一頁顯示幾筆資料
        $data['offsetDsc'] = '';

        if (is_numeric($this->input->get('per_page'))) {
            $offsetDsc = $this->input->get('per_page');
            $data['offsetDsc'] = $offsetDsc;
        }

        $allNum = $this->sqlfunction->get_allDataNum('questionnaire_list', $whereArray);//總資料數量
        $config['base_url'] = $data['base'] . 'index.php/questionnaire/index/?xx=';
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
        $data['listData'] = $this->questionnaire_model->getListData($whereArray, $limitDsc, $offsetDsc, $orderByArray);
        $data['pagination'] = $this->pagination->create_links();//ci產生的分頁html code

        $this->layout->view('questionnaire/index', $data);
    }

    /**
     * 學生實際填寫問卷
     */
    public function do_page()
    {
        $this->load->library('layout');//套用樣板為layout_main
        $data = array();
        $data['base'] = $this->config->item('base_url');
        $num = $this->input->get('num');
        $data['num'] = $num;
        $this -> questionnaire_model -> init(array('num'=>$num));
        $data['q_data'] = $this->questionnaire_model-> get_data();
        $this->layout->setLayout('layout/front/questionnaire_layout');//套用樣板

        $this->layout->view('questionnaire/do_page', $data);
    }

    /**
     * 新增問卷的編輯頁面
     */
    public function add_Page()
    {
        $this->load->library('pagination');

        $this->load->library('layout');//套用樣板為layout_main
        if ($this->session->userdata("loginType") == "teacher") {
            $this->layout->setLayout('layout/back/layout_ta');//套用樣板
        }
        if ($this->session->userdata("loginType") == "root") {
            $this->layout->setLayout('layout/back/layout_root');//套用樣板
        }

        $data = array();
        $data['base'] = $this->config->item('base_url');

        $this->layout->view('questionnaire/add_page', $data);
    }

    /**
     * 編輯舊問卷的編輯頁面
     */
    public function edit_Page()
    {
        if (is_numeric($this->input->get('num'))) {
            $getID = $this->input->get('num');
            $offsetDsc = $this->input->get('pg');

            $this->load->library('layout');//套用樣板為layout_main
            if ($this->session->userdata("loginType") == "teacher") {
                $this->layout->setLayout('layout/back/layout_ta');//套用樣板
            }
            if ($this->session->userdata("loginType") == "root") {
                $this->layout->setLayout('layout/back/layout_root');//套用樣板
            }

            $data = array();
            $data['base'] = $this->config->item('base_url');
            $this -> questionnaire_model -> init(array('num' => $getID));
            $data['q_data'] = $this -> questionnaire_model -> get_data();
            $data['num'] = $getID;
            $data['offsetDsc'] = $offsetDsc;
            $this->layout->view('questionnaire/edit_page', $data);
        }
    }

    /**
     * 新增問卷資料
     */
    public function add_data()
    {
        $all = $this->input->post();
        $this -> questionnaire_model ->init($all);
        $this -> questionnaire_model ->insertData();

        redirect('/questionnaire/index?per_page=' . $offsetDsc, 'refresh');

    }

    /**
     * 更新問卷資料
     */
    public function update_data()
    {
        $all = $this->input->post();
        $this -> questionnaire_model ->init($all);
        $this -> questionnaire_model ->updateData();

        redirect('/questionnaire/index?per_page=' . $offsetDsc, 'refresh');

    }

    /**
     * 移除一筆問卷資料
     */
    public function del()
    {
        $num = $this->input->post('keyNum');
        if (is_numeric($num)) {
            $this -> questionnaire_model ->init(array('num' => $num));
            $this -> questionnaire_model ->del();
        }
    }

    /**
     * 新增 學生作答的問卷資料
     */
    public function insert_data()
    {
        $data = $this->input->post();
        $this -> questionnaire_model ->init(array($data));
        $this -> questionnaire_model ->insert_questionnaire_data();

        redirect('/questionnaire/do_page?num='.$data['num']);
    }

    /**
     * 問卷開放時間列表
     */
    public function openList()
    {
        $this->load->library('pagination');
        $this->load->library('layout');//套用樣板為layout_main
        if ($this->session->userdata("loginType") == "teacher") {
            $this->layout->setLayout('layout/back/layout_ta');//套用樣板
        }
        if ($this->session->userdata("loginType") == "root") {
            $this->layout->setLayout('layout/back/layout_root');//套用樣板
        }

        $data = array();
        $data['base'] = $this->config->item('base_url');

        //處理分頁
        $whereArray = array(
        );
        if ($this->session->userdata("loginType") == "teacher") {
            $whereArray['user_type'] = 'teacher';
            $whereArray['user_num'] = $this->session->userdata("userID");
        }
        if ($this->session->userdata("loginType") == "root") {
            $whereArray['user_type'] = 'root';
        }

        $orderByArray = array('num' => 'DESC');
        $offsetDsc = 0;//目前頁面數
        $limitDsc = 10;//一頁顯示幾筆資料
        $data['offsetDsc'] = '';

        if (is_numeric($this->input->get('per_page'))) {
            $offsetDsc = $this->input->get('per_page');
            $data['offsetDsc'] = $offsetDsc;
        }

        $allNum = $this->sqlfunction->get_allDataNum('questionnaire_class_list', $whereArray);//總資料數量
        $config['base_url'] = $data['base'] . 'index.php/questionnaire/openList/?xx=';
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
        $data['listData'] = $this->questionnaire_model->get_open_data($whereArray, $limitDsc, $offsetDsc, $orderByArray);
        $data['quation_title'] = $this->questionnaire_model->getTitleData();
        $data['school'] = $this->teacherlist_model->getSchoolData();
        $data['class_data'] = $this -> classlist_model -> get_class_name_data();
        $data['pagination'] = $this->pagination->create_links();//ci產生的分頁html code

        $this->layout->view('questionnaire/open/index', $data);
    }

    /**
     * 問卷開放時間的新增頁面
     */
    public function addOpenPage(){

        $this->load->library('layout');//套用樣板為layout_main
        if ($this->session->userdata("loginType") == "teacher") {
            $this->layout->setLayout('layout/back/layout_ta');//套用樣板
        }
        if ($this->session->userdata("loginType") == "root") {
            $this->layout->setLayout('layout/back/layout_root');//套用樣板
        }

        $data = array();
        $data['base'] = $this->config->item('base_url');
        $data['school'] = null;
        $data['class'] = null;
        $data['teacher'] = null;
        if($this->session->userdata("loginType") == "root")
        {
            $data['school'] = $this -> teacherlist_model -> getSchoolData();
            $data['teacher'] = $this -> teacherlist_model -> getListData(array('is_del' => 0));
            $data['class_data'] = $this -> classlist_model -> getListData();
            $data['q_data'] = $this -> questionnaire_model -> getListData();

            $this->layout->view('questionnaire/open/add_page_root', $data);
        }



    }

    /**
     * 新增 問卷開放資料
     */
    public function insertOpenData(){

        $data = $this->input->post();
        if ($this->session->userdata("loginType") == "teacher") {
            $data['user_type'] = 'teacher';
            $data['user_num'] = $this->session->userdata("userID");
        }
        if ($this->session->userdata("loginType") == "root") {
            $data['user_type'] = 'root';
            $data['user_num'] = '0';
        }
        $this->questionnaire_model->init($data);
        $result = $this->questionnaire_model->insert_open_data();

        echo $result;
    }

    /**
     * 問卷開放時間的編輯頁面
     */
    public function editOpenPage(){
        $num = $this->input->get('num');

        $this->load->library('layout');//套用樣板為layout_main
        if ($this->session->userdata("loginType") == "teacher") {
            $this->layout->setLayout('layout/back/layout_ta');//套用樣板
        }
        if ($this->session->userdata("loginType") == "root") {
            $this->layout->setLayout('layout/back/layout_root');//套用樣板
        }

        $data = array();
        $data['base'] = $this->config->item('base_url');
        $data['school'] = null;
        $data['class'] = null;
        $data['teacher'] = null;
        $where_array = array(
            'num' => $num,
        );

        if($this->session->userdata("loginType") == "root")
        {
            $t = $this -> questionnaire_model -> get_open_data($where_array);
            $data['list_data'] = isset($t[0])?$t[0]:null;
            $data['school'] = $this -> teacherlist_model -> getSchoolData();
            $data['teacher'] = $this -> teacherlist_model -> getListData(array('is_del' => 0));
            $data['class_data'] = $this -> classlist_model -> getListData();
            $data['q_data'] = $this -> questionnaire_model -> getListData();

            $this->layout->view('questionnaire/open/edit_page_root', $data);
        }
    }

    /**
     * 更新問卷資料
     */
    public function updateOpenData()
    {
        $data = $this->input->post();
        $this -> questionnaire_model -> init($data);
        $result = $this -> questionnaire_model -> update_open_data();

        return $result;
    }


    /**
     * 刪除一筆問卷開放的資料
     */
    public function delOpenData(){
        $result = 'error';
        $num = $this->input->post('keyNum');
        if (is_numeric($num)) {
            $data = array('num' => $num);
            $this -> questionnaire_model -> init($data);
            $result = $this -> questionnaire_model -> del_open_data();
        }

        return  $result;
    }
}
