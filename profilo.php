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
    
    <title>Benvenuto nel tuo profilo!</title>
</head>
<body>
    <div id="container">

    <img src="img/default.png" alt="img_profilo" style="width: 200px; height: 200px; border-radius: 50%;"><br>
    <h3>Qui puoi modificare i tuoi dati</h3>

    <form id="profiloForm" action="gestoreProfilo.php" method="post" enctype="multipart/form-data">
        <label>Username:
            <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>">
        </label><br><br>

        <label>Password:
            <input type="password" name="password">
            <button type="button" id="togglePassword">👁️</button>
        </label><br><br>

        <label>Conferma Password:
            <input type="password" name="password2">
        </label><br><br>

        <label>Data di nascita:
            <input type="date" name="dataNascita" value="<?php echo $_SESSION['dataNascita']; ?>">
        </label><br><br>

        <label>Foto profilo:
            <input type="file" name="fotop" accept=".jpg, .jpeg, .png">
        </label><br><br>

        <input type="submit" value="Modifica Profilo">
    </form>
    </div>
</body>
</html>