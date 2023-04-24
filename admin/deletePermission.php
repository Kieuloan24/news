<?php
require('connect.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `permission` WHERE `permission_id`=$id;";
    $result = mysqli_query($conn, $sql);
}
mysqli_close($conn);
header('location:permissionManager.php');
?>