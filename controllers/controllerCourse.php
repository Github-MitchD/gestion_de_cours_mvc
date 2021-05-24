<!-- controller d'ajout d'un nouveau cours -->
<?php

require_once 'models/modelCourses.php';

//fonction qui ajoute un cours
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