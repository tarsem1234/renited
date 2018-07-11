<?php

require("../config.php");

$out = array('error' => false, 'firstname'=> false, 'lastname'=> false, 'email'=> false, 'password' => false , 'company' => false , 'phone' => false);

$action = 'read';

if(isset($_GET['action'])){
	$action = $_GET['action'];
}


if($action == 'read'){
	$sql = "select * from tbl_users";
	$query = $conn->query($sql);
	$users = array();

	while($row = $query->fetch_array()){
		array_push($users, $row);
	}

	$out['users'] = $users;
}

if($action == 'register'){

	function check_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	$usertype  = check_input($_POST['usertype']);
    $firstname  = check_input($_POST['firstname']);
	$lastname  = check_input($_POST['lastname']);
	$email = check_input($_POST['email']);
	$password = check_input($_POST['password']);
	$company = check_input($_POST['company']);
	$phone = check_input($_POST['phone']);

     if($usertype==''){
		$out['usertype'] = true;
		$out['message'] = "User Type  is required";
	}
    elseif($firstname==''){
		$out['firstname'] = true;
		$out['message'] = "First Name  is required";
	}
	elseif($lastname==''){
		$out['lastname'] = true;
		$out['message'] = "Last Name is required";
	}

	elseif($email==''){
		$out['email'] = true;
		$out['message'] = "Email is required";
	}
	
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$out['email'] = true;
		$out['message'] = "Invalid Email Format";
	}

	elseif($password==''){
		$out['password'] = true;
		$out['message'] = "Password is required";
	}
	elseif($company==''){
		$out['company'] = true;
		$out['message'] = "Company is required";
	}
	elseif($phone==''){
		$out['phone'] = true;
		$out['message'] = "Phone is required";
	}

	else{
		$sql="select * from tbl_users where email='$email'";
		$query=$conn->query($sql);
		
		if($query->num_rows > 0){
			$out['email'] = true;
			$out['message'] = "Email already exist";
		}

		else{
			$sql = "insert into tbl_users (email, password , firstname , lastname , company , phone , usertype ) values ('$email', '$password' , '$firstname' , '$lastname' , '$company' , '$phone' , '$usertype')";
			$query = $conn->query($sql);

			if($query){
				$out['message'] = "User Added Successfully";
			}
			else{
				$out['error'] = true;
				$out['message'] = "Could not add User";
			}
		}
	}
}

$conn->close();

header("Content-type: application/json");
echo json_encode($out);
die();


?>