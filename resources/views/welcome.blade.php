<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/styleIndex.css" />
    <link rel="shortcut icon" href="images/icon/fst-1024x383.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fstt</title>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="images/logoFstt.png" alt="Logo" />
        </div>
        <div class="menu-left">
            <a href="#bienvenue">Acceuil</a>
            <a href="#formations">Formations</a>
            <a href="{{route('departements')}}">Departements</a>
            <div class="dropdown">

                <a>Espace Etudiant</a>
                <div class="dropdown-content">
                    <a href="images/icon/Tronc Commun LST_S4.pdf" target="_blank">Deust</a>
                    <a href="images/icon/Tronc Commun LST_S6.pdf" target="_blank">Licence</a>
                    <a href="images/icon/Cycle Master S2.pdf" target="_blank">Master</a>
                    <a href="images/icon/Cycle  Ingénieur _ S4.pdf" target="_blank">Cycle d'ingenieur </a>
                </div>
            </div>

        </div>

        <div class="menu-right">
            <a href="{{ route('login') }}" class="cta-button"> Se Connecter </a>

        </div>
    </nav>





    <div class="slideshow-container" style="margin-top: 100px">
        <div class="slide fade">
            <img style="width: 100%"  src="../images/icon/securityconclave-2.png" alt="Announcement 1">
        </div>
        <div class="slide fade">
            <img  style="width: 100%" src="../images/icon/Planning-Rat-Automne.png" alt="Announcement 2">
        </div>
        <div class="slide fade">
            <img style="width: 100%"  src="../images/icon/Planning-Rat-Automne.png" alt="Announcement 3">
        </div>
        <div class="slide fade">
            <img  style="width: 100%" src="../images/icon/Talib_inwi.png" alt="Announcement 4">
        </div>
        <!-- Add more slides as needed -->

        <button class="prev" onclick="changeSlide(-1)">❮</button>
        <button class="next" onclick="changeSlide(1)">❯</button>
    </div>


    <div id="s1and2">
        <div id="announcement-section">
            <h2 align="center">ACTUALITÉS</h2>
            <ul id="announcement-list">
               @foreach($annonces as $annoce)
               
               <li onclick="show(this)" style="max-height: 80px">

                       <h3> {{ $annoce->titre }}</h3>
                       <h6> {{ $annoce->user->prenom  }} {{$annoce->user->name}}   <br>   {{ $annoce->date_creation  }}   </h6>
                        <p style="display: none">{{ $annoce->description }}</p>     
                </li>
               @endforeach
            </ul>
        </div>

        <div id="details-section">
            
            <h2 id="details-heading">PRESENTATION DE LA FST DE TANGER & DIAGNOSIQUE</h2>

            <div id="details-content">
                <p><img src="/images/icon/fst.jpg" alt=""></p>
            </div>
        
        </div>

    </div>



    <div class="head-container" id="bienvenue">
        <div class="quote">
            <p>
                La Faculté des sciences et techniques de Tanger, a été créée en 1995.
                Faisant partie de l'Université Abdelmalek Essaadi à Tanger, elle
                regroupe actuellement une trentaine de programmes d'études en sciences
                et ingénierie.
            </p>
            <h5>
                Bienvenue sur notre site dédié à l'univers scientifique ! Nous croyons
                en l'importance de l'éducation, un processus qui facilite
                l'apprentissage et l'acquisition de connaissances, de compétences, de
                valeurs, de croyances et d'habitudes. À travers diverses méthodes
                éducatives telles que l'enseignement, la formation, le récit, la
                discussion et la recherche dirigée, nous vous invitons à explorer avec
                nous les merveilles du monde scientifique. Préparez-vous à plonger
                dans un voyage captivant où la découverte et la compréhension sont au
                cœur de notre exploration de l'univers scientifique passionnant !
            </h5>
            <div class="play">
                <img src="images/icon/play.png" alt="play" /><span><a
                        href="https://www.hec.ca/etudiants/soutien-ressources/soutien-aux-etudes/methodes-travail-efficaces.pdf"
                        target="_blank">Découvrir les secrets de l'étude efficace</a></span>
            </div>
        </div>
        <div class="svg-image">
            <img src="images/icon/students_09.jpg" alt="svg" />
        </div>
    </div>
    <!-- Formations initiales -->
    <div class="service-swipe" id="formations">
        <div class="diffSection" id="services_section">
            <center>
                <p
                    style="
              font-size: 50px;
              padding: 100px;
              padding-bottom: 40px;
              color: #fff;
            ">
                    Formation initiale
                </p>
            </center>
        </div>
        <a href="/FilieresFront/deust.html" target="_blank">
            <div class="s-card">
                <img src="images/icon/assortiment-jour-education-table-removebg-preview.png" style="width: 60%" />
                <p>Deust</p>
            </div>
        </a>
        <a href="/FilieresFront/index.html" target="_blank">
            <div class="s-card">
                <img src="images/icon/papers.jpg" style="width: 40%" />
                <p>Licence en Sciences et Techniques</p>
            </div>
        </a>
        <a href="/FilieresFront/master.html" target="_blank">
            <div class="s-card">
                <img src="images/icon/p3.png" style="width: 40%" />
                <p>Master en Sciences et Techniques</p>
            </div>
        </a>
        <a href="/FilieresFront/cycle.html" target="_blank">
            <div class="s-card">
                <img src="images/icon/2288773-removebg-preview.png" style="width: 60%" />
                <p>Ingénieur d'Etat</p>
            </div>
        </a>
    </div>


    <!-- FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="left-col" style="margin-left: -80px ">
                <div style="display:flex; justify-content: stretch;">
                    <div>
                        <img src="images/icon/fst-1024x383.png"
                            style="width:60px; margin-left: 10%;margin-top:30%; float:left">
                    </div>
                    <div style="margin-left:9%; float:right;color: #025b9b ; font-size: large;">
                        <p><span> Université Abdelmalek Essaâdi</span><br><span> Faculté des Sciences et Techniques de
                                Tanger </span> </p>
                    </div>
                </div>
                <p style="font-size:medium;"><img src="images/icon/location.png"> Ancienne Route de l'Aéroport, Km 10,
                    Ziaten. <br> BP : 416. Tanger-Maroc·<br><img src="images/icon/phone.png">
                    + 212 (0) 5 39 39 39 54 / 55<br><img src="images/icon/mail.png"> administration.fstt@uae.ac.ma
                </p>

            </div>
            <div class="right-col">
                <h1 style="color: #fff">Newsletter</h1>
                <div class="border"></div><br>
                <form class="newsletter-form">
                    <input class="txtb" type="email"
                        placeholder="Entrez votre e-mail pour recevoir nos actualités">
                    <input class="btn" type="submit" value="S'abonner">
                </form>
                <div class="social-media">
                    <a href="https://web.facebook.com/fstt.ac.ma" target="_blank"><img
                            src="images/icon/logofacebook.png" style="width :52px "></a>
                    <a href="https://www.linkedin.com/school/fsttanger/" target="_blank"><img
                            src="images/icon/logolinkedinb.png" style="width :55px"></a>
                    <a href="https://www.instagram.com/fsttanger/" target="_blank"><img
                            src="images/icon/logoinstab.png" style="width: 53px"></a>
                </div>

            </div>
        </div>
    </footer>

    <script src="js/scriptIndex.js"></script>

    <script>

    </script>

</body>

</html>
