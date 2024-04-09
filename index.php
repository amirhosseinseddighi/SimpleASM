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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="src/styles/bootstrap.min.css" rel="stylesheet"/>
    <link href="src/styles/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
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
    </div>
    <script src="src/scripts/bootstrap.min.js"/>
</body>
</html>