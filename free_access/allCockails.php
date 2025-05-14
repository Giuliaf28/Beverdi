<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>All Cocktails</title>
  <link rel="stylesheet" href="../css/aCStyle.css" />
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const container = document.getElementById("container");
      const searchBar = document.getElementById("searchBar");

      let debounceTimeout = null;

      function mostraDrinks(drinks) {
        container.innerHTML = "";
        if (!drinks || drinks.length === 0) {
          container.innerHTML = "<p>Nessun cocktail trovato.</p>";
          return;
        }

        for (const drink of drinks) {
          const div = document.createElement("div");
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
      }

      async function getAllDrinks() {
        container.innerHTML = "";
        const alfabeto = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ".split("");
        let allDrinks = [];

        for (const lettera of alfabeto) {
          const url = "https://www.thecocktaildb.com/api/json/v1/1/search.php?f=" + lettera;
          try {
            const response = await fetch(url);
            const data = await response.json();
            if (data.drinks) {
              allDrinks.push(...data.drinks);
            }
          } catch (error) {
            console.error("Errore nel caricamento dei drink:", error);
          }
        }

        mostraDrinks(allDrinks);
      }

      async function cercaCocktail(nome) {
        if (nome.trim() === "") {
          getAllDrinks();
          return;
        }

        const url = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=" + encodeURIComponent(nome);
        try {
          const response = await fetch(url);
          const data = await response.json();
          mostraDrinks(data.drinks);
        } catch (error) {
          container.innerHTML = "<p>Errore durante la ricerca.</p>";
        }
      }

      // Ricerca automatica mentre si digita (con debounce)
      searchBar.addEventListener("input", function () {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => {
          cercaCocktail(searchBar.value);
        }, 200);
      });

      getAllDrinks(); // Carica inizialmente tutti i cocktail
    });
  </script>
</head>

<body>
  <div id="header">
    <a href="../log_only/profilo.php"><label>Accedi al tuo profilo</label></a>
    <h1>All Cocktails</h1>
    <a href="../log/registrati.php"><label>Registrati</label></a>
  </div>

  <input type="text" name="searchBar" id="searchBar" placeholder="Cerca un cocktail..." />
  <div id="container"></div>
</body>
</html>
