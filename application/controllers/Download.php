<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Download extends CI_Controller {
	

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('download_model');
		$this->load->model('kategori_download_model');
	}

	// Main page
	public function index()	{
		$site 	= $this->konfigurasi_model->listing();
		$download 	= $this->download_model->download();
		// End paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'agenda/index/';
		$config['total_rows'] 		= $this->download_model->total_download();
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['full_tag_open'] 	= '<ul class="pagination">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '&laquo; Awal';
        $config['first_tag_open'] 	= '<li class="prev page">';
        $config['first_tag_close'] 	= '</li>';

        $config['last_link'] 		= 'Akhir &raquo;';
        $config['last_tag_open'] 	= '<li class="next page">';
        $config['last_tag_close'] 	= '</li>';

        $config['next_link'] 		= 'Selanjutnya &rarr;';
        $config['next_tag_open'] 	= '<li class="next page">';
        $config['next_tag_close'] 	= '</li>';

        $config['prev_link'] 		= '&larr; Sebelumnya';
        $config['prev_tag_open'] 	= '<li class="prev page">';
        $config['prev_tag_close'] 	= '</li>';

        $config['cur_tag_open'] 	= '<li class="active"><a href="">';
        $config['cur_tag_close'] 	= '</a></li>';

        $config['num_tag_open'] 	= '<li class="page">';
        $config['num_tag_close'] 	= '</li>';
		$config['per_page'] 		= 12;
		$config['first_url'] 		= base_url().'agenda/';
		
		$this->pagination->initialize($config); 
		
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$agenda = $this->download_model->get_download($config['per_page'], $page);

		$data = array(	'title'		=> 'Download - '.$site->namaweb,
						'deskripsi'	=> 'Download - '.$site->namaweb,
						'keywords'	=> 'Download - '.$site->namaweb,
						'download'	=> $download,
						'site'		=> $site,
						'isi'		=> 'download/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Kategori
	public function kategori($slug_kategori_download)	{
		$site 					= $this->konfigurasi_model->listing();
		$kategori_download 		= $this->kategori_download_model->read($slug_kategori_download);

		// if(count(array($kategori_download) < 1)) {
		// 	redirect(base_url('oops'),'refresh');
		// }

		$id_kategori_download	= $kategori_download->id_kategori_download;

		

		$download 				= $this->download_model->kategori($id_kategori_download);

		$data = array(	'title'				=> 'Kategori download: '.
												$kategori_download->nama_kategori_download,
						'deskripsi'			=> 'Kategori download: '.
												$kategori_download->nama_kategori_download,
						'keywords'			=> 'Kategori download: '.
												$kategori_download->nama_kategori_download,
						'download'			=> $download,
						'site'				=> $site,
						'kategori_download'	=> $kategori_download,
						'isi'		=> 'download/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Read download detail
	public function read($slug_download)	{
		$site 		= $this->konfigurasi_model->listing();
		$download 	= $this->download_model->read($slug_download);

		if(count(array($download)) < 1) {
			redirect(base_url('oops'),'refresh');
		}



		$listing 	= $this->download_model->listing_read();
		$kategori 	= $this->nav_model->nav_download();

		$data = array(	'title'		=> $download->judul_download,
						'deskripsi'	=> $download->judul_download,
						'keywords'	=> $download->judul_download,
						'download'	=> $download,
						'listing'	=> $listing,
						'kategori'	=> $kategori,
						'site'		=> $site,
						'isi'		=> 'download/read');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Unduh
	public function unduh($id_download) {
		$this->load->helper('download');
		$download = $this->download_model->detail($id_download);
		// Contents of photo.jpg will be automatically read
		force_download('./assets/upload/file/'.$download->gambar, NULL);

	}
}

/* End of file Download.php */
/* Location: ./application/controllers/Download.php */