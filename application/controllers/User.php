<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class User extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Promotionalwears : Dashboard';
		
		$this->load->model('Dashboard_model');
		$data['client_count'] = $this->Dashboard_model->client_count();
		$data['last_inserted_client'] = $this->Dashboard_model->last_inserted_client();
		
        $data['product_count'] = $this->Dashboard_model->product_count();
		$data['last_inserted_product'] = $this->Dashboard_model->last_inserted_product();
		
		$data['pi_count'] = $this->Dashboard_model->pi_count();
		$data['last_inserted_PI_invoice'] = $this->Dashboard_model->last_inserted_PI_invoice();
       
		$data['in_count'] = $this->Dashboard_model->in_count();
		$data['last_inserted_In_invoice'] = $this->Dashboard_model->last_inserted_In_invoice();
		
		$data['shipping_data_success'] = $this->Dashboard_model->shipping_data_success();
		$data['shipping_data_delayed'] = $this->Dashboard_model->shipping_data_delayed();
		$data['shipping_data_pending'] = $this->Dashboard_model->shipping_data_pending();
		$data['shipping_data_all'] = $this->Dashboard_model->shipping_data_all();
		
		
		$data['vendor_shipping_data'] 	  = $this->Dashboard_model->vendor_shipping_data_all();
		//print_r($data);
		//	print_r($data['shipping_data_delayed']);//die;
		$this->loadViews("dashboard", $this->global, $data , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function userListing()
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
            
            $count = $this->user_model->userListingCount($searchText);

			$returns = $this->paginationCompress ( "userListing/", $count, 10 );
            
            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Promotionalwears : User Listing';
            
            $this->loadViews("users", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();
            
            $this->global['pageTitle'] = 'Promotionalwears : Add New User';

            $this->loadViews("addNew", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    function checkemail()
    {
        $username  = $this->input->post('email');
		$result 		= $this->user_model->checkClientExists($username);
		echo $result;
		
    }
	function checkemailedit()
    {
        $username  = $this->input->post('email');
		$id  = $this->input->post('client_id');
		$result    = $this->user_model->checkClientExists($username);
		echo $result;
		
    }
	function setDefaultAddress()
    {
        $client_id   = $this->input->post('cid');
		$address_id  = $this->input->post('aid');
		$result 	 = $this->user_model->setDefaultAddress($client_id,$address_id);
		echo $result;
		
    }
	function unsetDefaultAddress()
    {
        $client_id   = $this->input->post('cid');
		$address_id  = $this->input->post('aid');
		$result 	 = $this->user_model->unsetDefaultAddress($client_id,$address_id);
		echo $result;
		
    }
	/*function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }*/
    
    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('client_name','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('client_company','Client Company','trim|required');
			$this->form_validation->set_rules('client_email','Client Email','required');
            $this->form_validation->set_rules('client_address','Client Address','required|trim');
			$this->form_validation->set_rules('client_state','Client State Name','required|trim');
            $this->form_validation->set_rules('client_gst','Client Company Gst Number','trim');
            $this->form_validation->set_rules('client_contact','Client Contact','required');
			$this->form_validation->set_rules('pincode','Pincode','required');
            /*$this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');*/
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('client_name'))));
                $company = $this->security->xss_clean($this->input->post('client_company'));
                $address = $this->input->post('client_address');
				$client_state = $this->input->post('client_state');
				$client_other_state = $this->input->post('other_state');
				$country = $this->input->post('country');
                $gst = $this->input->post('client_gst');
				$email = $this->input->post('client_email');
                $mobile = $this->security->xss_clean($this->input->post('client_contact'));
				$pincode = $this->security->xss_clean($this->input->post('pincode'));
                
                $userInfo = array('client_name'=>$name, 'client_company'=>$company, 'client_email'=>$email, 'client_address'=>$address,'state_name'=>$client_state,'client_other_state'=>$client_other_state,'country'=>$country ,'client_gst'=> $gst,'client_mobile'=>$mobile, 'pincode'=>$pincode, 'client_createdDate'=>date('Y-m-d H:i:s'));
                
                //$email_check=$this->user_model->checkClientExists($userInfo['client_email']);
				//if($email_check){
				$this->load->model('user_model');
                $result = $this->user_model->addNewUser($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                //}else{$this->session->set_flashdata('error', 'Client Also registered');}
                redirect('addNew');
            }
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
			$data['userAddress'] = $this->user_model->getUserAddresses($userId);
            //print_r($data['userAddress']);
            $this->global['pageTitle'] = 'Promotionalwears : Edit User';
            
            $this->loadViews("editOld", $this->global, $data, NULL);
        
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('client_id');
            $pincode = $this->security->xss_clean($this->input->post('pincode'));
            $this->form_validation->set_rules('client_name','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('client_company','Client Company','trim|required');
			$email = $this->input->post('client_email');
			$this->form_validation->set_rules('client_address','Client Address','required|trim');
			$this->form_validation->set_rules('client_state','Client State Name','required|trim');
            $this->form_validation->set_rules('client_gst','Client Company Gst Number');
            $this->form_validation->set_rules('client_contact','Client Contact','required');
			$this->form_validation->set_rules('pincode','Pincode','required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {   $userId = $this->input->post('client_id');
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('client_name'))));
                $company = $this->security->xss_clean($this->input->post('client_company'));
                $address = $this->input->post('client_address');
				$client_state = $this->input->post('client_state');
				$client_other_state = $this->input->post('other_state');
				$country = $this->input->post('country');
				$email = $this->input->post('client_email');
                $gst = $this->input->post('client_gst');
                $mobile = $this->security->xss_clean($this->input->post('client_contact'));
                
                $userInfo = array('client_name'=>$name, 'client_company'=>$company,'client_email'=>$email, 'client_address'=>$address,'state_name'=>$client_state,'client_other_state'=>$client_other_state,'country'=>$country , 'client_gst'=> $gst,'client_mobile'=>$mobile, 'pincode'=>$pincode, 'client_updateDate'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->editUser($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('userListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->deleteUser($userId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    /**
     * This function is used to load Add New Address Form
     */
	function addNewAddress($userId = NULL)
    {
        
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            //print_r($data['userInfo']);
            $this->global['pageTitle'] = 'Promotionalwears : Add New Address';
            
            $this->loadViews("addNewAddress", $this->global, $data, NULL);
        
    }
	
	/**
     * This function is used to add new address of customer to the system
     */
    function addAddress()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('client_id');
            $pincode = $this->security->xss_clean($this->input->post('pincode'));
           	$this->form_validation->set_rules('client_address','Client Address','required|trim');
			$this->form_validation->set_rules('client_state','Client State Name','required|trim');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $address = $this->input->post('client_address');
				$client_state = $this->input->post('client_state');
                $pincode = $this->security->xss_clean($this->input->post('pincode'));
                $userId = $this->input->post('client_id');
				
                $userInfo = array('m_client_address'=>$address,'m_client_state'=>$client_state,'m_client_pincode'=>$pincode,'client_id'=>$userId,'is_Default'=>0);
                
				$this->load->model('user_model');
                $result = $this->user_model->addNewAddress($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User Address Add successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'New User Address Add failed');
                }
                //}else{$this->session->set_flashdata('error', 'Client Also registered');}
                redirect('addNew');
            }
        }
    }
	
    /**
     * This function is used to load the change password screen
     */
    function loadChangePass()
    {
        $this->global['pageTitle'] = 'Promotionalwears : Change Password';
        
        $this->loadViews("changePassword", $this->global, NULL, NULL);
    }
    
    
    /**
     * This function is used to change the password of the user
     */
    function changePassword()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->loadChangePass();
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect('loadChangePass');
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect('loadChangePass');
            }
        }
    }

    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Promotionalwears : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }

    /**
     * This function used to show login history
     * @param number $userId : This is user id
     */
    function loginHistoy($userId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $userId = ($userId == NULL ? $this->session->userdata("userId") : $userId);

            $searchText = $this->input->post('searchText');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $data["userInfo"] = $this->user_model->getUserInfoById($userId);

            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->loginHistoryCount($userId, $searchText, $fromDate, $toDate);

            $returns = $this->paginationCompress ( "login-history/".$userId."/", $count, 5, 3);

            $data['userRecords'] = $this->user_model->loginHistory($userId, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Promotionalwears : User Login History';
            
            $this->loadViews("loginHistory", $this->global, $data, NULL);
        }        
    }
}

?>