<?php
//on appel l'entete du site
require_once 'header.php';
?>

<div class="text-center">
    <form action="controllerStudents/addOneStudent" method="POST">

        <h2>Ajout d'un nouveau compte étudiant</h2>
        <h3>Vérification par l'adresse email</h3>
        <?php require_once 'views/errors.php'; ?>

        <table class="mx-auto">
            <tr>
                <td>Code INE:</td>
                <td><input type="text" name="studentINE" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td>Prénom:</td>
                <td><input type="text" name="firstName" size="50" maxlength="150"></td>
            </tr>
            <tr>
                <td>Nom:</td>
                <td><input type="text" name="lastName" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td>Adresse:</td>
                <td><input type="text" name="adress" size="50" maxlength="100"></td>
            </tr>
            <tr>
                <td>Ville:</td>
                <td><input type="text" name="city" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td>Adresse Email:</td>
                <td><input type="text" name="mail" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td>Mot de passe:</td>
                <td><input type="text" name="password" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td>Confirme mot de passe:</td>
                <td><input type="text" name="confirmPassword" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="reset" class="my-2" name="effacer" value="effacer"><input type="submit" name="enregistrer" value="enregistrer"></td>
            </tr>
        </table>

    </form>

</div>

<?php require_once 'footer.php';
