<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Staff_model');
	}

	// Main page
	public function index()	{
		$site 	= $this->konfigurasi_model->listing();
		$staff 	= $this->Staff_model->home();
        $staff2 	= $this->Staff_model->home2();
		$staff3 	= $this->Staff_model->home3();
		// End paginasi

		$data = array(	'title'		=> 'Struktur Orgarnisasi - '.$site->namaweb,
						'deskripsi'	=> 'Struktur Orgarnisasi - '.$site->namaweb,
						'keywords'	=> 'Struktur Orgarnisasi - '.$site->namaweb,
						'staff'	=> $staff,
                        'staff2'	=> $staff2,
						'staff3'	=> $staff3,
						'site'		=> $site,
						'isi'		=> 'home/staff');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	
}
