<!-- Model pour les students -->
<?php

//on inclu le fichier qui se connecte à la bdd
require_once 'models/model.php';

/**
 * Fonction qui permet d'ajouter les valeurs dans la table students
 * @param $studentINE, $firstName, $lastName, $adress, $city, $email, $password
 * @return $resultAddStudent
 */
function addStudent($studentINE, $firstName, $lastName, $adress, $city, $mail, $password){
    //on initialise la base de données
    $bddPDO = connexionBDD();
    $requete = $bddPDO->prepare('INSERT INTO students(studentINE, firstName, lastName, adress, city, mail, password) VALUES (:studentINE, :firstName, :lastName, :adress, :city, :mail, :password)');

    $requete->bindValue(':studentINE', $studentINE);
    $requete->bindValue(':firstName', $firstName);
    $requete->bindValue(':lastName', $lastName);
    $requete->bindValue(':adress', $adress);
    $requete->bindValue(':city', $city);
    $requete->bindValue(':mail', $mail);
    $requete->bindValue(':password', $password);

    $resultAddStudent = $requete->execute();
    
    return $resultAddStudent;
}

/**
 * Fonction qui verifie si l'email est déjà existant dans la bdd
 * @param $mail
 * @return $data
 */
function getStudentWithMail($mail){
    //on initialise la base de données
    $bddPDO = connexionBDD();

    $requete = "SELECT * FROM students WHERE mail = '$mail'";
    $result = $bddPDO->query($requete);

    //on recupere dans un tableau associatif
    $data = $result->fetch(PDO::FETCH_ASSOC);

    return $data;
}