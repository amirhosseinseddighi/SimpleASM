<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
include("db.php");
if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit(0);
}

if($_GET['action'] == 'programs') {
?>
        <h1> Programs </h1>
<?php
}
if($_GET['action'] == 'subs') {
?>
        <h1> Subdomains</h1>

<?php
} 
?>