<?php

/*
*	
*/

class Testlist_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getQuationsData()
    {
        $notInArray = array();
        $this->db->where('student_num', $this->session->userdata("userID"));
        $this->db->group_by("questions_num");
        $query = $this->db->get('option_record')->result();
        foreach ($query as $row) {
            $notInArray[$row->questions_num] = $row->questions_num;
        }

        $return_Array = array();
        $this->db->where('user_num', $this->session->userdata("teacherdataNum"));
        $this->db->where('is_del', '0');
        $query = $this->db->get('questions_list')->result();
        foreach ($query as $row) {
            $tempArray = array();
            foreach ($row as $key => $value) {
                $tempArray[$key] = $value;
            }
            if ($row->is_practice == '1') {
                $return_Array[] = $tempArray;
            } else {
                //還沒有操作紀錄
                if (!isset($notInArray[$row->num])) {
                    $return_Array[] = $tempArray;
                }
            }

        }

        return $return_Array;
    }

    public function getQuationsClassData()
    {
        $return_Array = array();
        $this->db->where('class_num', $this->session->userdata("class_num"));
        $query = $this->db->get('questions_class_list')->result();
        foreach ($query as $row) {
            $return_Array[] = $row->questions_num;
        }

        return $return_Array;
    }


    public function get_ModuleDsc($num, $mod = '')
    {
        $returnData = array(
            'userType',
            'friendType',
            'switchModel' => array(),
            'switchDsc' => '',
            'switchModelData' => array(),
        );
        if ($this->session->userdata("roomTYPE") == "A") {
            $returnData['userType'] = 'A';
            $returnData['friendType'] = 'B';
        }
        if ($this->session->userdata("roomTYPE") == "B") {
            $returnData['userType'] = 'B';
            $returnData['friendType'] = 'A';
        }

        $this->db->where('num', $num);
        $query = $this->db->get('questions_list')->result();
        foreach ($query as $row) {
            $tArray = json_decode($row->order_dsc);
            $mArray = json_decode($row->modules_dsc);
            foreach ($tArray as $value) {

                //取出模組所需預設參數
                if ($value == '1' and $mArray->m1 > '') {
                    $returnData['switchDsc'] .= '"'.$value.'",';
                    $returnData['switchModel'][] = $value;
                    $modelData_1 = $this->get_model1_data($mArray->m1);
                    $returnData['modelData_1'] = $modelData_1;
                }
                if ($value == '2' and $mArray->m2 > '') {
                    $returnData['switchDsc'] .= '"'.$value.'",';
                    $returnData['switchModel'][] = $value;
                    $modelData_2 = $this->get_model2_data($mArray->m2);
                    $returnData['modelData_2'] = $modelData_2;
                }
                if ($value == '3' and $mArray->m3 > '') {
                    $returnData['switchDsc'] .= '"'.$value.'",';
                    $returnData['switchModel'][] = $value;

                    $modelData_3 = $this->get_model3_data($mArray->m3);
                    $returnData['modelData_3'] = $modelData_3;
                }
                if ($value == '4' and $mArray->m4 > '') {
                    $returnData['switchDsc'] .= '"'.$value.'",';
                    $returnData['switchModel'][] = $value;

                    $modelData_4 = $this->get_model4_data($mArray->m4);
                    $returnData['modelData_4'] = $modelData_4;
                }
                if ($value == '5' and $mArray->m5 > '') {
                    $returnData['switchDsc'] .= '"'.$value.'",';
                    $returnData['switchModel'][] = $value;

                    $modelData_5 = $this->get_model5_data($mArray->m5);
                    $returnData['modelData_5'] = $modelData_5;
                }
                if ($value == '6' and $mArray->m6 > '') {
                    $returnData['switchDsc'] .= '"'.$value.'",';
                    $returnData['switchModel'][] = $value;

                    $modelData_6 = $this->get_model6_data($mArray->m6);
                    $returnData['modelData_6'] = $modelData_6;
                }

            }
        }

        return $returnData;
    }

    public function get_model1_data($getNum)
    {
        $tempArray = array();
        $this->db->where('key_num', $getNum);
        $query = $this->db->get('module_1_data')->result();
        foreach ($query as $row) {
            if ($this->session->userdata("roomTYPE") == "A") {
                $tempArray['level_1'] = $row->text_1_A;
                $tempArray['level_2'] = $row->text_2_A;
                $tempArray['level_3'] = $row->text_3_A;
                $jsonArray = json_decode($row->option_dsc);
                foreach ($jsonArray as $tArray) {
                    $tempArray['option_dsc'][] = $tArray;
                }
            }
            if ($this->session->userdata("roomTYPE") == "B") {
                $tempArray['level_1'] = $row->text_1_B;
                $tempArray['level_2'] = $row->text_2_B;
                $tempArray['level_3'] = $row->text_3_B;
                $jsonArray = json_decode($row->option_dsc);
                foreach ($jsonArray as $tArray) {
                    $tempArray['option_dsc'][] = $tArray;
                }
            }
        }

        //取出關卡敘述
        $this->db->where('module_type', 'm1');
        $this->db->where('module_list_num', $getNum);
        if ($this->session->userdata("roomTYPE") == "A") {
            $this->db->where('user_type', 'A');
        }
        if ($this->session->userdata("roomTYPE") == "B") {
            $this->db->where('user_type', 'B');
        }
        $query = $this->db->get('leveldsc_list')->result();
        foreach ($query as $row) {
            $tempArray['levelDsc'][$row->level_dsc] = $row->html_dsc;
        }

        return $tempArray;
    }

    public function get_model2_data($getNum)
    {
        if ($this->session->userdata("roomTYPE") == "A") {
            $returnData = array(
                'userType' => 'A',
                'friendType' => 'B',
            );
        }

        if ($this->session->userdata("roomTYPE") == "B") {
            $returnData = array(
                'userType' => 'B',
                'friendType' => 'A',
            );
        }


        $this->db->where('key_num', $getNum);
        $query = $this->db->get('module_2_data')->result();
        foreach ($query as $row) {
            $jsonArray = json_decode($row->value_dsc);
            foreach ($jsonArray as $key => $Value) {
                if ($key == 'computerPay') {
                    $tArray = explode(';', $Value);
                    $tDsc = '';
                    if (count($tArray) > 0) {
                        foreach ($tArray as $tempValue) {
                            $tDsc .= '"'.$tempValue.'",';
                        }
                        $tDsc = substr($tDsc, 0, -1);
                    }
                    $returnData['ComputerPay'] = $tDsc;
                } else {
                    $returnData[$key] = $Value;
                }
            }
        }

        //取出關卡敘述
        $this->db->where('module_type', 'm2');
        $this->db->where('module_list_num', $getNum);
        if ($this->session->userdata("roomTYPE") == "A") {
            $this->db->where('user_type', 'A');
        }
        if ($this->session->userdata("roomTYPE") == "B") {
            $this->db->where('user_type', 'B');
        }
        $query = $this->db->get('leveldsc_list')->result();
        foreach ($query as $row) {
            $returnData['levelDsc'][$row->level_dsc] = $row->html_dsc;
        }

        return $returnData;
    }

    public function get_model3_data($getNum)
    {
        if ($this->session->userdata("roomTYPE") == "A") {
            $returnData = array(
                'userType' => 'A',
                'friendType' => 'B',
            );
        }

        if ($this->session->userdata("roomTYPE") == "B") {
            $returnData = array(
                'userType' => 'B',
                'friendType' => 'A',
            );
        }

        $this->db->where('key_num', $getNum);
        $query = $this->db->get('module_3_data')->result();
        foreach ($query as $row) {
            $jsonArray = json_decode($row->value_dsc);
            foreach ($jsonArray->rule_1_A as $Value) {
                $returnData['rule_1_A'][] = $Value;
            }
            foreach ($jsonArray->rule_1_B as $Value) {
                $returnData['rule_1_B'][] = $Value;
            }
            foreach ($jsonArray->rule_2_A as $Value) {
                $returnData['rule_2_A'][] = $Value;
            }
            foreach ($jsonArray->rule_2_B as $Value) {
                $returnData['rule_2_B'][] = $Value;
            }
            foreach ($jsonArray->options as $Value) {
                $returnData['options'][] = $Value;
            }
            foreach ($jsonArray->options3 as $Value) {
                $returnData['options3'][] = $Value;
            }

            $returnData['baseTmp'] = $jsonArray->baseTmp;
        }
        //取出關卡敘述
        $this->db->where('module_type', 'm3');
        $this->db->where('module_list_num', $getNum);
        if ($this->session->userdata("roomTYPE") == "A") {
            $this->db->where('user_type', 'A');
        }
        if ($this->session->userdata("roomTYPE") == "B") {
            $this->db->where('user_type', 'B');
        }
        $query = $this->db->get('leveldsc_list')->result();
        foreach ($query as $row) {
            $returnData['levelDsc'][$row->level_dsc] = $row->html_dsc;
        }

        return $returnData;
    }

    public function get_model4_data($getNum)
    {
        $tempArray = array();

        $tempDsc = '';
        $this->db->where('key_num', $getNum);
        $query = $this->db->get('module_4_data')->result();
        foreach ($query as $row) {
            if ($this->session->userdata("roomTYPE") == "A") {

            }
            if ($this->session->userdata("roomTYPE") == "B") {
                $tempArray['ckDsc_c'] = $row->value_dsc_c;
                $tempArray['ckDsc_m'] = $row->value_dsc_m;
                $tempArray['ckDsc_l'] = $row->value_dsc_l;
            }
        }
        //取出關卡敘述
        $this->db->where('module_type', 'm4');
        $this->db->where('module_list_num', $getNum);
        if ($this->session->userdata("roomTYPE") == "A") {
            $this->db->where('user_type', 'A');
        }
        if ($this->session->userdata("roomTYPE") == "B") {
            $this->db->where('user_type', 'B');
        }
        $query = $this->db->get('leveldsc_list')->result();
        foreach ($query as $row) {
            $tempArray['levelDsc'][$row->level_dsc] = $row->html_dsc;
        }

        //小孩排行榜
        $this->db->where('weight_dsc', 'M4Charts_0');
        $query = $this->db->get('general_data')->result();
        foreach ($query as $row) {
            if ($row->weight_value > '') {
                $josArray = json_decode($row->weight_value);
                foreach ($josArray as $key => $tArray) {
                    foreach ($tArray as $value) {
                        $tempArray['type0List'][$key][] = $value;
                    }
                }
            }
        }
        //青年排行榜
        $this->db->where('weight_dsc', 'M4Charts_1');
        $query = $this->db->get('general_data')->result();
        foreach ($query as $row) {
            if ($row->weight_value > '') {
                $josArray = json_decode($row->weight_value);
                foreach ($josArray as $key => $tArray) {
                    foreach ($tArray as $value) {
                        $tempArray['type1List'][$key][] = $value;
                    }
                }
            }
        }
        //成年人排行榜
        $this->db->where('weight_dsc', 'M4Charts_2');
        $query = $this->db->get('general_data')->result();
        foreach ($query as $row) {
            if ($row->weight_value > '') {
                $josArray = json_decode($row->weight_value);
                foreach ($josArray as $key => $tArray) {
                    foreach ($tArray as $value) {
                        $tempArray['type2List'][$key][] = $value;
                    }
                }
            }
        }

        return $tempArray;
    }

    public function get_model5_data($getNum)
    {
        if ($this->session->userdata("roomTYPE") == "A") {
            $returnData = array(
                'userType' => 'A',
                'friendType' => 'B',
            );
        }

        if ($this->session->userdata("roomTYPE") == "B") {
            $returnData = array(
                'userType' => 'B',
                'friendType' => 'A',
            );
        }
        //取出關卡敘述
        $this->db->where('module_type', 'm5');
        $this->db->where('module_list_num', $getNum);
        if ($this->session->userdata("roomTYPE") == "A") {
            $this->db->where('user_type', 'A');
        }
        if ($this->session->userdata("roomTYPE") == "B") {
            $this->db->where('user_type', 'B');
        }
        $query = $this->db->get('leveldsc_list')->result();
        foreach ($query as $row) {
            $returnData['levelDsc'][$row->level_dsc] = $row->html_dsc;
        }

        //排行榜 狼羊
        $this->db->where('weight_dsc', 'M5Charts_1');
        $query = $this->db->get('general_data')->result();
        foreach ($query as $row) {
            if ($row->weight_value > '') {
                $josArray = json_decode($row->weight_value);
                foreach ($josArray as $value) {
                    $returnData['orderList_1'][] = $value;
                }
            }
        }

        //排行榜 傳教士
        $this->db->where('weight_dsc', 'M5Charts_2');
        $query = $this->db->get('general_data')->result();
        foreach ($query as $row) {
            if ($row->weight_value > '') {
                $josArray = json_decode($row->weight_value);
                foreach ($josArray as $value) {
                    $returnData['orderList_2'][] = $value;
                }
            }
        }


        return $returnData;
    }

    public function get_model6_data($getNum)
    {
        if ($this->session->userdata("roomTYPE") == "A") {
            $returnData = array(
                'userType' => 'A',
                'friendType' => 'B',
            );
        }

        if ($this->session->userdata("roomTYPE") == "B") {
            $returnData = array(
                'userType' => 'B',
                'friendType' => 'A',
            );
        }
        $this->db->where('key_num', $getNum);
        $query = $this->db->get('module_6_data')->result();
        foreach ($query as $row) {
            $returnData['unit'] = $row->unit;
            $returnData['paper'] = $row->paper;
            $returnData['questions'] = $row->questions;
            $returnData['model'] = $row->model;
            $returnData['build_option'] = $row->build_option;
        }

        //取出關卡敘述
        $this->db->where('module_type', 'm6');
        $this->db->where('module_list_num', $getNum);
        if ($this->session->userdata("roomTYPE") == "A") {
            $this->db->where('user_type', 'A');
        }
        if ($this->session->userdata("roomTYPE") == "B") {
            $this->db->where('user_type', 'B');
        }
        $query = $this->db->get('leveldsc_list')->result();
        foreach ($query as $row) {
            $returnData['levelDsc'][$row->level_dsc] = $row->html_dsc;
        }


        return $returnData;
    }

    public function getGeneralData()
    {
        $tempArray = array();
        $query = $this->db->get('general_data')->result();
        foreach ($query as $row) {
            $tempArray[$row->weight_dsc] = $row->weight_value;
        }

        return $tempArray;
    }

    public function save_OptionData()
    {
        //清除暫存操作紀錄
        $this->db->where('student_num', $this->input->post('sNum'));
        $this->db->where('questions_num', $this->input->post('qNum'));
        $this->db->delete('temp_option_record');

        //新增正式操作紀錄
        $nowdate = date("Y-m-d H:i", time());

        $tempArray = array(
            'teacher_num' => $this->input->post('tNum'),
            'student_num' => $this->input->post('sNum'),
            'student_type' => $this->input->post('sType'),
            'questions_num' => $this->input->post('qNum'),
            'm4_charts' => $this->input->post('m4Charts'),
            'record_value' => $this->input->post('record'),
            'up_date' => $nowdate,
        );
        $this->db->insert('option_record', $tempArray);

        $tempArray = array(
            'teacher_num' => $this->input->post('tNum'),
            'student_num' => $this->input->post('sNum'),
            'student_type' => $this->input->post('sType'),
            'questions_num' => $this->input->post('qNum'),
            'scores_value' => $this->input->post('scores'),
            'up_date' => $nowdate,
        );
        $this->db->insert('scores_list', $tempArray);

        //模組4的排行榜的資料只有B同學有，所以由B同學更新排行榜即可
        if ($this->input->post('sType') == 'B') {
            //更新模組4 排行榜 小孩
            $newTempArray = '';
            $recordArray = array();
            $tempValue = '';
            $this->db->where('weight_dsc', 'M4Charts_0');
            $query = $this->db->get('general_data')->result();
            foreach ($query as $row) {
                $tempValue = $row->weight_value;
            }
            if ($tempValue > '') {
                $jsonArray = json_decode($tempValue);
                foreach ($jsonArray as $key => $tArray) {
                    foreach ($tArray as $value) {
                        $recordArray[$key][] = $value;
                    }
                }
            }

            $m4_charts = $this->input->post('m4Charts');
            $m4ChartsArray = json_decode($m4_charts);

            if (count($m4ChartsArray[0]) > 0) {
                foreach ($m4ChartsArray[0] as $key => $value) {
                    $recordArray[$value][] = $key + 1;//[小孩][分數][次數]
                }
                krsort($recordArray);//針對分數做排序，由高往低
                $x = 0;
                foreach ($recordArray as $key => $tArray) {
                    sort($tArray);
                    foreach ($tArray as $value) {
                        if ($x < 10) {
                            $newTempArray[$key][] = $value;
                            $x++;
                        }
                    }
                }

                $data = array(
                    'weight_value' => json_encode($newTempArray),
                );
                $this->db->where('weight_dsc', 'M4Charts_0');
                $this->db->update('general_data', $data);
            }

            //更新模組4 排行榜 年輕人
            $newTempArray = '';
            $recordArray = array();
            $tempValue = '';
            $this->db->where('weight_dsc', 'M4Charts_1');
            $query = $this->db->get('general_data')->result();
            foreach ($query as $row) {
                $tempValue = $row->weight_value;
            }
            if ($tempValue > '') {
                $jsonArray = json_decode($tempValue);
                foreach ($jsonArray as $key => $tArray) {
                    foreach ($tArray as $value) {
                        $recordArray[$key][] = $value;
                    }
                }
            }

            $m4_charts = $this->input->post('m4Charts');
            $m4ChartsArray = json_decode($m4_charts);
            if (count($m4ChartsArray[1]) > 0) {
                foreach ($m4ChartsArray[1] as $key => $value) {
                    $recordArray[$value][] = $key + 1;//[小孩][分數][次數]
                }
                krsort($recordArray);//針對分數做排序，由高往低
                $x = 0;
                foreach ($recordArray as $key => $tArray) {
                    sort($tArray);
                    foreach ($tArray as $value) {
                        if ($x < 10) {
                            $newTempArray[$key][] = $value;
                            $x++;
                        }
                    }
                }

                $data = array(
                    'weight_value' => json_encode($newTempArray),
                );
                $this->db->where('weight_dsc', 'M4Charts_1');
                $this->db->update('general_data', $data);
            }

            //更新模組4 排行榜 成年人
            $newTempArray = '';
            $recordArray = array();
            $tempValue = '';
            $this->db->where('weight_dsc', 'M4Charts_2');
            $query = $this->db->get('general_data')->result();
            foreach ($query as $row) {
                $tempValue = $row->weight_value;
            }
            if ($tempValue > '') {
                $jsonArray = json_decode($tempValue);
                foreach ($jsonArray as $key => $tArray) {
                    foreach ($tArray as $value) {
                        $recordArray[$key][] = $value;
                    }
                }
            }

            $m4_charts = $this->input->post('m4Charts');
            $m4ChartsArray = json_decode($m4_charts);
            if (count($m4ChartsArray[2]) > 0) {
                foreach ($m4ChartsArray[2] as $key => $value) {
                    $recordArray[$value][] = $key + 1;//[小孩][分數][次數]
                }
                krsort($recordArray);//針對分數做排序，由高往低
                $x = 0;
                foreach ($recordArray as $key => $tArray) {
                    sort($tArray);
                    foreach ($tArray as $value) {
                        if ($x < 10) {
                            $newTempArray[$key][] = $value;
                            $x++;
                        }
                    }
                }

                $data = array(
                    'weight_value' => json_encode($newTempArray),
                );
                $this->db->where('weight_dsc', 'M4Charts_2');
                $this->db->update('general_data', $data);
            }
        }

        //模組5的排行榜則由A同學來更新
        if ($this->input->post('sType') == 'A') {
            //更新模組5 排行榜 狼羊
            $newTempArray = '';
            $recordArray = array();
            $tempValue = '';
            $this->db->where('weight_dsc', 'M5Charts_1');
            $query = $this->db->get('general_data')->result();
            foreach ($query as $row) {
                $tempValue = $row->weight_value;
            }
            if ($tempValue > '') {
                $jsonArray = json_decode($tempValue);
                foreach ($jsonArray as $key => $tArray) {
                    $recordArray[] = $tArray;
                }
            }

            $m5Charts0 = $this->input->post('m5Charts0');
            if ($m5Charts0 > '') {
                $newTempArray = array();
                if (count($recordArray) > 0) {
                    $recordArray[] = $m5Charts0;
                    rsort($recordArray);
                    for ($x = 0; $x < 10; $x++) {
                        if (isset($recordArray[$x])) {
                            $newTempArray[] = $recordArray[$x];
                        }
                    }
                } else {
                    $newTempArray[] = $m5Charts0;
                }
                $data = array(
                    'weight_value' => json_encode($newTempArray),
                );
                $this->db->where('weight_dsc', 'M5Charts_1');
                $this->db->update('general_data', $data);
            }

            //更新模組5 排行榜 傳教士
            $newTempArray = '';
            $recordArray = array();
            $tempValue = '';
            $this->db->where('weight_dsc', 'M5Charts_2');
            $query = $this->db->get('general_data')->result();
            foreach ($query as $row) {
                $tempValue = $row->weight_value;
            }
            if ($tempValue > '') {
                $jsonArray = json_decode($tempValue);
                foreach ($jsonArray as $key => $tArray) {
                    $recordArray[] = $tArray;
                }
            }

            $m5Charts1 = $this->input->post('m5Charts1');
            if ($m5Charts1 > '') {
                $newTempArray = array();
                if (count($recordArray) > 0) {
                    $recordArray[] = $m5Charts1;
                    rsort($recordArray);
                    for ($x = 0; $x < 10; $x++) {
                        if (isset($recordArray[$x])) {
                            $newTempArray[] = $recordArray[$x];
                        }
                    }
                } else {
                    $newTempArray[] = $m5Charts1;
                }

                $data = array(
                    'weight_value' => json_encode($newTempArray),
                );
                $this->db->where('weight_dsc', 'M5Charts_2');
                $this->db->update('general_data', $data);
            }
        }
    }


    public function save_TempOptionData()
    {
        $nowdate = date("Y-m-d H:i", time());

        $this->db->where('teacher_num', $this->input->post('tNum'));
        $this->db->where('student_num', $this->input->post('sNum'));
        $this->db->where('student_type', $this->input->post('sType'));
        $this->db->where('questions_num', $this->input->post('qNum'));
        $query = $this->db->get('temp_option_record')->result();
        if (count($query) > 0) {
            $tempRecord = json_encode($this->input->post('record'));
            $tempArray = array(
                'record_value' => $tempRecord,
                'next_model_index' => $this->input->post('nextIndex'),
                'up_date' => $nowdate,
            );
            $this->db->where('teacher_num', $this->input->post('tNum'));
            $this->db->where('student_num', $this->input->post('sNum'));
            $this->db->where('student_type', $this->input->post('sType'));
            $this->db->where('questions_num', $this->input->post('qNum'));

            $this->db->update('temp_option_record', $tempArray);
        } else {
            $tempRecord = json_encode($this->input->post('record'));

            $tempArray = array(
                'teacher_num' => $this->input->post('tNum'),
                'student_num' => $this->input->post('sNum'),
                'student_type' => $this->input->post('sType'),
                'questions_num' => $this->input->post('qNum'),
                'record_value' => $tempRecord,
                'next_model_index' => $this->input->post('nextIndex'),
                'up_date' => $nowdate,
            );
            $this->db->insert('temp_option_record', $tempArray);
        }
    }

    public function getRecordListData()
    {
        $returnData = array();
        $whereInArray = array();
        $whereInArray2 = array();
        if ($this->session->userdata("loginType") == "student") {
            $this->db->where('student_num', $this->session->userdata("userID"));
        }
        $this->db->order_by('num', 'DESC');
        $query = $this->db->get('option_record')->result();
        foreach ($query as $row) {
            if (!in_array($row->questions_num, $whereInArray)) {
                $whereInArray[] = $row->questions_num;
            }
            $whereInArray2[] = $row->num;
            $returnData['recordList'][] = array(
                'num' => $row->num,
                'questions_num' => $row->questions_num,
                'up_date' => $row->up_date,
            );
        }
        if (count($whereInArray) > 0) {
            $this->db->where_in('num', $whereInArray);
            $query = $this->db->get('questions_list')->result();
            foreach ($query as $row) {
                $returnData['questionsList'][$row->num] = $row->title_dsc;
            }
        }
        if (count($whereInArray2) > 0) {
            $this->db->where_in('num', $whereInArray);
            $query = $this->db->get('scores_list')->result();
            foreach ($query as $row) {
                if ($row->count_list > '') {
                    $jsonArray = json_decode($row->count_list);
                    foreach ($jsonArray as $tempValue) {
                        $returnData['scoresList'][$row->num][] = $tempValue;
                    }
                }

            }
        }

        return $returnData;
    }

    public function getIsMyRecord($r_num, $num)
    {
        $isOk = false;
        if ($this->session->userdata("loginType") == "student") {
            $this->db->where('student_num', $this->session->userdata("userID"));
        }
        $this->db->where('num', $r_num);
        $this->db->where('questions_num', $num);
        $query = $this->db->get('option_record')->result();

        if (count($query) == 1) {
            $isOk = true;
        }

        return $isOk;
    }

    public function get_RecordData($r_num, $num)
    {
        $returnData = '';
        if ($this->session->userdata("loginType") == "student") {
            $this->db->where('student_num', $this->session->userdata("userID"));
        }
        $this->db->where('num', $r_num);
        $this->db->where('questions_num', $num);
        $query = $this->db->get('option_record')->result();
        foreach ($query as $row) {
            $returnData = $row->record_value;
        }

        return $returnData;
    }

    public function get_AllQData()
    {
        $returnData = '';
        $query = $this->db->get('questions_list')->result();
        foreach ($query as $row) {
            $returnData[$row->num] = $row->title_dsc;
        }

        return $returnData;
    }

    public function can_Test($num)
    {
        $returnValue = false;
        $QuationsData = $this->getQuationsData();
        $QuationsClassData = $this->getQuationsClassData();
        if (isset($QuationsData) and count($QuationsData) > 0) {
            foreach ($QuationsData as $key => $tempArray) {
                if ($tempArray['num'] == $num) {
                    if ($tempArray['is_practice'] == '1') {
                        $returnValue = true;
                    }
                    if ($tempArray['is_practice'] == '0') {
                        $nowdate = date("Y-m-d", time());
                        if (in_array($tempArray['num'], $QuationsClassData)) {
                            if ($nowdate >= $tempArray['begin_date'] and $nowdate <= $tempArray['end_date']) {
                                $returnValue = true;
                            }
                        }
                    }
                }
            }
        }

        return $returnValue;
    }

    public function get_TempRecordData($getNum)
    {
        $returnArray = array();
        if ($this->session->userdata("loginType") == "student") {
            $this->db->where('student_num', $this->session->userdata("userID"));
            $this->db->where('questions_num', $getNum);
            $query = $this->db->get('temp_option_record')->result();
            foreach ($query as $row) {
                $returnArray['record_value'] = $row->record_value;
                $returnArray['next_model_index'] = $row->next_model_index;
            }
        }


        return $returnArray;
    }

    public function get_ScorePG($num)
    {
        $dataArray = array();
        $this->db->where('num', $num);
        $this->db->where('student_num', $this->session->userdata("userID"));
        $query = $this->db->get('scores_list')->result();
        foreach ($query as $row) {
            if ($row->count_list > '') {
                $dataArray['scoreList'] = json_decode($row->count_list);
            }
            //學生資料
            $this->db->where('student_data.num', $row->student_num);
            $this->db->join('class_list', 'class_list.num = student_data.class_num', 'left');
            $query_1 = $this->db->get('student_data')->result();
            foreach ($query_1 as $row_1) {
                $dataArray['student_id'] = $row_1->student_id;//學號
                $dataArray['classDsc'] = $row_1->year_dsc.'年'.$row_1->class_dsc.'班';//班級
                $dataArray['student_name'] = $row_1->c_name;//姓名
            }

        }

        return $dataArray;
    }

    public function get_GeneralData()
    {
        $dataArray = array();
        $query = $this->db->get('general_data')->result();
        foreach ($query as $row) {
            $dataArray[$row->weight_dsc] = $row->weight_value;
        }

        return $dataArray;
    }
}