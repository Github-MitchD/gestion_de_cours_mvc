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