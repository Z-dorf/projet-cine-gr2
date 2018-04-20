<?php 

include '../php/model.php';

$movies = getMovies();


echo "<ul>";

foreach ($movies as $movie) {

    echo "<li>".$movie['titre']."<br>";
    echo "Genre : ";
    foreach ($movie['genre'] as $genre){
        echo utf8_encode($genre[1])." ";
    }
    echo "<br>Acteurs :";
    foreach ($movie['acteur'] as $acteur){
        echo utf8_encode($acteur[1])." ".utf8_encode($acteur[2])." ";
    }
    echo "</li>";


}

echo "</ul>";





?>