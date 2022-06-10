<?php
$client_id = '';
$client_name = '';
$client_company = '';
$client_address = '';
$client_mobile = '';
$client_gst = '';
if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $client_id = $uf->client_id;
        $client_name = $uf->client_name;
        $client_company = $uf->client_company;
        $client_address = $uf->client_address;
		$other_state_name = $uf->client_other_state;
		$country = $uf->country;
        $client_mobile = $uf->client_mobile;
		$client_gst = $uf->client_gst;
		$client_state = $uf->state_name;
		$client_email = $uf->client_email;
		$pincode = $uf->pincode;
    }
}
?>
<style>
.card {
  background: #fff;
  border-radius: 2px;
  display: inline-block;
  height: auto;
  margin: 1rem;
  position: relative;
  width: 90%;
  padding: 10px;
  font-size: 16px
}
.card-1 {
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}

.card-1:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
</style>
	<script src="<?php echo base_url(); ?>assets/js/countryCode.js" type="text/javascript"></script>
	<link href="<?php echo base_url(); ?>assets/bootstrap/css/countryCode.css" rel="stylesheet" media="screen">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Management
        <small>Add / Edit User</small>
      </h1>
    </section>
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
                    <form role="form" action="<?php echo base_url() ?>editUser" method="post" id="editUser" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Client Full Name</label>
                                        <input type="text" class="form-control" id="client_name" placeholder="Full Name" name="client_name" value="<?php echo $client_name; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $client_id; ?>" name="client_id" id="client_id" />    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Client Company</label>
                                        <input type="text" class="form-control" id="client_company" placeholder="Enter Company" name="client_company" value="<?php echo $client_company; ?>">
                                    </div>
                                </div>
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cpassword">Client Email</label>
                                        <input type="email" class="form-control required " id="client_email" name="client_email" value="<?php echo $client_email; ?>">
                                    </div>
									<div class="result" id="result"></div>
                                </div>
                            </div>
							<div class="row">
								
								<div class="col-md-3">
									<div class="form-group">
                                        <label for="cpassword">Client Contact</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Enter Mobile Number" value="<?php echo $client_mobile; ?>">
										<input type="hidden" class="form-control required" id="contact" name="client_contact">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="mobile">Client's Company Gst Number</label>
                                        <input type="text" class="form-control" id="client_gst" placeholder="Enter GST Number" name="client_gst" value="<?php echo $client_gst; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Address</label>
                                        <input type="text" class="form-control" id="client_address" placeholder="Enter Address" name="client_address" value="<?php echo $client_address; ?>">
                                    </div>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="password">Pincode</label>
                                        <input type="text" class="form-control required digits" id="pincode" name="pincode" value="<?php echo $pincode;?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="password">Client State</label>
                                        <!--<input type="text" class="form-control required" id="client_state" name="client_state" value="<?php echo $client_state; ?>">-->
										<select class="form-control required" id="client_state" name="client_state">
											<option >Choose one</option>
											<?php
											// A sample product array
											$products = array("Other","Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chhattisgarh","Chandigarh", "Delhi", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand", "Karnataka", "Kerala","Ladakh" ,"Madya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Orissa", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Telagana", "Tripura", "Uttarakhand", "Uttar Pradesh", "West Bengal", "Andaman and Nicobar Islands", "Dadar and Nagar Haveli", "Daman and Diu", "Lakshadeep", "Pondicherry");
											// Iterating through the product array
											foreach($products as $item){
												if($item == $client_state){
												$isSelected = ' selected="selected"'; // if the option submited in form is as same as this row we add the selected tag
												 } else {
													  $isSelected = ''; // else we remove any tag
												 }
												 echo "<option value='".$item."'".$isSelected.">".$item."</option>";
											}
											?>
										</select>
                                    </div>
                                </div>
								<div class="col-md-6" id="other_state_div" style="display:none">
									<div class="col-md-6">
										<div class="form-group" >
											<label >Enter State</label>
											<input type="text" class="form-control" id="other_state" name="other_state" value="<?php echo $other_state_name; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" >
											<label >Enter Country</label>
											<input type="text" class="form-control" id="country" name="country" value="<?php echo $country; ?>">
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
				<div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-4"><h3 class="box-title">User All Addresses</h3></div>
						<div class="col-md-8" id="result1"></div>
                    </div><!-- /.box-header -->
					<div class="box-body">
                        <?php foreach($userAddress as $address){ ?>
						  <div class="col-md-4">
							<div class="card card-1">
							 <p><label>Address : </label><?php echo " ".$address->m_client_address;?></p>
							 <p><label>State : </label><?php echo " ".$address->m_client_state;?></p>
							 <p><label>Pincode : </label><?php echo " ".$address->m_client_pincode;?></p>
							 <?php if($address->is_Default == 0){?>
							 <p><span id="<?php echo $address->id;?>" class="set_default btn btn-success btn-sm">Set As Default</span></p>
							 <?php }else{ ?>
							 <p><span class="btn btn-danger btn-sm unset_default" id="<?php echo $address->id;?>">Unset Default</span></p>
							 <?php } ?>
							</div>
						  </div>
						<?php } ?>
                    </div><!-- /.box-header -->
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
<script>
$(document).ready(function(){
	$('.set_default').click(function(){
		var client_id = $('#client_id').val();
		var address_id = this.id;
		var Result = $('#result1');
		//alert(address_id);
		$.ajax({ // Send the username val to available.php
            type : 'POST',
            data : {aid:address_id,cid:client_id},
            url  : "<?php echo base_url()?>user/setDefaultAddress",
            success: function(responseText){ 
			//alert(responseText);
			// Get the result
                if(responseText == true){
                    Result.html('<label class="label label-succes" style="color:green; font-weight:bold;"><i class="fa fa-check-circle"></i> Address Set As Default Successfully</label>');
					setTimeout(function(){
					   window.location.reload(1);
					}, 2000);
                }
                else {
                    Result.html('<label class="label label-error" style="color:red; font-weight:bold;"><i class="fa fa-times-circle"></i> Error....!</label>');
					setTimeout(function(){
					   window.location.reload(1);
					}, 2000);
                }
            }
        });
	})
	$('.unset_default').click(function(){
		var client_id = $('#client_id').val();
		var address_id = this.id;
		var Result = $('#result1');
		//alert(address_id);
		$.ajax({ // Send the username val to available.php
            type : 'POST',
            data : {aid:address_id,cid:client_id},
            url  : "<?php echo base_url()?>user/unsetDefaultAddress",
            success: function(responseText){ 
			//alert(responseText);
			// Get the result
                if(responseText == true){
                    Result.html('<label class="label label-succes" style="color:green; font-weight:bold;"><i class="fa fa-check-circle"></i> Address Unset Successfully</label>');
					setTimeout(function(){
					   window.location.reload(1);
					}, 2000);
                }
                else {
                    Result.html('<label class="label label-error" style="color:red; font-weight:bold;"><i class="fa fa-times-circle"></i> Error....!</label>');
					setTimeout(function(){
					   window.location.reload(1);
					}, 2000);
                }
            }
        });
	});
	$('#client_state').on('change', function() {
		if(this.value == 'Other'){
			$('#other_state_div').attr('style','display: block');
		}else{
			//alert(this.value);
			$('#other_state_div').attr('style','display: none');
		}
	});
	var state = '<?php echo $other_state_name;?>';
	if(state != ''){
	 $('#other_state_div').attr('style','display: block');
	}
})
</script>
<!--<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>-->
<script type="text/javascript">
$(document).ready(function(){
    $('#client_email').blur(function(){
        var username = $('#client_email').val(); // Get username textbox using $(this)
		var client_id = $('#client_id').val();
        var Result = $('#result'); // Get ID of the result DIV where we display the results
        if(username.length > 2) { // if greater than 2 (minimum 3)
            Result.html('Loading...'); // you can use loading animation here
            var email = username;
			//alert(email);
            $.ajax({ // Send the username val to available.php
            type : 'POST',
            data : {email:email,id:client_id},
            url  : "<?php echo base_url()?>user/checkemailedit",
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
});
</script>