<?php 

include '../php/model.php';

$movies = getMovies();

echo "<ul>";

foreach ($movies as $movie) {

    echo "<li>".$movie['titre'].$movie['genre']."</li>";





}

echo "</ul>";





?>