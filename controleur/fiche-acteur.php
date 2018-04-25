<?php 
require_once ('vendor/autoload.php');

$loader = new Twig_Loader_Filesystem('view');
$twig = new Twig_Environment($loader,[

    'cache' => false,

 ]);

require_once ('model/model.php');

$id_filmSeul = $_GET['id'];

$movie = getMovie($id_filmSeul);

//faire le render transmettre la vue au traitement
$template = $twig->load('fiche-acteur.html');

echo $template->render(array('movie' => $movie)); 

?>