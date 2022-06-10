<?php

$invoice_id = '';
$company_name = '';
$client_name= '';
$invoice_subtotal = '';
$company_gst = '';
$invoice_number='';


if(!empty($invoiceInfo))
{
    foreach ($invoiceInfo as $uf)
    {
        $invoice_id = $uf->invoice_id;
        $company_name = $uf->company_name;
        $client_name = $uf->client_name;
        $invoice_subtotal = $uf->invoice_subtotal;
        $amount_due = $uf->amount_due;
		$invoice_number = $uf->invoice_number;
		$amount_paid = $uf->amount_paid;
		$company_id = $uf->company_id;
		$client_id = $uf->client_id;
		$shipping_cost = $uf->shipping_cost;
		$payment_mode = $uf->payment_mode;
		$bill_type = $uf->doctype;
		$spl_msg = $uf->spl_msg;
		
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-file"></i> Invoice Management
        <small>Add / Edit Invoice</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Invoice Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>generatePerformainvoice" method="post" id="updateInvoice" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
							<input type="hidden" name="invoice_id" value="<?php echo $invoice_id;?>">
							<input type="hidden" name="invoice_number" value="<?php echo $invoice_number;?>">
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Company Name</label>
										<input name="search_company" id="search_company" class="form-control" type="text" onkeyup="companySearch();" autocomplete="off" value="<?php echo $company_name?>" disabled>
										<div id="suggestionscompany">
											<div id="suggestionscompanyList">
											</div>
										</div>
										<input type="hidden" id="company_id" name="company_id" value="<?php echo $company_id;?>">
                                    </div>
									
                                    
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Client Name</label>
                                        <input name="search_client" id="search_client" class="form-control" type="text" onkeyup="clientSearch();" autocomplete="off" value="<?php echo $client_name?>" disabled>
										<div id="suggestionsclient">
											<div id="suggestionsclientList">
											</div>
										</div>
										<input type="hidden" id="client_id" name="client_id" value="<?php echo $client_id;?>">
                                    </div>
									
									
                                </div>
								<div class="col-md-3">
                                    <div class="form-group">
									<label for="email">Payment Mode </label>
                                       <input name="payment_mode" id="payment_mode" class="form-control" type="text" value="<?php echo $payment_mode?>" disabled>
									   <input type="hidden" id="payment_mode" name="payment_mode" value="<?php echo $payment_mode;?>">
                                    </div>
										
                                </div>
								<div class="col-md-3">
                                    <div class="form-group">
									<label for="email">Performa Number </label>
										<input type="text" class="form-control" name="performa_number" value="<?php echo $invoice_number;?>" disabled>
										<input type="hidden" class="form-control" name="performa_number" value="<?php echo $invoice_number;?>">
                                    </div>
										
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
									<label for="email">Performa Number </label>
										<input type="text" class="form-control" name="spl_msg" value="<?php echo $spl_msg;?>" disabled>
										<input type="hidden" class="form-control" name="spl_msg" value="<?php echo $spl_msg;?>">
                                    </div>
										
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
							 <table id="invoiceTable" width="100%" border="1" class="table table-bordered table-striped table-highlight">
							        <thead>
									<th>SN.</th>
									<th width="20%">Product Name</th>
									<th>Product Price</th>
									<th>Quantity</th>
									<th>Gst Rate</th>
									<th>Gst Amount</th>
									<th>Discount Rate</th>
									<th>Discount Amount</th>
									<th>Amount</th>
									<th>Paid Amount</th>
							        </thead>
								  <tbody>
									<?php
									   $c = count($invoiceProductInfo);
										if(!empty($invoiceProductInfo))
										{$i=1;
										foreach($invoiceProductInfo as $record)
										{ 
									?>
								  	<tr>
										<td><?php echo $i;?></td>
										<td>
											<input type="hidden" name="product_id[]" id="product_id_<?php echo $i;?>" value="<?php echo $record->product_id ?>">
											<input name="product_name[]" data-type="product_name" id="search_data_<?php echo $i;?>" type="text" class="form-control"  autocomplete="off" value="<?php echo $record->product_name ?>" disabled>
											<input name="product_name[]" data-type="product_name" id="search_data_<?php echo $i;?>" type="hidden" class="form-control" value="<?php echo $record->product_name ?>">
										</td>
										<td>
											<input type="text" data-type="productCode" name="price[]" id="price_<?php echo $i;?>" class="form-control  "  value="<?php echo $record->product_price ?>"disabled>
										</td>
										<td>
											<input type="hidden" name="quantity[]" id="quantity_<?php echo $i;?>" class="form-control changesNo" ondrop="return false;" value="<?php echo $record->product_quantity ?>">
											<input type="text" name="quantity[]" id="quantity_<?php echo $i;?>" class="form-control changesNo" ondrop="return false;" value="<?php echo $record->product_quantity ?>"disabled>
										</td>
										<td>
											<input type="text" data-type="taxAmount" name="tax[]" id="tax_<?php echo $i;?>" class="form-control tax"  value="<?php echo $record->product_gst ?>" disabled>
										</td>
										<td>
											<input type="text" name="taxAmount[]" id="taxAmount_<?php echo $i;?>" class="form-control " autocomplete="off"  value="<?php echo $record->gst_tax_amount ?>" disabled>
											<input type="hidden" name="taxAmounthd[]" id="taxAmounthd_<?php echo $i;?>" class="form-control " autocomplete="off"  value="<?php echo $record->gst_tax_amount ?>" >
										</td>
										<td>
											<input type="text" name="discount[]" id="discount_<?php echo $i;?>" class="form-control discount" autocomplete="off"  ondrop="return false;" value="<?php echo $record->discount_rate ?>" disabled>
											<input type="hidden" name="discount[]" id="discount_<?php echo $i;?>" class="form-control discount"    value="<?php echo $record->discount_rate ?>" onpaste="return false;">
										</td>
										<td>
											<input type="text" name="discountamount[]" id="discountAmount_<?php echo $i;?>" class="form-control discount" disabled autocomplete="off"  ondrop="return false;" onpaste="return false;" value="<?php echo $record->discount_amount ?>">
											<input type="hidden" name="discountamounthd[]" id="discountAmounthd_<?php echo $i;?>" class="form-control discount"  autocomplete="off"  ondrop="return false;" onpaste="return false;"value="<?php echo $record->discount_amount ?>">
										</td>
										<td>
											<input type="text" name="total[]" id="total_<?php echo $i;?>" class="form-control" autocomplete="off"  ondrop="return false;" onpaste="return false;" value="<?php echo $record->pro_total_amount ?>" disabled>
											<input type="hidden" name="totalhd[]" id="totalhd_<?php echo $i;?>" class="form-control" autocomplete="off"  ondrop="return false;" onpaste="return false;" value="<?php echo $record->pro_total_amount ?>">
										</td>
										<td>
											<input type="text" name="product_payable[]" id="product_payable_<?php echo $i;?>" class="form-control totalLinePrice" autocomplete="off"  ondrop="return false;" onpaste="return false;" disabled value="<?php echo $record->net_amount ?>">
											<input type="hidden" name="product_payablehd[]" id="product_payablehd_<?php echo $i;?>" class="form-control " autocomplete="off"  ondrop="return false;" onpaste="return false;" value="<?php echo $record->net_amount ?>" >
										</td>
									</tr>
									<?php
										$i++;}
									}
									?>
								  </tbody>
								</table> 
								<div id="appendrow"></div>
                            </div>  
                            </div>
                            
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
						<div class="col-md-4">
						
                            <input type="submit" class="btn btn-primary" value="Create Invoice" />
                            
						</div>
						<div class='col-md-8'>
							<div class="form-group col-md-3">
								<label>Shipping Cost: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-inr"></i></div>
									<input type="text" class="form-control shipping_cost" name="shipping_cost" id="shipping_cost" value="<?php echo $shipping_cost?>"  ondrop="return false;" onpaste="return false;" disabled>
									<input type="hidden" class="form-control shipping_cost" name="shipping_cost" id="shipping_cost" value="<?php echo $shipping_cost?>"  ondrop="return false;" onpaste="return false;" >
								</div>
							</div>
							<div class="form-group col-md-3">
								<label>Total: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon">$</div>
									<input type="text" class="form-control" name="invoice_subtotal" id="subTotal" placeholder="Subtotal"  ondrop="return false;" onpaste="return false;" value="<?php echo $invoice_subtotal?>" disabled>
									<input type="hidden" class="form-control" name="invoice_subtotal" id="subTotal" placeholder="Subtotal"  ondrop="return false;" onpaste="return false;" value="<?php echo $invoice_subtotal?>">
								</div>
							</div>
							
							
							<div class="form-group col-md-3">
								<label>Amount Paid: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon">$</div>
									<input type="text" class="form-control" name="amount_paid" id="amountPaid" placeholder="Amount Paid"  ondrop="return false;" onpaste="return false;" value="<?php echo $amount_paid?>" disabled>
									<input type="hidden" class="form-control" name="amount_paid" id="amountPaid" placeholder="Amount Paid"  ondrop="return false;" onpaste="return false;" value="<?php echo $amount_paid?>">
								</div>
							</div>
							<div class="form-group col-md-3">
								<label>Amount Due: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon">$</div>
									<input type="text" class="form-control amountDue" name="amount_due" id="amountDue" placeholder="Amount Due"  ondrop="return false;" onpaste="return false;" value="<?php echo $amount_due?>" disabled>
									<input type="hidden" class="form-control amountDue" name="amount_due" id="amountDue" placeholder="Amount Due"  ondrop="return false;" onpaste="return false;" value="<?php echo $amount_due?>">
								</div>
							</div>
						
					</div>
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

