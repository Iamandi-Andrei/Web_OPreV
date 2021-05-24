<?php
    include_once '../api/database/database.php';

    session_start();

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

    $dom = new DomDocument; // instanțiem un obiect DOM
    libxml_use_internal_errors(true);
    $dom->loadHTMLFile("http://localhost/Web_OPreV/admin/welcome.php");
    libxml_use_internal_errors(false);

    $location=$dom->getElementById("display-area");
    $nodeP=$dom->createElement("p");
    $nodeP->nodeValue = "There are  " . $message . " visits to the site.";
    $location->appendChild($nodeP);

    echo $dom->saveHTML();

?>