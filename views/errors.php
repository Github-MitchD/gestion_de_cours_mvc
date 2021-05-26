<!-- Affiche les messages d'erreurs -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Messages d'erreurs</title>
</head>

<body>
    <center>
        <h4 style="color: red">
            <?php if (isset($message)) echo $message; ?>
        </h4>
        <h4 style="color: green;">
            <?php if (isset($messageVert)) echo $messageVert; ?>
        </h4>
    </center>
</body>

</html>