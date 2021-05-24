<!-- view d'ajout d'un nouveau cours -->
<?php
require_once 'header.php';

//on affiche les messages d'erreurs
if (isset($message)) echo $message;
?>

<h2>Liste de tous les cours</h2>
<h3>Il y a <?= $nb_courses; ?> cours.</h3>

<div class="dcontainer">
    <center>
        <table class="table table-info table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Code du cours</th>
                    <th scope="col">Titre du cours</th>
                    <th scope="col">Langue du cours</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $ligne = $resultGetCourses->fetchAll(PDO::FETCH_NUM);
                echo "<tr>";
                foreach ($ligne as $valeur) {
                    echo "<th scope='row'>$valeur[0]</th>";
                    echo "<td>$valeur[1]</td>";
                    echo "<td>$valeur[2]</td>";
                    echo "<td>$valeur[3]</td>";
                    echo "</tr>";
                }

                ?>

            </tbody>
        </table>
    </center>
</div>

<?php require_once 'footer.php'; ?>