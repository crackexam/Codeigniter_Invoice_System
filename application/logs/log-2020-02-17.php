<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-02-17 05:48:17 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 163
ERROR - 2020-02-17 05:48:17 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 163
ERROR - 2020-02-17 05:48:17 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 163
ERROR - 2020-02-17 05:48:17 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 202
ERROR - 2020-02-17 05:48:17 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 202
ERROR - 2020-02-17 05:48:17 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 202
ERROR - 2020-02-17 05:48:17 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 243
ERROR - 2020-02-17 05:48:17 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 243
ERROR - 2020-02-17 05:48:17 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\invoice\application\views\dashboard.php 243
ERROR - 2020-02-17 06:26:21 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'index' C:\xampp\htdocs\invoice\system\core\CodeIgniter.php 532
ERROR - 2020-02-17 06:51:21 --> Severity: Notice --> Undefined variable: createDate C:\xampp\htdocs\invoice\application\controllers\Performa.php 436
ERROR - 2020-02-17 06:51:25 --> Severity: Notice --> Undefined variable: createDate C:\xampp\htdocs\invoice\application\controllers\Performa.php 436
ERROR - 2020-02-17 06:51:53 --> Severity: Notice --> Undefined property: stdClass::$invoice_createDate C:\xampp\htdocs\invoice\application\controllers\Performa.php 412
ERROR - 2020-02-17 06:52:47 --> Query error: Unknown column 'inv.createDate' in 'field list' - Invalid query: SELECT `inv`.`invoice_id`, `inv`.`payment_mode`, `inv`.`spl_msg`, `inv`.`shipping_cost`, `inv`.`createDate`, `inv`.`invoice_subtotal`, `inv`.`invoice_number`, `inv`.`amount_due`, `inv`.`amount_paid`, `inv`.`doctype`, `com`.`company_id`, `com`.`company_name`, `com`.`company_email`, `com`.`company_address`, `com`.`company_gst`, `com`.`company_contact`, `cli`.`client_name`, `cli`.`client_company`, `cli`.`client_id`, `cli`.`client_address`, `cli`.`state_name`, `cli`.`client_gst`, `cli`.`client_mobile`, `cli`.`pincode`
FROM `tbl_invoice` as `inv`
JOIN `tbl_company` as `com` ON `inv`.`company_id` = `com`.`company_id`
JOIN `tbl_client` as `cli` ON `inv`.`client_id` = `cli`.`client_id`
WHERE `invoice_id` = '173'
