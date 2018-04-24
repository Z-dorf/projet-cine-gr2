<?php

//Rounting

if (isset($_GET['action'])){
    
    switch ($_GET['action']) { 
        
    //routeur

    case 'affiche':
    require_once('controleur/affiche.php');
    break;

    case 'fiche-film':
    require_once('controleur/fiche-film.php');

        echo 'coucou le grand';


    break;

    default:

    require_once('error.html');
    

    }
} else {
    require_once('controleur/affiche.php');
}


// var_dump ($_GET['action']);


?>