<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-09-17 06:36:00 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 156
ERROR - 2020-09-17 06:36:00 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 156
ERROR - 2020-09-17 06:36:00 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 156
ERROR - 2020-09-17 06:36:00 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 195
ERROR - 2020-09-17 06:36:00 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 195
ERROR - 2020-09-17 06:36:00 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 195
ERROR - 2020-09-17 06:36:00 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 236
ERROR - 2020-09-17 06:36:00 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 236
ERROR - 2020-09-17 06:36:00 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 236
ERROR - 2020-09-17 06:36:06 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-09-17 06:36:07 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-09-17 06:53:11 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-09-17 06:53:11 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-09-17 06:55:26 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-09-17 06:55:26 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-09-17 07:01:12 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-09-17 07:01:12 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-09-17 07:02:33 --> Query error: Unknown column 'cli.other_state_name' in 'field list' - Invalid query: SELECT `inv`.`invoice_id`, `inv`.`payment_mode`, `inv`.`spl_msg`, `inv`.`shipping_cost`, `inv`.`invoice_createDate`, `inv`.`invoice_subtotal`, `inv`.`invoice_number`, `inv`.`amount_due`, `inv`.`amount_paid`, `inv`.`doctype`, `inv`.`currency_type`, `com`.`company_id`, `com`.`company_name`, `com`.`company_email`, `com`.`company_address`, `com`.`company_gst`, `com`.`company_contact`, `cli`.`client_name`, `cli`.`client_company`, `cli`.`client_id`, `cli`.`client_address`, `cli`.`other_state_name`, `cli`.`state_name`, `cli`.`client_gst`, `cli`.`client_mobile`, `cli`.`pincode`, `add`.`m_client_address`, `add`.`m_client_state`, `add`.`m_client_pincode`
FROM `tbl_invoice` as `inv`
JOIN `tbl_company` as `com` ON `inv`.`company_id` = `com`.`company_id`
JOIN `tbl_client` as `cli` ON `inv`.`client_id` = `cli`.`client_id`
LEFT JOIN `tbl_client_address` as `add` ON `inv`.`address_id` = `add`.`id`
WHERE `invoice_id` = '182'
 LIMIT 1
ERROR - 2020-09-17 07:04:21 --> Query error: Unknown column 'cli.other_state_name' in 'field list' - Invalid query: SELECT `inv`.`invoice_id`, `inv`.`payment_mode`, `inv`.`spl_msg`, `inv`.`shipping_cost`, `inv`.`invoice_createDate`, `inv`.`invoice_subtotal`, `inv`.`invoice_number`, `inv`.`amount_due`, `inv`.`amount_paid`, `inv`.`doctype`, `inv`.`currency_type`, `com`.`company_id`, `com`.`company_name`, `com`.`company_email`, `com`.`company_address`, `com`.`company_gst`, `com`.`company_contact`, `cli`.`client_name`, `cli`.`client_company`, `cli`.`client_id`, `cli`.`client_address`, `cli`.`other_state_name`, `cli`.`state_name`, `cli`.`client_gst`, `cli`.`client_mobile`, `cli`.`pincode`, `add`.`m_client_address`, `add`.`m_client_state`, `add`.`m_client_pincode`
FROM `tbl_invoice` as `inv`
JOIN `tbl_company` as `com` ON `inv`.`company_id` = `com`.`company_id`
JOIN `tbl_client` as `cli` ON `inv`.`client_id` = `cli`.`client_id`
LEFT JOIN `tbl_client_address` as `add` ON `inv`.`address_id` = `add`.`id`
WHERE `invoice_id` = '182'
 LIMIT 1
ERROR - 2020-09-17 07:04:23 --> Query error: Unknown column 'cli.other_state_name' in 'field list' - Invalid query: SELECT `inv`.`invoice_id`, `inv`.`payment_mode`, `inv`.`spl_msg`, `inv`.`shipping_cost`, `inv`.`invoice_createDate`, `inv`.`invoice_subtotal`, `inv`.`invoice_number`, `inv`.`amount_due`, `inv`.`amount_paid`, `inv`.`doctype`, `inv`.`currency_type`, `com`.`company_id`, `com`.`company_name`, `com`.`company_email`, `com`.`company_address`, `com`.`company_gst`, `com`.`company_contact`, `cli`.`client_name`, `cli`.`client_company`, `cli`.`client_id`, `cli`.`client_address`, `cli`.`other_state_name`, `cli`.`state_name`, `cli`.`client_gst`, `cli`.`client_mobile`, `cli`.`pincode`, `add`.`m_client_address`, `add`.`m_client_state`, `add`.`m_client_pincode`
FROM `tbl_invoice` as `inv`
JOIN `tbl_company` as `com` ON `inv`.`company_id` = `com`.`company_id`
JOIN `tbl_client` as `cli` ON `inv`.`client_id` = `cli`.`client_id`
LEFT JOIN `tbl_client_address` as `add` ON `inv`.`address_id` = `add`.`id`
WHERE `invoice_id` = '182'
 LIMIT 1
ERROR - 2020-09-17 07:04:23 --> Query error: Unknown column 'cli.other_state_name' in 'field list' - Invalid query: SELECT `inv`.`invoice_id`, `inv`.`payment_mode`, `inv`.`spl_msg`, `inv`.`shipping_cost`, `inv`.`invoice_createDate`, `inv`.`invoice_subtotal`, `inv`.`invoice_number`, `inv`.`amount_due`, `inv`.`amount_paid`, `inv`.`doctype`, `inv`.`currency_type`, `com`.`company_id`, `com`.`company_name`, `com`.`company_email`, `com`.`company_address`, `com`.`company_gst`, `com`.`company_contact`, `cli`.`client_name`, `cli`.`client_company`, `cli`.`client_id`, `cli`.`client_address`, `cli`.`other_state_name`, `cli`.`state_name`, `cli`.`client_gst`, `cli`.`client_mobile`, `cli`.`pincode`, `add`.`m_client_address`, `add`.`m_client_state`, `add`.`m_client_pincode`
FROM `tbl_invoice` as `inv`
JOIN `tbl_company` as `com` ON `inv`.`company_id` = `com`.`company_id`
JOIN `tbl_client` as `cli` ON `inv`.`client_id` = `cli`.`client_id`
LEFT JOIN `tbl_client_address` as `add` ON `inv`.`address_id` = `add`.`id`
WHERE `invoice_id` = '182'
 LIMIT 1
ERROR - 2020-09-17 07:04:24 --> Query error: Unknown column 'cli.other_state_name' in 'field list' - Invalid query: SELECT `inv`.`invoice_id`, `inv`.`payment_mode`, `inv`.`spl_msg`, `inv`.`shipping_cost`, `inv`.`invoice_createDate`, `inv`.`invoice_subtotal`, `inv`.`invoice_number`, `inv`.`amount_due`, `inv`.`amount_paid`, `inv`.`doctype`, `inv`.`currency_type`, `com`.`company_id`, `com`.`company_name`, `com`.`company_email`, `com`.`company_address`, `com`.`company_gst`, `com`.`company_contact`, `cli`.`client_name`, `cli`.`client_company`, `cli`.`client_id`, `cli`.`client_address`, `cli`.`other_state_name`, `cli`.`state_name`, `cli`.`client_gst`, `cli`.`client_mobile`, `cli`.`pincode`, `add`.`m_client_address`, `add`.`m_client_state`, `add`.`m_client_pincode`
FROM `tbl_invoice` as `inv`
JOIN `tbl_company` as `com` ON `inv`.`company_id` = `com`.`company_id`
JOIN `tbl_client` as `cli` ON `inv`.`client_id` = `cli`.`client_id`
LEFT JOIN `tbl_client_address` as `add` ON `inv`.`address_id` = `add`.`id`
WHERE `invoice_id` = '182'
 LIMIT 1
ERROR - 2020-09-17 07:04:25 --> Query error: Unknown column 'cli.other_state_name' in 'field list' - Invalid query: SELECT `inv`.`invoice_id`, `inv`.`payment_mode`, `inv`.`spl_msg`, `inv`.`shipping_cost`, `inv`.`invoice_createDate`, `inv`.`invoice_subtotal`, `inv`.`invoice_number`, `inv`.`amount_due`, `inv`.`amount_paid`, `inv`.`doctype`, `inv`.`currency_type`, `com`.`company_id`, `com`.`company_name`, `com`.`company_email`, `com`.`company_address`, `com`.`company_gst`, `com`.`company_contact`, `cli`.`client_name`, `cli`.`client_company`, `cli`.`client_id`, `cli`.`client_address`, `cli`.`other_state_name`, `cli`.`state_name`, `cli`.`client_gst`, `cli`.`client_mobile`, `cli`.`pincode`, `add`.`m_client_address`, `add`.`m_client_state`, `add`.`m_client_pincode`
FROM `tbl_invoice` as `inv`
JOIN `tbl_company` as `com` ON `inv`.`company_id` = `com`.`company_id`
JOIN `tbl_client` as `cli` ON `inv`.`client_id` = `cli`.`client_id`
LEFT JOIN `tbl_client_address` as `add` ON `inv`.`address_id` = `add`.`id`
WHERE `invoice_id` = '182'
 LIMIT 1
ERROR - 2020-09-17 07:04:29 --> Query error: Unknown column 'cli.other_state_name' in 'field list' - Invalid query: SELECT `inv`.`invoice_id`, `inv`.`payment_mode`, `inv`.`spl_msg`, `inv`.`shipping_cost`, `inv`.`invoice_createDate`, `inv`.`invoice_subtotal`, `inv`.`invoice_number`, `inv`.`amount_due`, `inv`.`amount_paid`, `inv`.`doctype`, `inv`.`currency_type`, `com`.`company_id`, `com`.`company_name`, `com`.`company_email`, `com`.`company_address`, `com`.`company_gst`, `com`.`company_contact`, `cli`.`client_name`, `cli`.`client_company`, `cli`.`client_id`, `cli`.`client_address`, `cli`.`other_state_name`, `cli`.`state_name`, `cli`.`client_gst`, `cli`.`client_mobile`, `cli`.`pincode`, `add`.`m_client_address`, `add`.`m_client_state`, `add`.`m_client_pincode`
FROM `tbl_invoice` as `inv`
JOIN `tbl_company` as `com` ON `inv`.`company_id` = `com`.`company_id`
JOIN `tbl_client` as `cli` ON `inv`.`client_id` = `cli`.`client_id`
LEFT JOIN `tbl_client_address` as `add` ON `inv`.`address_id` = `add`.`id`
WHERE `invoice_id` = '182'
 LIMIT 1
ERROR - 2020-09-17 07:18:38 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-09-17 07:18:38 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-09-17 07:33:24 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-09-17 07:33:24 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-09-17 07:36:22 --> Severity: Notice --> Undefined property: stdClass::$country C:\xampp\htdocs\invoice\application\views\editOld.php 17
ERROR - 2020-09-17 07:44:30 --> Severity: Notice --> Undefined variable: client_other_state C:\xampp\htdocs\invoice\application\views\editOld.php 281
ERROR - 2020-09-17 07:44:33 --> Severity: Notice --> Undefined variable: client_other_state C:\xampp\htdocs\invoice\application\views\editOld.php 281
ERROR - 2020-09-17 07:45:18 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-09-17 07:45:18 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-09-17 07:51:25 --> Severity: Compile Error --> Cannot use empty array elements in arrays C:\xampp\htdocs\invoice\application\controllers\User.php 278
