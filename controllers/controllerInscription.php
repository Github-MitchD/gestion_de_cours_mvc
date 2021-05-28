<?php
require_once 'models/modelInscriptions.php';
require_once 'controllers/controllerCourse.php';

//affichage uniquement pour stagiaire connecté, donc on demarre la session
session_start();

/**
 * Fonction qui permet à un student de s'inscrire a un cours
 * @param $studentId
 * @param $courseId
 */
function addCourseToStudents($studentId, $courseId)
{
    if (isset($_SESSION['studentId'])) {

        //on appel la fonction du model qui verifie si le student est deja inscrit
        $result = getCoursesStudent($studentId, $courseId);
        //on met dans $nb_courses le nombre de resultat
        $nb_courses = $result->rowCount();
        //si ce result est different de 0 (donc inscrit)
        if ($nb_courses != 0) {
            //on lui affiche le message
            getAllCoursesStudent();
            $message = "Vous êtes déjà inscris à ce cours !";
            
        }
        //si le result est egal a 0 (donc pas inscrit)
        else {
            $result = addCourseForStudent($studentId, $courseId);
            if (!$result) {
                $message = "Le cours n'a pas été attribué";
                getAllCoursesStudent();
            } else {
                $message = "Votre inscription est validée !";
                getAllMyCourses();
            }
        }
        require 'views/errors.php';
    }
    //s'il ny a pas de session
    else {
        $message = "Vous n'etes pas connecté, veuillez vous connecter pour pouvoir vous inscrire";
    }
    
}

/**
 * Fonction qui permet d'afficher les cours a laquelle un student s'est inscrit
 */
function getAllMyCourses(){
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['studentId'])){
        $resultGetCourses = getMyCourse($_SESSION['studentId']);

        if(!$resultGetCourses){
            $message = "La récupération des cours a rencontré un problème";
        }
        else {
            $nb_courses = $resultGetCourses->rowCount();
            if($nb_courses == 0){
                $message = "Vous n'êtes inscris a aucun cours";
                getAllCoursesStudent();
            }
            else {
                require_once 'views/viewCoursesForStudents.php';
            }
        }
        $resultGetCourses->closeCursor();
    }
    require_once 'views/errors.php';
}