<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('bidang_model');
		$this->log_user->add_log();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
		if($this->session->userdata('akses_level')=="Bidang") { 
			redirect('admin/dasbor/');
		   } 
	}

	// Halaman utama
	public function index()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_bidang','Nama Bidang','required|is_unique[bidang.nama_bidang]',
			array(	'required'		=> 'Nama Bidang harus diisi',
					'is_unique'		=> 'Nama Bidang sudah ada. Buat Nama Bidang baru!'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Bidang/Profil',
						'bidang'	=> $this->bidang_model->listing(),
						'isi'		=> 'admin/bidang/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_bidang'),'dash',TRUE);

			$data = array(	'id_user'		=> $this->session->userdata('id_user'),
							'nama_bidang'	=> $i->post('nama_bidang'),
                            'slug_bidang'	=> $slug,
							'isi'	=> $i->post('isi'),
							'urutan'		=> $i->post('urutan'),
						);
			$this->bidang_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/bidang'),'refresh');
		}
		// End proses masuk database
	}

	// Edit bidang
	public function edit($id_bidang)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_bidang','Nama Bidang','required',
			array(	'required'		=> 'Nama Bidang harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit bidang/Profil',
						'bidang'	=> $this->bidang_model->detail($id_bidang),
						'isi'		=> 'admin/bidang/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_bidang'),'dash',TRUE);

			$data = array(	'id_bidang'	=> $id_bidang,
							'id_user'		=> $this->session->userdata('id_user'),
							'nama_bidang'	=> $i->post('nama_bidang'),
                            'slug_bidang'	=> $slug,
							'isi'	=> $i->post('isi'),
							'urutan'		=> $i->post('urutan'),
						);
			$this->bidang_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/bidang'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_bidang) {
		// Proteksi proses delete harus login
		// Tambahkan proteksi halaman
$url_pengalihan = str_replace('index.php/', '', current_url());
$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
// Ambil check login dari simple_login
$this->simple_login->check_login($pengalihan);


		$data = array('id_bidang'	=> $id_bidang);
		$this->bidang_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/bidang'),'refresh');
	}
}

/* End of file bidang.php */
/* Location: ./application/controllers/admin/bidang.php */