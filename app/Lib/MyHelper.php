<?php
namespace App\Lib;

class MyHelper {
	public static function  checkGet($data){
			if($data && !empty($data)) return ['status' => 'success', 'result' => $data];
			else if(empty($data)) return ['status' => 'fail', 'messages' => ['empty']];
			else return ['status' => 'fail', 'messages' => ['failed to retrieve data']];
	}

	public static function  checkCreate($data, $returnAll = false){
			if($data) return ['status' => 'success', 'result' => $data];
			else return ['status' => 'fail', 'result' => ['failed to insert data.']];
	}

	public static function  checkUpdate($status){
			if($status) return ['status' => 'success'];
			else return ['status' => 'fail','messages' => ['failed to update data']];
	}

	public static function  checkDelete($status){
			if($status) return ['status' => 'success'];
			else return ['status' => 'fail', 'messages' => ['failed to delete data']];
	}
}