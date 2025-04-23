// Function to toggle the visibility of the password field
function mostraPassword() {
    var passwordField = document.querySelector('input[name="password"]');
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

document.addEventListener("DOMContentLoaded", function () {
    function controlloValoriLogin(event) {
        var username = document.querySelector('input[name="username"]').value;
        var password = document.querySelector('input[name="password"]').value;

        if (username === "" || password === "") {
            alert("Compila tutti i campi!");
            event.preventDefault(); // Prevent form submission
            return false;
        }
        return true;
    }

    function controlloValoriReg(event) {
        var username = document.querySelector('input[name="username"]').value;
        var password = document.querySelector('input[name="password"]').value;
        var confermaPassword = document.querySelector('input[name="confermaPassword"]').value;

        if (username === "" || password === "" || confermaPassword === "") {
            alert("Compila tutti i campi!");
            event.preventDefault(); // Prevent form submission
            return false;
        }

        if (password !== confermaPassword) {
            alert("Le password non coincidono!");
            event.preventDefault(); // Prevent form submission
            return false;
        }
        return true;
    }
});