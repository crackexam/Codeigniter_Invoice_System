<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Shipping_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function shippingListingCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_shipdetail');
        $query = $this->db->get();
        return $query->num_rows();
    }
	
	function deleterecords($id)
	{
	$this->db->query("delete from tbl_shipdetail where shipping_id = '".$id."'");
	return true;
	}
	
	function vendorListingCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $query = $this->db->get();
        return $query->num_rows();
    }
    function vendorListing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
	function courierListingCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_courier');
        $query = $this->db->get();
        return $query->num_rows();
    }
    function courierListing($searchText = '', $page, $segment)
    {
        $this->db->select('courier_id,courier_name,vendor_name');
        $this->db->from('tbl_courier');
		$this->db->join('tbl_vendor','tbl_courier.vendor_id = tbl_vendor.vendor_id');
		$this->db->order_by("courier_id","desc");
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    function shippingListing($searchText = '', $page, $segment)
    {
        $this->db->select('shipping_id,customer_name,customer_address,pickup_date,commit_date,vendor_name,tracking_no,courier_name,recieving_date,DATEDIFF(recieving_date,commit_date) as Date_dif');
        $this->db->from('tbl_shipdetail');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id = tbl_shipdetail.vendor');
		$this->db->join('tbl_courier','tbl_courier.courier_id = tbl_shipdetail.courier');
		$this->db->limit($page, $segment);
		
        $query = $this->db->get();
		//print_r($this->db->last_query());
        $result = $query->result();        
        return $result;
    }
    function getAllData($table){
		$this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
	}
	function getAllVendorCourier($vendor_id){
		$response = array();
		$this->db->select('courier_id,courier_name');
		$this->db->where('vendor_id', $vendor_id);
		$q = $this->db->get('tbl_courier');
		$response = $q->result_array();
		return $response;
	}
	function shipping_data_delayed($vendor_id){
		$this->db->select('*');
		$this->db->from('tbl_shipdetail');
		$this->db->where('DATEDIFF(recieving_date,commit_date)>0');
		$this->db->where('vendor', $vendor_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());//die;   
        $result = $query->result();        
        return $result;
 	}
	function shipping_data_success($vendor_id){
		//echo "Select * from tbl_shipdetail where DATEDIFF(recieving_date,commit_date) < 0  And vendor = '$vendor_id'";die;
		$this->db->select('*');
		$this->db->from('tbl_shipdetail');
		$this->db->where('DATEDIFF(recieving_date,commit_date)<0 OR DATEDIFF(recieving_date,commit_date)=0 OR commit_date = "0000-00-00" AND recieving_date != "0000-00-00"');
		$this->db->where('vendor', $vendor_id);
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
        $result = $query->result();        
        return $result;
 	}
	function shipping_data_pending($vendor_id){
		$this->db->select('*');
		$this->db->from('tbl_shipdetail');
		$this->db->where('recieving_date = ""');
		$this->db->where('vendor', $vendor_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());   //die;
        $result = $query->result();        
        return $result;
 	}
	function all_shipping_data($vendor_id){
		$this->db->select('*');
		$this->db->from('tbl_shipdetail');
		$this->db->where('vendor', $vendor_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());   //die;
        $result = $query->result();        
        return $result;
 	}
    function getUserRoles(){
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        return $query->result();
    }
    function addNew($tableInfo,$table){
        $this->db->trans_start();
        $this->db->insert($table, $tableInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function getInfo($Id,$col,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($col, $Id);
        $query = $this->db->get();
        return $query->result();
    }
    function updateDetails($table, $tblData,$col,$colValue){
        $this->db->where($col, $colValue);
        $this->db->update($table, $tblData);
        return TRUE;
    }
    function getCustomerDetails($Id){
		$this->db->select('invoice_number,client_name,client_address,pincode,state_name,client_gst,client_mobile');
		$this->db->from('tbl_invoice');
		$this->db->join('tbl_client','tbl_client.client_id = tbl_invoice.client_id');
        $this->db->where('invoice_id', $Id);
        $query = $this->db->get();
		return $query->row();
	}
    function deleteUser($userId, $userInfo)    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_client', $userInfo);
        return $this->db->affected_rows();
    }
    function matchOldPassword($userId, $oldPassword){
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);        
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');
        $user = $query->result();
		if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    function changePassword($userId, $userInfo){
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);
        return $this->db->affected_rows();
    }
    function loginHistoryCount($userId, $searchText, $fromDate, $toDate){
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->from('tbl_last_login as BaseTbl');
        $query = $this->db->get();
        return $query->num_rows();
    }
	function loginHistory($userId, $searchText, $fromDate, $toDate, $page, $segment)    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        $this->db->from('tbl_last_login as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    function getUserInfoById($userId){
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        return $query->row();
    }
}