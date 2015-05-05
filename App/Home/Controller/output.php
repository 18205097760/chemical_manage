<?php
	require_once 'PHPExcel_1.8.0_doc/Classes/PHPExcel.php';
	require_once 'PHPExcel_1.8.0_doc/Classes/PHPExcel/IOFactory.php';
	require_once 'PHPExcel_1.8.0_doc/Classes/PHPExcel/Writer/Excel2007.php';
	require_once 'PHPExcel_1.8.0_doc/Classes/PHPExcel/Reader/Excel2007.php';
	
	function output($data) {
// 		$filePath = 'F:/Program Files (x86)/xampp/htdocs/chemical_manage/Public/example.xlsx';
		$filePath='example.xlsx';
		$PHPExcel = new PHPExcel ();
		
		$PHPReader =PHPExcel_IOFactory::createReader('Excel2007'); 
		$PHPExcel = $PHPReader->load ( $filePath );
		
		$num = count($data);
		$PHPExcel-> getActiveSheet () ->getStyle('A1:AQ1000')->getAlignment()->setWrapText(true);
		for($i=0;$i< $num; $i++){
			$j = $i+5;
			
			$PHPExcel->getActiveSheet()->getRowDimension(''.$j)->setRowHeight(120);
			//基本信息
			$PHPExcel->getActiveSheet ()->setCellValue ( 'A'.$j, $data[$i]->id);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'B'.$j, $data[$i]->name_zh);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'C'.$j, $data[$i]->name_en);
			
			//分子式的处理（利用下标）
			$molecular_f =  $data[$i]->molecular_formula;
			$molecular_f = str_replace("</sub>",";", $molecular_f);
			$molecular_f = str_replace("<sub>",";", $molecular_f);
			$arr = explode(";",$molecular_f);
			$objRichText = new PHPExcel_RichText();
			$t = 0;
			$len = count($arr);
			while($t < $len){
				if($t % 2 == 0){
					$objRichText->createText($arr[$t]);
				}else{
					$objPayable = $objRichText->createTextRun($arr[$t]);
					$objPayable->getFont()->setsubScript(true);
				}
				$t++;
			}
			$PHPExcel->getActiveSheet ()->setCellValue ( 'D'.$j,$objRichText);
			
			
			//图片处理
			
			//写到文件temp.png之中
			if($data[$i]->chemical_structure != null){
				$fh = fopen("pic/pic_$i.png", "w");
				fwrite($fh,  $data[$i]->chemical_structure);
				fclose($fh);
				
				$objDrawing = new PHPExcel_Worksheet_Drawing();
				$objDrawing->setName('chemical_structure');
				$objDrawing->setDescription('结构图');
				$objDrawing->setPath("pic/pic_$i.png");
				$objDrawing->setHeight(120);
				$objDrawing->setCoordinates('E'.$j);
				$objDrawing->setWorksheet($PHPExcel->getActiveSheet ());
			}else{
				$PHPExcel->getActiveSheet ()->setCellValue ('E'.$j, "无图片");
			}
		
			
			
			$PHPExcel->getActiveSheet ()->setCellValue ( 'F'.$j, $data[$i]->mol_wt);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'G'.$j, $data[$i]->cas);
			if( $data[$i]->classify == '1'){	
				$PHPExcel->getActiveSheet ()->setCellValue ( 'H'.$j, "是");
			}else	
			if( $data[$i]->classify == '2'){	
				$PHPExcel->getActiveSheet ()->setCellValue ( 'I'.$j, "是");
			}else{
				$PHPExcel->getActiveSheet ()->setCellValue ( 'J'.$j, "是");
			}
			
			//物化性质
			$PHPExcel->getActiveSheet ()->setCellValue ( 'K'.$j, $data[$i]->appearance);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'L'.$j, $data[$i]->fusion_p);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'M'.$j, $data[$i]->boiling_p);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'N'.$j, $data[$i]->relative_density_water);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'O'.$j, $data[$i]->relative_density_air);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'P'.$j, $data[$i]->saturated_vapor_pressure);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'Q'.$j, $data[$i]->sulubleness);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'R'.$j, $data[$i]->combustibility);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'S'.$j, $data[$i]->flash_point);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'T'.$j, $data[$i]->explosion_limit);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'U'.$j, $data[$i]->stability);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'V'.$j, $data[$i]->extinguishant);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'W'.$j, $data[$i]->taboo);
			
			//生态学信息
			$PHPExcel->getActiveSheet ()->setCellValue ( 'X'.$j, $data[$i]->eco1);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'Y'.$j, $data[$i]->eco2);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'Z'.$j, $data[$i]->eco3);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AA'.$j, $data[$i]->eco4);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AB'.$j, $data[$i]->eco5);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AC'.$j, $data[$i]->eco6);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AD'.$j, $data[$i]->eco7);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AE'.$j, $data[$i]->eco8);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AF'.$j, $data[$i]->eco9);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AG'.$j, $data[$i]->eco10);
			
			//健康效应
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AH'.$j, $data[$i]->acute_toxicity);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AI'.$j, $data[$i]->skin_corrosion_stimulation);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AJ'.$j, $data[$i]->eye_injury_stimulation);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AK'.$j, $data[$i]->sensitization);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AL'.$j, $data[$i]->mutagenicity);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AM'.$j, $data[$i]->carcinogenicity);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AN'.$j, $data[$i]->reproductive_toxicity);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AO'.$j, $data[$i]->systemic_toxicity);
			
			//其他
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AP'.$j, $data[$i]->spill_response);
			$PHPExcel->getActiveSheet ()->setCellValue ( 'AQ'.$j, $data[$i]->reference);
		}
		
		
		$outputFileName = 'total.xlsx';
		$objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel5');
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');  
    	header('Cache-Control: max-age=0');  
		header ( 'Content-Disposition:attachment;filename="total.xlsx"' );
		$objWriter->save ( 'php://output' );
	}
?>