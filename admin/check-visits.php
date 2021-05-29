<?php
    include_once '../api/database/database.php';

    session_start();
    if(!isset($_SESSION['login']) && !$_SESSION['login']) {
        header("Location: login-required.php");
    }

    $database = new Database();
    $mysql = $database->getConnection();

    $sql = "select * from statistics where name='visits'";

    if (!($rez = $mysql->query ($sql))) {
        die ('A survenit o eroare la interogare');
    }

    if (!($inreg = $rez->fetch_assoc())) {
        $message = 'Error!!!';
    }
    else {
        $message = $inreg["count_nr"];
    }

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
    else  
        $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   

    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];
    $pos=strpos($url,"check-visits.php");
    $url=substr($url,0,$pos);
   
    echo $url;
    $dom = new DomDocument; // instanțiem un obiect DOM
    //libxml_use_internal_errors(true);
    $dom->loadHTMLFile($url."welcome.php");
    //libxml_use_internal_errors(false);
    echo $dom->saveHTML();
/*
    $location=$dom->getElementById("display-area");
    $nodeP=$dom->createElement("p");
    $nodeP->nodeValue = "There are  " . $message . " visits to the site.";
    $location->appendChild($nodeP);

    echo $dom->saveHTML();
*/
?>