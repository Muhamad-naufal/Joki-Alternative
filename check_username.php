<?php
include 'proccess/config.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];

    // Server-side validation for username
    if (!preg_match('/^(?=.*[a-z])(?=.*\d)(?=.*[\W_])[^\s]+$/', $username)) {
        echo 'invalid';
        exit();
    }

    $sql_check = "SELECT * FROM `user` WHERE `user_name` = '$username'";
    $result = mysqli_query($Connection, $sql_check);

    if (mysqli_num_rows($result) > 0) {
        echo 'taken';
    } else {
        echo 'available';
    }

    mysqli_close($Connection);
}
