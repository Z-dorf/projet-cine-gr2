<?php 
require 'vendor/autoload.php';

include 'model/model.php';

$loader = new Twig_Loader_Filesystem('view');

$twig = new Twig_Environment($loader,[

    'cache' => false, // __DIR__ . 'tmp'

 ]);

$movies = getMovies();

var_dump($movies);

//faire le render transmettre la vue au traitement
$template = $twig->load('affiche.html');

echo $template->render(array('movies' => $movies));

var_dump ($movies);


//Rendu du template










?>