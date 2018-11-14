<?php
session_start();
require 'inc/bddLog.php';
require 'traitement/connexion_traitement.php';

$issetUser=$bdd->query('SELECT id FROM user');
$results=$issetUser->fetch();

if ($results === false){
    header('Location:inscription.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion PassStorage</title>
    <link rel="stylesheet" href="vendor/Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/passStorage.css">
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

<?php if (!empty($alerts)){ ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php foreach ($alerts as $alert){
            echo $alert.'<br>';
        } ?>
    </div>
<?php } ?>

<section class="container mt-5">
    <div class="card text-center">
        <h5 class="card-header text-center text-uppercase">Connexion PassStorage</h5>
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="surname" id="inputSurname" placeholder="Surname">
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <button type="submit" value="submit" class="btn btn-primary mt-3" name="login">Envoyer</button>
            </form>
        </div>
    </div>
</section>

<footer class="container-fluid fixed-bottom">
    <div class="row text-center footer">
        <a href="http://bilalbelmehdi.fr/">Copyright© Bilal Belmehdi</a>
    </div>
</footer>
<script src="vendor/Bootstrap/js/bootstrap.js"></script>
<script src="Js/app.js"></script>
</body>
</html>
