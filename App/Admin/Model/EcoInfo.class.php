<?php
namespace Home \ Model;
class EcoInfo extends BasicClass {
	/**
	 * 化学品ID
	 */
	public $chemical_id=-1;
	/**
	 * 急性毒性
	 */
	public $acute_toxicity = "";
	/**
	 * 急性预测
	 */
	public $acute_predict = "";
	/**
	 * 慢性毒性
	 */
	public $chronic_toxicity = "";
	/**
	 * 慢性预测
	 */
	public $chronic_predict = "";
	/**
	 * 降解性实测
	 */
	public $degra_test = "";
	/**
	 * 降解性预测
	 */
	public $degra_predict = "";
	/**
	 * 生物累积鱼类测量值
	 */
	public $cum_bcf_test = "";
	/**
	 * 生物累积鱼类预测值
	 */
	public $cum_bcf_predict = "";
	/**
	 * 生物累积lgkow测量值
	 */
	public $cum_lgkow_test = "";
	/**
	 * 生物累积lgkow预测值
	 */
	public $cum_lgkow_predict = "";
}
?>