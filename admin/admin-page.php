<?php

    include_once '../api/database/database.php';

    session_start([
        'cookie_lifetime' => 86400,
    ]);

    $database = new Database();
    $mysql = $database->getConnection();

?>

<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="http://localhost/Web_OPrev/html/styles/style-admin.css">
    <title>About PAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

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
        <div class="display-area">
            <?php
                $login = FALSE;
                $error = FALSE;
                $username = $_POST["username"];
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

                if(isset($_POST["remember"]) && $_POST["remember"] == "on") {
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;
                    setcookie("username", $_POST["username"], time()+84600, "localhost/Web_OPrev/");
                    setcookie("password", $password, time()+84600, "localhost/Web_OPrev/");
                }

                $sql = "select * from accounts where username='$username'";

                if (!($rez = $mysql->query ($sql))) {
                    die ('A survenit o eroare la interogare');
                }

                if (!($inreg = $rez->fetch_assoc())) {
                    $error_message = 'Username incorrect!';
                    $error = TRUE;
                }
                else {
                    if (password_verify($_POST["password"], $inreg["password"])) {
                        $login = TRUE;
                    }
                    else {
                        $error_message = 'The password is incorrect.';
                        $error = TRUE;
                    }
                }

                if($login) {
                    $_SESSION["login"] = TRUE;
                    header("Location: welcome.php");
                }

                if($error) {
                    $_SESSION["error_message"] = $error_message;
                    header("Location: login-failed.php");
                }
                
            ?>
        </div>

    </main>

    <footer>
        <p>Web_OPrev by Iamandi Andrei-Petrisor and Mirila Vasile Danut</p>
		<p>Data provided by <a href="https://ec.europa.eu/eurostat/databrowser/view/sdg_02_10/default/table?lang=en"> Eurostat</a> and 
			<a href="https://www.who.int/data/gho/data/themes/theme-details/GHO/body-mass-index-(bmi)?introPage=intro_3.html">WHO</a>
		</p>
    </footer>

    <?php
        $mysql->close();
    ?>

</body>

</html>