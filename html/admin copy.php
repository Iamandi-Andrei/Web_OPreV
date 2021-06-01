<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="http://localhost/Web_OPrev/html/styles/style-admin.css">
    <title>About PAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<?php
    session_start();

    if (isset($_SESSION["login"]) && $_SESSION["login"]) {
        header("Location: ./../admin/welcome.php");
    }

?>

<body>
    <header>
        <ul class="top-menu">
            <li>
                <a class="button-menu" href="./../html/index.php">Main page</a>
                <a class="hide" href="./../html/index.php">Area where the main functionality is.</a>
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
                <a class="hide" href="./../html/admin.php">You are here.</a>
            </li>
        </ul>
    </header>

    <main>
        <div class="display-area" id="display-area">

            <form action="./../admin/admin-page.php" method="post">


                <div class="container">
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <button class="button-log" type="submit">Login</button>
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