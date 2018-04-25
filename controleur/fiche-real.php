<?php 
require_once ('vendor/autoload.php');

$loader = new Twig_Loader_Filesystem('view');
$twig = new Twig_Environment($loader,[

    'cache' => false,

 ]);

require_once ('model/model.php');

$id_Real = $_GET['id'];

$getFilmByReal = getReal($id_Real);
// var_dump($getFilmByReal);
//faire le render transmettre la vue au traitement
$template = $twig->load('fiche-real.html');

echo $template->render(array('filmReal' => $getFilmByReal));

?>
