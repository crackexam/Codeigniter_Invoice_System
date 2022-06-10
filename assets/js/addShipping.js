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
	
	var addUserForm = $("#addShipping");
	
	var validator = addUserForm.validate({
		
		rules:{
			customer_name :{ required : true },
			customer_pincode : { required : true, digits : true},
			customer_address : { required : true },
			customer_state : { required : true },
			package_length : { required : true },
			package_width : { required : true },
			package_height : { required : true },
			actual_weight : { required : true },
			volumetric_weight : { required : true },
			customer_contact : { required : true, digits : true }
			
		},
		messages:{
			customer_name :{ required : "This field is required. Please Enter Customer Name" },
			customer_pincode : { required : "This field is required", digits : "Please enter numbers only"},
			customer_address : { required : "This field is required. Please Enter Client Address" },
			customer_state : { required : "This field is required. Please Enter Valid State Name" },
			package_length : { required : "This field is required. Please Enter Package Length" },
			package_width : { required : "This field is required. Please Enter Package Width" },
			package_height : { required : "This field is required. Please Enter Package Height" },
			actual_weight : { required : "This field is required. Please Enter Actual Weight" },
			volumetric_weight : { required : "This field is required. Please Enter Volumetric Weight" },
			customer_contact : { required : "This field is required", digits : "Please enter numbers only" }
						
		}
	});
});
