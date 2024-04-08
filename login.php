<?php
include("db.php");
session_start();

if(isset($_SESSION['user'])) {
    header("Location: index.php");
    exit(0);
}

if(isset($_POST['username']) && isset($_POST['password'])) {
    $stmt = $conn ->prepare("SELECT * FROM `users` WHERE username=:username AND password=:password");
    $stmt->bindValue(":username",$_POST['username']);
    $stmt->bindValue(":password",$_POST['password']);
    $stmt->execute();
    if($stmt->rowCount() == 1) {
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user = $stmt->fetch();
        $_SESSION['user'] = $user;
        header("Location: index.php");
    }
}
?>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username" placeholder = "Username"/>
        <input type="password" name="password" placeholder="Password"/>
        <input type="submit" name="login_action" value="Login"/>
    </form>
</body>
</html>