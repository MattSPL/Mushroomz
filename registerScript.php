<?php

$username = $_POST['loginField'];
$email = $_POST['emailField'];
$password = $_POST['passwordField'];
$repeatedPassword = $_POST['repeatPasswordField'];
$codeGenerated = $_POST['codeGen'];
$codeFromField = $_POST['codeField'];


$username = stripcslashes($username);
$password = stripcslashes($password);
$email = stripcslashes($email);

$link = mysqli_connect("localhost", "root", "", "atlas");

$username = mysqli_real_escape_string($link ,$username);
$password = mysqli_real_escape_string($link ,$password);
$email = mysqli_real_escape_string($link, $email);

$tempDBName = mysqli_query($link, "select name from users where name='$username'");
$usernameIfExists = mysqli_fetch_array($tempDBName, MYSQLI_ASSOC);

if($usernameIfExists['name']!=$username)
{
    $result = mysqli_query($link ,"INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, '$username', '$email', '$password')") or die("You Failed!");
    setcookie("isLogged", $username , time() + 3600);
    // echo 'Zarejestrowano pomyślnie. Witaj w klubie grzybiarza Opieńka! Za chwilę zostaniesz przekierowany na stronę główną...';
   header("Location: index.php");
  
}else{
    header("Location: register.php");
}





?>