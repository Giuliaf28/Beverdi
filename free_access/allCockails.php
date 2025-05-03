<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Cocktails</title>
    <link rel="stylesheet" href="../css/aCStyle.css">
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            let container = document.getElementById("container");
            let btnRicerca = document.getElementById("btnRicerca");
            let searchBar = document.getElementById("searchBar");
            async function getAllDrinks() {
                let alfabeto = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split("");

                for (const lettera of alfabeto) {
                    let url = "https://www.thecocktaildb.com/api/json/v1/1/search.php?f=" + lettera;
                    try {

                        let response = await fetch(url);
                        let data = await response.json();
                        let drinks = data.drinks;

                        console.log(drinks); // Mostra i drink nella console
                        if (drinks) {
                            for (const drink of drinks) {
                                let div = document.createElement("div");
                                div.className = "drink";
                                div.id = drink.idDrink;
                                div.addEventListener("click", function () {
                                    window.location.href = "../log_only/cocktail.php?id=" + drink.idDrink;
                                });

                                div.innerHTML = `
                            <h2>${drink.strDrink}</h2>
                            <img src="${drink.strDrinkThumb}" alt="${drink.strDrink}" width="300">
                        `;
                                container.appendChild(div);
                            }
                        } else {
                            console.log("Nessun drink trovato per la lettera " + lettera);
                        }
                    } catch (error) {
                        console.error("Errore durante il recupero dei dati:", error);
                    }
                }

            }

            btnRicerca.addEventListener("click", function () {
                let searchValue = searchBar.value.toLowerCase();
                let drinks = document.querySelectorAll(".drink");

                drinks.forEach(drink => {
                    let drinkName = drink.querySelector("h2").innerText.toLowerCase();
                    if (drinkName.includes(searchValue)) {
                        drink.style.display = "block";
                    } else {
                        drink.style.display = "none";
                    }
                });
            });
            getAllDrinks();



        });


    </script>
</head>

<body>
    <div id="header">

        <a href="../log_only/profilo.php"><label for="">Accedi la tuo profilo</label></a>
        <h1>All Cocktails</h1>
        <a href="../log/registrati.php"><label for="">Registrati</label></a>
    </div>

    <input type="text" name="searchBar" id="searchBar" placeholder="Cerca un cocktail..."><button
        id="btnRicerca">cerca</button>
    <div id="container">

    </div>
</body>

</html>