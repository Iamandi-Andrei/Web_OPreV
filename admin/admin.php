<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="http://localhost/Web_OPrev/html/styles/style-admin.css">
    <title>About PAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<?php
    session_start();
    $valueName = "";
    $valuePassword = "";
    if(isset($_SESSION["username"])) {
        $valueName = $_SESSION["username"];
    }
    if(isset($_SESSION["password"])) {
        $valuePassword = $_SESSION["password"];
    }

    if (isset($_SESSION["login"]) && $_SESSION["login"]) {
        header("Location: welcome.php");
    }

?>

<body>
    <header>
        <ul class="top-menu">
            <li>
                <a class="button-menu" href="index.php">Main page</a>
                <a class="hide" href="index.php">Area where the main functionality is.</a>
            </li>
           
            <li>
                <a class="button-menu" href="contact.php">Contact</a>
                <a class="hide" href="contact.php">A way of contacting the team.</a>
            </li>
            <li>
                <a class="button-menu" href="about.php">About</a>
                <a class="hide" href="about.php">Extra info about the site.</a>
            </li>
            <li>
                <a class="button-menu" href="admin.php">Admin</a>
                <a class="hide" href="admin.php">You are here.</a>
            </li>
        </ul>
    </header>

    <main>
        <div class="display-area" id="display-area">

            <form action="./admin-page.php" method="post">


                <div class="container">
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <button class="button-log" type="submit">Login</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>
            </form>
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