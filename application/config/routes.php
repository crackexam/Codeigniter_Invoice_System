<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = "login";
$route['404_override'] = 'error';


/*********** USER DEFINED ROUTES *******************/
// shipping routes
$route['shippingListing'] = 'shipping/shippingListing';
$route['shippingAdd'] = "shipping/shippingAdd";
// Vendor Routes
$route['vendorListing'] = 'shipping/vendorListing';
$route['vendorListing/(:num)'] = "shipping/vendorListing/$1";
$route['vendorAdd'] = "shipping/vendorAdd";
$route['addNewVendor'] = "shipping/addNewVendor";
$route['editVendor'] = "shipping/editVendor";
$route['editVendor/(:num)'] = "shipping/editVendor/$1";
$route['editVendorDetails'] = "shipping/editVendorDetails";
// Curier Routes
$route['courierListing'] = 'shipping/courierListing';
$route['courierListing/(:num)'] = "shipping/courierListing/$1";
//$route['courierAdd'] = "shipping/courierAdd";


$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['companyListing'] = 'company/companyListing';
$route['Email'] = 'email';
$route['logout'] = 'user/logout';
$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";

$route['countResults'] = 'dashboard/countResults';
$route['companyListing/(:num)'] = "company/companyListing/$1";
$route['addCompany'] = "company/addCompany";
$route['registerNewCompany'] = "company/registerNewCompany";
$route['editCompany'] = "company/editCompany";
$route['editCompany/(:num)'] = "company/editCompany/$1";
$route['updateCompany'] = "company/updateCompany";

$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['login-history'] = "user/loginHistoy";
$route['login-history/(:num)'] = "user/loginHistoy/$1";
$route['login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";

$route['productListing'] = 'product/productListing';
$route['productListing/(:num)'] = "product/productListing/$1";
$route['productListingNew/(:num)'] = "product/productListingNew/$1";
$route['addProduct'] = "product/addProduct";
$route['addNewProduct'] = "product/addNewProduct";
$route['editProduct'] = "product/editProduct";
$route['editProduct/(:num)'] = "product/editProduct/$1";
$route['updateProduct'] = "product/updateProduct";

$route['invoiceListing'] = 'invoice/invoiceListing';
$route['invoiceListing/(:num)'] = "invoice/invoiceListing/$1";
$route['addInvoice'] = "invoice/addInvoice";
$route['addInvoice2'] = "invoice/addInvoice2";
$route['searchClient']= "invoice/searchClient";
$route['liveSearch']="invoice/liveSearch";
$route['saveInvoice'] = "invoice/saveInvoice";
$route['editInvoice'] = "invoice/editInvoice";
$route['updateInvoice'] = "invoice/updateInvoice";
$route['editInvoice/(:num)'] = "invoice/editInvoice/$1";
$route['viewInvoice'] = "invoice/viewInvoice";
$route['viewInvoice/(:num)'] = "invoice/viewInvoice/$1";

$route['performaListing'] = 'performa/performaListing';
$route['performaListing/(:num)'] = "performa/performaListing/$1";
$route['addPerforma'] = "performa/addPerforma";
$route['searchClient']= "performa/searchClient";
$route['liveSearch']="performa/liveSearch";
$route['savePerforma'] = "performa/savePerforma";
$route['editPerforma'] = "performa/editPerforma";
$route['updatePerforma'] = "performa/updatePerforma";
$route['editPerforma/(:num)'] = "performa/editPerforma/$1";
$route['viewPerforma'] = "performa/viewPerforma";
$route['viewPerforma/(:num)'] = "performa/viewPerforma/$1";
$route['createPerformainvoice']="performa/createPerformainvoice";
$route['createPerformainvoice/(:num)'] = "performa/createPerformainvoice/$1";
$route['generatePerformainvoice'] = "performa/generatePerformainvoice";

//$route['createpdf'] = "createpdf/pdf";
$route['pdfdetails'] = "performa/pdfdetails";
$route['pdfdetails/(:num)'] = "performa/pdfdetails/$1";
//$route['createpdf/(:num)'] = "createpdf/$1";

//$route['pdfdetails/(:num)'] = "pdfdetails/$1";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";

/* End of file routes.php */
/* Location: ./application/config/routes.php */