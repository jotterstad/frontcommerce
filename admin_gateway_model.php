<?php
class Admin_gateway_model extends CI_Model {
	
	function get_site_gateway()
	{
		$this->db->select('*');
		$this->db->from('gateways');
		$this->db->join('sites','sites.site_id = gateways.site_id');
		$this->db->where('sites.site_active', 1);
		$this->db->where('sites.site_domain', $_SERVER['HTTP_HOST']);
		
		$query = $this->db->get();    
		return $query->result();
	}
	
	function add_new_gateway($gateway_data)
	{
		$data = array(
		   'gateway_name' => $gateway_data['gateway_name'],
		   'gateway_public_api' => $gateway_data['gateway_public_api'],
		   'site_id' =>  $this->member_session_data['site_id']
		);

		$this->db->insert('gateways', $data); 
	}
	
	function update_gateway($gateway_data)
	{
		$data = array(
			'gateway_name' => $gateway_data['gateway_name'],
		    'gateway_public_api' => $gateway_data['gateway_public_api'],
        );

		$this->db->where('site_id', $this->member_session_data['site_id']);
		$this->db->update('gateways', $data); 
	}
	
	
}
