<?php
	require_once 'Chemical.class.php';
	require_once 'output.php';
	
	$con = mysql_connect ( "localhost", "root", "" );
	if (! $con) {
		die ( '数据库连接失败: ' . mysql_error () );
	} else {
		mysql_select_db ( "environment", $con );
		mysql_query ( "SET NAMES 'UTF8'" );
		mysql_query ( "SET CHARACTER SET UTF8" );
		$result = mysql_query ( "SELECT * FROM chemicals" );
		$data = array ();
		$i = 0;
		while ( $row = mysql_fetch_array ( $result ) ) {
			$chBasic = new Chemical ();
			$chBasic->id = $row ["id"];
			$chBasic->name_zh = $row ["name_zh"];
			$chBasic->name_en = $row ["name_en"];
			$chBasic->molecular_formula = $row ["molecular_formula"];
			$chBasic->chemical_structure = $row ["chemical_structure"];
			$chBasic->mol_wt = $row ["molecular_weight"];
			$chBasic->cas = $row ["CAS_registry_number"];
			$chBasic->classify = $row ["classification"];
			$chBasic->appearance = $row ["appearance"];
			$chBasic->fusion_p = $row ["fusion_point"];
			$chBasic->boiling_p = $row ["boiling_point"];
			$chBasic->relative_density_water = $row ["relative_density_water"];
			$chBasic->relative_density_air = $row ["relative_density_air"];
			$chBasic->saturated_vapor_pressure = $row ["saturated_vapor_pressure"];
			$chBasic->sulubleness = $row ["solubleness"];
			$chBasic->combustibility = $row ["combustibility"];
			$chBasic->flash_point = $row ["flashing_point"];
			$chBasic->explosion_limit = $row ["explosion_limit"];
			$chBasic->stability = $row ["stability"];
			$chBasic->extinguishant = $row ["extinguishant"];
			$chBasic->taboo = $row ["taboo"];
			$chBasic->eco1 = $row ["ecology_col1"];
			$chBasic->eco2 = $row ["ecology_col2"];
			$chBasic->eco3 = $row ["ecology_col3"];
			$chBasic->eco4 = $row ["ecology_col4"];
			$chBasic->eco5 = $row ["ecology_col5"];
			$chBasic->eco6 = $row ["ecology_col6"];
			$chBasic->eco7 = $row ["ecology_col7"];
			$chBasic->eco8 = $row ["ecology_col8"];
			$chBasic->eco9 = $row ["ecology_col9"];
			$chBasic->eco10 = $row ["ecology_col10"];
			$chBasic->acute_toxicity = $row ["acute_toxicity"];
			$chBasic->skin_corrosion_stimulation = $row ["skin_corrosion_stimulation"];
			$chBasic->eye_injury_stimulation = $row ["eye_injury_stimulation"];
			$chBasic->sensitization = $row ["sensitization"];
			$chBasic->mutagenicity = $row ["mutagenicity"];
			$chBasic->carcinogenicity = $row ["carcinogenicity"];
			$chBasic->reproductive_toxicity = $row ["reproductive_toxicity"];
			$chBasic->systemic_toxicity = $row ["systemic_toxicity"];
			$chBasic->spill_response = $row ["spill_response"];
			$chBasic->reference = $row ["reference"];
			array_push ( $data, $chBasic );
		}

		output($data);
	}
	mysql_close ( $con );
?>

