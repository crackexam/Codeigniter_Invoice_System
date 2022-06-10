<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-03-21 06:10:28 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 163
ERROR - 2020-03-21 06:10:28 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 163
ERROR - 2020-03-21 06:10:28 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 163
ERROR - 2020-03-21 06:10:28 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 202
ERROR - 2020-03-21 06:10:28 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 202
ERROR - 2020-03-21 06:10:28 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 202
ERROR - 2020-03-21 06:10:28 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 243
ERROR - 2020-03-21 06:10:28 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 243
ERROR - 2020-03-21 06:10:28 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 243
ERROR - 2020-03-21 06:58:19 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\invoice\application\controllers\Performa.php 33
ERROR - 2020-03-21 07:28:06 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 07:28:06 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 07:41:51 --> Severity: Notice --> Undefined variable: userAddress C:\xampp\htdocs\invoice\application\controllers\Performa.php 34
ERROR - 2020-03-21 07:41:51 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\invoice\application\controllers\Performa.php 34
ERROR - 2020-03-21 07:43:24 --> Severity: Notice --> Undefined variable: userAddress C:\xampp\htdocs\invoice\application\controllers\Performa.php 34
ERROR - 2020-03-21 07:43:24 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\invoice\application\controllers\Performa.php 34
ERROR - 2020-03-21 07:55:54 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 07:55:54 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 08:02:42 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 08:02:42 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 08:32:10 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 08:33:37 --> Severity: Notice --> Undefined variable: userAddress C:\xampp\htdocs\invoice\application\views\viewPerforma.php 91
ERROR - 2020-03-21 08:33:37 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 08:36:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.`m_client_address`, `add`.`m_client_state`, `add`.`m_client_pincode`
FROM `tbl_' at line 1 - Invalid query: SELECT `inv`.`invoice_id`, `inv`.`payment_mode`, `inv`.`spl_msg`, `inv`.`shipping_cost`, `inv`.`invoice_createDate`, `inv`.`invoice_subtotal`, `inv`.`invoice_number`, `inv`.`amount_due`, `inv`.`amount_paid`, `inv`.`doctype`, `com`.`company_id`, `com`.`company_name`, `com`.`company_email`, `com`.`company_address`, `com`.`company_gst`, `com`.`company_contact`, `cli`.`client_name`, `cli`.`client_company`, `cli`.`client_id`, `cli`.`client_address`, `cli`.`state_name`, `cli`.`client_gst`, `cli`.`client_mobile`, `cli`.`pincode`.`add`.`m_client_address`, `add`.`m_client_state`, `add`.`m_client_pincode`
FROM `tbl_invoice` as `inv`
JOIN `tbl_company` as `com` ON `inv`.`company_id` = `com`.`company_id`
JOIN `tbl_client` as `cli` ON `inv`.`client_id` = `cli`.`client_id`
JOIN `tbl_client_address` as `add` ON `inv`.`address_id` = `add`.`id`
WHERE `invoice_id` = '175'
 LIMIT 1
ERROR - 2020-03-21 09:15:08 --> Severity: Notice --> Undefined variable: userAddress C:\xampp\htdocs\invoice\application\views\viewPerforma.php 91
ERROR - 2020-03-21 09:15:08 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: company_address C:\xampp\htdocs\invoice\application\views\viewPerforma.php 71
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: company_contact C:\xampp\htdocs\invoice\application\views\viewPerforma.php 73
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: company_email C:\xampp\htdocs\invoice\application\views\viewPerforma.php 74
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: payment_mode C:\xampp\htdocs\invoice\application\views\viewPerforma.php 81
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: client_company C:\xampp\htdocs\invoice\application\views\viewPerforma.php 90
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: userAddress C:\xampp\htdocs\invoice\application\views\viewPerforma.php 91
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: client_address C:\xampp\htdocs\invoice\application\views\viewPerforma.php 97
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: client_pincode C:\xampp\htdocs\invoice\application\views\viewPerforma.php 97
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: client_pincode C:\xampp\htdocs\invoice\application\views\viewPerforma.php 97
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: state_name C:\xampp\htdocs\invoice\application\views\viewPerforma.php 98
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: client_contact C:\xampp\htdocs\invoice\application\views\viewPerforma.php 100
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: client_gst C:\xampp\htdocs\invoice\application\views\viewPerforma.php 102
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: shipping_cost C:\xampp\htdocs\invoice\application\views\viewPerforma.php 163
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: shipping_cost C:\xampp\htdocs\invoice\application\views\viewPerforma.php 167
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: amount_paid C:\xampp\htdocs\invoice\application\views\viewPerforma.php 170
ERROR - 2020-03-21 09:15:09 --> Severity: Warning --> A non-numeric value encountered C:\xampp\htdocs\invoice\application\views\viewPerforma.php 183
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: amount_paid C:\xampp\htdocs\invoice\application\views\viewPerforma.php 183
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: state_name C:\xampp\htdocs\invoice\application\views\viewPerforma.php 190
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: state_name C:\xampp\htdocs\invoice\application\views\viewPerforma.php 190
ERROR - 2020-03-21 09:15:09 --> Severity: Notice --> Undefined variable: spl_msg C:\xampp\htdocs\invoice\application\views\viewPerforma.php 231
ERROR - 2020-03-21 09:15:09 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 09:15:33 --> Severity: Notice --> Undefined variable: userAddress C:\xampp\htdocs\invoice\application\views\viewPerforma.php 91
ERROR - 2020-03-21 09:15:33 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 09:20:24 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: company_address C:\xampp\htdocs\invoice\application\views\viewPerforma.php 74
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: company_contact C:\xampp\htdocs\invoice\application\views\viewPerforma.php 76
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: company_email C:\xampp\htdocs\invoice\application\views\viewPerforma.php 77
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: payment_mode C:\xampp\htdocs\invoice\application\views\viewPerforma.php 84
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: client_company C:\xampp\htdocs\invoice\application\views\viewPerforma.php 93
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: m_client_address C:\xampp\htdocs\invoice\application\views\viewPerforma.php 94
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: m_client_address C:\xampp\htdocs\invoice\application\views\viewPerforma.php 94
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: client_contact C:\xampp\htdocs\invoice\application\views\viewPerforma.php 95
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: client_contact C:\xampp\htdocs\invoice\application\views\viewPerforma.php 96
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: client_contact C:\xampp\htdocs\invoice\application\views\viewPerforma.php 97
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: client_gst C:\xampp\htdocs\invoice\application\views\viewPerforma.php 99
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: shipping_cost C:\xampp\htdocs\invoice\application\views\viewPerforma.php 160
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: shipping_cost C:\xampp\htdocs\invoice\application\views\viewPerforma.php 164
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: amount_paid C:\xampp\htdocs\invoice\application\views\viewPerforma.php 167
ERROR - 2020-03-21 09:20:33 --> Severity: Warning --> A non-numeric value encountered C:\xampp\htdocs\invoice\application\views\viewPerforma.php 180
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: amount_paid C:\xampp\htdocs\invoice\application\views\viewPerforma.php 180
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: state_name C:\xampp\htdocs\invoice\application\views\viewPerforma.php 187
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: state_name C:\xampp\htdocs\invoice\application\views\viewPerforma.php 187
ERROR - 2020-03-21 09:20:33 --> Severity: Notice --> Undefined variable: spl_msg C:\xampp\htdocs\invoice\application\views\viewPerforma.php 228
ERROR - 2020-03-21 09:20:33 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: company_address C:\xampp\htdocs\invoice\application\views\viewPerforma.php 74
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: company_contact C:\xampp\htdocs\invoice\application\views\viewPerforma.php 76
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: company_email C:\xampp\htdocs\invoice\application\views\viewPerforma.php 77
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: payment_mode C:\xampp\htdocs\invoice\application\views\viewPerforma.php 84
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: client_company C:\xampp\htdocs\invoice\application\views\viewPerforma.php 93
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: m_client_address C:\xampp\htdocs\invoice\application\views\viewPerforma.php 94
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: m_client_address C:\xampp\htdocs\invoice\application\views\viewPerforma.php 94
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: client_contact C:\xampp\htdocs\invoice\application\views\viewPerforma.php 95
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: client_contact C:\xampp\htdocs\invoice\application\views\viewPerforma.php 96
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: client_contact C:\xampp\htdocs\invoice\application\views\viewPerforma.php 97
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: client_gst C:\xampp\htdocs\invoice\application\views\viewPerforma.php 99
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: shipping_cost C:\xampp\htdocs\invoice\application\views\viewPerforma.php 160
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: shipping_cost C:\xampp\htdocs\invoice\application\views\viewPerforma.php 164
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: amount_paid C:\xampp\htdocs\invoice\application\views\viewPerforma.php 167
ERROR - 2020-03-21 09:20:40 --> Severity: Warning --> A non-numeric value encountered C:\xampp\htdocs\invoice\application\views\viewPerforma.php 180
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: amount_paid C:\xampp\htdocs\invoice\application\views\viewPerforma.php 180
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: state_name C:\xampp\htdocs\invoice\application\views\viewPerforma.php 187
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: state_name C:\xampp\htdocs\invoice\application\views\viewPerforma.php 187
ERROR - 2020-03-21 09:20:40 --> Severity: Notice --> Undefined variable: spl_msg C:\xampp\htdocs\invoice\application\views\viewPerforma.php 228
ERROR - 2020-03-21 09:20:40 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 09:22:58 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: company_address C:\xampp\htdocs\invoice\application\views\viewPerforma.php 74
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: company_contact C:\xampp\htdocs\invoice\application\views\viewPerforma.php 76
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: company_email C:\xampp\htdocs\invoice\application\views\viewPerforma.php 77
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: payment_mode C:\xampp\htdocs\invoice\application\views\viewPerforma.php 84
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: client_company C:\xampp\htdocs\invoice\application\views\viewPerforma.php 93
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: m_client_address C:\xampp\htdocs\invoice\application\views\viewPerforma.php 94
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: client_address C:\xampp\htdocs\invoice\application\views\viewPerforma.php 94
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: m_client_state C:\xampp\htdocs\invoice\application\views\viewPerforma.php 95
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: state_name C:\xampp\htdocs\invoice\application\views\viewPerforma.php 95
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: m_client_pincode C:\xampp\htdocs\invoice\application\views\viewPerforma.php 96
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: client_pincode C:\xampp\htdocs\invoice\application\views\viewPerforma.php 96
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: client_contact C:\xampp\htdocs\invoice\application\views\viewPerforma.php 97
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: client_gst C:\xampp\htdocs\invoice\application\views\viewPerforma.php 99
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: shipping_cost C:\xampp\htdocs\invoice\application\views\viewPerforma.php 160
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: shipping_cost C:\xampp\htdocs\invoice\application\views\viewPerforma.php 164
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: amount_paid C:\xampp\htdocs\invoice\application\views\viewPerforma.php 167
ERROR - 2020-03-21 09:27:39 --> Severity: Warning --> A non-numeric value encountered C:\xampp\htdocs\invoice\application\views\viewPerforma.php 180
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: amount_paid C:\xampp\htdocs\invoice\application\views\viewPerforma.php 180
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: state_name C:\xampp\htdocs\invoice\application\views\viewPerforma.php 187
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: state_name C:\xampp\htdocs\invoice\application\views\viewPerforma.php 187
ERROR - 2020-03-21 09:27:39 --> Severity: Notice --> Undefined variable: spl_msg C:\xampp\htdocs\invoice\application\views\viewPerforma.php 228
ERROR - 2020-03-21 09:27:39 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 09:32:06 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 09:32:08 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 09:32:59 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-03-21 09:33:18 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp\htdocs\invoice\application\libraries\dompdf\src\Cellmap.php 609
ERROR - 2020-03-21 09:33:18 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp\htdocs\invoice\application\libraries\dompdf\src\Cellmap.php 609
ERROR - 2020-03-21 09:33:18 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp\htdocs\invoice\application\libraries\dompdf\src\Cellmap.php 609
ERROR - 2020-03-21 09:38:03 --> Severity: Notice --> Undefined index: userAddress C:\xampp\htdocs\invoice\application\controllers\Performa.php 458
ERROR - 2020-03-21 09:38:06 --> Severity: error --> Exception: Call to a member function get_cellmap() on null C:\xampp\htdocs\invoice\application\libraries\dompdf\src\FrameReflower\TableCell.php 37
ERROR - 2020-03-21 09:38:28 --> Severity: error --> Exception: Call to a member function get_cellmap() on null C:\xampp\htdocs\invoice\application\libraries\dompdf\src\FrameReflower\TableCell.php 37
ERROR - 2020-03-21 09:41:41 --> Severity: error --> Exception: Call to a member function get_cellmap() on null C:\xampp\htdocs\invoice\application\libraries\dompdf\src\FrameReflower\TableCell.php 37
ERROR - 2020-03-21 09:43:55 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp\htdocs\invoice\application\libraries\dompdf\src\Cellmap.php 609
ERROR - 2020-03-21 09:43:55 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp\htdocs\invoice\application\libraries\dompdf\src\Cellmap.php 609
ERROR - 2020-03-21 09:43:55 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp\htdocs\invoice\application\libraries\dompdf\src\Cellmap.php 609
ERROR - 2020-03-21 09:46:16 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp\htdocs\invoice\application\libraries\dompdf\src\Cellmap.php 609
ERROR - 2020-03-21 09:46:16 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp\htdocs\invoice\application\libraries\dompdf\src\Cellmap.php 609
ERROR - 2020-03-21 09:46:16 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp\htdocs\invoice\application\libraries\dompdf\src\Cellmap.php 609
ERROR - 2020-03-21 10:45:57 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp\htdocs\invoice\application\libraries\dompdf\src\Cellmap.php 609
ERROR - 2020-03-21 10:45:57 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp\htdocs\invoice\application\libraries\dompdf\src\Cellmap.php 609
ERROR - 2020-03-21 10:45:57 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp\htdocs\invoice\application\libraries\dompdf\src\Cellmap.php 609
