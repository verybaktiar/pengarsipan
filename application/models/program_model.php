<?php
defined('BASEPATH') or exit('No direct script access allowed');

class program_model extends CI_Model
{
	function get_all_program()
	{
		return $this->db->get('program')->result();
	}
	public function tambahprogram($data)
	{
		// Menyimpan data program ke dalam tabel 'program'
		$this->db->insert('program', $data);
	}

	public function updateprogram($id, $data)
	{
		// Mengupdate data program berdasarkan ID
		$this->db->where('id_program', $id);
		$this->db->update('program', $data);
	}

	public function hapusprogram($id)
	{
		// Menghapus data program berdasarkan ID
		$this->db->where('id_program', $id);
		$this->db->delete('program');
	}

	public function getprogram($id)
	{
		// Mengambil semua data program dari tabel 'program'
		$this->db->where('id_program', $id);
		$query = $this->db->get('program');
		return $query->row();
	}
}
