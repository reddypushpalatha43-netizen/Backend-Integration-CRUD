<?php
session_start();

include 'db.php';

$id = $_SESSION['id'];

$sql = "SELECT * FROM users
        WHERE id=$id";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>

<h2>My Profile</h2>

<img src="uploads/<?php
echo $row['profile_pic'];
?>"

width="100">

<br><br>

Name:
<?php echo $row['name']; ?>

<br><br>

Email:
<?php echo $row['email']; ?>