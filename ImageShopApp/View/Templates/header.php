<!DOCTYPE html>
<html lang="en">
<head>
    <title>Image Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        body, html {
            height: 100%;
        }
        .bg {
            /* The image used */
            background-image: url("/background.jpeg");
            /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        ul, a {
            color: black;
            font-size: 2vh;
        }
    </style>
</head>
<body>
<div class="bg"
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" style="font-size: 5vh; color: black" href="/">Image Shop</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php session_start(); if (isset($_SESSION['user'])) : ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">My Profile
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="user/showUploads">My products</a></li>
                        <li><a href="user/showOrders">My orders</a></li>
                        <li><a href="user/showProfile">Account</a></li>
                    </ul>
                </li>
                <li><a href="/product/upload">Upload image</a></li>
                <li><a href="/user/logout">Logout</a></li>
            <?php else : ?>
                <li><a href="/user/login">Login</a></li>
                <li><a href="/user/register">Register</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>