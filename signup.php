<?php
require_once ('connect.php');
$error = false;
$success = false;

if(@$_POST['button']) {

    $stmt = $dbh->prepare('INSERT INTO users (
        email,
        firstname,
        lastname,
        username,
        password)

        VALUES (
        :email,
        :firstname,
        :lastname,
        :username,
        :password)');

$result = $stmt->execute(
    array(
        'email' =>$_POST['email'],
        'firstname' =>$_POST['firstname'],
        'lastname' =>$_POST['lastname'],
        'username' =>$_POST['username'],
        'password' =>$_POST['password'],
    )
);
    if ($result) {
        $success = $_POST['username'] . " was successfully saved.";
    } else {
        "There is a problem bro " . $_POST['username'];
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- tell internet to use the latest rendering engine -->
    <meta http-eqiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial- scle = 1">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="loginstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(function() {
            var availableTags = [
                "About",
                "Check Out",
                "Cart",
                "Contact Info",
                "Frequently Asked Question",
                "Personal Profile",
                "Products Page",
                "Home",
                "Valentine",
                "Wedding",
                "Birthday",
                "Sympathy",
                "Graduation",
                "Just Because",
            ];
            $( "#tags" ).autocomplete({
                source: availableTags
            });
        });
    </script>
</head>


<nav class="navbar navbar-default">
    <div class="container-fluid">

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-center">
                <li><a href="home.html">Home</a></li>
                <li><a href="valentine.html">Valentine</a></li>
                <li><a href="Wedding.html">Wedding</a></li>
                <li><a href="birthday.html">Birthday</a></li>
                <li><a href="sympathy.html">Sympathy</a></li>
                <li><a href="graduation.html">Graduation</a></li>
                <li><a href="just.html">Just Because</a></li>
                <li><a href="cart.html">Cart <span class='glyphicon glyphicon-shopping-cart'></span></a></li>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Other <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="about.html">About</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="faq.html">Frequently Asked Questions</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </li>
            </ul>

            <form class="navbar-form navbar-right" role="search" method="post" action="search.php">
                <div class="ui-widget">
                    <label for="tags"> </label>
                    <input id="tags" name="search" class="form-control">
                    <button type="submit" class="btn btn-default">Search</button>
                </div>

            </form>
        </div>
    </div>

</nav>

<div id="login-overlay" class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"><i>Sign up to Blossoms </i></h4>
        </div>

        <div class="modal-body">

            <div class="row">

                <div class="col-lg-12">

                    <div class="well">

                        <h2>Sign Up!</h2>

                        <img src="blossoms.png" style="width: 220px;float: right;margin-right: 26px;">

                        <form method="post" name="signup" style="margin-top: 10px;">

                            <label>First Name</label><br>

                            <input type="text" name="firstname" class="span3"><br>

                            <label>Last Name</label><br>

                            <input type="text" name="lastname" class="span3"><br>

                            <label>Email Address</label><br>

                            <input type="text" name="email" class="span3"><br>

                            <label>Username</label><br>

                            <input type="text" name="username" class="span3"><br>

                            <label>Password</label><br>

                            <input type="password" name="password" class="span3" style="margin-bottom: 10px;"><br>

                            <label><input type="checkbox" name="terms"> I agree with the <a href="https://termsfeed.com/legal/terms-of-use">Terms and Conditions</a>.</label>

                            <input type="submit" value="Sign up" name="button" class="btn btn-primary pull-right" style="margin-bottom: 10px; margin-right: 20px;">

                            <div class="clearfix"></div>

                        </form>

                        <div class="panel-footer" style="margin-top: 10px;">
                            Already have an account? <a href="signin.html" onClick=""> Sign in Here </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>