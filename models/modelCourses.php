<!-- model pour les cours -->
<?php

//on appel la connection a la base de données
require_once 'models/model.php';

//fonction qui permet d'ajouter un cours en bdd
function addCourse($courseCode, $courseTitle, $courseLangage){
    //on se connecte a la base de donnees qu'on met dans variable $bddPDO
    $bddPDO = connexionBDD();

    $requete = $bddPDO->prepare('INSERT INTO courses(courseCode, courseTitle, courseLangage) VALUES (:courseCode, :courseTitle, :courseLangage)');
    $requete->bindValue(':courseCode', $courseCode);
    $requete->bindValue(':courseTitle', $courseTitle);
    $requete->bindValue(':courseLangage', $courseLangage);

    $result = $requete->execute();
    return $result;
}

//fonction qui permet de recuperer les cours en bdd
function getCourses(){
    //on se co a la base de données
    $bddPDO = connexionBDD();
    $requete = "SELECT * FROM courses ORDER BY coursesId ASC";
    $resultGetCourses = $bddPDO->query($requete);
    return $resultGetCourses;
}