
<?php 
// message sweetalert2  Correct
//$scriptJS = "Swal.fire('Hey user!', 'You are the rockstar!', 'info');
   
  //  Swal.update({
  //icon: 'success'
   // })";
// message sweetalert2  Erreur 
//$scriptJS = "Swal.fire('CORRECT!', 'Message envoyé !', 'info');
           
//Swal.update({
    //    icon: 'error'
  //    })";

//Load Composer's autoloader

//require './xampp/htdocs/Project/CDM_Project_SDBM_V2/Emailer/vendor/autoload.php';
//require './xampp/htdocs/Project/CDM_Project_SDBM_V2/Composer/vendor/autoload.php';

require '../CDM_Project_SDBM_V2/Emailer/vendor/autoload.php';
require '../CDM_Project_SDBM_V2/Composer/vendor/autoload.php';

$msg = "";
$src = "";

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
//




//$msg = "";
//$src = "";

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
             //   $msg = 'Désolé, quelque chose a mal tourné. Veuillez réessayer plus tard.';
             //   $alert = "danger";
             //   $info = "Attention";
                // message sweetalert2  Erreur pour MAILER
                $scriptJS = "Swal.fire('Désolé!', 'Quelque chose a mal tourné. Veuillez réessayer plus tard.', 'info');
                Swal.update({
                icon: 'error',
                })";
                $builder = new CaptchaBuilder;
                $builder->build();
                $_SESSION['phrase'] = $builder->getPhrase(); // On sauvegarde le texte à trouver en SESSION
                $src = $builder->inline();
            } else {
            //    $msg = 'Message envoyé ! Merci de nous avoir contactés.';
             //   $alert = "success";
            //    $info = "Bravo";
                // message sweetalert2  Correct
                $scriptJS = "Swal.fire('Bravo!', 'Message envoyé ! Merci de nous avoir contactés.!', 'info');
                Swal.update({
                icon: 'success'
                })";
                $builder = new CaptchaBuilder;
                $builder->build();
                $_SESSION['phrase'] = $builder->getPhrase(); // On sauvegarde le texte à trouver en SESSION
                $src = $builder->inline();
            }
        } else {
         //   $msg = 'Erreur dans le champ email. Veuillez vérifier votre email et réessayer.';
          //  $alert = "danger";
          //  $info = "Attention";
            // message sweetalert2  Erreur pour MAILER
            $scriptJS = "Swal.fire({
                title: 'Attention !',
                text: 'Erreur dans le champ email. Veuillez vérifier votre email et réessayer',
                timer: 2000
                
              })
                Swal.update({
                icon: 'error'
               })";
            $builder = new CaptchaBuilder;
            $builder->build();
            $_SESSION['phrase'] = $builder->getPhrase(); // On sauvegarde le texte à trouver en SESSION
            $src = $builder->inline();
        }
    } else {
        // Le texte du CAPTCHA est incorrect, on regénère une nouvelle image
       // $msg = "Captcha incorrect, veuillez réessayer.";
      //  $alert = "danger";
      //  $info = "Attention";
        // message sweetalert2  Erreur 
        $scriptJS = "Swal.fire('CAPTCHA INCORRECT!', 'veuillez réessayer!', 'warning');
            Swal.update({
            icon: 'error'
             })";
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de contact</title>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="./views/Css/formulaire.css">
    

</head>
<body>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="form-container">
                <h1 class="text-center mb-4"><strong>Formulaire de contact</strong></h1>
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="email" class="form-label"><strong>Email * :</strong></label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Nom * :</strong></label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label"><strong>Message * :</strong></label>
                        <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="captcha" class="form-label"><strong>Captcha * :</strong></label>
                        <div class="d-flex align-items-center">
                            <img src="<?php echo $src; ?>" alt="CAPTCHA" class="me-3">
                            <input type="text" id="captcha" name="captcha" class="form-control" required>
                        </div>
                    </div>
                    <div class="text-center">
                     <button type="submit" class="btn btn-warning">Envoyer</button>
                       <a href="./main" class="btn btn-secondary">Retour à la page d'accueil</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
<?php echo @$scriptJS; ?>
</script>
</body>
</html>