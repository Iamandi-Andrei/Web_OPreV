<?php
error_reporting(E_ERROR | E_PARSE);
//header("Location: http://localhost/Web_OPreV/%22);






	//	$url="http://localhost/Web_OPreV/redirect/type=".$_GET['type']."/BMI=".$_GET['BMI']."/gender=".$_GET['gender']."/location=".$_GET['location']."/year=".$_GET['year']."/age=".$_GET['age'];
	
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
      $pos=strpos($url,"api/redirect.php");
	  $url=substr($url,0,$pos);
 //   echo $url;  
 
     $dom = new DomDocument; // instanțiem un obiect DOM

    $insertPlace= new DomDocument;
    $insertPlace->loadHTMLFile($url."html/index.html");

    $location=$insertPlace->getElementById("display-area");
 
	
	
$url=$url."api/views/".$_GET['view'].".php?";
if(isset($_GET['country'])){
$url=$url."country=";
foreach($_GET['country'] as $count)
$url=$url.$count.",";
$url=substr($url,0,-1);
}
if(isset($_GET['age'])){
$url=$url."&age=";
foreach($_GET['age'] as $count)
$url=$url.$count.",";
$url=substr($url,0,-1);
}
if(isset($_GET['gender'])){
$url=$url."&gender=";
foreach($_GET['gender'] as $count)
$url=$url.$count.",";
$url=substr($url,0,-1);
}
if(isset($_GET['BMI_type'])){
$url=$url."&BMI_type=";
foreach($_GET['BMI_type'] as $count)
$url=$url.$count.",";
$url=substr($url,0,-1);
}
if(isset($_GET['year'])){
$url=$url."&year=";
foreach($_GET['year'] as $count)
$url=$url.$count.",";
$url=substr($url,0,-1);
}


//echo $url;
$result=file_get_contents($url);

$doc = new DomDocument;
libxml_use_internal_errors(true);
$doc->loadHTMLFile($url);

//$newDiv = $dom->createElement('div');

foreach ($doc->getElementsByTagName('body')->item(0)->childNodes as $node) {
    $node = $insertPlace->importNode($node, true);
    $location->appendChild($node);
}
	


   echo $insertPlace->saveHTML();
	
	?>