function validateForm() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const submit = document.getElementById("captchasubmit").value;
    const image = document.getElementById("image").innerHTML.valueOf;
    const key = document.getElementById("key").innerHTML.valueOf;
    const nameError = document.getElementById("name-error");

    const emailError = document.getElementById(
        "email-error"
    );
    const passwordError = document.getElementById(
        "password-error"
    );
    const captchaError = document.getElementById(
        "captcha-error"
    );

    emailError.textContent = "";
    passwordError.textContent = "";
    captchaError.textContent = "";

    let isValid = true;

    if (email === "" || !email.includes("@")) {
        emailError.textContent =
            "Please enter a valid email address.";
        isValid = false;
    }

    if (password === "" || password.length < 6) {
        passwordError.textContent =
            "Please enter a password with at least 6 characters.";
        isValid = false;
    }

    /*if (key !== "Matched" || submit !== image) {
        captchaError.textContent =
            "Please enter correct captcha.";
        alert('Incorrect captcha please renter correctly.');
        isValid = false;
    }*/

    return isValid;
}


