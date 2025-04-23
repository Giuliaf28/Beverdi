<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="../ajax/log.js" defer></script>
</head>
<body>

<h2>Login</h2>

<form id="loginForm" action="login_check.php" method="post">
    <label>Username:
        <input type="text" name="username">
    </label><br><br>

    <label>Password:
        <input type="password" name="password">
        <button type="button" id="toggleLoginPassword">👁️</button>
    </label><br><br>

    <input type="submit" value="Accedi">
</form>

</body>
</html>
