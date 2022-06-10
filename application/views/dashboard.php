<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		  var data = google.visualization.arrayToDataTable([
          ['Status', 'Number Of Count'],
          ['All',     <?php echo $shipping_data_all->all_data; ?>],
		  ['Delayed', <?php echo $shipping_data_delayed->delayed_data; ?>],
		  ['Pending', <?php echo $shipping_data_all->all_data - ($shipping_data_success->success + $shipping_data_delayed->delayed_data); ?>],
          ['Success', <?php echo $shipping_data_success->success; ?>]
         
        ]);

        var options = {
          title: 'Total Shipping Report',
		  is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
		
        chart.draw(data, options);
      }
    </script>
	
	
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <small>Control panel</small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php if($product_count){ echo $product_count;}?></h3>
                  <p>Total Products</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url('product');?>/productListingNew" class="small-box-footer">View All Products <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php if($pi_count){Echo $pi_count;}?></h3>
                  <p>Total Performa Invoice</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file"></i>
                </div>
                <a href="<?php echo base_url();?>performaListing" class="small-box-footer">View All Performa Invoices <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php if (isset($client_count)) {echo  $client_count ;}?></h3>
                  <p>Total Client</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url(); ?>userListing" class="small-box-footer">View All Client <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php if($in_count){Echo $in_count;}?></h3>
                  <p>Total Invoice</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file"></i>
                </div>
                <a href="<?php echo base_url();?>invoiceListing" class="small-box-footer">View All Invoices <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>
    </section>
	<section class="content">
        <div class="row">
            <div class="col-lg-6 col-xs-6">
				<div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title">Recently Added Products</h3>

					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
					  </div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					  <ul class="products-list product-list-in-box">
					  <?php foreach($last_inserted_product as $lastproduct){?>
						<li class="item">
						  <div class="product-img" style="width:33%">
							Product Code : <?php echo $lastproduct->product_model;?>
						  </div>
						  <div class="product-info">
							<p class="product-title" > <span ><?php echo $lastproduct->product_name;?></span>
							
						  </div>
						</li>
					  <?php }?>
					  </ul>
					</div>
					<!-- /.box-body -->
					<div class="box-footer text-center">
					  <a href="<?php echo base_url('product');?>/productListingNew" class="uppercase">View All Products</a>
					</div>
            <!-- /.box-footer -->
				</div>
            </div><!-- ./col -->
			<div class="col-lg-6 col-xs-6">
				<div class="box box-success">
					<div class="box-header with-border">
					  <h3 class="box-title">Recently Created Performa Invoices</h3>

					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
					  </div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					  <ul class="products-list product-list-in-box">
					  <?php foreach($last_inserted_PI_invoice as $lastpiinvoive){?>
						<li class="item">
						  <div class="product-img" style="width:22%">
							<?php echo $lastpiinvoive->invoice_number;?>
						  </div>
						  <div class="product-img" style="width:25%">
							<?php echo $lastpiinvoive->client_name;?>
						  </div>
						  <div class="product-info">
							<p class="product-title" > <span ><?php echo $lastpiinvoive->company_name;?></span>
							
							  <span class="pull-right"><i class="fa fa-inr"></i> <?php echo $lastpiinvoive->invoice_subtotal;?></span></p>
							<!--<span class="product-description">
								  <?php echo $lastpiinvoive->product_gst;?>
							 </span>-->
						  </div>
						</li>
					  <?php }?>
					  </ul>
					</div>
					<!-- /.box-body -->
					<div class="box-footer text-center">
					  <a href="<?php echo base_url();?>performaListing" class="uppercase">View All Performa Invoices</a>
					</div>
            <!-- /.box-footer -->
				</div>
            </div><!-- ./col -->
			<div class="col-lg-6 col-xs-6">
				<div class="box box-warning">
					<div class="box-header with-border">
					  <h3 class="box-title">Recently Added Clients</h3>

					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
					  </div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					  <ul class="products-list product-list-in-box">
					  <?php foreach($last_inserted_client as $lastclients){?>
						<li class="item">
						  <div class="product-img" style="width:22%">
							<?php echo $lastclients->client_name;?>
						  </div>
						  <div class="product-img" style="width:55%">
							<?php echo $lastclients->client_company;?>
						  </div>
						  <div class="product-info">
							<p class="product-title pull-right" > <span ><?php echo $lastclients->client_mobile;?></span></p>
							<!--<span class="product-description">
								  <?php echo $lastclients->product_gst;?>
							 </span>-->
						  </div>
						</li>
					  <?php }?>
					  </ul>
					</div>
					<!-- /.box-body -->
					<div class="box-footer text-center">
					  <a href="<?php echo base_url();?>userListing" class="uppercase">View All Clients</a>
					</div>
            <!-- /.box-footer -->
				</div>
            </div><!-- ./col -->
			<div class="col-lg-6 col-xs-6">
				<div class="box box-danger">
					<div class="box-header with-border">
					  <h3 class="box-title">Recently Created Invoices</h3>

					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
					  </div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					  <ul class="products-list product-list-in-box">
					  <?php foreach($last_inserted_In_invoice as $lastininvoice){?>
						<li class="item">
						  <div class="product-img" style="width:22%">
							<?php echo $lastininvoice->invoice_number;?>
						  </div>
						  <div class="product-img" style="width:25%">
							<?php echo $lastininvoice->client_name;?>
						  </div>
						  <div class="product-info">
							<p class="product-title" > <span ><?php echo $lastininvoice->company_name;?></span>
							
							  <span class="pull-right"><i class="fa fa-inr"></i> <?php echo $lastininvoice->invoice_subtotal;?></span></p>
							<!--<span class="product-description">
								  <?php echo $lastininvoice->product_gst;?>
							 </span>-->
						  </div>
						</li>
					  <?php }?>
					  </ul>
					</div>
					<!-- /.box-body -->
					<div class="box-footer text-center">
					  <a href="<?php echo base_url();?>invoiceListing" class="uppercase">View All Invoices</a>
					</div>
            <!-- /.box-footer -->
				</div>
            </div>
        </div>    
    </section>
	<section class="content">
        <div class="row">
			<div class="col-lg-6 col-xs-6 col-md-6">
				<div id="piechart" style="width: 800px; height: 500px;"></div>
			</div>
			<div class="col-lg-6 col-xs-6 col-md-6">
				<div class="col-md-12">
				  <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Shiping Detail Table ( According Vendor )</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					  <table class="table table-bordered" style="text-align: center;">
						<tr>
						  <th style="width: 10px">#</th>
						  <th>Vendor Name</th>
						  <th>All Courior Count</th>
						  <th>Timely Deliver</th>
						  <th>Pending</th>
						  <th>Late Deliver</th>
						</tr>
						<?php $i=1;
						foreach($vendor_shipping_data as $data){ ;?>
						<tr>
						  <td><?php echo $i++; ?></td>
						  <td><?php echo ($data->vendor_name)? $data->vendor_name :'0'; ?></td>
						  <td><?php echo ($data->All_count)? $data->All_count :'0'; ?></td>
						  <td><?php echo ($data->sucess)? $data->sucess :'0';  ?> </td>
						  <td><?php echo ($data->pending)? $data->pending :'0'; ?></td>
						  <td><?php echo ($data->delay)? $data->delay :'0'; ?>  </td>
						</tr>
						<?php }?>
					  </table>
					</div>
					<!-- /.box-body -->
				  </div>
				</div>
			</div>
		</div>
	</section>
</div>
