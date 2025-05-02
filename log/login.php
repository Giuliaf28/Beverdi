<?php
if (!isset($_SESSION)) {
    session_start();
}

$msg = "";
if (isset($_GET['msg'])) {
    $msg = htmlspecialchars($_GET['msg']);
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="log.js" defer></script>
    <link rel="stylesheet" href="../css/regStyle.css">
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <?php if ($msg): ?>
        <div class="msg"><?php echo $msg; ?></div>
    <?php endif; ?>

    <form id="loginForm" action="gestoreLogin.php" method="post">
        <label>Username:
            <input type="text" name="username" required>
        </label>

        <label>Password:
            <input type="password" name="password" required>
            <button type="button" id="toggleLoginPassword" onclick="mostraPassword()">👁️</button>
        </label>

        <input type="submit" value="Accedi">
    </form>

    <div class="link">
        <label>Non hai un account?</label>
        <a href="registrati.php">Registrati</a><br><br>
        <label>Torna ai <a href="../index.php">cocktails</a></label>
    </div>
</div>

</body>
</html>
