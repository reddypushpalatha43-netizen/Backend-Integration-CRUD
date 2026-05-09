<?php
include 'db.php';

// ADD USER
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users(name, email)
            VALUES('$name', '$email')";

    mysqli_query($conn, $sql);

    header("Location: index.php");
}

// FETCH USERS
$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD App</title>
</head>
<body>

<h2>Add User</h2>

<form method="POST">

    <input type="text"
           name="name"
           placeholder="Enter Name"
           required>

    <br><br>

    <input type="email"
           name="email"
           placeholder="Enter Email"
           required>

    <br><br>

    <button type="submit" name="submit">
        Add User
    </button>

</form>

<hr>

<h2>User List</h2>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['name']; ?></td>

    <td><?php echo $row['email']; ?></td>

    <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>">
            Edit
        </a>

        |

        <a href="delete.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Delete this user?')">
            Delete
        </a>
    </td>

</tr>

<?php } ?>

</table>

</body>
</html>