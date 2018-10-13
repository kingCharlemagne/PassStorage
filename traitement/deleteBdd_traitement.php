<?php

if (!empty($_POST)AND isset($_POST)) {
    $success = [];
    $errors=[];

    $verify=$bdd->query('SELECT surname, password FROM user');
    $verifyResults=$verify->fetch();

    if (empty($_POST['surnameDelete']) AND !isset($_POST['surnameDelete'])){
        $errors[]="L'effacement de la base de donnée annulé, champ surname vide ";
    }
    elseif (strlen($_POST["surnameDelete"])<4 OR strlen($_POST['surnameDelete'])>20) {
        $errors[] = "L'effacement de la base de donnée annulé, le champ Pseudo doit être compris entre 4 et 20 caractères";
    }
    elseif (empty($_POST['passwordDelete']) AND !isset($_POST['passwordDelete'])){
        $errors[]="Champ mots de passe vide";
    }
    elseif (strlen($_POST["passwordDelete"])<4 OR strlen($_POST['passwordDelete'])>20) {
        $errors[] = "L'effacement de la base de donnée annulé, le champ Mots de passe doit être compris entre 4 et 20 caractères";
    }
    elseif ($_POST['surnameDelete'] === $verifyResults['surname'] AND $_POST['passwordDelete'] === $verifyResults['password']){
        $deleteAll=$bdd->query('DELETE FROM pass');
        $deleteAll->execute();
        $success[]="Données supprimées";
    }
    elseif ($_POST['surnameDelete'] != $verifyResults['surname'] OR $_POST['passwordDelete'] != $verifyResults['password']){
        $errors[]="Le pseudo ou le mots de passe sont incorrects";
    }







}