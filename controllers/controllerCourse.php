<!-- controller pour les cours -->
<?php

require_once 'models/modelCourses.php';

/**
 * Fonction qui permet d'ajouter un cours dans la base de données
 */
function addOneCourse(){

    if(isset($_POST['enregistrer'])){
        //on verifie que les champs sont bien remplis
        if(!empty($_POST['courseCode']) && !empty($_POST['courseTitle']) && !empty($_POST['courseLangage'])){
            //on appel la fonction addCourse du model (qui a besoin de ses 3 arguments)
            addCourse($_POST['courseCode'], $_POST['courseTitle'], $_POST['courseLangage']);
        }
        //
        else {
            //sinon
            echo 'Tous les champs sont requis';
        }
    }
    //on a besoin de notre view
    require_once 'views/viewCourse.php';
}

/**
 * Fonction qui permet de récupérer tous les cours de la base de données
 */
function getAllCourses(){
    $resultGetCourses = getCourses();

    if(!$resultGetCourses){
        $message = "La récupération des cours a échoué !";
    }
    else {
        $nb_courses = $resultGetCourses->rowCount();
        if($nb_courses == 0){
            $message = "Il n'y a aucun cours pour le moment !";
            //on redirige vers le formulaire d'ajout de cours
            addOneCourse();
        } else {
            //page d'affichage de tous les cours
            require_once 'views/viewAllCourses.php';
        }
    }
    //on ferme la connexion du serveur pour permettre a d'autres requete de s'executer
    $resultGetCourses->closeCursor();
}