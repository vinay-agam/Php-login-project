<?php
session_start();



include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $phone = $_POST['password'];

    // Validate user credentials
    $sql = "SELECT * FROM newreg WHERE email='$email' AND phone='$phone'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // For simplicity, we're assuming the phone number is the password (in a real-world scenario, you should never do this)
        // You should use proper password hashing and verification here
        $password = $row['phone'];

        if ($phone === $password) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $row['id'];
            
            if ($row['role'] == '2') {
                header("Location: admin-welcome.php");
            } else {
                header("Location: user-welcome.php");
            }
            exit();
        } else {
            $login_error = "Invalid credentials";
        }
    } else {
        $login_error = "User not found";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
<style>
form {
    display: flex;
    flex-direction: column;
    background: #dce1f5;
    padding: 40px;
    border-radius: 20px;
    margin-top: 50px;
}input[type="submit"] {
    background: #e966f9c7;
    color: white;
    border: none;
    font-size: 15px;
}
</style>
</head>
<body>

    <form method="post" class="login" action="login.php">
        <h1>Login</h1>
        <?php if (isset($login_error)) { ?>
            <p class="error"><?php echo $login_error; ?></p>
        <?php } ?>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="Login"><a href="index.php">New User</a>
    </form>

</body>
</html>
