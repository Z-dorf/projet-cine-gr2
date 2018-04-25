<?php 
try
{
    $dbo = new PDO('mysql:host=localhost;dbname=project_cine', 'root', '');
}
catch (exeption $e)
{
    die ('Erreur : ' . $e->getMessage());
}
function getMovies(){
    
   
    global $dbo;
    $stms = $dbo->prepare('SELECT titre_f, id_f, description_f, annee_f FROM films');
    $stms->execute();

    $movies = $stms->fetchAll();

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


function getMovie($id_film){

    global $dbo;

    $stm = $dbo->prepare('SELECT titre_f, id_f, description_f, annee_f, id_r, iframe FROM films, realisateurs WHERE id_f = :id_film and id_f = id_r');            
    $stm->bindParam(':id_film', $id_film);
    $stm->execute();
    $movie = $stm->fetch();


    $arrayMovie = [
        'titre' => utf8_encode($movie['titre_f']),
        'id_f' => $movie['id_f'],
        'description' => utf8_encode($movie['description_f']),
        'annee' => $movie['annee_f'],
        'genre' => utf8_encode(getGenreById($movie['id_f'])),
        'acteur' => utf8_encode(getActeurById($movie['id_f'])),
        'realisateur' => utf8_encode(getRealById($movie['id_f'])),
        'image' => 'assets/medias/film_'.$id_film.'.jpg',
        'id_r' => $movie['id_r'],
        'iframe' => $movie['iframe']
    ];

    return $arrayMovie;


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


function getReal($id_real){
    
    global $dbo;

    $stgt = $dbo->prepare('SELECT prenom_r, nom_r, id_r, nationalite, date_naissance, age, id_f FROM realisateurs, films WHERE id_r = :id_real and id_f = id_r');            
    $stgt->bindParam(':id_real', $id_real);
    $stgt->execute();
    $real = $stgt->fetch();

    $arrayReal = [
        'prenom' => utf8_encode($real['prenom_r']),
        'nom' => utf8_encode($real['nom_r']),
        'nationnalite' => utf8_encode($real['nationalite']),
        'naissance' => utf8_encode($real['date_naissance']),
        'age' => utf8_encode($real['age']),
        'id_r' => $real['id_r'],
        'id_f' => $real['id_f'],
        'films' => getFilmReal($real['id_r']),
        'image' => 'assets/medias/real_'.$id_real.'.jpg'
    ];

    return $arrayReal;
}

function getFilmReal($id_real){

    global $dbo;

    $stfr = $dbo->prepare('SELECT titre_f, id_f FROM films f INNER JOIN liaison_r_f lrf ON lrf.id_film = f.id_f WHERE lrf.id_realisateur = :id_real');            
    $stfr->bindParam(':id_real', $id_real);
    $stfr->execute();
    $filmsReal = $stfr->fetchAll();

    return $filmsReal;

}


?>