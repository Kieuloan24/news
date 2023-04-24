<?php
require('connect.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `banner` WHERE `banner_id`=$id;";
    $result = mysqli_query($conn, $sql);
}
mysqli_close($conn);
header('location:bannerManager.php');
?>