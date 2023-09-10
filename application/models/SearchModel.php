<?php defined('BASEPATH') or exit('No direct script access allowed');

class SearchModel extends CI_Model
{
    public function SearchAll($query)
    {
        $this->db->like('agenda_nama', $query);
        $data['cari'] = $this->db->from('agenda')->where('agenda_status = "sudah terlaksana"')->order_by('agenda_tanggal','DESC')->get()->result();
        return $data;
    }
    // public function terlaksana()
    // {
    //     $this->load->library('pagination'); // Load librari paginationnya

    //     $query = "SELECT * FROM agenda WHERE agenda_status = 'sudah terlaksana' ORDER BY agenda_tanggal DESC"; // Query untuk menampilkan semua data agenda
    //     // $data['agen'] = $this->db->from('agenda')->where('agenda_status = "sudah terlaksana"')->order_by('agenda_tanggal', 'desc')->get()->result();
    //     $config['base_url'] = base_url('User/home');
    //     $config['total_rows'] = $this->db->query($query)->num_rows();
    //     $config['per_page'] = 10;
    //     $config['uri_segment'] = 3;
    //     $config['num_links'] = 3;

    //     // Style Pagination
    //     // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
    //     $config['full_tag_open']   = '<ul class="pagination justify-content-center pagination-sm m-t-xs m-b-xs">';
    //     $config['full_tag_close']  = '</ul>';

    //     $config['first_link']      = 'First';
    //     $config['first_tag_open']  = '<li>';
    //     $config['first_tag_close'] = '</li>';

    //     $config['last_link']       = 'Last';
    //     $config['last_tag_open']   = '<li>';
    //     $config['last_tag_close']  = '</li>';

    //     $config['next_link']       = '&gt;';
    //     $config['next_tag_open']   = '<li>';
    //     $config['next_tag_close']  = '</li>';

    //     $config['prev_link']       = '&lt;';
    //     $config['prev_tag_open']   = '<li>';
    //     $config['prev_tag_close']  = '</li>';

    //     $config['cur_tag_open']    = '<li class="active"><a href="#">';
    //     $config['cur_tag_close']   = '</a></li>';

    //     $config['num_tag_open']    = '<li>';
    //     $config['num_tag_close']   = '</li>';
    //     // End style pagination

    //     $this->pagination->initialize($config); // Set konfigurasi paginationnya

    //     $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
    //     $query .= " LIMIT " . $page . ", " . $config['per_page'];

    //     $data['limit'] = $config['per_page'];
    //     $data['total_rows'] = $config['total_rows'];
    //     $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
    //     $data['agenda'] = $this->db->query($query)->result();
    //     // $data['agen'] = $this->db->from('agenda')->where('agenda_status = "sudah terlaksana"')->order_by('agenda_tanggal', 'desc')->get()->result();

    //     return $data;
    // }
}
