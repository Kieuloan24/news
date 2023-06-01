<?php
require('connect.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `article` WHERE `id`=$id;";
    $result = mysqli_query($conn, $sql);
}
mysqli_close($conn);
header('location:articleManager.php');
?>