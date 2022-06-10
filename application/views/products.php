<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-shopping-cart"></i> Product Management
        <small>Add</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addProduct"><i class="fa fa-plus"></i> Add New Product</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Product List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>companyListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" id="myInput" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 200px;" placeholder="Search Product" onkeyup="mySearch()"/>
                                                          </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover" id="myTable">
                    <tr>
                      <th>Id</th>
                      <th>Product Name</th>
                      <th>Product Price</th>
                      <th>HSN Number</th>
					  <th>Gst Rate</th>
					  <!--<th style="width:20%;">Logo</th>-->
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($productRecords))
                    {
                        foreach($productRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->product_id ?></td>
                      <td><?php echo $record->product_name ?></td>
                      <td><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<?php echo $record->product_price ?></td>
                      <td><?php echo $record->product_hsn ?></td>
                      <td><?php echo $record->product_gst ?>%</td>
					  <!--<td><img src='<?php //echo base_url().'assets/images/uploads/'.$record->company_logo ?>' width="100%"></td>-->
                      <td class="text-center">
                          <!--<a class="btn btn-sm btn-primary" href="<?//= base_url().'login-history/'.$record->company_id; ?>" title="Login history"><i class="fa fa-history"></i></a>--> 
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'editProduct/'.$record->product_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a> <!--<strong>|</strong>
                          <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php //echo $record->company_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>-->
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
            jQuery("#searchList").attr("action", baseURL + "productListing/" + value);
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