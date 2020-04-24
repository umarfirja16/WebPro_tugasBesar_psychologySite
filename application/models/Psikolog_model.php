<?php
class Psikolog_model extends CI_model
{

	public function getAllPsikolog()
	{
		return $this->db->get('psikolog')->result_array();
	}

	public function tambahDataPsikolog()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"umur" => $this->input->post('umur', true),
			"kontak" => $this->input->post('kontak', true),
			"email" => $this->input->post('email', true),
		];
		return $this->db->insert('psikolog', $data);
	}

	public function hapusDataPsikolog($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('psikolog');
	}

	public function getPsikologById($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('psikolog')->row_array();
	}

	public function ubahDataPsikolog()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"umur" => $this->input->post('umur', true),
			"kontak" => $this->input->post('kontak', true),
			"email" => $this->input->post('email', true),
		];
		$this->db->where('id', $id);
		return $this->db->update('psikolog', $data);
	}

	public function cariDataPsikolog()
	{
		$keyword = $this->input->post('keyword', true);
		$where = "nama='$keyword' OR umur='$keyword' OR kontak='$keyword' OR email='$keyword'";
		$this->db->where($where);
		return $this->db->get('psikolog')->result_array();
	}
}
