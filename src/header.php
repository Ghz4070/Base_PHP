<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title></title>
    <link rel="shortcut icon" type="Images/x-icon" href="css/favicon.ico"/>

    <!-- jQuery library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Boostrap library -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>

    <!-- Feuilles de style perso -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/CustomFileInputs/css/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="css/CustomFileInputs/css/demo.css"/>
    <link rel="stylesheet" type="text/css" href="css/CustomFileInputs/css/component.css"/>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #fdf1c8;">
    <a class="navbar-brand" href="index.php">
        <img src="css/android-icon-36x36.png" width="30" height="30" class="d-inline-block align-top" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    if (!empty($_SESSION['pseudo'])) {
        ?>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item px-lg-2">
                    <a class="nav-link text-uppercase font-weight-bold text-expanded" href="articlecreation.php">Creation
                        Article
                    </a>
                </li>
                <?php if ($_SESSION['pseudo'] == "Ilies") { ?>
                    <li class="nav-item px-lg-2">
                        <a class="nav-link text-uppercase font-weight-bold text-expanded" href="dashboardAdmin.php">Tableau de
                            Bord Admin
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item px-lg-2">
                        <a class="nav-link text-uppercase font-weight-bold text-expanded" href="dashboard.php">Tableau
                            de
                            Bord
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item px-lg-2">
                    <a class="nav-link text-uppercase font-weight-bold text-expanded"
                       href="?disconnect=1">Déconnexion</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item px-lg-2">
                    <a class="nav-link text-uppercase font-weight-bold text-expanded"><?php echo $_SESSION['pseudo']; ?>
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>
        <?php
    } else {
        ?>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item px-lg-2">
                    <a class="nav-link text-uppercase font-weight-bold text-expanded" href="connection.php">Connexion
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item px-lg-2">
                    <a class="nav-link text-uppercase font-weight-bold text-expanded"
                       href="registration.php">Inscription</a>
                </li>
            </ul>
        </div>
        <?php
    }
    ?>
</nav>
<br>
<br>
<br>











