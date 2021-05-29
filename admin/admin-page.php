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
    <link rel="stylesheet" href="./../html/styles/style-admin.css">
    <title>About PAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <header>
        <ul class="top-menu">
            <li>
                <a class="button-menu" href="./../html/index.html">Main page</a>
                <a class="hide" href="./../html/index.html">Area where the main functionality is.</a>
            </li>
           
            <li>
                <a class="button-menu" href="./../html/contact.html">Contact</a>
                <a class="hide" href="./../html/contact.html">A way of contacting the team.</a>
            </li>
            <li>
                <a class="button-menu" href="./../html/about.html">About</a>
                <a class="hide" href="./../html/about.html">Extra info about the site.</a>
            </li>
            <li>
                <a class="button-menu" href="./../html/admin.html">Admin</a>
                <a class="hide" href="./../html/admin.html">You are here.</a>
            </li>
        </ul>
    </header>

    <main>
        <div class="display-area">
            <?php
                $username = $_POST["username"];
                $login = FALSE;
                $error = FALSE;

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
                    header("Location: ./../admin/welcome.php");
                }

                if($error) {
                    $_SESSION["error_message"] = $error_message;
                    header("Location: ./../admin/login-failed.php");
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