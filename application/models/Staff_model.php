<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_model extends CI_Model {


    function insert_staff($data)
    {
        
        $this->db->insert("staff_tbl",$data);
        return $this->db->insert_id();
    }

    function register($data)
    {
        try {
            $this->db->insert("preregister",$data);
            return $this->db->insert_id();
        } catch (Exception $e) {
            return false;
        }
    }

    function select_staff()
    {
        $this->db->order_by('staff_tbl.id','DESC');
        $this->db->select("staff_tbl.*,department_tbl.department_name");
        $this->db->from("staff_tbl");
        $this->db->join("department_tbl",'department_tbl.id=staff_tbl.department_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }


    function reg()
    {
        // $this->db->select("preregister");
        $this->db->order_by('preregister.user_id','DESC');
        $this->db->from("preregister");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_staff_byID($id)
    {
        $this->db->where('staff_tbl.id',$id);
        $this->db->select("staff_tbl.*,department_tbl.department_name");
        $this->db->from("staff_tbl");
        $this->db->join("department_tbl",'department_tbl.id=staff_tbl.department_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_employee_byID($id)
    {
        $this->db->where('preregister.user_id ',$id);
        $this->db->select("preregister.*");
        $this->db->from("preregister");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_staff_certificate($id)
    {
        $this->db->where('certificate_tbl.staff_id',$id);
        $this->db->select("certificate_tbl.*");
        $this->db->from("certificate_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_staff_credential($id)
    {
        $this->db->where('credentials_tbl.staff_id',$id);
        $this->db->select("credentials_tbl.*");
        $this->db->from("credentials_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }


    function select_staff_byEmail($email)
    {

        $this->db->where('email',$email);
        $qry=$this->db->get('staff_tbl');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_staff_byDept($dpt)
    {
        $this->db->where('staff_tbl.department_id',$dpt);
        $this->db->select("staff_tbl.*,department_tbl.department_name");
        $this->db->from("staff_tbl");
        $this->db->join("department_tbl",'department_tbl.id=staff_tbl.department_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }


    function delete_staff($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("staff_tbl");
        $this->db->affected_rows();
    }

    function delete_employee($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete("preregister");
        $this->db->affected_rows();
    }

    
    function update_staff($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('staff_tbl',$data);
        $this->db->affected_rows();
    }


}
