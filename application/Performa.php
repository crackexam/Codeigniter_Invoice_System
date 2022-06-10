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
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
		
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
            
            $this->loadViews("viewPerforma", $this->global, $data, NULL);
        
    }
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Invoice : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }

    
}

?>