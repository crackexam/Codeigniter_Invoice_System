<?php

$company_id = '';
$company_name = '';
$company_email= '';
$company_address = '';
$company_gst = '';
$company_contact = '';
$bank_name = '';
$account_holder = '';
$account_number = '';
$ifsc_code = '';
$company_logo = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $company_id = $uf->company_id;
        $company_name = $uf->company_name;
        $company_email = $uf->company_email;
        $company_address = $uf->company_address;
        $company_gst = $uf->company_gst;
		$company_contact = $uf->company_contact;
		$bank_name = $uf->bank_name;
        $account_holder = $uf->account_holder;
        $account_number = $uf->account_number;
        $ifsc_code = $uf->ifsc_code;
		$company_logo = $uf->company_logo;
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
                    
                    <form role="form" action="<?php echo base_url() ?>updateCompany" method="post" id="updateCompany" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Company Name</label>
                                        <input type="text" class="form-control" id="company_name" placeholder="Full Name" name="company_name" value="<?php echo $company_name; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $company_id; ?>" name="company_id" id="company_id" />    
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Company Email</label>
                                        <input type="text" class="form-control" id="company_email" name="company_email" value="<?php echo $company_email; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Company Address</label>
                                        <input type="textarea" class="form-control" id="company_address" placeholder="Enter Address" name="company_address" value="<?php echo $company_address; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Mobile</label>
                                        <input type="text" class="form-control" id="company_contact" placeholder="Enter Mobile Number" name="company_contact" value="<?php echo $company_contact; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
								<div class="col-md-2">
                                    <div class="form-group">
                                        <img src="<?php echo base_url(); ?>assets/images/uploads/<?php echo $company_logo; ?>" style="vertical-align:middle;" width="120" height="80">
										<input type="hidden" value="<?php echo $company_logo; ?>" name="oldlogo">
                                    </div>
                                </div>
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mobile">Company Logo</label>
                                        <input type="file" class="form-control " id="company_logo"  name="company_logo" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">GST Number</label>
                                        <input type="text" class="form-control" id="company_gst" placeholder="Enter GST Number" name="company_gst" value="<?php echo $company_gst; ?>">
                                    </div>
                                </div>
                                  
                            </div>
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Company Address</label>
                                        <input type="textarea" class="form-control" id="company_address" placeholder="Enter Address" name="company_address" value="<?php echo $company_address; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Mobile</label>
                                        <input type="text" class="form-control" id="company_contact" placeholder="Enter Mobile Number" name="company_contact" value="<?php echo $company_contact; ?>">
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Bank Name</label>
                                        <input type="textarea" class="form-control" id="bank_name" placeholder="Enter Address" name="bank_name" value="<?php echo $bank_name; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Account Name</label>
                                        <input type="text" class="form-control" id="account_holder" placeholder="Enter Mobile Number" name="account_holder" value="<?php echo $account_holder; ?>">
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Account Number</label>
                                        <input type="textarea" class="form-control" id="account_number" placeholder="Enter Address" name="account_number" value="<?php echo $account_number; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Bank IFSC Code</label>
                                        <input type="text" class="form-control" id="ifsc_code" placeholder="Enter Mobile Number" name="ifsc_code" value="<?php echo $ifsc_code; ?>">
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

<script src="<?php echo base_url(); ?>assets/js/updateCompany.js" type="text/javascript"></script>
