<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email']; // Change to 'user_email' to match the form field
    $password = $_POST['password'];

    if (strlen($user_name) < 2) {
        echo "Username must be at least 2 characters long.";
    } elseif (!empty($user_name) && !empty($user_email) && !empty($password)) {
        // Check if the username is already taken
        $query = "SELECT * FROM people WHERE userName = '$user_name' OR userEmail = '$user_email'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "The username or email you entered has already been taken. Please choose another.";
        } else {
            // Generate a secure hash of the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Generate a unique user ID
            $user_id = uniqid();

            // Save to the "people" table
            $query = "INSERT INTO people (userName, userEmail, userPwd, userUid) VALUES ('$user_name', '$user_email', '$hashed_password', '$user_id')";

            if (mysqli_query($con, $query)) {
                header("Location: index.php");
                die();
            } else {
                echo "Database error: " . mysqli_error($con);
            }
        }
    } else {
        echo "Please enter valid information!";
    }
}
?>
