/**
 * File : addProduct.js
 * 
 * This file contain the validation of add Product form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @author Kishor Mali
 */

$(document).ready(function(){
	
	var addUserForm = $("#addProduct");
	
	var validator = addUserForm.validate({
		
		rules:{
			product_name :{ required : true },
			product_model : {required : true }
		},
		messages:{
			product_name :{ required : "This field is required. Please Enter Product Name" },
			product_model : {required : "This field is required. Please Enter Model Number"}
		}
	});
});
