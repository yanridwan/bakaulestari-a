<?php
class AgendaModel extends CI_Model
{
	public function paginationAgenda(){
		$this->load->library('pagination'); // Load librari paginationnya
		
		$query = "SELECT * FROM agenda WHERE agenda_status = 'sudah terlaksana' ORDER BY agenda_tanggal DESC"; // Query untuk menampilkan semua data siswa
		
		$config['base_url'] = base_url('User/agenda');
		$config['total_rows'] = $this->db->query($query)->num_rows();
		$config['per_page'] = 7;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		
		// Style Pagination
		// Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
		$config['full_tag_open']   = '<ul class="pagination justify-content-center pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&gt'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&lt'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
		
		$this->pagination->initialize($config); // Set konfigurasi paginationnya
		
		$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
		$query .= " LIMIT ".$page.", ".$config['per_page'];
		
		$data['limit'] = $config['per_page'];
		$data['total_rows'] = $config['total_rows'];
		$data['aswd'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
		$data['agenda'] = $this->db->query($query)->result();
		
		return $data;
	}

    public function getAgenda($id)
    {
        $a = "SELECT * FROM agenda WHERE agenda.agenda_id = '{$id}'";
        $data = $this->db->query($a);
        return $data->row();
    }

    public function getAgendaDetail($id)
    {
        $this->db->select('*');
        $this->db->from('agenda_gallery, agenda');
        $this->db->where('agenda_gallery.agenda_id = agenda.agenda_id');
        $this->db->where('agenda.agenda_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
        // $a = "SELECT * FROM desain, desain_detail WHERE desain.desain_id = desain_detail.desain_id AND desain_detail.desain_id = '{$id}'";
        // $data = $this->db->query($a);
        // return $data->row();
    }
}
