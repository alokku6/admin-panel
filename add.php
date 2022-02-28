<?php
session_start();
include('config/config.php');
// ADDITATION OPERATION



if (isset($_POST['adduser'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if ($password == $confirmpassword) {

        $sql = "INSERT INTO `users`(`name`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$password')";

        $result = mysqli_query($conn, $sql);

        if ($sql) {
            $_SESSION['status'] = "User Added Successfully";
            header('Location: registered.php');
        } else {
            $_SESSION['status'] = "User failed";
            header('Location: registered.php');
        }
    } else {
        $_SESSION['status'] = "Password and comfirm Passowrd dose not match!";
        header('Location: registered.php');
    }
}

// UDATATION OPERATION

if (isset($_POST['updateuser'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql2 = "UPDATE `users` SET `name`='$name',`email`='$email',`phone`='$phone',`password`='$password' WHERE id='$id'";

    $result2 = mysqli_query($conn, $sql2);

    if ($result2) {
        $_SESSION['status'] = "User Updated Successfully";
        header('Location: registered.php');
    } else {
        $_SESSION['status'] = "User Updatation failed";
        header('Location: registered.php');
    }
}


//  USER DELETATION

if (isset($_POST['detelebtn'])) {
    $id = $_POST['delete_id'];

    $sql3 = "DELETE FROM `users` WHERE id='$id'";
    $result3 = mysqli_query($conn, $sql3);

    if ($result3) {
        $_SESSION['status'] = "User Deleted Successfully";
        header('Location: registered.php');
    } else {
        $_SESSION['status'] = "User Deletation failed";
        header('Location: registered.php');
    }
}
