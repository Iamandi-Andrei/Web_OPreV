<?php
error_reporting(E_ERROR | E_PARSE);

header("Content-type:image/svg+xml");
// include database and object files
include_once '../database/database.php';

  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

$create_file = fopen("representation.svg", "w");
fclose($create_file);

file_put_contents("representation.svg", "");
$file = fopen("representation.svg", "a");
  
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

if(count($new_results)==0)
	http_response_code(404);


 if(!($rez = $db->query("select count_nr from statistics where name = 'bar'"))) {
        die ('A aparut o eroare');
    }

    $inreg = $rez->fetch_assoc();
    $visits = $inreg['count_nr'];
    $visits += 1;

    if($db->query("update statistics set count_nr=$visits where name='bar'") === FALSE) {
        die ('A aparut o eroare');
    }

$total_values=array('country','age','year','gender','BMI_type','BMI_value');

$nodeG;
$nodeSVG;
$insertPlace=0;
$location;

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

function addRect($Y, $value) {
    global $file;
    echo '<rect x="20.3%" y="' . $Y . '" width="' . $value . '%" height="10"></rect>';
    fwrite($file, '<rect x="20.3%" y="' . $Y . '" width="' . $value . '%" height="10"></rect>');
}

function addText($Y, $value, $X) {
    global $file;
    echo '<text x="' . $X . '" y="' . $Y . '" fill="red" style="font-size: 10pt;">' . $value . '</text>';
    fwrite($file, '<text x="' . $X . '" y="' . $Y . '" fill="red" style="font-size: 10pt;">' . $value . '</text>');
}

try {
    $countryNumber = count($country);
    $pixels = $countryNumber * 20;

    $view = 16.575 * $countryNumber;
    $view2 = ($view * 1.81) + 5;

    echo '<svg id="svgg" xmlns="http://www.w3.org/2000/svg" height="' . $view2 . '" width="100%" preserveAspectRatio="xMinYMin meet">';
    fwrite($file, '<svg id="svgg" xmlns="http://www.w3.org/2000/svg" height="' . $view2 . '" width="100%" preserveAspectRatio="xMinYMin meet">');
    
    echo '<style>
        .bar {
            fill: red; /* changes the background */
            height: 21px;
            transition: fill .3s ease;
            cursor: pointer;
            font-family: Helvetica, sans-serif;
        }
        .bar text {
            color: black;
        }
        .bar:hover,
        .bar:focus {
            fill: black;
        }
        .bar:hover text,
        .bar:focus text {
            fill: red;
        }
        .hidden-text {
            display :none;
        }
        
        .bar:hover .hidden-text {
        display: block;
        } </style>';
    fwrite($file, '<style>
    .bar {
        fill: red; /* changes the background */
        height: 21px;
        transition: fill .3s ease;
        cursor: pointer;
        font-family: Helvetica, sans-serif;
    }
    .bar text {
        color: black;
    }
    .bar:hover,
    .bar:focus {
        fill: black;
    }
    .bar:hover text,
    .bar:focus text {
        fill: red;
    }
    .hidden-text {
        display :none;
    }
    
    .bar:hover .hidden-text {
    display: block;
    } </style>');

    $i=0;
    $Y = 10;
    while($i<count($country)){
        echo '<g class="bar">';
        fwrite($file, '<g class="bar">');
        addText($Y+9, $country[$i] . ' ' . $year[$i], 2);
        addRect($Y, $BMIvalues[$i]);
        $BMI_v = 22 + $BMIvalues[$i];
        addText($Y+9, strval($BMIvalues[$i]), "$BMI_v"."%");
        echo '<text class="hidden-text" x="20.2%" y="' . $Y+23 . '" fill="red" style="font-size: 10pt;">' . $age[$i] . ' ' . $gender[$i] . ' ' . $BMItype[$i] . '</text>';
        fwrite($file, '<text class="hidden-text" x="20.2%" y="' . $Y+23 . '" fill="red" style="font-size: 10pt;">' . $age[$i] . ' ' . $gender[$i] . ' ' . $BMItype[$i] . '</text>');
        $i++;
        $Y=$Y+30;
        echo '</g>';
        fwrite($file, '</g>');
    }

    echo '<line x1="20%" y1="0" x2="20%" y2="100%" style="stroke:rgb(255,0,0);stroke-width:2"></line>';
    fwrite($file, '<line x1="20%" y1="0" x2="20%" y2="100%" style="stroke:rgb(255,0,0);stroke-width:2"></line>');

    echo '</svg>';
    fwrite($file, '</svg>');
}
catch(Exception $e) {
    die ("A aparut o exceptie...");
}

fclose($file);
http_response_code(200);

?>
