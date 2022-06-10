<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Company extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('company_model');
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
    function companyListing()
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
            
            $count = $this->company_model->companyListingCount($searchText);

			$returns = $this->paginationCompress ( "userListing/", $count, 10 );
            
            $data['userRecords'] = $this->company_model->userListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'CodeInsect : Company Listing';
            
            $this->loadViews("company", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new company form
     */
    function addCompany()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('company_model');
			$data['roles'] = $this->company_model->getUserRoles();
            
            $this->global['pageTitle'] = 'CodeInsect : Add New Company';

            $this->loadViews("addCompany", $this->global, $data, NULL);
        }
    }

     /**
     * This function is used to REGISTER NEW COMPANY to the system
     */
    function registerNewCompany()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('company_name','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('company_email','Company Email','trim|required');
            $this->form_validation->set_rules('company_address','Company Address','required|trim');
            $this->form_validation->set_rules('company_gst','Company Gst Number','trim|required');
            $this->form_validation->set_rules('company_contact','Comapny Contact','required|min_length[10]');
            //$this->form_validation->set_rules('company_logo','Company Logo','required');
			$this->form_validation->set_rules('bank_name','Company Bank Name','required|trim');
			$this->form_validation->set_rules('account_holder','Account Holder Name','required|trim');
			$this->form_validation->set_rules('account_number','Company Account Number','required|trim');
			$this->form_validation->set_rules('ifsc_code','Company IFSC Code','required|trim');
			            
            if($this->form_validation->run() == FALSE)
            {
                $this->addCompany();
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('company_name'))));
                $company_email = $this->input->post('company_email');
                $company_address = $this->input->post('company_address');
                $company_gst = $this->input->post('company_gst');
                $company_contact = $this->security->xss_clean($this->input->post('company_contact'));
				$bank_name = $this->input->post('bank_name');
                $account_holder = $this->input->post('account_holder');
				$account_number = $this->input->post('account_number');
                $ifsc_code = $this->input->post('ifsc_code');
				
				if(!empty($_FILES['company_logo']['name'])){
                $config['upload_path'] = 'assets/images/uploads';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['company_logo']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('company_logo')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
				
				}else{
					$picture = '';
				}
                
                $companyInfo = array('company_name'=>$name, 'company_email'=>$company_email, 'company_address'=>$company_address, 'company_gst'=> $company_gst,'company_contact'=>$company_contact,'bank_name'=>$bank_name,'account_holder'=>$account_holder,'account_number'=>$account_number,'ifsc_code'=>$ifsc_code,'company_logo'=>$picture, 'client_createdDate'=>date('Y-m-d H:i:s'));
                
				$email_check=$this->company_model->checkCompanyExists($companyInfo['company_name'],$companyInfo['company_email']);
				if($email_check){
                $this->load->model('company_model');
                $result = $this->company_model->addNewCompany($companyInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Company Registered successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Company creation failed');
                }
                }else{$this->session->set_flashdata('error', 'Company Also registered');}
                //redirect('addCompany');
            }
        }
    }    
    /**
     * This function is used load Company edit information
     * @param number $Company_id : Optional : This is user id
     */
    function editCompany($Company_id= NULL)
    {
        
            if($Company_id == null)
            {
                redirect('compaListing');
            }
            
            $data['roles'] = $this->company_model->getUserRoles();
            $data['userInfo'] = $this->company_model->getCompanyInfo($Company_id);
            
            $this->global['pageTitle'] = 'Edit Company';
            
            $this->loadViews("editCompany", $this->global, $data, NULL);
        
    }
    /**
     * This function is used to update company Details to the system
     */
    function updateCompany()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('company_name','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('company_email','Company Email','trim|required');
            $this->form_validation->set_rules('company_address','Company Address','required|trim');
            $this->form_validation->set_rules('company_gst','Company Gst Number','trim|required');
            $this->form_validation->set_rules('company_contact','Comapny Contact','required|min_length[10]');
            //$this->form_validation->set_rules('company_logo','Company Logo','required');
			$this->form_validation->set_rules('bank_name','Company Bank Name','required|trim');
			$this->form_validation->set_rules('account_holder','Account Holder Name','required|trim');
			$this->form_validation->set_rules('account_number','Company Account Number','required|trim');
			$this->form_validation->set_rules('ifsc_code','Company IFSC Code','required|trim');
			            
            if($this->form_validation->run() == FALSE)
            {
                $this->addCompany();
            }
            else
            {
				$company_id = $this->input->post('company_id');
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('company_name'))));
                $company_email = $this->input->post('company_email');
                $company_address = $this->input->post('company_address');
                $company_gst = $this->input->post('company_gst');
                $company_contact = $this->security->xss_clean($this->input->post('company_contact'));
				$bank_name = $this->input->post('bank_name');
                $account_holder = $this->input->post('account_holder');
				$account_number = $this->input->post('account_number');
                $ifsc_code = $this->input->post('ifsc_code');
				$oldlogo = $this->input->post('oldlogo');
				
				if(!empty($_FILES['company_logo']['name'])){
                $config['upload_path'] = 'assets/images/uploads';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['company_logo']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
					if($this->upload->do_upload('company_logo')){
						$uploadData = $this->upload->data();
						$picture = $uploadData['file_name'];
					}else{
						$picture = 'a';
					}
				$companyInfo = array('company_name'=>$name, 'company_email'=>$company_email, 'company_address'=>$company_address, 'company_gst'=> $company_gst,'company_contact'=>$company_contact,'bank_name'=>$bank_name,'account_holder'=>$account_holder,'account_number'=>$account_number,'ifsc_code'=>$ifsc_code,'company_logo'=>$picture, 'client_updateDate'=>date('Y-m-d H:i:s'));
				}
				else{
					$companyInfo = array('company_name'=>$name, 'company_email'=>$company_email, 'company_address'=>$company_address, 'company_gst'=> $company_gst,'company_contact'=>$company_contact,'bank_name'=>$bank_name,'account_holder'=>$account_holder,'account_number'=>$account_number,'ifsc_code'=>$ifsc_code,'company_logo'=>$oldlogo,'client_updateDate'=>date('Y-m-d H:i:s'));
				}
                
                $email_check=$this->company_model->checkCompanyExists($companyInfo['company_name'],$companyInfo['company_email']);
				
                
                $this->load->model('company_model');
                $result = $this->company_model->updateCompanyDetails($companyInfo,$company_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Company updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Company updation failed');
                }
               
                redirect('addCompany');
            }
        }
    }
    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }

    
}

?>