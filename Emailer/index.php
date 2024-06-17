<?php


//Load Composer's autoloader
require 'vendor/autoload.php';
require '/xampp/htdocs/80 NPM et COMPOSER par moi/Composer/vendor/autoload.php';
$msg = "";
$src = "";

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;



$msg = "";
$src = "";

session_start(); // Commencez la session pour utiliser les variables de session

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['captcha'])) {
    $A_trouver = $_SESSION['phrase'];

    // On compare le texte saisi avec celui enregistré en SESSION
    if ($A_trouver === $_POST['captcha']) {
        // Captcha est correct, on procède à l'envoi de l'email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 0; // Mettre 2 en phase de DEBUG
        $mail->Host = 'smtp.hostinger.fr';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'meddardouri@club-otaku.com';
        $mail->Password = 'Dn25626959*';
        $mail->setFrom('meddardouri@club-otaku.com', 'Mohamed hostinger stagaire');
        $mail->addAddress('dardourisenpay@gmail.com', 'Dardouri mohamed');

        // Ajout de l'adresse de REPONSE
        if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
            $mail->Subject = 'Formulaire de contact PHPMailer';
            $mail->isHTML(false);
            $mail->Body = <<<EOT
E-mail: {$_POST['email']}
Nom: {$_POST['name']}
Message: {$_POST['message']}
EOT;
            if (!$mail->send()) {
                $msg = 'Désolé, quelque chose a mal tourné. Veuillez réessayer plus tard.';
                $alert = "danger";
                $info = "Attention";
                $builder = new CaptchaBuilder;
                $builder->build();
                $_SESSION['phrase'] = $builder->getPhrase(); // On sauvegarde le texte à trouver en SESSION
                $src = $builder->inline();
            } else {
                $msg = 'Message envoyé ! Merci de nous avoir contactés.';
                $alert = "success";
                $info = "Bravo";
                $builder = new CaptchaBuilder;
                $builder->build();
                $_SESSION['phrase'] = $builder->getPhrase(); // On sauvegarde le texte à trouver en SESSION
                $src = $builder->inline();
            }
        } else {
            $msg = 'Erreur dans le champ email. Veuillez vérifier votre email et réessayer.';
            $alert = "danger";
            $info = "Attention";
            $builder = new CaptchaBuilder;
            $builder->build();
            $_SESSION['phrase'] = $builder->getPhrase(); // On sauvegarde le texte à trouver en SESSION
            $src = $builder->inline();
        }
    } else {
        // Le texte du CAPTCHA est incorrect, on regénère une nouvelle image
        $msg = "Captcha incorrect, veuillez réessayer.";
        $alert = "danger";
        $info = "Attention";

        // Will build phrases of 4 characters, only digits
        $phraseBuilder = new PhraseBuilder(4, '0123456789');
        $builder = new CaptchaBuilder(null, $phraseBuilder);
        $builder->build();
        $_SESSION['phrase'] = $builder->getPhrase(); // On sauvegarde le texte à trouver en SESSION
        $src = $builder->inline();
    }
} else {
    // On affiche le formulaire avec un nouveau captcha
    $builder = new CaptchaBuilder;
    $builder->build();
    $_SESSION['phrase'] = $builder->getPhrase(); // On sauvegarde le texte à trouver en SESSION
    $src = $builder->inline();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Formulaire de contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <h1>Formulaire de contact</h1>
        <form method="post" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nom:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message:</label>
                <textarea id="message" name="message" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="captcha" class="form-label">Captcha:</label>
                <img src="<?php echo $src; ?>" alt="CAPTCHA">
                <input type="text" id="captcha" name="captcha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>

        <!-- Affichage des messages -->
        <?php if (!empty($msg)): ?>
            <div class="alert alert-<?php echo $alert; ?> mt-3">
                <strong><?php echo $info; ?>:</strong> <?php echo $msg; ?>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
