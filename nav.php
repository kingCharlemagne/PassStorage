<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="passStorage.php">
        <img src="vendor/Picture/logo_coffre.png" width="40" height="40" class="d-inline-block align-top"
             alt="Logo">
        PassStorage
    </a>
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal">
                <img src="vendor/Picture/new_password.png" width="40" height="40" alt="New password">
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalSetting">
                <img src="vendor/Picture/parametres.png" width="40" height="40" alt="Setting">
            </button>
        </li>

        <li class="nav-item">
            <a class="btn btn-dark" href="passStorage.php?deconnexion">
                <img src="vendor/Picture/deconnexion.png" width="40" height="40" alt="Déconnexion">
            </a>
        </li>
    </ul>
</nav>

<!-- Modal setting -->
<div class="modal fade" id="modalSetting" tabindex="-1" role="dialog" aria-labelledby="modalSettingLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="modalLabel">Paramètres</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <button class="btn-danger btn" id="order66">Supprimer la base de donnée</button>
                <div id="formDeleteAll">
                    <form method="post">
                        <div class="form-group">
                            <label for="inputSurnameDeleteAll">Pseudo utilisateur</label>
                            <input type="text" name="surnameDelete" class="form-control" id="inputSurnameDeleteAll">
                        </div>
                        <div class="form-group">
                            <label for="inputPasswordDeleteAll">Mots de passe utilisateur</label>
                            <input type="password" name="passwordDelete" class="form-control" id="inputPasswordDeleteAll">
                        </div>
                        <button type="submit" class="btn btn-danger">Envoyer</button>
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal New password -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase text-center" id="modalLabel">Nouvelle entrée</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="inputWebSite">Site web</label>
                        <input type="text" name="website" class="form-control" id="inputWebSite"
                               placeholder="webSite.fr">
                    </div>
                    <div class="form-group">
                        <label for="inputSurname">Pseudo</label>
                        <input type="text" name="surname" class="form-control" id="inputSurname">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Mots de passe</label>
                        <input type="password" name="password" class="form-control" id="inputPassword">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" value="submit" class="btn btn-primary">Envoyer</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>


