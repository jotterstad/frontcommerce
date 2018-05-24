<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {
	
	public function __construct()
    {
    	parent::__construct();
		
		//Checks member login for true
		$this->member_session_data = $this->session->all_userdata();
		if($this->member_session_data['logged_in'] != TRUE)
			redirect('admin/login');
		
		//Loads Models
		$this->load->model('/admin/Admin_gateway_model');
    }
	
	public function index()
	{
		if($this->input->post() == TRUE){
			
			//Receives POST Data	
			$gateway_data = $this->input->post();
			
			//Private Method Conditional
			if($gateway_data['crud_status'] == 'update'){
				$this->update($gateway_data);
			}
			
			else {
				$this->create($gateway_data);
			}
		}
		
		else {
					
			$data['get_site_gateway'] = $this->Admin_gateway_model->get_site_gateway();
			
			$this->load->view('admin/shared/header');
			$this->load->view('admin/payment/payment_view', $data);
			$this->load->view('admin/shared/footer');
		}
	}
	
	private function create($gateway_data)
	{
		$data['add_new_gateway'] = $this->Admin_gateway_model->add_new_gateway($gateway_data);
		redirect('admin/payment');
	}
	
	private function update($gateway_data)
	{
		$data['update_gateway'] = $this->Admin_gateway_model->update_gateway($gateway_data);
		redirect('admin/payment');
	}
	
}
