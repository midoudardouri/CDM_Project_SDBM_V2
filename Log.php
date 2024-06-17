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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Connexion</title>
    <style>
        body {
            background-color: #000;
            color: #ffa500;
            font-family: 'Courier New', Courier, monospace;
            animation: backgroundAnim 10s infinite alternate;
        }

        @keyframes backgroundAnim {
            0% { background-color: #000; }
            50% { background-color: #333; }
            100% { background-color: #000; }
        }

        .form-container {
            background-color: #111;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 165, 0, 0.5);
            animation: boxAnim 5s infinite alternate;
        }

        @keyframes boxAnim {
            0% { box-shadow: 0 0 10px rgba(255, 165, 0, 0.5); }
            50% { box-shadow: 0 0 20px rgba(255, 165, 0, 0.8); }
            100% { box-shadow: 0 0 10px rgba(255, 165, 0, 0.5); }
        }

        .form-control {
            background-color: #333;
            border: 1px solid #ffa500;
            color: #ffa500;
        }

        .form-control:focus {
            background-color: #333;
            color: #ffa500;
            border-color: #ffa500;
            box-shadow: 0 0 5px rgba(255, 165, 0, 0.5);
        }

        .btn-primary {
            background-color: #ffa500;
            border: 1px solid #ffa500;
            color: #000;
            animation: btnAnim 3s infinite alternate;
        }

        @keyframes btnAnim {
            0% { background-color: #ffa500; }
            50% { background-color: #ffcc00; }
            100% { background-color: #ffa500; }
        }

        .btn-secondary {
            background-color: #444;
            border: 1px solid #ffa500;
            color: #ffa500;
        }

        .btn-secondary:hover {
            background-color: #555;
            border-color: #ffcc00;
        }

        .password-toggle {
            cursor: pointer;
            color: #ffa500;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="form-container">
                    <h1 class="text-center mb-4"><strong>Page de Connexion</strong></h1>
                    <p class="text-center mb-4">Nom d'utilisateur et mot de passe par défaut : <strong>admin</strong></p>
                    <?php
                        if (!empty($message)) {
                            echo "<div class='alert alert-$type_message alert-dismissible fade show' role='alert'>
                                " . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . "
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        }
                    ?>
                    <form method="POST" action="" class="was-validated">
                        <div class="mb-3">
                            <label for="uname" class="form-label">Nom d'utilisateur:</label>
                            <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Mot de passe:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
                                <span class="input-group-text password-toggle" onclick="togglePassword()">
                                    <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Connexion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('pwd');
            const toggleIcon = document.getElementById('toggleIcon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.js"></script>
</body>
</html>