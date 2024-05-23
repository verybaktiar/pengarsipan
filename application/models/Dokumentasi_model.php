<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumentasi_model extends CI_Model
{
	function get_all_dokumentasi()
	{
		return $this->db->get('dokumentasi')->result();
	}
	public function tambahdokumentasi($data)
	{
		// Menyimpan data program ke dalam tabel 'program'
		$this->db->insert('dokumentasi', $data);
	}

	public function updatedokumentasi($id, $data)
	{
		// Mengupdate data program berdasarkan ID
		$this->db->where('id_dokumentasi', $id);
		$this->db->update('dokumentasi', $data);
	}

	public function hapusdokumentasi($id)
	{
		// Menghapus data program berdasarkan ID
		$this->db->where('id_dokumentasi', $id);
		$this->db->delete('dokumentasi');
	}

	public function getdokumentasi($id)
	{
		// Mengambil semua data program dari tabel 'program'
		$this->db->where('id_dokumentasi', $id);
		$query = $this->db->get('dokumentasi');
		return $query->row();
	}
}
