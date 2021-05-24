<!-- model d'ajout d'un nouveau cours -->
<?php

//on appel la connection a la base de données
require_once 'models/model.php';

//fonction qui permet d'ajouter un cours
function addCourse($courseCode, $courseTitle, $courseLangage){
    //on se connecte a la base de donnees qu'on met dans variable $bddPDO
    $dbbPDO = connexionDBB();

    $requete = $dbbPDO->prepare('INSERT INTO courses(courseCode, courseTitle, courseLangage) VALUES (:courseCode, :courseTitle, :courseLangage)');
    $requete->bindValue(':courseCode', $courseCode);
    $requete->bindValue(':courseTitle', $courseTitle);
    $requete->bindValue(':courseLangage', $courseLangage);

    $result = $requete->execute();
    return $result;
}