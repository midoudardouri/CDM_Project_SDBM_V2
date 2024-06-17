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
    <link rel="stylesheet" href="<?= PATH ?>/views/Css/Article.css">
</head>

<body>

    <div class="container-fluid">
        <header>
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <!-- Brand -->
                <a class="navbar-brand" href="<?= PATH ?>/">Accueil</a>

                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= PATH ?>/continents">Gestion des Continents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= PATH ?>/lespays">Gestion des Pays</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= PATH ?>/marques">Gestion des Marques</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= PATH ?>/tickets">Gestion des Tickets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= PATH ?>/couleurs">Gestion des Couleurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= PATH ?>/fabricants">Gestion des Fabricants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= PATH ?>/typebieres">Gestion des type bieres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= PATH ?>/articles">Gestion des Articles</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <header>
                <?php
            // Y a t il un message d'alert à afficher
            if (isset($message)) {
                if (!isset($type_message)) {
                    $type_message ="info";
                }
                echo "<div class='alert alert-$type_message alert-dismissible'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    $message
                </div>";
            }
                 ?>
                <?= $content ?>

                <footer>
                    <h2>Mon super footer</h2>
                </footer>
                 <!-- Bootstrap JS -->
                  <!-- Include jQuery -->
                 
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                 <!-- JS Pour le Recherche -->
                 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
               <script>
                <?php
            echo @$scriptJS;
              ?>
               </script>
    </div>

</body>

</html>