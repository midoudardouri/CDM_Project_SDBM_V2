<?php
//Importation de la classe Captcha 
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

//Load Composer's autoloader
require 'vendor/autoload.php';


$msg = "";
$src = "";

// Le CAPTCHA a t il été bien saisi
if (isset($_POST['captcha'])) {
    // Le formulaire a été soumis
    session_start();
    $A_trouver = $_SESSION['phrase'] ;
    // On compare le texte saisi avec celui enregistré en SESSION
    if ($A_trouver == $_POST['captcha'] ) {
         $msg = 'Ouhhh lalalala';
         $alert = "info";
         $info = "Bravo";
    } else {
        // Le texte de la CAPTCHA a mal été saisi
        // ==> On regénère une nouvelle image
        $msg = "Attention!!!";
        $alert = "danger";
        $info = "Attention";

        // Will build phrases of 5 characters, only digits
        $phraseBuilder = new PhraseBuilder(4, '0123456789');
        $builder = new CaptchaBuilder(null, $phraseBuilder);
        $builder->build();
        //$builder->save('out.jpg');  // Pour écrire l'image dans un fichier
        //session_start(); // Inutile car déjà fait le session_start
        $_SESSION['phrase'] = $builder->getPhrase(); // On sauvegarde le texte A trouver en SESSION
        $src = $builder->inline();
    }
    
}
else {
    // On affiche le formulaire
    $builder = new CaptchaBuilder;
    $builder->build();
    //$builder->save('out.jpg');  // Pour écrire l'image dans un fichier
    session_start();
    $_SESSION['phrase'] = $builder->getPhrase(); // On sauvegarde le texte A trouver en SESSION
    $src = $builder->inline();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Formulaire de contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <h1>Verifications </h1>
        <?php if (!empty($msg)) {
            echo "<div class='alert alert-$alert alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>$info!</strong> $msg
                </div>";
        } ?>
        <form method="POST">
            <div class="form-group">
                <img src="<?php echo @$src; ?>" />
                <input type="text" placeholder="Saisir le texte de l'image" name="captcha"/>
            </div>
        

            <button type="submit" class="btn btn-warning">Envoyer</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>