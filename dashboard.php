<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
}
?>

<h2>
Welcome
<?php echo $_SESSION['name']; ?>
</h2>

<?php

if($_SESSION['role'] == 1){

    echo "<h3>Admin Panel</h3>";

} else {

    echo "<h3>User Panel</h3>";
}
?>

<a href="index.php">
Manage Users
</a>

<br><br>

<a href="profile.php">
My Profile
</a>

<br><br>

<a href="logout.php">
Logout
</a>