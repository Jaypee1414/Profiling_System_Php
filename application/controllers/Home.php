<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->load->model('Staff_model'); 
        $this->load->model('Certificates_model'); 
    }

	public function index()
	{
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url('login'));
        }
		else
        {
            if($this->session->userdata('usertype')==1)
            {
                $data['department']=$this->Department_model->select_departments();
                $data['staff']=$this->Staff_model->select_staff();
                $data['leave']=$this->Leave_model->select_leave_forApprove();
                $data['salary']=$this->Salary_model->sum_salary();
                $data['content']=$this->Staff_model->select_staff();
                $this->load->view('admin/header');
                $this->load->view('admin/dashboard',$data);
                $this->load->view('admin/footer');

            
            }
            else{
                $staff=$this->session->userdata('userid');
                $data['certificate']=$this->Certificates_model->select_staff_credentials($staff);
                $data['credentials']=$this->Certificates_model->select_staff_certificate($staff);
                $data['leave']=$this->Leave_model->select_leave_byStaffID($staff);
                $data['leave']=$this->Leave_model->select_leave_byStaffID($staff);
                $data['leave']=$this->Leave_model->select_leave_byStaffID($staff);
                $this->load->view('staff/header');
                $this->load->view('staff/dashboard',$data);
                $this->load->view('staff/footer');
            }
            
        }
	}

    public function login_page()
    {
        $this->load->view('login');
    }

    public function error_page()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/error_page');
        $this->load->view('admin/footer');
    }

	function login()
    {
        $un=$this->input->post('txtusername');
        $pw=$this->input->post('txtpassword');
        $this->load->model('Home_model');
        $check_login=$this->Home_model->logindata($un,$pw);
        if($check_login<>'')
        {
            if($check_login[0]['status']==1){
                if($check_login[0]['usertype']==1){
                    $data = array(
                        'logged_in'  =>  TRUE,
                        'username' => $check_login[0]['username'],
                        'usertype' => $check_login[0]['usertype'],
                        'userid' => $check_login[0]['id']
                    );
                    $this->session->set_userdata($data);
                    redirect('/');
                }
                elseif($check_login[0]['usertype']==2){
                    $data = array(
                        'logged_in'  =>  TRUE,
                        'username' => $check_login[0]['username'],
                        'usertype' => $check_login[0]['usertype'],
                        'userid' => $check_login[0]['id']
                    );
                    $this->session->set_userdata($data);
                    redirect('/');
                }
                else{
                    $this->session->set_flashdata('login_error', 'Sorry, you cant login right now.', 300);
                    redirect(base_url().'login');
                }
                
            }
            else{
                $this->session->set_flashdata('login_error', 'Sorry, your account is blocked.', 300);
                redirect(base_url().'login');
            }
            
        }
        else{
            $this->session->set_flashdata('login_error', 'Please check your username or password and try again.', 300);
            redirect(base_url().'login');
        }
    }

    function register()
    {
        
        $this->form_validation->set_rules('txtempid', 'Employee ID', 'required');
        $this->form_validation->set_rules('txtfirstname', 'First Name', 'required');
        $this->form_validation->set_rules('txtlastname', 'Last Name', 'required');
        $this->form_validation->set_rules('txtusername', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('txtphonenumber', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
        

        $empID=$this->input->post('txtempid');
        $firstname=$this->input->post('txtfirstname');
        $lastname=$this->input->post('txtlastname');
        $mobile=$this->input->post('txtphonenumber');
        $email=$this->input->post('txtusername');
        $password=$this->input->post('txtpassword');

                


        if($this->form_validation->run() !== false)
        {

        $data=$this->Staff_model->register(array('EmployeeID'=>$empID,'staff_name'=>$firstname.$lastname,'mobile'=>$mobile,'email'=>$email,'password'=>$password));
    
            
        if($data==true)
        {
            
            $this->session->set_flashdata('success', "New Staff Added Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, New Staff Adding Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
        }else{
            
            $this->session->set_flashdata('error', "Sorry, New Staff Adding Failed.");
            $this->load->view('Profiling');
        }
    }   


    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url().'login');
    }


    public function Preprofiling()
    {
        // $this->load->view('staff/header');
        $this->load->view('Profiling');
        // $this->load->view('staff/footer');
    }
}
