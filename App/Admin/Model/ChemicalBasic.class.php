<?php
namespace Home \ Model;

class ChemicalBasic extends DangerLevel {
	/**
	 * 化学品ID
	 */
	public $chemical_id=-1;
	/**
	 * 中文名
	 */
	public $name_cn="";
	/**
	 * 英文名
	 */
	public $name_en="";
	/**
	 *CAS号 
	 */
	public $cas_no="";
	/**
	 * 分子式
	 */
	public $molec_formu="";
	/**
	 * 化学结构式
	 */
	public $chemical_struct="";
	/**
	 * 分子量
	 */
	public $molec_num=0.0;
}
?>