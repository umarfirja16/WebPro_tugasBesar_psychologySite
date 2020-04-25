<?php

class Psikolog_model extends CI_model {
	public function getAllPsikolog()
	{
		return $this->db->get('psikolog')->result_array();
	}

	public function tambahDataPsikolog()
	{
		$data = [
			"nama_psikolog" => $this->input->post('nama', true),
			"alamat_psikolog" => $this->input->post('alamat', true),
			"email_psikolog" => $this->input->post('email', true),
		];

		$this->db->insert('psikolog', $data);
	}

	public function hapusDataPsikolog($id_psikolog)
	{
		$this->db->where('id_psikolog', $id_psikolog);
		$this->db->delete('psikolog');
	}

	public function getPsikologById($id_psikolog)
	{
		return $this->db->get_where('psikolog', ['id_psikolog' => $id_psikolog])->row_array();		
	}

	public function ubahDataPsikolog()
	{
		$data = [
			"nama_psikolog" => $this->input->post('nama', true),
			"alamat_psikolog" => $this->input->post('alamat', true),
			"email_psikolog" => $this->input->post('email', true),
		];

		$this->db->where('id_psikolog', $this->input->post('id_psikolog'));
		$this->db->update('psikolog', $data);
	} 

	public function cariDataPsikolog()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama_psikolog', $keyword);
		$this->db->or_like('alamat_psikolog', $keyword);
		$this->db->or_like('email_psikolog', $keyword);
		return $this->db->get('psikolog')->result_array();
	}

}