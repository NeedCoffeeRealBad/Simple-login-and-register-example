<?php
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Главна страница</title>
</head>
<body>
<div class="form">
    <p>Добре дошъл <?php echo $_SESSION['username']; ?>!</p>
    <p><a href="dashboard.php">твоята страница</a></p>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>