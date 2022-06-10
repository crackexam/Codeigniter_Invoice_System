<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
require APPPATH . '/libraries/BaseController.php';


class Performa extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('performa_model');
        $this->isLoggedIn(); 
		$this->load->library('pdf');		
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
		
	}
    
	
function addPerforma()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('invoice_model');
			$data['Company'] = $this->invoice_model->getCompany();
			$data['Client'] = $this->invoice_model->getClient();
			$data['Product'] = $this->invoice_model->getProduct();
			           
            $this->global['pageTitle'] = 'Add New Invoice';

            $this->loadViews("addInvoice2", $this->global, $data, NULL);
        }
    }
    /**
     * This function is used to load the user list
     */
    function performaListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->performa_model->performaListingCount($searchText);

			$returns = $this->paginationCompress ( "performaListing/", $count, 10 );
            
            $data['invoiceRecords'] = $this->performa_model->performaListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Performa Listing';
            
            $this->loadViews("performa", $this->global, $data, NULL);
        }
    }

	
    function updatePerforma()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('company_id','Comapny Id','trim|required');
            $this->form_validation->set_rules('client_id','Client Id','trim|required');
			$this->form_validation->set_rules('spl_msg','special Message','trim');
            $this->form_validation->set_rules('invoice_subtotal','Invoice Total Ammount','trim|required');
            $this->form_validation->set_rules('amount_paid','Paid Amount','required');
			$this->form_validation->set_rules('amount_due','Due Amount','required');
			$this->form_validation->set_rules('payment_mode','Payment Mode','required');
			$this->form_validation->set_rules('invoice_type','Invoice Type','required');
			$this->form_validation->set_rules('shipping_cost','Shipping Amount','required');
            			            
            if($this->form_validation->run() == FALSE)
            {
                $this->updatePerforma();
            }
            else
            {
                $invoice_id = $this->input->post('invoice_id');
				$invoice_number = $this->input->post('invoice_number');
				$spl_msg = $this->input->post('spl_msg');
				$company_id = ucwords(strtolower($this->security->xss_clean($this->input->post('company_id'))));
                $client_id = $this->input->post('client_id');
                $invoice_subtotal = $this->input->post('invoice_subtotal');
                $amount_paid = $this->input->post('amount_paid');
				$amount_due = $this->input->post('amount_due');
				$payment_mode = $this->input->post('payment_mode');
				$invoice_type = $this->input->post('invoice_type');
				$shipping_cost = $this->input->post('shipping_cost');
				$productid=array();
				$productid = $this->input->post('product_id');
				$quantity=array();
				$quantity = $this->input->post('quantity');
				$taxAmount=array();
				$taxAmount = $this->input->post('taxAmounthd');
				$discount=array();
				$discount = $this->input->post('discount');
				$discountamount=array();
				$discountamount = $this->input->post('discountamounthd');
				$total=array();
				$total = $this->input->post('totalhd');
				$product_payable=array();
				$product_payable = $this->input->post('product_payablehd');
				  
				$invoiceInfo = array('company_id'=>$company_id,'client_id'=>$client_id, 'invoice_subtotal'=>$invoice_subtotal, 'amount_paid'=> $amount_paid,'amount_due'=> $amount_due,'spl_msg'=>$spl_msg,'payment_mode'=>$payment_mode,'shipping_cost'=>$shipping_cost, 'invoice_updateDate'=>date('Y-m-d H:i:s'));
            	
                $this->load->model('performa_model');
                $result = $this->performa_model->updateInvoice($invoiceInfo,$invoice_number);
				$deletepro = $this->performa_model->DeleteOldInvoicePro($invoice_number);
				
                
				    //echo count($productid);
                	for( $i=0;$i<count($productid);$i++){
					 $invoiceProduct = array(
						'invoice_id'=> $invoice_number,
						'product_id'=>$productid[$i],
						'product_quantity'=>$quantity[$i],
						'gst_tax_amount'=>$taxAmount[$i],
						'discount_rate'=>$discount[$i],
						'discount_amount'=>$discountamount[$i],
						'pro_total_amount'=>$total[$i],
						'net_amount'=>$product_payable[$i],
						);
						
					$result2 = $this->performa_model->updateProductDetail($invoiceProduct,$invoice_number);}
						
					if($result2 > 0){$this->session->set_flashdata('error', 'Invoice Updated');}
					else{$this->session->set_flashdata('error', 'Invoice Updateion failed');}
									
                }
                
                redirect('performaListing');
            }
        
    }
	function generatePerformainvoice()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('company_id','Comapny Id','trim|required');
			$this->form_validation->set_rules('spl_msg','special Message','trim');
            $this->form_validation->set_rules('client_id','Client Id','trim|required');
            $this->form_validation->set_rules('invoice_subtotal','Invoice Total Ammount','trim|required');
            $this->form_validation->set_rules('amount_paid','Paid Amount','required');
			$this->form_validation->set_rules('amount_due','Due Amount','required');
			$this->form_validation->set_rules('payment_mode','Payment Mode','required');
			$this->form_validation->set_rules('shipping_cost','Shipping Amount','required');
            			            
            if($this->form_validation->run() == FALSE)
            {
                redirect('performaListing');
            }
            else
            {
                $company_id = ucwords(strtolower($this->security->xss_clean($this->input->post('company_id'))));
                $client_id = $this->input->post('client_id');
				$spl_msg = $this->input->post('spl_msg');
				$invoice_subtotal = $this->input->post('invoice_subtotal');
                $amount_paid = $this->input->post('amount_paid');
				$amount_due = $this->input->post('amount_due');
				$payment_mode = $this->input->post('payment_mode');
				$invoice_type = "Invoice";
				$shipping_cost = $this->input->post('shipping_cost');
				$productid=array();
				$productid = $this->input->post('product_id');
				$quantity=array();
				$quantity = $this->input->post('quantity');
				$taxAmount=array();
				$taxAmount = $this->input->post('taxAmounthd');
				$discount=array();
				$discount = $this->input->post('discount');
				$discountamount=array();
				$discountamount = $this->input->post('discountamounthd');
				$total=array();
				$total = $this->input->post('totalhd');
				$product_payable=array();
				$product_payable = $this->input->post('product_payablehd');
				 $this->load->model('invoice_model');
				 if($invoice_type=="Invoice"){
				 $invoice_number = $this->invoice_model->invoiceNumber();}
				 else{
					$invoice_number = $this->invoice_model->PinvoiceNumber();
				 }
				//$invoice_number = this->invoice_model->generateInvoiceNumber();
				//$result = $this->invoice_model->invoiceNumber();
				                
				$invoiceInfo = array('company_id'=>$company_id,'invoice_number'=>$invoice_number,'client_id'=>$client_id, 'invoice_subtotal'=>$invoice_subtotal, 'amount_paid'=> $amount_paid,'amount_due'=> $amount_due,'payment_mode'=>$payment_mode,'shipping_cost'=>$shipping_cost,'doctype'=>$invoice_type,'spl_msg'=>$spl_msg, 'invoice_createDate'=>date('Y-m-d H:i:s'));
                
				
                
                $result = $this->invoice_model->saveInvoice($invoiceInfo);
                
				    //echo count($productid);
                	for( $i=0;$i<count($productid);$i++){
					 $invoiceProduct = array(
						'invoice_id'=> $invoice_number,
						'product_id'=>$productid[$i],
						'product_quantity'=>$quantity[$i],
						'gst_tax_amount'=>$taxAmount[$i],
						'discount_rate'=>$discount[$i],
						'discount_amount'=>$discountamount[$i],
						'pro_total_amount'=>$total[$i],
						'net_amount'=>$product_payable[$i],
						);
						
					$result2 = $this->invoice_model->saveProductDetail($invoiceProduct,$result);}
									
                }
                
                redirect('invoiceListing');
            }
        
    }  
    /**
     * This function is used load Company edit information
     * @param number $Company_id : Optional : This is user id
     */
	 public function autocomplete()
        {
                // load model
                $this->load->model('performa_model');

                $search_data = $this->input->post('search_data');

                $result = $this->performa_model->get_autocomplete($search_data);

                if (!empty($result))
                {
                    foreach ($result as $row):
                        echo "<li><a>" . $row->product_name ."</a><span style='display:none;'>". $row->product_name . "|" . $row->product_price . "|" . $row->product_gst . "|" . $row->product_id."</span></li>";
                    endforeach;
                }
                else
                {
                    echo "<em> Not found ... </em> ";
					echo "<a href='".base_url()."addProduct' target='_blank' style='font-weight: bold;color:red;'> Add Product</a>";
                }

        }
	public function autocompleteclient()
        {
                // load model
                $this->load->model('performa_model');

                $search_data = $this->input->post('search_client');

                $result = $this->performa_model->get_autocompleteclient($search_data);

                if (!empty($result))
                {
                    foreach ($result as $row):
                        echo "<li><a>" . $row->client_name . " | " . $row->client_company . "</a><span style='display:none;'>". $row->client_id."</span></li>";
                    endforeach;
                }
                else
                {
                    echo "<li> <em> Not found ... </em> </li>";
					echo "<a href='".base_url()."addNew' target='_blank' style='font-weight: bold;font-size: 16px;'> Add Client</a>";
                }

        }
	public function autocompletecompany()
        {
                // load model
                $this->load->model('performa_model');

                $search_data = $this->input->post('search_company');

                $result = $this->performa_model->get_autocompletecompany($search_data);

                if (!empty($result))
                {
                    foreach ($result as $row):
                        echo "<li><a>" . $row->company_name . "</a><span style='display:none;'>". $row->company_id."</span></li>";
                    endforeach;
                }
                else
                {
                    echo "<li> <em> Not found ... </em> </li>";
					
					echo "<a href='".base_url()."addCompany' target='_blank' style='font-weight: bold;font-size: 16px;'> Add Company</a>";
                }

        }
    function editPerforma($invoice_id= NULL)
    {
        
            if($invoice_id == null)
            {
                redirect('performaListing');
            }
            $data['Company'] = $this->performa_model->getCompany();
			
            $data['invoiceInfo'] = $this->performa_model->getPerformaInfo($invoice_id);
			
			$invoice_number = $this->input->post('invoice_number');
			 
			
			$data['invoiceProductInfo'] = $this->performa_model->getPerformaProInfo($invoice_id);
            
            $this->global['pageTitle'] = 'Edit Performa';
            
            $this->loadViews("editPerforma", $this->global, $data, NULL);
        
    }
	function createPerformainvoice($invoice_id= NULL)
	{
        
            if($invoice_id == null)
            {
                redirect('performaListing');
            }
            $data['Company'] = $this->performa_model->getCompany();
			
            $data['invoiceInfo'] = $this->performa_model->getPerformaInfo($invoice_id);
			
			$invoice_number = $this->input->post('invoice_number');
			 
			
			$data['invoiceProductInfo'] = $this->performa_model->getPerformaProInfo($invoice_id);
            
            $this->global['pageTitle'] = 'Create Invoice From Performa';
            
            $this->loadViews("createPerformainvoice", $this->global, $data, NULL);
        
    }
	function viewPerforma($invoice_id= NULL)
    {
        
            if($invoice_id == null)
            {
                redirect('performaListing');
            }
            $data['Company'] = $this->performa_model->getCompany();
			
            $data['invoiceInfo'] = $this->performa_model->getPerformaInfo($invoice_id);
			
			$invoice_number = $this->input->post('invoice_number');
			 
			
			$data['invoiceProductInfo'] = $this->performa_model->getPerformaProInfo($invoice_id);
            
            $this->global['pageTitle'] = 'View Performa';
			print_r($data);
            
            $this->loadViews("viewPerforma", $this->global, $data, NULL);
        
    }
	
	public function pdfdetails($invoice_id= NULL){
		if($invoice_id == null)
            {
                redirect('performaListing');
            }
			$invoice_id = $this->uri->segment(2);
			$content = '<div style="background-image: url(https://www.promotionalwears.com/image/catalog/logo.png); background-repeat: no-repeat; background-size: 200%; opacity:0.4;background-position: 50% 50%;">';
			$data['invoiceInfo'] = $this->performa_model->getPerformaInfo($invoice_id);
			$data['invoiceProductInfo'] = $this->performa_model->getPerformaProInfo($invoice_id);
			foreach ($data['invoiceInfo'] as $uf)
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
			//$html_content .= $this->performa_model->getPerformaInfo($invoice_id);
			$content .= '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
				  <tr><td colspan="10" align="center" style="font-size:18px">Performa Invoice(Only for Price Reference)</td></tr>
				  <tr>
				  	<td colspan="3" rowspan="3" >
						<label for="fname"style="margin-left:3%;">'.strtoupper($company_name).'</label><br/>
						<label style="margin-left:2%;"></label> '.$company_address.'<br/>
						<label style="margin-left:2%;">GSTIN/UIN:</label> '.$company_gst.'<br/>
						<label style="margin-left:2%;">Contact:</label> '.$company_contact.'<br/>
						<label style="margin-left:2%;">E-Mail:</label> '.$company_email.'<br/>
					</td>
					<td colspan="4" align="center"><label>Performa No.:-</label> <strong> '.$invoice_number.'</strong></td>
					<td colspan="3" rowspan="3" align="center"><img src="https://www.promotionalwears.com/image/catalog/google_pay_qr_code_copy.jpg" width="150"></td>
				  </tr>
				  <tr>
				  <td colspan="4" align="center"><label>Date:-</label> '.date("d/m/y").'</td>
				 </tr>
				  <tr>
					<td colspan="4" align="center"><p>Mode Of Payment:- <strong> '.$payment_mode.'</strong></p></td>
				 </tr>
				  <tr>
					<td colspan="3" rowspan="3" >
						<p style="margin-left:2%;">Buyer</p>
						<label style="margin-left:2%;">'. strtoupper($client_company).'</label><br/>
						<label style="margin-left:2%;"></label>'.$client_address.'<br/>
						<label style="margin-left:2%;">Contact:</label> '.$client_contact.'<br/>
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
$content= $content.'<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
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
					</tr>';$c = count($data['invoiceProductInfo']); 
				  
						$i=1; $maxgst = 0;
						foreach($data['invoiceProductInfo'] as $record)
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
$content = 	$content.'</table><table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
				  <tr>
					<td colspan="9" align="right"><label><strong>Shipping Cost:-</strong></label></td>
					<td colspan="2" align="center">'.$shipping_cost.'</td>
				  </tr>
				  <tr>
				  <td colspan="9" align="right"><label>Tax On Shipping(Maximum GST Tax Rate Apply On Shipping Tax)</label></td>
					<td colspan="2" align="center">'.($shipptax =($shipping_cost*$maxgst)/100).'</td>
				  </tr>
				  <tr>
					<td ><strong>Total</strong></td>
					<td colspan="8" align="center"><p><strong>Amount To Be Paid:-</strong></p></td>
					<td colspan="2" align="center"><p>'.$totalamount=$invoice_subtotal+$shipptax .'</p></td>
				  </tr>
				  </table>';
$content = 	$content.'<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">';if($state_name != "delhi" AND $state_name != "Delhi"){
		$content=$content. '<tr style="text-align:center;">
							<td >HSN/SAC</td>
							<td >Taxable Value</td>
							<td >IGST Tax</td>
							<td >Total Tax Ammount</td>
						  </tr>';
					   $c = count($data['invoiceProductInfo']);
					   $gst_tax_total = 0;$total_without_gst=0;
						if(!empty($data['invoiceProductInfo']))
						{$i=1;
						foreach($data['invoiceProductInfo'] as $record)
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
$content  = $content.'<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
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
							<td  align="right">
							<label>For</label> <strong> '. $company_name .'</strong>
							<label></label>Authorised Signatory
							</td>
						</tr>
						</table>';} else {
$content  = $content.'<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
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
							$c = count($data['invoiceProductInfo']);
						   $gst_tax_total = 0;$total_without_gst = 0;
							if(!empty($data['invoiceProductInfo']))
							{$i=1;
							foreach($data['invoiceProductInfo'] as $record)
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
$content   = $content.'<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
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
							<td colspan="3" rowspan="1	" align="right">
							<label>For</label> <strong> '.$company_name .'</strong>
							<label></label>Authorised Signatory
							</td>
						</tr>
						</table>';}
			$content   = $content.'</table></div>';

			$this->pdf->loadHtml($content);
			$this->pdf->render();
			$canvas = $this->pdf->getCanvas();
			$canvas->page_script('
			  $pdf->set_opacity(.5);
			  $pdf->image("https://www.promotionalwears.com/image/catalog/logo.png", {x}, {y}, {w}, {h});
			');
			$this->pdf->stream("".$invoice_id.".pdf", array("Attachment"=>0));
		
	}
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Invoice : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }

    
}

?>