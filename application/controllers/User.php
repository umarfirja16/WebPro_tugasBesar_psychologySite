<?php
class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	public function index()
	{

		$data['judul'] = 'Daftar User';
		$data[''] = $this->Psikolog_model->getAllUser();
		if ($this->input->post('keyword')) {
			$data['user'] = $this->User_model->cariDataUser();
		}
		//$this->load->view('templates/header', $data);
		$this->load->view('user/index', $data);
		//$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data User';

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('umur','Umur','required');
		$this->form_validation->set_rules('kontak','Kontak','required');
		$this->form_validation->set_rules('email','Email','required');

		if($this->form_validation->run() == false){
			//$this->load->view('templates/header', $data);
			$this->load->view('user/tambah');
			// $this->load->view('templates/footer');
		}
		else{
			$cek = $this->User_model->tambahDataUser();
			$this->session->set_flashdata('flash', 'User Berhasil Ditambah');
			redirect('user/index','refresh');
		}
	}

	public function hapus($id)
	{
		$cek = $this->Psikolog_model->hapusDataPsikolog($id);
		$this->session->set_flashdata('flash', 'Psikolog Berhasil Ditambah');
		redirect('psikolog/index','refresh');
	}

	public function ubah($id)
	{
		$data['judul'] = 'Form Ubah Data User';
		$data['user'] = $this->User_model->getUserById($id);

		$this->form_validation->set_rules('check_nama','check_umur','check_kontak','check_email','required');

		if($this->form_validation->run() == false){
			//$this->load->view('templates/header', $data);
			$this->load->view('user/ubah',$data);
			//$this->load->view('templates/footer');
		}
		else{
			$cek = $this->User_model->ubahDataUser($id);
			$this->session->set_flashdata('flash', 'User Berhasil Diupdate');
			redirect('user/index','refresh');
		}
	}
}
