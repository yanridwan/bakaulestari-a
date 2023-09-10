<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login');
        } else {
            $this->load->model('LoginModel');
            $valid_user = $this->LoginModel->check_credential();

            if ($valid_user == FALSE) {
                $this->session->set_flashdata('error', 'email atau password salah');
                
                redirect('login');
            } else {
                // if the username and password is a match
                $this->session->set_userdata('username', $valid_user->username);
                $this->session->set_userdata('password', $valid_user->password);
                $this->session->set_userdata('role', $valid_user->role);
                redirect('admin/home');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
