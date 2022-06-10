<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Performa_model extends CI_Model
{
     
	/**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function performaListingCount($searchText = '')
    {
        $this->db->select('invoice_id,invoice_number,invoice_subtotal,amount_due,company_name,client_name,DATE(invoice_createDate) AS invoice_createDate');
        $this->db->from('tbl_invoice ');
        $this->db->join('tbl_company ', 'tbl_invoice.company_id = tbl_company.company_id');
		$this->db->join('tbl_client ', 'tbl_invoice.client_id = tbl_client.client_id');
		$this->db->like('invoice_number', 'PI');
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    function currencyConverter($amount) {	
	$fromCurrency = 'INR';
	$toCurrency = 'USD';	
	$encode_amount = 1;
	$url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
	$get = file_get_contents($url);
	$data = preg_split('/\D\s(.*?)\s=\s/',$get);
	$exhangeRate = (float) substr($data[1],0,7);
	$convertedAmount = $amount/$exhangeRate;
	//$data = array( 'exhangeRate' => $exhangeRate, 'convertedAmount' =>$convertedAmount, 'fromCurrency' => strtoupper($fromCurrency), 'toCurrency' => strtoupper($toCurrency));
	//echo number_format($convertedAmount,2);
echo 'vikas';	
}
	function getAllAddress($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_client_address ');
        $this->db->where('client_id', $id);
        $query = $this->db->get();
        
        return $query->result();
    }

    function performaListing($searchText = '', $page, $segment)
    {
        $this->db->select('invoice_id,invoice_number,invoice_subtotal,amount_due,company_name,client_name,client_company,invoice_createDate');
        $this->db->from('tbl_invoice ');
        $this->db->join('tbl_company ', 'tbl_invoice.company_id = tbl_company.company_id');
		$this->db->join('tbl_client ', 'tbl_invoice.client_id = tbl_client.client_id');
		$this->db->like('invoice_number', 'PI');
		$this->db->order_by("invoice_number","desc");
        $this->db->limit($segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }
	
	function getCompany()
		{
			$this->db->select('company_id,company_name');
			$this->db->from('tbl_company');
			//$this->db->where('roleId !=', 1);
			$query = $this->db->get();
			
			return $query->result();
		}
	function getClient()
		{
			$this->db->select('client_id,client_name');
			$this->db->from('tbl_client');
			//$this->db->where('client_name',$clientname);
			$query = $this->db->get();
			
			return $query->result();
		}
	function getProduct()
		{
			$this->db->select('product_id,product_name');
			$this->db->from('tbl_products');
			//$this->db->where('client_name',$clientname);
			$query = $this->db->get();
			
			return $query->result();
		}
	function get_pro_info($id){
		    $state=$this->input->post("product_name");
			$this->db->select('*');
			$this->db->from('tbl_products');
			$this->db->where('product_id',$state);
            $query = $this->db->get();
            return $query->result();
	
	}
     
    function getUserAddresses($userId)
    {
        $this->db->select('*');
        $this->db->from('tbl_client_address');
        $this->db->where('client_id', $userId);
		$this->db->where('is_Default', 1);
		$query = $this->db->get();
        
        return $query->result();
    }
    /**
     * This function is used to add new Invoice to system
     * @return number $insert_id : This is last inserted id
     */
    function savePerforma($piInfo)
    {
	 $this->db->insert('tbl_pi', $piInfo);
	 //$query = $this->db->get();
     //return $query->result();	
	    
    }
	
	/*public static function invoiceNumber($invoiceInfo){
		self::$db->insert('tbl_invoice', $invoiceInfo);
		self::$db->select('invoice_number');
		self::$db->from('tbl_invoice');
		self::$db->order_by('invoice_number','DESC');
		self::$db->limit(1);
		$query = self::$db->get();
        
        return $query->result();
		
	}*/
	 function piNumber(){		
		$this->db->select('pi_number');
		$this->db->from('tbl_pi');
		$this->db->order_by('pi_number','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
        $result = $query->num_rows();
		
		if ($result > 0)
			{
				$row = $query->row();
				$parentId = $row->pi_number;
				 //$parentId = $query->result();

			}
			else
			{
				 $parentId = 'PI'.$year.'000';
			}
		$IdGenrate = substr($parentId,6, 3);
	    return $Idmem = 'PI'. $year . str_pad($IdGenrate + 1, 3, '0', STR_PAD_LEFT);
	 		
	}
	function saveProductDetail($piProduct,$result)
    {
		
		$this->db->insert('tbl_pi_product', $piProduct);
        
        //$query = $this->db->get();
        
        //return $query->result();	
		
    }
	public function get_autocomplete($search_data)
        {
                $this->db->select('product_name,product_id,product_price,product_gst');
				$this->db->from('tbl_products');
                $this->db->like('product_name', $search_data);
				$this->db->limit(10);
			    $query = $this->db->get();
				return $query->result();
        }
	public function get_autocompleteclient($search_data)
        {
                $this->db->select('client_name,client_id,client_company');
                $this->db->like('client_name', $search_data);

                return $this->db->get('tbl_client', 10)->result();
        }
	public function get_autocompletecompany($search_data)
        {
                $this->db->select('company_name, company_id');
                $this->db->like('company_name', $search_data);

                return $this->db->get('tbl_company', 10)->result();
        }
    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getPerformaInfo($invoice_id)
    {
        $this->db->select('inv.invoice_id,inv.payment_mode,inv.spl_msg,inv.shipping_cost,inv.invoice_createDate,inv.invoice_subtotal,inv.invoice_number,inv.amount_due,inv.amount_paid,inv.doctype,inv.currency_type,com.company_id,com.company_name,com.company_email,com.company_address,com.company_gst,com.company_contact,cli.client_name,cli.client_company,cli.client_id,cli.client_address,cli.client_other_state,cli.country,cli.state_name,cli.client_gst,cli.client_mobile,cli.pincode,add.m_client_address,add.m_client_state,add.m_client_pincode');
        $this->db->from('tbl_invoice as inv');
        $this->db->join('tbl_company as com', 'inv.company_id = com.company_id');
		$this->db->join('tbl_client as cli', 'inv.client_id = cli.client_id');
		$this->db->join('tbl_client_address as add', 'inv.address_id = add.id','left');
		$this->db->where('invoice_id', $invoice_id);
		$this->db->limit(1);
        $query = $this->db->get();
        
        return $query->result();
    }
	function getPerformaProInfo($invoice_id)
    {
		//print_r($invoice_id);
        $this->db->select('*');
        $this->db->from('tbl_invoice_product_new');
        $this->db->where('invoice_id', $invoice_id);
        $query = $this->db->get();
        
        return $query->result();
    }
	function getPerformaProInfoOld($invoice_id)
    {	
        $this->db->select('invoice.invoice_number,inpro.product_quantity,inpro.product_id,inpro.gst_tax_amount,inpro.discount_rate,inpro.discount_amount,inpro.pro_total_amount,inpro.net_amount,pro.product_name,pro.product_gst,pro.product_price,pro.product_hsn');
        $this->db->from('tbl_invoice as invoice');
        $this->db->join('tbl_invoiceproduct as inpro', 'invoice.invoice_number = inpro.invoice_id');
		$this->db->join('tbl_products as pro', 'inpro.product_id = pro.product_id');
		$this->db->where('invoice.invoice_number', $invoice_id);
        $query = $this->db->get();
        //print_r($this->db->last_query());    
        return $query->result();
    }
    
	function updateInvoice($invoiceInfo,$invoice_number)
    {
        $this->db->where('invoice_number', $invoice_number);
        $this->db->update('tbl_invoice', $invoiceInfo);
        
    }
	function DeleteOldInvoicePro($invoice_number){
    $this->db->where('invoice_id', $invoice_number);
		$this->db->delete('tbl_invoice_product_new');
	}
	function updateProductDetail($invoiceProduct,$invoice_number){
		
		$this->db->insert('tbl_invoice_product_new', $invoiceProduct);
	}
}
