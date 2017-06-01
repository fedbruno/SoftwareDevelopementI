<?php
session_start();

if ($_SESSION['admin']) {
    echo "<h1>Administrative Interface</h1>\n";
    echo "Welcome user ".$_SESSION['login_user'].", it's nice to have you here!\n<br>";
        echo "<br>";
    echo "<a href=admin_users.php>Manage Users</a><br>\n";
    echo "<a href=admin_dorms.php>Manage Dorms</a><br>\n";
    echo "<a href=admin_reservations.php>Manage Reservations</a><br>\n";
    //print_r($_SESSION);
        echo "<br>";
} else {
    header('location:index.php?message=You%20do%20not%20have%20access%20to%20this%20admin%20page.');
}
?>