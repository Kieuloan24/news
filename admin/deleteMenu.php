<?php
require('connect.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `menu` WHERE `menu_id`=$id;";
    $result = mysqli_query($conn, $sql);
}
mysqli_close($conn);
header('location:menuManager.php');
?>