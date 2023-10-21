<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.login-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.error-message {
    color: red;
    margin: 10px 0;
}

input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.login-button {
    background-color: #007BFF;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

    </style>
    <div class="login-container">
        <h1>Login</h1>
        <div id="error-message" class="error-message"></div>
        <form id="login-form" method="post">
            <input type="text" name="user_identifier" id="user-identifier" placeholder="Email or Username" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#login-form').on('submit', function(e) {
                e.preventDefault();
                let user_identifier = $('#user-identifier').val();
                let password = $('#password').val();
                
                $.ajax({
                    type: 'POST',
                    url: 'login_process.php',
                    data: {
                        user_identifier: user_identifier,
                        password: password
                    },
                    success: function(response) {
                        if (response === 'success') {
                            window.location.href = 'index.php'; // Redirect to index.php upon successful login
                        } else {
                            $('#error-message').html(response);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
