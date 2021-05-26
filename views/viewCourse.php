<!-- view d'ajout d'un nouveau cours -->
<?php
require_once 'header.php';
?>

<div class="text-center">
    <form action="index.php?action=controllerCourse/addOneCourse" method="POST">

        <h2>Ajout d'un nouveau cours</h2>
        <?php require_once 'views/errors.php'; ?>

        <table class="mx-auto">
            <tr>
                <td>Code du cours:</td>
                <td><input type="text" name="courseCode" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td>Titre du cours:</td>
                <td><input type="text" name="courseTitle" size="50" maxlength="150"></td>
            </tr>
            <tr>
                <td>Langue du cours:</td>
                <td><input type="text" name="courseLangage" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="reset" class="my-2" name="effacer" value="effacer"><input type="submit" name="enregistrer" value="enregistrer"></td>
            </tr>
        </table>

    </form>

</div>

<?php require_once 'footer.php'; ?>