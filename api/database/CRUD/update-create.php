<?php
include_once '../database.php';

session_start([
	'cookie_lifetime' => 86400,
]);
if(!isset($_SESSION['login']) && !$_SESSION['login']) {
	header("Location: login-required.php");
}

$database = new Database();
$db = $database->getConnection();
  
$results=array();
if(isset($_POST['country'])&&isset($_POST['age'])&&isset($_POST['year'])&&isset($_POST['gender'])&&isset($_POST['BMI_type'])&&isset($_POST['BMI_value'])){
	$statement=$db->prepare("select * from data where BMI_type= ? and year = ? and country = ? and age = ? and gender = ?");
	$statement->bind_param("sisss",$_POST['BMI_type'],$_POST['year'],$_POST['country'],$_POST['age'],$_POST['gender']);
	
}
else $output = "Missing fields";

//echo $sql;
$statement->execute();



                if (!($rez = $statement->get_result())) {
                    die ('A survenit o eroare la interogare');
                }
				

                if ($inreg = $rez->fetch_assoc()) {
					array_push($results,$inreg);
					echo "Data already existent. Updating values";
					
					$statement=$db->prepare("delete from data where BMI_type= ? and year = ? and country = ? and age = ? and gender = ?");
					$statement->bind_param("sisss",$_POST['BMI_type'],$_POST['year'],$_POST['country'],$_POST['age'],$_POST['gender']);
					$statement->execute();
					
					$statement=$db->prepare("insert into data (BMI_type, year ,country , age , gender,BMI_value) values(?,?,?,?,?,?)");
					$statement->bind_param("sisssd",$_POST['BMI_type'],$_POST['year'],$_POST['country'],$_POST['age'],$_POST['gender'],$_POST['BMI_value']);
					$statement->execute();
					
					
                }
				else{
					$output = "Row inserted";
					$statement=$db->prepare("insert into data (BMI_type, year ,country , age , gender,BMI_value) values(?,?,?,?,?,?)");
					$statement->bind_param("sisssd",$_POST['BMI_type'],$_POST['year'],$_POST['country'],$_POST['age'],$_POST['gender'],$_POST['BMI_value']);
					$statement->execute();
					
				}

$db->close();

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
$url = "https://";   
else  
	$url = "http://";   
// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   

// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];
$pos=strpos($url,"api/database/CRUD/update-create.php");
$url=substr($url,0,$pos);



?>

<script>
	window.location = '<?php echo $url . "admin/update-db.php"; ?>';
	alert('<?php echo $output; ?>')
</script>