<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<link rel='stylesheet' id='custom_css1-css'  href='https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css' type='text/css' media='all' />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-file"></i>Performa Invoice Management
        <small>Add / Edit</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addPerforma"><i class="fa fa-plus"></i> Create Performa Invoice</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Performa Invoice List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>performaListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" id="myInput" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 200px;" placeholder="Search By Performa Number" onkeyup="mySearch()"/>
                              
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
				   <table class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="myTable">
                    <thead>
					<tr>
                      <th></th>
					  <th>Performa Number</th>
                      <th>Company Name</th>
                      <th>Client Name</th>
					  <th>Client Company</th>
                      <th>Total</th>
					  <th>Due Amount</th>
					  <!--<th style="width:20%;">Logo</th>-->
					  <th class="text-center">Actions</th>
					  <th>Generate Invoice</th>
                    </tr>
					</thead>
					<tbody>
                    <?php
                    if(!empty($invoiceRecords))
                    {
						$i=1;
                        foreach($invoiceRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
					  <td><?php echo $record->invoice_number ?></td>
                      <td><?php echo $record->company_name ?></td>
                      <td><?php echo $record->client_name ?></td>
					  <td><?php echo $record->client_company ?></td>
					  
                      <td><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<?php echo $record->invoice_subtotal ?></td>
                      <td><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<?php echo $record->amount_due ?></td>
					  <!--<td><img src='<?php //echo base_url().'assets/images/uploads/'.$record->company_logo ?>' width="100%"></td>-->
                      <td class="text-center">
                          <?php
						       date_default_timezone_set("Asia/Calcutta");
								$invoice_createdate = $record->invoice_createDate;
								$current_date = date("Y-m-d H:i:s");
								$difference = strtotime($current_date) - strtotime($invoice_createdate);
								$h = $difference / 3600;
							   if($h<240){
						  ?> 
							   <a class="btn btn-sm btn-info" href="<?php echo base_url().'editPerforma/'.$record->invoice_id; ?>" title="Edit Performa"><i class="fa fa-pencil"></i></a><?php }else{?>
							   <a class="btn btn-sm btn-info" disabled href="<?php echo base_url().'editPerforma/'.$record->invoice_id; ?>" title="Edit Performa"><i class="fa fa-pencil" ></i></a>
							   <?php }?>
						  <strong>|</strong>
                          <a class="btn btn-sm btn-success" href="<?php echo base_url().'viewPerforma/'.$record->invoice_id; ?>" title="View Performa"><i class="fa fa-eye"></i></a><strong>|</strong>
						  <a class="btn btn-sm btn-danger" href="<?php echo base_url().'pdfdetails/'.$record->invoice_id; ?>" title="View Performa"><i class="fa fa-inr"></i></a><strong>|</strong>
						  <a class="btn btn-sm btn-danger" href="<?php echo base_url('performa').'/pdfdetailsDollar/'.$record->invoice_id; ?>" title="View Performa"><i class="fa fa-usd"></i></a><strong>|</strong>
						  <a class="btn btn-sm btn-warning" href="<?php echo base_url('shipping').'/shippingAdd/'.$record->invoice_id; ?>" title="Shipping" target="_blank"><i class="fa fa-truck"></i></a>
						  
                      </td>
					  <td>
						<div class="form-group">
							<a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>createPerformainvoice/<?php echo $record->invoice_id;?>"><i class="fa fa-file"></i> Generate Invoice</a>
						</div>
					  </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
					</tbody>
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
				
				<button onclick="getSelected()">Submit</button>
				<pre id="example-console-rows"></pre>

<p><b>Form data as submitted to the server:</b></p>
<pre id="example-console-form"></pre>
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type='text/javascript' src='https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js' id='custom_js1-js'></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "performaListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
<script>
function mySearch() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<script>
var table;
$(document).ready(function() {
   table = $('#myTable').DataTable({
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
		'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         }
      ],
      'select': {
         'style': 'multi'
      },
      'order': [[1, 'asc']],
	  iDisplayLength: 10,
            drawCallback: function () {
                var api = this.api();
                var rows = api.rows({ page: 'current' }).nodes();
                var last = null;

                api.column(1, { page: 'current' }).data().each(function (group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            //	'<tr class="group"><td colspan="6">' + group + '</td></tr>'
                        );
                        last = group;
                    }
                });
            }
    });
  
});
function getSelected(){
	var selectedIds = table.columns().checkboxes.checked()[0];
	console.log(selectedIds);
 
	selectedIds.forEach(function(selectedId) {
    alert(selectedId);
	});
}
</script>
