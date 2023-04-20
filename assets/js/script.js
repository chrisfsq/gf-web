function showRegister() {
    document.getElementById("login-form").style.display = "none";
    document.getElementById("signup-form").style.display = "block";
}

function showLogin() {
    document.getElementById("login-form").style.display = "block";
    document.getElementById("signup-form").style.display = "none";
}

console.log(showLogin);

function saveLogin() {
    const login = document.getElementById("username").value;
    localStorage.setItem("login", login);
}

// Carregar o login e a senha do localStorage
function loadLogin() {
    const login = localStorage.getItem("login");
    if (login) {
        document.getElementById("username").value = login;
        document.getElementById("checkbox").checked = true;
    }
}

// Registrar o evento de clique do checkbox
document.getElementById("checkbox").addEventListener("click", function () {
    if (this.checked) {
        saveLogin();
    } else {
        localStorage.removeItem("login");
    }
});

// Carregar o login e a senha do localStorage quando a página carregar
window.addEventListener("load", function () {
    loadLogin();
});