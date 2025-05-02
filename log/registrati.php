<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
    <link rel="stylesheet" href="../css/regStyle.css">
    <script src="log.js"></script>
</head>
<body>

<div class="container">
    <h2>Registrazione</h2>

    <form id="regForm" action="gestoreRegistrazione.php" method="post">
        <label>Username:
            <input type="text" name="username">
        </label>

        <label>Password:
            <input type="password" name="password">
            <button type="button" id="togglePassword">👁️</button>
        </label>

        <label>Conferma Password:
            <input type="password" name="password2">
        </label>

        <label>Data di nascita:
            <input type="date" name="dataNascita">
        </label>

        <label>Foto profilo:</label>
        <div id="pfpContainer">
            <?php
            $directory = '../img/';
            $images = glob($directory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

            echo '<select name="fotop" id="fotop">';
            echo '<option value="" disabled selected>Seleziona una foto profilo</option>';
            foreach ($images as $image) {
                $imageName = basename($image);
                echo '<option value="' . $imageName . '">' . $imageName . '</option>';
            }
            echo '</select>';
            ?>
        </div>

        <input type="submit" value="Registrati">
    </form>

    <div class="link">
        <label>Hai già un account?</label>
        <a href="login.php">Accedi</a><br><br>
        <label>Torna ai <a href="../index.php">cocktails</a></label>
    </div>
</div>

</body>
</html>
