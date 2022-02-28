<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = "admin-panel";

$conn = mysqli_connect("$host","$user","$password","$database");


if(!$conn){
    // header("Location: ../errors/dberror.php");
    die(mysqli_connect_error($conn));
}
// else{
//     echo "done";
// }

?>