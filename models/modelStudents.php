<?php

//on inclu le fichier qui se connecte à la bdd
require_once 'models/model.php';

/**
 * Fonction qui permet d'ajouter les valeurs dans la table students
 * @param $studentINE, $firstName, $lastName, $adress, $city, $email, $password
 * @return $resultAddStudent
 */
function addStudent($studentINE, $firstName, $lastName, $adress, $city, $email, $password){
    //on initialise la base de données
    $bddPDO = connexionBDD();
    $requete = $bddPDO->prepare('INSERT INTO students(studentINE, firstName, lastName, adress, city, email, password) VALUES (:studentINE, :firstName, :lastName, :adress, :city, :email, :password)');

    $requete->bindValue(':studentINE', $studentINE);
    $requete->bindValue(':firstName', $firstName);
    $requete->bindValue(':lastName', $lastName);
    $requete->bindValue(':adress', $adress);
    $requete->bindValue(':city', $city);
    $requete->bindValue(':email', $email);
    $requete->bindValue(':password', $password);

    $resultAddStudent = $requete->execute();
    
    return $resultAddStudent;
}