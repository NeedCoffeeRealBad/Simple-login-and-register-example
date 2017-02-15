<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
</head>
<body>

<?php
require('connection.php');
if (isset($_REQUEST['username'])){
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con,$username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $trn_date = date("Y-m-d H:i:s");
    $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
    $result = mysqli_query($con,$query);
    if($result){
        echo "<div class='form'>
<h3>регистрацията успешна !!!</h3>
<br/>Кликнете тук <a href='login.php'>за да се впишете</a></div>";
    }
}else{
    ?>
    <div class="form">
        <h1>Registration</h1>
        <form name="регистрация" action="" method="post">
            <input type="text" name="username" placeholder="потребителско име" required />
            <input type="email" name="email" placeholder="мейл" required />
            <input type="password" name="password" placeholder="парола" required />
            <input type="submit" name="submit" value="регистрация" />
        </form>
    </div>
<?php } ?>
</body>
</html>