<?php
class Psikolog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Psikolog_model');
		$this->load->library('form_validation');
	}

	public function index()
	{

		$data['judul'] = 'Daftar Psikolog';
		$data['psikolog'] = $this->Psikolog_model->getAllPsikolog();
		if ($this->input->post('keyword')) {
			$data['psikolog'] = $this->Psikolog_model->cariDataPsikolog();
		}
		//$this->load->view('templates/header', $data);
		$this->load->view('psikolog/index', $data);
		//$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data Psikolog';

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('umur','Umur','required');
		$this->form_validation->set_rules('kontak','Kontak','required');
		$this->form_validation->set_rules('email','Email','required');

		if($this->form_validation->run() == false){
			//$this->load->view('templates/header', $data);
			$this->load->view('psikolog/tambah');
			// $this->load->view('templates/footer');
		}
		else{
			$cek = $this->Psikolog_model->tambahDataPsikolog();
			$this->session->set_flashdata('flash', 'Psikolog Berhasil Ditambah');
			redirect('psikolog/index','refresh');
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
		$data['judul'] = 'Form Ubah Data Psikolog';
		$data['psikolog'] = $this->Psikolog_model->getPsikologById($id);

		$this->form_validation->set_rules('check_nama','check_umur','check_kontak','check_email','required');

		if($this->form_validation->run() == false){
			//$this->load->view('templates/header', $data);
			$this->load->view('psikolog/ubah',$data);
			//$this->load->view('templates/footer');
		}
		else{
			$cek = $this->Psikolog_model->ubahDataPsikolog($id);
			$this->session->set_flashdata('flash', 'Psikolog Berhasil Diupdate');
			redirect('psikolog/index','refresh');
		}
	}
}
