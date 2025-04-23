<?php
if(!isset($_SESSION))
    session_start();

    if(isset($_GET['msg'])){
        echo "<h1 class=msg>".$_GET['msg']."</h1>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="ajax/log.js"></script>
</head>
<body>
    <h1>Accedi per salvare le tue ricette!</h1>
    <form action="gestoreLogin.php" method="post">
        username <br>
        <input type="text" name="username" class="login"><br><br>

        password<br>
        <input type="password" name="password" class="login"><br>
        <button type="button" onclick="mostraPassword()">mostra password</button>
        <br><br>
        <input type="submit" value="Accedi" onclick="controlloValori(event)">
    </form>
    
</body>
</html>