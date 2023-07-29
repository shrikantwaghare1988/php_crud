<?php

class UserModel extends CI_Model 
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getRowCount()
    {
        $dt = $this->db->query("select * from user");
        $count = $dt->num_rows();
        return $count;
    }
    public function getUserData($id)
    {
        $data = array();

        $sql = "select u.*,l.* ,u.id as user_id from user u left join location l on l.id=u.loc_id where u.id=".$id." limit 1";
        
        //echo $sql;
        $result = $this->db->query($sql);

        if($result->num_rows() > 0)
        {
            $data = $result->row_array();
        }
        return $data;
    }
    public function delete_pic($file_name)
    {
        if(!empty($file_name))
            {
                unlink("upload/profile_pic/".$file_name);
            }
    }
}