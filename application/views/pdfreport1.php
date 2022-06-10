<?php
//error_reporting(0);
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
		$company_id = $uf->company_id;
        $company_name = $uf->company_name;
		$company_email = $uf->company_email;
		$company_contact = $uf->company_contact;
		$company_address = $uf->company_address;
		$company_gst = $uf->company_gst;
		$client_id = $uf->client_id;
        $client_name = $uf->client_name;
		$client_address = $uf->client_address;
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
	}
}


?>
<?php 
tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = 'PDF Report '.$invoice_number;
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData($company_name.'.png', PDF_HEADER_LOGO_WIDTH, "Performa Invoice", 'By ' .$company_name);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN)); 
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();



$content = 	'<table border="1" width="100%" cellpadding="5">
				  <tr>
					<td colspan="3" rowspan="3" >
						<label for="fname"style="margin-left:3%;">'.strtoupper($company_name).'</label><br/>
						<label style="margin-left:2%;"></label> '.$company_address.'<br/>
						<label style="margin-left:2%;">GSTIN/UIN:</label> '.$company_gst.'<br/>
						<label style="margin-left:2%;">Contact:</label> '.$company_contact.'<br/>
						<label style="margin-left:2%;">E-Mail:</label> '.$company_email.'<br/>
					</td>
					<td colspan="4" align="center"><label>Performa No.:-</label> <strong> '.$invoice_number.'</strong></td>
					<td colspan="3" align="center"><label>Date:-</label> '.date("d/m/y").'</td>
				  </tr>
				  <tr>
				  <td colspan="4" align="center"><p>Delivery Note</p></td>
					<td colspan="3" align="center"><p>Mode Of Payment:- <strong> '.$payment_mode.'</strong></p></td>
				  </tr>
				  <tr>
					<td colspan="4" align="center"><p>Suppliers Ref.</p></td>
					<td colspan="3" align="center"><p>Other Reference(s)</p></td>
				  </tr>
				  <tr>
					<td colspan="3" rowspan="3" >
						<p style="margin-left:2%;">Buyer</p>
						<label style="margin-left:2%;">'. strtoupper($client_company).'</label><br/>
						<label style="margin-left:2%;"></label>'.$client_address.'<br/>
						<label style="margin-left:2%;">State:</label> '.$state_name.'<br/>
						<label style="margin-left:2%;">GSTIN/UIN:</label> '.$client_gst.'
					</td>
					<td colspan="4" align="center"><label>Buyers Order Number:-</label></td>
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
				  </table>';
$content= $content.'<table border="1" width="100%" cellpadding="5">
					<tr>
						<td width="5%">SN.</td>
						<td width="15%">Product Name</td>
						<td>Rate</td>
						<td>Quantity</td>
						<td>GST Rate</td>
						<td>GST Amount</td>
						<td>Discount %</td>
						<td>Discount</td>
						<td>Amount</td>
						<td>Paid Amount</td>
					</tr>';$c = count($invoiceProductInfo); 
				  
						$i=1; $maxgst = 0;
						foreach($invoiceProductInfo as $record)
						{ 
						  if($maxgst < $record->product_gst){
							  $maxgst = $record->product_gst;
						  }else{
							 $maxgst = $maxgst; 
						  }
		$content=$content. '<tr>
						<td>'. $i .'</td>
						<td>'. $record->product_name .'('.$record->product_hsn.')'.'</td>
						<td>'. $record->product_price .'</td>
						<td>'. $record->product_quantity .'</td>
						<td>'. $record->product_gst .'%</td>
						<td>'. $record->gst_tax_amount .'</td>
						<td>'. round(($record->discount_rate),2) .'</td>
						<td>'. round(($record->discount_amount)/2,2) .'</td>
						<td>'. $record->pro_total_amount .'</td>
						<td>'. $record->net_amount .'</td>
					</tr>';	$i++;
					}'
					</table>';
$content = 	$content.'</table><table border="1" width="100%" cellpadding="5">
				  <tr>
					<td colspan="9" align="right"><label><strong>Shipping Cost:-</strong></label></td>
					<td colspan="2" align="center">'.$shipping_cost.'</td>
				  </tr>
				  <tr>
				  <td colspan="9" align="right"><label><strong>Tax On Shipping(Maximum GST Tax Rate Apply On Shipping Tax)</strong></label></td>
					<td colspan="2" align="center">'.($shipptax =($shipping_cost*$maxgst)/100).'</td>
				  </tr>
				  <tr>
					<td ><strong>Total</strong></td>
					<td colspan="8" align="center"><p>Amount Chargable:-</p></td>
					<td colspan="2" align="center"><p>'.$totalamount=$invoice_subtotal+$shipptax .'</p></td>
				  </tr>
				  </table>';
$content = 	$content.'<table border="1" width="100%" cellpadding="5">';if($state_name != "delhi" AND $state_name != "Delhi"){
		$content=$content. '<tr style="text-align:center;">
							<td >HSN/SAC</td>
							<td >Taxable Value</td>
							<td >IGST Tax</td>
							<td >Total Tax Ammount</td>
						  </tr>';
					   $c = count($invoiceProductInfo);
					   $gst_tax_total = 0;$total_without_gst=0;
						if(!empty($invoiceProductInfo))
						{$i=1;
						foreach($invoiceProductInfo as $record)
						{ $gst_tax_total+=$record->gst_tax_amount;
						$total_without_gst+=$record->pro_total_amount;
		
$content  = $content.'<tr style="text-align:center">
						<td>'. $record->product_hsn .'</td>
						<td>'. $record->pro_total_amount .'</td>
						<td>'. $record->gst_tax_amount .'</td>
						<td>'.  $record->gst_tax_amount .'</td>
					 </tr>';
									$i++;}
							};

$content  = $content.'<table border="1" width="100%" cellpadding="5">
						<tr style="text-align:center"><td><strong>Total</strong></td>
							<td><strong>'. $total_without_gst .'</strong></td>
							<td><strong>'. $gst_tax_total .'</strong></td>
							<td><strong>'. $gst_tax_total .'</strong></td>
						</tr>
						<tr>
							<td colspan="4"><span style="color:red;">Note: </span><span style="color:green;font-size:16px;">'. $spl_msg .'</span></td>
						</tr>
						<tr>
							<td colspan="3" >
								<label for="fname"style="margin-left:2%;">Companys VAT TIN : </label>07300268512<br/>
								<label style="margin-left:2%;">Companys PAN : </label>AAFPK6786J<br/>
								<label style="margin-left:2%;"></label><u>Declaration</u><br/>
								<label style="margin-left:2%;"></label>We declare that this invoice shows the actual price of the<br/>
								<label style="margin-left:2%;"></label>goods described and that all particulars are true and correct.<br/>
							</td>
							<td rowspan="3" align="right">
							<label>For</label> <strong> '. $company_name .'</strong><br/><br/><br/><br/>
							<label></label>Authorised Signatory
							</td>
						</tr>
						</table>';} else {
$content  = $content.'<table border="1" width="100%" cellpadding="5">
					  <tr align="center">
						<td rowspan="2" border="1">HSN/SAC</td>
						<td rowspan="2">Taxable Value</td>
						<td colspan="2">Central Tax</td>
						<td colspan="2">State Tax</td>
						<td rowspan="2">Total Tax Ammount</td>
					  </tr>
					  <tr style="text-align:center!important;">
						<td>Rate</td>
						<td>Amount</td>
						<td>Rate</td>
						<td>Amount</td>
					  </tr>';
							$c = count($invoiceProductInfo);
						   $gst_tax_total = 0;$total_without_gst = 0;
							if(!empty($invoiceProductInfo))
							{$i=1;
							foreach($invoiceProductInfo as $record)
							{ $gst_tax_total+=$record->gst_tax_amount;
								$total_without_gst+=$record->pro_total_amount;
$content  = $content.'<tr style="text-align:center!important;">
						<td>'. $record->product_hsn .'</td>
						<td>'. $record->pro_total_amount .'</td>
						<td>'. ($record->product_gst)/2 .' %</td>
						<td>'. round(($record->gst_tax_amount)/2,2) .'</td>
						<td>'. ($record->product_gst)/2 .' %</td>
						<td>'. round(($record->gst_tax_amount)/2,2) .'</td>
						<td>'. $record->gst_tax_amount .'</td>
					</tr>';
					$i++;}
					}'</table>';
$content   = $content.'<table border="1" width="100%" cellpadding="5">
						<tr style="text-align:center!important;"><td><strong>Total</strong></td>
						<td><strong>'.$total_without_gst.'</strong></td><td></td>
						<td><strong>'.round($gst_tax_total/2,2).'</strong></td><td></td>
						<td><strong>'.round($gst_tax_total/2,2).'</strong></td>
						<td><strong>'.$gst_tax_total.'</strong></td></tr>
						<tr>
							<td colspan="7"><span style="color:red;">Note: </span>'. $spl_msg .'</td>
						</tr>
						<tr>
							<td colspan="4">
								<label for="fname"style="margin-left:2%;">Companys VAT TIN : </label>07300268512<br/>
								<label style="margin-left:2%;">Companys PAN : </label>AAFPK6786J<br/>
								<label style="margin-left:2%;"></label><u>Declaration</u><br/>
								<label style="margin-left:2%;"></label>We declare that this invoice shows the actual price of the<br/>
								<label style="margin-left:2%;"></label>goods described and that all particulars are true and correct.<br/>
							</td>
							<td colspan="3" rowspan="3" align="right">
							<label>For</label> <strong> '.$company_name .'</strong><br/><br/><br/><br/>
							<label></label>Authorised Signatory
							</td>
						</tr>
						</table>';}
$content   = $content.'</table>';
$obj_pdf->writeHTML($content, true, false, true, false, '');

$obj_pdf->Output($invoice_number.'.pdf', 'I');
?>