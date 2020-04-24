<?php
class User_model extends CI_model
{

	public function getAllUser()
	{
		return $this->db->get('user')->result_array();
	}

	public function tambahDataUser()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"umur" => $this->input->post('umur', true),
			"kontak" => $this->input->post('kontak', true),
			"email" => $this->input->post('email', true),
		];
		return $this->db->insert('user', $data);
	}

	public function hapusDataUser($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('user');
	}

	public function getUserById($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('user')->row_array();
	}

	public function ubahDataUser()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"umur" => $this->input->post('umur', true),
			"kontak" => $this->input->post('kontak', true),
			"email" => $this->input->post('email', true),
		];
		$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}

	public function cariDataUser()
	{
		$keyword = $this->input->post('keyword', true);
		$where = "nama='$keyword' OR umur='$keyword' OR kontak='$keyword' OR email='$keyword'";
		$this->db->where($where);
		return $this->db->get('user')->result_array();
	}
}
