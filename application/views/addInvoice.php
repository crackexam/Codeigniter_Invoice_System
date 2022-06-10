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
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addProduct" action="<?php echo base_url() ?>addInvoice" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Select Company</label>
                                        
										<select class="form-control required" id="company_name" name="company_name">
                                            <option value="0">Select Company</option>
                                            <?php
                                            if(!empty($Company))
                                            {
                                                foreach ($Company as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->company_id ?>" <?php if($rl->company_id == set_value('company_name')) {echo "selected=selected";} ?>><?php echo $rl->company_name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
										<!--<input type="text" class="form-control required"  id="search_company" name="search_company"><select class="itemName form-control"  name="itemName"></select>-->
                                    </div>
									
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Select Client </label>
                                        <select class="form-control selectpicker" id="company_name" name="company_name" data-live-search="true">
                                            
                                            <?php
                                            if(!empty($Client))
                                            {
                                                foreach ($Client as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->client_id ?>" <?php if($rl->client_id == set_value('client_name')) {echo "selected=selected";} ?>><?php echo $rl->client_name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
									
									
                                </div>
                            </div>
                            <div class="row">
							
							<div class="col-md-12">
							 <table id="invoiceTable" width="100%" border="1" class="table table-bordered table-striped table-highlight">
							        <thead>
									<th></th>
									<th>Product</th>
									<th>Rate</th>
									<th>Gst Rate</th>
									<th>HSN Number</th>
									<th>Quantity</th>
									<th>Discount</th>
									<th>Total Ammount</th>
							        </thead>
								  <tbody>
									<tr>
										<td><INPUT type="checkbox" name="chk"/></td>
										<td><select class="js-example-tags form-control" id="company_name[]" name="data[0]['product_id']" data-live-search="true">
                                            <option>Search Product</option>
                                            <?php
                                            if(!empty($Product))
                                            {
                                                foreach ($Product as $rl)
                                                {
                                                    ?>
                                                    <option data-tokens="<?php echo $rl->product_id ?>" value="<?php echo $rl->product_id ?>" <?php if($rl->product_id == set_value('product_name')) {echo "selected=selected";} ?>><?php echo $rl->product_name ?></option>
													<?php
													
                                                }
                                            }
                                            ?>
                                        </select>
										</td>
										<td><input type="text" data-type="productCode" name="data[0]['product_id']" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off"></td>
										<td><input type="text" data-type="productName" name="data[0]['product_name']" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"></td>
										<td><input type="text" data-type="productName" name="data[0]['product_name']" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"></td>
										<td><input type="number" name="data[0]['price']" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
										<td><input type="number" name="data[0]['quantity']" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
										<td><input type="number" name="data[0]['total']" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
									</tr>
									
								  </tbody>
								</table> 
								<div id="appendrow"></div>
                            </div>
						    </div>
                            
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="button" class="btn btn-success" value="Add Product"  id="addmore"/>
                            <input type="button" class="btn btn-danger" value="Remove Product" id="delete""/>
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
	$cli=json_encode($Product);
	?>
</div>
<!--<script src="<?php //echo base_url(); ?>assets/js/addProduct.js" type="text/javascript"></script>-->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-select.js"></script>
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-select.css" rel="stylesheet" />
<SCRIPT language="javascript">
//var i=$('table#dataTable tr').length;
		function addRow() {
			//var obj = JSON.parse(<?php echo json_encode($cli) ?>);
			var obj1 = JSON.parse(<?php echo json_encode($cli) ?>);
			//alert(obj1);	
var temptable_p1="<table id='dataTable[]' width='100%' border='1' class='table table-bordered table-striped table-highlight'> <tbody><tr id='packing'><td><INPUT type='checkbox' name='chk'/></td><td>";

var rnd=Math.floor(Math.random() * 10001);  

	
var temptable_p2='<select class="js-example-tags'+rnd+'" id="pro_name[]" name="pro_name[]" data-live-search="true" onclick="callsearch('+rnd+');"><option ></option>';
var index, len;
var tempoption="";
for (index = 0, len = obj1.length; index < len; index++) {
         var cid = obj1[index].product_id;
        //alert(cid);
		 var cname = obj1[index].product_name;
		 tempoption=tempoption+"<option data-tokens='"+cid+"' value='"+cid+"'>"+cname+"</option><br>";
        //alert(tempoption);
		
    }
var temptable_p21=temptable_p2+tempoption+"</select>";
//alert(temptable_p21);
var temptable_p3="</td> <td><input type='text' data-type='productCode' name='data['+i+'][product_id]' id='itemNo_'+i+'' class='form-control autocomplete_txt' autocomplete='off'></td>	<td><input type='text' class='form-control' placeholder=''/></td><td><input type='text' class='form-control' placeholder=''/></td><td><input type='text' class='form-control' placeholder=''/> </td><td><input type='text' class='form-control' placeholder=''/></td> <td><input type='text' class='form-control' placeholder=''/> </td> </tr> <tr id='product_field'></tr> </tbody></table> ";

var temptable=temptable_p1+temptable_p21+temptable_p3;
//alert(temptable);
var tempsto=document.getElementById('appendrow').innerHTML;
tempsto= tempsto+"<br>"+temptable;
document.getElementById('appendrow').innerHTML=tempsto;
//$(".js-example-tags").select2({
  //tags: true
//});
//i++;
		}
		
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
    /*$(document).on('change', '.selectpicker', function () {
    $('.selectpicker').selectpicker('refresh').this();
});*/
$(function () {
        $(".js-example-tags").change(function (){
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
            alert("Selected Text: " + selectedText + " Value: " + selectedValue);
        });
    });
	</SCRIPT>
	<script>
var i=$('table#invoiceTable tr').length;
$("#addmore").on('click',function(){
	var rnd=Math.floor(Math.random() * 10001);
	var obj1 = JSON.parse(<?php echo json_encode($cli) ?>);
	html1 = '<tr>';
	html2 = '<td><input class="case" type="checkbox"/></td>';
	html3 = '<td><select class="js-example-tags'+i+' form-control" id="itemNo_'+i+' name="data[0]["product_id"] data-live-search="true" onclick="callsearch('+i+');"><option>Search Product</option>';
	var index, len;
var html="";
for (index = 0, len = obj1.length; index < len; index++) {
         var cid = obj1[index].product_id;
        //alert(cid);
		 var cname = obj1[index].product_name;
		 html=html+"<option data-tokens='"+cid+"' value='"+cid+"'>"+cname+"</option>";
       }
	html112 =  html3+html+"</select></td>"; 
	html4 = '<td><input type="text" data-type="productCode" name="data['+i+'][product_id]" id="itemNo_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
	html5 = '<td><input type="text" data-type="productCode" name="data['+i+'][product_id]" id="itemNo_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
	html6 = '<td><input type="text" data-type="productName" name="data['+i+'][product_name]" id="itemName_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
	html7 = '<td><input type="text" name="data['+i+'][price]" id="price_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html8 = '<td><input type="text" name="data['+i+'][quantity]" id="quantity_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html9 = '<td><input type="text" name="data['+i+'][total]" id="total_'+i+'" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html0 = '</tr>';
	$('table#invoiceTable').append(html1+html2+html112+html4+html5+html6+html7+html8+html9+html0);
	i++;
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
</script>
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>-->