<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model'); 
        $this->load->model('Department_model'); 
        $this->load->model('Home_model'); 
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }
    }


    public function index()
    {
        $this->load->view('staff/header');
        $this->load->view('staff/profile-edit');
        $this->load->view('staff/footer');
    }

    public function manage()
    {
        
        $staff=$this->session->userdata('userid');
        $data['department']=$this->Department_model->select_departments();
        $data['country']=$this->Home_model->select_countries();
        $data['content']=$this->Profile_model->select_staff($staff);
        $this->load->view('staff/header');
        $this->load->view('staff/profile-edit',$data);
        $this->load->view('staff/footer');
    }

    public function update()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('txtname', 'Full Name', 'required');
        $this->form_validation->set_rules('slcgender', 'Gender', 'required');
        $this->form_validation->set_rules('slcdepartment', 'Department', 'required');
        $this->form_validation->set_rules('txtemail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('txtmobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('txtdob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('txtdoj', 'Date of Joining', 'required');
        $this->form_validation->set_rules('txtcity', 'City', 'required');
        $this->form_validation->set_rules('txtstate', 'State', 'required');
        $this->form_validation->set_rules('slccountry', 'Country', 'required');
        
        $empID=$this->input->post('textID');
        $id=$this->input->post('txtid');
        $name=$this->input->post('txtname');
        $gender=$this->input->post('slcgender');
        $department=$this->input->post('slcdepartment');
        $email=$this->input->post('txtemail');
        $password=$this->input->post('txtpass');
        $mobile=$this->input->post('txtmobile');
        $dob=$this->input->post('txtdob');
        $doj=$this->input->post('txtdoj');
        $city=$this->input->post('txtcity');
        $state=$this->input->post('txtstate');
        $country=$this->input->post('slccountry');
        $address=$this->input->post('txtaddress');

        if($this->form_validation->run() !== false)
        {
            $this->load->library('image_lib');
            $config['upload_path']= 'uploads/profile-pic/';
            $config['allowed_types'] ='gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('filephoto'))
            {
                $data=$this->Staff_model->update_staff(array('staff_name'=>$name,'gender'=>$gender,'email'=>$email,'mobile'=>$mobile,'dob'=>$dob,'doj'=>$doj,'address'=>$address,'city'=>$city,'state'=>$state,'country'=>$country,'department_id'=>$department),$id);
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

                $data=$this->Staff_model->update_staff(array('EmployeeID '=>$empID,'staff_name'=>$name,'gender'=>$gender,'email'=>$email,'password'=>$password,'mobile'=>$mobile,'dob'=>$dob,'doj'=>$doj,'address'=>$address,'city'=>$city,'state'=>$state,'country'=>$country,'department_id'=>$department,'pic'=>$image_data['file_name'],'added_by'=>$added),$id);
            }
            
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', "Staff Updated Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, Staff Updated Failed.");
            }
            redirect(base_url()."manage-staff");
        }
        else{
            $this->index();
            return false;

        } 
    }


    // public function approve()
    // {
    //     $staff=$this->session->userdata('userid');
    //     $data['content']=$this->Leave_model->select_leave_forApprove();
    //     $this->load->view('admin/header');
    //     $this->load->view('admin/approve-leave',$data);
    //     $this->load->view('admin/footer');
    // }

    // public function manage()
    // {
    //     $data['content']=$this->Leave_model->select_leave();
    //     $this->load->view('admin/header');
    //     $this->load->view('admin/manage-leave',$data);
    //     $this->load->view('admin/footer');
    // }

    // public function view()
    // {
    //     $staff=$this->session->userdata('userid');
    //     $data['content']=$this->Leave_model->select_leave_byStaffID($staff);
    //     $this->load->view('staff/header');
    //     $this->load->view('staff/view-leave',$data);
    //     $this->load->view('staff/footer');
    // }

    // public function insert_approve($id)
    // {
    //     $data=$this->Leave_model->update_leave(array('status'=>1),$id);
    //     if($this->db->affected_rows() > 0)
    //     {
    //         $this->session->set_flashdata('success', "Leave Approved Succesfully"); 
    //     }else{
    //         $this->session->set_flashdata('error', "Sorry, Leave Approve Failed.");
    //     }
    //     redirect($_SERVER['HTTP_REFERER']);
    // }

    // public function insert_reject($id)
    // {
    //     $data=$this->Leave_model->update_leave(array('status'=>2),$id);
    //     if($this->db->affected_rows() > 0)
    //     {
    //         $this->session->set_flashdata('success', "Leave Rejected Succesfully"); 
    //     }else{
    //         $this->session->set_flashdata('error', "Sorry, Leave Reject Failed.");
    //     }
    //     redirect($_SERVER['HTTP_REFERER']);
    // }

    // public function insert()
    // {
    //     $this->form_validation->set_rules('txtreason', 'Reasoon', 'required');
    //     $this->form_validation->set_rules('txtleavefrom', 'Leave From', 'required');
    //     $this->form_validation->set_rules('txtleaveto', 'Leave To', 'required');

    //     $staff=$this->session->userdata('userid');
    //     $reason=$this->input->post('txtreason');
    //     $lfrom=$this->input->post('txtleavefrom');
    //     $lto=$this->input->post('txtleaveto');
    //     $desc=$this->input->post('txtdescription');
    //     $data=$this->Leave_model->insert_leave(array('staff_id'=>$staff,'leave_reason'=>$reason,'leave_from'=>$lfrom,'leave_to'=>$lto,'description'=>$desc,'applied_on'=>date('Y-m-d')));
    //     if($data==true)
    //     {
    //         $this->session->set_flashdata('success', "New Leave Applied Succesfully"); 
    //     }else{
    //         $this->session->set_flashdata('error', "Sorry, New Leave Apply Failed.");
    //     }
    //     redirect($_SERVER['HTTP_REFERER']);
    // }

    // public function update()
    // {
    //     $id=$this->input->post('txtid');
    //     $department=$this->input->post('txtdepartment');
    //     $data=$this->Department_model->update_department(array('department_name'=>$department),$id);
    //     if($this->db->affected_rows() > 0)
    //     {
    //         $this->session->set_flashdata('success', "Department Updated Succesfully"); 
    //     }else{
    //         $this->session->set_flashdata('error', "Sorry, Department Update Failed.");
    //     }
    //     redirect(base_url()."department/manage_department");
    // }


    // function edit($id)
    // {
    //     $data['content']=$this->Department_model->select_department_byID($id);
    //     $this->load->view('admin/header');
    //     $this->load->view('admin/edit-department',$data);
    //     $this->load->view('admin/footer');
    // }


    // function delete($id)
    // {
    //     $data=$this->Department_model->delete_department($id);
    //     if($this->db->affected_rows() > 0)
    //     {
    //         $this->session->set_flashdata('success', "Department Deleted Succesfully"); 
    //     }else{
    //         $this->session->set_flashdata('error', "Sorry, Department Delete Failed.");
    //     }
    //     redirect($_SERVER['HTTP_REFERER']);
    // }



}
