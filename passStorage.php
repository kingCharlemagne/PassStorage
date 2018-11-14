<?php
session_start();

if (isset($_SESSION['logStatus']) AND $_SESSION['logStatus'] === 'connect') {

    include('inc/bddLog.php');
    require 'traitement/newPass_traitement.php';
    require 'traitement/searchPass_traitement.php';
    require 'traitement/updatePass_traitement.php';
    require 'traitement/deletePass_traitement.php';
    require 'traitement/deleteBdd_traitement.php';


//déconnexion
    if (isset($_GET['deconnexion'])) {
        session_destroy();
        header('Location:index.php');
    }


    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>PassStorage</title>
        <link rel="stylesheet" href="vendor/Bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="css/passStorage.css">
    </head>
    <body>
    <header>
        <?php require_once('nav.php') ?>
    </header>

    <!-- Message alert -->

    <?php if (!empty($_POST AND !empty($errors))) { ?>
        <div class="alert alert-danger text-uppercase" role="alert">
            <?php foreach ($errors as $error) { ?>
                <p><?php echo $error ?></p>
                <hr>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if (!empty($_POST AND !empty($success))) { ?>
        <div class="alert alert-success text-uppercase" role="alert">
            <p><?php echo $success[0]; ?></p>
        </div>
    <?php } ?>


    <section class="container mt-2">
        <div class="card text-center">
            <div class="card-header">
                <h5 class=" text-uppercase">Recherche</h5>
            </div>
            <div class="card-body justify-content-center">
                <label for="search">Saisir le nom du site où sont hébergés vos identifiants</label>
                <form class="form-inline justify-content-center" method="get">
                    <input class="form-control mr-sm-2" type="search" name="search" id="search"
                           aria-label="Search" >
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit" value="submit">GO !
                    </button>
                </form>
            </div>
        </div>
    </section>

    <?php
    if (isset($results) AND !empty($results)) {
        ?>
        <section class="container mt-5">
            <div class="card text-center">
                <h5 class="card-header text-center text-uppercase">Résultat</h5>
                <div class="card-body">

                    <table class="table">
                        <thead class="thead-light">
                        <tr class="text-uppercase">
                            <th scope="col">Site web</th>
                            <th scope="col">Pseudo</th>
                            <th scope="col">Mot de passe</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($results as $result) { ?>
                            <tr>
                                <form method="post">
                                    <td>
                                        <?= $result['website'] ?>
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" name="surname"
                                               value="<?= $result['surname'] ?>">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" name="password"
                                               value="<?= $result['password'] ?>">
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="option">
                                            <button type="submit" value="<?= $result['id'] ?>" name="update"
                                                    class="btn btn-primary">
                                                Modifier
                                            </button>
                                            <a href="passStorage.php?delete=<?= $result['id'] ?>"
                                               class="btn btn-danger">
                                                Supprimer</a>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    <?php } ?>

    <footer class="container-fluid fixed-bottom">
        <div class="row text-center footer">
            <a href="http://bilalbelmehdi.fr/">Copyright© Bilal Belmehdi</a>
        </div>
    </footer>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous">
    </script>
    <script src="vendor/Bootstrap/js/bootstrap.js"></script>
    <script src="Js/app.js"></script>
    </body>
    </html>
<?php } ?>