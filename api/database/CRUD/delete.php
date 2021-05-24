<?php
include_once '../database.php';

$database = new Database();
$db = $database->getConnection();
  
$results=array();
if(isset($_POST['country'])&&isset($_POST['age'])&&isset($_POST['year'])&&isset($_POST['gender'])&&isset($_POST['BMI_type'])){
	$condition='where BMI_type="'.$_POST['BMI_type'].'" and year="'.$_POST['year'].'" and country="'.$_POST['country'].'" and age="'.$_POST['age'].'" and gender="'.$_POST['gender'].'"';
$sql = 'delete from data '.$condition; 
}
else die("Missing fields");

echo $sql;

                if (!($rez = $db->query ($sql))) {
                    die ('A survenit o eroare la interogare');
                }
				
                echo "Row deleted!";
?>