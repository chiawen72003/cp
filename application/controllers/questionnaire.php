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

        $allNum = $this->sqlfunction->get_allDataNum('module_list', $whereArray);//總資料數量
        $config['base_url'] = $data['base'] . 'index.php/modellist/index/?xx=';
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
        $t_obj = new Questionnaire_model();
        $t_obj -> init(array('num', $num));
        $data['q_dat'] = $t_obj -> get_data();
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
            $t_obj = new questionnaire_model();
            $t_obj->init(array('num' => $getID));
            $data['q_data'] = $t_obj->get_data();
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
        $t_obj = new Questionnaire_model();
        $t_obj->init($all);
        $t_obj->insertData();

        redirect('/questionnaire/index?per_page=' . $offsetDsc, 'refresh');

    }

    /**
     * 更新問卷資料
     */
    public function update_data()
    {
        $all = $this->input->post();
        $t_obj = new Questionnaire_model();
        $t_obj->init($all);
        $t_obj->updateData();

        redirect('/questionnaire/index?per_page=' . $offsetDsc, 'refresh');

    }

    /**
     * 移除一筆問卷資料
     */
    public function del()
    {
        $num = $this->input->post('keyNum');
        if (is_numeric($num)) {
            $t_obj = new Questionnaire_model();
            $t_obj->init(array('num' => $num));
            $t_obj->del();
        }
    }
}
