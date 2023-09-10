<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('role') != 'admin'){
			redirect('Login');
		}
        $this->load->model('AdminModel');
        $this->load->model('AgendaModel');
    }
	public function home()
	{
		// $data['visitor'] = $this->AdminModel->visitor();
        $data['visitor'] = $this->db->select()->from('visitor')->get()->num_rows();
        $data['terlaksana'] = $this->db->select()->from('agenda')->where('agenda_status = "sudah terlaksana"')->get()->num_rows();
        $data['terjadwal'] = $this->db->select()->from('agenda')->where('agenda_status = "terjadwal"')->get()->num_rows();
        $data['gallery'] = $this->db->select()->from('gallery')->get()->num_rows();
		$data['masuk'] = $this->db->from('order')->where('customer_status = "baru"')->order_by('tanggal_masuk', 'desc')->limit('3')->get()->result();
        $data['order'] = $this->db->from('order')
            ->order_by('order.tanggal_masuk', 'DESC')
            ->limit(5)
            ->get()
            ->result();
        $data['agenda'] = $this->db->from('agenda')
            ->order_by('agenda.agenda_id', 'DESC')
            ->limit(4)
            ->get()
            ->result();
		$data['asd'] = $this->db->from('gallery')
			->order_by('gallery.gallery_id', 'DESC')
			->limit(7)
			->get()
			->result();
		$this->load->view('admin/home', $data);
	}
    public function gallery()
	{
		$data['gallery'] = $this->db->from('gallery')->order_by('gallery_id', 'desc')->get()->result();
		// $data['gallery'] = $this->AdminModel->select('gallery');
		$this->load->view('admin/gallery',$data);
	}
    public function agenda()
	{
		$data['agenda'] = $this->db->from('agenda')->order_by('agenda_tanggal', 'desc')->get()->result();
		// $data['agenda'] = $this->AdminModel->select('agenda');
		$this->load->view('admin/agenda', $data);
	}
    public function user()
	{
		$data['user'] = $this->AdminModel->select('user');
		$this->load->view('admin/user', $data);
	}
	public function order()
	{
		$data['order'] = $this->db->from('order')->order_by('customer_status')->order_by('tanggal_masuk', 'desc')->get()->result();
		// $data['order'] = $this->AdminModel->select('order');
		$this->load->view('admin/order', $data);
	}
	public function hapus($id)
    {
        if ($id == "") {
            redirect('Admin/home');
        } else {
            $this->db->where('customer_id', $id);
            $this->db->delete('order');
            redirect('admin/home');
        }
    }
	public function terbaca()
	{
        $data = array(
                'customer_status' => "terbaca",
            );

        $where = array(
            'customer_id' => $this->input->post('id'),
        );

        $this->AdminModel->update('order', $where, $data);
        redirect('Admin/home');
	}
	public function galleryWidget()
	{
		$kategori = $this->input->get('kategori');
        if ($kategori && !empty($kategori)) {
            $this->session->set_userdata('kategori', $kategori);
        } else {
            $kategori = $this->session->userdata('kategori');
        }


        $data['kategori'] = $kategori;


		$data['aaa'] = $this->AdminModel->list_gallery($kategori);
		$this->load->view('admin/gallery-widget', $data);
	}

	public function agendaData()
	{
		$data['agenda'] = $this->db->from('agenda')->order_by('agenda_tanggal', 'desc')->get()->result();
		// $data['agenda'] = $this->AdminModel->select('agenda');
		$this->load->view('admin/agenda', $data);
	}

	public function agendaTerjadwal()
	{
		$data['agenda'] = $this->db->from('agenda')->where('agenda_status = "terjadwal"')->order_by('agenda_tanggal', 'desc')->get()->result();
		// $data['agenda'] = $this->AdminModel->select('agenda');
		$this->load->view('admin/agenda/agendaTerjadwal', $data);
	}

	public function agendaTerlaksana()
	{
		$data['agenda'] = $this->db->from('agenda')->where('agenda_status = "sudah terlaksana"')->order_by('agenda_tanggal', 'desc')->get()->result();
		// $data['agenda'] = $this->AdminModel->select('agenda');
		$this->load->view('admin/agenda/agendaTerlaksana', $data);
	}

	public function visitor(){
		// $data['visit'] = $this->AdminModel->visitor();
		$ip    = $this->input->ip_address(); // Mendapatkan IP user
		$date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
		$waktu = time(); //
		$timeinsert = date("Y-m-d H:i:s");
		$pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='".$date."' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
		
		$dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row(); 
		
		$totalpengunjung = isset($dbpengunjung->hits)?($dbpengunjung->hits):0; // hitung total pengunjung
		
		$bataswaktu = time() - 300;
		
		$pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '".$bataswaktu."'")->num_rows(); // hitung pengunjung online
		
		
		$data['pengunjunghariini']=$pengunjunghariini;
		$data['totalpengunjung']=$totalpengunjung;
		$data['pengunjungonline']=$pengunjungonline;

		$data['visitor'] = $this->db->select()->from('visitor')->get()->result();
		$this->load->view('admin/visitor', $data);
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////


    public function agendaDetail($id)
	{
        $data['agenda'] = $this->AgendaModel->getAgenda($id);
        $data['agendaDetail'] = $this->AgendaModel->getAgendaDetail($id);
		// $data['agenda'] = $this->db->from('agenda')->order_by('agenda_tanggal', 'desc')->get()->result();
		// $data['agenda'] = $this->AdminModel->select('agenda');
		$this->load->view('admin/agenda/agendaDetail', $data);
	}
}