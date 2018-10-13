<?php

if (!empty($_POST) AND isset($_POST)){
    $errors=[];
    $post=[];

    foreach($_POST as $key=>$value){
        $post[$key] = trim(strip_tags($value));
    }

    $issetUser=$bdd->query('SELECT id FROM user');
    $results=$issetUser->fetch();
    if ($results === false){

        if (empty($_POST['surname']) AND !isset($_POST['surname'])){
            $errors[]="Champ surname vide ";
        }elseif (strlen($_POST["surname"])<4 OR strlen($_POST['surname'])>20) {
            $errors[] = "Le champ Pseudo doit être compris entre 4 et 20 caractères";
        }

        if (empty($_POST['password']) AND !isset($_POST['password'])){
            $errors[]="Champ mots de passe vide";
        }elseif (strlen($_POST["password"])<4 OR strlen($_POST['password'])>20) {
            $errors[] = "Le champ mots de passe doit être compris entre 4 et 20 caractères";
        }

        if (empty($_POST['verifyPassword']) AND !isset($_POST['verifyPassword'])){
            $errors[]="Champ confirmer le mots de passe vide";
        }

        if ($_POST['password'] != $_POST['verifyPassword']){
            $errors[]="Les Champs mots de passe ne sont pas identiques";
        }

        if (empty($errors)){
           $insertUser=$bdd->prepare('INSERT INTO user(surname, password) VALUES (:surname, :password)');
           $insertUser->bindValue(':surname', $post['surname']);
           $insertUser->bindValue(':password',$post['verifyPassword']);
           $insertUser->execute();

           header('Location:index.php');
        }

    }else{
        $errors['issetUser']='Le compte Utilisateur existe déjà ';
    }







}