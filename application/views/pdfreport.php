<?php
/****************************************************************************************************
* This script is brought to you by Hack and PHP Programming Blog.
* Website: www.hackandphp.com
* Email: hackandphp@gmail.com
*****************************************************************************************************/
	tcpdf();
	$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$obj_pdf->SetCreator(PDF_CREATOR);
	$title = "Hack and PHP";
	$obj_pdf->SetTitle($title);	
	//$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, "Commercial Invoice");
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
?>
<style type="text/css">
table{
 font-family:Arial, Helvetica, sans-serif;
}
td{
font-size:8px;	
}
</style>
<table border="1" style="border-collapse:collapse;">
    <tr style="height:100px; text-align:left">
		<td colspan="5" rowspan="3"	style=" padding:10px; ;"><strong>AMOUNT SAID IN US DOLLARS : ONE DOLLARS ONLY</strong><br/>
		  <strong>TOTAL VOLUME: ONE CUBIC METER</strong> <br/>
		  <strong>NET WEIGHT: ONE KILO GRAMS</strong><br/> 
		  <strong>COUNTRY OF ORIGIN: AUSTRALIA</strong>
		</td>
		<td colspan="2"></td>
		<td colspan="2"></td>
    </tr>
</table>
<table border="1" style="border-collapse:collapse;">
  
  <tr>
    <td colspan="9" align="center" style=" font-weight:400;"><strong></strong></td>
    </tr>
  <tr>
    <td colspan="9" align="center" style=" font-weight:400; "><strong>TEL: +00-000-0000   FAX: +00-000-000000</strong></td>
    </tr>
  <tr>
    <td colspan="9" align="center" style=" font-weight:400;"><strong>COMMERCAL INVOICE</strong></td>
    </tr>
  <tr>
    <td colspan="2" rowspan="3" ><strong>Cosignee</strong>:1</td>
    <td colspan="4" ><strong>Invoice No.: 11</strong></td>
    <td colspan="3" ><strong>MARK: 1</strong></td>
    </tr>
  <tr>
  <td colspan="4" ><strong>Date:  2015-10-19 19:21:55</strong></td>
    <td colspan="3" ><strong>Container No: 1</strong></td>
    </tr>
  <tr>
    <td colspan="4" ><strong>PAYMENT TERMS: 90 DAYS</strong></td>
    <td colspan="3" ><strong>SHIPPING TERMS: 1</strong></td>
    </tr>

  <tr>
    <td ><strong>Port of Loading: </strong><strong>1</strong></td>
    <td ><strong>Port of Discharge:</strong><strong>1</strong></td>
    <td colspan="4" ><strong>Vessel/Flight No.:</strong><strong>1</strong></td>
    <td colspan="3" ><strong>B/L No: 1</strong></td>
    </tr>
  
  <tr>
    <td ><strong>Art/SL No</strong></td>
    <td ><strong>Descriptions</strong></td>
    <td ><strong>Pieces/Units</strong></td>
    <td ><strong>CTNS</strong></td>
    <td ><strong>Total Qty</strong></td>
    <td ><strong>Unit Price</strong></td>
    <td ><strong>AMOUNT</strong></td>
    <td><strong>CBM </strong></td>
    <td ><strong>WEIGHT</strong></td>
  </tr>
    <tr style="font-size:7px;">
    <td >1</td>
    <td>11</td>
    <td>Piece</td>
    <td>1</td>
    <td>1</td>
    <td>1</td>
    <td>1</td>
    <td>1</td>
    <td>1</td>
  </tr>
      
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr >
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4"><strong>Total</strong></td>
    <td><strong>$1</strong></td>
    <td><strong>1 CBM</strong> </td>
    <td><strong>1 Kgs</strong> </td>
  </tr>
    
    <tr rowspan="3" style="height:100px; text-align:left">
    <td colspan="9" style=" padding:10px; ;"><strong>AMOUNT SAID IN US DOLLARS : ONE DOLLARS ONLY</strong><br/>
	 <strong>TOTAL VOLUME: ONE CUBIC METER</strong> <br/>
	  <strong>NET WEIGHT: ONE KILO GRAMS</strong><br/> 
	  <strong>COUNTRY OF ORIGIN: AUSTRALIA</strong>	 </td>
    </tr>
</table>
<?php
		$content = ob_get_contents();
	ob_end_clean();
	$obj_pdf->writeHTML($content, true, false, true, false, '');
	$obj_pdf->Output('output.pdf', 'I');
?>