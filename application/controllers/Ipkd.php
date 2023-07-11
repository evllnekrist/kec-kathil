<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipkd extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ipkd_model');
		$this->load->model('kategori_ipkd_model');
	}

	// Main page
	public function index()	{
		$site 	= $this->konfigurasi_model->listing();
		$ipkd 	= $this->ipkd_model->ipkd();
		// End paginasi

		$data = array(	'title'		=> 'IPKD - '.$site->namaweb,
						'deskripsi'	=> 'IPKD - '.$site->namaweb,
						'keywords'	=> 'IPKD - '.$site->namaweb,
						'ipkd'	=> $ipkd,
						'site'		=> $site,
						'isi'		=> 'ipkd/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Kategori
	public function kategori($slug_kategori_ipkd)	{
		$site 					= $this->konfigurasi_model->listing();
		$kategori_ipkd 		= $this->kategori_ipkd_model->read($slug_kategori_ipkd);

		// if(count(array($kategori_ipkd) < 1)) {
		// 	redirect(base_url('oops'),'refresh');
		// }

		$id_kategori_ipkd	= $kategori_ipkd->id_kategori_ipkd;

		

		$ipkd 				= $this->ipkd_model->kategori($id_kategori_ipkd);

		$data = array(	'title'				=> 'Kategori ipkd: '.
												$kategori_ipkd->nama_kategori_ipkd,
						'deskripsi'			=> 'Kategori ipkd: '.
												$kategori_ipkd->nama_kategori_ipkd,
						'keywords'			=> 'Kategori ipkd: '.
												$kategori_ipkd->nama_kategori_ipkd,
						'ipkd'			=> $ipkd,
						'site'				=> $site,
						'kategori_ipkd'	=> $kategori_ipkd,
						'isi'		=> 'ipkd/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Read ipkd detail
	public function read($slug_ipkd)	{
		$site 		= $this->konfigurasi_model->listing();
		$ipkd 	= $this->ipkd_model->read($slug_ipkd);

		if(count(array($ipkd)) < 1) {
			redirect(base_url('oops'),'refresh');
		}



		$listing 	= $this->ipkd_model->listing_read();
		$kategori 	= $this->nav_model->nav_ipkd();

		$data = array(	'title'		=> $ipkd->judul_ipkd,
						'deskripsi'	=> $ipkd->judul_ipkd,
						'keywords'	=> $ipkd->judul_ipkd,
						'ipkd'	=> $ipkd,
						'listing'	=> $listing,
						'kategori'	=> $kategori,
						'site'		=> $site,
						'isi'		=> 'ipkd/read');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Unduh
	public function unduh($id_ipkd) {
		$this->load->helper('download');
		$ipkd = $this->ipkd_model->detail($id_ipkd);
		// Contents of photo.jpg will be automatically read
		force_ipkd('./assets/upload/file/'.$ipkd->gambar, NULL);

	}
}

/* End of file ipkd.php */
/* Location: ./application/controllers/ipkd.php */