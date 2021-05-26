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
            $message = "Tous les champs sont requis";
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

/**
 * Fonction qui permet de modifier un cours grace a son id
 * @param $courseId
 */
function getUpdateCourse($courseId)
{
    $data = getCourse($courseId);
    if(!$data){
        $message = "Aucun cours !";
    } else {
        require_once 'views/viewUpdateCourse.php';
    }
    if(isset($_POST['update'])){
        if(!empty($_POST['courseCode']) && !empty($_POST['courseTitle']) && !empty($_POST['courseLangage'])){
            //on fait appel a la fonction du modelCourse qui permet de mettre a jour le cours
            $resultUpdate = updateCourse($courseId);

            if(!$resultUpdate){
                $message = "Un probleme est survenu, la mise à jour n'a pas été effectuée !";
                header('Location: controllerCourse/getAllCourses');
            }
            else {
                $message = "La mise a jour a bien été effectué !";
            }
        }
        else {
            $message = "Tous les champs sont requis !";
        }
        require_once 'views/errors.php';
    }
}

/**
 * Fonction qui permet d'appeler la fonction du model pour supprimer un cours grace son id
 * 
 */
function getDeleteCourse($courseId){
    //on affiche les valeurs du cours ayant l'id $courseId
    $data = getCourse($courseId);
    if(!$data){
        $message = "Aucun cours a supprimer !";
    }
    //on les affiche dans sa view
    else {
        require_once 'views/viewDeleteCourse.php';
    }
    
    //si le btn delete est executé
    if(isset($_POST['delete'])){
        $resultDelete = deleteCourse($courseId);
        if(!$resultDelete){
            $message = "Un problème dans la suppression du cours !";
        }
        //si la suppresion s'est bien passée
        else {
            $message = "Le cours a bien été supprimé !";
        }
    }
    require_once 'views/errors.php';
}