<!-- model pour les cours -->
<?php

//on appel la connection a la base de données
require_once 'models/model.php';

/**
 * Fonction qui permet d'ajouter un cours dans la base de données
 * @param $courseCode, $courseTitle, $courseLangage
 * @return $result
 */
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

/**
 * Fonction qui permet de recuperer tous les cours de la base données
 * @return $resultGetCourses
 */
function getCourses(){
    //on se co a la base de données
    $bddPDO = connexionBDD();
    $requete = "SELECT * FROM courses ORDER BY courseId ASC";
    $resultGetCourses = $bddPDO->query($requete);
    return $resultGetCourses;
}

/**
 * Fonction qui permet de recuperer un cours grace a son id
 * @param $courseId
 * @return $data
 */
function getCourse($courseId){
    //on initialise la connexion
    $bddPDO = connexionBDD();
    $requete = "SELECT * FROM courses WHERE courseId = $courseId";
    $result = $bddPDO->query($requete);
    $data = $result->fetch(PDO::FETCH_ASSOC);
    return $data;
}

/**
 * Fonction qui permet de modifier un cours grace a son id
 * @param $courseId
 * @return $resultUpdate
 */
function updateCourse($courseId){
    //on initialise la connextion
    $bddPDO = connexionBDD();
    //on prepare la requete
    $requete = $bddPDO->prepare('UPDATE courses SET courseCode = :courseCode, courseTitle = :courseTitle, courseLangage = :courseLangage WHERE CourseId = :courseId');
    $requete->bindValue(':courseCode', $_POST['courseCode']);
    $requete->bindValue(':courseTitle', $_POST['courseTitle']);
    $requete->bindValue(':courseLangage', $_POST['courseLangage']);
    $requete->bindValue(':courseId', $courseId);

    $resultUpdate = $requete->execute();
    return $resultUpdate;
}