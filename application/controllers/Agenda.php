<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('role') != 'admin'){
			redirect('login');
		}
        $this->load->model('AdminModel');
    }
	public function tambah()
    {
        $gambar = $this->AdminModel->uploadGambar();
        $data = array(
            'agenda_tanggal' => $this->input->post('tanggal'),
            'agenda_nama' => $this->input->post('judul'),
            'agenda_deskripsi' => $this->input->post('deskripsi'),
            'agenda_gambar' => $gambar['file']['file_name'],
            'agenda_status' => $this->input->post('status'),
        );

        $this->AdminModel->insert('agenda', $data);
        redirect('Admin/agenda');
    }
    public function edit()
    {
        $gambar = $this->AdminModel->uploadGambar();
        if (!empty($gambar['file']['file_name'])){
            $data = array(
                'agenda_tanggal' => $this->input->post('tanggal'),
                'agenda_nama' => $this->input->post('judul'),
                'agenda_deskripsi' => $this->input->post('deskripsi'),
                'agenda_gambar' => $gambar['file']['file_name'],
                'agenda_status' => $this->input->post('status'),
            );
        } else {
            $data = array(
                'agenda_tanggal' => $this->input->post('tanggal'),
                'agenda_nama' => $this->input->post('judul'),
                'agenda_deskripsi' => $this->input->post('deskripsi'),
                // 'agenda_gambar' => $gambar['file']['file_name'],
                'agenda_status' => $this->input->post('status'),
            );
        }

        $where = array(
            'agenda_id' => $this->input->post('id'),
        );

        $this->AdminModel->update('agenda', $where, $data);
        redirect('Admin/agenda');
    }
    public function hapus($id)
    {
        if ($id == "") {
            redirect('Admin/agenda');
        } else {
            $this->db->where('agenda_id', $id);
            $this->db->delete('agenda');
            redirect('Admin/agenda');
        }
    }
    
	public function tambahAgendaGallery()
    {
        $gambar = $this->AdminModel->uploadAgendaGallery();
        $data = array(
            // 'agenda_tanggal' => $this->input->post('tanggal'),
            // 'agenda_nama' => $this->input->post('judul'),
            // 'agenda_deskripsi' => $this->input->post('deskripsi'),
            'agenda_gallery_file' => $gambar['file']['file_name'],
            'agenda_id' => $this->input->post('id'),
            // 'agenda_status' => $this->input->post('status'),
        );

        // $where = array(
        //     'agenda_id' => $this->input->post('id');
        // )

        $id = $this->input->post('id');

        $this->AdminModel->insert('agenda_gallery', $data);
        redirect('Admin/agendaDetail/' . $id);
    }
    public function editGallery()
    {
        $gambar = $this->AdminModel->uploadAgendaGallery();
        if (!empty($gambar['file']['file_name'])){
            $data = array(
            // 'agenda_tanggal' => $this->input->post('tanggal'),
            // 'agenda_nama' => $this->input->post('judul'),
            // 'agenda_deskripsi' => $this->input->post('deskripsi'),
            'agenda_gallery_file' => $gambar['file']['file_name'],
            // 'agenda_id' => $this->input->post('id'),
            // 'agenda_status' => $this->input->post('status'),
            );
        } else {
            $data = array(
            // 'agenda_tanggal' => $this->input->post('tanggal'),
            // 'agenda_nama' => $this->input->post('judul'),
            // 'agenda_deskripsi' => $this->input->post('deskripsi'),
            'agenda_gallery_file' => $gambar['file']['file_name'],
            // 'agenda_id' => $this->input->post('id'),
            // 'agenda_status' => $this->input->post('status'),
            );
        }

        $where = array(
            'agenda_gallery_id' => $this->input->post('galleryid'),
        );

        $id = $this->input->post('id');

        $this->AdminModel->update('agenda_gallery', $where, $data);
        redirect('Admin/agendaDetail/' . $id);
    }
    public function hapusAgendaGallery()
    {
        $where = $this->input->post('galleryid');

        $id = $this->input->post('id');
        
        if ($where == "") {
            redirect('Admin/agendaDetail');
        } else {
            $this->db->where('agenda_gallery_id', $where);
            $this->db->delete('agenda_gallery');
            redirect('Admin/agendaDetail/' . $id);
        }
    }
}