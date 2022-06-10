<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class createpdf extends BaseController
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('createpdf_model');
        //$this->isLoggedIn();   
		$this->load->helper('pdf_helper');
    }
 function pdf()
{
    $this->load->helper('pdf_helper');
	
	 $this->load->view('pdfreport1');
}
 function index()
{
    $this->load->helper('pdf_helper');
	// $this->load->view('pdfreport1');
}
function genratepdf($invoice_id= NULL)
    {
		//echo "test";
	   $this->load->helper('pdf_helper');
            if($invoice_id == null)
            {
                echo "error";
            }
			$this->load->model('performa_model');
            $data['Company'] = $this->createpdf_model->getCompany();
			
            $data['invoiceInfo'] = $this->createpdf_model->getPerformaInfo($invoice_id);
			
			$invoice_number = $this->input->post('invoice_number');
			 
			
			$data['invoiceProductInfo'] = $this->createpdf_model->getPerformaProInfo($invoice_id);
            
            $this->global['pageTitle'] = 'Performa Pdf';
            
            $this->loadViews("pdfreport1", $this->global, $data, NULL);    
    }
	
	
}
?>