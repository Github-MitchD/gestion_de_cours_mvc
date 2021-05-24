<?php
//on remplace le index.php par une chaine de caractere vide que l'on met dans la constante
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

//on separe les differents parametres de la chaine de caracteres dans l'url
//ex: si url = localhost:8080/gestion_de_cours_Udemy/students/seConnecter/45
if ($_GET['action']) {
    $params = explode("/", $_GET['action']);

    // echo "Param1 = ".$params[0]; echo "<br>";
    // echo "Param2 = " . $params[1]; echo "<br>";
    // echo "Param3 = " . $params[2];
    //on aura:
    //Param1 = students
    //Param2 = seConnecter
    //Param3 = 45

    //si le 1er param n'est pas vide
    if ($params[0] != "") {
        //on le stock dans une variable
        $controller = $params[0];

        $action = "";

        //si on a une action, on la stock
        if (isset($params[1])) {
            $action = $params[1];
        }

        //on appel le bon controller qu'on a recuperer dans la globale GET (params[0])
        require_once (ROOT.'controllers/'.$controller.'.php');

        //on verifie que l'action existe
        if(function_exists($action)){
            //si on a 2 parametres (student/45)
            if(isset($params[2]) && isset($params[3])){
                $action($params[2], $params[3]);
            }
            //si on a qu'un parametre
            else if(isset($params[2])) {
                $action($params[2]);
            }
            else {
                $action();
            }
        }
        //si l'action n'existe pas, on redirige
        else {
            //a redefinir
            echo "Page par defaut";
        }
    }
}
//Si aucune action existe
else {
    //a redefinir
    //echo "Aucune action existe, vous devez me rediriger vers une page par defaut (page d'accueil)";
    require_once 'controllers/controllerCourse.php';
    getAllCourses();
}
