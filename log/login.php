<?php
if(!isset($_SESSION))
    session_start();

    if(isset($_GET['msg'])){
        echo "<h1 class=msg>".$_GET['msg']."</h1>";
    }
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="log.js"></script>
</head>
<body>

<h2>Login</h2>

<form id="loginForm" action="gestoreLogin.php" method="post">
    <label>Username:
        <input type="text" name="username">
    </label><br><br>

    <label>Password:
        <input type="password" name="password">
        <button type="button" id="toggleLoginPassword" onclick="mostraPassword()">👁️</button>
    </label><br><br>

    <input type="submit" value="Accedi">
</form>

</body>
</html>
