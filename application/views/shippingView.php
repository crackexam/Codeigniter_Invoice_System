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
                        <div class="box-body">
                            <fieldset>
								<legend>Filter Shipping:</legend>
								<div class="row">
									<div class="col-md-6">                                
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
									<div class="col-md-6">
										<div class="form-group">
											<label for="cpassword">Delivery Type</label>
											<select class="form-control required" id="courier" name="courier_name">
												<option>Select Courier</option>
												<option value="0">On Time Delivery</option>
												<option value="1">Pending Delivery</option>
												<option value="2">Late Delivery</option>
												<option value="3">All Delivery</option>
											</select>
										</div>
									</div>
								</div>
								
							</fieldset>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <!--<input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />-->
                        </div>
                </div>
            </div>
			</div>  
            <div class="col-md-4">
                
            </div>
			<div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                 <div class="box box-danger" id="result" style="display:none;">
					<div class="box-header">
					  <h3 class="box-title">Courier Lists</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>SN.</th>
							  <th>Customer Name</th>
							  <th>Customer Address</th>
							  <th>Contact Number</th>
							  <th>PickUp Date</th>
							  <th>Commited Date</th>
							  <th>Recieving Date</th>
							</tr>
						</thead>
						<tbody id="courier_data"></tbody>
						
					   </table>
					</div>
					<!-- /.box-body -->
				</div>
            </div>
            <div class="col-md-4">
                
            </div>
        </div> 
          
    </section>
</div>
<script>
  /*$(function () {
    $('#example1').DataTable()
    })*/
</script>
<script type="text/javascript">
        $(document).ready(function(){
 
            $('#courier').change(function(){ 
                var id=$(this).val();
				var vendor_id=$('#vendor').val();
				//alert(id + vendor_id);
                $.ajax({
                    url : "<?php echo site_url('shipping/get_vendor_based_courier_list');?>",
                    method : "POST",
                    data : {id: id,vendor_id: vendor_id},
                    async : true,
                    dataType : 'json',
					beforeSend: function () {
						jQuery('#courier_data').find("option:eq(0)").html("Please wait..");
					},
					success: function(data){
                        //alert(data.length); 
						$('#result').show(500);
                        var html = '';
                        var i;
						if(data.length > 0){
                        for(i=0; i<data.length; i++){
                            html += '<tr><td>'+ data[i].shipping_id +'</td><td>'+data[i].customer_name+'</td><td>'+data[i].customer_address+'</td><td>'+data[i].customer_contact+'</td><td>'+data[i].pickup_date+'</td><td>'+data[i].commit_date+'</td><td>'+data[i].recieving_date+'</td></tr>';
                        }
					}else{
						html += '<tr><td colspan="7"> No Record Are Found Matching Above Criteria</td></tr>';
					}
                        $('#courier_data').html(html);
 
                    }
                });
                return false;
            }); 
             
        });
    </script>
<script src="<?php echo base_url(); ?>assets/js/addShipping.js" type="text/javascript"></script>