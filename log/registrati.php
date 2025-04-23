<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
    <script src="../ajax/log.js" defer></script>
</head>
<body>

<h2>Registrazione</h2>

<form id="regForm" action="gestoreRegistrazione.php" method="post">
    <label>Username:
        <input type="text" name="username">
    </label><br><br>

    <label>Password:
        <input type="password" name="password">
        <button type="button" id="togglePassword">👁️</button>
    </label><br><br>

    <label>Conferma Password:
        <input type="password" name="password2">
    </label><br><br>

    <label>Data di nascita:
        <input type="date" name="dataNascita">
    </label><br><br>

    <label>Foto profilo:
        <input type="file" name="fotop" accept=".jpg, .jpeg, .png">
    </label><br><br>

    <input type="submit" value="Registrati">
</form>

</body>
</html>
