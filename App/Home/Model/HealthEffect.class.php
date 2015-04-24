<?php
namespace Home \ Model;
class HealthEffect extends BasicClass {
	/**
	 * 化学品ID
	 */
	public $chemical_id = -1;
	/**
	 * 急性毒性
	 */
	public $acute_toxicity = "";
	/**
	 * 皮肤腐蚀或刺激
	 */
	public $skin_corr = "";
	/**
	 * 眼损伤或刺激
	 */
	public $eye_damage = "";
	/**
	 * 呼吸或皮肤过敏
	 */
	public $breath_allergy = "";
	/**
	 * 生殖细胞致突变性
	 */
	public $cell_muta = "";
	/**
	 * 致癌性
	 */
	public $carcino = "";
	/**
	 * 生殖毒性
	 */
	public $reprodu_toxicity = "";
	/**
	 * 特异性靶器官系统毒性
	 */
	public $specific_target_organ_toxicity = "";
}
?>