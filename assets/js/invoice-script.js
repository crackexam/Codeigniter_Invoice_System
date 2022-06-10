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
	html4 = '<td><input type="text" name="price[]" id="price_'+i+'" class="form-control" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" disabled></td>';
	html5 = '<td><input type="text" name="quantity[]" id="quantity_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html6 = '<td><input type="text"  name="tax_rate[]" id="tax_'+i+'" class="form-control tax" autocomplete="off" disabled></td>';
	html7 = '<td><input type="text"  name="taxAmount[]" id="taxAmount_'+i+'" class="form-control " autocomplete="off" disabled><input type="hidden"  name="taxAmounthd[]" id="taxAmounthd_'+i+'" class="form-control " autocomplete="off"></td>';
	html8 = '<td><input type="text"  name="discount[]" id="discount_'+i+'" class="discount form-control " autocomplete="off"></td>';
	html81 = '<td><input type="text" name="discountamount[]" id="discountAmount_'+i+'" class="discount form-control " autocomplete="off" disabled><input type="hidden" name="discountamounthd[]" id="discountAmounthd_'+i+'" class="discount form-control " autocomplete="off"></td>';
	html9 = '<td><input type="text" name="total[]" id="total_'+i+'" class="form-control" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" disabled><input type="hidden" name="totalhd[]" id="totalhd_'+i+'" class="form-control" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html91 = '<td><input type="text" name="product_payable[]" id="product_payable_'+i+'" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" disabled><input type="hidden" name="product_payablehd[]" id="product_payablehd_'+i+'" class="form-control" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
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
	calculateTax();
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
	$('#discountAmounthd_'+id[1]).val( discount_amount.toFixed(2) );
	var paid_amount = (total_line_amount - discount_amount);
	 z = parseFloat(paid_amount) + parseFloat(gst_amount);
	//alert(paid_amount);
	
	$('#product_payable_'+id[1]).val(z);
	$('#product_payablehd_'+id[1]).val(z);
	var subTotal=0;
	$('.totalLinePrice').each(function(){
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
		$('#subTotal').val( subTotal.toFixed(2));
	});
});

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
