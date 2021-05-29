<?php

include_once './../../api/database/database.php';
$database = new Database();
$db = $database->getConnection();

$results=array();
$sql = "select distinct(".$_GET['filter'].") from data order by ".$_GET['filter']." asc";



                if (!($rez = $db->query ($sql))) {
                    die ('A survenit o eroare la interogare');
                }
				

                while ($inreg = $rez->fetch_assoc()) {
					echo "<option value='".$inreg[$_GET['filter']]."'>".$inreg[$_GET['filter']]."</option>";
				   
                }



?>