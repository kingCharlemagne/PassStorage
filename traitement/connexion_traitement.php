<?php

////////////////////////////////////////  USER CONNECTION  //////////////////////////////////////////////////////////


if (!empty($_POST['login']) OR isset($_POST['login'])){
    $alerts=[];

    if (empty($_POST['surname']) OR !isset($_POST['surname'])){
        $alerts[]="Champs surname vide";
    }elseif (strlen($_POST['surname'])>10){
        $alerts[]="Champs surname trop long";
    }

    if (empty($_POST['password']) OR !isset($_POST['password'])){
        $alerts[]="Champs password vide";
    }elseif (strlen($_POST['password'])>10){
        $alerts[]="Champs password trop long";
    }

    $userSurname=strip_tags($_POST['surname']);
    $userPassword=strip_tags($_POST['password']);

    $select=$bdd->query('SELECT surname, password FROM user');
    $data=$select->fetch();

    $dataSurname=$data[0];
    $dataPassword=$data[1];

    if ($userSurname === $dataSurname AND $userPassword === $dataPassword){

        $_SESSION['surname']=$dataSurname;
        $_SESSION['password']=$dataPassword;
        $_SESSION['logStatus']='connect';

        header('Location: passStorage.php');
    }else{
        $alerts[]= "Utilisateur inconnue";
    }
}