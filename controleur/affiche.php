<?php 

include '../php/model.php';

$movies = getMovies();
var_dump($movies);


echo "<ul>";

foreach ($movies as $movie) {

    echo "<li>".$movie['titre'].$movie['genre']."</li>";


}

echo "</ul>";

 

?>