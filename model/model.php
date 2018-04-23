<?php 
    $dbo = new PDO('mysql:host=127.0.0.1;dbname=allo_cine', 'root', 'root');
    
function getMovies(){
    
   
    global $dbo;
    $stm = $dbo->prepare('SELECT titre_f, id_f FROM films');
    $stm->execute();

    $movies = $stm->fetchAll();

    //on boucle sur nos films
    foreach ($movies as $row) {

        // on stock dans un tableau le titre du film
        $arrayMovies[] = [
            'titre' => $row['titre_f'],
            'id_f' => $row['id_f'],
            'genre' => getGenreById($row['id_f'])
        ];


            
    }
    
    return $arrayMovies;
}

        function getGenreById($id_film){
        // on request les genres du film en cours
        global $dbo;
        $stg = $dbo->prepare('SELECT GROUP_CONCAT(type_g) as genre FROM genres g INNER JOIN liaison_g_f lgf ON lgf.id_genre = g.id_g WHERE lgf.id_film = :id_film');            
        $stg->bindParam(':id_film', $id_film);
        $stg->execute();
        $genres = $stg->fetch();

        return $genres['genre'];

    }

    function getActeurById($id_acteur){
        // on stock les genres récupérés dans le tableau précédents

        $sta = $dbo->prepare('SELECT GROUP_CONCAT( CONCAT(prenom_a," ", nom_a)) as acteur FROM acteurs a INNER JOIN liaison_a_f laf ON laf.id_acteur = a.id_a WHERE laf.id_film = :id_film');                    
        $sta->bindParam(':id_film', $row['id_f']);
        $sta->execute();
        $acteurs = $sta->fetch();


    }
/* 
$dbo = new PDO('mysql:host=127.0.0.1;dbname=allo_cine', 'root', 'root');

$arrayMovies = [];
// $dep = $_POST['dep'];

$stm = $dbo->prepare('SELECT titre_f, id_f FROM films');
// $sth->bindParam(':departement_code', $dep);
$stm->execute();
$movies = $stm->fetchAll();
$stg = $dbo->prepare('SELECT type_g, id_film FROM genres, liaison_g_f');

$nbMovies = count($movies);

foreach ($movies as $row) {

    $arrayMovies = [
        'titre' => utf8_encode($row['titre_f'])

    ];


     for ($i = 0; $i < 4; $i++){
        $stg->execute();
        $genders = $stg->fetchAll();


         foreach ($genders as $genderRow){

            if($row['id_f'] == $genderRow['id_film']){
                array_push($arrayMovies, $genderRow['type_g']);
            }
            
            else {
                break;
            }
              
        
            
         }
              print_r ($arrayMovies);
      }


} */

?>