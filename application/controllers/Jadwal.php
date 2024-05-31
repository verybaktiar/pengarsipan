<?php

class Jadwal extends CI_Controller
{
	private $waApiKey = "rd7jRzw@TC3gJL-g_Yc7";
	private $waTarget = "120363297283780421@g.us";
	private $waGroup = "120363297654090794@g.us";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('jadwal_model');
		$this->load->model('model_surat');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Jadwal Kerja';
		$data['jadwal'] = $this->jadwal_model->get_all_jadwal();

		if ($this->session->userdata('level') == 1) {
			$data['user'] = 'superadmin';
		} elseif ($this->session->userdata('level') == 2) {
			$data['user'] = 'admin';
		} elseif ($this->session->userdata('level') == 3) {
			$data['user'] = 'member';
		}

		$this->load->view('templates/header', $data);
		$this->load->view('jadwal/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required');
		$this->form_validation->set_rules('sasaran', 'Sasaran', 'required');
		$this->form_validation->set_rules('waktu', 'Waktu', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');
		$this->form_validation->set_rules('no_hp', 'No Hp', 'required');

		if ($this->form_validation->run() === FALSE) {

			if ($this->session->userdata('level') == 1) {
				$data['user'] = 'superadmin';
			} elseif ($this->session->userdata('level') == 2) {
				$data['user'] = 'admin';
			} elseif ($this->session->userdata('level') == 3) {
				$data['user'] = 'member';
			}

			$this->load->view('templates/header', $data);
			$this->load->view('jadwal/create', $data);
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'tanggal' => $this->input->post('tanggal'),
				'kegiatan' => $this->input->post('kegiatan'),
				'tempat' => $this->input->post('tempat'),
				'sasaran' => $this->input->post('sasaran'),
				'waktu' => $this->input->post('waktu'),
				'keterangan' => $this->input->post('keterangan'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab'),
				'no_hp' => $this->input->post('no_hp')
			);

			$this->jadwal_model->tambahJadwal($data);

			date_default_timezone_set('Asia/Jakarta');
			$tanggal_input = $this->input->post('tanggal');
			$tanggal_bersih = date('Y-m-d', strtotime($tanggal_input));
			$tiga_hari_sebelum = strtotime("-3 days", strtotime($tanggal_bersih));

			// Mengirim ke grup WhatsApp
			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://api.fonnte.com/send',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array(
					'target' => $this->waGroup,
					'schedule' => $tiga_hari_sebelum,
					'message' => "Assalamualaikum Wr.Wb. ". "\n" . "\n" .

					"Sehubungan dengan akan dimulainya kegiatan sosialisasi /penyuluhan, maka disampaikan kepada seluruh anggota kader BKR agar mempersiapkan diri." . "\n" . "\n" .
					
					"[Tanggal] :" . date('d M Y', strtotime($tanggal_input)) . "\n" .
					"[Waktu] : " . $data['waktu'] . "\n" .
					"[Kegiatan] : " . $data['kegiatan'] . "\n" .
					"[Tempat] : " . $data['tempat'] . "\n" .
					"[Sasaran] : " . $data['sasaran'] . "\n" .
					"[Keterangan] : " . $data['keterangan'] . "\n" .
					"[Penanggung Jawab] : " . $data['penanggung_jawab'] ."\n" . "\n" .

					"Demikian pengumuman ini disampaikan untuk jadwal lebih lengkap mohon di check di website. Terima Kasih!" . "\n" . "\n" .
					
					"Ttd.Ketua BKR",
				),
				CURLOPT_HTTPHEADER => array(
					"Authorization: " . $this->waApiKey
				),
			));

			$response = curl_exec($curl);
			if (curl_errno($curl)) {
				$error_msg = curl_error($curl);
			}
			curl_close($curl);

			// Mengirim ke nomor personal
			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://api.fonnte.com/send',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array(
					'target' => $data['no_hp'],
					'schedule' => $tiga_hari_sebelum,
					'message' => "Assalamualaikum Wr.Wb. ". "\n" . "\n" .

					"Sehubungan dengan akan dimulainya kegiatan sosialisasi /penyuluhan, maka disampaikan kepada seluruh anggota kader BKR agar mempersiapkan diri." . "\n" . "\n" .
					
					"[Tanggal] :" . date('d M Y', strtotime($tanggal_input)) . "\n" .
					"[Waktu] : " . $data['waktu'] . "\n" .
					"[Kegiatan] : " . $data['kegiatan'] . "\n" .
					"[Tempat] : " . $data['tempat'] . "\n" .
					"[Sasaran] : " . $data['sasaran'] . "\n" .
					"[Keterangan] : " . $data['keterangan'] . "\n" .
					"[Penanggung Jawab] : " . $data['penanggung_jawab'] ."\n" . "\n" .

					"Demikian pengumuman ini disampaikan untuk jadwal lebih lengkap mohon di check di website. Terima Kasih!" . "\n" . "\n" .
					
					"Ttd.Ketua BKR",
				),
				CURLOPT_HTTPHEADER => array(
					"Authorization: " . $this->waApiKey
				),
			));

			$response = curl_exec($curl);
			if (curl_errno($curl)) {
				$error_msg = curl_error($curl);
			}
			curl_close($curl);

			$this->session->set_flashdata('message', 'data berhasil ditambah');
			redirect('jadwal');
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required');
		$this->form_validation->set_rules('sasaran', 'Sasaran', 'required');
		$this->form_validation->set_rules('waktu', 'Waktu', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');


		if ($this->form_validation->run() === FALSE) {
			$data['jadwal'] = $this->jadwal_model->getJadwal($id);

			if ($this->session->userdata('level') == 1) {
				$data['user'] = 'superadmin';
			} elseif ($this->session->userdata('level') == 2) {
				$data['user'] = 'admin';
			} elseif ($this->session->userdata('level') == 3) {
				$data['user'] = 'member';
			}

			$this->load->view('templates/header', $data);
			$this->load->view('jadwal/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'tanggal' => $this->input->post('tanggal'),
				'kegiatan' => $this->input->post('kegiatan'),
				'tempat' => $this->input->post('tempat'),
				'sasaran' => $this->input->post('sasaran'),
				'waktu' => $this->input->post('waktu'),
				'keterangan' => $this->input->post('keterangan'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab')
			);

			$this->jadwal_model->updateJadwal($id, $data);
			date_default_timezone_set('Asia/Jakarta');
			$tanggal_input = $this->input->post('tanggal');
			$tanggal_bersih = date('Y-m-d', strtotime($tanggal_input));
			$tiga_hari_sebelum = strtotime("-3 days", strtotime($tanggal_bersih));

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://api.fonnte.com/send',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array(
					'target' => $this->waGroup,
					'schedule' => $tiga_hari_sebelum,
					'message' =>
					"PERUBAHAN JADWAL" . "\n" . "\n" .

						"Diberitahukan kepada seluruh anggota kader BKR bahwa terjadi perubahan jadwal kegiatan sosialisasi/penyuluhan." . "\n" . "\n" .


						"[Tanggal] :" . date('d M Y', strtotime($tanggal_input)) . "\n" .
						"[Waktu] : " . $data['waktu'] . "\n" .
						"[Kegiatan] : " . $data['kegiatan'] . "\n" .
						"[Tempat] : " . $data['tempat'] . "\n" .
						"[Sasaran] : " . $data['sasaran'] . "\n" .
						"[Keterangan] : " . $data['keterangan'] . "\n" .
						"[Penanggung Jawab] : " . $data['penanggung_jawab'] . "\n" . "\n" .

						"Demikian pengumuman ini disampaikan untuk perubahan jadwal. Mohon maaf atas perubahan/kesalahan penulisan sebelumnya. Terima Kasih!" . "\n" . "\n" .

						"Ttd.Ketua BKR",
				),
				CURLOPT_HTTPHEADER => array(
					"Authorization: " . $this->waApiKey
				),
			));

			$response = curl_exec($curl);
			if (curl_errno($curl)) {
				$error_msg = curl_error($curl);
			}
			curl_close($curl);
			$this->session->set_flashdata('message', 'data berhasil diubah');
			redirect('jadwal');
		}
	}

	public function delete($id)
	{
		$this->jadwal_model->hapusJadwal($id);

		$this->session->set_flashdata('message', 'data berhasil dihapus');
		redirect('jadwal');
	}
}
