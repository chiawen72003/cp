<?php namespace Twcloud\Teaching\Http\Controllers;

use Illuminate\Http\Request;
use \Input;
use \Validator;
use \Session;
use \DB;
use Twcloud\Teaching\Models\BaseModel;
use Twcloud\Teaching\Models\TeachingSumGradeLesson;

class Ministry11Controller extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller rendors your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		// $this->middleware('auth');
		// $this->middleware('guest');
	}
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index() {
		return;
	}

	public function getStep() {
		$test = new Ministry00Controller;
		$data = $test->thisTypeName();
		
		$data['level_low'] = array('不分年級', '一年級', '二年級', '三年級', '四年級', '五年級', '六年級', '七年級', '八年級', '九年級', '跨年級');
		if($data['type']<14){
		unset($data['level_low'][7]);
		unset($data['level_low'][8]);
		unset($data['level_low'][9]);
		}
		if($data['type']>=14){
		unset($data['level_low'][1]);
		unset($data['level_low'][2]);
		unset($data['level_low'][3]);
		unset($data['level_low'][4]);
		unset($data['level_low'][5]);
		unset($data['level_low'][6]);
		}
		//$data['level_height'] = array('不分年級', '七年級', '八年級', '九年級', '跨年級');
		/*
		for($i=0;$i<11;$i++){
		DB::table('teaching_sum_grade_lessons')->insert(
    array('kind_id' => '11', 'type_id' => $i)
);
		}
		for($i=0;$i<11;$i++){
		DB::table('teaching_sum_grade_lessons')->insert(
    array('kind_id' => '13', 'type_id' => $i)
);
		}
		for($i=0;$i<11;$i++){
		DB::table('teaching_sum_grade_lessons')->insert(
    array('kind_id' => '14', 'type_id' => $i)
);
		}
		for($i=0;$i<11;$i++){
		DB::table('teaching_sum_grade_lessons')->insert(
    array('kind_id' => '17', 'type_id' => $i)
);
		}
*/
		$data['Form_array'] = TeachingSumGradeLesson::where('kind_id', $data['type'])->get();
		
		$data['dir_left'] = route('teaching.ministry.1.0');
		$data['dir_right'] = route('teaching.ministry.1.2');
		
		return view('teaching::ministry.11', $data);
	}
	
	// 新增
	public function postStepAdd() {
		$test = new Ministry00Controller;
		$data = $test->thisTypeName();
		
		$fp = Input::all();
		if($fp['domain']=='addForm'){
			$add = new TeachingSumGradeLesson;
			$add->kind_id = $data['type'];
			$add->type_id = $fp['add_type_id'];
			$add->lesson_amount = $fp['add_lesson_amount'];
			$add->soft_min = $fp['add_soft_min'];
			$add->soft_max = $fp['add_soft_max'];
			$add->save();
		}
		
		return redirect()->back();
	}
	
	// 更新
	public function postStepUpdate() {
		$test = new Ministry00Controller;
		$data = $test->thisTypeName();
		
		$fp = Input::all();
		if($fp['domain']=='updateForm' && isset($fp['id'])){
			// 刪除後新增
			TeachingSumGradeLesson::destroy($fp['id']);
			foreach($fp['id'] as $k=>$v){
				$add = new TeachingSumGradeLesson;
				$add->kind_id = $data['type'];
				$add->type_id = $fp['type_id'][$k];
				$add->lesson_amount = $fp['lesson_amount'][$k];
				$add->soft_min = $fp['soft_min'][$k];
				$add->soft_max = $fp['soft_max'][$k];
				$add->save();
			}
		}
		
		return redirect()->back();
	}
	
	// 刪除
	public function postStepDelete($id) {
		TeachingSumGradeLesson::destroy($id);
		return response()->json(['message' => 'Success.']);
	}
	
}
