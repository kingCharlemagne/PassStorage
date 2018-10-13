<?php

///////////////////////////////////////  INSERT NEW PASSWORD //////////////////////////////////////////////////////////

// Verification des données

if (!empty($_POST) or isset($_POST)) {
    $errors = [];
    $success = [];



    if (!isset($_POST["website"]) OR empty($_POST["website"])) {
        $errors[] = "Champ site web vide";
    }elseif (strlen($_POST["website"])<4 OR strlen($_POST['website'])>30) {
        $errors[] = "Le champ site web doit être compris entre 4 et 3O caractères";
    }


    if (!isset($_POST["surname"]) OR empty($_POST["surname"])) {
        $errors[] = "Champ pseudo vide";
    } elseif (strlen($_POST["surname"])<4 OR strlen($_POST['surname'])>20 ) {
        $errors[] = "Le champ Pseudo, il doit être compris entre 4 et 2O caractères";
    }

    if (!isset($_POST["password"]) OR empty($_POST["password"])) {
        $errors[] = "Champ mot de passe vide";
    } elseif (strlen($_POST["password"])<4 OR strlen($_POST['password'])>20) {
        $errors[] = "Le champ mots de passe, il doit être compris entre 4 et 20 caractères";
    }

    // Insertion dans la base de données
    if (empty($errors)) {

        $Verify = $bdd->prepare('SELECT website, surname FROM pass WHERE website= :website AND  surname= :surname');
        $Verify->bindValue(':website', trim(strip_tags($_POST['website'])));
        $Verify->bindValue(':surname', trim(strip_tags($_POST['surname'])));
        $Verify->execute();
        $issetVerify = $Verify->fetchAll();

        if (count($issetVerify) === 1) {
            $errors[] = "Mots de passe déjà enregistré";
        } else {
            $insert = $bdd->prepare('INSERT INTO pass(website,surname,password) VALUES(:website,:surname,:password)');
            $insert->bindValue(':website', trim(strip_tags($_POST['website'])));
            $insert->bindValue(':surname', trim(strip_tags($_POST['surname'])));
            $insert->bindValue(':password',trim(strip_tags($_POST['password'])));
            if ($insert->execute()) {
                $success[]= "Données enregistrées";
            } else {
                $errors[] = "Echec données non enregistrée";
            }
        }
    }
}



