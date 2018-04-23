<?php

require 'controleur/affiche.php';

// //Rounting
// $page = 'home';

// if (isset($_GET['p'])){
//     $page = $_GET['p'];
// }

//Rendu du template


// $loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');

// $twig = new Twig_Environment($loader,[

//     'cache' => false, // __DIR__ . 'tmp'

// ]);



switch ($page) { //routeur
    case 'contact': "cine" "acteurs" "realisateurs" "films"
    echo $twig->render('contact.twig');
    break;

    case 'home':
    echo $twig->render('home.twig');
    break;

    default:
    header('HTTP/1.0 404 Not Found');
    echo $twig->render('404.twig');
    break;
}

 if ($page === 'home') {
    echo $twig->render('home.twig', ['person' => [

        'name' => 'Napo',
        'year' => '1 an'

    ]]);
} 

?>