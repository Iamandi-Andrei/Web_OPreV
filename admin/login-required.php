<?php

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

?>

<script>
	window.location = '<?php echo $url. "html/admin.php"; ?>';
	alert('<?php echo "You need to login!"; ?>')
</script>
