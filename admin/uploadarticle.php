<?php

require('connect.php'); 

$target_dir = "Uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image"]["tmp_name"]);

  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Không tồn tại.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
  echo "File quá lớn.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Chỉ nhận file JPG, JPEG, PNG & GIF.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Không thể tải lên.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "File ". htmlspecialchars( basename( $_FILES["image"]["name"])). " đã được tải lên.";
    $title = $_POST['title'];
    $link = $_POST['link'];
    $category_id = $_POST['category'];
    
    $insertAccount= "INSERT INTO `article`(`id_category`,`title`,`images`, `link`) VALUES ('$category_id','$title','$target_file','$link')";
    $result = mysqli_query($conn, $insertAccount);
    mysqli_close($conn);
    header('location:articleManager.php');
  } else {
    echo "Có lỗi trong quá trình tải.";
  }
}
?>
