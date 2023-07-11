<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors','off');
class bidang extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('bidang_model');
	}

public function read($slug_bidang)	{
		$site 		= $this->konfigurasi_model->listing();
		$bidang 	= $this->bidang_model->read($slug_bidang);
	//	$listing 	= $this->bidang_model->listing_read();
		//$kategori 	= $this->nav_model->nav_bidang();

		//  End update hit

		$data = array(	'title'		=> $bidang->nama_bidang,
						'deskripsi'	=> $bidang->nama_bidang,
						'keywords'	=> $bidang->nama_bidang,
						'bidang'	=> $bidang,
					//	'listing'	=> $listing,
						//'kategori'	=> $kategori,
						'site'		=> $site,
						'isi'		=> 'bidang/read');
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}