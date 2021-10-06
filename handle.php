<?php

include('includes/db.php');

// $_GET - var from php - superglobal mas
// $_POST - var from php - superglobal mas

// print_r($_POST);

$login =  $_POST['login'];
$password = $_POST['password'];

// echo "Your Login: " . $_POST['login'] . '</br>' . "Your password: " . $_POST['password'] . '</br>';

$count = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

if ( mysqli_num_rows($count) == 0)
{
    echo 'User not found / Password wrong';
} else {
    echo 'Welcome beck ' . $login . '</br>';
}



