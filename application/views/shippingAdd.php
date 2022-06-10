<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Shipping Management
        <small>Add Shipping</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                 <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Shipping Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addShipping" action="<?php echo base_url('shipping') ?>/addNewShipping" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12" >
								<?php if(isset($customer_details->invoice_number)){ ?>
                                    <div class="form-group" id="show_p_box">
                                        <label for="email">Performa Number</label>
                                        <input type="text" class="form-control required" id="perform_number" value="<?php echo $customer_details->invoice_number; ?>" name="perform_number" maxlength="128">
                                    </div>
								<?php } ?>
                                </div>
                            </div>
							<fieldset>
								<legend>Customer Section:</legend>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="password">Customer Name</label>
											<input type="text" class="form-control required" id="customer_name" name="customer_name" value="<?php echo isset($customer_details->client_name) ? $customer_details->client_name : "";?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="cpassword">Customer Contact</label>
											<input type="text" class="form-control required digits" id="customer_contact" name="customer_contact" value="<?php echo isset($customer_details->client_mobile) ? $customer_details->client_mobile : "";?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="password">Customer Address</label>
											<input type="text" class="form-control required" id="customer_address" name="customer_address" value="<?php echo isset($customer_details->client_address) ? $customer_details->client_address : "";?>">
											
										</div>
									</div>
								 </div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="password">Customer State</label>
											<input type="text" class="form-control required" id="customer_state" name="customer_state" value="<?php echo isset($customer_details->state_name) ? $customer_details->state_name : "";?>">
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="mobile">Customer Pincode</label>
											<input type="text" class="form-control " id="customer_pincode" value="<?php echo isset($customer_details->pincode) ? $customer_details->pincode : "";?>" name="customer_pincode" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="mobile">Customer Gst Number</label>
											<input type="text" class="form-control " id="customer_gst" value="<?php echo isset($customer_details->client_gst) ? $customer_details->client_gst : "";?>" name="customer_gst" >
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Courier Section:</legend>
								<div class="row">
									<div class="col-md-4">                                
										<div class="form-group">
											<label for="fname">Vendor Name</label>
											<select class="form-control required" id="vendor" name="vendor" >
												<option value="Choose One">Choose One</option>
												<?php
												
												foreach($allVendor as $vendor){
												?>
												<option value="<?php echo $vendor->vendor_id; ?>"><?php echo $vendor->vendor_name; ?></option>
												<?php
												}
												?>
											</select> 
										</div>
										
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="cpassword">Courier Name</label>
											<select class="form-control required" id="courier" name="courier_name">
												<option>Select Courier</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="cpassword">Shipping Mode</label>
											<select class="form-control required" id="ship_mode" name="ship_mode">
												<option>Select Shipping Mode</option>
												<option value="Air">By Air</option>
												<option value="Surface">By Surface</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="password">Package Length</label>
											<input type="text" class="form-control " id="package_length" name="package_length" value="">
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="mobile">Package Width</label>
											<input type="text" class="form-control " id="package_width" value="" name="package_width" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="mobile">Package Hight</label>
											<input type="text" class="form-control " id="package_height" value="" name="package_height" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="password">Actual Weight</label>
											<input type="text" class="form-control " id="actual_weight" name="actual_weight" value="">
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="mobile">Volumetric Weight</label>
											<input type="text" class="form-control " id="volumetric_weight" value="" name="volumetric_weight" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="mobile">Docket Number</label>
											<input type="text" class="form-control " id="docket_number" value="" name="docket_number" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="password">Courier PickUp Date<span></label>
											<input type="date" class="form-control required" id="pikup_date" name="pikup_date" value="">
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="password">Commited Date <span style="color:red;">( If Any )<span></label>
											<input type="date" class="form-control " id="commite_date" value="" name="commite_date" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="mobile">Package Recieving Date</label>
											<input type="date" class="form-control " id="recieving_date" value="" name="recieving_date" >
										</div>
									</div>
								</div>
							</fieldset>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
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
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">Ã—</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">Ã—</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">Ã—</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>
<script type="text/javascript">
        $(document).ready(function(){
 
            $('#vendor').change(function(){ 
                var id=$(this).val();
				//alert(id);
                $.ajax({
                    url : "<?php echo site_url('shipping/get_vendor_based_courier');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
					beforeSend: function () {
						jQuery('select#courier').find("option:eq(0)").html("Please wait..");
					},
					complete: function () {
						// code
					},
                    success: function(data){
                        //alert(data); 
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].courier_id+'>'+data[i].courier_name+'</option>';
                        }
                        $('#courier').html(html);
 
                    }
                });
                return false;
            }); 
             
        });
    </script>


<!--<script>
$(document).ready(function(){
	$("#perform_option").change(function(){
        var selectedCountry = $(this).children("option:selected").val();
		if(selectedCountry == 'With Performa Number'){
			$('#show_p_box').show();
		}else{
			$('#show_p_box').hide();
		}
        //alert("You have selected the country - " + selectedCountry);
    });
})
</script>-->

<script src="<?php echo base_url(); ?>assets/js/addShipping.js" type="text/javascript"></script>