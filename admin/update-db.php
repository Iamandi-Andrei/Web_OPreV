<?php

    session_start();
    if(!isset($_SESSION['login']) || !$_SESSION['login']) {
        header("Location: login-required.php");
    } 

?>
<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="http://localhost/Web_OPreV/html/styles/style-admin.css">
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
        <div class="display-area" id="display-area">
        <form method="post" action="http://localhost/Web_OPreV/api/database/CRUD/delete.php">
                <label for="country">Select the country:</label>
                <input type="text" id="country" name="country">

                <label for="age">Select the age:</label>
                <input type="text" id="age" name="age">

                <label for="year">Select the year:</label>
                <input type="text" id="year" name="year">

                <label for="gender">Select the gender:</label>
                <input type="text" id="gender" name="gender">

                <label for="BMI_type">Select the gender:</label>
                <input type="text" id="BMI_type" name="BMI_type">

                <button class="button-log" type="submit">
                    DELETE
                </button>
            </form>

            <form method="post" action="http://localhost/Web_OPreV/api/database/CRUD/update-create.php">
                <label for="country">Select the country that you want to update:</label>
                <input type="text" id="country" name="country">

                <label for="age">Select the year:</label>
                <input type="text" id="age" name="age">

                <label for="year">Select the year:</label>
                <input type="text" id="year" name="year">

                <label for="gender">Select the year:</label>
                <input type="text" id="gender" name="gender">

                <label for="BMI_value">Select the BMI:</label>
                <input type="text" id="BMI_value" name="BMI_value">

                <label for="BMI_type">Select the BMI:</label>
                <input type="text" id="BMI_type" name="BMI_type">

                <button class="button-log" type="submit">
                    INSERT / UPDATE
                </button>
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