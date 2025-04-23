<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="ajax/log.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Crea il tuo profilo!</h1>
    <form action="gestoreRegistrazione.php" method="post">
        username <br>
        <input type="text" name="username" class="login"><br><br>
        password<br>
        <input type="password" name="password" class="login"><br>
        <button type="button" onclick="mostraPassword()">mostra password</button><br><br>

        conferma password<br>
        <input type="password" name="password2" class="login"><br><br>

        data di nascita<br>
        <input type="date" name="dataNascita" class="login"><br><br>

        pfp<br>
        <input type="file" name="pfp" class="login"><br><br>

        <input type="submit" value="Registrati" onclick="controlloValori(event)">
    </form>
</body>
</html>