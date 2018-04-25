<?php 
require_once ('vendor/autoload.php');

$loader = new Twig_Loader_Filesystem('view');
$twig = new Twig_Environment($loader,[

    'cache' => false,

 ]);

require_once ('model/model.php');

$id_RealSeul = $_GET['id'];

$real = getReal($id_RealSeul);

//faire le render transmettre la vue au traitement
$template = $twig->load('fiche-real.html');

echo $template->render(array('real' => $real));

?>