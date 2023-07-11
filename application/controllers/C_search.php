
 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

  class C_search extends CI_Controller {

       function __construct()
       {
            parent::__construct();
            $this->load->helper(array('html','url','form'));
            $this->load->library('pagination');
            $this->load->model('m_searching');
			$this->load->model('berita_model');
			$this->load->model('kategori_model');
       }

       public function index()
       {
		   $site 		= $this->konfigurasi_model->listing();
		$populer	= $this->berita_model->populer();
            $dari      = $this->uri->segment('3');
            $sampai = 5;
            $like      = '';

            //hitung jumlah row
            $jumlah= $this->m_searching->jumlah();

            //inisialisasi array
            $config = array();

            //set base_url untuk setiap link page
            $config['base_url'] = base_url().'index.php/C_search/index/';

            //hitung jumlah row
           $config['total_rows'] = $jumlah;

           //mengatur total data yang tampil per page
           $config['per_page'] = $sampai;

           //mengatur jumlah nomor page yang tampil
           $config['num_links'] = $jumlah;

           //mengatur tag
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
			
           //inisialisasi array 'config' dan set ke pagination library
           $this->pagination->initialize($config);

           //inisialisasi array
            

            //ambil data buku dari database
           $berita = $this->m_searching->lihat($sampai, $dari, $like);

           //Membuat link
           $str_links = $this->pagination->create_links();
           $links = explode('&nbsp;',$str_links );
           $title = 'Data Berita';
		  $data = array(	
						'str_links'	=> $str_links,
						'links'		=> $links,
						'title'	=> $title,
						'berita'	=> $berita,
						'site'	=> $site,
						'populer'	=> $populer,
						'isi'		=> 'berita/cari');
		   $this->load->view('layout/wrapper', $data, FALSE);
      }

       public function cari()
       {
      $site 		= $this->konfigurasi_model->listing();
		$populer	= $this->berita_model->populer();
            //mengambil nilai keyword dari form pencarian
     $search = (trim($this->input->post('key',true)))? trim($this->input->post('key',true)) : '';

     //jika uri segmen 3 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 3
     $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

     //mengambil nilari segmen 4 sebagai offset
            $dari      = $this->uri->segment('4');

            //limit data yang ditampilkan
            $sampai = 5;

            //inisialisasi variabel $like
            $like      = '';

            //mengisi nilai variabel $like dengan variabel $search, digunakan sebagai kondisi untuk menampilkan data
            if($search) $like = "(judul_berita LIKE '%$search%')";

            //hitung jumlah row
            $jumlah= $this->m_searching->jumlah($like);

            //inisialisasi array
            $config = array();

            //set base_url untuk setiap link page
            $config['base_url'] = base_url().'index.php/C_search/cari/'.$search;

            //hitung jumlah row
           $config['total_rows'] = $jumlah;

           //mengatur total data yang tampil per page
           $config['per_page'] = $sampai;

           //mengatur jumlah nomor page yang tampil
           $config['num_links'] = $jumlah;

           //mengatur tag
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

           //inisialisasi array 'config' dan set ke pagination library
           $this->pagination->initialize($config);

           //inisialisasi array
          		   
		   
		   $berita = $this->m_searching->lihat($sampai, $dari, $like);

           //Membuat link
           $str_links = $this->pagination->create_links();
           $links = explode('&nbsp;',$str_links );
           $title = 'Data Berita';
		   $data = array(	
						'str_links'	=> $str_links,
						'links'		=> $links,
						'title'	=> $title,
						'berita'	=> $berita,
						'site'	=> $site,
						'populer'	=> $populer,
						'isi'		=> 'berita/cari');
		  $this->load->view('layout/wrapper', $data, FALSE);
      }  
 }