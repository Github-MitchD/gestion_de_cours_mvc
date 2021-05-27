<?php
//on appel le modelStudents qui va interagir avec ce controller
require_once 'models/modelStudents.php';
//on appel le modelCourses pour l'afficher une fois l'utilisateur connecté a la session
require_once 'models/modelCourses.php';

/**
 * Fonction qui permet de faire l'insertion si les conditions ont deja été vérifié
 */
function addNewStudent($studentINE, $firstName, $lastName, $adress, $city, $mail, $password)
{
    //on appel la fonction d'ajout du model (addStudent)
    $resultAddStudent = addStudent($studentINE, $firstName, $lastName, $adress, $city, $mail, $password);

    if (!$resultAddStudent) {
        $message = "Un problème est survenu pendant l'ajout d'un étudiant";
    } else {
        $message = "Compte bien crée !";
    }
    require_once 'views/errors.php';
}

/**
 * Fonction qui permet d'ajouter un etudiant apres les tests
 */
function addOneStudent()
{
    if (isset($_POST['enregistrer'])) {

        //si tous les champs sont bien remplis
        if (!empty($_POST['studentINE']) && !empty($_POST['firstName']) && !empty($_POST['lastName'])
            && !empty($_POST['adress']) && !empty($_POST['city']) && !empty($_POST['mail'])
            && !empty($_POST['password']) && !empty($_POST['confirmPassword']))
            {

            //on verifie la validité de l'email
            if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                $message = "L'email n'est pas valide";
            }
            //on verifie la correspondance du password avec confirmPassword
            elseif ($_POST['password'] != $_POST['confirmPassword']) {
                $message = "Les deux mots de passe ne correspondent pas";
            }
            //sinon on verifie que l'adresse email n'est pas deja presente dans la base de données
            else {
                $data = getStudentWithMail($_POST['mail']);
                //si l'email existe dejà dans la base de données
                if ($data) {
                    $message = "Un compte existe déjà avec cette adresse email";
                }
                //si l'email n'est pas presente, on hash le password
                else {
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    //on appel la fonction du model pour ajouter l'etudiant
                    addNewStudent($_POST['studentINE'], $_POST['firstName'], $_POST['lastName'], $_POST['adress'], $_POST['city'], $_POST['mail'], $password);
                }
            }
        }
        //si un ou plusieurs champs ne sont pas remplis
        else {
            $message = "Tous les champs sont requis !";
        }  
    }    
    require_once 'views/viewAddStudent.php';
    require_once 'views/errors.php';
}

/**
 * Fonction qui permet de se connecter
 */
function connexion(){
    //si on a click sur le btn connexion de la view
    if(isset($_POST['connexion'])){
        //on recup les valeurs de mail et password quon met dans une variable
        $mail = $_POST['mail'];
        $password = $_POST['password'];

        //on recup les valeurs de la bdd avec l'email grace a la fonction du modelstudents
        $data = getStudentWithMail($mail);

        //si on a pas de resultat
        if(!$data){
            $message = "Veuillez rentrer une adresse email valide";
        }
        //si on a un resultat, on compare le mot de passe du formulaire avec celui de la bdd
        else {
            $passwordOk = password_verify($password, $data['password']);

            //si les 2 mots de passe sont identique
            if($passwordOk){
                //on demarre la session
                session_start();
                //on met dans la session toutes les valeurs de l'etudiant qu'on recup de la dbb
                $_SESSION['studentId'] = $data['studentId'];
                $_SESSION['studentINE'] = $data['studentINE'];
                $_SESSION['firstName'] = $data['firstName'];
                $_SESSION['lastName'] = $data['lastName'];
                $_SESSION['adress'] = $data['adress'];
                $_SESSION['city'] = $data['city'];
                $_SESSION['mail'] = $mail;
                $_SESSION['password'] = $password;

                //on lui affiche les cours de la plateforme
                $resultGetCourses = getCourses();
                //pour l'affichage du nbr de cours
                $nb_courses = $resultGetCourses->rowCount();
                //on appel la view reservé aux students (sans les btn admin "ajouter,modifier,supprimer")
                require_once 'views/viewAllCoursesStudents.php';
                // echo "Vous êtes bien connecté ". $_SESSION['firstName'];

            }
            //si le password n'est pas valide
            else {
                $message = "Le mot de passe n'est pas correct";
            }
        }
    }
    //si l'etudiant n'est pas deja connecté a la session, on 
    if(!isset($_SESSION['studentId'])){
        require_once 'views/viewConnexion.php';
    }
    require_once 'views/errors.php';
}

/**
 * Fonction qui permet a l'etudiant de se deconnecter d la session
 */
function disconnect(){
    session_start();
    if(isset($_SESSION['studentId'])){
        session_unset();
        session_destroy();
        $message = "Vous êtes bien déconnecté !";
    }
    else {
        $message = "Vous n'êtes pas connecté";
    }
    require_once 'views/errors.php';
}