<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('role') != 'admin'){
			redirect('login');
		}
        $this->load->model('AdminModel');
    }

    public function hapus($id)
    {
        if ($id == "") {
            redirect('Admin/order');
        } else {
            $this->db->where('customer_id', $id);
            $this->db->delete('order');
            redirect('admin/order');
        }
    }
    public function terbuka()
	{
        $data = array(
                'customer_status' => "terbaca",
            );

        $where = array(
            'customer_id' => $this->input->post('id'),
        );

        $this->AdminModel->update('order', $where, $data);
        redirect('admin/order');
	}
}
