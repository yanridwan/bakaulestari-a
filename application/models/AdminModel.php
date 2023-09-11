<?php
class AdminModel extends CI_Model
{
    public function select($tabel)
    {
        $select = $this->db->get($tabel);
        return $select->result();
    }

    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function update($tabel, $where, $data)
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    public function delete($tabel, $id)
    {
        $this->db->where($id);
        $this->db->delete($tabel);
    }
    public function uploadGambar()
    {
        $config['upload_path'] = './upload/Agenda/';
        $config['allowed_types']  = 'jpg|png|jpeg|mp4|3gp|flv|mkv';
        $config['max_size'] = '15360';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('gambar')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    public function uploadAgendaGallery()
    {
        $config['upload_path'] = './upload/AgendaGallery/';
        $config['allowed_types']  = 'jpg|png|jpeg|mp4|3gp|flv|mkv';
        $config['max_size'] = '15360';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('gambar')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    public function uploadGallery()
    {
        $config['upload_path'] = './upload/Gallery/';
        $config['allowed_types']  = 'jpg|png|jpeg';
        $config['max_size'] = '15360';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('gambar')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function list_gallery($kategori = null)
    {
        $this->load->library('pagination'); // Load librari paginationnya
        $query = "SELECT * FROM gallery"; // Query untuk menampilkan semua data gallery
        
        if ($kategori != null && strtolower($kategori) != 'all') {
            $query .= " WHERE LOWER(gallery_status) = '$kategori' ORDER BY gallery_id DESC";
        }
        else{
            $query = "SELECT * FROM gallery ORDER BY gallery_id DESC";
        }

        $config['base_url'] = base_url('Admin/galleryWidget');
        $config['per_page'] = 60;
        // $config['num_links'] = ;
        
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['uri_segment'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT " . $page . ", " . $config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['gallery'] = $this->db->query($query)->result();
        
        return $data;
    }
}