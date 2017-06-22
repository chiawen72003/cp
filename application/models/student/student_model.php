<?php

/*
*	
*/

class Student_model extends CI_Model
{
    private $input_data = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function init($getData = array()){
        foreach ($getData as $k => $v){
            $this -> input_data[$k] = $v;
        }
    }

    /**
     * 取得指定教師的所有學生資料
     *
     * @return array
     */
    public function get_all_by_teacher()
    {
        $t_array = array();
        $this -> db ->select('class_num,student_id,c_name,num');
        $this->db->where('teacherdataNum', $this -> input_data['num']);
        $this->db->where('is_del', '0');
        $this->db->order_by('student_id', 'asc');
        $this->db->order_by('c_name', 'asc');
        $query = $this->db->get('student_data')->result();
        foreach ($query as $row) {
            $t_array[] = array(
                'num' => $row -> num,
                'class_num' => $row -> class_num,
                'student_id' => $row -> student_id,
                'c_name' => $row -> c_name,
            );
        }

        return $t_array;
    }
}