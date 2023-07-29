<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->database();
		$this->load->model('UserModel', 'um');

        header('Access-Control-Allow-Origin: *'); //--for cors error-----
    }
	public function index()
	{
		//echo "Welcome to php";

		$this->load->view('User/user_list');
	}
	public function new_user()
	{
		$this->load->view('User/new_user');
	}
    public function edit_user($id)
	{
        $user_data = $this->um->getUserData($id);
        
        $data['user_data'] = $user_data;
		$this->load->view('User/edit_user',$data);
	}	
    public function list_view()
	{
		$this->load->view('User/user_list2');
	}
	public function save_user()
	{
		//echo "<pre>";
		//print_r($_POST);
		//print_r($_FILES);	
		
		$file_name_new = "";
		$data['full_name'] = $_POST['full_name'];
		$data['email'] = $_POST['email'];
		$data['mobile_no'] = $_POST['mobile_no'];
		$data1['city'] = $_POST['city'];
		$data1['state'] = $_POST['state'];
		$data1['country'] = $_POST['country'];

		$check = $this->db->query("select * from user where email ='".$_POST['email']."' ");		
		if($check->num_rows() > 0)
		{
			die('Email id Already Exist');
		}

        //--email validate-------

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            die('Plz Enter Valid Email ID');
        }

        //----mobile no validation---

        if(!preg_match('/^[0-9]{10}+$/', $_POST['mobile_no']))
        {
            die('Plz Enter Valid Mobile No');
        }
        
		//-----file upload code-------

		if($_FILES['file']['name'] !="")
		{
			$file_name = $_FILES['file']['name'];
			$file_size =$_FILES['file']['size'];
			$file_tmp =$_FILES['file']['tmp_name'];
			$file_type=$_FILES['file']['type'];

			$ext_array = explode('.',$_FILES['file']['name']);
			
			$file_ext=strtolower($ext_array[1]);
			//$ext = pathinfo($filename, PATHINFO_EXTENSION)
      
			$extensions= array("jpeg","jpg","png");
			
			if(in_array($file_ext,$extensions)=== false){
				die("extension not allowed, please choose a JPEG or PNG file.");
			}
			
			if($file_size > 2097152){
				die('File size must be excately 2 MB');
			}

			$file_name_new = "pic_".rand(11111,99999).".".$file_ext;

			$upload_path = "upload/profile_pic/".$file_name_new;

			if(move_uploaded_file($file_tmp,$upload_path))
			{				
				//die("file uploaded");
			}
		}

		//-----table saving code----

		$this->db->insert('location', $data1);
		$insert_id = $this->db->insert_id();
		$data['loc_id'] = $insert_id;
		$data['file_name'] = $file_name_new;
		$this->db->insert('user', $data);

		die('ok');

		//-----end of table saving code----


		//---end of file upload code----
		
	}
    public function update_userdata()
	{
		//echo "<pre>";
		//re($_POST);die;
		//print_r($_FILES);

		$user_id = $_POST['user_id'];
        $loc_id = $_POST['loc_id'];
		$file_name_new = "";
		$data['full_name'] = $_POST['full_name'];
		$data['email'] = $_POST['email'];
		$data['mobile_no'] = $_POST['mobile_no'];
		$data1['city'] = $_POST['city'];
		$data1['state'] = $_POST['state'];
		$data1['country'] = $_POST['country'];

		$check = $this->db->query("select * from user where email ='".$_POST['email']."' AND id!=".$user_id);		
		if($check->num_rows() > 0)
		{
			die('Email id Already Exist');
		}

        //--email validate-------

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            die('Plz Enter Valid Email ID');
        }

        //----mobile no validation---

        if(!preg_match('/^[0-9]{10}+$/', $_POST['mobile_no']))
        {
            die('Plz Enter Valid Mobile No');
        }
        
		//-----file upload code-------

		if($_FILES['file']['name'] !="")
		{
			$file_name = $_FILES['file']['name'];
			$file_size =$_FILES['file']['size'];
			$file_tmp =$_FILES['file']['tmp_name'];
			$file_type=$_FILES['file']['type'];

			$ext_array = explode('.',$_FILES['file']['name']);
			
			$file_ext=strtolower($ext_array[1]);
			//$ext = pathinfo($filename, PATHINFO_EXTENSION)
      
			$extensions= array("jpeg","jpg","png");
			
			if(in_array($file_ext,$extensions)=== false){
				die("extension not allowed, please choose a JPEG or PNG file.");
			}
			
			if($file_size > 2097152){
				die('File size must be excately 2 MB');
			}

			$file_name_new = "pic_".rand(11111,99999).".".$file_ext;
            $data['file_name'] = $file_name_new;
			$upload_path = "upload/profile_pic/".$file_name_new;

			if(move_uploaded_file($file_tmp,$upload_path))
			{				
				//die("file uploaded");
			}

            //-----delete the old file-----

            $this->um->delete_pic($_POST['old_pic']);
            
            //-----end of file delete code-----            

		}

		//-----table saving code----

        $this->db->where('id', $user_id);
        $this->db->update("user",$data);

        $this->db->where('id', $loc_id);
        $this->db->update("location",$data1);		
		
		die('ok');

		//-----end of table saving code----


		//---end of file upload code----
		
	}
    public function deleteUser()
    {
        $id = $_POST['deleteId'];

        $user_data = $this->db->query("select loc_id,file_name from user where id=".$id)->row_array();
        $loc_id = $user_data['loc_id'];
        $file_name = $user_data['file_name'];

        if($this->db->query("delete from user where id = ".$id) && $this->db->query("delete from location where id = ".$loc_id))
        {
            $this->um->delete_pic($file_name);
            echo "Record Deleted";
        }
        else
        {
            echo "Error in Deleting Record";
        }
    }
    public function deleteMultipleUser()
    {
        //pre($_POST['deleteIds']);die;
        $ids = $_POST['deleteIds'];
        $ids_array = explode(",",$ids);        
        $c = 0;
        if(count($ids_array) > 0)
        {
            foreach($ids_array as $id)
            {
                $user_data = $this->db->query("select loc_id,file_name from user where id=".$id)->row_array();
                $loc_id = $user_data['loc_id'];
                $file_name = $user_data['file_name'];

                if($this->db->query("delete from user where id = ".$id) && $this->db->query("delete from location where id = ".$loc_id))
                {
                    $this->um->delete_pic($file_name);
                    //echo "Record Deleted";
                    $c++;
                }
                else
                {
                    //echo "Error in Deleting Record";
                }
            }
        }       
        
        echo "Total ".$c." Deleted Successfully";

    }
	public function getDatatableAjax()
    {	
        //pre($_POST);die;		
		
        $total_all_rows = $this->um->getRowCount();
        //echo $total_all_rows;die;
        $columns = array(
            1 => 'u.id',
            2 => 'full_name',
            3 => 'mobile_no',
            4 => 'email',
            5 => 'country',
            6 => 'state',
            7 => 'city',
            8 => 'created_date',
        );
        $where = "WHERE 1=1 ";

        if(isset($_POST['search']['value']))
        {
            if(!empty($_POST['search']['value'])){
            $where = "WHERE ";
            $search_value = $_POST['search']['value'];
            $where .= " full_name like '%".$search_value."%'";
            $where .= " OR mobile_no like '%".$search_value."%'";
            $where .= " OR email like '%".$search_value."%'";
            $where .= " OR country like '%".$search_value."%'";
            $where .= " OR state like '%".$search_value."%'";
            $where .= " OR city like '%".$search_value."%'";

            //$where .= " OR birth_date like '%".date('Y-m-d',strtotime($search_value))."%'";          
            $args['where'] = $where;
        	}
        }

        //--------------------------------------

     

        if(isset($_POST['daterange']) && !empty($_POST['daterange']) && empty($_POST['search']['value']))
        {
            $datarange = explode("-", $_POST['daterange']);
            //pre($datarange);
            $from = date('Y-m-d', strtotime($datarange[0]));
            $to = date('Y-m-d', strtotime($datarange[1]));
            //$where  .=" AND DATE(created_date) BETWEEN '".$from."' AND  '".$to."' ";
            $where  =" WHERE DATE(created_date) BETWEEN '".$from."' AND  '".$to."' ";
        }

        //---------convert comma separeted ids into array------

        $ids = array();

        if(isset($_POST['ids']))
        {
            $ids = explode (",", $_POST['ids']); 
        }  
       
        //--------------------------------------

        //pre($_POST['order']);die;

        $order_clause = "order by ";
        if(isset($_POST['order']))
        {
            $column_name = $_POST['order'][0]['column'];
            $order = $_POST['order'][0]['dir'];            
            $args['sorting'] = " ".$columns[$column_name]." ".$order." ";
            $order_clause .= " ".$columns[$column_name]." ".$order." ";
        }
        else
        {           
            $args['sorting'] = "id asc";
            $order_clause .= "u.id desc";
        }

        if($_POST['length'] != -1)
        {
            $start = $_POST['start'];
            $length = $_POST['length'];
            $args['limit'] = $length;
            $args['offset'] = $start;
            $limit = $length;
            $offset = $start;
        }       

        $sql = "select u.*,l.* ,u.id as user_id from user u left join location l on l.id=u.loc_id ".$where." ".$order_clause." limit ".$limit." OFFSET ".$offset;
        
        //echo $sql;
        $result = $this->db->query($sql);
        
        $count_rows = $result->num_rows();
        //echo "count is ".$count_rows;die;
        if($result->num_rows() > 0)
        {
            $result = $result->result_array();
            //print_r($result);die;
        

        $list = $result;  
        //print_r($list);die;
        //$count_rows = count($result);
       
       
        $data = array();
        foreach($list as $row)
        {            
            $sub_array = array();

            $checked_att = "";

            if(in_array($row['user_id'],$ids))
            {
                $checked_att = "checked";
            }

            $sub_array[] = '<input type="checkbox" class="myCheckBoxGroup" data-id="'.$row['user_id'].'" '.$checked_att.'>';
            $sub_array[] = $row['user_id'];
            $sub_array[] = $row['full_name'];
            $sub_array[] = $row['mobile_no'];
            $sub_array[] = $row['email'];
            $sub_array[] = $row['country'];
            $sub_array[] = $row['state'];
            $sub_array[] = $row['city'];
            $sub_array[] = date('d-M-Y',strtotime($row['created_date']));
            $file_name = $row['file_name'];
            if(empty($row['file_name']))
            {
                $file_name = 'no_image.jpg';
            } 
            $sub_array[] = '<img src="'.base_url().'upload/profile_pic/'.$file_name.'" class="" alt="" height="100" width="100">';   
            $sub_array[] = '<a href="'.base_url().'/User/edit_user/'.$row['user_id'].'" data-id="'.$row['user_id'].'"  class="btn btn-info btn-sm editbtn" >Edit</a> <button data-id="'.$row['user_id'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</button>';
            $data[] = $sub_array;
        }

        $output = array(
            'draw'=> intval($_POST['draw']),
            'iTotalRecords' =>intval(count($data)) ,
            'iTotalDisplayRecords'=> intval($total_all_rows),
            'data'=>$data,
            'sql' => $sql,
        );
        echo  json_encode($output);
        }
        else
        {
            $output = array(
                'draw'=> intval($_POST['draw']),
                'recordsTotal' =>0 ,
                'recordsFiltered'=>  0,
                'data'=> array(),
                'sql' => $sql,
            );
            echo  json_encode($output);
        }	
	}
    public function test()
    {
        unlink("upload/profile_pic/test.jpg");
        echo "done";
    }
    public function test2()
    {
        $data['full_name'] = "Shrikant_".rand(33,4545);
		$data['email'] = "testemail8778".rand(10000,99999)."@gmail.com";
		$data['mobile_no'] = "9898543434";
		$data1['city'] = "Thane";
		$data1['state'] = "Maharashtra";
		$data1['country'] = "India";
        $this->db->insert('location', $data1);
		$insert_id = $this->db->insert_id();
		$data['loc_id'] = $insert_id;		
		$this->db->insert('user', $data);
        echo "Saved";
    }
    public function test3()
    {
        echo base_url();
    }
}
