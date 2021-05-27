<?php
require_once 'models/modelInscriptions.php';

//affichage uniquement pour stagiaire connecté, donc on demarre la session
session_start();

/**
 * Fonction qui permet
 * @param $studentId
 * @param $courseId
 */
function addCourseToStudents($studentId,$courseId){
    if(isset($_SESSION['studentId'])){
       $result = addCourseForStudent($studentId, $courseId);
       if(!$result){
           $message = "Le cours n'a pas été attribué";
       }
       else {
           $message = "Votre inscription est validée !";
       }
    }
    //s'il ny a pas de session
    else {
        $message = "Vous n'etes pas connecté, veuillez vous connecter pour pouvoir vous inscrire";
    }
    require_once 'views/errors.php';

}