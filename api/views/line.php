

<?php
//error_reporting(E_ERROR | E_PARSE);




//header("Content-type:image/svg+xml");
 

include_once '../database/database.php';

  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

$create_file = fopen("representation.svg", "w");
fclose($create_file);

file_put_contents("representation.svg", "");
$file = fopen("representation.svg", "a");
  
$results=array();
$sql = "select * from data order by year asc";



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

$total_values=array('country','age','year','gender','BMI_type','BMI_value');

/*
foreach($new_results as $r){
	echo "<p>";
	foreach($total_values as $par)
	echo " ".$r[$par]." ";
	
	echo "</p>";

}
*/


$pairs=array();
$pair=array();
$maxValue=0;
$minValue=2020;
$years=array();
foreach($new_results as $r){
	
	$pair=array('country' =>$r['country'],'age'=>$r['age'],'gender'=>$r['gender'],'BMI_type'=>$r['BMI_type']);
	//echo $r['country']." ".$r['age']." ".$r['gender']." ".$r['BMI_type'];
	if(!in_array($pair,$pairs))
	array_push($pairs,$pair);
	if($r['BMI_value']<$minValue)$minValue=$r['BMI_value'];
	if($r['BMI_value']>$maxValue)$maxValue=$r['BMI_value'];
	if(!in_array($r['year'],$years))
		array_push($years,$r['year']);
	
}
 

/*

foreach($pairs as $r)
{
	echo "<p>";
	echo $r['country']." ".$r['age']." ".$r['gender']." ".$r['BMI_type'];
	echo "</p>";
}

*/


 if(!($rez = $db->query("select count_nr from statistics where name = 'line'"))) {
        die ('A aparut o eroare');
    }

    $inreg = $rez->fetch_assoc();
    $visits = $inreg['count_nr'];
    $visits += 1;

    if($db->query("update statistics set count_nr=$visits where name='line'") === FALSE) {
        die ('A aparut o eroare');
    }


$height=17.5*count($pairs)+100;
if($height<500)$height=500;



 echo '<svg id="svgg" xmlns="http://www.w3.org/2000/svg" height="'.$height.'" width="100%"  preserveAspectRatio="none">
<rect x="0" y="0" rx="7" ry="7" style="width: 100%; height: 100%;
fill: #99CCEE; stroke: black"></rect>
<line x1="0" y1="'.($height-100).'" x2="100%" y2="'.($height-100).'" style="stroke:rgb(255,0,0);stroke-width:2"></line>
<line x1="10%" y1="0" x2="10%" y2="100%" style="stroke:rgb(255,0,0);stroke-width:2"></line>
<line x1="20%" y1="0" x2="20%" y2="100%" style="stroke:rgb(255,0,0);stroke-width:2"></line>
';
fwrite($file, '<svg id="svgg" xmlns="http://www.w3.org/2000/svg" height="'.$height.'" width="100%"  preserveAspectRatio="none">
<rect x="0" y="0" rx="7" ry="7" style="width: 100%; height: 100%;
fill: #99CCEE; stroke: black"></rect>
<line x1="0" y1="'.($height-100).'" x2="100%" y2="'.($height-100).'" style="stroke:rgb(255,0,0);stroke-width:2"></line>
<line x1="10%" y1="0" x2="10%" y2="100%" style="stroke:rgb(255,0,0);stroke-width:2"></line>
<line x1="20%" y1="0" x2="20%" y2="100%" style="stroke:rgb(255,0,0);stroke-width:2"></line>
');
ob_flush();



function printGraph($options,$values,$color){
	global $minValue,$maxValue,$percent,$years,$file,$height;
	
	 
	 $i=0;
	 while($i<count($values)){
			if($values[$i]!=$maxValue){
			 $Y2=$height-$height*($values[$i]-$minValue)/($maxValue-$minValue)-100;
			
			echo '<text x="15%" y="'.  $Y2  .'" fill="rgb'.$color.'" style="font-size: 10pt" >'.$values[$i].'</text>';
			fwrite($file, '<text x="15%" y="'.  $Y2  .'" fill="rgb'.$color.'" style="font-size: 10pt" >'.$values[$i].'</text>');
			ob_flush();
			}
		$i++; 
	 }
	 $current=$percent+20;
	 $prev=$values[0];
	 $i=1; 
	 while($i<count($values)){
		 $valX1=(20+((array_search($options[$i-1], $years)+1)*$percent))."%";
		 
		 $valX2=(20+((array_search($options[$i], $years)+1)*$percent))."%";
		 $Y1=$height-$height*(($prev-$minValue)/($maxValue-$minValue))-100;
		 $Y2=$height-$height*(($values[$i]-$minValue)/($maxValue-$minValue))-100;	 
		 echo '<line x1="'.$valX1.'" y1="'.$Y1.'" x2="'.$valX2.'" y2="'.$Y2.'" style="stroke:rgb'.$color.';stroke-width:2"></line>';
		 fwrite($file, '<line x1="'.$valX1.'" y1="'.$Y1.'" x2="'.$valX2.'" y2="'.$Y2.'" style="stroke:rgb'.$color.';stroke-width:2"></line>');
		 ob_flush();
		 $prev=$values[$i];
		 $i++;
	 }
	 
	 
}
	
	
	$percent=80/(count($years)+1);


	$val=$percent."%";
	$current=$percent+20;
	
	$i=0;
	while($i<count($years)){
		$val=$current."%";
		if($i%2==0) {
			echo '<text x="'.$val.'" y="'.($height-80).'" fill="red"  >'.$years[$i]."</text>";
			fwrite($file, '<text x="'.$val.'" y="'.($height-80).'" fill="red"  >'.$years[$i]."</text>");
		}
	
		else {
			echo '<text x="'.$val.'" y="'.($height-10).'" fill="red"  >'.$years[$i]."</text>";
			fwrite($file, '<text x="'.$val.'" y="'.($height-10).'" fill="red"  >'.$years[$i]."</text>");
		}
		$current=$current+$percent;
		$i++;
		}
	echo '<text x="15%" y="10" fill="red" style="font-size: 10pt" >'.$maxValue.'</text>';
	fwrite($file, '<text x="15%" y="10" fill="red" style="font-size: 10pt" >'.$maxValue.'</text>');
	echo '<text x="15%" y="'.($height-100).'" fill="red" style="font-size: 10pt" >'.$minValue.'</text>';
	fwrite($file, '<text x="15%" y="'.($height-100).'" fill="red" style="font-size: 10pt" >'.$minValue.'</text>');
	ob_flush();
	
	/*
$color ="(".mt_rand(0, 255).",".mt_rand(0, 255).",".mt_rand(0, 255).")";
$options=array(2014,2015,2016,2017);
$values=array(1000,500,250,430);
printGraph($options,$values,$color);
$color ="(".mt_rand(0, 255).",".mt_rand(0, 255).",".mt_rand(0, 255).")";
$options=array(2014,2015,2016,2017);
$values=array(500,1000,100,210);
printGraph($options,$values,$color);
*/
$perc=($height-100)/(count($pairs)+1);
$y=10;
//echo $perc;
foreach($pairs as $unique){
	$options=array();
	$values=array();
	foreach($new_results as $r)
		if(($r['country']==$unique['country'])&&($r['age']==$unique['age'])&&($r['gender']==$unique['gender'])&&($r['BMI_type']==$unique['BMI_type']))
		{
			array_push($options,$r['year']);
		 array_push($values,$r['BMI_value']);
		}
		$color ="(".mt_rand(0, 255).",".mt_rand(0, 255).",".mt_rand(0, 255).")";
		if((count($options)>1)&&(count($values)>1)){
			//$yP=$y."%";
			echo '<text x="0.2%" y="'.$y.'" fill="rgb'.$color.'" style="font-size: 10pt" >'.$unique['country']." ".$unique['BMI_type'].' </text>';
			fwrite($file, '<text x="0.2%" y="'.$y.'" fill="rgb'.$color.'" style="font-size: 10pt" >'.$unique['country']." ".$unique['BMI_type'].' </text>');
			echo '<text x="0.2%" y="'.($y+10).'" fill ="rgb'.$color.'" style="font-size:10pt" >'.$unique['age']." ".$unique['gender'].'</text>';
			fwrite($file, '<text x="0.2%" y="'.($y+10).'" fill ="rgb'.$color.'" style="font-size:10pt" >'.$unique['age']." ".$unique['gender'].'</text>');
			$y=$y+$perc;
	printGraph($options,$values,$color);
	
		}
}
echo "</svg>";
fwrite($file, "</svg>");
fclose($file);
http_response_code(200);

 
 








?>











