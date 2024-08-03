function validateForm() {
    const name = document.getElementById("name").value;
    const address = document.getElementById("address").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const conpassword = document.getElementById("conpassword").value;
    const phone = document.getElementById("phone").value;
    const profimg = document.getElementById("profimg").value;
    const gender = document.getElementById("gender").value;
    const agree = document.getElementById("agree").checked;
    const nameError = document.getElementById("name-error");

    const addressError = document.getElementById(
        "address-error"
    );
    const emailError = document.getElementById(
        "email-error"
    );
    const passwordError = document.getElementById(
        "password-error"
    );
    const conpasswordError = document.getElementById(
        "conpassword-error"
    );
    const phoneError = document.getElementById(
        "phone-error"
    );
    const profimgError = document.getElementById(
        "profimg-error"
    );
    const genderError = document.getElementById(
        "gender-error"
    );
    const agreeError = document.getElementById(
        "agree-error"
    );

    nameError.textContent = "";
    addressError.textContent = "";
    emailError.textContent = "";
    passwordError.textContent = "";
    conpasswordError.textContent = "";
    phoneError.textContent = "";
    profimgError.textContent = "";
    genderError.textContent = "";
    agreeError.textContent = "";

    let isValid = true;

    if (name === "" || /\d/.test(name)) {
        nameError.textContent =
            "Please enter your name properly.";
        isValid = false;
    }

    if (address === "") {
        addressError.textContent =
            "Please enter your address.";
        isValid = false;
    }

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

    if (password === "" || password.length < 6 || conpassword !== password) {
        conpasswordError.textContent =
            "Conform Password and Password does not Match.";
        isValid = false;
    }

    if (phone === "" || phone.length < 10) {
        passwordError.textContent =
            "Please enter a Contact number with at least 10 characters.";
        isValid = false;
    }

    if (profimg === "") {
        profimgError.textContent =
            "Please enter a file";
        isValid = false;
    }


    if (gender === "") {
        genderError.textContent =
            "Please select your course.";
        isValid = false;
    }

    if (!agree) {
        agreeError.textContent =
            "Please agree to the above information.";
        isValid = false;
    }

    return isValid;
}