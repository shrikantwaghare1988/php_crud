<?php

class Global_model extends CI_Model {

  function __construct() {

    $this->load->database();    
  }

  function getTablelist($args)
    {
        $fields = isset($args['fields']) ? $args['fields'] : "";
        $sTable = $args['sTable'];
        $joinlist = isset($args['joinlist']) ? $args['joinlist'] : "";
        $group_by = isset($args['group_by']) ? $args['group_by'] : "";
        $where = isset($args['where']) ? $args['where'] : "";
        $sorting = isset($args['sorting']) ? $args['sorting'] : "";
        $limit = isset($args['limit']) ? $args['limit'] : 0;
        $offset = isset($args['offset']) ? $args['offset'] : 0;
        $countOrResult = isset($args['countOrResult']) ? (strlen(trim($args['countOrResult'])) === 0 ? "result" : $args['countOrResult']) : "result";

        $showQuery = isset($args['showQuery']) ? $args['showQuery'] : false;
        $showError = isset($args['showError']) ? $args['showError'] : false;

        $filter_where = isset($args['filter_where']) ? $args['filter_where'] : false;
        $filter_prefix = isset($args['filter_prefix']) ? $args['filter_prefix'] : '';
        $do_filter = isset($args['do_filter']) ? $args['do_filter'] : false;
        $filter_condition = isset($args['filter_condition']) ? $args['filter_condition'] : 'or';       

        if (strlen(trim($fields)) > 0) {
            $this->db->select($fields, false);
        }

        $this->db->from($sTable);

        if (isset($joinlist) && is_array($joinlist)) {
            foreach ($joinlist as $join) {
                $this->db->join($join["table"], $join["condition"], !isset($join["type"]) ? "" : $join["type"]);
            }
        }

        if (strlen(trim($group_by)) > 0) {
            $this->db->group_by($group_by);
        }

        if (is_array($where)) {
            $this->db->where($where);
        } else if (strlen(trim($where)) > 0) {
            $this->db->where($where);
        }       

        if ($countOrResult === "result") {
            if (strlen(trim($sorting)) > 0) {
                $this->db->order_by($sorting);
            }
            if ($limit > 0) {
                $this->db->limit($limit, $offset);
            }
        }

        $query = $this->db->get();

        if ($showQuery) {
            echo $this->db->last_query();
        }

        $errors = array_filter($this->db->error());
        if ($showError && !empty($errors)) {
            print_r($this->db->error());
        }

        if (!empty($errors)) {
            log_message("debug", $this->db->last_query());
            log_message("debug", json_encode($this->db->error()));
            log_message("error", $this->db->last_query());
            log_message("error", json_encode($this->db->error()));
        }        
        if ($countOrResult === "row") {
            return $query->row();
        } 
        else if ($countOrResult === "rowarray") {
            return $query->row_array();
        }else if ($countOrResult === "count") {
            return $query->num_rows();
        } elseif ($countOrResult === "result") {
            return $query->result();
        } elseif ($countOrResult === "array") {
            return $query->result_array();
        }
    }
 
  function data_change($args)
    {
        $mode = $args['mode'];
        $id = isset($args['id']) ? (strlen(trim($args['id'])) === 0 ? "" : $args['id']) : "";
        $table = $args['table'];
        $where = isset($args['where']) ? $args['where'] : "";
        $sorting = isset($args['sorting']) ? $args['sorting'] : "";
        $data = $args['tableData'];
        $needID = isset($args['needID']) ? (strlen(trim($args['needID'])) === 0 ? "" : "yes") : "";        
        $showQuery = isset($args['showQuery']) ? $args['showQuery'] : false;
        $showError = isset($args['showError']) ? $args['showError'] : false;
       
        if (strlen(trim($sorting)) > 0) {
            $this->db->order_by($sorting);
        }        

        if ($mode === "Edit") {
            if (is_array($where)) {
                $this->db->where($where);
            } else if (strlen(trim($where)) > 0) {
                $this->db->where($where, NULL, false);
            } else if (strlen(trim($id)) > 0) {
                $this->db->where('id', $id);
            } else {
                return 0;
            }           

            $this->db->update($table, $data);
        } else if ($mode === "Add") { 
            $this->db->insert($table, $data);
        } else if ($mode === "Del") {
            $this->db->delete($table, $data);
        }
        if ($showQuery) {
            echo $this->db->last_query();
        }
        $errors = array_filter($this->db->error());

        if ($showError && !empty($errors)) {
            print_r($this->db->error());
        }
        if (!empty($errors) || $this->db->trans_status() === FALSE) {
            log_message("debug", $this->db->last_query());
            log_message("debug", json_encode($this->db->error()));
            log_message("error", $this->db->last_query());
            log_message("error", json_encode($this->db->error()));
            return 0;
        } else {
            if ($mode === "Add" && strlen(trim($needID)) > 0) {
                $return = $this->db->insert_id();
            } else {
                $return = true;
            }
            return $return;
        }
    }
     function getTablelist($args)
    {
        $fields = isset($args['fields']) ? $args['fields'] : "";
        $sTable = $args['sTable'];
        $joinlist = isset($args['joinlist']) ? $args['joinlist'] : "";
        $group_by = isset($args['group_by']) ? $args['group_by'] : "";
        $where = isset($args['where']) ? $args['where'] : "";
        $sorting = isset($args['sorting']) ? $args['sorting'] : "";
        $limit = isset($args['limit']) ? $args['limit'] : 0;
        $offset = isset($args['offset']) ? $args['offset'] : 0;
        $countOrResult = isset($args['countOrResult']) ? (strlen(trim($args['countOrResult'])) === 0 ? "result" : $args['countOrResult']) : "result";

        $showQuery = isset($args['showQuery']) ? $args['showQuery'] : false;
        $showError = isset($args['showError']) ? $args['showError'] : false;

        $filter_where = isset($args['filter_where']) ? $args['filter_where'] : false;
        $filter_prefix = isset($args['filter_prefix']) ? $args['filter_prefix'] : '';
        $do_filter = isset($args['do_filter']) ? $args['do_filter'] : false;
        $filter_condition = isset($args['filter_condition']) ? $args['filter_condition'] : 'or';       

        if (strlen(trim($fields)) > 0) {
            $this->db->select($fields, false);
        }

        $this->db->from($sTable);

        if (isset($joinlist) && is_array($joinlist)) {
            foreach ($joinlist as $join) {
                $this->db->join($join["table"], $join["condition"], !isset($join["type"]) ? "" : $join["type"]);
            }
        }

        if (strlen(trim($group_by)) > 0) {
            $this->db->group_by($group_by);
        }

        if (is_array($where)) {
            $this->db->where($where);
        } else if (strlen(trim($where)) > 0) {
            $this->db->where($where);
        }       

        if ($countOrResult === "result") {
            if (strlen(trim($sorting)) > 0) {
                $this->db->order_by($sorting);
            }
            if ($limit > 0) {
                $this->db->limit($limit, $offset);
            }
        }

        $query = $this->db->get();

        if ($showQuery) {
            echo $this->db->last_query();
        }

        $errors = array_filter($this->db->error());
        if ($showError && !empty($errors)) {
            print_r($this->db->error());
        }

        if (!empty($errors)) {
            log_message("debug", $this->db->last_query());
            log_message("debug", json_encode($this->db->error()));
            log_message("error", $this->db->last_query());
            log_message("error", json_encode($this->db->error()));
        }        
        if ($countOrResult === "row") {
            return $query->row();
        } 
        else if ($countOrResult === "rowarray") {
            return $query->row_array();
        }else if ($countOrResult === "count") {
            return $query->num_rows();
        } elseif ($countOrResult === "result") {
            return $query->result();
        } elseif ($countOrResult === "array") {
            return $query->result_array();
        }
    }
    function get_lob_with_array($employee_id) 
  {  
   $lob=array();
   $args=array(
            'countOrResult' => 'array',
            'fields'=>'DISTINCT employee_id,lob_id',
            'sTable' => 'tbl_emp_lob_reporting em',
            //'where'=>' em.reporting_auth_id in ('.$employee_id.')',     
            'where'=>' em.employee_id in ('.$employee_id.')',     
        );   
   
    $lists = $this->gm->getTablelist($args);  
    $r=array();
    // echo "<pre>"; var_dump($lists);die;
     
    $a='';
   // $c= count($lists);     
    foreach ($lists as  $row) 
    {     
      $a=$a.$row['lob_id'].",";    
     // echo $row->employee_id."  -  ".$row->lob_id."<br>";
      $lob[$row['employee_id']] = $row['lob_id'];  
      $test=array($row['employee_id']=>$row['lob_id']);
     
     array_push($r,$test);
    }
    $data=$lists;  
    $data=json_decode(json_encode($lob), true); 
   // echo "<pre>"; print_r($r);die;
    return $lists;     
  }   
  

   
      
       
}