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
	
	var addUserForm = $("#addUser");
	
	var validator = addUserForm.validate({
		
		rules:{
			client_name :{ required : true },
			//client_email : { required : true },
			client_company : { required : true},
			client_address : { required : true },
			client_state : { required : true },
			/*client_gst : {required : true},*/
			client_contact : { required : true, digits : true }
			/*role : { required : true, selected : true}*/
		},
		messages:{
			client_name :{ required : "This field is required. Please Enter Client Name" },
			client_email : { required : "This field is required"},
			client_company : { required : "This field is required. Please Enter Company Name"},
			client_address : { required : "This field is required. Please Enter Client Address" },
			client_state : { required : "This field is required. Please Enter Valid State Name" },
			/*client_gst : {required : "This field is required. Please Enter GST Number" },*/
			client_contact : { required : "This field is required", digits : "Please enter numbers only" }
			/*role : { required : "This field is required", selected : "Please select atleast one option" }*/			
		}
	});
});
