<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_crud extends CI_Controller {

	function __construct() 
	{
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
		$this->form_validation->set_rules('profile_pic', '', 'callback_file_check');
		//$this->form_validation->set_rules('description', 'Description', 'required');
	
		if (!$this->form_validation->run())
		{
			$this->session->set_flashdata('errors', validation_errors());			
			redirect(base_url('employee_crud/create'));
		}
		else
		{
			$insert_id = $this->em->store($data);

			//----upload profilr pic file----

			$file_name = $_FILES['profile_pic']['name'];			
			$file_tmp =$_FILES['profile_pic']['tmp_name'];
			$ext_array = explode('.',$_FILES['profile_pic']['name']);		
			$file_ext=strtolower($ext_array[1]);
			
			$file_name_new = "pic_".rand(11111,99999).".".$file_ext;
			$upload_path = "upload/emp_crud/".$file_name_new;

			if(move_uploaded_file($file_tmp,$upload_path))
			{				
				//die("file uploaded");
				$this->db->where('id', $insert_id);
    			$this->db->update('emp_crud', array('profile_pic' => $file_name_new));
			}

			//----end of file upload code----

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
		
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');		
		$this->form_validation->set_rules('email', 'Email', 'callback_check_duplicate_email['.$id.']');	
		$this->form_validation->set_rules('mobile_no', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('city', 'City', 'required');
	
		if (!$this->form_validation->run())
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url('employee_crud/edit/' . $id));
		}
		else
		{
			unset($data['id']);
			$this->em->update($id,$data);
			$this->session->set_flashdata('success', "Updated Successfully!");
			redirect(base_url('employee_crud'));
		}	
	}
	public function show($id)
	{
		$data['emp'] = $this->em->get($id);
		//pre($data['emp']);die;
		$data['title'] = "Show Employee";
		$this->load->view('employee_crud/layout/header');       
	    $this->load->view('employee_crud/show',$data);
		$this->load->view('employee_crud/layout/footer');
	}
	public function delete($id)
	{
		//---delete profile pic----

		$emp_data = $this->em->get($id);
		$profile_pic = $emp_data['profile_pic'];
		if($profile_pic!="")
		{
			unlink("upload/emp_crud/".$profile_pic);
		}
		
		//----delete record from table---

		$item = $this->em->delete($id);
		$this->session->set_flashdata('success', "Deleted Successfully!");
		redirect(base_url('employee_crud'));
	}
	public function file_check($str)
	{
		//pre($_FILES["profile_pic"]);die;
		if ($_FILES["profile_pic"]['name'] == "") 
		{
			$this->form_validation->set_message('file_check', 'Plz upload profile pic.');
			return false;
		}

		$file_name = $_FILES['profile_pic']['name'];
		$file_size =$_FILES['profile_pic']['size'];
		$file_tmp =$_FILES['profile_pic']['tmp_name'];
		$file_type=$_FILES['profile_pic']['type'];
		$ext_array = explode('.',$_FILES['profile_pic']['name']);		
		$file_ext=strtolower($ext_array[1]);

		//$file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
	
		$extensions= array("jpeg","jpg","png");
		
		if(in_array($file_ext,$extensions)=== false)
		{			
			$this->form_validation->set_message('file_check', $file_ext.' extension not allowed, please choose a JPEG or PNG file.');
			return false;
		}		
		if ($file_size > 1024 * 1024 * 3) 
		{ // 3 MB (1 byte * 1024 * 1024 * 3 (for 3 MB))

			$this->form_validation->set_message('file_check', 'File size must be less than 2 MB.');
			return false;			
		}		
	}
	public function check_duplicate_email($email, $id)
	{
		$this->form_validation->set_message('check_duplicate_email', 'Email id already exist');

		$this->db->where('email', $email);
		$this->db->where_not_in('id', $id);
		if($this->db->get('emp_crud')->num_rows() == 0)
		{
			return true;
		}
		else
		{
			return false;
		}		
	}	
}
