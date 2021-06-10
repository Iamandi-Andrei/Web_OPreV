<?php
error_reporting(E_ERROR | E_PARSE);

// include database and object files
include_once '../database/database.php';
header("Content-type:application/xml");
  
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

$new_results=array();
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

if(count($new_results)==0)
	$new_results=$results;

if(count($new_results)==0)
{http_response_code(404);die("No data found");}


 if(!($rez = $db->query("select count_nr from statistics where name = 'table'"))) {
        die ('A aparut o eroare');
    }

    $inreg = $rez->fetch_assoc();
    $visits = $inreg['count_nr'];
    $visits += 1;

    if($db->query("update statistics set count_nr=$visits where name='table'") === FALSE) {
        die ('A aparut o eroare');
    }


$total_values=array('country','age','year','gender','BMI_type','BMI_value');

$country = array();
$age = array();
$year = array();
$gender = array();
$BMItype = array();
$BMIvalues = array();

foreach($new_results as $r){
	array_push($country, $r['country']);
    array_push($age, $r['age']);
    array_push($year, $r['year']);
    array_push($gender, $r['gender']);
    array_push($BMItype, $r['BMI_type']);
    array_push($BMIvalues, $r['BMI_value']);
}

function addTh($value) {
    echo '<th>' . $value . '</th>';
}

function addTd($value) {
    echo '<td>' . $value . '</td>';
}

echo '<table class="result-table" id="svgg">';
echo '<thead>';
echo '<tr>';

addTh('Country');
addTh('Age');
addTh('Year');
addTh('Gender');
addTh('BMI type');
addTh('BMI value');

echo '</tr>';
echo '</thead>';

echo '<tbody>';

$i = 0;
while($i < count($country)) {
    echo '<tr>';
    addTd($country[$i]);
    addTd($age[$i]);
    addTd($year[$i]);
    addTd($gender[$i]);
    addTd($BMItype[$i]);
    addTd($BMIvalues[$i]);

    echo '</tr>';
    $i++;
}

echo '</tbody></table>';
http_response_code(200);

?>