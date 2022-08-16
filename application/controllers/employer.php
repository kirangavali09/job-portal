<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->model('Employer_model');
        $this->load->model('Jobs_model');
    }
    public function signup()
	{
		$this->form_validation->set_rules('company_name', 'Company Name', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required'); 
        $this->form_validation->set_rules('repassword', 'Re-enter Password', 'required|matches[password]');
        $this->form_validation->set_rules('terms', 'Terms & conditions', 'required');  
			
        if ($this->form_validation->run() == FALSE) 
        {
            $data['page_title'] = 'Register - Job Portal';
		    $this->load->view('header/header', $data); 
            $this->load->view('employer/signup_view');
            $this->load->view('footer/footer');
            
        }
        else
        {
            
            $data = array(
                'company_name' => $this->input->post('company_name'),
                'company_address' => $this->input->post('company_address'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'gender' => $this->input->post('gender'),
                'contact_number' => $this->input->post('contact_number'),
                'current_location' => $this->input->post('current_location'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $this->Employer_model->employer_insert($data);
            $this->session->set_flashdata('success', 'Registration Successfully');
		    redirect('employer/signup');
            exit;
            
        }
	}

    public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
           
                
        if ($this->form_validation->run() == FALSE) 
        { 
            $data['page_title'] = 'Login - Job Portal';
		    $this->load->view('header/header', $data);
            $this->load->view('employer/login_view');
            $this->load->view('footer/footer');
        }
        else
        {
            $username = $this->input->post('email');
            $password = $this->input->post('password');
            $login = $this->Employer_model->employer_login($username,$password);
            if($login)
            {
                $employer_session = array(
                    'employer_id' => $login->id,
                    'company_name' => $login->company_name
                );
                $this->session->set_userdata($employer_session);
                redirect('employer/dashboard');
                exit;
            }
            else
            {
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('employer/login');
                exit;
            }
        }

	}

    public function logout()
	{
        $this->session->sess_destroy();
        redirect('employer/login');
        exit();
	}

    public function addjob()
	{
        if(!$this->session->userdata('employer_id'))
        {
            redirect('employer/login');  
        }
        else
        {
            $this->form_validation->set_rules('job_title', 'Job Title', 'required');
            $this->form_validation->set_rules('description', 'Job Description', 'required');
            
            if ($this->form_validation->run() == FALSE) 
            { 
                $data['page_title'] = 'Post New Job - Job Portal';
		        $this->load->view('employer/dashboard_header', $data);
                $this->load->view('employer/add_job');
                $this->load->view('footer/footer');  
            }
            else
            {
                
                $data = array(
                    'job_title' => $this->input->post('job_title'),
                    'description' => $this->input->post('description'),
                    'ctc' => $this->input->post('ctc'),
                    'experience' => $this->input->post('experience'),
                    'job_type' => $this->input->post('job_type'),
                    'job_location' => $this->input->post('job_location'),
                    'employer_id' => $this->session->userdata('employer_id')
                );
                $this->Jobs_model->job_insert($data);
                $this->session->set_flashdata('success', 'Job Posted Successfully');
		        redirect('employer/addjob');
                exit;

            }
        }
        
        
	}

    public function myjobs()
	{
        
        if(!$this->session->userdata('employer_id'))
        {
            redirect('employer/login');
            exit;  
        }
        else
        {
            $data['page_title'] = 'My Jobs - Job Portal';
		    $this->load->view('employer/dashboard_header', $data);
            $results['val'] = $this->Jobs_model->myjob($this->session->userdata('employer_id'));

            $this->load->view('employer/myjob_view',$results);
            $this->load->view('footer/footer');
        }
    }

    public function delete_job()
    {
        $id = $this->input->get('id');
        $response = $this->Jobs_model->deleterecords($id);
        if($response == true)
        {
            redirect('/employer/myjobs');
            exit;
        }
    }

    public function edit_job()
    {
        
        $id = $this->input->get('id');
        $response['val'] = $this->Jobs_model->edit($id);
        $this->load->view('employer/edit',$response);

    }

    public function update_job($id)
	{
        if(!$this->session->userdata('employer_id'))
        {
            redirect('employer/login');  
        }
        else
        {
            $this->form_validation->set_rules('job_title', 'Job Title', 'required');
            $this->form_validation->set_rules('description', 'Job Description', 'required');
            
            if ($this->form_validation->run() == FALSE) 
            { 
                $this->load->view('employer/edit');
                 
            }
            else
            {
                
                $data = array(
                    'job_title' => $this->input->post('job_title'),
                    'description' => $this->input->post('description'),
                    'ctc' => $this->input->post('ctc'),
                    'experience' => $this->input->post('experience'),
                    'job_type' => $this->input->post('job_type'),
                    'job_location' => $this->input->post('job_location'),

                );
                $this->Jobs_model->job_update($data,$id);
                $this->session->set_flashdata('success', 'Job updated Successfully');
		        redirect('employer/myjobs');
                exit;

            }
        }
        
        
	}

    public function dashboard()
    {
        if(!$this->session->userdata('employer_id'))
        {
            redirect('employer/login');
            exit;  
        }
        else
        {
            $data['page_title'] = 'Dashboard - Job Portal';
		    $this->load->view('employer/dashboard_header', $data);
            $this->load->view('employer/dashboard_view');
            $this->load->view('footer/footer');
        }
    }

    public function view_applicants()
    {
        
        if(!$this->session->userdata('employer_id'))
        {
            redirect('employer/login');
            exit;  
        }
        else
        {
            $data['page_title'] = 'My Jobs';
            $this->load->view('employer/dashboard_header', $data);
            
            $id = $this->input->get('id');
            $results['val'] = $this->Jobs_model->job_applicants($id);
            $this->load->view('employer/view_applicants',$results);
            $this->load->view('footer/footer');
        }
    }

    public function download_resume()
    {
        $this->load->model('Candidate_model');
        $id = $this->input->get('id');

        $this->load->helper('download');
        $result = $this->Candidate_model->get_resume($id);
        $file_name = $result['resume'];
        $resume = FCPATH.'./assets/resumes/'.$file_name;
        force_download($resume,NULL);
    }  


}
?>