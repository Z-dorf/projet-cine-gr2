<?php

//Rounting

if (isset($_GET['nomdemapage'])){
    
    switch ($_GET['nomdemapage']) { //routeur

    case 'home':
    echo $twig->render('home.twig');
    break;

    default:
    header('HTTP/1.0 404 Not Found');
    echo $twig->render('404.twig');
    break;

    }
}



/*
 if ($page === 'home') {
    echo $twig->render('home.twig', ['person' => [

        'name' => 'Napo',
        'year' => '1 an'

    ]]);


        echo $twig->render('home.twig', ['movies' => $listMovies [
            

        'name' => 'Napo',
        'year' => '1 an'

    ]]);
} */

?>