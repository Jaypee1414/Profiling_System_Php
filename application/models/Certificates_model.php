<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificates_model extends CI_Model {

    
    function insert_certificate($data)
    {
        $this->db->insert("certificate_tbl",$data);
        return $this->db->insert_id();
    }

    
    function insert_credendtials($data)
    {
        $this->db->insert("credentials_tbl",$data);
        return $this->db->insert_id();
    }

    function select_certificate()
    {
        $qry=$this->db->get('certificate_tbl');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_credentials()
    {
        $qry=$this->db->get('credentials_tbl');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function delete_certificate($id)
    {
        $this->db->where('certificateID', $id);
        $this->db->delete("certificate_tbl");
        $this->db->affected_rows();
    }

    function delete_credentials($id)
    {
        $this->db->where('credentialsID', $id);
        $this->db->delete("credentials_tbl");
        $this->db->affected_rows();
    }


    function select_staff_credentials($staffid)
    {
        $this->db->order_by('credentials_tbl.credentialsID ','DESC');
        $this->db->where('credentials_tbl.staff_id',$staffid);
        $this->db->select("credentials_tbl.*,staff_tbl.staff_name,staff_tbl.city,staff_tbl.state,staff_tbl.country,staff_tbl.mobile,staff_tbl.email,department_tbl.department_name");
        $this->db->from("credentials_tbl");
        $this->db->join("staff_tbl",'staff_tbl.id=credentials_tbl.staff_id');
        $this->db->join("department_tbl",'department_tbl.id=staff_tbl.department_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }


    function select_staff_certificate($staffid)
    {
        $this->db->order_by('certificate_tbl.certificateID','DESC');
        $this->db->where('certificate_tbl.staff_id',$staffid);
        $this->db->select("certificate_tbl.*,staff_tbl.staff_name,staff_tbl.city,staff_tbl.state,staff_tbl.country,staff_tbl.mobile,staff_tbl.email,department_tbl.department_name");
        $this->db->from("certificate_tbl");
        $this->db->join("staff_tbl",'staff_tbl.id=certificate_tbl.staff_id');
        $this->db->join("department_tbl",'department_tbl.id=staff_tbl.department_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
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


}
