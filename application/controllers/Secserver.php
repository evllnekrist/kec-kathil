<?php
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Content-Type: application/json; charset=utf-8');
Header('Content-Type: application/x-www-form-urlencoded');
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
defined('BASEPATH') OR exit('No direct script access allowed');

//load library 
use chriskacerguis\RestServer\RestController;

class Secserver extends RestController {

	public function __construct() {
		parent::__construct();
		
		//load model
			$this->load->model('berita_model');
			$this->load->model('kategori_model');
			$this->load->model('download_model');
			$this->load->model('galeri_model');
	}

	public function index_get() {
		$id_berita=$this->get('id_berita');

		//jika id tidak diisi 
		if($id_berita===null) {
			//semua data
			$data=$this->berita_model->getAll();
		} else {
			//filter data
			$data=$this->berita_model->getByID($id_berita);
		}		

		$this->response( [
                    'status' => true,
                    'message' => 'Data Ditemukan',
                    'data' => $data
                ], 200 );
	}

	public function index_post() { 
		
			$file = $_FILES['gambar'];

			$path = "assets/upload/image/";
			if (!is_dir($path)) {
				mkdir($path, 0777, true);
			} 

			$path_file = "";
			if (!empty($file['name'])) {
				$config['upload_path'] = './' . $path;
				$config['allowed_types'] = "jpg|jpeg|png|gif";
				$config['filename'] = time();
				$config['max_size'] = 5000;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gambar')) {
					//get file yang berhasil di upload
					$uploadData = $this->upload->data();
					$path_file = './' . $path . $uploadData['file_name'];
				}
			}
		
		$data=array(
			'id_berita'=>$this->post('id_berita'),
			'id_user'=>$this->post('id_user'),
            'id_kategori'=>$this->post('id_kategori'),
			'slug_berita'=>$this->post('slug_berita'),
			'judul_berita'=>$this->post('judul_berita'),
            'isi'=>$this->post('isi'),
            'status_berita'=>$this->post('status_berita'),
            'jenis_berita'=>$this->post('jenis_berita'),
            'keywords'=>$this->post('keywords'),
			'caption'=>$this->post('caption'),
            'icon'=>$this->post('icon'),
            'urutan'=>$this->post('urutan'),
            'tanggal_mulai'=>$this->post('tanggal_mulai'),
            'tanggal_selesai'=>$this->post('tanggal_selesai'),
            'tanggal_post'=>$this->post('tanggal_post'),
            'tanggal_publish'=>$this->post('tanggal_publish'),
			//'gambar'=>$this->post('gambar'),
			'gambar'=> $path_file
		);

		$simpan=$this->berita_model->addData($data);

		if($simpan) { //jika berhasil
			$this->response( [
                    'status' => true,
                    'message' => 'Data Berhasil Disimpan',
                    'data' => $data
                ], 200 );
		} else { //jika gagal
			$this->response( [
                    'status' => false,
                    'message' => 'Data Gagal Disimpan'
                ], 400 );
		}
	}


	public function index_put() {
		
		$id_berita=$this->put('id_berita');
		
			$file = $_FILES['gambar'];

			$path = "assets/upload/image/";
			if (!is_dir($path)) {
				mkdir($path, 0777, true);
			}

			$path_file = "";
			if (!empty($file['name'])){
				$config['upload_path'] = './' . $path;
				$config['allowed_types'] = "jpg|jpeg|png|gif";
				$config['filename'] = time();
				$config['max_size'] = 5000;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gambar')){
					//get file yang berhasil di upload
					$uploadData = $this->upload->data();
					$path_file = './' . $path . $uploadData['file_name'];
				}
			}
		
		$data=array(
			'id_user'=>$this->put('id_user'),
            'id_kategori'=>$this->put('id_kategori'),
			'slug_berita'=>$this->put('slug_berita'),
			'judul_berita'=>$this->put('judul_berita'),
            'isi'=>$this->put('isi'),
            'status_berita'=>$this->put('status_berita'),
            'jenis_berita'=>$this->put('jenis_berita'),
            'keywords'=>$this->put('keywords'),
			'caption'=>$this->put('ca[tion'),
            'icon'=>$this->put('icon'),
            'urutan'=>$this->put('urutan'),
            'tanggal_mulai'=>$this->put('tanggal_mulai'),
            'tanggal_selesai'=>$this->put('tanggal_selesai'),
            'tanggal_post'=>$this->put('tanggal_post'),
            'tanggal_publish'=>$this->put('tanggal_publish'),
			'tanggal'=>$this->put('tanggal'),
			//'gambar'=>$this->put('gambar')
			'gambar'=> $path_file
		);

		$ubah=$this->berita_model->updateData($data,$id_berita);

		if($ubah > 0) { //jika berhasil
			$this->response( [
                    'status' => true,
                    'message' => 'Data Berhasil Diupdate',
                    'data' => $data
                ], 200 );
		} else { //jika gagal
			$this->response( [
                    'status' => false,
                    'message' => 'Data Gagal Diupdate'
                ], 400 );
		}
	
	} 
	public function index_delete() {
		$id_berita=$this->delete('id_berita');

		if($id_berita===null) {
			$this->response( [
                    'status' => false,
                    'message' => 'ID Kosong'
                ], 404 );
		} else {
			$hapus=$this->berita_model->delData($id_berita);
			if($hapus) { //jika berhasil
				$this->response( [
                    'status' => true,
                    'message' => 'Data Berhasil Dihapus',
                    'id_berita' => $id_berita
                ], 200 );
			} else {
				$this->response( [
                    'status' => false,
                    'message' => 'Data Gagal Dihapus'
                ], 400 );
			}
		}
	}

}