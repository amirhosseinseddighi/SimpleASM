<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
include("db.php");
if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit(0);
}

if($_GET['action'] == 'programs') {
?>
        <div id="programs_view">
                <table class="table table-striped table-hover table-condensed small">
                        <tr>
                                <th># ID</th>
                                <th># Program Name</th>
                                <th># Program Type</th>
                                <th># Platform</th>
                                <th># Link</th>
                                <th># Tags</th>
                                <th># Actions</th>
                        </tr>
                        <?php
                                // Fetching Programs from database
                                $stmt = $conn->query("SELECT * FROM `programs`");
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                while($row = $stmt->fetch()) {
                        ?>
                                        <tr>
                                                <td># <?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['program_type']; ?></td>
                                                <td><?php echo $row['platform']; ?></td>
                                                <td><?php echo $row['link']; ?></td>
                                                <td><?php echo $row['tags']; ?></td>
                                                <td>ACTIONS</td>
                                        </tr>
                        <?php
                                }
                        ?>
                </table>
        </div>
<?php
}
if($_GET['action'] == 'subs') {
?>
        <h1> Subdomains</h1>

<?php
} 
if($_GET['action'] == 'logout') { 
        session_destroy();
        header("Location: login.php");
        exit();
}
?>