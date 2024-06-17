<?php
// Démarrage de la session
session_start();

// Initialisation des variables
$message = '';
$type_message = '';
$attempt_limit = 5;
$lockout_time = 900; // 15 minutes en secondes

// Vérification des informations de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['uname'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['pswd'], ENT_QUOTES, 'UTF-8');

    // Initialiser les tentatives et le temps de blocage si non définis
    if (!isset($_SESSION['attempts'])) {
        $_SESSION['attempts'] = 0;
        $_SESSION['last_attempt_time'] = time();
    }

    // Vérifier le temps de blocage
    if (time() - $_SESSION['last_attempt_time'] < $lockout_time && $_SESSION['attempts'] >= $attempt_limit) {
        $message = 'Accès bloqué. Veuillez réessayer plus tard.';
        $type_message = 'danger';
    } else {
        // Réinitialiser les tentatives si le temps de blocage est écoulé
        if (time() - $_SESSION['last_attempt_time'] >= $lockout_time) {
            $_SESSION['attempts'] = 0;
        }

        if ($username === 'admin' && $password === 'admin') {
            // Identifiants corrects
            $_SESSION['loggedin'] = true;
            $_SESSION['attempts'] = 0; // Réinitialiser les tentatives après une connexion réussie
            header("Location:index.php"); // Rediriger vers une autre page
            exit(); // Assurer que le script s'arrête après la redirection
        } else {
            // Identifiants incorrects
            $_SESSION['attempts'] += 1;
            $_SESSION['last_attempt_time'] = time();
            $remaining_attempts = $attempt_limit - $_SESSION['attempts'];
            $message = "Erreur : Identifiants incorrects. Il vous reste $remaining_attempts tentative(s) avant que l'accès ne soit bloqué pendant 15 minutes.";
            $type_message = 'danger';

            // Vérifier le nombre de tentatives
            if ($_SESSION['attempts'] >= $attempt_limit) {
                $message = 'Vous avez dépassé le nombre maximum de tentatives. Veuillez réessayer dans 15 minutes.';
                $type_message = 'danger';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Formulaire de connexion</h2>
        <?php
            // Y a-t-il un message d'alerte à afficher ?
            if (!empty($message)) {
                echo "<div class='alert alert-$type_message alert-dismissible fade show' role='alert'>
                    " . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . "
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        ?>
      
        <form method="POST" action="" class="was-validated">
            <div class="mb-3 mt-3">
                <label for="uname" class="form-label">Nom d'utilisateur:</label>
                <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Mot de passe:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


