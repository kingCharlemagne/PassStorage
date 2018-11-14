<?php
require 'inc/bddLog.php';
require_once 'traitement/inscription_traitement.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PassStorage</title>
    <link rel="stylesheet" href="vendor/Bootstrap/css/bootstrap.css">
</head>
<body>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="navbar-brand">
            <img src="vendor/Picture/logo_coffre.png" width="40" height="40" class="d-inline-block align-top"
                 alt="pict">
            PassStorage
        </div>
    </nav>
</header>

<!-- Message alert -->

<?php if (!empty($_POST AND !empty($errors))) { ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach ($errors as $error) { ?>
            <p class="text-uppercase"><?php echo $error; if (isset($errors['issetUser'])){?></p><hr>

                <a href="index.php">Retour à la page connexion pour vous connecter</a>
            <?php } ?>
        <?php } ?>
    </div>
<?php } ?>

<section class="container">
    <div class="card">
        <h5 class="card-header text-center text-uppercase">Nouvelle utilisateur</h5>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="inputSurname">Saisir un Pseudo</label>
                    <input type="text" name="surname" class="form-control" id="inputSurname">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Saisir un mots de passe</label>
                    <input type="password" name="password" class="form-control" id="inputPassword">
                </div>
                <div class="form-group">
                    <label for="inputVerifyPassword">Confirmer le mots de passe</label>
                    <input type="password" name="verifyPassword" class="form-control" id="inputVerifyPassword">
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" value="submit" class="btn-block btn-lg btn btn-primary text-uppercase">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="vendor/Bootstrap/js/bootstrap.js"></script>
<script src="Js/app.js"></script>


</body>
</html>