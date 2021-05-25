<!-- Affiche les messages d'erreurs -->
<!DOCTYPE html>
<html lang="fr">
<head>    
    <title>Messages d'erreurs</title>
</head>
<body>
    <center>
        <h4>
            <?php if(isset($message)) echo $message; ?>
            <br><br><br>
        </h4>
    </center>    
</body>
</html>