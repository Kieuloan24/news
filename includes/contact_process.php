<?php
require ('connect.php');

if (isset($_POST['name'])) {
    
    $name = $_POST['name'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $insertContact = "INSERT INTO `contact`(`name`, `message`, `subject`, `email`) VALUES ('$name','$message','$subject','$email');";
    $result = mysqli_query($conn, $insertContact);
    mysqli_close($conn);
    header('location:contact.php');
}