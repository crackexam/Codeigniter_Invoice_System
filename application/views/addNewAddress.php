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
        $client_mobile = $uf->client_mobile;
		$client_gst = $uf->client_gst;
		$client_state = $uf->state_name;
		$client_email = $uf->client_email;
		$pincode = $uf->pincode;
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
                    
                    <form role="form" action="<?php echo base_url('user') ?>/addAddress" method="post" id="addAddress" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Full Name</label>
                                        <input type="text" class="form-control" id="client_name" placeholder="Full Name" name="client_name" value="<?php echo $client_name; ?>" maxlength="128" disabled>
                                        <input type="hidden" value="<?php echo $client_id; ?>" name="client_id" id="client_id" />    
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Company</label>
                                        <input type="text" class="form-control" id="client_company" placeholder="Enter Company" name="client_company" value="<?php echo $client_company; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Address</label>
                                        <input type="text" class="form-control" id="client_address" placeholder="Enter Address" name="client_address">
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
											$products = array("Andra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chhattisgarh", "Delhi", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand", "Karnataka", "Kerala", "Madya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Orissa", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Telagana", "Tripura", "Uttarakhand", "Uttar Pradesh", "West Bengal", "Andaman and Nicobar Islands", "Dadar and Nagar Haveli", "Daman and Diu", "Lakshadeep", "Pondicherry");
											
											// Iterating through the product array
											foreach($products as $item){
												/*if($item == $client_state){
												$isSelected = ' selected="selected"'; // if the option submited in form is as same as this row we add the selected tag
												 } else {
													  $isSelected = ''; // else we remove any tag
												 }*/
												 echo "<option value='".$item."'>".$item."</option>";
											}
											?>
										</select>
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="password">Pincode</label>
                                        <input type="text" class="form-control required digits" id="pincode" name="pincode" >
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