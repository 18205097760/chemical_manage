<?php
namespace Home \ Model;
class MaterialAttr extends BasicClass {
	/**
	 * 化学品ID
	 */
	public $chemical_id = -1;
	/**
	 * 化学品外观和形状
	 */
	public $appear_shape = "";
	/**
	 * 熔点
	 */
	public $melt_point = "";
	/**
	 *沸点 
	 */
	public $boil_point = "";
	/**
	 * 相对水密度
	 */
	public $density_water = "";
	/**
	 * 相对空气密度
	 */
	public $density_air = "";
	/**
	 * 饱和蒸气压
	 */
	public $sat_vap_press = "";
	/**
	 *溶解性 
	 */
	public $solubility = "";
	/**
	 * 燃烧性
	 */
	public $combustion = "";
	/**
	 * 闪点
	 */
	public $flash_point = "";
	/**
	 *爆炸极限 
	 */
	public $explo_limit = "";
	/**
	 * 稳定性
	 */
	public $stability = "";
	/**
	 * 灭火剂
	 */
	public $fire_exti_agent = "";
	/**
	 * 禁忌物
	 */
	public $contr_dicat = "";
	
}
?>