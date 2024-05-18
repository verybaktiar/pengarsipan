<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
	function get_all_jadwal()
	{
		return $this->db->get('jadwal')->result();
	}
	public function tambahJadwal($data)
	{
		// Menyimpan data jadwal ke dalam tabel 'jadwal'
		$this->db->insert('jadwal', $data);
	}

	public function updateJadwal($id, $data)
	{
		// Mengupdate data jadwal berdasarkan ID
		$this->db->where('id_jadwal', $id);
		$this->db->update('jadwal', $data);
	}

	public function hapusJadwal($id)
	{
		// Menghapus data jadwal berdasarkan ID
		$this->db->where('id_jadwal', $id);
		$this->db->delete('jadwal');
	}

	public function getJadwal($id)
	{
		// Mengambil semua data jadwal dari tabel 'jadwal'
		$this->db->where('id_jadwal', $id);
		$query = $this->db->get('jadwal');
		return $query->row();
	}
}
