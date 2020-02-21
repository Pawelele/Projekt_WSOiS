<!DOCTYPE html>
<html lang="pl" dir="ltr">

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontakt</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/layout.css" type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="style1.css" type="text/css">
</head>
<?php
    session_start();
    $conn = mysqli_connect("localhost", "projekt_user", "Projekt_132!", "projekt_db");
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $_SESSION["session_login"]=$login;
    $_SESSION["session_haslo"]=$haslo;
    
    $logowanie = "false";
    
    
    $q = "SELECT login, haslo FROM pracownicy";
    $result = mysqli_query($conn, $q) or die("Problemy z odczytem danych!");
    while($row = mysqli_fetch_assoc($result))
    {
        if($_SESSION["session_login"] == $row['login'] &&  $_SESSION["session_haslo"]== $row['haslo'])
        {
            $logowanie= "true";
        }
        
        
    }
    
    
    if($logowanie=="true")
    {
?>

<body>
    <div class="wrapper row1">
        <header id="header" class="clear">
            <div id="hgroup">
                <h1><a href="index.html">Allsafe</a></h1>
                <h2>Zabezpieczenie Twojej firmy</h2>
            </div>
            <div class="nawigacja_resp">
            <nav>
                <ul>
                    <li><a href="index.html">Strona głowna</a></li>
                    <li><a href="pracownicy.php">Lista Pracownikow</a></li>
                    <li class="last"><a href="zadania.php">Zadania na dziś</a></li>
                </ul>
            </nav>
            </div>
        </header>
    </div>
    <!-- Całość -->

    <div class="all">
        <div class="sekcja1_all">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sekcja1_srodek">
                            <!--Pierwsza animacja-->
                            <center>
                                <h3 class="ml11">
                                    <span class="text-wrapper">
                                        <span class="line line1"></span>
                                        <span class="letters">Witamy w Panelu Pracownika</span>
                                    </span>
                                </h3>
                            </center>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

                            <script type="text/javascript">
                                // Wrap every letter in a span
                                var textWrapper = document.querySelector('.ml11 .letters');
                                textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>");

                                anime.timeline({
                                        loop: true
                                    })
                                    .add({
                                        targets: '.ml11 .line',
                                        scaleY: [0, 1],
                                        opacity: [0.5, 1],
                                        easing: "easeOutExpo",
                                        duration: 700
                                    })
                                    .add({
                                        targets: '.ml11 .line',
                                        translateX: [0, document.querySelector('.ml11 .letters').getBoundingClientRect().width + 10],
                                        easing: "easeOutExpo",
                                        duration: 700,
                                        delay: 100
                                    }).add({
                                        targets: '.ml11 .letter',
                                        opacity: [0, 1],
                                        easing: "easeOutExpo",
                                        duration: 600,
                                        offset: '-=775',
                                        delay: (el, i) => 34 * (i + 1)
                                    }).add({
                                        targets: '.ml11',
                                        opacity: 0,
                                        duration: 1000,
                                        easing: "easeOutExpo",
                                        delay: 1000000000000
                                    });

                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Stopka -->
    <div class="wrapper row3">
        <div id="footer" class="clear">
            <!-- Zawartość stopki -->
            <section class="one_quarter">
                <h2 class="title">MENU</h2><br>
                <nav>
                    <ul>
                        <li><a href="index.html">Strona głowna</a></li>
                        <li><a href="onas.html">O Nas</a></li>
                        <li><a href="kontakt.html">Kontakt</a></li>
                        <li class="last"><a href="panel.php">Panel Pracownika</a></li>
                    </ul>
                </nav>
            </section>

        </div>
    </div>
    <!-- Stopka dolna -->
    <div class="wrapper row4">
        <footer id="copyright" class="clear">
            <p class="fl_left">Copyright &copy; 2020 - All Rights Reserved - <a href="#">Paweł Uchański & Zuzanna Piekarczyk</a></p>
        </footer>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

<?php
    }
    else
    {
        echo "<script type=\"text/javascript\">
	   window.setTimeout(\"window.location.replace('bledne_logowanie.php');\",1);
		</script>";
    }
?>

</html>
