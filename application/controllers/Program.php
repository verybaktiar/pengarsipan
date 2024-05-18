<?php

class program extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('program_model');
		$this->load->model('model_surat');
		$this->load->helper('form');
		$this->load->library('form_validation');
		  // Membuat folder uploads jika belum ada
		  $folderPath = './uploads';
		  if (!is_dir($folderPath)) {
			  mkdir($folderPath, 0777, true);
		  }
	}

	public function index()
	{
		$data['program'] = $this->program_model->get_all_program();

		if ($this->session->userdata('level') == 1) {
			$data['user'] = 'superadmin';
		} elseif ($this->session->userdata('level') == 2) {
			$data['user'] = 'admin';
		} elseif ($this->session->userdata('level') == 3) {
			$data['user'] = 'member';
		}

		$this->load->view('templates/header', $data);
		$this->load->view('program/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->form_validation->set_rules('program_kerja', 'program_kerja', 'required');
		$this->form_validation->set_rules('tujuan', 'tujuan', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('indikator', 'Indikator', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required');
		$this->form_validation->set_rules('sasaran', 'sasaran', 'required');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');

		if ($this->form_validation->run() === FALSE) {
			if ($this->session->userdata('level') == 1) {
				$data['user'] = 'superadmin';
			} elseif ($this->session->userdata('level') == 2) {
				$data['user'] = 'admin';
			}

			$this->load->view('templates/header', $data);
			$this->load->view('program/create', $data);
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'tanggal' => $this->input->post('tanggal'),
				'program_kerja' => $this->input->post('program_kerja'),
				'tujuan' => $this->input->post('tujuan'),
				'tanggal' => $this->input->post('tanggal'),
				'indikator' => $this->input->post('indikator'),
				'tempat' => $this->input->post('tempat'),
				'sasaran' => $this->input->post('sasaran'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab')
			);

			// Handle file upload
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = 2048; // 2MB
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('templates/header', $data);
				$this->load->view('program/create', $error);
				$this->load->view('templates/footer');
			} else {
				$file_data = $this->upload->data();
				$data['gambar'] = $file_data['file_name'];

				$this->program_model->tambahprogram($data);
				$this->session->set_flashdata('message', 'Data berhasil ditambah');
				redirect('program');
			}
		}
	}

	public function edit($id)
	{

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
			$this->form_validation->set_rules('program_kerja', 'program_kerja', 'required');
			$this->form_validation->set_rules('tujuan', 'tujuan', 'required');
			// $this->form_validation->set_rules('waktu', 'Waktu', 'required');
			$this->form_validation->set_rules('indikator', 'Indikator', 'required');
			$this->form_validation->set_rules('tempat', 'Tempat', 'required');
			$this->form_validation->set_rules('sasaran', 'sasaran', 'required');
			$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data['program'] = $this->program_model->getprogram($id);

				if ($this->session->userdata('level') == 1) {
					$data['user'] = 'superadmin';
				} elseif ($this->session->userdata('level') == 2) {
					$data['user'] = 'admin';
				}

				$this->load->view('templates/header', $data);
				$this->load->view('program/edit', $data);
				$this->load->view('templates/footer');
			} else {
				$data = array(
					'tanggal' => $this->input->post('tanggal'),
					'program_kerja' => $this->input->post('program_kerja'),
					'tujuan' => $this->input->post('tujuan'),
					'indikator' => $this->input->post('indikator'),
					// 'waktu' => $this->input->post('waktu'),
					'tempat' => $this->input->post('tempat'),
					'sasaran' => $this->input->post('sasaran'),
					'penanggung_jawab' => $this->input->post('penanggung_jawab')
				);

				$this->program_model->updateprogram($id, $data);
				$this->session->set_flashdata('message', 'data berhasil diubah');
				redirect('program');
			}
		}

		public function delete($id)
		{
			$this->program_model->hapusprogram($id);

			$this->session->set_flashdata('message', 'data berhasil dihapus');
			redirect('program');
		}
	}

