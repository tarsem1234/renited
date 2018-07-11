<?php
	session_start();
	if(isset($_SESSION['user'])){
		header('location:dashboard.php');
	}
	require('include/template/header.php');
?>

<div class="container">
	
	<div id="login">
	<div class="col-md-5">
	  <div class=" ri-logo text-center"><img src="assest/images/logo.png"> </div>
	    <div class="text-center">
	  <img id="avator" :src="logDetails.avator" /><br>
             <span class="user-type"> {{ logDetails.usertype }} </span>
            </div>
	</div>
		<div class="col-md-6 login-right">
			<h3 class="centered">Login With Renited</h3>
			<div class="panel ">
			  	
			  	<div class="panel-body">
				<label>Account Type:</label><br>
				<el-radio-group ref="usertype" v-model="logDetails.usertype" :value="logDetails.usertype" @input="select($event)">
				  <el-radio-button label="Owner" ></el-radio-button>
				  <el-radio-button label="Employee" ></el-radio-button>
				  <el-radio-button label="Vendor" ></el-radio-button>
				</el-radio-group><Br>
			    	<label>Email:</label>
			    	<input type="text" class="form-control" v-model="logDetails.username" v-on:keyup="keymonitor">
			    	<label>Password:</label>
			    	<input type="password" class="form-control" v-model="logDetails.password" v-on:keyup="keymonitor">
			  	</div>
			  	<div class="panel-footer">
			  		<button class="btn btn-primary" @click="checkLogin();"><span class="glyphicon glyphicon-log-in"></span> Login</button>
			  	</div>
			</div>

			<div class="alert alert-danger text-center" v-if="errorMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-alert"></span> {{ errorMessage }}
			</div>

			<div class="alert alert-success text-center" v-if="successMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-check"></span> {{ successMessage }}
			</div>
               <p>New to renited? <a href="register.php">Sign up</p>
		</div>
	</div>
</div>
<?php require('include/template/script.php'); ?>
<script src="assest/js/login.js"></script>


<?php require('include/template/footer.php'); ?>