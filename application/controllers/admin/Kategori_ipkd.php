<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_ipkd extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_ipkd_model');
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

		$valid->set_rules('nama_kategori_ipkd','Nama kategori_ipkd','required|is_unique[kategori_ipkd.nama_kategori_ipkd]',
			array(	'required'		=> 'Nama kategori_ipkd harus diisi',
					'is_unique'		=> 'Nama kategori_ipkd sudah ada. Buat Nama kategori_ipkd baru!'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Kategori IPKD',
						'kategori_ipkd'	=> $this->kategori_ipkd_model->listing(),
						'isi'		=> 'admin/kategori_ipkd/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_kategori_ipkd'),'dash',TRUE);

			$data = array(	'nama_kategori_ipkd'	=> $i->post('nama_kategori_ipkd'),
							'slug_kategori_ipkd'	=> $slug,
							'urutan'		=> $i->post('urutan'),
						);
			$this->kategori_ipkd_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/kategori_ipkd'),'refresh');
		}
		// End proses masuk database
	}

	// Edit kategori_ipkd
	public function edit($id_kategori_ipkd)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori_ipkd','Nama kategori_ipkd','required',
			array(	'required'		=> 'Nama kategori_ipkd harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Kategori IPKD',
						'kategori_ipkd'	=> $this->kategori_ipkd_model->detail($id_kategori_ipkd),
						'isi'		=> 'admin/kategori_ipkd/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_kategori_ipkd'),'dash',TRUE);

			$data = array(	'id_kategori_ipkd'	=> $id_kategori_ipkd,
							'nama_kategori_ipkd'	=> $i->post('nama_kategori_ipkd'),
							'slug_kategori_ipkd'	=> $slug,
							'urutan'		=> $i->post('urutan'),
						);
			$this->kategori_ipkd_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/kategori_ipkd'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_kategori_ipkd) {
		// Proteksi proses delete harus login
		// Tambahkan proteksi halaman
$url_pengalihan = str_replace('index.php/', '', current_url());
$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
// Ambil check login dari simple_login
$this->simple_login->check_login($pengalihan);


		$data = array('id_kategori_ipkd'	=> $id_kategori_ipkd);
		$this->kategori_ipkd_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kategori_ipkd'),'refresh');
	}
}

/* End of file Kategori_ipkd.php */
/* Location: ./application/controllers/admin/Kategori_ipkd.php */