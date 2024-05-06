<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Certificates_model'); 
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }
    }

    public function index()
    {
        $this->load->view('staff/header');
        $this->load->view('staff/Add-Certificate');
        $this->load->view('staff/footer');
    }

    public function credentials()
    {
        $this->load->view('staff/header');
        $this->load->view('staff/Add-Credentials');
        $this->load->view('staff/footer');
    }

    public function insert()
    {
        
        $this->session->userdata('userid');
        
        $name=$this->input->post('certificatename');
        $staff=$this->session->userdata('userid');

        if($this !== false)
        {
            $this->load->library('image_lib');
            $config['upload_path']= 'uploads/profile-pic/';
            $config['allowed_types'] ='gif|jpg|png|jpeg|pdf|docx';
            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload('filephoto'))
            {
                $image='default-pic.jpg';
            }
            else
            {
                $image_data =   $this->upload->data();

                $configer =  array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $image_data['full_path'],
                  'maintain_ratio'  =>  TRUE,
                  'width'           =>  150,
                  'height'          =>  150,
                  'quality'         =>  50
                );
                $this->image_lib->clear();
                $this->image_lib->initialize($configer);
                $this->image_lib->resize();
                
                $image=$image_data['file_name'];
            }
            
            $data=$this->Certificates_model->insert_certificate(array('staff_id' => $staff,'name'=>$name,'certificate'=>$image));
            if($data==true)
            {
                $this->session->set_flashdata('success', "Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Adding Certificate Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']); 
        }
    }

    public function insert_credendtials()
    {
        
        $this->session->userdata('userid');
        
        $name=$this->input->post('certificatename');
        $staff=$this->session->userdata('userid');

        if($this !== false)
        {
            $this->load->library('image_lib');
            $config['upload_path']= 'uploads/profile-pic/';
            $config['allowed_types'] ='gif|jpg|png|jpeg|pdf|docx';
            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload('filephoto'))
            {
                $image='default-pic.jpg';
            }
            else
            {
                $image_data =   $this->upload->data();

                $configer =  array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $image_data['full_path'],
                  'maintain_ratio'  =>  TRUE,
                  'width'           =>  150,
                  'height'          =>  150,
                  'quality'         =>  50
                );
                $this->image_lib->clear();
                $this->image_lib->initialize($configer);
                $this->image_lib->resize();
                
                $image=$image_data['file_name'];
            }
            
            $data=$this->Certificates_model->insert_credendtials(array('staff_id' => $staff,'name'=>$name,'credentials'=>$image));
            if($data==true)
            {
                $this->session->set_flashdata('success', "Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Adding Certificate Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']); 
        }
    }

    public function manage_certificate()
    {
        $data['content']=$this->Certificates_model->select_certificate();
        $this->load->view('staff/header');
        $this->load->view('staff/Manage-Certificate',$data);
        $this->load->view('staff/footer');
    }

    public function download_file_certificate($id) {
        // Path to the file to be doweyenloaded
        $path = 'uploads/profile-pic/';
        $file = $id;
        $file_path =$path . $file;

        // Check if the file exists
        if (file_exists($file_path)) {
            // Load the download helper
            $this->load->helper('download');

            // Set the file content type
            $mime = mime_content_type($file_path);
            header('Content-Type: ' . $mime);

            // Read the file contents
            $data = file_get_contents($file_path);

            // Force download the file
            force_download(basename($file_path), $data);
        } else {
            // File not found
            echo 'File not found!';
        }
    }

    function delete_certificate($id)
    {
        $data=$this->Certificates_model->delete_certificate($id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function manage_credentials()
    {
        $data['content']=$this->Certificates_model->select_credentials();
        $this->load->view('staff/header');
        $this->load->view('staff/Manage-Credentials',$data);
        $this->load->view('staff/footer');
    } 

    public function download_file_credentials($id) {
        // Path to the file to be doweyenloaded
        $path = 'uploads/profile-pic/';
        $file = $id;
        $file_path =$path . $file;

        // Check if the file exists
        if (file_exists($file_path)) {
            // Load the download helper
            $this->load->helper('download');

            // Set the file content type
            $mime = mime_content_type($file_path);
            header('Content-Type: ' . $mime);

            // Read the file contents
            $data = file_get_contents($file_path);

            // Force download the file
            force_download(basename($file_path), $data);
        } else {
            // File not found
            echo 'File not found!';
        }
    }

    function delete_credentials($id)
    {
        $data=$this->Certificates_model->delete_credentials($id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }


// ----------------------------------------
    // public function manage_credentials()
    // {
    //     $data['content']=$this->Certificates_model->select_credentials();
    //     $this->load->view('staff/header');
    //     $this->load->view('staff/Manage-Credentials',$data);
    //     $this->load->view('staff/footer');
    // }

    // public function manage_credentials()
    // {
    //     $data['content']=$this->Certificates_model->select_credentials();
    //     $this->load->view('staff/header');
    //     $this->load->view('staff/Manage-Credentials',$data);
    //     $this->load->view('staff/footer');
    // } 


}
