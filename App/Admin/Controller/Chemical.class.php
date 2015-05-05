<?php
class Chemical
{
    /**
     * 化学用品id
     */
    public $id=-1;
    
    /**
     * 中文名
     */
    public $name_zh;
    
    /**
     * 英文名
     */
    public $name_en;
    
    /**
     * 分子式
     */
    public $molecular_formula;
    
    /**
     * 分子结构图
     */
    public $chemical_structure;
    
    /**
     * 分子量
     */
    public $mol_wt;
    
    /**
     * CAS号
     */
    public $cas;
    
    /**
     * 危险等级
     */
    public $classify;
    
    /**
     * 外形
     */
    public $appearance;
    
    /**
     * 熔点
     */
    public $fusion_p;
    
    /**
     * 沸点
     */
    public $boiling_p;
    
    /**
     * 相对液体密度
     */
    public $relative_density_water;
    
    /**
     * 相对气体密度
     */
    public $relative_density_air;
    
    /**
     * 饱和蒸气压
     */
    public $saturated_vapor_pressure;
    
    /**
     * 溶解性
     */
    public $sulubleness;
    
    /**
     * 燃烧性
     */
    public $combustibility;
    
    /**
     * 闪点
     */
    public $flash_point;
    
    /**
     * 爆炸极限
     */
    public $explosion_limit;
    
    /**
     * 稳定性
     */
    public $stability;
    
    /**
     * 灭火剂
     */
    public $extinguishant;
    
    /**
     * 禁忌物
     */
    public $taboo;
    
    /**
     * 生态学信息
     */
    public $eco1;
    
    public $eco2;
    
    public $eco3;
    
    public $eco4;
    
    public $eco5;
    
    public $eco6;
    
    public $eco7;
    
    public $eco8;
    
    public $eco9;
    
    public $eco10;
    
    /**
     * 急性毒性
     */
    public $acute_toxicity;
    
    /**
     * 皮肤腐蚀或刺激
     */
    public $skin_corrosion_stimulation;
    
    /**
     * 眼损伤或刺激
     */
    public $eye_injury_stimulation;
    
    /**
     * 过敏
     */
    public $sensitization;
    
    /**
     * 生殖细胞致突变性
     */
    public $mutagenicity;
    
    /**
     * 致癌性
     */
    public $carcinogenicity;
    
    /**
     * 生殖毒性
     */
    public $reproductive_toxicity;
    
    /**
     * 特异性靶器官系统毒性
     */
    public $systemic_toxicity;
    
    /**
     * 泄露处理
     */
    public $spill_response;
    
    /**
     * 参考
     */
    public $reference;
    
}

?>