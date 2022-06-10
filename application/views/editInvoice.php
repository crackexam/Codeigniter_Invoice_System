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
                    <form role="form" action="<?php echo base_url() ?>updateInvoice" method="post" id="updateInvoice" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
							<input type="hidden" name="invoice_number" value="<?php echo $invoice_number;?>">
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Select Company</label>
										<input name="search_company" id="search_company" class="form-control" type="text" onkeyup="companySearch();" autocomplete="off" value="<?php echo $company_name?>">
										<div id="suggestionscompany">
											<div id="suggestionscompanyList">
											</div>
										</div>
										<input type="hidden" id="company_id" name="company_id" value="<?php echo $company_id;?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Select Client </label>
                                        <input name="search_client" id="search_client" class="form-control" type="text" onkeyup="clientSearch();" autocomplete="off" value="<?php echo $client_name?>">
										<div id="suggestionsclient">
											<div id="suggestionsclientList">
											</div>
										</div>
										<input type="hidden" id="client_id" name="client_id" value="<?php echo $client_id;?>">
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="form-group">
									<label for="email">Select Payment Mode </label>
                                       <select class="form-control " id="payment_mode" name="payment_mode">
											<option value="0">Select</option>
											<option value="Cash" <?php if($payment_mode=="Cash") echo 'selected="selected"'; ?>>Cash</option>
											<option value="Cheque" <?php if($payment_mode=="Cheque") echo 'selected="selected"'; ?>>Cheque</option>
											<option value="Online Bank Transfer" <?php if($payment_mode=="Online Bank Transfer") echo 'selected="selected"'; ?>>Online Bank Transfer</option>
									   </select>
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="form-group">
									<label for="email">Bill Type</label>
                                       <select class="form-control " id="invoice_type" name="invoice_type" disabled>
											<option value="0">Select</option>
											<option value="Invoice" <?php if($bill_type=="Invoice") echo 'selected="selected"'; ?>>Invoice</option>
											<option value="Performa Invoice" <?php if($bill_type=="Performa Invoice") echo 'selected="selected"'; ?>>Performa Invoice</option>
									   </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
							 <table id="invoiceTable" width="100%" border="1" class="table table-bordered table-striped table-highlight">
							        <thead>
									<th><input id="check_all" class="formcontrol" type="checkbox"/></th>
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
										<td><INPUT type="checkbox" class="case" name="chk"/></td>
										<td><input type="hidden" name="product_id[]" id="product_id_<?php echo $i;?>" value="<?php echo $record->product_id ?>">
										<input name="product_name[]" data-type="product_name" id="search_data_<?php echo $i;?>" type="text" class="form-control" onkeyup="productSearch(this);" autocomplete="off" value="<?php echo $record->product_name ?>">
											<div id="suggestions<?php echo $i;?>">
												<div id="autoSuggestionsList<?php echo $i;?>">
												</div>
											</div>
										</td>
										<td><input type="text" data-type="productCode" name="price[]" id="price_<?php echo $i;?>" class="form-control  "  value="<?php echo $record->product_price ?>"disabled></td>
										<td><input type="text" name="quantity[]" id="quantity_<?php echo $i;?>" class="form-control changesNo" autocomplete="off"  ondrop="return false;" onpaste="return false;" value="<?php echo $record->product_quantity ?>"></td>
										<td><input type="text" data-type="taxAmount" name="tax[]" id="tax_<?php echo $i;?>" class="form-control tax"  value="<?php echo $record->product_gst ?>" disabled></td>
										<td><input type="text" name="taxAmount[]" id="taxAmount_<?php echo $i;?>" class="form-control " autocomplete="off"  value="<?php echo $record->gst_tax_amount ?>" disabled>
										<input type="hidden" name="taxAmounthd[]" id="taxAmounthd_<?php echo $i;?>" class="form-control " autocomplete="off"  value="<?php echo $record->gst_tax_amount ?>" ></td>
										<td><input type="text" name="discount[]" id="discount_<?php echo $i;?>" class="form-control discount" autocomplete="off"  ondrop="return false;" value="<?php echo $record->discount_rate ?>" onpaste="return false;"></td>
										<td><input type="text" name="discountamount[]" id="discountAmount_<?php echo $i;?>" class="form-control discount" disabled autocomplete="off"  ondrop="return false;" onpaste="return false;" value="<?php echo $record->discount_amount ?>">
										<input type="hidden" name="discountamounthd[]" id="discountAmounthd_<?php echo $i;?>" class="form-control discount"  autocomplete="off"  ondrop="return false;" onpaste="return false;"value="<?php echo $record->discount_amount ?>"></td>
										<td><input type="text" name="total[]" id="total_<?php echo $i;?>" class="form-control" autocomplete="off"  ondrop="return false;" onpaste="return false;" value="<?php echo $record->pro_total_amount ?>" disabled>
										<input type="hidden" name="totalhd[]" id="totalhd_<?php echo $i;?>" class="form-control" autocomplete="off"  ondrop="return false;" onpaste="return false;" value="<?php echo $record->pro_total_amount ?>"></td>
										<td><input type="text" name="product_payable[]" id="product_payable_<?php echo $i;?>" class="form-control totalLinePrice" autocomplete="off"  ondrop="return false;" onpaste="return false;" disabled value="<?php echo $record->net_amount ?>"><input type="hidden" name="product_payablehd[]" id="product_payablehd_<?php echo $i;?>" class="form-control " autocomplete="off"  ondrop="return false;" onpaste="return false;" value="<?php echo $record->net_amount ?>" ></td>
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
						<div class="col-md-3">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="button" class="btn btn-success" value="Add Product"  id="addmore"/>
                            <input type="button" class="btn btn-danger" value="Remove Product" id="delete"/>
						</div>
						<div class='col-md-9'>
							<div class="form-group col-md-2">
								<label>Shipping Cost: &nbsp;</label><span id='max_gst'></span>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-inr"></i></div>
									<input type="text" class="form-control shipping_cost" name="shipping_cost" id="shipping_cost" value="0" placeholder="Shipping Cost"  ondrop="return false;" onpaste="return false;">
								</div>
							</div>
							<div class="form-group col-md-2">
								<label>Shipping Tax: &nbsp;</label><span id='max_gst'></span>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-inr"></i></div>
									<input type="text" class="form-control shipping_tax" name="shipping_tax" id="shipping_tax" value="0" placeholder="Shipping Cost"  ondrop="return false;" onpaste="return false;">
								</div>
							</div>
							<div class="form-group col-md-2">
								<label>Shipping Tax Ammount: &nbsp;</label><span id='max_gst'></span>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-inr"></i></div>
									<input type="text" class="form-control shipping_tax_ammount" name="shipping_tax_ammount" id="shipping_tax_ammount" value="0" placeholder="Shipping Cost"  ondrop="return false;" onpaste="return false;">
								</div>
							</div>
							<div class="form-group col-md-2">
								<label>Total: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-inr"></i></div>
									<input type="text" class="form-control" name="invoice_subtotal" id="subTotal" placeholder="Subtotal"  ondrop="return false;" onpaste="return false;">
								</div>
							</div>
							
							<div class="form-group col-md-2">
								<label>Amount Paid: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-inr"></i></div>
									<input type="text" class="form-control" name="amount_paid" id="amountPaid" placeholder="Amount Paid"  ondrop="return false;" onpaste="return false;">
								</div>
							</div>
							<div class="form-group col-md-2">
								<label>Amount Due: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-inr"></i></div>
									<input type="text" class="form-control amountDue" name="amount_due" id="amountDue" placeholder="Amount Due"  ondrop="return false;" onpaste="return false;">
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
<script src="<?php echo base_url(); ?>assets/js/updateCompany.js" type="text/javascript"></script>
<script>
var i=$('table#invoiceTable tr').length;
$("#addmore").on('click',function(){
	html1 = '<tr>';
	html2 = '<td><input class="case" type="checkbox"/></td>';
	html3 = '<td><input type="hidden" name="product_id[]" id="product_id_'+i+'"><input name="product_name[]" data-type="productName" id="search_data_'+i+'" type="text" class="form-control" onkeyup="productSearch(this);" autocomplete="off"><div id="suggestions'+i+'"><div id="autoSuggestionsList'+i+'"></div></div></td>';
	html4 = '<td><input type="text" name="price[]" id="price_'+i+'" class="form-control" autocomplete="off"  ondrop="return false;" onpaste="return false;" disabled></td>';
	html5 = '<td><input type="text" name="quantity[]" id="quantity_'+i+'" class="form-control changesNo" autocomplete="off"  ondrop="return false;" onpaste="return false;"></td>';
	html6 = '<td><input type="text"  name="tax_rate[]" id="tax_'+i+'" class="form-control tax" autocomplete="off" disabled></td>';
	html7 = '<td><input type="text"  name="taxAmount[]" id="taxAmount_'+i+'" class="form-control " autocomplete="off" disabled><input type="hidden"  name="taxAmounthd[]" id="taxAmounthd_'+i+'" class="form-control " autocomplete="off"></td>';
	html8 = '<td><input type="text"  name="discount[]" id="discount_'+i+'" class="discount form-control " autocomplete="off"></td>';
	html81 = '<td><input type="text" name="discountamount[]" id="discountAmount_'+i+'" class="discount form-control " autocomplete="off" disabled><input type="hidden" name="discountamounthd[]" id="discountAmounthd_'+i+'" class="discount form-control " autocomplete="off"></td>';
	html9 = '<td><input type="text" name="total[]" id="total_'+i+'" class="form-control" autocomplete="off"  ondrop="return false;" onpaste="return false;" disabled><input type="hidden" name="totalhd[]" id="totalhd_'+i+'" class="form-control" autocomplete="off"  ondrop="return false;" onpaste="return false;"></td>';
	html91 = '<td><input type="text" name="product_payable[]" id="product_payable_'+i+'" class="form-control totalLinePrice" autocomplete="off"  ondrop="return false;" onpaste="return false;" disabled><input type="hidden" name="product_payablehd[]" id="product_payablehd_'+i+'" class="form-control" autocomplete="off"  ondrop="return false;" onpaste="return false;"></td>';
	html0 = '</tr>';
	$('table#invoiceTable').append(html1+html2+html3+html4+html5+html6+html7+html8+html81+html9+html91+html0);
	i++;
	document.getElementById("count").value=i-1;
});
//to check all checkboxes
$(document).on('change','#check_all',function(){
	$('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
});
//deletes the selected table rows
$("#delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal();
});
$(document).on('keyup','.shipping_cost',function(){
	calculateTotal();
});
//price change
$(document).on('change keyup blur','.changesNo',function(){
	id_arr = $(this).attr('id');
	id = id_arr.split("_");
	quantity = $('#quantity_'+id[1]).val();
	price = $('#price_'+id[1]).val();
	if( quantity!='' && price !='' ) $('#total_'+id[1]).val( (parseFloat(price)*parseFloat(quantity)).toFixed(2));	
	if( quantity!='' && price !='' ) $('#totalhd_'+id[1]).val( (parseFloat(price)*parseFloat(quantity)).toFixed(2));
	//calculateTotal();
	calculateTax();
});
$(document).on('change keyup blur','.shipping_cost',function(){
	calculateTotal();
});
function calculateTax(){
	var gst = $('#tax_'+id[1]).val();
	//alert(gst);
	var price = $('#total_'+id[1]).val();
	var taxAmount = price * ( parseFloat(gst) /100 );
	$('#taxAmount_'+id[1]).val(taxAmount.toFixed(2));
	$('#taxAmounthd_'+id[1]).val(taxAmount.toFixed(2));
}
$(document).on('change keyup blur','#amountPaid',function(){
	calculateAmountDue();
});
function calculateAmountDue(){
	amountPaid = $('#amountPaid').val();
	total = $('#subTotal').val();
	if(amountPaid != '' && typeof(amountPaid) != "undefined" ){
		amountDue = parseFloat(total) - parseFloat( amountPaid );
		$('.amountDue').val( amountDue.toFixed(2) );
	}else{
		total = parseFloat(total).toFixed(2);
		$('.amountDue').val( total );
	}
}
$(document).on('change keyup blur','.discount',function(){
	id_arr = $(this).attr('id');
	id = id_arr.split("_");
	var discount = $('#discount_'+id[1]).val();
	var gst_amount = $('#taxAmount_'+id[1]).val();
	//alert(gst_amount);
	var total_line_amount=$('#total_'+id[1]).val();
	//alert(total_line_amount);
	var discount_amount = (total_line_amount*discount)/100;
	$('#discountAmount_'+id[1]).val( discount_amount.toFixed(2) );
	$('#discountAmounthd_'+id[1]).val( discount_amount.toFixed(2) );
	var paid_amount = (total_line_amount - discount_amount);
	 z = parseFloat(paid_amount) + parseFloat(gst_amount);
	//alert(paid_amount);
	$('#product_payable_'+id[1]).val(z);
	$('#product_payablehd_'+id[1]).val(z);
	calculateTotal();
	/*var subTotal=0;
	$('.totalLinePrice').each(function(){
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
		$('#subTotal').val( subTotal.toFixed(2));
	});*/
});
/*function calculateTotal(){
	var subTotal=0;
$('.totalLinePrice').each(function(){
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
		//$('#subTotal').val( subTotal.toFixed(2));
		//$('#amountDue').val( subTotal.toFixed(2));
		var shipping = $('#shipping_cost').val();
		shipping = $('#shipping_cost').val();
	  cal = parseFloat(subTotal)+parseFloat(shipping);
	//alert(cal);
	$('#subTotal').val(cal);
	$('#amountDue').val(cal);
	});	
}*/
function calculateTotal(){
	var subTotal=0;
$('.totalLinePrice').each(function(){
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
		//$('#subTotal').val( subTotal.toFixed(2));
		//$('#amountDue').val( subTotal.toFixed(2));
		var shipping = $('#shipping_cost').val();
		shipping = $('#shipping_cost').val();
	  cal = parseFloat(subTotal)+parseFloat(shipping);
	//alert(cal);
	$('#subTotal').val(cal);
	$('#amountDue').val(cal);
	});	
}
function productSearch(obj)
{
	var input_data = obj.value;
	var numid=obj.id;
	numid=numid.replace("search_data_","");
	$("#autoSuggestionsList"+numid).show();
	//alert(input_data);
	if (input_data.length === 0)
	{
		$('#suggestions'+numid).hide();
	}
	else
	{
		var post_data = {
			'search_data': input_data,
			'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
		};
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>invoice/autocomplete",
			data: post_data,
			success: function (data) {
				// return success
				if (data.length > 0) {
					$('#suggestions'+numid).show();
					$('#autoSuggestionsList'+numid).addClass('auto_list');
					$('#autoSuggestionsList'+numid).html(data);
					var tmpd='#autoSuggestionsList'+numid+' li a';
					$(tmpd).click(function() {
					//	$("autoSuggestionsList"+numid).delegate("li a", "click", function(){
						//var code = this.split("|");
						var tmpd1='#autoSuggestionsList'+numid+' li span';
						var code1 = $(tmpd1).html();
						//alert(code1);
						//var code = $(this).html();
						var ss = code1.split("|");
						//alert(ss[0]);
						document.getElementById("search_data_"+numid).value=ss[0];
						document.getElementById("price_"+numid).value=ss[1];
						document.getElementById("tax_"+numid).value=ss[2];
						document.getElementById("product_id_"+numid).value=ss[3];
						$("#autoSuggestionsList"+numid).hide();
					});
				}
			}
		});
	}
}
</script>
<script type="text/javascript">
            function clientSearch()
            {
                var input_data = $('#search_client').val();
				$("#suggestionsclientList").show();
                if (input_data.length === 0)
                {
                    $('#suggestionsclient').hide();
                }
                else
                {
                    var post_data = {
                        'search_client': input_data,
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    };
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>invoice/autocompleteclient/",
                        data: post_data,
                        success: function (data) {
                            // return success
                            if (data.length > 0) {
                                $('#suggestionsclient').show();
                                $('#suggestionsclientList').addClass('auto_list');
                                $('#suggestionsclientList').html(data);
								$("#suggestionsclientList li a").click(function() {
								var tmpd1='#suggestionsclientList li span';
						        var code1 = $(tmpd1).html();
								//alert(code1);
								var item = $(this).html();
								var ss = item.split("|");
									document.getElementById("search_client").value=ss[0];
									document.getElementById("client_id").value=code1;
									$("#suggestionsclientList").hide();
								});
                            }
                        }
                    });
                }
            }
        </script>
<script type="text/javascript">
            function companySearch()
            {
                var input_data = $('#search_company').val();
				$("#suggestionscompanyList").show();
                if (input_data.length === 0)
                {
                    $('#suggestionscompany').hide();
                }
                else
                {
                    var post_data = {
                        'search_company': input_data,
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    };
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>invoice/autocompletecompany/",
                        data: post_data,
                        success: function (data) {
                            // return success
                            if (data.length > 0) {
                                $('#suggestionscompany').show();
                                $('#suggestionscompanyList').addClass('auto_list');
                                $('#suggestionscompanyList').html(data);
								$("#suggestionscompanyList li a").click(function() {
									//alert($(this).html()); 
									var tmpd1='#suggestionscompanyList li span';
									var code1 = $(tmpd1).html();
									var item = $(this).html();
									var ss = item.split("|");
									document.getElementById("search_company").value=ss[0];
									document.getElementById("company_id").value=code1;
									$("#suggestionscompanyList").hide();
								});
                            }
                        }
                    });
                }
            }
       </script>