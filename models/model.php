<!-- fichier de connection a la base de données -->
<?php
function connexionDBB(){

    $db_host = "localhost";
    $db_name = "gestion_de_cours";
    $db_user = "root";
    $db_password = "";

    $db_connexion = false;

    if(!$db_connexion){
        try{
            $bddPDO = new PDO('mysql:host='.$db_host.'; dbname='.$db_name.'', $db_user, $db_password);
            $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bddPDO;
        } catch(PDOException $exception){
            echo "Erreur de connexion: ".$exception->getMessage();
        }
    }
}
//pour verif la connexion bdd
//http://localhost/gestion_de_cours_Udemy/models/model.php
// connexionDBB();
// if(connexionDBB()){
//     echo "Connection BDD -> OK";
// }