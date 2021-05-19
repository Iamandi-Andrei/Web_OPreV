<?php
// include database and object files
include_once 'database/database.php';

  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
$results=array();
$sql = "select * from data";



                if (!($rez = $db->query ($sql))) {
                    die ('A survenit o eroare la interogare');
                }
				

                while ($inreg = $rez->fetch_assoc()) {
					array_push($results,$inreg);
					
				   
                }
				

$parameters=array();



if(isset($_GET['country']))
	array_push($parameters,'country');
if(isset($_GET['age']))
	array_push($parameters,'age');
if(isset($_GET['year']))
	array_push($parameters,'year');
if(isset($_GET['gender']))
	array_push($parameters,'gender');
if(isset($_GET['BMI_type']))
	array_push($parameters,'BMI_type');


foreach($parameters as $param){
$new_results=array();
$filters=explode(",",$_GET[$param]);
foreach($filters as $filter)
{
	foreach($results as $res)
	{
		if($res[$param]==$filter)
			array_push($new_results,$res);
		
	}
	
	
}
$results=$new_results;

}

$total_values=array('country','age','year','gender','BMI_type','BMI_value');

foreach($new_results as $r){
	echo "<p>";
	foreach($total_values as $par)
	echo " ".$r[$par]." ";
	
	echo "</p>";

}
				









?>