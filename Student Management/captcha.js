let captcha;
let boocheck;
function generate() {

    // Clear old input
    document.getElementById("captchasubmit").value = "";

    // Access the element to store
    // the generated captcha
    captcha = document.getElementById("image");
    let uniquechar = "";

    const randomchar =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    // Generate captcha for length of
    // 5 with random character
    for (let i = 1; i < 5; i++) {
        uniquechar += randomchar.charAt(
            Math.random() * randomchar.length)
    }

    // Store generated input
    captcha.innerHTML = uniquechar;
}

function printmsg() {
    const usr_input = document
        .getElementById("captchasubmit").value;

    // Check whether the input is equal
    // to generated captcha or not
    if (usr_input == captcha.innerHTML) {
        let s = document.getElementById("key")
            .innerHTML = "Captcha Matched";
        boocheck = true;
        generate();
    }
    else {
        let s = document.getElementById("key")
            .innerHTML = "Captcha not Matched";
        boocheck = false;
        generate();
    }
}

function checkccaptcha() {
    return boocheck;
}