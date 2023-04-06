<?php
require('connect.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `account` WHERE `id`=$id;";
    $result = mysqli_query($conn, $sql);
}
mysqli_close($conn);
header('location:accountManager.php');
?>