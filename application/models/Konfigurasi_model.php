<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	// Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('konfigurasi');
		$this->db->order_by('id_konfigurasi','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	public function read($slug_berita) {
		$this->db->select('berita.*, 
					users.nama, 
					kategori.nama_kategori, kategori.slug_kategori,
					kategori.slug_kategori
					');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		$this->db->where('slug_berita',$slug_berita);
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// Detail
	public function detail($id_konfigurasi) {
		$this->db->select('*');
		$this->db->from('konfigurasi');
		$this->db->where('id_konfigurasi',$id_konfigurasi);
		$this->db->order_by('id_konfigurasi','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}
	
	// Tambah
	public function tambah($data) {
		$this->db->insert('konfigurasi',$data);
	}
	
	// Edit
	public function edit($data) {
		$this->db->where('id_konfigurasi',$data['id_konfigurasi']);
		$this->db->update('konfigurasi',$data);
	}
	
	// Check delete
	public function check($id_konfigurasi) {
		$query = $this->db->get_where('produk',array('id_konfigurasi' => $id_konfigurasi));
		return $query->num_rows();
	}
	
	// Delete
	public function delete($data) {
		$this->db->where('id_konfigurasi',$data['id_konfigurasi']);
		$this->db->delete('konfigurasi',$data);
	}
}