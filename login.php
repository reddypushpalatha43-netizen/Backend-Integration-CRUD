<?php
session_start();

include 'db.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email='$email'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        if(password_verify(
            $password,
            $row['password']
        )){

            $_SESSION['id'] = $row['id'];

            $_SESSION['name'] = $row['name'];

            $_SESSION['role'] = $row['role_id'];

            header("Location: dashboard.php");

        } else {

            echo "Wrong Password";
        }

    } else {

        echo "User Not Found";
    }
}
?>

<form method="POST">

    Email:
    <input type="email"
    name="email">

    <br><br>

    Password:
    <input type="password"
    name="password">

    <br><br>

    <button type="submit"
    name="login">

        Login

    </button>

</form>