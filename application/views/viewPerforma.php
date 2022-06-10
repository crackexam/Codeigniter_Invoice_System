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
		$currency_type = $uf->currency_type;
		$company_id = $uf->company_id;
        $company_name = $uf->company_name;
		$company_email = $uf->company_email;
		$company_contact = $uf->company_contact;
		$company_address = $uf->company_address;
		$company_gst = $uf->company_gst;
		$client_id = $uf->client_id;
        $client_name = $uf->client_name;
		$client_address = $uf->client_address;
		$client_pincode = $uf->pincode;
		$client_contact = $uf->client_mobile;
		$client_company = $uf->client_company;
		$client_gst = $uf->client_gst;
		$state_name = $uf->state_name;
        $invoice_subtotal = $uf->invoice_subtotal;
        $amount_due = $uf->amount_due;
		$invoice_number = $uf->invoice_number;
		$amount_paid = $uf->amount_paid;
		$shipping_cost = $uf->shipping_cost;
		$payment_mode = $uf->payment_mode;
		$spl_msg = $uf->spl_msg;
		$m_client_address = $uf->m_client_address;
		$m_client_pincode = $uf->m_client_pincode;
		$m_client_state = $uf->m_client_state;
	}
}


?>
<!--<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script> 
<div class="content-wrapper">
<style>th {
     text-align: center!important;
}
.table {
        margin-bottom: 0px!important;
}</style>
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">
      <h1>
        <i class="fa fa-file"></i> View Performa Detail
        <small></small>
      </h1>
    </section>-->
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
				<div class="box box-primary" id="pdfcret">
							<div class="col-xs-12 text-right" style="margin-top:1%">
								<!--<div class="form-group">
									<a class="btn btn-primary" href="<?php echo base_url('performa').'/viewPerformaDollar/'.$invoice_id; ?>">View Performa In <i class="fa fa-usd"></i></a>
								</div>-->
							</div>
							<form class="form" style="padding:2%">
									<table border="1" width="100%">
									  <tr>
										<td colspan="2" rowspan="3" >
											<label for="fname"style="margin-left:2%;"><?php echo strtoupper($company_name)?></label><br/>
											<label style="margin-left:2%;"></label><?php echo $company_address?><br/>
											<label style="margin-left:2%;">GSTIN/UIN:</label> <?php echo $company_gst?><br/>
											<label style="margin-left:2%;">Contact:</label> <?php echo $company_contact?><br/>
											<label style="margin-left:2%;">E-Mail:</label> <?php echo $company_email ?><br/>
										</td>
										<td colspan="4" align="center"><label>Performa No.:-</label> <strong> <?php echo $invoice_number?></strong></td>
										<td colspan="3" align="center"><label>Date:-</label> <?php echo date("d/m/y")?></td>
									  </tr>
									  <tr>
									  <td colspan="4" align="center"><p>Delivery Note</p></td>
										<td colspan="3" align="center"><p>Mode Of Payment:- <strong><?php echo $payment_mode?></strong></p></td>
									  </tr>
									  <tr>
										<td colspan="4" align="center"><p>Supplier's Ref.</p></td>
										<td colspan="3" align="center"><p>Other Reference(s)</p></td>
									  </tr>
									  <tr>
										<td colspan="2" rowspan="3" >
											<p style="margin-left:2%;">Buyer</p>
											<label style="margin-left:2%;"><?php echo strtoupper($client_company)?></label><br/>
											<label style="margin-left:2%;">Address:</label> <?php echo ($m_client_address != '')? $m_client_address : $client_address;?><br/>
											<label style="margin-left:2%;">State:</label> <?php echo ($m_client_state != '')?$m_client_state : $state_name;?><br/>
											<label style="margin-left:2%;">Pincode:</label> <?php echo ($m_client_pincode != '')?$m_client_pincode : $client_pincode;?><br/>
											<?php if($client_contact != ""){?><label style="margin-left:2%;">Contact No:</label> <?php echo $client_contact?><br/><?php }?>
											
											<label style="margin-left:2%;">GSTIN/UIN:</label> <?php echo $client_gst?>
										</td>
										<td colspan="4" align="center"><label>Buyer's Order Number:-</label></td>
										<td colspan="3" align="center"><label>Date:-</label></td>
									  </tr>
									  <tr>
									  <td colspan="4" align="center"><p>Dispatch Document No.</p></td>
										<td colspan="3" align="center"><p>Delivery Note Date</p></td>
									  </tr>
									  <tr>
										<td colspan="4" align="center"><p>Dispatched Through</p></td>
										<td colspan="3" align="center"><p>Destination</p></td>
									  </tr>
									</table>
								
							 <table id="invoiceTable" width="100%" border="1"  >
							       <thead style="text-align:center!important;">
									<th>SN.</th>
									<th width="20%">Product Name</th>
									<th>Rate</th>
									<th>Quantity</th>
									<th>GST Rate</th>
									<th>GST Amount</th>
									<th>Discount %</th>
									<th>Discount</th>
									<th>Amount</th>
									<th>Paid Amount</th>
							        </thead>
								  <tbody>
									<?php
									   $c = count($invoiceProductInfo);
										if(!empty($invoiceProductInfo))
										{$i=1; $maxgst = 0;
										foreach($invoiceProductInfo as $record)
										{ 
										  if($maxgst < $record->product_gst){
											  $maxgst = $record->product_gst;
										  }else{
											 $maxgst = $maxgst; 
										  }
									?>
								  	<tr style="text-align:center!important;">
										<td><?php echo $i;?></td>
										<td><?php echo $record->product_name ?> </td>
										<td><?php echo $record->product_price ?></td>
										<td><?php echo $record->product_qty ?></td>
										<td><?php echo $record->product_gst ?> %</td>
										<td><?php echo $record->pro_cal_gst_amount ?></td>
										<td><?php echo $record->pro_disc_rate ?></td>
										<td><?php echo $record->pro_disc_amount ?></td>
										<td><?php echo $record->amount ?></td>
										<td ><?php echo $record->net_payable_product_amount ?></td>
									</tr>
									<?php
										$i++;}
									}
									?>
								  </tbody>
								  <tfoot>
								    <tr>
									 <td colspan="9" style="text-align:right!important;"><strong style="margin-right:2%">Shipping Cost</Strong></td>
									 <td style="text-align:center!important;"><?php echo $shipping_cost?></td>
									<tr> 
									<tr>
									 <td colspan="9" style="text-align:right!important;margin-right:5%"><strong style="margin-right:2%">Tax On Shipping(Maximum GST Tax Rate Apply On Shipping Tax) {<?php echo $maxgst;?> %}</Strong></td>
									 <td style="text-align:center!important;margin-right:5%"><strong ><?php echo $shipptax =($shipping_cost*$maxgst)/100;?></strong></td>
									<tr>
									<?php
										if($amount_paid>0){
									?>
									<tr>
									 <td colspan="9" style="text-align:right!important;margin-right:5%"><strong style="margin-right:2%">Advance Paid Ammount</Strong></td>
									 <td style="text-align:center!important;margin-right:5%"><strong >- <?php echo $amount_paid;?></strong></td>
									<tr>
									<?php
										}
										?>
									<tr>
									<td style="text-align:center!important;"><strong>Total</strong></td>
									 <td colspan="7" style="text-align:right!important;">Amount Chargable (In words) <Strong style="font-size:14px;margin-right:5%"><?php
									 
									$totalamount=($invoice_subtotal+$shipptax)-$amount_paid;
									 echo convertToIndianCurrency($totalamount); ?></Strong></td>
									 <td colspan="2" style="text-align:center!important; font-size:20px;"><i class="fa fa-inr"></i>&nbsp;&nbsp;&nbsp;<strong><?php echo $totalamount;?></strong></td>
									<tr>
								  </tfoot>
								</table> 
								<table width="100%" border="1" >
							
							    <?php if($m_client_state != "delhi" AND $m_client_state != "Delhi"){?>
							        <thead>
									<tr align="center">
										<th >HSN/SAC</th>
										<th >Taxable Value</th>
										<th >IGST Tax</th>
										<th >Total Tax Ammount</th>
									  </tr>
							        </thead>
								  <tbody style="text-align:center!important;">
									<?php
									   $c = count($invoiceProductInfo);
									   $gst_tax_total = 0;$total_without_gst=0;
										if(!empty($invoiceProductInfo))
										{$i=1;
										foreach($invoiceProductInfo as $record)
										{ $gst_tax_total+=$record->pro_cal_gst_amount;
										$total_without_gst+=$record->amount;
									?>
								  	<tr>
										<td><?php echo $record->product_name ?></td>
										<td><?php echo $record->amount ?></td>
										<td><?php echo $record->pro_cal_gst_amount ?></td>
										<td><?php echo $record->pro_cal_gst_amount ?></td>
									</tr>
									<?php
										$i++;}
									}
									?>
								  </tbody>
								  <tfoot>
								    <tr style="text-align:center!important;">
									<td><strong>Total</strong></td>
									<td><strong><?php echo $total_without_gst;?></strong></td>
									<td><strong><?php echo $gst_tax_total;?></strong></td>
									<td><i class="fa fa-inr"></i>&nbsp;&nbsp;&nbsp;<strong><?php echo $gst_tax_total?></strong></td>
									</tr>
								    <tr>
									 <td colspan="4" style="text-align:center!important;">Tax Amount ( In Words) : <Strong style="text-align:left!important;"><?php echo convertToIndianCurrency($gst_tax_total); ?></Strong></td>
									</tr>
									<tr>
										<td colspan="7"><span style="color:red;">Note: </span><span style="color:green;font-size:16px;"><?php echo $spl_msg;?></span></td>
									</tr>									
									<tr>
										<td colspan="3" rowspan="3" >
											<label for="fname"style="margin-left:2%;">Company's VAT TIN : </label>07300268512<br/>
											<label style="margin-left:2%;">Company's PAN : </label>AAFPK6786J<br/>
											<label style="margin-left:2%;"></label><u>Declaration</u><br/>
											<label style="margin-left:2%;"></label>We declare that this invoice shows the actual price of the<br/>
											<label style="margin-left:2%;"></label>goods described and that all particulars are true and correct.<br/>
										</td>
										<td rowspan="3" align="right">
										<label>For</label> <strong> <?php echo $company_name?></strong><br/><br/><br/><br/>
										<label></label>Authorised Signatory
										</td>
										
									  </tr>
								  </tfoot>
								<?php }else {?>
									<thead>
									 <tr align="center">
										<th rowspan="2">HSN/SAC</th>
										<th rowspan="2">Taxable Value</th>
										<th colspan="2">Central Tax</th>
										<th colspan="2">State Tax</th>
										<th rowspan="2">Total Tax Ammount</th>
									  </tr>
									  <tr style="text-align:center!important;">
										<td>Rate</td>
										<td>Amount</td>
										<td>Rate</td>
										<td>Amount</td>
									  </tr>
							        </thead>
									<tbody style="text-align:center!important;">
									<?php
									   $c = count($invoiceProductInfo);
									   $gst_tax_total = 0;$total_without_gst = 0;
										if(!empty($invoiceProductInfo))
										{$i=1;
										foreach($invoiceProductInfo as $record)
										{ $gst_tax_total+=$record->pro_cal_gst_amount;
											$total_without_gst+=$record->amount;
									?>
								  	<tr>
										<td><?php echo $record->product_name ?></td>
										<td><?php echo $record->amount ?></td>
										<td><?php echo ($record->product_gst)/2; ?> %</td>
										<td><?php echo round(($record->pro_cal_gst_amount)/2,2); ?></td>
										<td><?php echo ($record->product_gst)/2; ?> %</td>
										<td><?php echo round(($record->pro_cal_gst_amount)/2,2); ?></td>
										<td><?php echo $record->pro_cal_gst_amount ?></td>
									</tr>
									<?php
										$i++;}
									}
									?>
									</tbody>
									<tfoot>
									<tr style="text-align:center!important;">
									<td><strong>Total</strong></td>
									<td><strong><?php echo $total_without_gst;?></strong></td><td></td>
									<td><strong><?php echo round($gst_tax_total/2,2);?></strong></td><td></td>
									<td><strong><?php echo round($gst_tax_total/2,2);?></td>
									<td><i class="fa fa-inr"></i>&nbsp;&nbsp;&nbsp;<strong><?php echo $gst_tax_total?></strong></td>
									</tr>
								    <tr>
									 <td colspan="7" style="text-align:center!important;" >Tax Amount ( In Words) : <Strong style="text-align:left!important;"><?php echo convertToIndianCurrency($gst_tax_total); ?></Strong></td>
									</tr>
									<tr>
										<td colspan="7"><span style="color:red;">Note: </span ><span style="color:green;font-size:16px;"><?php echo $spl_msg;?></span></td>
									</tr>
									<tr>
										<td colspan="4" rowspan="3" >
											<label for="fname"style="margin-left:2%;">Company's VAT TIN : </label>07300268512<br/>
											<label style="margin-left:2%;">Company's PAN : </label>AAFPK6786J<br/>
											<label style="margin-left:2%;"></label><u>Declaration</u><br/>
											<label style="margin-left:2%;"></label>We declare that this invoice shows the actual price of the<br/>
											<label style="margin-left:2%;"></label>goods described and that all particulars are true and correct.<br/>
										</td>
										<td colspan="3" rowspan="3" align="right">
										<label style="margin-right:5%;">For <strong> <?php echo $company_name?></strong></label><br/><br/><br/><br/>
										<label style="margin-right:5%;">Authorised Signatory</label>
										</td>
										
									  </tr>
									
									</tfoot>
								  
								<?php }?>
								 
								</table>
						</form>
                </div>
				 <input type="button" id="create_pd" value="Download PDF" class="btn btn-danger">
				 <input type="button" onclick="window.print()" value="Print PDF" class="btn btn-success">
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
   
<?php
function convert_number_to_words1($number) {
   //$no = 190908100.86;
   $no = floatval($number);
   $point = floatval($number - $no)*100;
   //$point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] ." " . $digits[$counter] . $plural . " " . $hundred : $words[floor($number / 10) * 10]            . " " . $words[$number % 10] . " " . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ? "." . $words[$point / 10] . " " . $words[$point = $point % 10] : '';
    $temp=$result . "Rupees  " ;
    if($points!=""){
    $temp = $temp.$points . " Paise";
    }
  return $temp;
}
?>
<?php
function convertToIndianCurrency($number) {
    $no = round($number);
    $decimal = round($number - ($no = floor($number)), 2) * 100;    
    $digits_length = strlen($no);    
    $i = 0;
    $str = array();
    $words = array(
        0 => '',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen',
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Forty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_length) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
            $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
        } else {
            $str [] = null;
        }  
    }
    
    $Rupees = implode(' ', array_reverse($str));
	
    $paise = ($decimal) ? "And " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
	if($paise == ""){
		return ($Rupees ? ' ' . $Rupees : '') . "Rupees Only";
	}
	else{
    return ($Rupees ? ' ' . $Rupees : '') . $paise . " Paise Only";}
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/html2canvas.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jspdf.debug.js" type="text/javascript"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>-->

<script>
$(document).ready(function(){
	$("#create_pd").on('click', function () {
let doc = new jsPDF('p','pt','a4');
doc.addHTML(document.getElementById('pdfcret'), function() {
    doc.save('<?php echo $invoice_number;?>.pdf');
});
});
var currency = '<?php echo $currency_type;?>';
if(currency == 'INR'){
		$('i').removeClass("fa-usd"); 
		$('i').addClass("fa-inr");		
	  }else{
		 $('i').removeClass("fa-inr"); 
		 $('i').addClass("fa-usd");
	  }
});
</script>
<!--<script>
$(document).ready(function(){
$("#create_pd").on('click', function () {
	$("create_pd").hide();
	
});
});

</script>-->


