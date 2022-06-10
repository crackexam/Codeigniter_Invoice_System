<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Company Management
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
                        <h3 class="box-title">Enter Company Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addCompany" action="<?php echo base_url() ?>registerNewCompany" method="post" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Company Name</label>
                                        <input type="text" class="form-control required"  id="company_name" name="company_name" maxlength="128">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Company Email</label>
                                        <input type="text" class="form-control required" id="company_email"  name="company_email" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Comapany Address</label>
                                        <input type="text" class="form-control required" id="company_address" name="company_address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Company Contact</label>
                                        <input type="text" class="form-control required digits" id="company_contact" name="company_contact" maxlength="10">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
							<div class="col-md-2">
                                    <div class="form-group">
                                     <img id="blah" width="120" height="100">   
                                    </div>
                                </div>
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mobile">Company Logo</label>
                                        <input type="file" class="form-control required " id="company_logo"  name="company_logo" onchange="readURL(this);">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Company Gst Number</label>
                                        <input type="text" class="form-control required " id="company_gst"  name="company_gst" >
                                    </div>
                                </div>
								   
                            </div>
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Bank Name</label>
                                        <input type="text" class="form-control required" id="bank_name" name="bank_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Account Name</label>
                                        <input type="text" class="form-control required" id="account_holder" name="account_holder">
                                    </div>
                                </div>
                            </div>
							<div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Account Number</label>
                                        <input type="text" class="form-control required digits" id="account_number" name="account_number" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Bank IFSC Code</label>
                                        <input type="text" class="form-control required" id="ifsc_code" name="ifsc_code">
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
<script src="<?php echo base_url(); ?>assets/js/addCompany.js" type="text/javascript"></script>
<script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(120)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>