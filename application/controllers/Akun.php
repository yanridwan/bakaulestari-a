<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');
    }
	public function tambah()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'role' => "admin",
        );

        $this->AdminModel->insert('user', $data);
        redirect('Admin/user');
    }
    public function edit()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'role' => "admin",
        );

        $where = array(
            'id' => $this->input->post('id'),
        );

        $this->AdminModel->update('user', $where, $data);
        redirect('Admin/user');
    }
    public function hapus($id)
    {
        if ($id == "") {
            redirect('Admin/user');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('user');
            redirect('Admin/user');
        }
    }
}