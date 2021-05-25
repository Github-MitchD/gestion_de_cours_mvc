<!-- view d'ajout d'un nouveau cours -->
<?php
require_once 'header.php';

//on affiche les messages d'erreurs
if (isset($message)) echo $message;
?>

<h2>Suppression du cours ayant l'id <?= $data['courseId']; ?></h2>
<!-- <h3>Il y a <?= $nb_courses; ?> cours.</h3> -->

<div class="container">
    <center>

        <form action="controllerCourse/getDeleteCourse/<?= $data['courseId']; ?>" method="POST">

            <h2>Suppression du cours</h2>

            <table>
                <tr>
                    <td>Code du cours:</td>
                    <td><?= $data['courseCode']; ?></td>
                </tr>
                <tr>
                    <td>Titre du cours:</td>
                    <td><?= $data['courseTitle']; ?></td>
                </tr>
                <tr>
                    <td>Langue du cours:</td>
                    <td><?= $data['courseLangage']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="delete" value="supprimer"></td>
                </tr>
            </table>

            <input type="hidden" name="id" value="<?= $data['courseId']; ?>">

        </form>

    </center>
</div>

<?php require_once 'footer.php';
