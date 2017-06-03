<?php
/*
*	get_model_data
*/
class Modelpg_model extends CI_Model {
	public function __construct() {
        parent::__construct();
    }
	
	public function get_model2_data(){
		$returnData = array();
		
		$returnData = array(
		'userType'=>'A',
		'friendType'=>'B',
		'maxPlayNumber'=>'10',
		'span_data_array'=>'10'
		);

		
		return $returnData;
	}
	
	public function get_model3_data(){
		$returnData = array(
			'userType'=>'A',			
			'friendType'=>'B'
		);

		
		return $returnData;
	}
	
	public function get_model4_data(){
		$returnData = array();
		$htmlDsc = '小孩：喜好偏甜、冰塊正常且有嚼勁的大顆粒珍珠';
		$htmlDsc .= '年輕人：愛喝波霸珍珠奶茶，甜度適中、一點點碎冰';
		$htmlDsc .= '中年人：重視養生，喜歡常溫的奶茶，甜度較低，喜歡小珍珠';
		$returnData = array(
			'htmlDsc'=>$htmlDsc,
			'userType'=>'A',			
			'friendType'=>'B'
		);

		
		return $returnData;
	}
}