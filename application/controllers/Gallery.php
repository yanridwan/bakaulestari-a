<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');
    }
	public function tambah()
    {
        $gambar = $this->AdminModel->uploadGallery();
        $data = array(
            'gallery_nama' => $this->input->post('judul'),
            'gallery_deskripsi' => $this->input->post('deskripsi'),
            'gallery_gambar' => $gambar['file']['file_name'],
            'gallery_status' => $this->input->post('status'),
        );

        $this->AdminModel->insert('gallery', $data);
        redirect('Admin/gallery');
    }
    public function edit()
    {
        $gambar = $this->AdminModel->uploadGallery();
        if (!empty($gambar['file']['file_name'])){
        $data = array(
            'gallery_nama' => $this->input->post('judul'),
            'gallery_deskripsi' => $this->input->post('deskripsi'),
            'gallery_gambar' => $gambar['file']['file_name'],
            'gallery_status' => $this->input->post('status'),
        );
        }
        else{
            $data = array(
            'gallery_nama' => $this->input->post('judul'),
            'gallery_deskripsi' => $this->input->post('deskripsi'),
            // 'gallery_gambar' => $gambar['file']['file_name'],
            'gallery_status' => $this->input->post('status'),
            );
        
        }
        $where = array(
            'gallery_id' => $this->input->post('id'),
        );
        $this->AdminModel->update('gallery', $where, $data);
        redirect('Admin/gallery');
    }
    public function hapus($id)
    {
        if ($id == "") {
            redirect('Admin/gallery');
        } else {
            $this->db->where('gallery_id', $id);
            $this->db->delete('gallery');
            redirect('Admin/gallery');
        }
    }
}