<?php
    session_start();
    $dom = new DomDocument; // instanțiem un obiect DOM
    libxml_use_internal_errors(true);
    $dom->loadHTMLFile("http://localhost/Web_OPreV/admin/admin.php");
    libxml_use_internal_errors(false);
    
    $location=$dom->getElementById("display-area");
    $nodeP=$dom->createElement("p");
    $nodeP->nodeValue=$_SESSION["error_message"];
    $location->appendChild($nodeP);

    echo $dom->saveHTML();
?>