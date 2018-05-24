<?php

class Admin_order_model extends CI_Model {
	
	function get_all_orders()
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('sites', 'orders.site_id = sites.site_id');
		$this->db->where('sites.site_active', 1);
		$this->db->where('sites.site_domain', $_SERVER['HTTP_HOST']);
		$this->db->order_by('order_date', 'desc');
		
		$query = $this->db->get();    
		return $query->result();
	}
	
	function get_order_detail($order_number)
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('sites', 'orders.site_id = sites.site_id');
		$this->db->where('order_number', $order_number);
		$this->db->where('sites.site_active', 1);
		$this->db->where('sites.site_domain', $_SERVER['HTTP_HOST']);
		
		$query = $this->db->get();    
		return $query->result();
	}
	
}