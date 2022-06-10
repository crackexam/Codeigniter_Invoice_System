<?php

$vendor_id = '';
$vendor_name = '';
$vendor_address = '';
$vendor_mobile = '';
$vendor_gst = '';

if(!empty($vendorInfo))
{//print_r($vendorInfo);die;
    foreach ($vendorInfo as $uf)
    {
        $vendor_id = $uf->vendor_id;
        $vendor_name = $uf->vendor_name;
        $vendor_address = $uf->vendor_address;
        $vendor_mobile = $uf->vendor_contact;
		$vendor_gst = $uf->vendor_gst;
		$vendor_createDate =$uf->vendor_createDate;
		
    }
}


?>

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
                    
                    <form role="form" action="<?php echo base_url() ?>editVendorDetails" method="post" id="editUser" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Full Name</label>
                                        <input type="text" class="form-control" id="vendor_name" placeholder="Full Name" name="vendor_name" value="<?php echo $vendor_name; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $vendor_id; ?>" name="vendor_id" id="vendor_id" />    
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Mobile</label>
                                        <input type="text" class="form-control" id="vendor_contact" placeholder="Enter Mobile Number" name="vendor_contact" value="<?php echo $vendor_mobile; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Address</label>
                                        <input type="text" class="form-control" id="vendor_address" placeholder="Enter Address" name="vendor_address" value="<?php echo $vendor_address; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">GST Number</label>
                                        <input type="text" class="form-control" id="vendor_gst" placeholder="Enter GST Number" name="vendor_gst" value="<?php echo $vendor_gst; ?>">
                                    </div>
                                </div>
                            </div>
                            
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

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>