<?php 
require_once ('vendor/autoload.php');

$loader = new Twig_Loader_Filesystem('view');
$twig = new Twig_Environment($loader,[

    'cache' => false,

 ]);

require_once ('model/model.php');

$movies = getMovies();

//faire le render transmettre la vue au traitement
$template = $twig->load('affiche.html');

echo $template->render(array('movies' => $movies));

// global $rows

// var_dump ($rows);

?>