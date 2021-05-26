<?php
require_once 'header.php';
?>

<div class="text-center">
    <form action="controllerStudents/connexion" method="POST">

        <h2>Se connecter</h2>
        <?php require_once 'errors.php'; ?>

        <table class="mx-auto">
            <tr>
                <td>Adresse email:</td>
                <td><input type="text" name="mail" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td>Mot de passe:</td>
                <td><input type="password" name="password" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="connexion" value="Se connecter"></td>
            </tr>
        </table>

    </form>
</div>

<?php require_once 'footer.php'; ?>