<?php
include_once '../api/database/database.php';


$database = new Database();
$mysql = $database->getConnection();

$sql = "select * from statistics where name='visits'";

if (!($rez = $mysql->query ($sql))) {
    die ('A survenit o eroare la interogare');
}

if (!($inreg = $rez->fetch_assoc())) {
    $visits = 'Error!!!';
}
else {
    $visits = $inreg["count_nr"];
}

$sql = "select * from statistics where name='table'";

if (!($rez = $mysql->query ($sql))) {
    die ('A survenit o eroare la interogare');
}

if (!($inreg = $rez->fetch_assoc())) {
    $table = 'Error!!!';
}
else {
    $table = $inreg["count_nr"];
}

$sql = "select * from statistics where name='line'";

if (!($rez = $mysql->query ($sql))) {
    die ('A survenit o eroare la interogare');
}

if (!($inreg = $rez->fetch_assoc())) {
    $line = 'Error!!!';
}
else {
    $line = $inreg["count_nr"];
}

$sql = "select * from statistics where name='bar'";

if (!($rez = $mysql->query ($sql))) {
    die ('A survenit o eroare la interogare');
}

if (!($inreg = $rez->fetch_assoc())) {
    $bar = 'Error!!!';
}
else {
    $bar = $inreg["count_nr"];
}


switch($_GET['visit_type']){
    
    case "visits":
        echo $visits;
        break;
    
    case "table";
        echo $table;
        break;
    
    case "line";
        echo $line;
        break;
    
    case "bar";
        echo $bar;
        break;
    
}


?>