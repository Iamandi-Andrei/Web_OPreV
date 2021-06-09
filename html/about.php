<!DOCTYPE HTML>
<html lang="ro">

<head>
    <link rel="stylesheet" href="./../html/styles/style-about.css">
    <title>About PAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
                <a class="hide" href="./../html/contact.php">A way of contacting the team.</a>
            </li>
            <li>
                <a class="button-menu" href="./../html/about.php">About</a>
                <a class="hide" href="./../html/about.php">You are here.</a>
            </li>
            <li>
                <a class="button-menu" href="./../html/admin.php">Admin</a>
                <a class="hide" href="./../html/admin.php">Admin module here</a>
            </li>
        </ul>
    </header>

    <main>






        <div class="display-area">

            <p>Project start info</p>
            <p>


                OPreV (Obesity Prevalence Visualizer) [M] Sa se creeze o aplicatie Web capabila a vizualiza si compara informatii referitoare la obezitatea populatiei &#45; a se folosi datele publice furnizate de Eurostat si WHO &#45; pe baza unui API REST/GraphQL propriu. Statisticile,
                comparatiile pe baza mai multor criterii, plus vizualizarile generate &#45; minim 3 maniere &#45; vor putea fi exportate in formatele CSV, PNG si SVG. Resurse suplimentare privind vizualizarea datelor: https://profs.info.uaic.ro/~busaco/teach/courses/cliw/web-film.html#week4.


            </p>
			
			
			<p>Api info</p>
			<p>Resurse folosite pentru a genera vizualizarile. Raspunsurile vor fi cod XML care poate fi introdus in orice pagina web</p>
			<p> machine_location/api/views/<b>ABC</b>.php?<b>v1</b>=<b>v2,v3</b>...&amp;<b>v5</b>=<b>v6,v7</b>... </p>
			<p>Unde :</p>
			<ul>
			<li><b>ABC</b> - tipul view-ului, valori posibile: <b>table,line,bar</b></li>
			<li>	<b>v1,v5</b> categoria filtrului, valori posibile: <b>country,age,gender,year,BMI_type</b></li>
			<li> <b>v2,v3,v6,v7</b> valoarea efectiva a filtrului, un filtru poate contine una sau mai multe valori separate prin virgula</li>
			</ul>
			<p>Resursa poate fi apelata cu 0 pana la max_filters filtre.</p>
			
			<p>Pentru a vedea valorile posibile pentru un anumit filtru <b>X</b>, se poate apela <i> "machine_location/html/javascrpt/getOptions.php?filter=<b>X</b>" </i></p>

			<p><b>User guide: <a href="./../raport/Ghid-Utilizare.html">guide</a></b></p>
			<p><b>Progress raport: <a href="./../raport/Progres.html">progres</a></b></p>
			<p><b>Initial raport: <a href="./../raport/Scholarly HTML.html">raport</a></b></p>

            <p>The team behind the project:</p>
            <ul>
                <li>Mirila Vasile Danut 2A2</li>
                <li>Iamandi Andrei-Petrisor 2A2</li>
            </ul>
            <p></p>
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