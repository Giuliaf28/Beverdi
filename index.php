<?php
if (!isset($_SESSION))
    session_start();

if (isset($_GET['msg'])) {
    echo "<h1 class=msg>" . $_GET['msg'] . "</h1>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beverdì</title>
    <link rel="stylesheet" href="css/indexStyle.css">
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            let container = document.getElementById("container");

            async function getRandomDrink() {
                let url = "https://www.thecocktaildb.com/api/json/v1/1/random.php";
                try {
                    let response = await fetch(url);
                    let data = await response.json();
                    let drink = data.drinks[0];

                    console.log(drink); // Mostra il drink nella console
                    // Mostriamo alcune info sulla pagina
                    if (drink) {

                        let div = document.createElement("div");
                        div.className = "drink";

                        div.innerHTML = `
                    <h2>${drink.strDrink}</h2>
                    <img src="${drink.strDrinkThumb}" alt="${drink.strDrink}" width="300">
                `;
                        container.appendChild(div);

                    }
                } catch (error) {
                    console.error("Errore nel recupero del drink:", error);
                }
            }

            for (let index = 0; index < 9; index++) {
                getRandomDrink();
            }

        });
    </script>

</head>

<body>
    <h1>Benvenuto al Beverdì</h1>
    <h3>Qui troverai un quantitativo sufficiente di cockatail per sceglierne uno diverso dal Gin Lemon</h3>
    <label for="">Accedi al tuo profilo</label><a
        href="log/login.php"><button>ACCEDI!</button></a><br>
    <label for="">Non hai un account? </label> <a href="log/registrati.php"><button>REGISTRATI!</button></a><br>
    <div id="container"></div>
    <a href="free_access/allCockails.php"><button>see more</button></a>
</body>

</html>