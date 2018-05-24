<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {
	
	public function __construct()
    {
    	parent::__construct();
		
		//Checks member login for true
		$this->member_session_data = $this->session->all_userdata();
		if($this->member_session_data['logged_in'] != TRUE)
			redirect('admin/login');
		
		//Loads Models
		$this->load->model('/admin/Admin_order_model');
    }
	
	public function index()
	{
		$data['get_all_orders'] = $this->Admin_order_model->get_all_orders();
		
		$this->load->view('admin/shared/header');
		$this->load->view('admin/orders/order_view', $data);
		$this->load->view('admin/shared/footer');
	}
	
	public function detail($order_number)
	{
		$data['get_order_detail'] = $this->Admin_order_model->get_order_detail($order_number);
		
		$internal_details = json_decode($data['get_order_detail'][0]->order_details);
		
		$data['cart_items_total'] = $internal_details->total_items;
		$data['cart_total'] = $internal_details->cart_total;
				
		$this->load->view('admin/shared/header');
		$this->load->view('admin/orders/order_detail_view', $data);
		$this->load->view('admin/shared/footer');
	}
	
}
