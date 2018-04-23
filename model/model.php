<?php 
// echo 'coucou';
function getMovies(){
    
    $dbo = new PDO('mysql:host=localhost;dbname=project_cine', 'root', '');
    $arrayMovies = [];

    $stm = $dbo->prepare('SELECT titre_f, id_f FROM films');
    $stm->execute();

    $movies = $stm->fetchAll();
    $nbMovies = count($movies);

    //on boucle sur nos films
    foreach ($movies as $movie => $row) {

        // on stock dans un tableau le titre du film
        $arrayMovies[$movie] = [
            'titre' => utf8_encode($row['titre_f'])
        ];

        // on request les genres du film en cours
        // $stg = $dbo->prepare('SELECT g.* FROM genres g INNER JOIN liaison_g_f lgf ON lgf.id_genre = g.id_g WHERE lgf.id_film = :id_film');
        // $stg->bindParam(':id_film', $row['id_f']);
        // $stg->execute();
        // $genres = $stg->fetchAll();

        // // on stock les genres récupérés dans le tableau précédents
        // $arrayMovies[$movie]['genre'] = $genres;



        // on request les acteurs du film en cours
        $sta = $dbo->prepare('SELECT a.* FROM a a INNER JOIN liaison_a_f laf ON laf.id_genre = g.id_a WHERE lgf.id_film = :id_film');
        $sta->bindParam(':id_film', $row['id_f']);
        $sta->execute();
        $acteurs = $sta->fetchAll();

        // on stock les acteurs récupérés dans le tableau précédents
        $arrayMovies[$movie]['acteur'] = $acteurs;


        // // on request les réalisateurs du film en cours
        // $str = $dbo->prepare('SELECT r.* FROM realisteur r INNER JOIN realisateurs lgf ON lgf.id_genre = g.id_g WHERE lgf.id_film = :id_film');
        // $str->bindParam(':id_film', $row['id_f']);
        // $str->execute();
        // $acteurs = $str->fetchAll();

        // // on stock les acteurs récupérés dans le tableau précédents
        // $arrayMovies[$movie]['realisateur'] = $realisateurs;



        
        
    }
    
    return $arrayMovies;
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