<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
    <link rel="stylesheet" href="../css/registratiStyle.css">
    <script src="log.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let divPfp = document.getElementById("pfpContainer");
            let images = <?php
            $directory = '../img/';
            $images = glob($directory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
            echo json_encode($images);
            ?>;

            images.forEach(function (image) {
                let imgElement = document.createElement("img");
                imgElement.src = image;
                imgElement.style.width = "100px";
                imgElement.style.height = "100px";
                imgElement.style.margin = "5px";
                imgElement.style.cursor = "pointer";
                imgElement.style.border = "3px solid transparent"; // default

                imgElement.addEventListener("click", function () {
                    // Deseleziona tutte le immagini
                    let allImages = divPfp.querySelectorAll("img");
                    allImages.forEach(img => img.style.border = "3px solid transparent");

                    // Seleziona solo questa immagine
                    this.style.border = "3px solid cornflowerblue";

                    // Salva il valore in un campo nascosto
                    document.getElementById("immagineSelezionata").value = this.src;
                });

                divPfp.appendChild(imgElement);
            });
        });
    </script>
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
                <input type="date" name="dataNascita" min="1900-01-01" max="<?php echo date('Y-m-d'); ?>">
            </label>

            <label for="fotop">Foto profilo:</label>
            <select name="fotop" id="fotop">
                <option value=""></option>
                <?php

                $directory = '../img/';
                $images = ["beer", "champagne", "cocktail", "drink", "man","man2", "woman", "woman2"]; 
                
                foreach ($images as $image) {
                    echo "<option value='" .$directory. $image . ".png'>" .$image. "</option>";
                }
                ?>
            </select>
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