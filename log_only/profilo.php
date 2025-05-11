<?php
if (!isset($_SESSION))
    session_start();

if (isset($_GET['msg'])) {
    echo "<h1 class=msg>" . $_GET['msg'] . "</h1>";
}

if (!isset($_SESSION['username'])) {
    header("Location: ../log/login.php?msg=Accedi per visualizzare il tuo profilo!");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profStyle.css">
    <title>Benvenuto nel tuo profilo!</title>
    <script src="../log/log.js"></script>
</head>
<script>

</script>
<body>
    <div id="container">

        <?php
        echo "<img src=$_SESSION[pfp] alt=img_profilo style=width: 200px; height: 200px; border-radius: 50%;><br>";
        ?>

        <div id="divModifica">
            <h3>Qui puoi modificare i tuoi dati</h3>

            <form id="profiloForm" action="gestoreProfilo.php" method="post" enctype="multipart/form-data">
                <label>Username:
                    <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>">
                </label><br><br>

                <label>Password corrente:
                    <input type="password" name="currentPassword" id="currentPassword">
                    <button type="button" id="toggleModPassword">👁️</button>
                </label><br><br>

                <label>Nuova Password:
                    <input type="password" name="nuovaPassword">
                </label><br><br>

                <label>Data di nascita:
                    <input type="date" name="dataNascita" value="<?php echo $_SESSION['dataNascita']; ?> min='1900-01-01' max="<?php echo date('Y-m-d'); ?>">
                </label><br><br>

                <label for="fotop">Foto profilo:</label>
                <select name="fotop" id="fotop">
                    <option value="">Scegli una foto profilo</option>
                    <?php
                    $directory = '../img/';
                    $images = ["beer", "champagne", "cocktail", "drink", "man", "man2", "woman", "woman2"];

                    foreach ($images as $image) {
                        echo "<option value='" . $directory . $image . ".png'>" . $image . "</option>";
                    }
                    ?>
                </select>

                <input type="submit" value="Modifica Profilo">
            </form>
        </div>

        <div id="storicoParty">
            <h3>Storico dei Party!</h3>
            <label>Qui puoi trovare tutti i Party che hai salvato</label>
            <a href="mods/creaParty.php"><button>part</button></a>

            <div id="party"></div>
        </div>

        <div id="ricette">
            <h3>Ecco le tue ricette!</h3>
            <a href="mods/creaRicetta.php"><button>ricet</button></a>
        </div>
    </div>
        <a href="../log/logout.php"><button>Logout</button></a>
        <a href="../free_access/allCockails.php"><button>Vai alla home</button></a>
    </div>
</body>

</html>