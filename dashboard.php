<?php
	session_start();
	require('include/config.php');

	if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
		header('location:index.php');
	}

	$sql="select * from tbl_users where userid='".$_SESSION['user']."'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();

?>
<?php require("include/template/main-header.php"); ?>
<div class="remain">
	  <nav class="navbar navbar-inverse">
			   <div class="container-fluid">
								<div class="navbar-header">
								  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>                        
								  </button>
								  <a class="navbar-brand" href="#">Logo</a>
								</div>
								<div class="collapse navbar-collapse" id="myNavbar">
								  <ul class="nav navbar-nav">
									<li class="active"><a href="#">Checkout</a></li>
									<li><a href="#">Report</a></li>
									<li><a href="#">Employee</a></li>
									<li><a href="#">CRM</a></li>
									 <li><a href="#">Ecommerce</a></li>
									 <li><a href="#">Profile</a></li>
								  </ul>
								  <ul class="nav navbar-nav navbar-right">
									  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> </a></li>
									  <li class="dropdown">
										  <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo $row['firstname']; ?><span class="caret"></span></a>
											  <ul class="dropdown-menu">
												<li><a href="logout.php">Logout</a></li>
											  </ul>
									  </li>
								  </ul>
								</div>
			  </div>
	</nav>
  
		<div class="container">
			 <div class="row">
				  <h4>Type of Customers</h4>
				  <div class="col-xs-12 col-md-3 ">
				  <button type="button" class="btn btn-default rebtn">MEMBER</button> 
				  <button type="button" class="btn btn-default rebtn">WALK-IN</button> 
				  <br><br>
				  <button type="button" class="btn btn-default rebtn_large">4532</button> 
				  </div>
				  <div class="col-xs-12 col-md-9 left-bar text-center">
					 <div class="row">
							  <div class="col-xs-12 col-md-3 ">
									 <label>Name</label>
									 <input type="text" class="form-control" ref="firstname" value="<?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?>" >
							  </div>
							  <div class="col-xs-12 col-md-3 ">
								  <label>Phone</label>
									<input type="text" class="form-control" ref="phone" value="<?php echo $row['phone']; ?>" >
							  </div>
							   <div class="col-xs-12 col-md-3 ">
									<label>Email</label>
									<input type="text" class="form-control" ref="email" value="<?php echo $row['firstname']; ?>" >
							  </div>
					  </div>
					   <div class="row">
							  <div class="col-xs-12 col-md-3 ">
									 <label>Total Spent </label>
									 <input type="text" class="form-control" ref="totalspent" value="8000" >
							  </div>
							  <div class="col-xs-12 col-md-3 ">
								  <label>Total Points</label>
									<input type="text" class="form-control" ref="totalpoints" value="602" >
							  </div>
							   <div class="col-xs-12 col-md-3 ">
									<label>Total Visits</label>
									<input type="text" class="form-control" ref="totalvisits" value="30" >
							  </div>
					  </div>
					  <div class="row">
							  <div class="col-xs-12 col-md-3 ">
									 <label>Last Visit </label>
									 <input type="date" class="form-control" ref="lastvisit" value="2018-07-22" >
							  </div>
							  <div class="col-xs-12 col-md-3 ">
								  <label>Gift Card Balance</label>
									<input type="text" class="form-control" ref="gcblnc" value="300" >
							  </div>
							   <div class="col-xs-12 col-md-3 ">
									<label>Note</label>
									<input type="text" class="form-control" ref="note" value="View" >
							  </div>
					  </div>
				   </div>
				  
			  </div>
			  <hr class="style1">     
			</div>
	</div>
	<div class="container">
			 <div class="row">
					 
					 <div id="app" class="col-xs-12 col-md-12 ">
					    <div class="col-xs-12 col-md-5">
							<table class="table retable">
								<thead>
									<tr>
										<td><strong>Service</strong></td>
										<td><strong>Employee</strong></td>
										<td></td>
									</tr>
								</thead>
								<tbody>
									<tr v-for="row in rows">
										<td><button type="button" class="btn btn-default rebtn1 ">{{ row.service }}</button></td>
										<td><button type="button" class="btn btn-default rebtn1">{{ row.employee }}</button></td>
										<td><a v-on:click="removeElement(row);" style="cursor: pointer"> <span class="glyphicon glyphicon-trash" style="color:red;font-size:22px"></span> </a></td>
									</tr>
								</tbody>
							</table>
							<a v-on:click="addRow" style="cursor: pointer"> <span class="glyphicon glyphicon-plus" style="color:red;font-size:22px"></span></a>
						</div>
						<div class="col-xs-12 col-md-7">
						        <h4 class="text-center">Details</h4>
								<div class="tbl_details">
						      <table class="table retable">
								<thead>
									<tr>
									    <td><strong>Processor</strong></td>
										<td><strong>Date</strong></td>
										<td><strong>Service</strong></td>
										<td><strong>Employee</strong></td>
										<td><strong>Price</strong></td>
									</tr>
								</thead>
								<tbody>
									<tr v-for="row in rows">
									    <td>{{ row.processor }}</td>
										<td>{{ row.date }}</td>
										<td>{{ row.service }}</td>
										<td>{{ row.employee }}</td>
										<td>$ {{ row.price }}</td>
										
									</tr>
									<tr class="total_row">
									<td colspan="3"></td>
									<td colspan="2">Total Price &nbsp;&nbsp; :<strong> $ {{ total_price }}</strong> <br /> 
									                               Discount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong> $ 5</strong><br />
																   Amount Due : <strong> $ 0 </strong>
									</td>
									</tr>
								</tbody>
							</table>	  
							 </div>      
							         <div class="row text-center repay">
										 <div class="col-xs-12 col-md-3">
										 <h3>Payment</h3>
										 </div>
										 <div class="col-xs-12 col-md-9">
										 <div class="col-xs-3 col-md-4">
										 <img class="pay_img" src="assest/images/cash.png" /><br /> Cash
										 </div>
										 <div class="col-xs-3 col-md-4">
										 <img class="pay_img" src="assest/images/credit_card.png" /><br /> D/Credit Card
										 </div>
										 <div class="col-xs-3 col-md-4">
										 <img class="pay_img" src="assest/images/giftcard.png" /><br /> Gift Card
										 </div>
										  <div class="col-xs-3 col-md-4">
										 <img  src="assest/images/note.png" /><br />Note
										 </div>
										 </div>
									 </div>
						         <button type="button" class="btn btn-default rebtn1 float-right "> Submit </button>
						</div>
					 <div>
				
			 </div>
		 </div>
		 </div>
	</div>
 
</div>
<?php require('include/template/script.php'); ?>

<script type="text/javascript">
    var app = new Vue({
        el: "#app",	
        data: {
		total_price : 0 ,
            rows: [
                { processor:"Kris" , date:"5/30/2018" ,service: "Service 1", employee: "Hanna An" , price:90 },
                { processor:"Kris" , date:"5/30/2018" ,service: "Service 2", employee: "Hanna An"  , price:90 }
            ]
        },
        methods: {
            addRow: function () {
			     var today = new Date();
				 var datenow = (today.getMonth()+1)+'/'+today.getDate()+'/'+today.getFullYear();
                this.rows.push({ processor:"Kris" , date:datenow ,service: "Service", employee: "Hanna An"  , price:90 });
				this.count_price();
				
            },
			count_price : function() {
			  app.total_price=0;
            this.rows.forEach(function (rows) {   
                  app.total_price += rows.price; 
              });
			},
            removeElement: function (row) {
                var index = this.rows.indexOf(row);
                this.rows.splice(index, 1);
				this.count_price();
            },
            setFilename: function (event) {
                this.filename = event.target.name;
            }
        }
    });
	app.count_price();
</script>

<?php require("include/template/main-footer.php"); ?>
