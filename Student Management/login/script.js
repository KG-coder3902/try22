document.getElementById("loginForm").addEventListener("submit", function (event) {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    if (email.trim() === '' || password.trim().length < 6) {
        event.preventDefault();
        alert("Please enter valid email and password (at least 6 characters).");
    }
});
