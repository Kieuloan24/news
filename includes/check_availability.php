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
// code user email availablity
if(!empty($_POST["email"])) {
	$email= $_POST["email"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "Lỗi: Bạn đã nhập một email không hợp lệ.";
	}
	else {
		$sql ="SELECT email FROM subcriber WHERE email=:email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
	echo "<span style='color:red'> Email đã tồn tại </span>";
	echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	echo "<span style='color:green'> Email hợp lệ </span>";
	echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
?>
