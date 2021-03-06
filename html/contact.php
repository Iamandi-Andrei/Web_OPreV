<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./../html/styles/style-contact.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact PAGE</title>
</head>

<body>
    <header>
        <ul class="top-menu">

            <li>
                <a class="button-menu" href="./../html/index.php">Main page</a>
                <a class="hide" href="./../html/index.php">Area where the main functionality is.</a>
            </li>
            
            <li>
                <a class="button-menu" href="./../html/contact.php">Contact</a>
                <a class="hide" href="./../html/contact.php">You are here.</a>
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

        <div class="display-area">
            <div class="contact-formular">
                <p>Send message to Iamandi Andrei-Petrisor</p>
                <form action="mailto:andrei.iamandi.vel@gmail.com" name="ContactFormAndrei">
                    <p>Your Name:</p>
                    <input type="text" size="20" name="ContactNameAndrei" placeholder="Your full name...">
                    <p>Your message:</p>
                    <textarea name="ContactMessageAndrei" placeholder="The message..."></textarea>
                    <button type="submit">Send Message</button>
                </form>
            </div>

            <div class="contact-formular">
                <p>Send message to Mirila Vasile Danut</p>
                <form action="mailto:danutm82@gmail.com" name="ContactFormDanut">
                    <p>Your Name:</p>
                    <input type="text" size="20" name="ContactNameDanut" placeholder="Your full name...">
                    <p>Your message:</p>
                    <textarea name="ContactMessageDanut" placeholder="The message..."></textarea>
                    <button type="submit">Send Message</button>
                </form>
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