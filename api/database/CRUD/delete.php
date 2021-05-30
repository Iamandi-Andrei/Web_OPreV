<?php
include_once '../database.php';

$database = new Database();
$db = $database->getConnection();
  
$results=array();
if(isset($_POST['country'])&&isset($_POST['age'])&&isset($_POST['year'])&&isset($_POST['gender'])&&isset($_POST['BMI_type'])){
	$statement=$db->prepare("delete from data where BMI_type= ? and year = ? and country = ? and age = ? and gender = ?");
	$statement->bind_param("sisss",$_POST['BMI_type'],$_POST['year'],$_POST['country'],$_POST['age'],$_POST['gender']);
	
	if(!$statement->execute()){
		die ('A survenit o eroare la interogare');
	}else echo "Row deleted!";
}
else die("Missing fields");



               
?>