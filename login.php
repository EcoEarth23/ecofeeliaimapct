<?php
session_start();
$conn = new mysqli("localhost", "root", "", "ecofeeliaimpact");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_email = trim($_POST["username_email"]);
    $password = trim($_POST["password"]);

    // Fetch user details
    $stmt = $conn->prepare("SELECT id, username, email, password FROM clients WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username_email, $username_email);
    $stmt->execute();
    $stmt->store_result();

    // If user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $email, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $username;
            header("Location: https://ecofeelia.netlify.app");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
}
$conn->close();
?>
