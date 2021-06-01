<?php

    include_once '../api/database/database.php';

    $database = new Database();
    $mysql = $database->getConnection();

    if(!($rez = $mysql->query("select count_nr from statistics where name = 'visits'"))) {
        die ('A aparut o eroare');
    }

    $inreg = $rez->fetch_assoc();
    $visits = $inreg['count_nr'];
    $visits += 1;

    if($mysql->query("update statistics set count_nr=$visits where name='visits'") === FALSE) {
        die ('A aparut o eroare');
    }

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
    else  
        $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   

    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];
    $pos=strpos($url,"html");
    $url=substr($url,0,$pos);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <link rel="stylesheet" href="./../html/styles/style-index.css">
    <title>First PAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<script src="./../html/javascrpt/loadOption.js"></script>
	<script src="./../html/javascrpt/submitRepresentation.js"></script>
    <script src="./../html/javascrpt/export.js"></script>
</head>

<body onload="optionFunction()">
    <header>
        <ul class="top-menu">

            <li>
                <a class="button-menu" href="./../html/index.php">Main page</a>
                <a class="hide" href="./../html/index.php">You are here.</a>
            </li>
            
            <li>
                <a class="button-menu" href="./../html/contact.php">Contact</a>
                <a class="hide" href="./../html/contact.php">A way of contacting the team.</a>
            </li>
            <li>
                <a class="button-menu" href="./../html/about.php">About</a>
                <a class="hide" href="./../html/about.php">Extra info about the site.</a>
            </li>
            <li>
                <a class="button-menu" href="./../html/admin.php">Admin</a>
                <a class="hide" href="./../html/admin.php">Admin module here</a>
            </li>
        </ul>
    </header>

    <main>


        <form id="main-form" class="form-area" >
			<p>Hold down 'Ctrl' to select multiple options.</p>
            <label for="BMI-category">BMI (Body Mass Index):</label>
            <select name="BMI_type" id="BMI_type" multiple>
              
            </select>
			
			 <label for="age-range">Age:</label>
            <select name="age" id="age" multiple>

            </select>
			
			 <label for="location">Location:</label>
            <select name="country" id="country" multiple>
               
				
            </select>
			
            
			
			<label for="gender">Sex:</label>
            <select name="gender" id="gender" multiple>
                
            </select>
			
			<label for="year">Year:</label>
            <select name="year" id="year" multiple>
                
            </select>
			
			<label for="view">View mode:</label>
            <select name="view" id="view">
                <option value="table">Table</option>
                <option value="line">Line</option>
                <option value="bar">Bar</option>
            </select>

            <button name="button" type="submit" onclick="submitResult(); return false;">Submit</button>


        </form>

        <div class="display-area" id="display-area">
            
        </div>

    </main>

    <footer id="footer">
        <form class="form-areaExport">

            <label for="export">Export as:</label>
            <select name="input1" id="export">
            </select>

            <button type="submit" onclick="download('<?php echo $url; ?>'); return false;">Submit</button>
        </form>

        <canvas id="canvas" width="900" height="900"></canvas>
        <div id="png"> </div>

		<p>Data provided by <a href="https://ec.europa.eu/eurostat/databrowser/view/sdg_02_10/default/table?lang=en"> Eurostat</a> and 
			<a href="https://www.who.int/data/gho/data/themes/theme-details/GHO/body-mass-index-(bmi)?introPage=intro_3.html">WHO</a>
		</p>
    </footer>


</body>

</html>