<?php error_reporting(0);?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url() ?>assets/js/select2.min.js"></script>
<style>

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-file"></i>Performa Invoice Management
        <small>Add / Edit Performa Invoice</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Performa Invoice Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addProduct" action="<?php echo base_url() ?>savePerforma" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Select Company</label>
                                        <input name="search_company" id="search_company" class="form-control" type="text" onkeyup="companySearch();" autocomplete="off">
										<div id="suggestionscompany">
											<div id="suggestionscompanyList">
											</div>
										</div>
										<input type="hidden" id="company_id" name="company_id">
										
                                    </div>
									
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Select Client </label>
										<input name="search_client" id="search_client" class="form-control" onblur="addresses();" type="text" onkeyup="clientSearch();"  autocomplete="off">
										<div id="suggestionsclient">
											<div id="suggestionsclientList">
											</div>
										</div>
										<input type="hidden" id="client_id" name="client_id"> 
                                        
                                    </div>
										
                                </div>
								<div class="col-md-4">
                                    <div class="form-group">
									<label for="email">Select Payment Mode </label>
                                       <select class="form-control " id="payment_mode" name="payment_mode">
											<option value="0">Select</option>
											<option value="Cash">Cash</option>
											<option value="Cheque">Cheque</option>
											<option value="Online Bank Transfer">Online Bank Transfer</option>
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
									<th>Offer Price</th>
									<th>Amount</th>
									<th>Paid Amount</th>
							        </thead>
								  <tbody>
									<tr>
										<td><INPUT type="checkbox" class="case" name="chk"/></td>
										<td><input type="hidden" name="product_id[]" id="product_id_1">
										<input name="product_name[]" data-type="product_name" id="search_data_1" type="text" class="form-control" onkeyup="productSearch(this);" autocomplete="off">
											<div id="suggestions1">
												<div id="autoSuggestionsList1">
												</div>
											</div>
										</td>
										<td><input type="text" data-type="productCode" name="price[]" id="price_1" class="form-control  "  disabled></td>
										<td><input type="text" name="quantity[]" id="quantity_1" class="form-control changesNo" autocomplete="off"  ondrop="return false;" onpaste="return false;"></td>
										<td><input type="text" data-type="taxAmount" name="tax[]" id="tax_1" class="form-control tax"  disabled></td>
										<td><input type="text" name="taxAmount[]" id="taxAmount_1" class="form-control " autocomplete="off"  disabled>
										<input type="hidden" name="taxAmounthd[]" id="taxAmounthd_1" class="form-control " autocomplete="off"  ></td>
										<td><input type="text" name="discount[]" id="discount_1" class="form-control discount" autocomplete="off"  ondrop="return false;" onpaste="return false;"></td>
										<td><input type="text" name="discountamounthd[]" id="discountAmounthd_1" class="form-control discountamounthd"  autocomplete="off"  ondrop="return false;" onpaste="return false;"></td>
										<td><input type="text" name="total[]" id="total_1" class="form-control" autocomplete="off"  ondrop="return false;" onpaste="return false;" disabled>
										<input type="hidden" name="totalhd[]" id="totalhd_1" class="form-control" autocomplete="off"  ondrop="return false;" onpaste="return false;"></td>
										<td><input type="text" name="product_payable[]" id="product_payable_1" class="form-control totalLinePrice" autocomplete="off"  ondrop="return false;" onpaste="return false;" disabled><input type="hidden" name="product_payablehd[]" id="product_payablehd_1" class="form-control " autocomplete="off"  ondrop="return false;" onpaste="return false;" ></td>
									</tr>
									
								  </tbody>
								</table> 
								<div id="appendrow"></div>
                            </div>
							
						    </div>
                            
                        </div><!-- /.box-body -->
						
                        <div class="box-footer">
						<div class="col-md-4">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="button" class="btn btn-success" value="Add Product"  id="addmore"/>
                            <input type="button" class="btn btn-danger" value="Remove Product" id="delete"/>
						</div>
						<div class='col-md-8'>
							<div class="form-group col-md-3">
								<label>Shipping Cost: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-inr"></i></div>
									<input type="text" class="form-control shipping_cost" name="shipping_cost" id="shipping_cost" placeholder="Shipping Cost"  ondrop="return false;" onpaste="return false;">
								</div>
							</div>
						
							<div class="form-group col-md-3">
								<label>Total: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-inr"></i></div>
									<input type="text" class="form-control" name="invoice_subtotal" id="subTotal" placeholder="Subtotal"  ondrop="return false;" onpaste="return false;">
								</div>
							</div>
							
							<div class="form-group col-md-3">
								<label>Amount Paid: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-inr"></i></div>
									<input type="text" class="form-control" name="amount_paid" id="amountPaid" placeholder="Amount Paid"  ondrop="return false;" onpaste="return false;">
								</div>
							</div>
							<div class="form-group col-md-3">
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
    <?php
	//$cli=json_encode($Product);
	?>
</div>
<!--<script src="<?php //echo base_url(); ?>assets/js/addProduct.js" type="text/javascript"></script>-->
<script type="text/javascript">
	function addresses()
	{
		var input_data = $('#client_id').val();
		alert(input_data);
		/*$("#suggestionsclientList").show();
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

		}*/
	}
</script>
<SCRIPT language="javascript">
		
$(document).ready(function() {
    $(".js-example-tags").select2({
	tags: true
	});
});	

function callsearch(obj){
	   $(".js-example-tags"+obj).select2({
	tags: true
});
}
$(function () {
        $(".js-example-tags").change(function (){
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
            //alert("Selected Text: " + selectedText + " Value: " + selectedValue);
        });
    });
</SCRIPT>
<script>
var i=$('table#invoiceTable tr').length;
$("#addmore").on('click',function(){
	//var rnd=Math.floor(Math.random() * 10001);
	//var obj1 = JSON.parse(<?php echo json_encode($cli) ?>);
	html1 = '<tr>';
	html2 = '<td><input class="case" type="checkbox"/></td>';
	
	html3 = '<td><input type="hidden" name="product_id[]" id="product_id_'+i+'"><input name="product_name[]" data-type="productName" id="search_data_'+i+'" type="text" class="form-control" onkeyup="productSearch(this);" autocomplete="off"><div id="suggestions'+i+'"><div id="autoSuggestionsList'+i+'"></div></div></td>';
	html4 = '<td><input type="text" name="price[]" id="price_'+i+'" class="form-control" autocomplete="off"  ondrop="return false;" onpaste="return false;" disabled></td>';
	html5 = '<td><input type="text" name="quantity[]" id="quantity_'+i+'" class="form-control changesNo" autocomplete="off"  ondrop="return false;" onpaste="return false;"></td>';
	html6 = '<td><input type="text"  name="tax_rate[]" id="tax_'+i+'" class="form-control tax" autocomplete="off" disabled></td>';
	html7 = '<td><input type="text"  name="taxAmount[]" id="taxAmount_'+i+'" class="form-control " autocomplete="off" disabled><input type="hidden"  name="taxAmounthd[]" id="taxAmounthd_'+i+'" class="form-control " autocomplete="off"></td>';
	html8 = '<td><input type="text"  name="discount[]" id="discount_'+i+'" class="discount form-control " autocomplete="off"></td>';
	html81 = '<td><input type="text" name="discountamounthd[]" id="discountAmounthd_'+i+'" class="discountamounthd form-control " autocomplete="off" ></td>';
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
	$('#discountAmounthd_'+id[1]).val( discount_amount.toFixed(2));
	var paid_amount = (total_line_amount - discount_amount);
	 z = parseFloat(paid_amount) + parseFloat(gst_amount);
	//alert(paid_amount);
	
	$('#product_payable_'+id[1]).val(z.toFixed(2));
	$('#product_payablehd_'+id[1]).val(z.toFixed(2));
	$('#amountPaid').val(0);
	calculateTotal();
	/*var subTotal=0;
	$('.totalLinePrice').each(function(){
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
		$('#subTotal').val( subTotal.toFixed(2));
	});*/
});
$(document).on('change keyup blur','.discountamounthd',function(){
	
	id_arr = $(this).attr('id');
	id = id_arr.split("_");
	var discount = $('#discountAmounthd_'+id[1]).val();
	var quantity = $('#quantity_'+id[1]).val();
	var Total = $('#totalhd_'+id[1]).val();
	//discount = discount*quantity;
	//alert(quantity);
	var disper = parseFloat(discount)/parseFloat(Total)*100;
	//var disper1 = disper/100;
	$('#discount_'+id[1]).val(disper.toFixed(2));
	
	var gst_amount = $('#taxAmount_'+id[1]).val();
	var total_line_amount=$('#total_'+id[1]).val();
	var paid_amount = (total_line_amount - discount);
	 z = parseFloat(paid_amount) + parseFloat(gst_amount);
	//alert(paid_amount);
	
	$('#product_payable_'+id[1]).val(z.toFixed(2));
	$('#product_payablehd_'+id[1]).val(z.toFixed(2));
	$('#amountPaid').val(0);
	calculateTotal();
	//alert(disper);
	
});

$(document).on('change keyup blur','.shipping_cost',function(){
	calculateTotal();
	
});
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