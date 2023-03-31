<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion à la base de données</title>
</head>
<body>
    <h1>Connexion à la base de données</h1>
    <form action="" method="POST">
        
        <div>
            <label for="dbname">Nom de la base de données :</label>
            <input type="text" name="dbname" id="dbname" autocomplete="off" required>
        </div>
        <div>
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" name="username" id="username" autocomplete="off" required>
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <input type="submit" value="Se connecter">
        </div>
    </form>
</body>
</html>
