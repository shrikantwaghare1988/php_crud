<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_crud extends CI_Controller {

	function __construct() {
        parent::__construct();

        $this->load->database();
		$this->load->model('Employee_crud_model', 'em');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
      
        header('Access-Control-Allow-Origin: *'); //--for cors error-----
    }
	public function index()
	{
		$data['employees'] = $this->em->get_all();
		$data['title'] = "CodeIgniter Employee CRUD Operation";
		$this->load->view('employee_crud/layout/header');       
		$this->load->view('employee_crud/index',$data);
		$this->load->view('employee_crud/layout/footer');
	}	

	public function create()
	{
		$data['title'] = "Create Employee";
		$this->load->view('employee_crud/layout/header');       
	    $this->load->view('employee_crud/create',$data);
		$this->load->view('employee_crud/layout/footer');     
	}

	public function store()
	{
		$data = $_POST;
		//pre($data);die;

		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[emp_crud.email]',['is_unique'=>"Email ID Already Exist."]);		
		$this->form_validation->set_rules('mobile_no', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('city', 'City', 'required');
		//$this->form_validation->set_rules('description', 'Description', 'required');
	
		if (!$this->form_validation->run())
		{
			$this->session->set_flashdata('errors', validation_errors());			
			redirect(base_url('employee_crud/create'));
		}
		else
		{
			$this->em->store($data);
			$this->session->set_flashdata('success', "Saved Successfully!");
			redirect(base_url('employee_crud'));
		}   
	}
	public function edit($id)
	{
		$data['emp'] = $this->em->get($id);
		//pre($data['emp']);die;
		$data['title'] = "Edit Employee";
		$this->load->view('employee_crud/layout/header');       
	    $this->load->view('employee_crud/edit',$data);
		$this->load->view('employee_crud/layout/footer');    
	}
	public function update()
	{
		$data = $_POST;
		$id = $data['id'];
		unset($data['id']);
		
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[emp_crud.email]',['is_unique'=>"Email ID Already Exist."]);		
		$this->form_validation->set_rules('mobile_no', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('city', 'City', 'required');
	
		if (!$this->form_validation->run())
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url('employee_crud/edit/' . $id));
		}
		else
		{
		$this->em->update($id,$data);
		$this->session->set_flashdata('success', "Updated Successfully!");
		redirect(base_url('employee_crud'));
		}
	
	}

	public function delete($id)
	{
		$item = $this->em->delete($id);
		$this->session->set_flashdata('success', "Deleted Successfully!");
		redirect(base_url('employee_crud'));
	}
	
}
