<?php
include_once '../database.php';

$database = new Database();
$db = $database->getConnection();
  
$results=array();
if(isset($_POST['country'])&&isset($_POST['age'])&&isset($_POST['year'])&&isset($_POST['gender'])&&isset($_POST['BMI_type'])&&isset($_POST['BMI_value'])){
	$condition='where BMI_type="'.$_POST['BMI_type'].'" and year="'.$_POST['year'].'" and country="'.$_POST['country'].'" and age="'.$_POST['age'].'" and gender="'.$_POST['gender'].'"';
$sql = 'select * from data '.$condition; 
}
else die("Missing fields");

echo $sql;

                if (!($rez = $db->query ($sql))) {
                    die ('A survenit o eroare la interogare');
                }
				

                if ($inreg = $rez->fetch_assoc()) {
					array_push($results,$inreg);
					echo "Data already existent. Updating values";
					
					$sql='delete from data '.$condition;
					$db->query ($sql);
					$sql='insert into data (country,age,year,gender,BMI_type,BMI_value) values (';
					$sql=$sql.'"'.$_POST['country'].'","'.$_POST['age'].'","'.$_POST['year'].'","'.$_POST['gender'].'","'.$_POST['BMI_type'].'","'.$_POST['BMI_value'].'")';
				   $db->query ($sql);
                }
				else{
					echo" Inserting now";
					$sql='insert into data (country,age,year,gender,BMI_type,BMI_value) values (';
					$sql=$sql.'"'.$_POST['country'].'","'.$_POST['age'].'","'.$_POST['year'].'","'.$_POST['gender'].'","'.$_POST['BMI_type'].'","'.$_POST['BMI_value'].'")';
				   $db->query ($sql);
					
				}



?>