<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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
        
        $this->loadViews("dashboard", $this->global, NULL, NULL);
        
    }
    
    function getAllAddress()
    {
        $id         = $this->input->post('client_id');
        $allAddress = $this->performa_model->getAllAddress($id);
        $add        = '';
        foreach ($allAddress as $address) {
            $add = $add . ' <div class="col-md-4">
            <div class="card card-1">
             <p><label>Address : </label>' . $address->m_client_address . '</p>
             <p><label>State : </label>' . $address->m_client_state . '</p>
             <p><label>Pincode : </label> ' . $address->m_client_pincode . '</p>
             <p><span id="' . $address->id . '" class="set_default btn btn-success btn-sm">Set this address</span></p>
            </div>
          </div>';
        }
        if ($add != '') {
            echo $add;
        } else {
            echo 'No Additional Address Found For This Client<br/>';
            echo '<div class="col-md-4" style="text-align:center">
                    <div class="card card-1">
                     <a href="' . base_url("user") . '/addNewAddress/' . $id . '" target="_blank"><i class="fa fa-plus" style="font-size:128px"></i></a>
                    </div>
                  </div>';
        }
        ;
    }
    
    function addPerforma()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('invoice_model');
            $data['Company'] = $this->invoice_model->getCompany();
            $data['Client']  = $this->invoice_model->getClient();
            $data['Product'] = $this->invoice_model->getProduct();
            
            $this->global['pageTitle'] = 'Add New Performa';
            
            $this->loadViews("addInvoice2", $this->global, $data, NULL);
        }
    }
    /**
     * This function is used to load the user list
     */
    function performaListing()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $searchText         = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->performa_model->performaListingCount($searchText);
            
            $returns = $this->paginationCompress("performaListing/", $count, 10);
            
            $data['invoiceRecords'] = $this->performa_model->performaListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Performa Listing';
            
            $this->loadViews("performa", $this->global, $data, NULL);
        }
    }
    
    
    function updatePerforma()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('company_id', 'Comapny Id', 'trim|required');
            $this->form_validation->set_rules('client_id', 'Client Id', 'trim|required');
            $this->form_validation->set_rules('spl_msg', 'special Message', 'trim');
            $this->form_validation->set_rules('invoice_subtotal', 'Invoice Total Ammount', 'trim|required');
            $this->form_validation->set_rules('amount_paid', 'Paid Amount', 'required');
            $this->form_validation->set_rules('amount_due', 'Due Amount', 'required');
            $this->form_validation->set_rules('payment_mode', 'Payment Mode', 'required');
            $this->form_validation->set_rules('invoice_type', 'Invoice Type', 'required');
            $this->form_validation->set_rules('shipping_cost', 'Shipping Amount', 'required');
            
            if ($this->form_validation->run() == FALSE) {
                $this->updatePerforma();
            } else {
                $invoice_id       = $this->input->post('invoice_id');
                $invoice_number   = $this->input->post('invoice_number');
                $spl_msg          = $this->input->post('spl_msg');
                $company_id       = ucwords(strtolower($this->security->xss_clean($this->input->post('company_id'))));
                $client_id        = $this->input->post('client_id');
                $invoice_subtotal = $this->input->post('invoice_subtotal');
                $amount_paid      = $this->input->post('amount_paid');
                $amount_due       = $this->input->post('amount_due');
                $address_id       = $this->input->post('address_id');
                $payment_mode     = $this->input->post('payment_mode');
                $invoice_type     = $this->input->post('invoice_type');
                $shipping_cost    = $this->input->post('shipping_cost');
				$currency_type = $this->input->post('currency_type');
                $productname      = array();
                $productname      = $this->input->post('product_name');
                $quantity         = array();
                $quantity         = $this->input->post('quantity');
                $price            = array();
                $price            = $this->input->post('price');
                $gst              = array();
                $gst              = $this->input->post('tax');
                $taxAmount        = array();
                $taxAmount        = $this->input->post('taxAmounthd');
                $discount         = array();
                $discount         = $this->input->post('discount');
                $discountamount   = array();
                $discountamount   = $this->input->post('discountamounthd');
                $total            = array();
                $total            = $this->input->post('totalhd');
                $product_payable  = array();
                $product_payable  = $this->input->post('product_payablehd');
                
                $invoiceInfo = array(
                    'company_id' => $company_id,
                    'client_id' => $client_id,
                    'invoice_subtotal' => $invoice_subtotal,
                    'amount_paid' => $amount_paid,
                    'address_id' => $address_id,
                    'amount_due' => $amount_due,
                    'spl_msg' => $spl_msg,
                    'payment_mode' => $payment_mode,
                    'shipping_cost' => $shipping_cost,
                    'invoice_updateDate' => date('Y-m-d H:i:s'),
					'currency_type'=>$currency_type
                );
                
                $this->load->model('performa_model');
                $result    = $this->performa_model->updateInvoice($invoiceInfo, $invoice_number);
                $deletepro = $this->performa_model->DeleteOldInvoicePro($invoice_number);
                
                
                //echo count($productid);
                for ($i = 0; $i < count($productname); $i++) {
                    $invoiceProduct = array(
                        'invoice_id' => $invoice_number,
                        'product_name' => $productname[$i],
                        'product_price' => $price[$i],
                        'product_qty' => $quantity[$i],
                        'product_gst' => $gst[$i],
                        'pro_cal_gst_amount' => $taxAmount[$i],
                        'pro_disc_rate' => $discount[$i],
                        'pro_disc_amount' => $discountamount[$i],
                        'amount' => $total[$i],
                        'net_payable_product_amount' => $product_payable[$i]
                    );
                    //print_r($invoiceProduct);
                    $result2 = $this->performa_model->updateProductDetail($invoiceProduct, $invoice_number);
                }
                
                if ($result2 > 0) {
                    $this->session->set_flashdata('error', 'Invoice Updated');
                } else {
                    $this->session->set_flashdata('error', 'Invoice Updateion failed');
                }
                
            }
            
            redirect('performaListing');
        }
        
    }
    function generatePerformainvoice()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('company_id', 'Comapny Id', 'trim|required');
            $this->form_validation->set_rules('spl_msg', 'special Message', 'trim');
            $this->form_validation->set_rules('client_id', 'Client Id', 'trim|required');
            $this->form_validation->set_rules('invoice_subtotal', 'Invoice Total Ammount', 'trim|required');
            $this->form_validation->set_rules('amount_paid', 'Paid Amount', 'required');
            $this->form_validation->set_rules('amount_due', 'Due Amount', 'required');
            $this->form_validation->set_rules('payment_mode', 'Payment Mode', 'required');
            $this->form_validation->set_rules('shipping_cost', 'Shipping Amount', 'required');
            
            if ($this->form_validation->run() == FALSE) {
                redirect('performaListing');
            } else {
                $company_id       = ucwords(strtolower($this->security->xss_clean($this->input->post('company_id'))));
                $client_id        = $this->input->post('client_id');
                $spl_msg          = $this->input->post('spl_msg');
                $invoice_subtotal = $this->input->post('invoice_subtotal');
                $amount_paid      = $this->input->post('amount_paid');
                $amount_due       = $this->input->post('amount_due');
                $payment_mode     = $this->input->post('payment_mode');
                $invoice_type     = "Invoice";
                $shipping_cost    = $this->input->post('shipping_cost');
                $productid        = array();
                $productid        = $this->input->post('product_id');
                $quantity         = array();
                $quantity         = $this->input->post('quantity');
                $taxAmount        = array();
                $taxAmount        = $this->input->post('taxAmounthd');
                $discount         = array();
                $discount         = $this->input->post('discount');
                $discountamount   = array();
                $discountamount   = $this->input->post('discountamounthd');
                $total            = array();
                $total            = $this->input->post('totalhd');
                $product_payable  = array();
                $product_payable  = $this->input->post('product_payablehd');
                $this->load->model('invoice_model');
                if ($invoice_type == "Invoice") {
                    $invoice_number = $this->invoice_model->invoiceNumber();
                } else {
                    $invoice_number = $this->invoice_model->PinvoiceNumber();
                }
                //$invoice_number = this->invoice_model->generateInvoiceNumber();
                //$result = $this->invoice_model->invoiceNumber();
                
                $invoiceInfo = array(
                    'company_id' => $company_id,
                    'invoice_number' => $invoice_number,
                    'client_id' => $client_id,
                    'invoice_subtotal' => $invoice_subtotal,
                    'amount_paid' => $amount_paid,
                    'amount_due' => $amount_due,
                    'payment_mode' => $payment_mode,
                    'shipping_cost' => $shipping_cost,
                    'doctype' => $invoice_type,
                    'spl_msg' => $spl_msg,
                    'invoice_createDate' => date('Y-m-d H:i:s')
                );
                
                
                
                $result = $this->invoice_model->saveInvoice($invoiceInfo);
                
                //echo count($productid);
                for ($i = 0; $i < count($productid); $i++) {
                    $invoiceProduct = array(
                        'invoice_id' => $invoice_number,
                        'product_id' => $productid[$i],
                        'product_quantity' => $quantity[$i],
                        'gst_tax_amount' => $taxAmount[$i],
                        'discount_rate' => $discount[$i],
                        'discount_amount' => $discountamount[$i],
                        'pro_total_amount' => $total[$i],
                        'net_amount' => $product_payable[$i]
                    );
                    
                    $result2 = $this->invoice_model->saveProductDetail($invoiceProduct, $result);
                }
                
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
        
        if (!empty($result)) {
            foreach ($result as $row):
                echo "<li><a>" . $row->product_name . "</a><span style='display:none;'>" . $row->product_name . "|" . $row->product_price . "|" . $row->product_gst . "|" . $row->product_id . "</span></li>";
            endforeach;
        } else {
            echo "<em> Not found ... </em> ";
            echo "<a href='" . base_url() . "addProduct' target='_blank' style='font-weight: bold;color:red;'> Add Product</a>";
        }
        
    }
    public function autocompleteclient()
    {
        // load model
        $this->load->model('performa_model');
        
        $search_data = $this->input->post('search_client');
        
        $result = $this->performa_model->get_autocompleteclient($search_data);
        
        if (!empty($result)) {
            foreach ($result as $row):
                echo "<li><a>" . $row->client_name . " | " . $row->client_company . "</a><span style='display:none;'>" . $row->client_id . "</span></li>";
            endforeach;
        } else {
            echo "<li> <em> Not found ... </em> </li>";
            echo "<a href='" . base_url() . "addNew' target='_blank' style='font-weight: bold;font-size: 16px;'> Add Client</a>";
        }
        
    }
    public function autocompletecompany()
    {
        // load model
        $this->load->model('performa_model');
        
        $search_data = $this->input->post('search_company');
        
        $result = $this->performa_model->get_autocompletecompany($search_data);
        
        if (!empty($result)) {
            foreach ($result as $row):
                echo "<li><a>" . $row->company_name . "</a><span style='display:none;'>" . $row->company_id . "</span></li>";
            endforeach;
        } else {
            echo "<li> <em> Not found ... </em> </li>";
            
            echo "<a href='" . base_url() . "addCompany' target='_blank' style='font-weight: bold;font-size: 16px;'> Add Company</a>";
        }
        
    }
    function editPerforma($invoice_id = NULL)
    {
        
        if ($invoice_id == null) {
            redirect('performaListing');
        }
        $data['Company'] = $this->performa_model->getCompany();
        
        $data['invoiceInfo'] = $this->performa_model->getPerformaInfo($invoice_id);
        
        $invoice_number = $this->input->post('invoice_number');
        
        
        $data['invoiceProductInfo'] = $this->performa_model->getPerformaProInfo($data['invoiceInfo'][0]->invoice_number);
        //print_r($data['invoiceProductInfo']);
        $this->global['pageTitle']  = 'Edit Performa';
        
        $this->loadViews("editPerforma", $this->global, $data, NULL);
        
    }
    function createPerformainvoice($invoice_id = NULL)
    {
        
        if ($invoice_id == null) {
            redirect('performaListing');
        }
        $data['Company'] = $this->performa_model->getCompany();
        
        $data['invoiceInfo'] = $this->performa_model->getPerformaInfo($invoice_id);
        
        $invoice_number = $this->input->post('invoice_number');
        
        
        $data['invoiceProductInfo'] = $this->performa_model->getPerformaProInfo($invoice_id);
        
        $this->global['pageTitle'] = 'Create Invoice From Performa';
        
        $this->loadViews("createPerformainvoice", $this->global, $data, NULL);
        
    }
    function viewPerforma($invoice_id = NULL)
    {
        
        if ($invoice_id == null) {
            redirect('performaListing');
        }
        $data['Company'] = $this->performa_model->getCompany();
        
        $data['invoiceInfo']       = $this->performa_model->getPerformaInfo($invoice_id);
        $invoice_number            = $this->input->post('invoice_number');
        $this->global['pageTitle'] = 'View Performa';
        if ($invoice_id <= 175) {
            $data['invoiceProductInfo'] = $this->performa_model->getPerformaProInfoOld($data['invoiceInfo'][0]->invoice_number);
            print_r($data['invoiceProductInfo']);
            $this->loadViews("viewPerformaOld", $this->global, $data, NULL);
        } else {
            $data['invoiceProductInfo'] = $this->performa_model->getPerformaProInfo($data['invoiceInfo'][0]->invoice_number);
            $this->loadViews("viewPerforma", $this->global, $data, NULL);
        }
        
    }
    function viewPerformadollar($invoice_id = NULL)
    {
        
        if ($invoice_id == null) {
            redirect('performaListing');
        }
        $data['Company'] = $this->performa_model->getCompany();
        
        $data['invoiceInfo'] = $this->performa_model->getPerformaInfo($invoice_id);
        //$data['userAddress'] = $this->performa_model->getUserAddresses($data['invoiceInfo'][0]->client_id);
        $invoice_number      = $this->input->post('invoice_number');
        
        
        $data['invoiceProductInfo'] = $this->performa_model->getPerformaProInfo($data['invoiceInfo'][0]->invoice_number);
        
        $this->global['pageTitle'] = 'View Performa';
        //print_r($data['invoiceInfo'][0]->client_id);
        //print_r($data['invoiceProductInfo']);//die;
        $this->loadViews("viewPerformadollar", $this->global, $data, NULL);
        
    }
    public function pdfdetails($invoice_id = NULL)
    {
        if ($invoice_id == null) {
            redirect('performaListing');
        }
        $invoice_id                 = $this->uri->segment(2);
        $content                    = '<div style="background-image: url(https://www.promotionalwears.com/image/catalog/logo.png); background-repeat: no-repeat; background-size: 200%; opacity:0.4;background-position: 50% 50%;">';
        $data['invoiceInfo']        = $this->performa_model->getPerformaInfo($invoice_id);
        //$data['userAddress'] = $this->performa_model->getUserAddresses($data['invoiceInfo'][0]->client_id);
        $data['invoiceProductInfo'] = $this->performa_model->getPerformaProInfo($data['invoiceInfo'][0]->invoice_number);
        foreach ($data['invoiceInfo'] as $uf) {
            $invoice_id       = $uf->invoice_id;
			$currency_type = $uf->currency_type;
            $company_id       = $uf->company_id;
            $company_name     = $uf->company_name;
            $company_email    = $uf->company_email;
            $company_contact  = $uf->company_contact;
            $company_address  = $uf->company_address;
            $company_gst      = $uf->company_gst;
            $client_id        = $uf->client_id;
            $client_name      = $uf->client_name;
            $client_address   = $uf->client_address;
            $client_contact   = $uf->client_mobile;
            $client_company   = $uf->client_company;
            $client_gst       = $uf->client_gst;
            $state_name       = $uf->state_name;
			$other_state_name = $uf->client_other_state;
			$country 		  = $uf->country;
            $pincode          = $uf->pincode;
            $invoice_subtotal = $uf->invoice_subtotal;
            $amount_due       = $uf->amount_due;
            $invoice_number   = $uf->invoice_number;
            $amount_paid      = $uf->amount_paid;
            $shipping_cost    = $uf->shipping_cost;
            $payment_mode     = $uf->payment_mode;
            $createDate       = $uf->invoice_createDate;
            $spl_msg          = $uf->spl_msg;
            $m_client_address = $uf->m_client_address;
            $m_client_pincode = $uf->m_client_pincode;
            $m_client_state   = $uf->m_client_state;
        }
		if($other_state_name != ''){$state_name = $other_state_name;$country = ', '.$country;}
        //$html_content .= $this->performa_model->getPerformaInfo($invoice_id);
        $content .= '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
              <tr><td colspan="10" align="center" style="font-size:18px">Performa Invoice(Only for Price Reference)</td></tr>
              <tr>
                <td colspan="2" >
                    <label for="fname"style="margin-left:3%;">' . strtoupper($company_name) . '</label><br/>
                    <label style="margin-left:2%;"></label> ' . $company_address . '<br/>
                    <label style="margin-left:2%;">GSTIN/UIN:</label> ' . $company_gst . '<br/>
                    <label style="margin-left:2%;">Contact:</label> ' . $company_contact . '<br/>
                    <label style="margin-left:2%;">E-Mail:</label> ' . $company_email . '<br/>
                </td>
                <td colspan="8"><!--<img src="https://www.promotionalwears.com/image/catalog/google_pay_qr_code_copy.jpg" width="150">-->
                    <p style="margin-left:2%;">Buyer</p>
                    <label style="margin-left:2%;">' . strtoupper($client_company) . '</label><br/>
                    ';
        if ($m_client_address != '') {
            $content = $content . '<label style="margin-left:2%;"></label>' . $m_client_address ; 
            
            if($m_client_state!="Choose one") { $content = $content . '<br/><label style="margin-left:2%;">State:</label> ' . $m_client_state ; }
                  if($m_client_pincode!="") {          $content = $content . '<br/>
                            <label style="margin-left:2%;">Pincode:</label> ' . $m_client_pincode . '<br/>';}
        } else {
            $content = $content . '<label style="margin-left:2%;"></label> ' . $client_address . ' <br/>
                            <label style="margin-left:2%;">State:</label> ' . $state_name . $country . '<br/>
                            <label style="margin-left:2%;">Pincode:</label> ' . $pincode . '<br/>';
        }
        
        $content = $content . '<br><label style="margin-left:2%;">Contact:</label> ' . $client_contact . '<br/>
        <label style="margin-left:2%;">GSTIN/UIN:</label> ' . $client_gst . '
    </td>
  </tr>
  <tr>
    <td colspan="5" align="center"><strong><label>Performa No.:-</label> ' . $invoice_number . '</strong></td>
    <td colspan="5" align="center"><strong<label>Create Date:-</label> ' . date('M d, Y', strtotime($createDate)) . '</strong</td>
  </tr>
 </table>';
        $content = $content . '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2" align="center">
                    <tr style="text-align:center">
                        <td width="5%">SN.</td>
                        <td width="15%">Product Name</td>
                        <td>Rate</td>
                        <td>Quantity</td>
                        <!--<td>GST Rate</td>-->
                        <td>GST Amount</td>
                        <!--<td>Discount %</td>-->
                        <td>Discount</td>
                        <!--<td>Amount</td>-->
                        <td>Payable Amount</td>
                    </tr>';
        $c       = count($data['invoiceProductInfo']);
        
        $i      = 1;
        $maxgst = 0;
        foreach ($data['invoiceProductInfo'] as $record) {
            if ($maxgst < $record->product_gst) {
                $maxgst = $record->product_gst;
            } else {
                $maxgst = $maxgst;
            }
			if($amount_paid > 0){
				$rows = 5;
			}else{
				$rows = 3;
			}
            $content = $content . '<tr style="text-align:center">
                        <td>' . $i . '</td>
                        <td>' . $record->product_name . '</td>
                        <td>' . number_format($record->product_price, 2) . '</td>
                        <td>' . $record->product_qty . '</td>
                        <!--<td>' . $record->product_gst . '%</td>-->
                        <td>' . number_format($record->pro_cal_gst_amount, 2) . '</td>
                        <!--<td>' . round(($record->pro_disc_rate), 2) . '</td>-->
                        <td>' . number_format(round(($record->pro_disc_amount), 2),2) . '</td>
                        <!--<td>' . number_format($record->amount,2) . '</td>-->
                        <td>' . number_format($record->net_payable_product_amount,2) . '</td>
                    </tr>';
            $i++;
        }
        '
                    </table>';
					if($currency_type == 'USD'){
						$icon = 'usd';
					}else{
						$icon = 'inr';
					}
        $content = $content . '</table><table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
                  <tr>
                    <td colspan="5" align="right"><label><strong>Shipping Cost:-</strong></label></td>
                    <td colspan="2" align="center">' . number_format($shipping_cost, 2) . '</td>
                    <td colspan="2" rowspan="'.$rows.'" align="center"><img src="https://www.promotionalwears.com/image/catalog/google_pay_qr_code_copy.jpg" width="100"></td>
                  </tr>
				  <tr>
                    <td colspan="5" align="right"><label>Tax On Shipping(Maximum GST Tax Rate Apply On Shipping Tax)</label></td>
                    <td colspan="2" align="center">' . number_format(($shipptax = ($shipping_cost * $maxgst) / 100), 2) . '</td>
                  </tr>
                  <tr>
                    <td colspan="5" align="center"><p><strong>Total Payable Amount:-</strong></p></td>
                    <td colspan="2" align="center"><p><strong>Rs.' . number_format(($totalamount = $invoice_subtotal + $shipptax), 2) . '</strong></p></td>
                  </tr>';
				  if($amount_paid > 0){
			$content = $content . '<tr>
                    <td colspan="5" align="center"><p>Advance Paid Amount:-</p></td>
                    <td colspan="2" align="center"><p><strong><img src="https://www.promotionalwears.com/image/catalog/icon-' . $icon . '.png" width="15">' . number_format($amount_paid) . '</strong></p></td>
                  </tr>
				  <tr>
                    <td colspan="5" align="center"><p><strong>Due Amount:-</strong></p></td>
                    <td colspan="2" align="center"><p><strong><img src="https://www.promotionalwears.com/image/catalog/icon-' . $icon . '.png" width="15">' . number_format($amount_due) . '</strong></p></td>
                  </tr>';
				  }  
				$content = $content . '  <tr>
                    <td colspan="9" align="Center"><label style="color:green"><strong>Scan above QRCode to pay from any payment app installed in your mobile.</strong></label></td>
                  </tr>
				  <tr>
						<td colspan="9"><span style="color:red;">Note: </span><span style="color:green;font-size:16px;">' . $spl_msg . '</span></td>
					</tr>
					<!--<tr>
						<td colspan="5" >
							<label style="margin-left:2%;"></label><u>Declaration</u><br/>
							<label style="margin-left:2%;"></label>We declare that this invoice shows the actual price of the<br/>
							<label style="margin-left:2%;"></label>goods described and that all particulars are true and correct.<br/>
						</td>
						<td  align="right" colspan="4">
						<label>For</label> <strong> ' . $company_name . '</strong><br/><br/>
						<label></label>Authorised Signatory
						</td>
					</tr>-->
					<tr>
						<td colspan="9">
							<label style="margin-left:2%;"></label><u style="color:red;">Bank Details</u><br/>
							<label style="margin-left:2%;"></label><strong>Account name :</strong> <span style="color:green;">Promotionalwears</span>, <strong>Bank :</strong> <span style="color:green;">Union Bank Of India</span>, <strong>Current Account:</strong> <span style="color:green;">510101003801283</span><br/>
							<label style="margin-left:2%;"></label><strong>Ifcs code :</strong> <span style="color:green;">UBIN0906221</span>, <strong>Branch Location:</strong> <span style="color:green;">Pitampura Delhi</span><br/>
						</td>
					</tr>
                  </table>';
        /*$content = $content . '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">';
        if ($m_client_state != "delhi" AND $m_client_state != "Delhi") {
            $content           = $content . '<tr style="text-align:center;">
                            <td >HSN/SAC</td>
                            <td >Taxable Value</td>
                            <td >IGST Tax</td>
                            <td >Total Tax Ammount</td>
                          </tr>';
            $c                 = count($data['invoiceProductInfo']);
            $gst_tax_total     = 0;
            $total_without_gst = 0;
            if (!empty($data['invoiceProductInfo'])) {
                $i = 1;
                foreach ($data['invoiceProductInfo'] as $record) {
                    $gst_tax_total += $record->pro_cal_gst_amount;
                    $total_without_gst += $record->amount;
                    
                    $content = $content . '<tr style="text-align:center">
                        <td>' . $record->product_name . '</td>
                        <td>' . $record->amount . '</td>
                        <td>' . $record->pro_cal_gst_amount . '</td>
                        <td>' . $record->pro_cal_gst_amount . '</td>
                     </tr>';
                    $i++;
                }
            }
            ;
            $content = $content . '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
                        <tr style="text-align:center"><td><strong>Total</strong></td>
                            <td><strong>' . $total_without_gst . '</strong></td>
                            <td><strong>' . $gst_tax_total . '</strong></td>
                            <td><strong>' . $gst_tax_total . '</strong></td>
                        </tr>
                        <tr>
                            <td colspan="4"><span style="color:red;">Note: </span><span style="color:green;font-size:16px;">' . $spl_msg . '</span></td>
                        </tr>
                        <tr>
                            <td colspan="3" >
                                <label style="margin-left:2%;"></label><u>Declaration</u><br/>
                                <label style="margin-left:2%;"></label>We declare that this invoice shows the actual price of the<br/>
                                <label style="margin-left:2%;"></label>goods described and that all particulars are true and correct.<br/>
                            </td>
                            <td  align="right">
                            <label>For</label> <strong> ' . $company_name . '</strong>
                            <label></label>Authorised Signatory
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <label style="margin-left:2%;"></label><u style="color:red;">Bank Details</u><br/>
                                <label style="margin-left:2%;"></label><strong>Account name :</strong> <span style="color:green;">Promotionalwears</span>, <strong>Bank :</strong> <span style="color:green;">corporation bank</span>, <strong>Current Account:</strong> <span style="color:green;">510101003801283</span><br/>
                                <label style="margin-left:2%;"></label><strong>Ifcs code :</strong> <span style="color:green;">CORP0000622</span>, <strong>Branch Location:</strong> <span style="color:green;">Pitampura Delhi</span><br/>
                            </td>
                        </tr>
                        </table>';
        } else {
            $content           = $content . '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
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
            $c                 = count($data['invoiceProductInfo']);
            $gst_tax_total     = 0;
            $total_without_gst = 0;
            if (!empty($data['invoiceProductInfo'])) {
                $i = 1;
                foreach ($data['invoiceProductInfo'] as $record) {
                    $gst_tax_total += $record->pro_cal_gst_amount;
                    $total_without_gst += $record->amount;
                    $content = $content . '<tr style="text-align:center!important;">
                        <td>' . $record->product_name . '</td>
                        <td>' . $record->amount . '</td>
                        <td>' . ($record->product_gst) / 2 . ' %</td>
                        <td>' . round(($record->pro_cal_gst_amount) / 2, 2) . '</td>
                        <td>' . ($record->product_gst) / 2 . ' %</td>
                        <td>' . round(($record->pro_cal_gst_amount) / 2, 2) . '</td>
                        <td>' . $record->pro_cal_gst_amount . '</td>
                    </tr>';
                    $i++;
                }
            }
            '</table>';
            $content = $content . '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
                        <tr style="text-align:center!important;"><td><strong>Total</strong></td>
                        <td><strong>' . $total_without_gst . '</strong></td><td></td>
                        <td><strong>' . round($gst_tax_total / 2, 2) . '</strong></td><td></td>
                        <td><strong>' . round($gst_tax_total / 2, 2) . '</strong></td>
                        <td><strong>' . $gst_tax_total . '</strong></td></tr>
                        <tr>
                            <td colspan="7"><span style="color:red;">Note: </span>' . $spl_msg . '</td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <label style="margin-left:2%;"></label><u>Declaration</u><br/>
                                <label style="margin-left:2%;"></label>We declare that this invoice shows the actual price of the<br/>
                                <label style="margin-left:2%;"></label>goods described and that all particulars are true and correct.<br/>
                            </td>
                            <td colspan="3" rowspan="1    " align="right">
                            <label>For</label> <strong> ' . $company_name . '</strong>
                            <label></label>Authorised Signatory
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <label style="margin-left:2%;"></label><u style="color:red;">Bank Details</u><br/>
                                <label style="margin-left:2%;"></label><strong>Account name :</strong> <span style="color:green;">Promotionalwears</span>, <strong>Bank :</strong> <span style="color:green;">corporation bank</span>, <strong>Current Account:</strong> <span style="color:green;">510101003801283</span><br/>
                                <label style="margin-left:2%;"></label><strong>Ifcs code :</strong> <span style="color:green;">CORP0000622</span>, <strong>Branch Location:</strong> <span style="color:green;">Pitampura Delhi</span><br/>
                            </td>
                        </tr>
                        </table>
                        ';
        }*/
        
        $content = $content . '</table></div>';
        
        $this->pdf->loadHtml($content);
        $this->pdf->render();
        $canvas = $this->pdf->getCanvas();
        $canvas->page_script('
              $pdf->set_opacity(.5);
              $pdf->image("https://www.promotionalwears.com/image/catalog/logo.png", {x}, {y}, {w}, {h});
            ');
        $this->pdf->stream("" . $invoice_id . ".pdf", array(
            "Attachment" => 0
        ));
        
    }
    public function pdfdetailsDollar($invoice_id = NULL)
    {
        if ($invoice_id == null) {
            redirect('performaListing');
        }
        $fromCurrency               = 'USD';
        $toCurrency                 = 'INR';
        $encode_amount              = 1;
        $url                        = "https://www.google.com/search?q=" . $fromCurrency . "+to+" . $toCurrency;
        $get                        = file_get_contents($url);
        $data                       = preg_split('/\D\s(.*?)\s=\s/', $get);
        $exhangeRate           = (float) substr($data[1], 0, 7);
        $invoice_id                 = $this->uri->segment(3);
        $content                    = '<div style="background-image: url(https://www.promotionalwears.com/image/catalog/logo.png); background-repeat: no-repeat; background-size: 200%; opacity:0.4;background-position: 50% 50%;">';
        $data['invoiceInfo']        = $this->performa_model->getPerformaInfo($invoice_id);
        //print_r($invoice_id);
        $data['invoiceProductInfo'] = $this->performa_model->getPerformaProInfo($data['invoiceInfo'][0]->invoice_number);
        foreach ($data['invoiceInfo'] as $uf) {
            $invoice_id       = $uf->invoice_id;
            $company_id       = $uf->company_id;
            $company_name     = $uf->company_name;
            $company_email    = $uf->company_email;
            $company_contact  = $uf->company_contact;
            $company_address  = $uf->company_address;
            $company_gst      = $uf->company_gst;
            $client_id        = $uf->client_id;
            $client_name      = $uf->client_name;
            $client_address   = $uf->client_address;
            $client_contact   = $uf->client_mobile;
            $client_company   = $uf->client_company;
            $client_gst       = $uf->client_gst;
            $state_name       = $uf->state_name;
            $pincode          = $uf->pincode;
            $invoice_subtotal = $uf->invoice_subtotal;
            $amount_due       = $uf->amount_due;
            $invoice_number   = $uf->invoice_number;
            $amount_paid      = $uf->amount_paid;
            $shipping_cost    = $uf->shipping_cost;
            $payment_mode     = $uf->payment_mode;
            $createDate       = $uf->invoice_createDate;
            $spl_msg          = $uf->spl_msg;
            $m_client_address = $uf->m_client_address;
            $m_client_pincode = $uf->m_client_pincode;
            $m_client_state   = $uf->m_client_state;
        }
        //$html_content .= $this->performa_model->getPerformaInfo($invoice_id);
        $content .= '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
              <tr><td colspan="10" align="center" style="font-size:18px">Performa Invoice(Only for Price Reference)</td></tr>
              <tr>
                <td colspan="2" >
                    <label for="fname"style="margin-left:3%;">' . strtoupper($company_name) . '</label><br/>
                    <label style="margin-left:2%;"></label> ' . $company_address . '<br/>
                    <label style="margin-left:2%;">GSTIN/UIN:</label> ' . $company_gst . '<br/>
                    <label style="margin-left:2%;">Contact:</label> ' . $company_contact . '<br/>
                    <label style="margin-left:2%;">E-Mail:</label> ' . $company_email . '<br/>
                </td>
                <td colspan="8"><!--<img src="https://www.promotionalwears.com/image/catalog/google_pay_qr_code_copy.jpg" width="150">-->
                    <p style="margin-left:2%;">Buyer</p>
                    <label style="margin-left:2%;">' . strtoupper($client_company) . '</label><br/>
                    ';
        if ($m_client_address != '') {
            $content = $content . '<label style="margin-left:2%;"></label>' . $m_client_address . '<br/>
                            <label style="margin-left:2%;">State:</label> ' . $m_client_state . '<br/>
                            <label style="margin-left:2%;">Pincode:</label> ' . $m_client_pincode . '<br/>';
        } else {
            $content = $content . '<label style="margin-left:2%;"></label> ' . $client_address . ' <br/>
                            <label style="margin-left:2%;">State:</label> ' . $state_name . '<br/>
                            <label style="margin-left:2%;">Pincode:</label> ' . $pincode . '<br/>';
        }
        
        $content = $content . '<label style="margin-left:2%;">Contact:</label> ' . $client_contact . '<br/>
        <label style="margin-left:2%;">GSTIN/UIN:</label> ' . $client_gst . '
    </td>
  </tr>
  <tr>
    <td colspan="5" align="center"><strong><label>Performa No.:-</label> ' . $invoice_number . '</strong></td>
    <td colspan="5" align="center"><strong<label>Create Date:-</label> ' . date('M d, Y', strtotime($createDate)) . '</strong</td>
  </tr>
 </table>';
        $content = $content . '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
                    <tr style="text-align:center">
                        <td width="5%">SN.</td>
                        <td width="15%">Product Name</td>
                        <td>Rate</td>
                        <td>Quantity</td>
                        <!--<td>GST Rate</td>-->
                        <td>GST Amount</td>
                        <!--<td>Discount %</td>-->
                        <td>Discount</td>
                        <!--<td>Amount</td>-->
                        <td>Payable Amount</td>
                    </tr>';
        $c       = count($data['invoiceProductInfo']);
        
        $i      = 1;
        $maxgst = 0;
        foreach ($data['invoiceProductInfo'] as $record) {
            //$priceusd = $this->currencyConverter($record->product_price);
            if ($maxgst < $record->product_gst) {
                $maxgst = $record->product_gst;
            } else {
                $maxgst = $maxgst;
            }
			if($amount_paid > 0){
				$rows = 5;
			}else{
				$rows = 3;
			}
            $content = $content . '<tr style="text-align:center">
                        <td>' . $i . '</td>
                        <td>' . $record->product_name . '</td>
                        <td>' . ceil($record->product_price / $exhangeRate) . '</td>
                        <td>' . $record->product_qty . '</td>
                        <!--<td>' . $record->product_gst . '%</td>-->
                        <td>' . number_format($record->pro_cal_gst_amount / $exhangeRate, 2) . '</td>
                        <!--<td>' . round(($record->pro_disc_rate), 2) . '</td>-->
                        <td>' . number_format($record->pro_disc_amount / $exhangeRate, 2) . '</td>
                        <!--<td>' . number_format($record->amount / $exhangeRate, 2) . '</td>-->
                        <td>' . number_format($record->net_payable_product_amount / $exhangeRate, 2) . '</td>
                    </tr>';
            $i++;
        }
        '
                    </table>';
        $content = $content . '</table><table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
                  <tr>
                    <td colspan="5" align="right"><label><strong>Shipping Cost:-</strong></label></td>
                    <td colspan="2" align="center">' . number_format($shipping_cost / $exhangeRate, 2) . '</td>
                    <td colspan="2" rowspan="'.$rows.'" align="center"><img src="https://www.promotionalwears.com/image/catalog/google_pay_qr_code_copy.jpg" width="100"></td>
                  </tr>
                  <tr>
                    <td colspan="5" align="right"><label>Tax On Shipping(Maximum GST Tax Rate Apply On Shipping Tax)</label></td>
                    <td colspan="2" align="center">' . number_format((($shipping_cost * $maxgst) / 100) / $exhangeRate, 2) . '</td>
                  </tr>
                  <tr>
                    <td colspan="5" align="center"><p><strong>Total Payable Amount:-</strong></p></td>
                    <td colspan="2" align="center"><p><strong><img src="https://www.promotionalwears.com/image/catalog/icon-usd.png" width="15">' . number_format(($totalamount = $invoice_subtotal + ($shipping_cost * $maxgst) / 100) / $exhangeRate, 2) . '</strong></p></td>
                  </tr>';
				  if($amount_paid > 0){
			$content = $content . '<tr>
                    <td colspan="5" align="center"><p>Advance Paid Amount:-</p></td>
                    <td colspan="2" align="center"><p><strong><img src="https://www.promotionalwears.com/image/catalog/icon-usd.png" width="15">' . number_format($amount_paid / $exhangeRate) . '</strong></p></td>
                  </tr>
				  <tr>
                    <td colspan="5" align="center"><p><strong>Due Amount:-</strong></p></td>
                    <td colspan="2" align="center"><p><strong><img src="https://www.promotionalwears.com/image/catalog/icon-usd.png" width="15">' . ( ceil($record->product_price / $exhangeRate) * $record->product_qty - number_format($amount_paid / $exhangeRate) ) . '</strong></p></td>
                  </tr>';
				  } 
				$content = $content . '  
				   <tr>
                    <td colspan="9" align="Center"><label style="color:green"><strong>Scan above QRCode to pay from any payment app installed in your mobile.</strong></label></td>
                  </tr>
				  <tr>
						<td colspan="9"><span style="color:red;">Note: </span><span style="color:green;font-size:16px;">' . $spl_msg . '</span></td>
					</tr>
					<!--<tr>
						<td colspan="5" >
							<label style="margin-left:2%;"></label><u>Declaration</u><br/>
							<label style="margin-left:2%;"></label>We declare that this invoice shows the actual price of the<br/>
							<label style="margin-left:2%;"></label>goods described and that all particulars are true and correct.<br/>
						</td>
						<td  align="right" colspan="4">
						<label>For</label> <strong> ' . $company_name . '</strong><br/><br/>
						<label></label>Authorised Signatory
						</td>
					</tr>-->
					<tr>
						<td colspan="9">
							<label style="margin-left:2%;"></label><u style="color:red;">Bank Details</u><br/>
							<label style="margin-left:2%;"></label><strong>Account name :</strong> <span style="color:green;">Promotionalwears</span>, <strong>Bank :</strong> <span style="color:green;">corporation bank</span>, <strong>Current Account:</strong> <span style="color:green;">510101003801283</span><br/>
							<label style="margin-left:2%;"></label><strong>Ifcs code :</strong> <span style="color:green;">CORP0000622</span>, <strong>Branch Location:</strong> <span style="color:green;">Pitampura Delhi</span><br/>
						</td>
					</tr>
                  </table>';
       /* $content = $content . '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">';
        if ($m_client_state != "delhi" AND $m_client_state != "Delhi") {
            $content           = $content . '<tr style="text-align:center;">
                            <td >HSN/SAC</td>
                            <td >Taxable Value</td>
                            <td >IGST Tax</td>
                            <td >Total Tax Ammount</td>
                          </tr>';
            $c                 = count($data['invoiceProductInfo']);
            $gst_tax_total     = 0;
            $total_without_gst = 0;
            if (!empty($data['invoiceProductInfo'])) {
                $i = 1;
                foreach ($data['invoiceProductInfo'] as $record) {
                    $gst_tax_total += $record->pro_cal_gst_amount;
                    $total_without_gst += $record->amount;
                    
                    $content = $content . '<tr style="text-align:center">
                        <td>' . $record->product_name . '</td>
                        <td>' . number_format($record->amount / $exhangeRate, 2) . '</td>
                        <td>' . number_format($record->pro_cal_gst_amount / $exhangeRate, 2) . '</td>
                        <td>' . number_format($record->pro_cal_gst_amount / $exhangeRate, 2) . '</td>
                     </tr>';
                    $i++;
                }
            }
            ;
            $content = $content . '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
                        <tr style="text-align:center"><td><strong>Total</strong></td>
                            <td><strong>' . number_format($total_without_gst / $exhangeRate, 2) . '</strong></td>
                            <td><strong>' . number_format($gst_tax_total / $exhangeRate, 2) . '</strong></td>
                            <td><strong>' . number_format($gst_tax_total / $exhangeRate, 2) . '</strong></td>
                        </tr>
                        <tr>
                            <td colspan="4"><span style="color:red;">Note: </span><span style="color:green;font-size:16px;">' . $spl_msg . '</span></td>
                        </tr>
                        <tr>
                            <td colspan="3" >
                                <label style="margin-left:2%;"></label><u>Declaration</u><br/>
                                <label style="margin-left:2%;"></label>We declare that this invoice shows the actual price of the<br/>
                                <label style="margin-left:2%;"></label>goods described and that all particulars are true and correct.<br/>
                            </td>
                            <td  align="right">
                            <label>For</label> <strong> ' . $company_name . '</strong>
                            <label></label>Authorised Signatory
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <label style="margin-left:2%;"></label><u style="color:red;">Bank Details</u><br/>
                                <label style="margin-left:2%;"></label><strong>Account name :</strong> <span style="color:green;">Promotionalwears</span>, <strong>Bank :</strong> <span style="color:green;">corporation bank</span>, <strong>Current Account:</strong> <span style="color:green;">510101003801283</span><br/>
                                <label style="margin-left:2%;"></label><strong>Ifcs code :</strong> <span style="color:green;">CORP0000622</span>, <strong>Branch Location:</strong> <span style="color:green;">Pitampura Delhi</span><br/>
                            </td>
                        </tr>
                        </table>';
        } else {
            $content           = $content . '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
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
            $c                 = count($data['invoiceProductInfo']);
            $gst_tax_total     = 0;
            $total_without_gst = 0;
            if (!empty($data['invoiceProductInfo'])) {
                $i = 1;
                foreach ($data['invoiceProductInfo'] as $record) {
                    $gst_tax_total += $record->pro_cal_gst_amount;
                    $total_without_gst += $record->amount;
                    $content = $content . '<tr style="text-align:center!important;">
                        <td>' . $record->product_name . '</td>
                        <td>' . number_format($record->amount / $exhangeRate, 2) . '</td>
                        <td>' . ($record->product_gst) / 2 . ' %</td>
                        <td>' . number_format((($record->pro_cal_gst_amount) / 2) / $exhangeRate, 2) . '</td>
                        <td>' . ($record->product_gst) / 2 . ' %</td>
                        <td>' . number_format((($record->pro_cal_gst_amount) / 2) / $exhangeRate, 2) . '</td>
                        <td>' . number_format($record->pro_cal_gst_amount / $exhangeRate, 2) . '</td>
                    </tr>';
                    $i++;
                }
            }
            '</table>';
            $content = $content . '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
                        <tr style="text-align:center!important;"><td><strong>Total</strong></td>
                        <td><strong>' . number_format($total_without_gst / $exhangeRate, 2) . '</strong></td><td></td>
                        <td><strong>' . number_format(($gst_tax_total / 2) / $exhangeRate, 2) . '</strong></td><td></td>
                        <td><strong>' . number_format(($gst_tax_total / 2) / $exhangeRate, 2) . '</strong></td>
                        <td><strong>' . number_format($gst_tax_total / $exhangeRate, 2) . '</strong></td></tr>
                        <tr>
                            <td colspan="7"><span style="color:red;">Note: </span>' . $spl_msg . '</td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <label style="margin-left:2%;"></label><u>Declaration</u><br/>
                                <label style="margin-left:2%;"></label>We declare that this invoice shows the actual price of the<br/>
                                <label style="margin-left:2%;"></label>goods described and that all particulars are true and correct.<br/>
                            </td>
                            <td colspan="3" rowspan="1    " align="right">
                            <label>For</label> <strong> ' . $company_name . '</strong>
                            <label></label>Authorised Signatory
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <label style="margin-left:2%;"></label><u style="color:red;">Bank Details</u><br/>
                                <label style="margin-left:2%;"></label><strong>Account name :</strong> <span style="color:green;">Promotionalwears</span>, <strong>Bank :</strong> <span style="color:green;">corporation bank</span>, <strong>Current Account:</strong> <span style="color:green;">510101003801283</span><br/>
                                <label style="margin-left:2%;"></label><strong>Ifcs code :</strong> <span style="color:green;">CORP0000622</span>, <strong>Branch Location:</strong> <span style="color:green;">Pitampura Delhi</span><br/>
                            </td>
                        </tr>
                        </table>
                        ';
        }*/
        
        $content = $content . '</table></div>';
        
        $this->pdf->loadHtml($content);
        $this->pdf->render();
        $canvas = $this->pdf->getCanvas();
        $canvas->page_script('
              $pdf->set_opacity(.5);
              $pdf->image("https://www.promotionalwears.com/image/catalog/logo.png", {x}, {y}, {w}, {h});
            ');
        $this->pdf->stream("" . $invoice_id . ".pdf", array(
            "Attachment" => 0
        ));
        
    }
    /*function currencyConverter($amount)
    {
        $fromCurrency    = 'INR';
        $toCurrency      = 'USD';
        $encode_amount   = 1;
        $url             = "https://www.google.com/search?q=" . $fromCurrency . "+to+" . $toCurrency;
        $get             = file_get_contents($url);
        $data            = preg_split('/\D\s(.*?)\s=\s/', $get);
        $exhangeRate     = (float) substr($data[1], 0, 7);
        $convertedAmount = $amount / $exhangeRate;
        //$data = array( 'exhangeRate' => $exhangeRate, 'convertedAmount' =>$convertedAmount, 'fromCurrency' => strtoupper($fromCurrency), 'toCurrency' => strtoupper($toCurrency));
        echo number_format($convertedAmount, 2);
    }*/
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Invoice : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
    
    
}

?>