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
            document.body.innerHTML = `
        <h1>${drink.strDrink}</h1>
        <img src="${drink.strDrinkThumb}" alt="${drink.strDrink}" width="300">
        <p><strong>Categoria:</strong> ${drink.strCategory}</p>
        <p><strong>Istruzioni:</strong> ${drink.strInstructions}</p>
    `;
        } catch (error) {
            console.error("Errore nel recupero del drink:", error);
        }
    }

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
                        div.style.border = "1px solid black";
                        div.style.width = "300px";
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

            }
        }

    }

    //getRandomDrink();
    getAllDrinks();

});