<?php 
    $dbo = new PDO('mysql:host=127.0.0.1;dbname=allo_cine', 'root', 'root');

function getMovies(){
    
   
    global $dbo;
    $stm = $dbo->prepare('SELECT titre_f, id_f, description_f, annee_f FROM films');
    $stm->execute();

    $movies = $stm->fetchAll();

    //on boucle sur nos films
    foreach ($movies as $row) {

        // on stock dans un tableau le titre du film
        $arrayMovies[] = [
            'titre' => utf8_encode($row['titre_f']),
            'id_f' => $row['id_f'],
            'description' => utf8_encode($row['description_f']),
            'annee' => $row['annee_f'],
            'genre' => utf8_encode(getGenreById($row['id_f'])),
            'acteur' => utf8_encode(getActeurById($row['id_f'])),
            'realisateur' => utf8_encode(getRealById($row['id_f'])),
            'image' => 'assets/medias/film_'.$row["id_f"].'.jpg'
        ];


            
    }
    
    return $arrayMovies;
}

function getGenreById($id_film){

    global $dbo;

    $stg = $dbo->prepare('SELECT GROUP_CONCAT(type_g) as genre FROM genres g INNER JOIN liaison_g_f lgf ON lgf.id_genre = g.id_g WHERE lgf.id_film = :id_film');            
    $stg->bindParam(':id_film', $id_film);
    $stg->execute();
    $genres = $stg->fetch();

    return $genres['genre'];

}

function getActeurById($id_film){

    global $dbo;

    $sta = $dbo->prepare('SELECT GROUP_CONCAT( CONCAT(prenom_a," ", nom_a)) as acteur FROM acteurs a INNER JOIN liaison_a_f laf ON laf.id_acteur = a.id_a WHERE laf.id_film = :id_film');                    
    $sta->bindParam(':id_film', $id_film);
    $sta->execute();
    $acteurs = $sta->fetch();

    return $acteurs['acteur'];

}

function getRealById($id_film){

    global $dbo;

    $str = $dbo->prepare('SELECT GROUP_CONCAT( CONCAT(prenom_r," ", nom_r)) as realisateur FROM realisateurs r INNER JOIN liaison_r_f lrf ON lrf.id_realisateur = r.id_r WHERE lrf.id_film = :id_film');            
    $str->bindParam(':id_film', $id_film);
    $str->execute();
    $realisateurs = $str->fetch();

    return $realisateurs['realisateur'];

}

?>