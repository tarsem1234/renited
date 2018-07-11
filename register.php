<?php
session_start();
	if(isset($_SESSION['user'])){
		header('location:dashboard.php');
	}
 require('include/template/header.php'); ?>
<div class="container register_cont">
<div id="register">
<template>
     <div class=" ri-logo text-center"><img src="assest/images/logo.png"> </div>
	 <p id="slogan">A real-time SaaS ERP platform for tomorrow's small business. </p>
	<div id="type-select" class="centered">
        <el-row :gutter="20">
          <el-col :class="{ selected: regDetails.usertype==='Owner' }" :span="8">
            <div @click="select('Owner')">
              <img src="assest/images/login-owner.png" alt="" title="">
              <div class="type-name">Owner</div>
            </div>
          </el-col>
          <el-col :class="{ selected: regDetails.usertype==='Employee' }" :span="8">
            <div @click="select('Employee')">
              <img src="assest/images/login-employee.png" alt="" title="">
              <div class="type-name">Employee</div>
            </div>
          </el-col>
          <el-col :class="{ selected: regDetails.usertype==='Vendor' }" :span="8">
            <div @click="select('Vendor')" >
              <img src="assest/images/login-vendor.png" alt="" title="">
              <div class="type-name">Vendor</div>
            </div>
          </el-col>
        </el-row>
      </div>
      <div id="buttons">
        <a href="index.php" > <el-button type="primary">Login</el-button> </a>
          <a href="#signup"><el-button type="primary">Signup</el-button></a>
      </div>
	
		<div class="col-md-12 sign_up"  >	
			<div class="panel panel-primary"> 
			  	<div class="panel-body">
				<div class="alert alert-danger text-center" v-if="errorMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-alert"></span> {{ errorMessage }}
			</div>

			<div class="alert alert-success text-center" v-if="successMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-check"></span> {{ successMessage }}
			</div>
			<h3 class="centered">Sign Up</h3>
			  <div id="signup">
			  <label>Account Type:</label><br>
				<el-radio-group ref="usertype" v-model="regDetails.usertype" :value="regDetails.usertype" @input="select($event)">
				  <el-radio-button label="Owner" ></el-radio-button>
				  <el-radio-button label="Employee" ></el-radio-button>
				  <el-radio-button label="Vendor" ></el-radio-button>
				</el-radio-group>
				<div class="text-center" v-if="errorUsertype">
			    		<span style="font-size:13px;">{{ errorUsertype }}</span>
			    	</div>
				
			  </div>
				<label>First Name:</label>
			    	<input type="text" class="form-control" ref="firstname" v-model="regDetails.firstname" v-on:keyup="keymonitor">
			    	<div class="text-center" v-if="errorFirstname">
			    		<span style="font-size:13px;">{{ errorFirstname }}</span>
			    	</div>
					<label>Last Name :</label>
			    	<input type="text" class="form-control" ref="lastname" v-model="regDetails.lastname" v-on:keyup="keymonitor">
			    	<div class="text-center" v-if="errorLastname">
			    		<span style="font-size:13px;">{{ errorLastname }}</span>
			    	</div>
			    	<label>Email:</label>
			    	<input type="text" class="form-control" ref="email" v-model="regDetails.email" v-on:keyup="keymonitor">
			    	<div class="text-center" v-if="errorEmail">
			    		<span style="font-size:13px;">{{ errorEmail }}</span>
			    	</div>
			    	<label>Password:</label>
			    	<input type="password" class="form-control" ref="password" v-model="regDetails.password" v-on:keyup="keymonitor">
			    	<div class="text-center" v-if="errorPassword">
			    		<span style="font-size:13px;">{{ errorPassword }}</span>
			    	</div>
					<label>Company:</label>
			    	<input type="text" class="form-control" ref="company" v-model="regDetails.company" v-on:keyup="keymonitor">
			    	<div class="text-center" v-if="errorCompany">
			    		<span style="font-size:13px;">{{ errorCompany }}</span>
			    	</div>
					<label>Phone:</label>
			    	<input type="number" class="form-control" ref="phone" v-model="regDetails.phone" v-on:keyup="keymonitor">
			    	<div class="text-center" v-if="errorPhone">
			    		<span style="font-size:13px;">{{ errorPhone }}</span>
			    	</div>
			  	</div>
			  	<div class="panel-footer">
			  		<button class="btn btn-primary " @click="userReg();"><span class="glyphicon glyphicon-check"></span>Request</button>
			  	</div>
			</div>

			

		</div>
	
	
		</template>
		
	</div>
</div>
<?php require('include/template/script.php'); ?>
<script src="assest/js/register.js"></script>
<script>
  export default {
    data () {
      return {
        radio5: 'Owner'
      };
    }
  }
  
</script>
<?php require('include/template/footer.php'); ?>