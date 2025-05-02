document.addEventListener("DOMContentLoaded", function() {
    const regForm = document.getElementById("regForm");
    const loginForm = document.getElementById("loginForm");
    const toggleRegPassword = document.getElementById("togglePassword");
    const toggleLoginPassword = document.getElementById("toggleLoginPassword");

    if (regForm) {
        regForm.addEventListener("submit", controlloValoriReg);
    }

    if (loginForm) {
        loginForm.addEventListener("submit", controlloValoriLogin);
    }

    if (toggleRegPassword) {
        toggleRegPassword.addEventListener("click", () => mostraPassword("password"));
    }

    if (toggleLoginPassword) {
        toggleLoginPassword.addEventListener("click", () => mostraPassword("password"));
    }

});

function mostraPassword(inputName) {
    var passwordField = document.querySelector(`input[name="${inputName}"]`);
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

function controlloValoriLogin(event) {
    var username = document.querySelector('input[name="username"]').value;
    var password = document.querySelector('input[name="password"]').value;

    if (username === "" || password === "") {
        alert("Compila tutti i campi!");
        event.preventDefault();
        return false;
    }
    return true;
}

function controlloValoriReg(event) {
    var username = document.querySelector('input[name="username"]').value;
    var password = document.querySelector('input[name="password"]').value;
    var confermaPassword = document.querySelector('input[name="password2"]').value;
    var dataNascita = document.querySelector('input[name="dataNascita"]').value;
    
    if (username === "" || password === "" || confermaPassword === "" || dataNascita === "") { 
        alert("Compila tutti i campi!");
        event.preventDefault();
        return false;
    }

    if (password !== confermaPassword) {
        alert("Le password non coincidono!");
        event.preventDefault();
        return false;
    }

    return true;
}
