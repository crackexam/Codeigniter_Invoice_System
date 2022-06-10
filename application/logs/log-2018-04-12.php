ERROR - 2018-04-12 08:28:43 --> Query error: Not unique table/alias: 'tbl_products' - Invalid query: SELECT `product_name`, `product_id`, `product_price`, `product_gst`
FROM `tbl_products`, `tbl_products`
WHERE `product_name` LIKE '%e%' ESCAPE '!'
 LIMIT 10
ERROR - 2018-04-12 08:31:09 --> Query error: Not unique table/alias: 'tbl_products' - Invalid query: SELECT `product_name`, `product_id`, `product_price`, `product_gst`
FROM `tbl_products`, `tbl_products`
WHERE `product_name` LIKE '%e%' ESCAPE '!'
 LIMIT 10
ERROR - 2018-04-12 08:31:28 --> Query error: Not unique table/alias: 'tbl_products' - Invalid query: SELECT `product_name`, `product_id`, `product_price`, `product_gst`
FROM `tbl_products`, `tbl_products`
WHERE `product_name` LIKE '%e%' ESCAPE '!'
 LIMIT 10
ERROR - 2018-04-12 08:33:53 --> Severity: Error --> Call to undefined method CI_DB_mysqli_driver::result() C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 150
ERROR - 2018-04-12 08:35:22 --> Severity: Error --> Call to undefined method CI_DB_mysqli_driver::result() C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 151
ERROR - 2018-04-12 08:37:46 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 187
ERROR - 2018-04-12 08:37:46 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 188
ERROR - 2018-04-12 08:37:46 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 189
ERROR - 2018-04-12 08:37:46 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 190
ERROR - 2018-04-12 08:37:46 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 191
ERROR - 2018-04-12 08:37:46 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 192
ERROR - 2018-04-12 08:37:46 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 193
ERROR - 2018-04-12 08:37:46 --> Query error: Column 'product_id' cannot be null - Invalid query: INSERT INTO `tbl_invoiceproduct` (`product_id`, `product_quantity`, `gst_tax_amount`, `discount_rate`, `discount_amount`, `pro_total_amount`, `net_amount`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2018-04-12 08:37:46 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\ciadmin\system\core\Exceptions.php:271) C:\xampp\htdocs\ciadmin\system\core\Common.php 570
ERROR - 2018-04-12 08:44:26 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 08:44:45 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 08:44:47 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 08:45:52 --> Severity: Error --> Call to undefined method Invoice_model::invoiceNumber() C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 114
ERROR - 2018-04-12 08:46:50 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 08:47:33 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 08:47:35 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 08:51:04 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 187
ERROR - 2018-04-12 08:51:04 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 188
ERROR - 2018-04-12 08:51:04 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 189
ERROR - 2018-04-12 08:51:04 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 190
ERROR - 2018-04-12 08:51:04 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 191
ERROR - 2018-04-12 08:51:04 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 192
ERROR - 2018-04-12 08:51:04 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 193
ERROR - 2018-04-12 08:51:04 --> Query error: Column 'product_id' cannot be null - Invalid query: INSERT INTO `tbl_invoiceproduct` (`product_id`, `product_quantity`, `gst_tax_amount`, `discount_rate`, `discount_amount`, `pro_total_amount`, `net_amount`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2018-04-12 08:51:04 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\ciadmin\system\core\Exceptions.php:271) C:\xampp\htdocs\ciadmin\system\core\Common.php 570
ERROR - 2018-04-12 08:52:12 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 08:57:05 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 08:58:50 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 09:00:02 --> Severity: Error --> Call to undefined function invoiceNumber() C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 115
ERROR - 2018-04-12 09:02:08 --> Severity: Error --> Call to undefined function invoiceNumber() C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 115
ERROR - 2018-04-12 09:02:34 --> Severity: Parsing Error --> syntax error, unexpected '->' (T_OBJECT_OPERATOR) C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 115
ERROR - 2018-04-12 09:02:45 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 09:10:08 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 09:28:27 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 09:43:09 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 09:48:02 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 142
ERROR - 2018-04-12 09:48:02 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 09:48:23 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 142
ERROR - 2018-04-12 09:48:23 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 09:48:31 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 142
ERROR - 2018-04-12 09:48:31 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 09:50:00 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 142
ERROR - 2018-04-12 09:50:00 --> Query error: Duplicate entry 'IN2018001' for key 'invoice_number' - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', 'IN2018001', '1', '1340.78', '0', '1340.78', '2018-04-12 09:50:00')
ERROR - 2018-04-12 10:35:15 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 142
ERROR - 2018-04-12 10:35:15 --> Query error: Duplicate entry 'IN2018001' for key 'invoice_number' - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', 'IN2018001', '1', '1340.78', '0', '1340.78', '2018-04-12 10:35:15')
ERROR - 2018-04-12 10:37:52 --> Severity: Notice --> Undefined variable: con C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 145
ERROR - 2018-04-12 10:37:52 --> Severity: Warning --> mysqli_query() expects parameter 1 to be mysqli, null given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 145
ERROR - 2018-04-12 10:37:52 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 146
ERROR - 2018-04-12 10:37:52 --> Query error: Column 'invoice_number' cannot be null - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', NULL, '1', '1340.78', '0', '1340.78', '2018-04-12 10:37:52')
ERROR - 2018-04-12 10:41:12 --> Query error: Not unique table/alias: 'tbl_invoice' - Invalid query: SELECT `invoice_number`
FROM `tbl_invoice`, `tbl_invoice`
ORDER BY `invoice_number` DESC
 LIMIT 1
ERROR - 2018-04-12 10:41:46 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 142
ERROR - 2018-04-12 10:41:46 --> Query error: Duplicate entry 'IN2018001' for key 'invoice_number' - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', 'IN2018001', '1', '1340.78', '0', '1340.78', '2018-04-12 10:41:46')
ERROR - 2018-04-12 10:44:01 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 144
ERROR - 2018-04-12 10:44:01 --> Query error: Duplicate entry 'IN2018001' for key 'invoice_number' - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', 'IN2018001', '1', '1340.78', '0', '1340.78', '2018-04-12 10:44:01')
ERROR - 2018-04-12 10:44:16 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 144
ERROR - 2018-04-12 10:44:16 --> Query error: Duplicate entry 'IN2018001' for key 'invoice_number' - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', 'IN2018001', '1', '1340.78', '0', '1340.78', '2018-04-12 10:44:16')
ERROR - 2018-04-12 10:44:44 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 144
ERROR - 2018-04-12 10:44:44 --> Query error: Duplicate entry 'IN2018001' for key 'invoice_number' - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', 'IN2018001', '1', '1340.78', '0', '1340.78', '2018-04-12 10:44:44')
ERROR - 2018-04-12 10:45:10 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 136
ERROR - 2018-04-12 10:45:10 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 142
ERROR - 2018-04-12 10:45:10 --> Query error: Duplicate entry 'IN2018001' for key 'invoice_number' - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', 'IN2018001', '1', '1340.78', '0', '1340.78', '2018-04-12 10:45:10')
ERROR - 2018-04-12 10:45:32 --> Severity: Error --> Class 'invoice_number' not found C:\xampp\htdocs\ciadmin\system\database\drivers\mysqli\mysqli_result.php 237
ERROR - 2018-04-12 10:46:00 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 136
ERROR - 2018-04-12 10:46:00 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 142
ERROR - 2018-04-12 10:46:00 --> Query error: Duplicate entry 'IN2018001' for key 'invoice_number' - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', 'IN2018001', '1', '1340.78', '0', '1340.78', '2018-04-12 10:46:00')
ERROR - 2018-04-12 10:46:16 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 142
ERROR - 2018-04-12 10:46:16 --> Query error: Duplicate entry 'IN2018001' for key 'invoice_number' - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', 'IN2018001', '1', '1340.78', '0', '1340.78', '2018-04-12 10:46:16')
ERROR - 2018-04-12 10:46:54 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 141
ERROR - 2018-04-12 10:47:24 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 142
ERROR - 2018-04-12 10:47:25 --> Query error: Duplicate entry 'IN2018001' for key 'invoice_number' - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', 'IN2018001', '1', '1340.78', '0', '1340.78', '2018-04-12 10:47:24')
ERROR - 2018-04-12 10:47:49 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 136
ERROR - 2018-04-12 10:47:49 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 142
ERROR - 2018-04-12 10:47:49 --> Query error: Duplicate entry 'IN2018001' for key 'invoice_number' - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', 'IN2018001', '1', '1340.78', '0', '1340.78', '2018-04-12 10:47:49')
ERROR - 2018-04-12 10:50:58 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 137
ERROR - 2018-04-12 10:50:58 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 143
ERROR - 2018-04-12 10:50:58 --> Query error: Duplicate entry 'IN2018001' for key 'invoice_number' - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', 'IN2018001', '1', '1340.78', '0', '1340.78', '2018-04-12 10:50:58')
ERROR - 2018-04-12 10:53:27 --> Severity: Notice --> Undefined index: tbl_invoice C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 160
ERROR - 2018-04-12 10:53:27 --> Query error: Duplicate entry 'IN2018001' for key 'invoice_number' - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', 'IN2018001', '1', '1340.78', '0', '1340.78', '2018-04-12 10:53:27')
ERROR - 2018-04-12 10:53:49 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 10:56:18 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 10:57:39 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 10:58:39 --> Severity: Warning --> substr() expects parameter 1 to be string, array given C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 143
ERROR - 2018-04-12 10:58:39 --> Query error: Duplicate entry 'IN2018001' for key 'invoice_number' - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', 'IN2018001', '1', '438.90', '0', '438.90', '2018-04-12 10:58:39')
ERROR - 2018-04-12 11:02:07 --> Severity: Notice --> Undefined variable: parentId C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 144
ERROR - 2018-04-12 11:02:07 --> Query error: Duplicate entry 'IN2018001' for key 'invoice_number' - Invalid query: INSERT INTO `tbl_invoice` (`company_id`, `invoice_number`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `invoice_createDate`) VALUES ('1', 'IN2018001', '1', '438.90', '0', '438.90', '2018-04-12 11:02:07')
ERROR - 2018-04-12 11:03:31 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 11:04:19 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 11:05:01 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 11:05:37 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 11:06:41 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 11:11:37 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 11:13:18 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 11:20:26 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 167
ERROR - 2018-04-12 11:20:26 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 168
ERROR - 2018-04-12 11:20:26 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 169
ERROR - 2018-04-12 11:20:26 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 170
ERROR - 2018-04-12 11:20:26 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 171
ERROR - 2018-04-12 11:20:26 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 172
ERROR - 2018-04-12 11:20:26 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 173
ERROR - 2018-04-12 11:20:26 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 175 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:20:26 --> Query error: Table 'invoice_admin.tbl_invoiceproduc' doesn't exist - Invalid query: INSERT INTO `tbl_invoiceproduc` (`invoice_id`, `product_id`, `product_quantity`, `gst_tax_amount`, `discount_rate`, `discount_amount`, `pro_total_amount`, `net_amount`) VALUES ('IN2018002', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2018-04-12 11:20:26 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\ciadmin\system\core\Exceptions.php:271) C:\xampp\htdocs\ciadmin\system\core\Common.php 570
ERROR - 2018-04-12 11:24:21 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 167
ERROR - 2018-04-12 11:24:21 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 168
ERROR - 2018-04-12 11:24:21 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 170
ERROR - 2018-04-12 11:24:21 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 175 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:24:21 --> Query error: Table 'invoice_admin.tbl_invoiceproduc' doesn't exist - Invalid query: INSERT INTO `tbl_invoiceproduc` (`invoice_id`, `product_id`, `product_quantity`, `gst_tax_amount`, `discount_rate`, `discount_amount`, `pro_total_amount`, `net_amount`) VALUES ('IN2018003', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2018-04-12 11:25:47 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 167
ERROR - 2018-04-12 11:25:47 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 168
ERROR - 2018-04-12 11:25:47 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 169
ERROR - 2018-04-12 11:25:47 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 170
ERROR - 2018-04-12 11:25:47 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 171
ERROR - 2018-04-12 11:25:47 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 172
ERROR - 2018-04-12 11:25:47 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 173
ERROR - 2018-04-12 11:25:47 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 175 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:25:47 --> Query error: Table 'invoice_admin.tbl_invoiceproduc' doesn't exist - Invalid query: INSERT INTO `tbl_invoiceproduc` (`invoice_id`, `product_id`, `product_quantity`, `gst_tax_amount`, `discount_rate`, `discount_amount`, `pro_total_amount`, `net_amount`) VALUES ('IN2018004', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2018-04-12 11:25:47 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\ciadmin\system\core\Exceptions.php:271) C:\xampp\htdocs\ciadmin\system\core\Common.php 570
ERROR - 2018-04-12 11:27:58 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 175 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:27:58 --> Query error: Table 'invoice_admin.tbl_invoiceproduc' doesn't exist - Invalid query: INSERT INTO `tbl_invoiceproduc` (`invoice_id`, `product_id`, `product_quantity`, `gst_tax_amount`, `discount_rate`, `discount_amount`, `pro_total_amount`, `net_amount`) VALUES ('IN2018001', '4', '1', '4.95', '0', '0.00', '99.00', '103.95')
ERROR - 2018-04-12 11:29:22 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 175 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:29:22 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 11:29:41 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 175 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:29:41 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-04-12 11:31:35 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 175 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:31:35 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 167
ERROR - 2018-04-12 11:31:35 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 168
ERROR - 2018-04-12 11:31:35 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 169
ERROR - 2018-04-12 11:31:35 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 170
ERROR - 2018-04-12 11:31:35 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 171
ERROR - 2018-04-12 11:31:35 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 172
ERROR - 2018-04-12 11:31:35 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 173
ERROR - 2018-04-12 11:31:35 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 175 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:31:35 --> Query error: Column 'product_id' cannot be null - Invalid query: INSERT INTO `tbl_invoiceproduct` (`invoice_id`, `product_id`, `product_quantity`, `gst_tax_amount`, `discount_rate`, `discount_amount`, `pro_total_amount`, `net_amount`) VALUES ('IN2018001', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2018-04-12 11:31:35 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\ciadmin\system\core\Exceptions.php:271) C:\xampp\htdocs\ciadmin\system\core\Common.php 570
ERROR - 2018-04-12 11:34:00 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 174 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:34:00 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 174 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:34:00 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 166
ERROR - 2018-04-12 11:34:00 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 167
ERROR - 2018-04-12 11:34:00 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 168
ERROR - 2018-04-12 11:34:00 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 169
ERROR - 2018-04-12 11:34:00 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 170
ERROR - 2018-04-12 11:34:00 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 171
ERROR - 2018-04-12 11:34:00 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 172
ERROR - 2018-04-12 11:34:00 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 174 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:34:00 --> Query error: Column 'product_id' cannot be null - Invalid query: INSERT INTO `tbl_invoiceproduct` (`invoice_id`, `product_id`, `product_quantity`, `gst_tax_amount`, `discount_rate`, `discount_amount`, `pro_total_amount`, `net_amount`) VALUES ('IN2018001', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2018-04-12 11:34:00 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\ciadmin\system\core\Exceptions.php:271) C:\xampp\htdocs\ciadmin\system\core\Common.php 570
ERROR - 2018-04-12 11:37:24 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 174 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:37:24 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 166
ERROR - 2018-04-12 11:37:24 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 167
ERROR - 2018-04-12 11:37:24 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 168
ERROR - 2018-04-12 11:37:24 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 169
ERROR - 2018-04-12 11:37:24 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 170
ERROR - 2018-04-12 11:37:24 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 171
ERROR - 2018-04-12 11:37:24 --> Severity: Notice --> Undefined offset: 1 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 172
ERROR - 2018-04-12 11:37:24 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 174 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:37:24 --> Query error: Column 'product_id' cannot be null - Invalid query: INSERT INTO `tbl_invoiceproduct` (`invoice_id`, `product_id`, `product_quantity`, `gst_tax_amount`, `discount_rate`, `discount_amount`, `pro_total_amount`, `net_amount`) VALUES ('IN2018002', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2018-04-12 11:37:24 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\ciadmin\system\core\Exceptions.php:271) C:\xampp\htdocs\ciadmin\system\core\Common.php 570
ERROR - 2018-04-12 11:39:49 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 175 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:39:49 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 175 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:39:49 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 167
ERROR - 2018-04-12 11:39:49 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 168
ERROR - 2018-04-12 11:39:49 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 169
ERROR - 2018-04-12 11:39:49 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 170
ERROR - 2018-04-12 11:39:49 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 171
ERROR - 2018-04-12 11:39:49 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 172
ERROR - 2018-04-12 11:39:49 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 173
ERROR - 2018-04-12 11:39:49 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 175 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:39:49 --> Query error: Column 'product_id' cannot be null - Invalid query: INSERT INTO `tbl_invoiceproduct` (`invoice_id`, `product_id`, `product_quantity`, `gst_tax_amount`, `discount_rate`, `discount_amount`, `pro_total_amount`, `net_amount`) VALUES ('IN2018003', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2018-04-12 11:39:49 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\ciadmin\system\core\Exceptions.php:271) C:\xampp\htdocs\ciadmin\system\core\Common.php 570
ERROR - 2018-04-12 11:41:19 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 174
ERROR - 2018-04-12 11:41:19 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 175 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:41:19 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 174
ERROR - 2018-04-12 11:41:19 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 175 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:41:19 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 167
ERROR - 2018-04-12 11:41:19 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 168
ERROR - 2018-04-12 11:41:19 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 169
ERROR - 2018-04-12 11:41:19 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 170
ERROR - 2018-04-12 11:41:19 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 171
ERROR - 2018-04-12 11:41:19 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 172
ERROR - 2018-04-12 11:41:19 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 173
ERROR - 2018-04-12 11:41:19 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 174
ERROR - 2018-04-12 11:41:19 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 175 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:41:19 --> Query error: Column 'product_id' cannot be null - Invalid query: INSERT INTO `tbl_invoiceproduct` (`invoice_id`, `product_id`, `product_quantity`, `gst_tax_amount`, `discount_rate`, `discount_amount`, `pro_total_amount`, `net_amount`) VALUES ('IN2018001', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2018-04-12 11:41:19 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\ciadmin\system\core\Exceptions.php:271) C:\xampp\htdocs\ciadmin\system\core\Common.php 570
ERROR - 2018-04-12 11:43:35 --> Severity: Parsing Error --> syntax error, unexpected 'echo' (T_ECHO) C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 166
ERROR - 2018-04-12 11:44:57 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 176 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:44:57 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 176 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:47:54 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 176 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:47:54 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 176 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:47:54 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 176 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:47:55 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 176 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:47:55 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 176 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:47:55 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\ciadmin\system\core\Exceptions.php:271) C:\xampp\htdocs\ciadmin\system\helpers\url_helper.php 564
ERROR - 2018-04-12 11:49:43 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 176 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 148
ERROR - 2018-04-12 11:58:50 --> Severity: Error --> Call to undefined function set_value() C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 64
ERROR - 2018-04-12 12:00:28 --> Severity: Error --> Call to undefined function set_value() C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 64
ERROR - 2018-04-12 12:10:15 --> Severity: Notice --> Undefined property: stdClass::$invoice_number C:\xampp\htdocs\ciadmin\application\views\invoice.php 54
ERROR - 2018-04-12 12:10:15 --> Severity: Notice --> Undefined property: stdClass::$invoice_number C:\xampp\htdocs\ciadmin\application\views\invoice.php 54
ERROR - 2018-04-12 12:33:06 --> Severity: Notice --> Undefined property: stdClass::$product_name C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 225
ERROR - 2018-04-12 12:33:06 --> Severity: Notice --> Undefined property: stdClass::$product_name C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 225
ERROR - 2018-04-12 12:33:06 --> Severity: Notice --> Undefined property: stdClass::$product_price C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 225
ERROR - 2018-04-12 12:33:06 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 225
ERROR - 2018-04-12 12:33:06 --> Severity: Notice --> Undefined property: stdClass::$product_id C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 225
ERROR - 2018-04-12 12:33:21 --> Severity: Notice --> Undefined property: stdClass::$product_name C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 225
ERROR - 2018-04-12 12:33:21 --> Severity: Notice --> Undefined property: stdClass::$product_name C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 225
ERROR - 2018-04-12 12:33:21 --> Severity: Notice --> Undefined property: stdClass::$product_price C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 225
ERROR - 2018-04-12 12:33:21 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 225
ERROR - 2018-04-12 12:33:21 --> Severity: Notice --> Undefined property: stdClass::$product_id C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 225
ERROR - 2018-04-12 12:33:28 --> Severity: Notice --> Undefined property: stdClass::$product_name C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 225
ERROR - 2018-04-12 12:33:28 --> Severity: Notice --> Undefined property: stdClass::$product_name C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 225
ERROR - 2018-04-12 12:33:28 --> Severity: Notice --> Undefined property: stdClass::$product_price C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 225
ERROR - 2018-04-12 12:33:28 --> Severity: Notice --> Undefined property: stdClass::$product_gst C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 225
ERROR - 2018-04-12 12:33:28 --> Severity: Notice --> Undefined property: stdClass::$product_id C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php 225
ERROR - 2018-04-12 12:42:27 --> Severity: Error --> Call to undefined function set_value() C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 86
ERROR - 2018-04-12 12:57:27 --> Severity: error --> Exception: Unable to locate the model you have specified: Welcome_model C:\xampp\htdocs\ciadmin\system\core\Loader.php 344
ERROR - 2018-04-12 12:57:32 --> Severity: error --> Exception: Unable to locate the model you have specified: Welcome_model C:\xampp\htdocs\ciadmin\system\core\Loader.php 344
ERROR - 2018-04-12 12:57:33 --> Severity: error --> Exception: Unable to locate the model you have specified: Welcome_model C:\xampp\htdocs\ciadmin\system\core\Loader.php 344
ERROR - 2018-04-12 12:57:33 --> Severity: error --> Exception: Unable to locate the model you have specified: Welcome_model C:\xampp\htdocs\ciadmin\system\core\Loader.php 344
ERROR - 2018-04-12 12:57:34 --> Severity: error --> Exception: Unable to locate the model you have specified: Welcome_model C:\xampp\htdocs\ciadmin\system\core\Loader.php 344
ERROR - 2018-04-12 12:57:34 --> Severity: error --> Exception: Unable to locate the model you have specified: Welcome_model C:\xampp\htdocs\ciadmin\system\core\Loader.php 344
ERROR - 2018-04-12 13:25:36 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 176 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 147
ERROR - 2018-04-12 13:29:36 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 176 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 147
ERROR - 2018-04-12 13:45:08 --> Severity: Warning --> Missing argument 2 for Invoice_model::saveProductDetail(), called in C:\xampp\htdocs\ciadmin\application\controllers\Invoice.php on line 176 and defined C:\xampp\htdocs\ciadmin\application\models\Invoice_model.php 147
ERROR - 2018-04-12 13:59:05 --> Query error: Column 'company_id' in field list is ambiguous - Invalid query: SELECT `invoice_id`, `invoice_subtotal`, `company_id`, `client_id`, `amount_due`, `company_name`, `client_name`, `client_company`
FROM `tbl_invoice`
JOIN `tbl_company` ON `tbl_invoice`.`company_id` = `tbl_company`.`company_id`
JOIN `tbl_client` ON `tbl_invoice`.`client_id` = `tbl_client`.`client_id`
WHERE `invoice_id` = '1'
ERROR - 2018-04-12 14:03:02 --> Severity: Notice --> Undefined property: stdClass::$company_id C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 20
ERROR - 2018-04-12 14:03:02 --> Severity: Notice --> Undefined property: stdClass::$client_id C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 21
ERROR - 2018-04-12 14:03:02 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 223
ERROR - 2018-04-12 14:03:30 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 222
ERROR - 2018-04-12 14:04:22 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 222
ERROR - 2018-04-12 14:05:12 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 222
ERROR - 2018-04-12 14:05:23 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 222
ERROR - 2018-04-12 14:06:43 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 222
ERROR - 2018-04-12 14:09:17 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 222
ERROR - 2018-04-12 14:12:46 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 209
ERROR - 2018-04-12 14:23:18 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 197
ERROR - 2018-04-12 14:24:37 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 198
ERROR - 2018-04-12 14:24:47 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 198
ERROR - 2018-04-12 14:25:02 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 198
ERROR - 2018-04-12 14:50:27 --> Query error: Unknown column 'inpro.productid' in 'field list' - Invalid query: SELECT `inpro`.`product_quantity`, `inpro`.`productid`, `inpro`.`gst_tax_amount`, `inpro`.`discount_rate`, `inpro`.`discount_amount`, `inpro`.`pro_total_amount`, `inpro`.`net_amount`, `pro`.`product_name`, `pro`.`product_gst`, `pro`.`product_price`
FROM `tbl_invoiceproduct` as `inpro`
JOIN `tbl_products` as `pro` ON `inpro`.`product_id` = `pro`.`product_id`
WHERE `invoice_number` IS NULL
ERROR - 2018-04-12 14:50:42 --> Query error: Unknown column 'invoice_number' in 'where clause' - Invalid query: SELECT `inpro`.`product_quantity`, `inpro`.`product_id`, `inpro`.`gst_tax_amount`, `inpro`.`discount_rate`, `inpro`.`discount_amount`, `inpro`.`pro_total_amount`, `inpro`.`net_amount`, `pro`.`product_name`, `pro`.`product_gst`, `pro`.`product_price`
FROM `tbl_invoiceproduct` as `inpro`
JOIN `tbl_products` as `pro` ON `inpro`.`product_id` = `pro`.`product_id`
WHERE `invoice_number` IS NULL
ERROR - 2018-04-12 14:50:57 --> Query error: Unknown column 'inpro.invoice_number' in 'where clause' - Invalid query: SELECT `inpro`.`product_quantity`, `inpro`.`product_id`, `inpro`.`gst_tax_amount`, `inpro`.`discount_rate`, `inpro`.`discount_amount`, `inpro`.`pro_total_amount`, `inpro`.`net_amount`, `pro`.`product_name`, `pro`.`product_gst`, `pro`.`product_price`
FROM `tbl_invoiceproduct` as `inpro`
JOIN `tbl_products` as `pro` ON `inpro`.`product_id` = `pro`.`product_id`
WHERE `inpro`.`invoice_number` IS NULL
ERROR - 2018-04-12 14:51:12 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 198
ERROR - 2018-04-12 14:52:12 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 198
ERROR - 2018-04-12 14:52:15 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 198
ERROR - 2018-04-12 14:52:27 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 198
ERROR - 2018-04-12 14:53:50 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 178
ERROR - 2018-04-12 14:54:26 --> Severity: Notice --> Undefined variable: cli C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 178
ERROR - 2018-04-12 15:03:50 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 130
ERROR - 2018-04-12 15:04:25 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 131
ERROR - 2018-04-12 15:04:31 --> Severity: Notice --> Undefined variable: record C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 111
ERROR - 2018-04-12 15:04:31 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 111
ERROR - 2018-04-12 15:06:27 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 130
ERROR - 2018-04-12 15:06:36 --> Severity: Notice --> Undefined variable: record C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 111
ERROR - 2018-04-12 15:06:36 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 111
ERROR - 2018-04-12 15:06:36 --> Severity: Notice --> Use of undefined constant product_name - assumed 'product_name' C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 111
ERROR - 2018-04-12 15:07:30 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 130
ERROR - 2018-04-12 15:13:32 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 119
ERROR - 2018-04-12 15:13:34 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 119
ERROR - 2018-04-12 15:20:39 --> Query error: Unknown column 'inpro.invoice_i' in 'where clause' - Invalid query: SELECT `inpro`.`product_quantity`, `inpro`.`product_id`, `inpro`.`gst_tax_amount`, `inpro`.`discount_rate`, `inpro`.`discount_amount`, `inpro`.`pro_total_amount`, `inpro`.`net_amount`, `pro`.`product_name`, `pro`.`product_gst`, `pro`.`product_price`
FROM `tbl_invoiceproduct` as `inpro`
JOIN `tbl_products` as `pro` ON `inpro`.`product_id` = `pro`.`product_id`
WHERE `inpro`.`invoice_i` IS NULL
ERROR - 2018-04-12 15:22:51 --> Query error: Unknown column 'inpro.invoice_i' in 'where clause' - Invalid query: SELECT `inpro`.`product_quantity`, `inpro`.`product_id`, `inpro`.`gst_tax_amount`, `inpro`.`discount_rate`, `inpro`.`discount_amount`, `inpro`.`pro_total_amount`, `inpro`.`net_amount`, `pro`.`product_name`, `pro`.`product_gst`, `pro`.`product_price`
FROM `tbl_invoiceproduct` as `inpro`
JOIN `tbl_products` as `pro` ON `inpro`.`product_id` = `pro`.`product_id`
WHERE `inpro`.`invoice_i` IS NULL
ERROR - 2018-04-12 15:24:04 --> Query error: Unknown column 'inpro.invoice_i' in 'where clause' - Invalid query: SELECT `inpro`.`product_quantity`, `inpro`.`product_id`, `inpro`.`gst_tax_amount`, `inpro`.`discount_rate`, `inpro`.`discount_amount`, `inpro`.`pro_total_amount`, `inpro`.`net_amount`, `pro`.`product_name`, `pro`.`product_gst`, `pro`.`product_price`
FROM `tbl_invoiceproduct` as `inpro`
JOIN `tbl_products` as `pro` ON `inpro`.`product_id` = `pro`.`product_id`
WHERE `inpro`.`invoice_i` IS NULL
ERROR - 2018-04-12 15:25:05 --> Query error: Unknown column 'inpro.invoice_i' in 'where clause' - Invalid query: SELECT `inpro`.`product_quantity`, `inpro`.`product_id`, `inpro`.`gst_tax_amount`, `inpro`.`discount_rate`, `inpro`.`discount_amount`, `inpro`.`pro_total_amount`, `inpro`.`net_amount`, `pro`.`product_name`, `pro`.`product_gst`, `pro`.`product_price`
FROM `tbl_invoiceproduct` as `inpro`
JOIN `tbl_products` as `pro` ON `inpro`.`product_id` = `pro`.`product_id`
WHERE `inpro`.`invoice_i` IS NULL
ERROR - 2018-04-12 15:25:06 --> Query error: Unknown column 'inpro.invoice_i' in 'where clause' - Invalid query: SELECT `inpro`.`product_quantity`, `inpro`.`product_id`, `inpro`.`gst_tax_amount`, `inpro`.`discount_rate`, `inpro`.`discount_amount`, `inpro`.`pro_total_amount`, `inpro`.`net_amount`, `pro`.`product_name`, `pro`.`product_gst`, `pro`.`product_price`
FROM `tbl_invoiceproduct` as `inpro`
JOIN `tbl_products` as `pro` ON `inpro`.`product_id` = `pro`.`product_id`
WHERE `inpro`.`invoice_i` IS NULL
ERROR - 2018-04-12 15:27:01 --> Query error: Unknown column 'inpro.invoice_i' in 'where clause' - Invalid query: SELECT `inpro`.`product_quantity`, `inpro`.`product_id`, `inpro`.`gst_tax_amount`, `inpro`.`discount_rate`, `inpro`.`discount_amount`, `inpro`.`pro_total_amount`, `inpro`.`net_amount`, `pro`.`product_name`, `pro`.`product_gst`, `pro`.`product_price`
FROM `tbl_invoiceproduct` as `inpro`
JOIN `tbl_products` as `pro` ON `inpro`.`product_id` = `pro`.`product_id`
WHERE `inpro`.`invoice_i` IS NULL
ERROR - 2018-04-12 15:27:02 --> Query error: Unknown column 'inpro.invoice_i' in 'where clause' - Invalid query: SELECT `inpro`.`product_quantity`, `inpro`.`product_id`, `inpro`.`gst_tax_amount`, `inpro`.`discount_rate`, `inpro`.`discount_amount`, `inpro`.`pro_total_amount`, `inpro`.`net_amount`, `pro`.`product_name`, `pro`.`product_gst`, `pro`.`product_price`
FROM `tbl_invoiceproduct` as `inpro`
JOIN `tbl_products` as `pro` ON `inpro`.`product_id` = `pro`.`product_id`
WHERE `inpro`.`invoice_i` IS NULL
ERROR - 2018-04-12 15:27:04 --> Query error: Unknown column 'inpro.invoice_i' in 'where clause' - Invalid query: SELECT `inpro`.`product_quantity`, `inpro`.`product_id`, `inpro`.`gst_tax_amount`, `inpro`.`discount_rate`, `inpro`.`discount_amount`, `inpro`.`pro_total_amount`, `inpro`.`net_amount`, `pro`.`product_name`, `pro`.`product_gst`, `pro`.`product_price`
FROM `tbl_invoiceproduct` as `inpro`
JOIN `tbl_products` as `pro` ON `inpro`.`product_id` = `pro`.`product_id`
WHERE `inpro`.`invoice_i` IS NULL
ERROR - 2018-04-12 15:35:20 --> Severity: Notice --> Undefined variable: IN C:\xampp\htdocs\ciadmin\application\config\routes.php 104
ERROR - 2018-04-12 15:35:20 --> Severity: Notice --> Undefined variable: IN C:\xampp\htdocs\ciadmin\application\config\routes.php 104
ERROR - 2018-04-12 15:49:22 --> Severity: Notice --> Undefined variable: record C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 109
ERROR - 2018-04-12 15:49:22 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 109
ERROR - 2018-04-12 15:49:22 --> Severity: Notice --> Undefined variable: record C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 109
ERROR - 2018-04-12 15:49:22 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 109
ERROR - 2018-04-12 15:49:22 --> Severity: Notice --> Undefined variable: record C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 109
ERROR - 2018-04-12 15:49:22 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 109
ERROR - 2018-04-12 15:49:23 --> Severity: Notice --> Undefined variable: record C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 109
ERROR - 2018-04-12 15:49:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 109
ERROR - 2018-04-12 15:49:23 --> Severity: Notice --> Undefined variable: record C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 109
ERROR - 2018-04-12 15:49:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 109
ERROR - 2018-04-12 15:50:08 --> Severity: Notice --> Undefined variable: product_name C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 109
ERROR - 2018-04-12 15:50:08 --> Severity: Notice --> Undefined variable: product_name C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 109
ERROR - 2018-04-12 15:50:08 --> Severity: Notice --> Undefined variable: product_name C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 109
ERROR - 2018-04-12 15:50:08 --> Severity: Notice --> Undefined variable: product_name C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 109
ERROR - 2018-04-12 15:50:08 --> Severity: Notice --> Undefined variable: product_name C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 109
ERROR - 2018-04-12 15:53:08 --> Severity: Notice --> Undefined variable: i C:\xampp\htdocs\ciadmin\application\views\editInvoice.php 107
