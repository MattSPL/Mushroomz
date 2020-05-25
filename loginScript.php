<?php
$username = $_POST['loginField'];
$password = $_POST['passwordFieldLogin'];

if($username!='' && $password!='')
{

$username = stripcslashes($username);
$password = stripcslashes($password);

$link = mysqli_connect("localhost", "root", "", "atlas");

$username = mysqli_real_escape_string($link ,$username);
$password = mysqli_real_escape_string($link ,$password);



$result = mysqli_query($link ,"select * from users where name='$username' and password = '$password'") or die("You Failed!");

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
if($row['name']==$username && $row['password']==$password)
{
    echo "Zalogowano pomyślnie. Nastąpi przeniesienie na stronę główną...";

    setcookie("isLogged", $row['id'] , time() + 3600);

    header("Location: index.php");
}else
{
    echo "Nie udało się zalogować.";
};

}else
{
    header("Location: login.php");
}
?>