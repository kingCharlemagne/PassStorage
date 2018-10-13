<?php

///////////////////////////////////////  UPDATE  //////////////////////////////////////////////////////

// Traitement du POST
if (!empty($_POST['update']) AND isset($_POST['update']) AND is_numeric($_POST['update'])) {
    $errors=[];
    $success = [];

    if (empty($_POST['surname']) OR !isset($_POST['surname'])) {
        $errors[] = 'Champ pseudo invalide';
    }

    if (empty($_POST['password']) OR !isset($_POST['password'])) {
        $errors[] = 'Champ password invalide';
    }

    //Récupération des informations dans la BDD

    $returnInfos = $bdd->prepare('SELECT surname, password FROM pass WHERE id=:id ');
    $returnInfos->bindValue(':id', trim(strip_tags($_POST['update'])));
    $returnInfos->execute();
    $infos = $returnInfos->fetchAll();

    //Vérification que les données envoyées sont différentes de celles enregistrées

    if ($_POST['surname'] === $infos[0]['surname'] AND $_POST['password'] === $infos[0]['password']) {
        $errors[] = 'Changer les données pour les modifier';
    }elseif (empty($updateErrors)){
        $update=$bdd->prepare('UPDATE pass SET surname= :surname, password= :password WHERE id= :id');
        $update->bindValue(':surname',trim(strip_tags($_POST['surname'])));
        $update->bindValue(':password',trim(strip_tags($_POST['password'])));
        $update->bindValue(':id',trim(strip_tags($_POST['update'])));
        $update->execute();
        $success[]='Données modifiées';
    }






}

