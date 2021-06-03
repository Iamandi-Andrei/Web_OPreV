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
if(isset($_POST['country'])&&isset($_POST['age'])&&isset($_POST['year'])&&isset($_POST['gender'])&&isset($_POST['BMI_type'])){
	$statement=$db->prepare("delete from data where BMI_type= ? and year = ? and country = ? and age = ? and gender = ?");
	$statement->bind_param("sisss",$_POST['BMI_type'],$_POST['year'],$_POST['country'],$_POST['age'],$_POST['gender']);
	
	if(!$statement->execute()){
		die ('A survenit o eroare la interogare');
	}else {
		$output = "Row deleted!";
	}
}
else $output = "Missing fields";
$db->close();

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
$url = "https://";   
else  
	$url = "http://";   
// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   

// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];
$pos=strpos($url,"api/database/CRUD/delete.php");
$url=substr($url,0,$pos);
               
?>
<script>
	window.location = '<?php echo $url . "admin/update-db.php"; ?>';
	alert('<?php echo $output; ?>')
</script>