document.getElementById("profileForm").addEventListener("submit", function (event) {
    /*event.preventDefault();
    // You can add validation or processing logic here
    // For demonstration purposes, let's log the form data
    let formData = new FormData(this);
    formData.forEach(function (value, key) {
        console.log(key, value);
    });
    alert("Profile saved successfully!"); // Example alert, replace with actual functionality*/

});

function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

$(document).ready(function () {
    $('#dtExample').DataTable();
})

