<?php

$vendor_id = '';
$vendor_name = '';
$courier_id = '';


if(!empty($courierInfo))
{//print_r($courierInfo);die;
    foreach ($courierInfo as $uf)
    {
        $vendor_id = $uf->vendor_id;
        $courier_name = $uf->courier_name;
        $courier_id = $uf->courier_id;
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
                    
                    <form role="form" action="<?php echo base_url('shipping') ?>/editCourierDetails" method="post" id="editUser" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Courier Name</label>
                                        <input type="text" class="form-control" id="courier_name" placeholder="Full Name" name="courier_name" value="<?php echo $courier_name; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $courier_id; ?>" name="courier_id" id="courier_id" />    
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Vendor Name</label>
                                        <select class="form-control required" id="vendor" name="vendor">
											<option>Choose one</option>
											<?php
											
											foreach($allVendor as $vendor){
											?>
											<option value="<?php echo $vendor->vendor_id; ?>"<?php if($vendor->vendor_id == $vendor_id){?> selected <?php }?>><?php echo $vendor->vendor_name; ?></option>
											<?php
											}
											?>
										</select> 
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
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>