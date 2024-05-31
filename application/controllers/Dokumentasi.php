<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumentasi extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('program_model');
		$this->load->model('model_surat');
		$this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->model('Dokumentasi_model'); // Memuat model dengan benar
		  // Membuat folder uploads jika belum ada
		  $folderPath = './uploads';
		  if (!is_dir($folderPath)) {
			  mkdir($folderPath, 0777, true);
		  }
	}

	public function index()
	{
        $data['dokumentasi'] = $this->Dokumentasi_model->get_all_dokumentasi();

		if ($this->session->userdata('level') == 1) {
			$data['user'] = 'superadmin';
		} elseif ($this->session->userdata('level') == 2) {
			$data['user'] = 'admin';
		} elseif ($this->session->userdata('level') == 3) {
			$data['user'] = 'member';
		}

		$this->load->view('templates/header', $data);
		$this->load->view('dokumentasi/index', $data);
		$this->load->view('templates/footer');
	}
    public function create()
	{
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
		$this->form_validation->set_rules('tanggal_kegiatan', 'Tanggal Kegiatan', 'required');
		$this->form_validation->set_rules('deskripsi_kegiatan', 'Deskripsi Kegiatan', 'required');

		if ($this->form_validation->run() == FALSE) {
			if ($this->session->userdata('level') == 1) {
				$data['user'] = 'superadmin';
			} elseif ($this->session->userdata('level') == 2) {
				$data['user'] = 'admin';
			}

			$this->load->view('templates/header', $data);
			$this->load->view('dokumentasi/create', $data);
			$this->load->view('templates/footer');
		} else {
			// Upload gambar
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|jpeg|png|pdf';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$gambar = $this->upload->data('file_name');
			} else {
				$gambar = '';
			}

			// Upload PDF
			if ($this->upload->do_upload('pdf')) {
				$pdf = $this->upload->data('file_name');
			} else {
				$pdf = '';
			}

			// Simpan data ke database
			$data = [
				'nama_kegiatan' => $this->input->post('nama_kegiatan'),
				'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'),
				'deskripsi_kegiatan' => $this->input->post('deskripsi_kegiatan'),
				'gambar' => $gambar,
				'pdf' => $pdf
			];

			$this->Dokumentasi_model->tambahdokumentasi($data);
			$this->session->set_flashdata('message', 'Data berhasil ditambah');
			redirect('dokumentasi');
		}
	}

	public function edit($id)
	{

		$this->form_validation->set_rules('nama_kegiatan', 'nama_kegiatan', 'required');
			$this->form_validation->set_rules('tanggal_kegiatan', 'tanggal_kegiatan', 'required');
			$this->form_validation->set_rules('deskripsi_kegiatan', 'deskripsi_kegiatan', 'required');
			

			if ($this->form_validation->run() === FALSE) {
				$data['dokumentasi'] = $this->Dokumentasi_model->getdokumentasi($id);

				if ($this->session->userdata('level') == 1) {
					$data['user'] = 'superadmin';
				} elseif ($this->session->userdata('level') == 2) {
					$data['user'] = 'admin';
				}

				$this->load->view('templates/header', $data);
				$this->load->view('dokumentasi/edit', $data);
				$this->load->view('templates/footer');
			} else {
				$data = array(
					'nama_kegiatan' => $this->input->post('nama_kegiatan'),
					'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'),
					'deskripsi_kegiatan' => $this->input->post('deskripsi_kegiatan'),
				
				);
				 // Handle file upload
				 if (!empty($_FILES['gambar_kegiatan']['name'])) {
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['max_size'] = 2048; // 2MB
					$this->load->library('upload', $config);
		
					if ($this->upload->do_upload('gambar')) {
						// Get data about the file
						$file_data = $this->upload->data();
						$data['gambar'] = $file_data['file_name'];
		
						// Optionally delete the old file
						$old_image = $this->Dokumentasi_model->getdokumentasi($id)->gambar;
						if (file_exists('./uploads/' . $old_image)) {
							unlink('./uploads/' . $old_image);
						}
					} else {
						$error = array('error' => $this->upload->display_errors());
						$this->load->view('templates/header', $data);
						$this->load->view('dokumentasi/edit', $error);
						$this->load->view('templates/footer');
						return;
					}
				}

				$this->Dokumentasi_model->updatedokumentasi($id, $data);
				$this->session->set_flashdata('message', 'data berhasil diubah');
				redirect('dokumentasi');
			}
		}

		public function delete($id)
		{
			$this->Dokumentasi_model->hapusdokumentasi($id);

			$this->session->set_flashdata('message', 'data berhasil dihapus');
			redirect('dokumentasi');
		}
	}




