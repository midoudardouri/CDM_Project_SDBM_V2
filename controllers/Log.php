<?php

class Log extends Controller{

    public function index(){
        
        session_start();

        // Initialisation des variables
        $mes = '';
        $type_mes = '';
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
                $mes = 'Accès bloqué. Veuillez réessayer plus tard.';
                $type_mes = 'danger';
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
                    $mes = "Erreur : Identifiants incorrects. Il vous reste $remaining_attempts tentative(s) avant que l'accès ne soit bloqué pendant 15 minutes.";
                    $type_mes = 'danger';
        
                    // Vérifier le nombre de tentatives
                    if ($_SESSION['attempts'] >= $attempt_limit) {
                        $mes = 'Vous avez dépassé le nombre maximum de tentatives. Veuillez réessayer dans 15 minutes.';
                        $type_mes = 'danger';
                    }
                }
            }
        }

        $this->render('index', compact('mes','type_mes','attempt_limit','lockout_time'));
    }
   
}