<?php

$shipping_id = '';
$performa_number = '';
$customer_name = '';
$customer_address = '';
$customer_state = '';
$customer_pincode = '';
$customer_gst = '';
$customer_contact = '';	
$vendor = '';
$courier = '';
$pLength = '';
$pWidth = '';
$pHeight = '';
$actual_weight = '';
$volumetric_weight = '';
$pickup_date = '';
$commit_date = '';
$recieving_date = '';

if(!empty($shippingInfo))
{
    foreach ($shippingInfo as $uf)
    {
        $shipping_id = $uf->shipping_id;
        $performa_number = $uf->performa_number;
        $customer_name = $uf->customer_name;
        $customer_address = $uf->customer_address;
        $customer_state = $uf->customer_state;
		$customer_pincode = $uf->customer_pincode;
		$customer_gst = $uf->customer_gst;
		$customer_contact = $uf->customer_contact;
		$vendor_idd = $uf->vendor;
		$shipping_mode = $uf->ship_mode;
		$courier_idd = $uf->courier;
		$pLength = $uf->pLength;
		$pHeight = $uf->pHeight;
		$pWidth = $uf->pWidth;
		$actual_weight = $uf->actual_weight;
		$volumetric_weight = $uf->volumetric_weight;
		$pickup_date = $uf->pickup_date;
		$commit_date = $uf->commit_date;
		$recieving_date = $uf->recieving_date;
		$docket_number = $uf->tracking_no;
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Shipping Management
        <small>Edit Shipping</small>
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
                    
                    <form role="form" action="<?php echo base_url('shipping') ?>/editShippingDetail" method="post" id="addShipping" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12" >
								<?php if(isset($performa_number)){ ?>
                                    <div class="form-group" id="show_p_box">
                                        <label for="email">Performa Number</label>
                                        <input type="text" class="form-control required" id="perform_number" value="<?php echo $performa_number; ?>" name="perform_number" maxlength="128">
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
											<input type="text" class="form-control required" id="customer_name" name="customer_name" value="<?php echo isset($customer_name) ? $customer_name : "";?>">
											<input type="hidden" value="<?php echo $shipping_id; ?>" name="shipping_id" id="shipping_id" />
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="cpassword">Customer Contact</label>
											<input type="text" class="form-control required digits" id="customer_contact" name="customer_contact" value="<?php echo isset($customer_contact) ? $customer_contact : "";?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="password">Customer Address</label>
											<input type="text" class="form-control required" id="customer_address" name="customer_address" value="<?php echo isset($customer_address) ? $customer_address : "";?>">
											
										</div>
									</div>
								 </div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="password">Customer State</label>
											<input type="text" class="form-control required" id="customer_state" name="customer_state" value="<?php echo isset($customer_state) ? $customer_state : "";?>">
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="mobile">Customer Pincode</label>
											<input type="text" class="form-control " id="customer_pincode" value="<?php echo isset($customer_pincode) ? $customer_pincode : "";?>" name="customer_pincode" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="mobile">Customer Gst Number</label>
											<input type="text" class="form-control " id="customer_gst" value="<?php echo isset($customer_gst) ? $customer_gst : "";?>" name="customer_gst" >
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
													if($vendor->vendor_id == $vendor_idd){
													$isSelected = ' selected="selected"'; // if the option submited in form is as same as this row we add the selected tag
													 } else {
														  $isSelected = ''; // else we remove any tag
													 }
													 echo "<option value='".$vendor->vendor_id."'".$isSelected.">".$vendor->vendor_name."</option>";
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
												<?php
												 foreach($allCouriers as $couriers){
													if($couriers->courier_id == $courier_idd){
													$isSelected = ' selected="selected"'; // if the option submited in form is as same as this row we add the selected tag
													 } else {
														  $isSelected = ''; // else we remove any tag
													 }
													 echo "<option value='".$couriers->courier_id."'".$isSelected.">".$couriers->courier_name."</option>";
												}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="cpassword">Shipping Mode</label>
											<select class="form-control required" id="ship_mode" name="ship_mode">
												<option>Select Shipping Mode</option>
												<option value="Air" <?php if($shipping_mode == 'Air'){ ?> Selected <?php } ?> >By Air</option>
												<option value="Surface" <?php if($shipping_mode == 'Surface'){ ?> Selected <?php } ?> >By Surface</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="password">Package Length</label>
											<input type="text" class="form-control " id="package_length" name="package_length" value="<?php echo isset($pLength) ? $pLength : "";?>">
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="mobile">Package Width</label>
											<input type="text" class="form-control " id="package_width" value="<?php echo isset($pWidth) ? $pWidth : "";?>" name="package_width" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="mobile">Package Hight</label>
											<input type="text" class="form-control " id="package_height" value="<?php echo isset($pHeight) ? $pHeight : "";?>" name="package_height" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="password">Actual Weight</label>
											<input type="text" class="form-control " id="actual_weight" name="actual_weight" value="<?php echo isset($actual_weight) ? $actual_weight : "";?>">
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="mobile">Volumetric Weight</label>
											<input type="text" class="form-control " id="volumetric_weight" value="<?php echo isset($volumetric_weight) ? $volumetric_weight : "";?>" name="volumetric_weight" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="mobile">Docket Number</label>
											<input type="text" class="form-control " id="docket_number" value="<?php echo isset($docket_number) ? $docket_number : "N/A";?>" name="docket_number" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="password">Courier Picup Date<span></label>
											<input type="date" class="form-control required" id="pikup_date" name="pikup_date" value="<?php echo isset($pickup_date) ? date("Y-m-d", strtotime($pickup_date)) : "";?>">
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="password">Commite Date <span style="color:red;">( If Any )<span></label>
											<input type="date" class="form-control " id="commite_date" value="<?php echo isset($commit_date) ? date("Y-m-d", strtotime($commit_date)) : "";?>" name="commite_date" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="mobile">Pakage Recieving Date</label>
											<input type="date" class="form-control " id="recieving_date" value="<?php echo isset($recieving_date) ? date("Y-m-d", strtotime($recieving_date)) : "";?>" name="recieving_date" >
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
<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>