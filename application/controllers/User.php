<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('AdminModel');
		$this->load->model('AgendaModel');
		$this->load->model('SearchModel');
	}

	public function home() {
		$ip    = $this->input->ip_address(); // Mendapatkan IP user
		$date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
		$waktu = time(); //
		$timeinsert = date("Y-m-d H:i:s");
		
		// Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
		$s = $this->db->query("SELECT * FROM visitor WHERE ip='".$ip."' AND date='".$date."'")->num_rows();
		$ss = isset($s)?($s):0;
		
		
		// Kalau belum ada, simpan data user tersebut ke database
		if($ss == 0){
		$this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('".$ip."','".$date."','1','".$waktu."','".$timeinsert."')");
		}
		
		// Jika sudah ada, update
		else{
		$this->db->query("UPDATE visitor SET hits=hits+1, online='".$waktu."' WHERE ip='".$ip."' AND date='".$date."'");
		}
		
		
		$pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='".$date."' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
		
		$dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row(); 
		
		$totalpengunjung = isset($dbpengunjung->hits)?($dbpengunjung->hits):0; // hitung total pengunjung
		
		$bataswaktu = time() - 300;
		
		$pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '".$bataswaktu."'")->num_rows(); // hitung pengunjung online
		
		
		$data['pengunjunghariini']=$pengunjunghariini;
		$data['totalpengunjung']=$totalpengunjung;
		$data['pengunjungonline']=$pengunjungonline;



		// $data['asd']=$this->UserModel->terlaksana();
		$data['news']=$this->UserModel->getNews();
		$data['asd']=$this->db->from('agenda')->where('agenda_status = "sudah terlaksana"')->order_by('agenda_tanggal', 'desc')->limit('8')->get()->result();
		$data['sch']=$this->db->from('agenda')->where('agenda_status = "terjadwal"')->order_by('agenda_tanggal', 'desc')->limit('8')->get()->result();
		$data['gallery']=$this->db->get('gallery')->result();
		$this->load->view('user/homepage', $data);
	}

	public function profile() {
		$this->load->view('user/profile');
	}

    public function agenda() {
		$data['model'] = $this->AgendaModel->paginationAgenda();
		$data['news']=$this->UserModel->getNews();
		$data['asd']=$this->UserModel->terlaksana();
		$data['sch']=$this->UserModel->terjadwal();
		$data['aaa']=$this->db->from('agenda')->where('agenda_status = "terjadwal"')->order_by('agenda_tanggal', 'desc')->limit('5')->get()->result();
		$data['agenda']=$this->db->get('agenda')->result();
		$data['gallery']=$this->db->from('gallery')->order_by('gallery_id', 'desc')->limit('5')->get()->result();
        $this->load->view('user/agenda', $data);
    }

	public function gallery() {
		$kategori = $this->input->get('kategori');
        if ($kategori && !empty($kategori)) {
            $this->session->set_userdata('kategori', $kategori);
        } else {
            $kategori = $this->session->userdata('kategori');
        }


        $data['kategori'] = $kategori;


		$data['aaa'] = $this->UserModel->coba($kategori);
		$this->load->view('user/gallery', $data);
	}

	public function contact() {
		$this->load->view('user/contact');
	}

	public function detailAgenda($id) {
		$data['terjadwal']=$this->UserModel->getTerjadwal($id);
		$data['terlaksana']=$this->UserModel->getTerlaksana($id);
		$data['relate']=$this->UserModel->getTerlaksana($id);
		$data['agenda']=$this->UserModel->getAgenda($id);
		$this->load->view('user/detail-Agenda', $data);
	}

	public function orderCustomer() {
		$data=array('customer_nama'=> $this->input->post('nama'),
			'customer_email'=> $this->input->post('email'),
			'customer_phone'=> $this->input->post('phone'),
			'customer_subject'=> $this->input->post('subject'),
			'customer_order'=> $this->input->post('pesan'),
			'customer_status'=> "baru",
		);

		$this->session->set_flashdata('sucess', 'Terimakasih Telah Mengisi Form');
		$this->AdminModel->insert('order', $data);
		redirect('user/contact');
	}

    public function search()
    {
		$data['model'] = $this->AgendaModel->paginationAgenda();
		$data['news']=$this->UserModel->getNews();
		$data['asd']=$this->UserModel->terlaksana();
		$data['sch']=$this->UserModel->terjadwal();
		$data['agenda']=$this->db->get('agenda')->result();
		$data['gallery']=$this->db->from('gallery')->order_by('gallery_id', 'desc')->limit('5')->get()->result();

        $get = $this->input->get('search');
        if (isset($get)) {
            $query = $get;
            $data["datasearch"] = $this->SearchModel->SearchAll($query);
        }

		$data['search'] = $get;
        $this->load->view('user/search.php', $data);
    }
}
