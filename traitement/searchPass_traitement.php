<?php

///////////////////////////////////////  SEARCH WEB SITE ////////////////////////////////////////////

if (!empty($_GET['search'])) {

    $getQuery = trim(strip_tags($_GET['search']));
    $search = $bdd->query('SELECT * FROM pass WHERE website LIKE "%' . $getQuery . '%"');
    $search->execute();
    $results = $search->fetchAll();

}


