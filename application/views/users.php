
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Management
        <small>Add, Edit</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addNew"><i class="fa fa-plus"></i> Add New Client</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>userListing" method="POST" id="searchList">
                            <div class="input-group">
                              
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body ">
                  <table class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="myTable">
					<thead>
						<tr>
						  <th>Id</th>
						  <th>Name</th>
						  <th>Company</th>
						  <th>Address</th>
						  <th>Mobile</th>
						  <th>Gst Number</th>
						  <th class="text-center" style="width: 75px;">Actions</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
					<tr>
                      <td><?php echo $record->client_id ?></td>
                      <td><?php echo $record->client_name ?></td>
                      <td><?php echo $record->client_company ?></td>
                      <td><?php echo $record->client_address ?></td>
                      <td><?php echo $record->client_mobile ?></td>
					  <td><?php echo $record->client_gst ?></td>
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'editOld/'.$record->client_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a> <strong> | </strong>
						  <a class="btn btn-sm btn-success" href="<?php echo base_url('user').'/addNewAddress/'.$record->client_id; ?>" title="Add New Address"><i class="fa fa-plus"></i></a> </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
					</tbody>
                  </table>
                  
                </div><!-- /.box-body -->
                <!--<div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    /*jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
            jQuery("#searchList").submit();
        });
    });*/
</script>
<script>
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
</script>