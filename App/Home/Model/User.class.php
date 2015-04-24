<?php
namespace Home \ Model;
class User extends BasicClass {
	/**
	 * 用户ID
	 */
	public $userid = -1;
	/**
	 * 用户名
	 */
	public $username = "";
	/**
	 * 密码
	 */
	public $password = "";
	/**
	 * 用户级别
	 */
	public $user_level = 1;
}
?>