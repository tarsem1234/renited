<?php
session_start();

require("../config.php");

$out = array('error' => false);

$username = $_POST['username'];
$password = $_POST['password'];
$usertype = $_POST['usertype'];

if($username==''){
	$out['error'] = true;
	$out['message'] = "Email is required";
}
else if($password==''){
	$out['error'] = true;
	$out['message'] = "Password is required";
}
else{
	$sql = "select * from tbl_users where email='$username' and password='$password' and usertype='$usertype'";
	$query = $conn->query($sql);

	if($query->num_rows>0){
		$row=$query->fetch_array();
		$_SESSION['user']=$row['userid'];
		$out['message'] = "Login Successful";
	}
	else{
		$out['error'] = true;
		$out['message'] = "Login Failed. User not Found";
	}
}


	
$conn->close();

header("Content-type: application/json");
echo json_encode($out);
die();


?>