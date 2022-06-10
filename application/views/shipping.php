<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-home"></i> Shipping Management
        <small>Add, Edit</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>shippingAdd"><i class="fa fa-plus"></i> Add New Shipment</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Previous Shipping List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>shippingListing" method="POST" id="searchList">
                            <div class="input-group">
                              <!--<input type="text" id="myInput" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 200px;" placeholder="Search Company" onkeyup="mySearch()"/>-->
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
				
                  <table class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="myTable">
				  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Vendor Name</th>
					  <th>Courier Name</th>
					  <th>Customer Name</th>
                      <th>Address</th>
					  <th>PickUp Date</th>
					  <th>Commit Date</th>
					  <th>Recieving Date</th>
					  <th>Date Diff</th>
					  <th>On Time Delivery</th>
					  <th>Docket Number</th>
                      <th class="text-center">Actions</th>
                    </tr>
				  </thead>
				  <tbody>
                    <?php
                    if(!empty($shippingRecords))
                    {	//print_r($shippingRecords);
                        foreach($shippingRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->shipping_id ?></td>
                      <td><?php echo $record->vendor_name ?></td>
					  <td><?php echo $record->courier_name ?></td>
                      <td><?php echo $record->customer_name ?></td>
                      <td><?php echo $record->customer_address ?></td>
					  <td><?php echo $record->pickup_date ?></td>
                      <td><?php echo $record->commit_date ?></td>
					  <td><?php echo $record->recieving_date ?></td>
					  <td><?php echo $record->Date_dif ?></td>
					  <td><?php if($record->Date_dif > 0){ ?>
							<span class="label label-danger">Deliverd Delay <?php echo $record->Date_dif ?> Days</span> 
						<?php }elseif($record->Date_dif == '' And $record->recieving_date == '0000-00-00'){ ?> 
							<span class="label label-warning">Delivery Pending</span>
						<?php }elseif($record->Date_dif < 0 Or $record->Date_dif == 0 OR $record->commit_date == '0000-00-00' AND $record->recieving_date != '0000-00-00'){ ?>
							<span class="label label-success">Deliverd On Time</span>
						<?php } ?>
					  </td>
					  <td><?php  if($record->tracking_no) { echo $record->tracking_no; }else{ echo 'N/A';}?></td>
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url('shipping').'/editShipping/'.$record->shipping_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a> <!--<strong> | </strong> <a class="btn btn-sm btn-danger" href="<?php echo base_url('shipping').'/deleteShipping/'.$record->shipping_id; ?>" title="Edit"><i class="fa fa-trash-o"></i> </a>--><strong> | </strong>
						 <a data-toggle="modal" class="mClass single-del" style="cursor:pointer;"   title="delete" data-src="<?php echo $record->shipping_id; ?>"><i class="fa fa-trash-o" ></i></a>						  </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
					</tbody>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "companyListing/" + value);
            jQuery("#searchList").submit();
        });
		
		$('.btn-danger').click(function{
			alert();
		})
    });
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#myTable').DataTable({
  		"dom": 'lfBrtip',
		"buttons": ['copy', 'excel', 'pdf', 'print'],
        "processing": true,
        "serverSide": false,
		"sPaginationType": "full_numbers",
		"language": {
			"search": "_INPUT_", 
			"searchPlaceholder": "Search",
			"paginate": {
			    	"next": '<i class="fa fa-angle-right"></i>',
			      "previous": '<i class="fa fa-angle-left"></i>',
			      "first": '<i class="fa fa-angle-double-left"></i>',
			      "last": '<i class="fa fa-angle-double-right"></i>'
			    }
		},
    });
});
$('.box-body').on('click','.single-del', function(e) {
		 if(confirm('Are you sure to remove this record ?'))
        {
			//alert($(this).attr("data-src"));
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('shipping/deleteShipping1/'); ?>",
				data : {
						id: $(this).attr("data-src")
						},
				dataType: "html",
				success: function(data){
				  //  $('#show_vendor_form').html(data);
				  alert(data);
				  location.reload();
				},
				error: function(e) { alert("Error in deleting records."); }
		   });
		}
	
 });
</script>
<!--<script>
function mySearch() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>-->