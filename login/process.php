<?php 

	$username= $_POST['user'];
	$password = $_POST['pass'];
	
    $username = stripcslashes($username); 
    $password = stripcslashes($password); 
 

//connect
$con =mysqli_connect("localhost", "root", "", "login");
$username = mysqli_real_escape_string( $con, $username);
$password = mysqli_real_escape_string($con, $password);

if (mysqli_connect_errno()){
	echo "faild to connect to mysql: ".mysqli_connect_errno();
}
 //query
$result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND password = '$password'") or die ("failed to query database".mysqli_error($con));
$row = mysqli_fetch_array($result);

if ($row['username'] == $username && $row['password'] == $password){
	echo "Your Login Success!! Welcome ".$row['username'];
}else{
	echo "Failed To Login ";
}


?>