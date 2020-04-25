<?php

class Psikolog extends CI_Controller{
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
		if($this->input->post('keyword')){
			$data['psikolog'] = $this->Psikolog_model->cariDataPsikolog();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('psikolog/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data Psikolog';

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		

		if($this->form_validation->run() == FALSE){	
			$this->load->view('templates/header', $data);
			$this->load->view('psikolog/tambah');
			$this->load->view('templates/footer');	
		} else {
			$this->Psikolog_model->tambahDataPsikolog();
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('psikolog');
		}
	}

	public function hapus($id_psikolog)
	{
		$this->Psikolog_model->hapusDataPsikolog($id_psikolog);
		$this->session->set_flashdata('flash','Dihapus');
		redirect('psikolog');
	}

	public function detail($id_psikolog)
	{
		$data['judul'] = 'Detail Data Psikolog';
		$data['psikolog'] = $this->Psikolog_model->getPsikologById($id_psikolog);
		$this->load->view('templates/header', $data);
		$this->load->view('psikolog/detail', $data);
		$this->load->view('templates/footer');
			
	}

	public function ubah($id_psikolog)
	{
		$data['judul'] = 'Form Ubah Data Psikolog';
		$data['psikolog'] = $this->Psikolog_model->getPsikologById($id_psikolog);

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		

		if($this->form_validation->run() == FALSE){	
			$this->load->view('templates/header', $data);
			$this->load->view('psikolog/ubah', $data);
			$this->load->view('templates/footer');	
		} else {
			$this->Psikolog_model->ubahDataPsikolog();
			$this->session->set_flashdata('flash','Diubah');
			redirect('psikolog');
		}
	}
	
}