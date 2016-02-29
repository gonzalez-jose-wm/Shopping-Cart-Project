<?php
require_once('connect.php');

function login($conn) {
    setcookie('token', "", 0, "/");
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $sql = 'SELECT * FROM users WHERE username = ? AND password = ?';
    $stmt = $conn->prepare($sql);
    if ($stmt->execute(array($username, $password))) {
        $valid = false;
        while ($row = $stmt->fetch()) {
            $valid = true;
            $token = generateToken();
            $sql = 'UPDATE users SET token = ? WHERE username = ?';
            $stmt1 = $conn->prepare($sql);
            if ($stmt1->execute(array($token, $username))) {
                setcookie('token', $token, 0, "/");
                echo 'Login Successful';
            }
        }
        if(!$valid) {
            echo 'Username or Password Incorrect';
        }
    }
}

function register($conn) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $email = $_POST['email'];
    $token = generateToken();
    $sql = 'INSERT INTO users (username, password, email, token) VALUES (?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    try {
        if ($stmt->execute(array($username, $password, $email, $token))) {
            setcookie('token', $token, 0, "/");
            echo 'Account Registered';
        }
    }
    catch (PDOException $e) {
        echo $e->getMessage();
        //echo 'Username or Email Already Registered';
    }
}

function generateToken() {
    $date = date(DATE_RFC2822);
    $rand = rand();
    return sha1($date.$rand);
}

if(isset($_POST['login'])) {
    login($dbh);
}

if(isset($_POST['register'])) {
    register($dbh);
}

?>



<!DOCTYPE html>
<html>
<head>

</head>
<body>
<form method="post" action="">
    <input type="text" name="username" placeholder="Username"/>
    <input type="password" name="password" placeholder="Password"/>
    <input type="submit" name="login" value="LOGIN"/>
</form>
<br>
<form method="post" action="">
    <input type="text" name="username" placeholder="Username"/>
    <input type="password" name="password" placeholder="Password"/>
    <input type="text" name="email" placeholder="Email"/>
    <input type="submit" name="register" value="REGISTER"/>
</form>
</body>
</html>