<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Вход</title>
</head>
<body>
<?php
require('connection.php');
session_start();
if (isset($_POST['username']))
{
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $query = "SELECT * FROM `users` WHERE username='$username'
    and password='".md5($password)."'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    if($rows==1)
    {
        $_SESSION['username'] = $username;
        header("Location: index.php");
    }
    else
    {
        echo "<div class='form'>
<h3>Невалидно потребителско име ИЛИ парола</h3>
<br/>Кликнете тук за <a href='login.php'>вход</a></div>";
    }
}else
{
    ?>
    <div class="form">
        <h1>вход</h1>
        <form action="" method="post" name="login">
            <input type="text" name="username" placeholder="потребителско име" required />
            <input type="password" name="password" placeholder="парола" required />
            <input name="submit" type="submit" value="вход" />
        </form>
        <p>Нямате регистрация ? <a href='registration.php'>Кликнете тук</a></p>
    </div>
<?php
}
?>
</body>
</html>