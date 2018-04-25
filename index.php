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
    break;

    case 'fiche-real':
    require_once('controleur/fiche-real.php');
    break;

    case 'fiche-acteur':
    require_once('controleur/fiche-acteur.php');
    break;

    case 'fiche-real':
    require_once('controleur/real.php');

    break;

    default:

    require_once('error.html');
    

    }
} else {
    require_once('controleur/affiche.php');
}

?>