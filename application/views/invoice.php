<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-file"></i> Invoice Management
        <small>Add / Edit</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group" >
                    <a class="btn btn-success" href="<?php echo base_url(); ?>performaListing"><i class="fa fa-plus"></i> Generate Invoice From Performa</a>
					<a class="btn btn-primary" href="<?php echo base_url(); ?>addInvoice2"><i class="fa fa-plus"></i> Create Invoice</a>
                </div>
				
            </div>
			
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Invoice List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>invoiceListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" id="myInput" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 200px;" placeholder="Search By Invoice Number" onkeyup="mySearch()"/>
                              
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover" id="myTable">
                    <tr>
                      <th>SN.</th>
					  <th>Invoice Number</th>
                      <th>Company Name</th>
                      <th>Client Name</th>
					  <th>Client Company</th>
                      <th>Invoice Total</th>
					  <th>Due Amount</th>
					  <!--<th style="width:20%;">Logo</th>-->
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($invoiceRecords))
                    {
						$i = 1;
                        foreach($invoiceRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo /*$record->invoice_id*/$i++; ?></td>
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
							   <a class="btn btn-sm btn-info" href="<?php echo base_url().'editInvoice/'.$record->invoice_id; ?>" title="Edit Invoice"><i class="fa fa-pencil"></i></a><?php }else{?>
							   <a class="btn btn-sm btn-info" disabled href="<?php echo base_url().'editInvoice/'.$record->invoice_id; ?>" title="Edit"><i class="fa fa-pencil" ></i></a>
							   <?php }?>
						  <strong>|</strong>
                          <a class="btn btn-sm btn-success" href="<?php echo base_url().'viewInvoice/'.$record->invoice_id; ?>" title="View Invoice"><i class="fa fa-eye"></i></a><strong>|</strong>
						  <a class="btn btn-sm btn-danger" href="<?php echo base_url().'pdfdetails/'.$record->invoice_id; ?>" title="View Performa"><i class="fa fa-file-pdf-o"></i></a>
						  
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "invoiceListing/" + value);
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
