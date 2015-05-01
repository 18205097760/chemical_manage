<?php
namespace Admin \ Dao;
use Think \ Model;
use Admin \ Model \ User;
class UserDao extends Model {
	protected $tableName = 'user';
	private $model;
	
	function __construct() {
		parent :: __construct();
		$this->model = M('user');
	}
	public function querySingleById($userId) {
	     
		$result = null;
		$condition="id='".$userId."' and type='admin'";
		$res = $this->queryList($condition);
		if (count($res) != 0) {
			$result = $res[0];
		}
		return $result;
	}
	
	public function queryList($condition = "") {
		$result = array ();
		$data = $this->model->where($condition)->select();
		if ($data) {
			$len = count($data);
			for ($i = 0; $i < $len; $i++) {
				$user = new User();
				$user->userid = $data[$i]['id'];
				$user->password = $data[$i]['password'];
				$user->type = $data[$i]['type'];
				array_push($result, $user);
			}
		}
		return $result;
	}


}
?>