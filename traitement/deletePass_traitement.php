<?php

///////////////////////////////////////  DELETE  //////////////////////////////////////////////////////

if (!empty($_GET['delete']) AND isset($_GET['delete']) AND is_numeric($_GET['delete'])){
    $success=[];

    $delete=$bdd->prepare('DELETE FROM pass WHERE id=:id');
    $delete->bindValue(':id',trim(strip_tags($_GET['delete'])));
    $delete->execute();

    $success[]='Données supprimées';

}