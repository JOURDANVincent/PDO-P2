<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <!-- Responsive meta tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CDN MDB / BOOTSTRAP / SLICK -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" rel="stylesheet">
    
    <!-- Police général -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <!-- Mes feuiiles de style -->
    <link rel="stylesheet" href="/assets/style.css">

    <!-- Titre de la page actuelle -->
    <title><?= (!empty($ctrl)) ? $title_page[$ctrl] : 'Accueil' ?></title>


</head>

<body class="h-100">

    <header>
        <div class="container-fluid">
            <div class="row justify-content-center">

                <nav id="navBar" class="navbar navbar-expand-md navbar-dark justify-content-md-between">

                    <a class="navbar-brand col" href="index.php">
                        <img id="hospitalLogo" src="/assets/img/logoHospital.png" alt="icon retour accueil">
                    </a>

                    <!-- toggler BTN -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <?php if (!empty($ctrl) && $ctrl === 2) : ?>
                    <form role="search" action="" method="GET" class="form input-group col-3">
                        <input id="search" type="search" name="search" class="form-control bdL5" placeholder="recherche patient..">
                        <input type="hidden" name="ctrl" value="2">
                        <button id="searchBtn" type="submit" class="input-group-text txt1">
                            <img src="/assets/icon/loupe.svg" alt="icon search sur navbar">
                        </button>
                    </form>
                    <?php endif ?>

                    <!-- NavItem -->
                    <div id="navbarContent" class="col-8 collapse navbar-collapse justify-content-end">
                        
                        <ul class="navbar-nav">

                            <li class="nav-item"><a class="nav-link mx-2" href="index.php?ctrl=1">
                                Ajouter patient
                            </a></li>
                            <li class="nav-item"><a class="nav-link mx-2" href="index.php?ctrl=2">
                                <img src="/assets/icon/" alt=""> Liste des patients</a></li>
                            <li class="nav-item"><a class="nav-link mx-2" href="index.php?ctrl=5">
                                <img src="/assets/icon" alt=""> Ajouter un rendez-vous</a></li>
                            <li class="nav-item"><a class="nav-link mx-2" href="index.php?ctrl=6">
                                <img src="/assets/icon" alt=""> Liste des rendez-vous</a></li>
                            <li class="nav-item"><a class="nav-link mx-2" href="index.php?ctrl=9">
                                <img src="/assets/icon" alt=""> Ajouter patient et rendez-vous</a></li>

                        </ul>
                    </div>
                    
                </nav>

            </div>
        </div>
    </header> 


    <!-- Start Main Content -->
    <div class="container-fluid h-100">

        

            
