<?php

require_once ('connect.php');
$error = false;
$success = false;

if(@$_POST['button']) {
 //if else statment for login. get table name (user ) variable.//
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

<html>
<head>
    <meta charset="UTF-8"> <!-- tell internet to use the latest rendering engine -->
    <meta http-eqiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial- scle = 1">
    <title>Sign in</title>
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
        "Producta Page",
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
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-center">
                <li><a href="home.html">Home</a></li>
                <li><a href="valentine.html">Valentine</a></li>
                <li><a href="Wedding.html">Wedding</a></li>
                <li><a href="unavailable.html">Birthday</a></li>
                <li><a href="unavailable.html">Sympathy</a></li>
                <li><a href="unavailable.html">Graduation</a></li>
                <li><a href="unavailable.html">Just Because</a></li>
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
            <h4 class="modal-title" id="myModalLabel"><i>Login to Blossoms </i></h4>
        </div>
        <div class="modal-body">
            <div class="row">

                <div class="col-xs-6">
                    <p class="lead">Register now for FREE</p>
                    <ul class="list" style="line-height: 2">
                        <li> See all your orders</li>
                        <li> Great gifts for your love ones</li>
                        <li> Fast checkout</li>
                        <li> Beautiful flowers</li>
                    </ul>
                    <p> <a href="signup.html" class="btn btn-info btn-block">Yes please, register now!</a> </p>
                </div>

                <div class="col-xs-6">
                    <div class="well">

                        <!-- Login setup-->
                        <form id="loginForm" method="POST" action="/login/" novalidate="novalidate">
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                <span class="help-block"></span>
                            </div>
                            <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>

                            <button type="submit" class="btn btn-success btn-block">Login</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

</body>
</html>