<?php
    session_start();

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
    else  
        $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   

    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];
    $pos=strpos($url,"admin/login-required.php");
    $url=substr($url,0,$pos);

    $dom = new DomDocument; // instanțiem un obiect DOM
    libxml_use_internal_errors(true);
    $dom->loadHTMLFile($url."html/admin.php");
    libxml_use_internal_errors(false);
    
    $location=$dom->getElementById("display-area");
    $nodeP=$dom->createElement("p");
    $nodeP->nodeValue='You need to login!';
    $location->appendChild($nodeP);

    echo $dom->saveHTML();
?>