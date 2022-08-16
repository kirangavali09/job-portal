<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Candidate_model');
        $this->load->model('Jobs_model');
    }

	public function signup()
	{
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
            $this->load->view('candidate/signup_view');
            $this->load->view('footer/footer'); 
        }
        else
        {
            $data = array(
                'ctc' => $this->input->post('ctc'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'gender' => $this->input->post('gender'),
                'dob' => $this->input->post('dob'),
                'contact_number' => $this->input->post('contact_number'),
                'current_location' => $this->input->post('current_location'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $this->Candidate_model->candidate_insert($data);
            $this->session->set_flashdata('success', 'Registration Successfully');
		    redirect('candidate/signup');
            exit();

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
            $this->load->view('candidate/login_view');
            $this->load->view('footer/footer');
        }
        else
        {
            $username = $this->input->post('email');
            $password = $this->input->post('password');
            $login = $this->Candidate_model->candidate_login($username,$password);
            
            if($login)
            {
                $candidate_session = array(
                    'candidate_id' => $login->id,
                    'first_name' => $login->first_name
                );
                $this->session->set_userdata($candidate_session);
                redirect('candidate/dashboard');
                exit();
            }
            else
            {
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('candidate/login');
                exit();
                
            }
        }
	}

    public function dashboard()
	{
        if(!$this->session->userdata('candidate_id'))
        {
            redirect('candidate/login');
            exit();  
        }
        else
        {
            $data['page_title'] = 'Dashboard - Job Portal';
		    $this->load->view('candidate/dashboard_header', $data);
            $this->load->view('candidate/dashboard_view');
            $this->load->view('footer/footer');
        }
	}

    public function logout()
	{
        $this->session->sess_destroy();
        redirect('candidate/login');
        exit();
	}

    public function search()
	{
        if(!$this->session->userdata('candidate_id'))
        {
            redirect('candidate/login');
            exit();  
        }
        else
        {
            $data['page_title'] = 'Search - Job Portal';
		    $this->load->view('candidate/dashboard_header', $data);
            

            $job_type = $this->input->post('job_type');
            $job_location = $this->input->post('job_location');

            $search = $this->input->post('search');

            if(isset($job_type) OR isset($job_location))
            {
                $results['val'] = $this->Jobs_model->filter_records($job_type, $job_location);
                $this->load->view('candidate/search_view',$results);
                $this->load->view('footer/footer');
            }
            else
            {
                $results['val'] = $this->Jobs_model->getjobs();
                $this->load->view('candidate/search_view',$results);
                $this->load->view('footer/footer');   
            }
            

            
        }
        
	}

    public function job_Details()
    {
        if(!$this->session->userdata('candidate_id'))
        {
            redirect('candidate/login');
            exit();  
        }
        else
        {
            $data['page_title'] = 'Job Details';
		    $this->load->view('candidate/dashboard_header', $data);
            
            $id = $this->input->get('id');
            $results['val'] = $this->Jobs_model->job_Details($id);

            $this->load->view('candidate/job_details',$results);
            $this->load->view('footer/footer');
        }
    }

    public function apply_job($id)
    {
        $job_data = $this->Jobs_model->job_data($id);

        $candidate_id = $this->session->userdata('candidate_id');
        $job_data['candidate_id'] = $candidate_id;
        $job_data['applied_on'] = date("Y/m/d");
        
        $this->Jobs_model->apply_job($job_data);
        $this->session->set_flashdata('success', 'Job Applied Successfully');
        redirect('candidate/my_applied_jobs');
        exit();
    }

    public function my_applied_jobs()
    {

        if(!$this->session->userdata('candidate_id'))
        {
            redirect('candidate/login');
            exit;  
        }
        else
        {
            $data['page_title'] = 'My applied Jobs - Job Portal';
            $this->load->view('candidate/dashboard_header', $data);

            $candidate_id = $this->session->userdata('candidate_id');
            $applied_jobs = $this->Jobs_model->my_applied_job();
            $get_job_data['value'] = $this->Jobs_model->get_applied_job( $candidate_id);

            $this->load->view('candidate/applied_job_view', $get_job_data);
            $this->load->view('footer/footer');
        }
        
    }

    public function my_profile()
    {
        if(!$this->session->userdata('candidate_id'))
        {
            redirect('candidate/login');
            exit();  
        }
        else
        {
            $data['page_title'] = 'My Profile';
            $this->load->view('candidate/dashboard_header', $data);
            
            $id = $this->input->get('id');
            $results['val'] = $this->Candidate_model->my_profile($id);

            $this->load->view('candidate/my_profile_view',$results);
            $this->load->view('footer/footer');
        }
    }

    public function edit_profile()
    {       
        $id = $this->input->get('id');
        $response['val'] = $this->Candidate_model->edit($id);
        $response['error'] = "";
        $this->load->view('candidate/edit_view',$response);

    }

    // public function resume_valida

    public function update_candidate()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        // $this->form_validation->set_rules('resume', 'Resume', 'callback_resume_validate');
            
        if ($this->form_validation->run() == FALSE) 
        {
            
            $this->load->view('candidate/edit_view'); 
        }
        else
        {
            $data = array(
                'ctc' => $this->input->post('ctc'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'gender' => $this->input->post('gender'),
                'dob' => $this->input->post('dob'),
                'contact_number' => $this->input->post('contact_number'),
                'current_location' => $this->input->post('current_location'),
                'email' => $this->input->post('email'),
            );

            $config['upload_path']   = './assets/resumes'; 
            $config['allowed_types'] = 'pdf|jpg|png'; 
            $config['max_size']      = 1024; 
            $config['max_width']     = 1024; 
            $config['max_height']    = 1200;  
            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload('resume')) 
            {
               $error = array('error' => $this->upload->display_errors());
               $this->load->view('candidate/edit_view', $error);
                // $this->session->set_flashdata('success', 'Registration Successfully');
                // redirect('candidate/edit_profile');
                // exit(); 
            }
            
            else 
            { 
                $resume_data = $this->upload->data();
                $file_name = $resume_data['file_name'];
                
                $data['resume'] = $file_name;
                $id = $this->input->get('id');
                $this->Candidate_model->candidate_update($data,$id);
                $this->session->set_flashdata('success', 'Updated Successfully');
                redirect('candidate/my_profile');
                exit();
            } 
        }            
    }

    public function download_resume()
    {
        $id = $this->input->get('id');
        $this->load->helper('download');
        $result = $this->Candidate_model->get_resume($id);
        $file_name = $result['resume'];
        $resume = FCPATH.'./assets/resumes/'.$file_name;
        force_download($resume,NULL);
    }    
}
?>