<!-- Model pour les inscriptions -->
<?php
require_once 'models/model.php';

/**
 * Fonction qui permet d'insérer un cours associé a un etudiant dans la table inscription
 * @param $studentId
 * @param $courseId
 * @return $result
 */
function addCourseForStudent($studentId, $courseId){
    $bddPDO = connexionBDD();
    $requete = $bddPDO->prepare('INSERT INTO inscription (studentId, courseId, inscriptionDate) VALUES (:studentId, :courseId, :inscriptionDate)');

    $requete->bindValue(':studentId', $studentId);
    $requete->bindValue(':courseId', $courseId);
    $requete->bindValue(':inscriptionDate', date('Y-m-d'));

    $result = $requete->execute();

    return $result;
}

/**
 * Fonction qui permet de recuperer les cours a laquelle un student s'est incris
 * @param $studentId
 * @return $result
 */
function getMyCourse($studentId){
    $bddPDO = connexionBDD();

    $requete = "SELECT courses.courseId, courses.courseCode, courses.courseTitle, courses.courseLangage, inscription.studentId, inscription.courseID
        FROM courses, inscription
        WHERE inscription.studentId = '$studentId'
        AND inscription.courseId = courses.courseId";

        $result = $bddPDO->query($requete);

        return $result;        
}

/**
 * Fonction qui verifie si un student est deja inscrit a un cours
 * @param $studentId
 * @param $courseId
 * @return $result
 */
function getCoursesStudent($studentId,$courseId){
    $bddPDO = connexionBDD();
    $requete = "SELECT * FROM inscription WHERE studentId = '$studentId' AND courseId = '$courseId'";

    $result = $bddPDO->query($requete);
    return $result;
}