<?php
	require_once "Classes/PHPExcel/IOFactory.php";

	echo('
<form method="post">
  	<label>fichier xls</label> : <input type="file" name="file"><br/><br/>
  	<label>Nom de la table</label> : <input type="text" name="name"><br/><br/>
  	<input type="checkbox" name="lorraine"> <label> Sortir seulement la lorraine </label><br/><br/>
 	<input type="submit">
</form>');

if(isset($_POST["file"]) && isset($_POST["name"]))
{

	echo('
Ouverture du fichier xsl... <br/>
	');

	$tableName = $_POST["name"];
	$firstLine = false;

 
	//load Excel template file
	$objPHPExcel = PHPExcel_IOFactory::load($_POST["file"]);
	$objPHPExcel->setActiveSheetIndex(0);  //set first sheet as active
	

	$file = fopen("table.sql","w");

	$Createtable = "

	SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
	SET time_zone = \"+00:00\";

	CREATE TABLE `". $tableName ."` (";

	$Inserttable = "
	INSERT INTO `". $tableName ."` (";

	$Insertline = "";	

	for($j=6;$j<36688; $j++){		
		echo("
<script>
   	document.getElementById(\"nbRequetes\").innerHTML = ". ($j-7) ."+\" lignes traitées\"
</script>");

		for($i="A";$i!="AZ";$i++){	
			if($objPHPExcel->getActiveSheet()->getCell($i.$j)->getValue() == "" && $objPHPExcel->getActiveSheet()->getCell($i.$j)->getValue() != "0"){
				break;
			}
			if($j == 6)
			{				
				if($i == "A")
				{
					$PrimaryKey ="

	ALTER TABLE `". $tableName ."`
  		ADD PRIMARY KEY (`". $objPHPExcel->getActiveSheet()->getCell($i.$j)->getValue() ."`);
	";
					$Createtable .= "
	`". $objPHPExcel->getActiveSheet()->getCell($i.$j)->getValue() ."` varchar(50) NOT NULL";

					$Inserttable .= "`". $objPHPExcel->getActiveSheet()->getCell($i.$j)->getValue() ."`";
				}else{
					$Createtable .= "
	, `". $objPHPExcel->getActiveSheet()->getCell($i.$j)->getValue() ."` varchar(50) DEFAULT NULL";

					$Inserttable .= ", `". $objPHPExcel->getActiveSheet()->getCell($i.$j)->getValue() ."`";

				}
			}
			if(!isset($_POST["lorraine"]) || substr($objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue(),0,2) == "54")
			{
				if($i == "A" && $j > 6){
					if($j == 7 || !$firstLine){
						$firstLine = true;
						$Insertline .= "
		(\"". $objPHPExcel->getActiveSheet()->getCell($i.$j)->getValue() ."\"";
					}else{
						$Insertline .= "),
		(\"". $objPHPExcel->getActiveSheet()->getCell($i.$j)->getValue() ."\"";
					}
				}else if($i != "A" && $j != 6){
					$Insertline .= ", \"". $objPHPExcel->getActiveSheet()->getCell($i.$j)->getValue() ."\"";
				}
			}
		}

		if($objPHPExcel->getActiveSheet()->getCell("A".$j) == "")
		{
			//$Inserttable .= ") VALUES";
			break;
		}		
	}	
	echo("
Terminé!");

	$Inserttable .= ") VALUES";

	$Insertline .= ");";

	$Createtable .= "
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	";

	fwrite($file, $Createtable);
	fwrite($file, $Inserttable);
	fwrite($file, $Insertline);
	fwrite($file, $PrimaryKey);
	fclose($file);
}
?>