<?php

class Employee_crud_model extends CI_Model 
{
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function get_all()
    {
        $emp = $this->db->get("emp_crud")->result_array();
        return $emp;
    }
    public function store($data)
    { 
        $result = $this->db->insert('emp_crud', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function get($id)
    {
        $emp = $this->db->get_where('emp_crud',['id' => $id])->row_array();
        return $emp;
    }
    public function update($id,$data)
    {
        $result = $this->db->where('id',$id)->update('emp_crud',$data);
        return $result;
    }
    public function delete($id)
    {
        $result = $this->db->delete('emp_crud',['id' => $id]);
        return $result;
    }
    public function delete_profile_pic($id)
    {
        $emp_data = $this->em->get($id);
		$profile_pic = $emp_data['profile_pic'];
		if($profile_pic!="")
		{
			unlink("upload/emp_crud/".$profile_pic);
		}
    }
}