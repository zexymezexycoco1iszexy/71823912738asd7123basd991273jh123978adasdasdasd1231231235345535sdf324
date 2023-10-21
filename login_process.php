<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_identifier = $_POST['user_identifier'];
    $password = $_POST['password'];

    if (!empty($user_identifier) && !empty($password)) {
        $query = "SELECT * FROM people WHERE userEmail = '$user_identifier' OR userUid = '$user_identifier'";
        $result = mysqli_query($con, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if (password_verify($password, $user_data['userPwd'])) {
                    $_SESSION['user_id'] = $user_data['userUid'];
                    echo 'success'; // Send 'success' response upon successful login
                } else {
                    echo 'Login failed. Please check your email or password.';
                }
            } else {
                echo 'No user with that email or username found.';
            }
        } else {
            echo 'Database error: ' . mysqli_error($con);
        }
    } else {
        echo 'Please enter valid information!';
    }
}
?>
