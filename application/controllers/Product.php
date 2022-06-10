<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Product extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
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
    function productListing()
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
            
            $count = $this->product_model->productListingCount($searchText);

			$returns = $this->paginationCompress ( "productListing/", $count, 10 );
            
            $data['productRecords'] = $this->product_model->productListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Product Listing';
            
            $this->loadViews("products", $this->global, $data, NULL);
        }
    }

	function productListingNew()
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
            
            $count = $this->product_model->productListingCount($searchText);

			$returns = $this->paginationCompress ( "productListingNew/", $count, 10 );
            
            $data['productRecords'] = $this->product_model->productListingNew($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Product Listing';
            
            $this->loadViews("productsnew", $this->global, $data, NULL);
        }
    }
    /**
     * This function is used to load the add new company form
     */
    function addProduct()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('product_model');
			$data['roles'] = $this->product_model->getUserRoles();
            
            $this->global['pageTitle'] = 'Add New Product';

            $this->loadViews("addProduct", $this->global, $data, NULL);
        }
    }

     /**
     * This function is used to REGISTER NEW COMPANY to the system
     */
    function addNewProduct()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('product_name','Product Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('product_model','Product model','required');
            			            
            if($this->form_validation->run() == FALSE)
            {
                $this->addProduct();
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('product_name'))));
                $product_model = $this->input->post('product_model');
                $product_id = $this->input->post('product_id');
                				
                $productInfo = array('product_name'=>$name, 'product_id'=>$product_id, 'product_model'=>$product_model);
                
				$product_check=$this->product_model->checkProductExists($productInfo['product_name']);
				if($product_check){
                $this->load->model('product_model');
                $result = $this->product_model->addNewProduct($productInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Product Entered successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Product creation failed');
                }
                }else{$this->session->set_flashdata('error', 'Product Also registered');}
                redirect('addProduct');
            }
        }
    }    
    /**
     * This function is used load Company edit information
     * @param number $Company_id : Optional : This is user id
     */
    function editProduct($product_id= NULL)
    {
        
            if($product_id == null)
            {
                redirect('productListing');
            }
            
            $data['roles'] = $this->product_model->getUserRoles();
            $data['productInfo'] = $this->product_model->getProductInfo($product_id);
            //print_r($data['productInfo']);die;
            $this->global['pageTitle'] = 'Edit Product';
            
            $this->loadViews("editProduct", $this->global, $data, NULL);
        
    }
    /**
     * This function is used to update company Details to the system
     */
    function updateProduct()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('product_name','Product Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('product_hsn','Product HSN Number','trim|required');
            
			            
            if($this->form_validation->run() == FALSE)
            {
                $this->addProduct();
            }
            else
            {
				$id = $this->input->post('product_id');
				$name = ucwords(strtolower($this->security->xss_clean($this->input->post('product_name'))));
                $model = $this->input->post('product_hsn');
                
								
                $productInfo = array('product_name'=>$name, 'product_model'=>$model);
                
                $this->load->model('product_model');
				
				/*$checkupdate = $this->product_model->checkProductinvoice($id);
				if($checkupdate == 0)
				{*/
					$result = $this->product_model->updateProductDetails($productInfo,$id);
					if($result == true)
						{
							$this->session->set_flashdata('success', 'Product updated successfully');
							
						}
						else
						{
							$this->session->set_flashdata('error', 'Product updation failed');
							
						}
                /*} else{
						$this->session->set_flashdata('error', 'Product updation failed, beacause this product is add in an Generated Invoice');
						
					}*/
                //redirect('product/productListingNew');
				redirect('product/productListingNew');
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