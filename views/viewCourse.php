<!-- view d'ajout d'un nouveau cours -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un cours</title>
</head>

<body>

    <form action="index.php?action=controllerCourse/addOneCourse" method="POST">

        <h2>Ajout d'un nouveau cours</h2>

        <table>
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
                <td><input type="reset" name="effacer" value="effacer"><input type="submit" name="enregistrer" value="enregistrer"></td>
            </tr>
        </table>

    </form>

</body>

</html>