/**
 * File : addUser.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @author Kishor Mali
 */

$(document).ready(function(){
	
	var addUserForm = $("#addCompany");
	
	var validator = addUserForm.validate({
		
		rules:{
			company_name :{ required : true },
			company_email : { required : true, email : true, remote : { url : baseURL + "checkEmailExists", type :"post"} },
			company_address : { required : true },
			company_gst : {required : true},
			company_contact : { required : true, digits : true },
			account_number : { required : true, digits : true }
			/*role : { required : true, selected : true}*/
		},
		messages:{
			company_name :{ required : "This field is required. Please Enter Company Name" },
			company_email : { required : "This field is required", email : "Please enter valid email address", remote : "Email already taken" },
			company_address : { required : "This field is required. Please Enter Company Address" },
			company_gst : {required : "This field is required. Please Enter GST Number" },
			company_contact : { required : "This field is required", digits : "Please enter Valid Contact Numbers " },
			account_number : { required : "This field is required", digits : "Please enter Valid Account Number" }
			/*role : { required : "This field is required", selected : "Please select atleast one option" }*/			
		}
	});
});
