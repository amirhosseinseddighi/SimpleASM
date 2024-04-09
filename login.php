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
    <link rel="stylesheet" href='src/styles/user.css'>
</head>
<body>

    <div class="wrapper">
      <div class="title">Login Form</div>
      <form action="" method="post">
        <div class="field">
          <input type="text" required name="username" id="username">
          <label>Username</label>
        </div>
        <div class="field">
          <input type="password" required name="password" id="pass1">
          <label>Password</label>
        </div>
        <div class="content">
         </div>
        <div class="field">
          <input class="submit" name="login_action" type="submit" value="Login">
        </div>
</div>
      </form>
    </div>

</body>
</html>
