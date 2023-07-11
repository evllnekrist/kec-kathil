 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipkd extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ipkd_model');
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

	// Halaman ipkd
	public function index()	{
		$ipkd = $this->ipkd_model->listing();
		$data = array(	'title'			=> 'IPKD',
						'ipkd'		=> $ipkd,
						'isi'			=> 'admin/ipkd/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Proses
	public function proses()
	{
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if(isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_ipkdnya		= $inp->post('id_ipkd');

   			for($i=0; $i < sizeof($id_ipkdnya);$i++) {
   				$ipkd 	= $this->ipkd_model->detail($id_ipkdnya[$i]);
   				if($ipkd->gambar !='') {
					unlink('./assets/upload/file/'.$ipkd->gambar);
				}
				$data = array(	'id_ipkd'	=> $id_ipkdnya[$i]);
   				$this->ipkd_model->delete($data);
   			}

   			$this->session->set_flashdata('sukses', 'Data telah dihapus');
   			redirect(base_url('admin/ipkd'),'refresh');
   		// PROSES SETTING DRAFT
   		}
   	}

	// ipkd file
	public function unduh($id_ipkd) {
		$ipkd = $this->ipkd_model->detail($id_ipkd);
		// Contents of photo.jpg will be automatically read
		$data = './assets/upload/file/'.$ipkd->gambar;
		force_ipkd($data, NULL);
	}

	// Tambah ipkd
	public function tambah()	{
		$kategori_ipkd = $this->kategori_ipkd_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_ipkd','Judul','required',
			array(	'required'	=> 'Judul harus diisi'));

		$valid->set_rules('isi','Isi','required',
			array(	'required'	=> 'Isi ipkd harus diisi'));

		if($valid->run()) {
			$config['upload_path']   = './assets/upload/file/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg|pdf|zip|rar|doc|docx|xls|xlsx|ppt|pptx';
      		$config['max_size']      = '1200000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'				=> 'Tambah IPKD',
						'kategori_ipkd'	=> $kategori_ipkd,
						'error'    			=> $this->upload->display_errors(),
						'isi'				=> 'admin/ipkd/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        $i 		= $this->input;

	        $data = array(	'id_kategori_ipkd'=> $i->post('id_kategori_ipkd'),
	        				'id_user'			=> $this->session->userdata('id_user'),
	        				'judul_ipkd'		=> $i->post('judul_ipkd'),
	        				'isi'				=> $i->post('isi'),
	        				'jenis_ipkd'		=> $i->post('jenis_ipkd'),
	        				'gambar'			=> $upload_data['uploads']['file_name'],
							'tanggal'=> date('Y-m-d',strtotime($i->post('tanggal'))).' '.$i->post('jam'),
	        				'website'			=> $i->post('website')
	        				);
	        $this->ipkd_model->tambah($data);
	        $this->session->set_flashdata('sukses', 'Data telah ditambah');
	        redirect(base_url('admin/ipkd'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Tambah IPKD',
						'kategori_ipkd'	=> $kategori_ipkd,
						'isi'				=> 'admin/ipkd/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Edit ipkd
	public function edit($id_ipkd)	{
		$kategori_ipkd 	= $this->kategori_ipkd_model->listing();
		$ipkd 	= $this->ipkd_model->detail($id_ipkd); 

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_ipkd','Judul','required',
			array(	'required'	=> 'Judul harus diisi'));

		$valid->set_rules('isi','Isi','required',
			array(	'required'	=> 'Isi ipkd harus diisi'));
 
		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']   = './assets/upload/file/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg|pdf|zip|rar|doc|docx|xls|xlsx|ppt|pptx';
      		$config['max_size']      = '1200000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'				=> 'Edit IPKD',
						'kategori_ipkd'	=> $kategori_ipkd,
						'ipkd'			=> $ipkd,
						'error'    			=> $this->upload->display_errors(),
						'isi'				=> 'admin/ipkd/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        $i 		= $this->input;

	        $data = array(	'id_ipkd'			=> $id_ipkd,
	        				'id_kategori_ipkd'=> $i->post('id_kategori_ipkd'),
	        				'id_user'			=> $this->session->userdata('id_user'),
	        				'judul_ipkd'		=> $i->post('judul_ipkd'),
	        				'isi'				=> $i->post('isi'),
	        				'jenis_ipkd'		=> $i->post('jenis_ipkd'),
	        				'gambar'			=> $upload_data['uploads']['file_name'],
							'tanggal'=> date('Y-m-d',strtotime($i->post('tanggal'))).' '.$i->post('jam'),
	        				'website'			=> $i->post('website')
	        				);
	        $this->ipkd_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/ipkd'),'refresh');
		}}else{

			$i 		= $this->input;

	        $data = array(	'id_ipkd'			=> $id_ipkd,
	        				'id_kategori_ipkd'=> $i->post('id_kategori_ipkd'),
	        				'id_user'			=> $this->session->userdata('id_user'),
	        				'judul_ipkd'		=> $i->post('judul_ipkd'),
	        				'isi'				=> $i->post('isi'),
	        				'jenis_ipkd'		=> $i->post('jenis_ipkd'),
							'tanggal'=> date('Y-m-d',strtotime($i->post('tanggal'))).' '.$i->post('jam'),
	        				'website'			=> $i->post('website')
	        				);
	        $this->ipkd_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/ipkd'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Edit IPKD',
						'kategori_ipkd'	=> $kategori_ipkd,
						'ipkd'			=> $ipkd,
						'isi'				=> 'admin/ipkd/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}


	// Delete
	public function delete($id_ipkd) {
		// Tambahkan proteksi halaman
$url_pengalihan = str_replace('index.php/', '', current_url());
$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
// Ambil check login dari simple_login
$this->simple_login->check_login($pengalihan);

		$ipkd = $this->ipkd_model->detail($id_ipkd);
		// Proses hapus gambar
		if($ipkd->gambar != "") {
			unlink('./assets/upload/file/'.$ipkd->gambar);
		}
		// End hapus gambar
		$data = array('id_ipkd'	=> $id_ipkd);
		$this->ipkd_model->delete($data);
	    $this->session->set_flashdata('sukses', 'Data telah dihapus');
	    redirect(base_url('admin/ipkd'),'refresh');
	}
}

/* End of file ipkd.php */
/* Location: ./application/controllers/admin/ipkd.php */