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