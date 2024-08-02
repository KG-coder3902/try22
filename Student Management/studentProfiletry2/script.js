document.addEventListener("DOMContentLoaded", function () {
    // Assuming the profile data is fetched from a PHP script
    fetchProfileData();
});

function fetchProfileData() {
    // Replace 'fetch_profile.php' with your actual PHP script URL
    fetch('fetch_profile.php')
        .then(response => response.json())
        .then(data => {
            displayProfileData(data); // Call function to display profile data
        })
        .catch(error => {
            console.error('Error fetching profile data:', error);
        });
}

function displayProfileData(data) {
    const profileInfo = document.getElementById('profileInfo');

    // Clear any existing content
    profileInfo.innerHTML = '';

    // Create elements to display profile information
    const items = [
        { label: 'Name', value: data.name },
        { label: 'Email', value: data.email },
        { label: 'Contact Number', value: data.phone },
        { label: 'Gender', value: data.gender },
        { label: 'Address', value: data.address }
    ];

    items.forEach(item => {
        const div = document.createElement('div');
        div.classList.add('profile-item');

        const label = document.createElement('span');
        label.classList.add('label');
        label.textContent = `${item.label}:`;

        const value = document.createElement('span');
        value.classList.add('value');
        value.textContent = item.value;

        div.appendChild(label);
        div.appendChild(value);

        profileInfo.appendChild(div);
    });
}
