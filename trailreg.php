<?php
require_once('connect.php');

print_r($_POST);

if(isset($_POST['register'])) {
    register($dbh);


function register($conn) {
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = ($_POST['password']);
    $sql = 'INSERT INTO users (email, firstname, lastname, username, password,) VALUES (?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    try {
        if ($stmt->execute(array($email, $firstname, $lastname, $username, $password,))) {

            echo 'Account Registered';
        }
    }
    catch (PDOException $e) {
        echo $e->getMessage();
        //echo 'Username or Email Already Registered';
    }
}

}

//



?>


<!DOCTYPE html>
<html>
<head>

</head>
<body>
<form method="post" action="">

    <input type="text" name="email" placeholder="Email"/>

    <input type="text" name="firstname" placeholder="First name"/>

    <input type="text" name="lastname" placeholder="Last name"/>

    <input type="text" name="username" placeholder="Username"/>

    <input type="password" name="password" placeholder="Password"/>

    <input type="submit" name="register" value="REGISTER"/>
</form>
</body>
</html>