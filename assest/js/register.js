
var app = new Vue({
	el: '#register',
	data:{
		
		successMessage: "",
		errorMessage: "",
		errorEmail: "",
		errorUsertype: "",
		errorPassword: "",
		errorFirstname: "",
		errorLastname: "",
		errorCompany: "",
		errorPhone: "",
		users: [],
		regDetails: {email: '', password: '' , firstname:'' , lastname: '' , company:'' , phone :'' , usertype : 'Owner' ,},
	},

	mounted: function(){
		this.getAllUsers();
	},

	methods:{
		 select(type) {	
            app.regDetails.usertype = type;
          },
		getAllUsers: function(){
			axios.get('include/api/register.php')
				.then(function(response){
					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
						app.users = response.data.users;
					}
				});
		},

		userReg: function(){
			
			var regForm = app.toFormData(app.regDetails);
			//alert(JSON.stringify(app.regDetails));
			axios.post('include/api/register.php?action=register', regForm)
				.then(function(response){
					//console.log(response);
					 if(response.data.usertype){
						app.errorUsertype = response.data.message;
						app.focusUsertype();
						app.clearMessage();
					}
					else if(response.data.firstname){
						app.errorFirstname = response.data.message;
						app.errorUsertype='';
						app.focusFirstname();
						app.clearMessage();
					}
					else if(response.data.lastname){
						app.errorLastname = response.data.message;
						app.errorFirstname='';
						app.focusLastname();
						app.clearMessage();
					}
					else if(response.data.email){
						app.errorEmail = response.data.message;
						app.errorLastname='';
						app.focusEmail();
						app.clearMessage();
					}
					else if(response.data.password){
						app.errorPassword = response.data.message;
						app.errorEmail='';
						app.focusPassword();
						app.clearMessage();
					}
					else if(response.data.company){
						app.errorCompany = response.data.message;
						app.errorPassword='';
						app.focusCompany();
						app.clearMessage();
					}
					else if(response.data.phone){
						app.errorPhone = response.data.message;
						app.errorCompany='';
						app.focusPhone();
						app.clearMessage();
					}
					else if(response.data.error){
						app.errorMessage = response.data.message;
						app.errorFirstname='';
						app.errorLastname='';
						app.errorEmail='';
						app.errorPassword='';
						app.errorCompany='';
						app.errorPhone='';
					}
					else{
						app.successMessage = response.data.message;
					 	app.regDetails = {email: '', password:'' ,  firstname:'' , lastname: '' , company:'' , phone :'' , usertype : 'Owner'};
					 	app.errorFirstname='';
						app.errorLastname='';
						app.errorEmail='';
						app.errorPassword='';
						app.errorCompany='';
						app.errorPhone='';
					 	app.getAllUsers();
					}
				});
		},
         focusUsertype: function(){
			this.$refs.usertype.focus();
		},
		 focusFirstname: function(){
			this.$refs.firstname.focus();
		},
		focusLastname: function(){
			this.$refs.lastname.focus();
		},
		focusEmail: function(){
			this.$refs.email.focus();
		},

		focusPassword: function(){
			this.$refs.password.focus();
		},
		focusCompany: function(){
			this.$refs.company.focus();
		},
		focusPhone: function(){
			this.$refs.phone.focus();
		},

		keymonitor: function(event) {
       		if(event.key == "Enter"){
         		app.userReg();
        	}
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
