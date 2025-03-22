// Show Popup with Overlay
function showPopup(id) {
    document.getElementById("overlay").style.display = "block";
    document.getElementById(id).style.display = "block";
}

// Close Popup and Hide Overlay
function closePopup(id) {
    document.getElementById("overlay").style.display = "none";
    document.getElementById(id).style.display = "none";
}

// Close all popups when overlay is clicked
function closeAllPopups() {
    closePopup("login-popup");
    closePopup("register-popup");
}

// Switch Between Login & Register Popups
function switchPopup(id) {
    closeAllPopups();
    showPopup(id);
}

document.getElementById("login-form").addEventListener("submit", function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    fetch("login.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        if (data.includes("successful")) {
            window.location.href = "dashboard.php"; // Redirect after login
        }
    });
});

document.getElementById("register-form").addEventListener("submit", function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    fetch("register.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
    });
});

