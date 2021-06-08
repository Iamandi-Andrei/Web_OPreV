<!DOCTYPE HTML>
<html>

<?php
    
        session_start([
            'cookie_lifetime' => 86400,
        ]);

        if(!isset($_SESSION['login']) && !$_SESSION['login']) {
            header("Location: login-required.php");
        }

        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
        $url = "https://";   
        else  
            $url = "http://";   
        // Append the host(domain name, ip) to the URL.   
        $url.= $_SERVER['HTTP_HOST'];   

        // Append the requested resource location to the URL   
        $url.= $_SERVER['REQUEST_URI'];
        $pos=strpos($url,"admin/welcome.php");
        $url=substr($url,0,$pos);
    ?>

<head>
    <link rel="stylesheet" href="./../html/styles/style-admin.css">
    <script src="<?php echo $url."html/javascrpt/statistics.js"?>"></script>
    <title>About PAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <header>
        <ul class="top-menu">
            <li>
                <a class="button-menu" href="<?php echo $url."html/index.php"?>">Main page</a>
                <a class="hide" href="<?php echo $url."html/index.php"?>">Area where the main functionality is.</a>
            </li>
           
            <li>
                <a class="button-menu" href="<?php echo $url."html/contact.php"?>">Contact</a>
                <a class="hide" href="<?php echo $url."html/contact.php"?>">A way of contacting the team.</a>
            </li>
            <li>
                <a class="button-menu" href="<?php echo $url."html/about.php"?>">About</a>
                <a class="hide" href="<?php echo $url."html/about.php"?>">Extra info about the site.</a>
            </li>
            <li>
                <a class="button-menu" href="<?php echo $url."html/admin.php"?>">Admin</a>
                <a class="hide" href="<?php echo $url."html/admin.php"?>">You are here.</a>
            </li>
        </ul>
    </header>

    <main>
        <div class="display-area" id="display-area">
            <button class="button-log" onclick="getVisits()">
                CHECK VISITS
            </button>
            <button class="button-log" onclick="getTable()">
                CHECK TABLE SEARCHS
            </button>
            <button class="button-log" onclick="getLine()">
                CHECK LINE SEARCHS
            </button>
            <button class="button-log" onclick="getBar()">
                CHECK BAR SEARCHS
            </button>
            <form method="post" action="./update-db.php">
                <button class="button-log" type="submit">
                    UPDATE DB
                </button>
            </form>
            <form method="post" action="./logout.php">
                <button class="button-log" type="submit">
                    LOGOUT
                </button>
            </form>
            <div class="results" id="results">
            </div>
        </div>
    </main>

    <footer>
        <p>Web_OPrev by Iamandi Andrei-Petrisor and Mirila Vasile Danut</p>
		<p>Data provided by <a href="https://ec.europa.eu/eurostat/databrowser/view/sdg_02_10/default/table?lang=en"> Eurostat</a> and 
			<a href="https://www.who.int/data/gho/data/themes/theme-details/GHO/body-mass-index-(bmi)?introPage=intro_3.html">WHO</a>
		</p>
    </footer>


</body>

</html>