<!-- view d'ajout d'un nouveau cours -->
<?php
require_once 'header.php';

//on affiche les messages d'erreurs
// if (isset($message)) echo $message;
?>

<h2>Update du cours ayant l'id <?= $data['courseId']; ?></h2>
<!-- <h3>Il y a <?= $nb_courses; ?> cours.</h3> -->

<div class="container">
    <center>

        <form action="controllerCourse/getUpdateCourse/<?= $data['courseId']; ?>" method="POST">

            <h2>Modification du cours</h2>

            <?php require_once 'views/errors.php'; ?>

            <table>
                <tr>
                    <td>Code du cours:</td>
                    <td><input type="text" name="courseCode" size="50" maxlength="50" value="<?= $data['courseCode']; ?>"></td>
                </tr>
                <tr>
                    <td>Titre du cours:</td>
                    <td><input type="text" name="courseTitle" size="50" maxlength="150" value="<?= $data['courseTitle']; ?>"></td>
                </tr>
                <tr>
                    <td>Langue du cours:</td>
                    <td><input type="text" name="courseLangage" size="50" maxlength="50" value="<?= $data['courseLangage']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="reset" class="my-2" name="effacer" value="effacer"><input type="submit" name="update" value="update"></td>
                </tr>
            </table>

            <input type="hidden" name="id" value="<?= $data['courseId']; ?>">

        </form>

    </center>
</div>

<?php require_once 'footer.php';
