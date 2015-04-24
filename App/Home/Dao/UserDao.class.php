<?php
namespace Home \ Dao;
use Think \ Model;
use Home \ Model \ User;
class UserDao extends Model {
	protected $tableName = 'user_info';
	private $model;
	function __construct() {
		parent :: __construct();
		$this->model = M('user_info');
	}
	public function querySingleById($userId) {
		$result = null;
		$conditon['userid'] = $userId;
		$res = $this->queryList($condition);
		if (count($res) != 0) {
			$result = $res[0];
		}
		return $result;
	}
	public function querySingleByName($username) {
		$result = null;
		$conditon['username'] = $username;
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
				$user->userid = $data[$i]['userid'];
				$user->username = $data[$i]['username'];
				$user->password = $data[$i]['password'];
				$user->user_level = $data[$i]['user_level'];
				array_push($result, $user);
			}
		}
		return $result;
	}

	public function insertSingle($user) {
		$result = 0;
		if ($user) {
			$data['username'] = $user->username;
			$data['password'] = $user->password;
			$data['user_level'] = $user->user_level;
			$result=$this->model->add($data);
		}
		return $result;
	}
	public function updateSingle($user) {
		$result = -1;
		if ($user) {
			$condition = "userid=" + $user->userid;
			$data['username'] = $user->username;
			$data['password'] = $user->password;
			$data['user_level'] = $user->user_level;
			$result = $this->model->where($condition)->save($data);
		}
		return $result;
	}
	public function deleteById($userId) {
		$conditon['userid'] = $userId;
		return $this->delete($condition);
	}
	public function delete($condition = "") {
		$result = $this->model->where($condition)->delete();
		return $result;
	}
}
?>