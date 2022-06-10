<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
require APPPATH . '/libraries/BaseController.php';


class Invoice extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('invoice_model');
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
    function invoiceListing()
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
            
            $count = $this->invoice_model->invoiceListingCount($searchText);

			$returns = $this->paginationCompress ( "invoiceListing/", $count, 10 );
            
            $data['invoiceRecords'] = $this->invoice_model->invoiceListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Invoice Listing';
            
            $this->loadViews("invoice", $this->global, $data, NULL);
        }
    }

	function getproinfo()
	{
	        $state=$this->input->post('product_name');
                $query=$this->invoice_model->get_pro_info();
				echo $state;
                foreach($query->result() as $row)
                { 
                 echo "<option value='".$row->product_name."'>".$row->product_name."</option>";
                }
	}
	
    /**
     * This function is used to load the add new company form
     */
    function addInvoice()
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

            $this->loadViews("addInvoice", $this->global, $data, NULL);
        }
    }
function addInvoice2()
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
     * This function is used to Save New Invoice to the system
     */
    function saveInvoice()
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
			$this->form_validation->set_rules('invoice_type','Invoice Type','required');
			$this->form_validation->set_rules('shipping_cost','Shipping Amount','required');
            			            
            if($this->form_validation->run() == FALSE)
            {
                $this->addInvoice2();
            }
            else
            {
                $company_id = ucwords(strtolower($this->security->xss_clean($this->input->post('company_id'))));
                $client_id = $this->input->post('client_id');
				$address_id = $this->input->post('address_id');
				$spl_msg = $this->input->post('spl_msg');
				$invoice_subtotal = $this->input->post('invoice_subtotal');
                $amount_paid = $this->input->post('amount_paid');
				$amount_due = $this->input->post('amount_due');
				$payment_mode = $this->input->post('payment_mode');
				$invoice_type = $this->input->post('invoice_type');
				$currency_type = $this->input->post('currency_type');
				$shipping_cost = $this->input->post('shipping_cost');
				/*$productid=array();
				$productid = $this->input->post('product_id');*/
				$productname=array();
				$productname = $this->input->post('product_name');
				$quantity=array();
				$quantity = $this->input->post('quantity');
				$price=array();
				$price = $this->input->post('price');
				$gst=array();
				$gst = $this->input->post('tax');
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
				 
				 if($invoice_type=="Invoice"){
				 $invoice_number = $this->invoice_model->invoiceNumber();}
				 else{
					$invoice_number = $this->invoice_model->PinvoiceNumber();
				 }
				//$invoice_number = this->invoice_model->generateInvoiceNumber();
				//$result = $this->invoice_model->invoiceNumber();
				                
				$invoiceInfo = array('company_id'=>$company_id,'invoice_number'=>$invoice_number, 'client_id'=>$client_id, 'invoice_subtotal'=>$invoice_subtotal, 'amount_paid'=> $amount_paid,'amount_due'=> $amount_due,'payment_mode'=>$payment_mode,'shipping_cost'=>$shipping_cost,'doctype'=>$invoice_type,'spl_msg'=>$spl_msg, 'invoice_createDate'=>date('Y-m-d H:i:s'),'address_id'=>$address_id,'currency_type'=>$currency_type);
                //print_r($invoiceInfo);die;
				
                $this->load->model('invoice_model');
                $result = $this->invoice_model->saveInvoice($invoiceInfo);
                
				    //echo count($productid);
                	for( $i=0;$i<count($productname);$i++){
					 $invoiceProduct = array(
						'invoice_id'=> $invoice_number,
						'product_name'=>$productname[$i],
						'product_price'=>$price[$i],
						'product_qty'=>$quantity[$i],
						'product_gst'=>$gst[$i],
						'pro_cal_gst_amount'=>$taxAmount[$i],
						'pro_disc_rate'=>$discount[$i],
						'pro_disc_amount'=>$discountamount[$i],
						'amount'=>$total[$i],
						'net_payable_product_amount'=>$product_payable[$i],
						);
					//Print_r($invoiceProduct);die;
					$result2 = $this->invoice_model->saveProductDetailNew($invoiceProduct,$result);
					}
									
                }
                
                if(strpos($invoice_number, 'IN') !== false){
                redirect('invoiceListing');}else{
					                redirect('performaListing');
				}
            }
        
    }  
	 /**
     * This function is used to update Invoice to the system
     */
    function updateInvoice()
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
            $this->form_validation->set_rules('invoice_subtotal','Invoice Total Ammount','trim|required');
            $this->form_validation->set_rules('amount_paid','Paid Amount','required');
			$this->form_validation->set_rules('amount_due','Due Amount','required');
			$this->form_validation->set_rules('payment_mode','Payment Mode','required');
			$this->form_validation->set_rules('invoice_type','Invoice Type','required');
			$this->form_validation->set_rules('shipping_cost','Shipping Amount','required');
            			            
            if($this->form_validation->run() == FALSE)
            {
                $this->updateInvoice();
            }
            else
            {
                $invoice_number = $this->input->post('invoice_number');
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
				 
								                
				$invoiceInfo = array('company_id'=>$company_id,'client_id'=>$client_id, 'invoice_subtotal'=>$invoice_subtotal, 'amount_paid'=> $amount_paid,'amount_due'=> $amount_due,'payment_mode'=>$payment_mode,'shipping_cost'=>$shipping_cost,'doctype'=>$invoice_type, 'invoice_updateDate'=>date('Y-m-d H:i:s'));
                
				
                $this->load->model('invoice_model');
                $result = $this->invoice_model->updateInvoice($invoiceInfo,$invoice_number);
				$deletepro = $this->invoice_model->DeleteOldInvoicePro($invoice_number);
				
                
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
						
					$result2 = $this->invoice_model->updateProductDetail($invoiceProduct,$invoice_number);}
						
					if($result2 > 0){$this->session->set_flashdata('error', 'Invoice Updated');}
					else{$this->session->set_flashdata('error', 'Invoice Updateion failed');}
				
									
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
                $this->load->model('invoice_model');

                $search_data = $this->input->post('search_data');

                $result = $this->invoice_model->get_autocomplete($search_data);

                if (!empty($result))
                {
                    foreach ($result as $row):
                        //echo "<li><a>" . $row->product_name ."</a><span style='display:none;'>". $row->product_name . "|" . $row->product_price . "|" . $row->product_gst . "|" . $row->product_id."</span></li>";
						echo "<li><a>" . $row->product_name . " | " . $row->product_model ."</a><span style='display:none;'>". $row->product_name .  "|" . $row->product_model . "|" . $row->product_id."</span></li>";
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
                $this->load->model('invoice_model');

                $search_data = $this->input->post('search_client');

                $result = $this->invoice_model->get_autocompleteclient($search_data);

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
                $this->load->model('invoice_model');

                $search_data = $this->input->post('search_company');

                $result = $this->invoice_model->get_autocompletecompany($search_data);

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
    function editInvoice($invoice_id= NULL)
    {
        
            if($invoice_id == null)
            {
                redirect('invoiceListing');
            }
            $data['Company'] = $this->invoice_model->getCompany();
			
            $data['invoiceInfo'] = $this->invoice_model->getInvoiceInfo($invoice_id);
			
			$invoice_number = $this->input->post('invoice_number');
			 
			
			$data['invoiceProductInfo'] = $this->invoice_model->getInvoiceProInfo($invoice_id);
            
            $this->global['pageTitle'] = 'Edit Invoice';
            
            $this->loadViews("editInvoice", $this->global, $data, NULL);
        
    }
	function viewInvoice($invoice_id= NULL)
    {
        
            if($invoice_id == null)
            {
                redirect('invoiceListing');
            }
            $data['Company'] = $this->invoice_model->getCompany();
			
            $data['invoiceInfo'] = $this->invoice_model->getInvoiceInfo($invoice_id);
			
			$invoice_number = $this->input->post('invoice_number');
			 
			
			$data['invoiceProductInfo'] = $this->invoice_model->getInvoiceProInfo($invoice_id);
            
            $this->global['pageTitle'] = 'View Invoice';
            
            $this->loadViews("viewInvoice", $this->global, $data, NULL);
        
    }
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Invoice : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }

    
}

?>