<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();
include("db.php");
if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit(0);
}

?>

<html>
<head>
    <title>Dashboard</title>
    <link href="src/styles/style.css" rel="stylesheet">
</head>
<body>
    <div id="menu">
        <ul>
            <li><a href="?action=programs">Programs</a></li>
            <li><a href="?action=subs">Subs</a></li>
            <li><a href="?action=logout">Log out</a></li>
        <ul>
    </div>
    <div id="content">
        <?php
            if(isset($_GET['action'])) {
                include("dashboard.php");
            }        
        ?>
    </div>
</body>
</html>