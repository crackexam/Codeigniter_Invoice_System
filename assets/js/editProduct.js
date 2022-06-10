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
	
	var addUserForm = $("#editProduct");
	
	var validator = addUserForm.validate({
		
		rules:{
			product_name :{ required : true },
			product_hsn : { required : true},
			product_gst : {required : true, digits : true},
			product_price : { required : true, digits : true }
			/*role : { required : true, selected : true}*/
		},
		messages:{
			product_name :{ required : "This field is required. Please Enter Client Name" },
			product_hsn : { required : "This field is required. Please Enter Company Name"},
			product_gst : {required : "This field is required. Please Enter GST Tax Rate", digits : "Please enter Tax Rate"},
			product_price : { required : "This field is required", digits : "Please enter Valid Price" }
			/*role : { required : "This field is required", selected : "Please select atleast one option" }*/			
		}
	});
});
