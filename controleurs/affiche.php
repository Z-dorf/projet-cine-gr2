<?php 
require 'vendor/autoload.php';

include '../php/model.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . '../templates');

$twig = new Twig_Environment($loader,[

    'cache' => false, // __DIR__ . 'tmp'

]);
$movies = getMovies();

var_dump ($movies);

//faire le render transmettre la vue au traitement





//Rendu du template



// foreach ($movies as $movie) {

//     echo "<li>".$movie['titre']."<br>";
//     echo "Genre : ";
//     foreach ($movie['genre'] as $genre){
//         echo utf8_encode($genre[1])." ";
//     }
//     echo "<br>Acteurs :";
//     foreach ($movie['acteur'] as $acteur){
//         echo utf8_encode($acteur[1])." ".utf8_encode($acteur[2])." ";
//     }
//     echo "</li>";


// }

echo "</ul>";





?>