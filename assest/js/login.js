var app = new Vue({
	el: '#login',
	data:{
		
		successMessage: "",
		errorMessage: "",
		logDetails: {username: '', password: '' , usertype : 'Owner' , avator:'assest/images/login-owner.png' ,},
	},

	methods:{
		keymonitor: function(event) {
       		if(event.key == "Enter"){
         		app.checkLogin();
        	}
       	},
		
		 select(type) {
			
      const url = "assest/images/login-"+type+".png"; // eslint-disable-line
     app.logDetails.avator = url;
      app.logDetails.usertype = type;
	  
    },
		checkLogin: function(){
			var logForm = app.toFormData(app.logDetails);
			axios.post('include/api/login.php', logForm)
				.then(function(response){

					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
						app.successMessage = response.data.message;
						app.logDetails = {username: '', password:'' ,usertype : 'Owner' ,};
						setTimeout(function(){
							window.location.href="dashboard.php";
						},2000);
						
					}
				});
		},

		toFormData: function(obj){
			var form_data = new FormData();
			for(var key in obj){
				form_data.append(key, obj[key]);
			}
			return form_data;
		},

		clearMessage: function(){
			app.errorMessage = '';
			app.successMessage = '';
		}

	}
});