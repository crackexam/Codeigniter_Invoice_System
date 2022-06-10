<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Shipping extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('shipping_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Promotionalwears Inventory Managment : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function shippingListing()
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
            
            $count = $this->shipping_model->shippingListingCount($searchText);
			
			$returns = $this->paginationCompress ( "shippingListing/", $count, 10 );
            
            $data['shippingRecords'] = $this->shipping_model->shippingListing($searchText, $returns["page"], $returns["segment"]);
			//print_r($data['shippingRecords']);
            
            $this->global['pageTitle'] = 'Promotionalwears Inventory Managment : Shipping Listing';
            
            $this->loadViews("shipping", $this->global, $data, NULL);
        }
    }
	
	function shippingView(){
		if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        { 
			$this->load->model('shipping_model');
			$data['roles'] = $this->shipping_model->getUserRoles();
			$data['allVendor'] =$this->shipping_model->getAllData('tbl_vendor');
			$this->global['pageTitle'] = 'Promotionalwears Inventory Managment : Shipping View';
            $this->loadViews("shippingView", $this->global, $data, NULL);
		}
	}
	
	function courierListing()
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
            
            $count = $this->shipping_model->courierListingCount($searchText);
			//print_r($count);die;
			$returns = $this->paginationCompress ( "courierListing/", $count, 10 );
            
            $data['courierRecords'] = $this->shipping_model->courierListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Promotionalwears Inventory Managment : Shipping Listing';
            
            $this->loadViews("courier", $this->global, $data, NULL);
        }
    }
	
	function vendorListing(){
		if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->shipping_model->vendorListingCount($searchText);

			$returns = $this->paginationCompress ( "vendorListing/", $count, 10 );
            
            $data['vendorRecords'] = $this->shipping_model->vendorListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Promotionalwears Inventory Managment : Vendors Listing';
            
            $this->loadViews("vendors", $this->global, $data, NULL);
        }
	}
	
	function vendorAdd()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('shipping_model');
			$data['roles'] = $this->shipping_model->getUserRoles();
            
            $this->global['pageTitle'] = 'Promotionalwears Inventory Managment : Add New Vendor';

            $this->loadViews("vendorAdd", $this->global, $data, NULL);
        }
    }
	
	function courierAdd(){
		if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('shipping_model');
			$data['roles'] = $this->shipping_model->getUserRoles();
			$data['allVendor'] =$this->shipping_model->getAllData('tbl_vendor');
            //print_r($data['allVendor']);die;
            $this->global['pageTitle'] = 'Promotionalwears Inventory Managment : Add New Courier';

            $this->loadViews("courierAdd", $this->global, $data, NULL);
        }
	}
    /**
     * This function is used to load the add new company form
     */
    function shippingAdd($performa_id= NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {	
			$this->load->model('shipping_model');
			$link = $_SERVER['REQUEST_URI'];
			$id = explode('/',$link);
			//print_r($value = $id[4]);
			isset($id[4]) ? $value = $id[4] : $value = 0;
			$data['allVendor'] =$this->shipping_model->getAllData('tbl_vendor');
			$data['customer_details'] = $this->shipping_model->getCustomerDetails($value);
			//print_r($data['customer_details']);
            $data['roles'] = $this->shipping_model->getUserRoles();
            
            $this->global['pageTitle'] = 'Promotionalwears Inventory Managment : Add New Shipping';

            $this->loadViews("shippingAdd", $this->global, $data, NULL);
        }
    }

     /**
     * This function is used to REGISTER NEW COMPANY to the system
     */
    function addNewVendor()
    {	//echo "access";
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('vendor_name','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('vendor_address','Company Address','required|trim');
            $this->form_validation->set_rules('vendor_gst','Company Gst Number','trim');
            $this->form_validation->set_rules('vendor_contact','Comapny Contact','required|min_length[10]');
            
			            
            if($this->form_validation->run() == FALSE)
            {
                $this->vendorAdd();
            }
            else
            {
                $vendor_name = ucwords(strtolower($this->security->xss_clean($this->input->post('vendor_name'))));
                $vendor_address = $this->input->post('vendor_address');
                $vendor_gst = $this->input->post('vendor_gst');
                $vendor_contact = $this->security->xss_clean($this->input->post('vendor_contact'));
				
                $vendorInfo = array('vendor_name'=>$vendor_name, 'vendor_address'=>$vendor_address, 'vendor_gst'=>$vendor_gst, 'vendor_contact'=> $vendor_contact,'vendor_createDate'=>date('Y-m-d H:i:s'));
                
				//$email_check=$this->shipping_model->checkCompanyExists($companyInfo['company_name'],$companyInfo['company_email']);
				$this->load->model('shipping_model');
                $result = $this->shipping_model->addNew($vendorInfo,'tbl_vendor');
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Vendor Registered successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Vendor creation failed');
                }
                $this->vendorAdd();
                //redirect('addCompany');
            }
        }
    } 
	function addNewCourier()
		{	//echo "access";
			if($this->isAdmin() == TRUE)
			{
				$this->loadThis();
			}
			else
			{
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('courier_name','Courier Name','required|trim');
				
							
				if($this->form_validation->run() == FALSE)
				{
					$this->courierAdd();
				}
				else
				{
					$vendor_id = $this->input->post('vendor');
					$courier_name = $this->input->post('courier_name');
					$courierInfo = array('vendor_id'=>$vendor_id, 'courier_name'=>$courier_name,'courier_createDate'=>date('Y-m-d H:i:s'));
					$this->load->model('shipping_model');
					$result = $this->shipping_model->addNew($courierInfo,'tbl_courier');
					if($result > 0)
					{
						$this->session->set_flashdata('success', 'New Courier Registered successfully');
					}
					else
					{
						$this->session->set_flashdata('error', 'Courier creation failed');
					}
					$this->courierAdd();
				}
			}
		} 

	function addNewShipping()
    {	//echo "access";
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('customer_name','Customer Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('customer_contact','Customer Contact Number','required|trim');
            $this->form_validation->set_rules('customer_address','Customer Address','trim');
            $this->form_validation->set_rules('customer_state','Customer State','required');
			$this->form_validation->set_rules('customer_pincode','Customer Pincode','trim|required|max_length[128]');
            $this->form_validation->set_rules('vendor','Vendor Required','required|trim');
            $this->form_validation->set_rules('courier_name','Courier Name','trim');
            $this->form_validation->set_rules('package_length','Package Length','required');
			$this->form_validation->set_rules('package_width','Package Width','trim|required|max_length[128]');
            $this->form_validation->set_rules('package_height','Package Height','required|trim');
            $this->form_validation->set_rules('actual_weight','Package Actual Weight','trim');
            //$this->form_validation->set_rules('volumetric_weight','Comapny Contact','required|min_length[10]');
            
			            
            if($this->form_validation->run() == FALSE)
            {
                $this->shippingAdd();
            }
            else
            {
				$customer_name = ucwords(strtolower($this->security->xss_clean($this->input->post('customer_name'))));
                $customer_address = $this->input->post('customer_address');
                $customer_state = $this->input->post('customer_state');
				$customer_pincode = $this->input->post('customer_pincode');
                $customer_gst = $this->input->post('customer_gst');
                $customer_contact = $this->security->xss_clean($this->input->post('customer_contact'));
				$vendor = $this->input->post('vendor');
				$courier = $this->input->post('courier_name');
				$ship_mode = $this->input->post('ship_mode');
				$pLength = $this->input->post('package_length');
				$pWidth  = $this->input->post('package_width');
				$pHeight = $this->input->post('package_height');
				$actual_weight = $this->input->post('actual_weight');
				$volumetric_weight = $this->input->post('volumetric_weight');
				$pickup_date = $this->input->post('pikup_date');
				$commit_date = $this->input->post('commite_date');
				$recieving_date = $this->input->post('recieving_date');
				$performa_number = $this->input->post('perform_number');
				$tracking_no = $this->input->post('docket_number');
                if(empty($performa_number)){$performa_number = 'N/A';}
				
                $shipInfo = array('customer_name'=>$customer_name,'tracking_no'=>$tracking_no,'performa_number'=>$performa_number,'ship_mode'=>$ship_mode,  'customer_address'=>$customer_address, 'customer_state'=> $customer_state,'customer_pincode'=>$customer_pincode,'customer_gst'=>$customer_gst,'customer_contact'=>$customer_contact,'vendor'=>$vendor,'courier'=>$courier,'pLength'=>$pLength,'pWidth'=>$pWidth,'pHeight'=>$pHeight,'actual_weight'=>$actual_weight,'volumetric_weight'=>$volumetric_weight,'pickup_date'=>$pickup_date,'commit_date'=>$commit_date,'recieving_date'=>$recieving_date,'create_date'=>date('Y-m-d H:i:s'));
                //print_r( $shipInfo);
				//$email_check=$this->shipping_model->checkCompanyExists($companyInfo['company_name'],$companyInfo['company_email']);
				$this->load->model('shipping_model');
                $result = $this->shipping_model->addNew($shipInfo,'tbl_shipdetail');
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Shipping Registered successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Shipping creation failed');
                }
                $this->shippingAdd();
                //redirect('addCompany');
            }
        }
    } 		
    /**
     * This function is used load Company edit information
     * @param number $Company_id : Optional : This is user id
     */
    function editVendor($vendor_id= NULL)
    {
        
            if($vendor_id == null)
            {
                $this->vendorListing();
            }
            
            $data['roles'] = $this->shipping_model->getUserRoles();
            $data['vendorInfo'] = $this->shipping_model->getInfo($vendor_id,'vendor_id','tbl_vendor');
			//print_r($data['vendorInfo']);die;
            
            $this->global['pageTitle'] = 'Edit Vendor';
            
            $this->loadViews("vendorEdit", $this->global, $data, NULL);
        
    }
	function get_vendor_based_courier(){
		$vendor_id = $this->input->post('id',TRUE);
		$this->load->model('shipping_model');
		$allCourier =$this->shipping_model->getAllVendorCourier($vendor_id);
		echo json_encode($allCourier);
	}
	
	
	/*function get_vendor_based_courier_list(){
		$id = $this->input->post('id',TRUE);
		$vendor_id = $this->input->post('vendor_id',TRUE);//die;
		$this->load->model('shipping_model');
		$allCourier =$this->shipping_model->shipping_data_success($vendor_id);
		echo json_encode($allCourier);
	}*/
	
	function get_vendor_based_courier_list(){
		$id = $this->input->post('id',TRUE);
		$vendor_id = $this->input->post('vendor_id',TRUE);
		if($id == '0'){
		$shipping_data = $this->shipping_model->shipping_data_success($vendor_id);
		}elseif($id == '1'){
		$shipping_data = $this->shipping_model->shipping_data_pending($vendor_id);
		}elseif($id == '2'){
		$shipping_data = $this->shipping_model->shipping_data_delayed($vendor_id);
		}else{
			$shipping_data = $this->shipping_model->all_shipping_data($vendor_id);
		}
		//print_r($shipping_data);
	echo json_encode($shipping_data);
	}
	function editCourier($courier_id= NULL)
    {
        
            if($courier_id == null)
            {
                $this->courierListing();
            }
            
            $data['roles'] = $this->shipping_model->getUserRoles();
			$data['allVendor'] =$this->shipping_model->getAllData('tbl_vendor');
            $data['courierInfo'] = $this->shipping_model->getInfo($courier_id,'courier_id','tbl_courier');
			//print_r($data['vendorInfo']);die;
            
            $this->global['pageTitle'] = 'Edit Courier';
            
            $this->loadViews("courierEdit", $this->global, $data, NULL);
        
    }
	function editShipping($shipping_id = Null){
		if($shipping_id == null)
            {
                $this->shippingListing();
            }
			$data['roles'] = $this->shipping_model->getUserRoles();
			$data['allVendor'] =$this->shipping_model->getAllData('tbl_vendor');
			$data['shippingInfo'] = $this->shipping_model->getInfo($shipping_id,'shipping_id','tbl_shipdetail');
			$data['allCouriers'] =$this->shipping_model->getInfo($data['shippingInfo'][0]->vendor,'vendor_id','tbl_courier');
			
			//print_r($data['allCouriers']);
			$this->global['pageTitle'] = 'Edit Shipping';
            
            $this->loadViews("shippingEdit", $this->global, $data, NULL);
	}
	
	function deleteShipping($shipping_id = Null){
		if($shipping_id == null)
            {
                $this->shippingListing();
            }
			//$data['roles'] = $this->shipping_model->getUserRoles();
			$data =$this->shipping_model->deleterecords($shipping_id);
			
           if($data == 'true'){
			   $this->shippingListing();
		   }
	}
	public function deleteShipping1() {
		if($this->input->post('id')){
		
		$ids=$this->input->post('id');
		$data = $this->shipping_model->deleterecords($ids);
		if($data == 'true'){
			   echo ("Records Deleted Successfully");
		   }		
	  	}
	}
    /**
     * This function is used to update company Details to the system
     */
    function editVendorDetails()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('vendor_name','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('vendor_address','Company Address','required|trim');
            $this->form_validation->set_rules('vendor_gst','Company Gst Number','trim');
            $this->form_validation->set_rules('vendor_contact','Comapny Contact','required|min_length[10]');
            
			            
            if($this->form_validation->run() == FALSE)
            {
                $this->vendorAdd();
            }
            else
            {
				$vendorId = $this->input->post('vendor_id');
				$vendor_name = ucwords(strtolower($this->security->xss_clean($this->input->post('vendor_name'))));
                $vendor_address = $this->input->post('vendor_address');
                $vendor_gst = $this->input->post('vendor_gst');
                $vendor_contact = $this->security->xss_clean($this->input->post('vendor_contact'));
				
                $vendorInfo = array('vendor_name'=>$vendor_name, 'vendor_address'=>$vendor_address, 'vendor_gst'=>$vendor_gst, 'vendor_contact'=> $vendor_contact,'vendor_updateDate'=>date('Y-m-d H:i:s'));
			
                $this->load->model('shipping_model');
                $result = $this->shipping_model->updateDetails('tbl_vendor',$vendorInfo,'vendor_id',$vendorId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Vendor Details updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Vendor updation failed');
                }
               
               $this->vendorAdd();
            }
        }
    }
	function editCourierDetails()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('courier_name','Courier Name','required|trim');
            
			            
            if($this->form_validation->run() == FALSE)
            {
                $this->courierAdd();
            }
            else
            {
				$vendor_id = $this->input->post('vendor');
				$courierId = $this->input->post('courier_id');
				$courier_name = $this->input->post('courier_name');
				$courierInfo = array('vendor_id'=>$vendor_id, 'courier_name'=>$courier_name,'courier_updateDate'=>date('Y-m-d H:i:s'));
				
				$this->load->model('shipping_model');
                $result = $this->shipping_model->updateDetails('tbl_courier',$courierInfo,'courier_id',$courierId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Courier Details updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Courier updation failed');
                }
               
               $this->courierAdd();
            }
        }
    }
	function editShippingDetail(){
		if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('customer_name','Customer Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('customer_contact','Customer Contact Number','required|trim');
            $this->form_validation->set_rules('customer_address','Customer Address','trim');
            $this->form_validation->set_rules('customer_state','Customer State','required');
			$this->form_validation->set_rules('customer_pincode','Customer Pincode','trim|required|max_length[128]');
            $this->form_validation->set_rules('vendor','Vendor Required','required|trim');
            $this->form_validation->set_rules('courier_name','Courier Name','trim');
            $this->form_validation->set_rules('package_length','Package Length','required');
			$this->form_validation->set_rules('package_width','Package Width','trim|required|max_length[128]');
            $this->form_validation->set_rules('package_height','Package Height','required|trim');
            $this->form_validation->set_rules('actual_weight','Package Actual Weight','trim');
            
			            
            if($this->form_validation->run() == FALSE)
            {
                $this->shippingAdd();
            }
            else
            {
				$customer_name = ucwords(strtolower($this->security->xss_clean($this->input->post('customer_name'))));
                $customer_address = $this->input->post('customer_address');
                $customer_state = $this->input->post('customer_state');
				$customer_pincode = $this->input->post('customer_pincode');
                $customer_gst = $this->input->post('customer_gst');
                $customer_contact = $this->security->xss_clean($this->input->post('customer_contact'));
				$vendor = $this->input->post('vendor');
				$courier = $this->input->post('courier_name');
				$ship_mode = $this->input->post('ship_mode');
				$pLength = $this->input->post('package_length');
				$pWidth  = $this->input->post('package_width');
				$pHeight = $this->input->post('package_height');
				$actual_weight = $this->input->post('actual_weight');
				$volumetric_weight = $this->input->post('volumetric_weight');
				$pickup_date = $this->input->post('pikup_date');
				$commit_date = $this->input->post('commite_date');
				$recieving_date = $this->input->post('recieving_date');
				$performa_number = $this->input->post('perform_number');
                if(empty($performa_number)){$performa_number = 'N/A';}
				$shipping_id = $this->input->post('shipping_id');
				$tracking_no = $this->input->post('docket_number');
				
				$this->load->model('shipping_model');
				$shipInfo = array('customer_name'=>$customer_name,'tracking_no'=>$tracking_no,'performa_number'=>$performa_number,'ship_mode'=>$ship_mode, 'customer_address'=>$customer_address, 'customer_state'=> $customer_state,'customer_pincode'=>$customer_pincode,'customer_gst'=>$customer_gst,'customer_contact'=>$customer_contact,'vendor'=>$vendor,'courier'=>$courier,'pLength'=>$pLength,'pWidth'=>$pWidth,'pHeight'=>$pHeight,'actual_weight'=>$actual_weight,'volumetric_weight'=>$volumetric_weight,'pickup_date'=>$pickup_date,'commit_date'=>$commit_date,'recieving_date'=>$recieving_date,'create_date'=>date('Y-m-d H:i:s'), 'update_date'=>date('Y-m-d H:i:s'));
                $result = $this->shipping_model->updateDetails('tbl_shipdetail',$shipInfo,'shipping_id',$shipping_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Shipping Details updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Shipping updation failed');
                }
               
               $this->shippingAdd();
            }
        }
	}
    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Promotionalwears Inventory Managment : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }

    
}

?>