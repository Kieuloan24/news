<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','tintuc');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>
<?php 
session_start();
error_reporting(0);
include('connect.php');
if(isset($_POST['signup']))
{
$subcriber_id= $hits[0];   
$name=$_POST['name'];
$phonenumber=$_POST['phonenumber'];
$email=$_POST['email']; 
$password=md5($_POST['password']); 
$status=1;
$sql="INSERT INTO `subcriber`(`subcriber_id`, `name`, `phonenumber`, `email`, `password`, `status`) VALUES(:subcriber_id, :name, :phonenumber, :email, :password, :status)";
$query = $dbh->prepare($sql);
$query->bindParam(':subcriber_id',$subcriber_id,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':phonenumber',$phonenumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo '<script>alert("Đăng ký thành công")</script>';
}
else 
{
echo "<script>alert('Đã xảy ra sự cố. Vui lòng thử lại');</script>";
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>NEWS - TỔNG HỢP TIN TỨC</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style2.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript">
    function valid()
    {
    if(document.signup.password.value!= document.signup.confirmpassword.value)
    {
    alert("Mật khẩu không khớp  !!");
    document.signup.confirmpassword.focus();
    return false;
    }
    return true;
    }
    </script>
    <script>
    function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
    url: "check_availability.php",
    data:'email='+$("#email").val(),
    type: "POST",
    success:function(data){
    $("#user-availability-status").html(data);
    $("#loaderIcon").hide();
    },
    error:function (){}
    });
    }
    </script>    
</head>
<body>
    <!------MENU SECTION START-->
    <?php include('header.php');?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">ĐĂNG KÝ TÀI KHOẢN</h4>
                </div>
            </div>
            <!--LOGIN PANEL START-->           
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
                    <div class="panel panel-info">
                    <div class="panel-heading">ĐĂNG KÝ</div>
                        <div class="panel-body">
                        <form name="signup" method="post" onSubmit="return valid();">
                                <div class="form-group">
                                    <label>Họ tên</label>
                                    <input class="form-control" type="text" name="name" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại </label>
                                    <input class="form-control" type="text" name="phonenumber" maxlength="10" autocomplete="off" required />
                                </div>                           
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" id="email" onBlur="checkAvailability()"  autocomplete="off" required  />
                                    <span id="user-availability-status" style="font-size:12px;"></span> 
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input class="form-control" type="password" name="password" autocomplete="off" required  />
                                </div>
                                <div class="form-group">
                                    <label>Xác nhận mật khẩu </label>
                                    <input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
                                </div>
                                <button type="submit" name="signup" class="btn btn-danger" id="submit">Đăng ký ngay </button> | <a href="login.php">Quay lại</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
            <!---LOGIN PABNEL END-->            
        </div>
    </div>
    <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
