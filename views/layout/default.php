<!DOCTYPE html>
<html lang="fr">

<head>
    <title><?php echo @$Titre; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= PATH ?>/views/Css/continents.css">
    <link rel="stylesheet" href="<?= PATH ?>/views/Css/couleur.css">
    <link rel="stylesheet" href="<?= PATH ?>/views/Css/lespays.css">
    <link rel="stylesheet" href="<?= PATH ?>/views/Css/marques.css">
    <link rel="stylesheet" href="<?= PATH ?>/views/Css/ticket.css">
    <link rel="stylesheet" href="<?= PATH ?>/views/Css/Typebieres.css">
    <link rel="stylesheet" href="<?= PATH ?>/views/Css/Fabricant.css">
    <link rel="stylesheet" href="<?= PATH ?>/views/Css/footer.css">
    <link rel="stylesheet" href="<?= PATH ?>/views/Css/navbar.css">    
    <link rel="stylesheet" href="<?= PATH ?>/views/Css/main.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?= PATH ?>/views/Css/navbar.css"> <!-- Add this line for your custom CSS -->
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?= PATH ?>/views/img/a.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
                </a>
                <a class="navbar-brand" href="<?= PATH ?>/">Accueil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= PATH ?>/Formulaire.php">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= PATH ?>/log.php">Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="content">
        <!-- Content goes here -->
        <?= $content ?>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php echo @$scriptJS; ?>
    </script>
</body>

<footer class="footer">
    <ul class="social-icon">
        <li class="social-icon__item"><a class="social-icon__link" href="https://www.facebook.com/profile.php?id=61558528928982"><ion-icon name="logo-facebook"></ion-icon></a></li>
        <li class="social-icon__item"><a class="social-icon__link" href="https://www.linkedin.com/in/dev-med/"><ion-icon name="logo-linkedin"></ion-icon></a></li>
        <li class="social-icon__item"><a class="social-icon__link" href="https://www.instagram.com/bombastic_anime/"><ion-icon name="logo-instagram"></ion-icon></a></li>
    </ul>
    <p>&copy;2024 Dardouri Mohamed - Cedric langlais | All Rights Reserved</p>
</footer>

</html>