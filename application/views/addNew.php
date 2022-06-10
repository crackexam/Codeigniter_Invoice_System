<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Management
        <small>Add / Edit User</small>
      </h1>
    </section>
	<script src="<?php echo base_url(); ?>assets/js/countryCode.js" type="text/javascript"></script>
	<link href="<?php echo base_url(); ?>assets/bootstrap/css/countryCode.css" rel="stylesheet" media="screen">
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter User Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addUser" action="<?php echo base_url() ?>addNewUser" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Client Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('fname'); ?>" id="client_name" name="client_name" maxlength="128">
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Client Company</label>
                                        <input type="text" class="form-control required" id="client_company" value="<?php echo set_value('email'); ?>" name="client_company" maxlength="128">
                                    </div>
                                </div>
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cpassword">Client Email</label>
                                        <input type="email" class="form-control required " id="client_email" name="client_email">
                                    </div>
									<div class="result" id="result"></div>
                                </div>
                            </div>
                            <div class="row">
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cpassword">Client Contact</label>
                                        <input type="tel" class="form-control required" id="phone">
										<input type="hidden" class="form-control required" id="contact" name="client_contact">
										
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="mobile">Client's Company Gst Number</label>
                                        <input type="text" class="form-control " id="client_gst" value="<?php echo set_value('mobile'); ?>" name="client_gst" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Client Address</label>
                                        <input type="text" class="form-control required" id="client_address" name="client_address">
                                    </div>
                                </div>
								
								
                            </div>
                            <div class="row">
								<div class="col-md-3">
                                    <div class="form-group" id="india">
                                        <label for="password">Pincode</label>
                                        <input type="text" class="form-control required digits" id="pincode" name="pincode" maxlength="6">
                                    </div>
                                </div>
								
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="password">Client State</label>
                                        <!--<input type="text" class="form-control required" id="client_state" name="client_state" Placeholder="i.e Delhi,Punjab etc..">-->
										<select class="form-control required" id="client_state" name="client_state">
											<option>Choose one</option>
											<?php
											// A sample product array
											$products = array("Other","Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chhattisgarh","Chandigarh", "Delhi", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand", "Karnataka", "Kerala","Ladakh" ,"Madya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Orissa", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Telagana", "Tripura", "Uttarakhand", "Uttar Pradesh", "West Bengal", "Andaman and Nicobar Islands", "Dadar and Nagar Haveli", "Daman and Diu", "Lakshadeep", "Pondicherry");
											
											// Iterating through the product array
											foreach($products as $item){
											?>
											<option value="<?php echo $item; ?>"><?php echo $item; ?></option>
											<?php
											}
											?>
										</select>
                                    </div>
                                </div>
								<div class="col-md-6" id="other_state_div" style="display:none">
									<div class="col-md-6">
										<div class="form-group" >
											<label >Enter State</label>
											<input type="text" class="form-control" id="other_state" name="other_state">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" >
											<label >Enter Country</label>
											<input type="text" class="form-control" id="country" name="country">
										</div>
										
									</div>
								</div>
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" id="submit"/>
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    
</div>

<script>
 var telInput = $("#phone"),
  errorMsg = $("#error-msg"),
  validMsg = $("#valid-msg");

// initialise plugin
telInput.intlTelInput({

  allowExtensions: true,
  formatOnDisplay: true,
  autoFormat: true,
  autoHideDialCode: true,
  autoPlaceholder: true,
  defaultCountry: "in",
  ipinfoToken: "yolo",

  nationalMode: false,
  numberType: "MOBILE",
  //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  preferredCountries: ['in', 'ae', 'us','uk','au','gb'],
  preventInvalidNumbers: true,
  separateDialCode: true,
  initialCountry: "auto",
 
   //utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
});

var reset = function() {
  telInput.removeClass("error");
  errorMsg.addClass("hide");
  validMsg.addClass("hide");
};

// on blur: validate
telInput.blur(function() {
  reset();
  //alert();
  var countrycode = $('.selected-dial-code').text();
  var phone = $('#phone').val();
  $('#contact').val(countrycode +'-'+ phone);
  
});

// on keyup / change flag: reset
telInput.on("keyup change", reset);
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#client_email').blur(function(){
        var username = $('#client_email').val(); // Get username textbox using $(this)
        var Result = $('#result'); // Get ID of the result DIV where we display the results
        if(username.length > 2) { // if greater than 2 (minimum 3)
            Result.html('Loading...'); // you can use loading animation here
            var email = username;
			//alert(email);
            $.ajax({ // Send the username val to available.php
            type : 'POST',
            data : {email:email},
            url  : "<?php echo base_url()?>user/checkemail",
            success: function(responseText){ 
			//alert(responseText);
			// Get the result
                if(responseText == true){
                    Result.html('<label class="label label-succes" style="color:green; font-weight:bold;"><i class="fa fa-check-circle"></i> Email Is Not Attached With Any Client</label>');
					$('#submit').attr('disabled', false);
                }
                else {
                    Result.html('<label class="label label-error" style="color:red; font-weight:bold;"><i class="fa fa-times-circle"></i> Email Is Already Registered With Other Client....!</label>');
					$('#submit').attr('disabled', true);
                }
                
            }
            });
        }/*else{
            Result.html('Enter atleast 3 characters');
        }*/
        if(username.length == 0) {
            Result.html('<label class="label label-error" style="color:red; font-weight:bold;"><i class="fa fa-info-circle"></i> Please Enter Email........</label>');
			$('#client_email').focus();
        }
    });
	$('#client_state').on('change', function() {
		if(this.value == 'Other'){
			$('#other_state_div').attr('style','display: block');
		}else{
			//alert(this.value);
			$('#other_state_div').attr('style','display: none');
		}
	});
});
</script>