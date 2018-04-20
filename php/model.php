<?php 


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
            //  
        
            
         }
              print_r ($arrayMovies);
      }


}

?>