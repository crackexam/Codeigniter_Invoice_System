<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	function client_count() {	
	  $this->db->from('tbl_client');
	  return $num_rows = $this->db->count_all_results();
	}
	
	function last_inserted_client(){
		$this->db->from('tbl_client');
		$this->db->order_by('client_id','desc');
		$this->db->limit('3');
		$query = $this->db->get();
		return $result = $query->result();
	}
	
	function product_count(){
		$this->db->from('tbl_all_products');
		return $num_rows = $this->db->count_all_results();
	}
	
	function vendor_shipping_data_all(){
		/*$sql = "select a.vendor_name,a.vendor_id,t2.counts as delay, t3.counts1 as sucess, t4.counts2 as pending, t5.Alldata as All_count from tbl_vendor a 
				left join (select count(*) as counts, vendor from tbl_shipdetail where DATEDIFF(recieving_date,commit_date) > 0 GROUP by vendor) t2 on a.vendor_id = t2.vendor 
				left join (select count(*) as counts1, vendor from tbl_shipdetail where DATEDIFF(recieving_date,commit_date) < 0 GROUP by vendor) t3 on a.vendor_id = t3.vendor 
				left join (select count(*) as counts2, vendor from tbl_shipdetail where recieving_date = '' GROUP by vendor) t4 on a.vendor_id = t4.vendor 
				left join (select count(*) as Alldata, vendor from tbl_shipdetail GROUP by vendor) t5 on a.vendor_id = t5.vendor";*/
		$sql = "select a.vendor_name,a.vendor_id,t2.counts as delay, t3.counts1 as sucess, t4.counts2 as pending, t5.Alldata as All_count from tbl_vendor a left join (select count(*) as counts, vendor from tbl_shipdetail where DATEDIFF(recieving_date,commit_date) > 0 GROUP by vendor) t2 on a.vendor_id = t2.vendor left join (select count(*) as counts1, vendor from tbl_shipdetail where DATEDIFF(recieving_date,commit_date) < 0 OR DATEDIFF(recieving_date,commit_date) = 0 OR commit_date = '0000-00-00' AND recieving_date <> '0000-00-00' GROUP by vendor) t3 on a.vendor_id = t3.vendor left join (select count(*) as counts2, vendor from tbl_shipdetail where recieving_date = '' GROUP by vendor) t4 on a.vendor_id = t4.vendor left join (select count(*) as Alldata, vendor from tbl_shipdetail GROUP by vendor) t5 on a.vendor_id = t5.vendor";
		$qr = $this->db->query($sql);
		return $qr->result();
	}
	function last_inserted_product(){
		$this->db->from('tbl_all_products');
		$this->db->order_by('product_id','Desc');
		$this->db->limit('3');
		$query = $this->db->get();
        $result = $query->result();        
        return $result;
	}
	
	function shipping_data_delayed(){
		$this->db->select('count(*) as delayed_data');
		$this->db->from('tbl_shipdetail');
		$this->db->where('DATEDIFF(recieving_date,commit_date) > 0');
		$query = $this->db->get();
		//print_r($this->db->last_query());  
        $result = $query->row();        
        return $result;
 	}
	function shipping_data_success(){
		$this->db->select('count(*) as success');
		$this->db->from('tbl_shipdetail');
		$this->db->where('DATEDIFF(recieving_date,commit_date)<0 OR DATEDIFF(recieving_date,commit_date)=0 OR commit_date = "0000-00-00" AND recieving_date != "0000-00-00"');
		$query = $this->db->get();
		//print_r($this->db->last_query());
        $result = $query->row();        
        return $result;
 	}
	function shipping_data_pending(){
		$this->db->select('count(*) as pending');
		$this->db->from('tbl_shipdetail');
		$this->db->where('DATEDIFF(recieving_date,commit_date)= "" And recieving_date = "0000-00-00"');
		$query = $this->db->get();
        $result = $query->row();        
        return $result;
 	}
	function shipping_data_all(){
		$this->db->select('count(*) as all_data');
		$this->db->from('tbl_shipdetail');
		$query = $this->db->get();
        $result = $query->row();        
        return $result;
 	}

	
	function pi_count(){
		$this->db->from('tbl_invoice');
		$this->db->like('invoice_number', 'PI');
		return $num_rows = $this->db->count_all_results();
	}
	
	function last_inserted_PI_invoice(){
		$this->db->select('invoice_id,invoice_number,invoice_subtotal,amount_due,company_name,client_name,client_company,invoice_createDate');
        $this->db->from('tbl_invoice ');
        $this->db->join('tbl_company ', 'tbl_invoice.company_id = tbl_company.company_id');
		$this->db->join('tbl_client ', 'tbl_invoice.client_id = tbl_client.client_id');
		$this->db->like('invoice_number', 'PI');
		$this->db->order_by("invoice_number", "desc");
        $this->db->limit('3');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
	}
	
	function in_count(){
		$this->db->from('tbl_invoice');
		$this->db->like('invoice_number', 'IN');
		return $num_rows = $this->db->count_all_results();
	}
	
	function last_inserted_In_invoice(){
		$this->db->select('invoice_id,invoice_number,invoice_subtotal,amount_due,company_name,client_name,client_company,invoice_createDate');
        $this->db->from('tbl_invoice ');
        $this->db->join('tbl_company ', 'tbl_invoice.company_id = tbl_company.company_id');
		$this->db->join('tbl_client ', 'tbl_invoice.client_id = tbl_client.client_id');
		$this->db->like('invoice_number', 'IN');
		$this->db->order_by("invoice_number", "desc");
        $this->db->limit('3');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
	}
	
}

?>