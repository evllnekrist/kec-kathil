<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_ipkd_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('kategori_ipkd');
		$this->db->order_by('id_kategori_ipkd','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id_kategori_ipkd) {
		$this->db->select('*');
		$this->db->from('kategori_ipkd');
		$this->db->where('id_kategori_ipkd',$id_kategori_ipkd);
		$this->db->order_by('id_kategori_ipkd','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function read($slug_kategori_ipkd) {
		$this->db->select('*');
		$this->db->from('kategori_ipkd');
		$this->db->where('slug_kategori_ipkd',$slug_kategori_ipkd);
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('kategori_ipkd',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_kategori_ipkd',$data['id_kategori_ipkd']);
		$this->db->update('kategori_ipkd',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_kategori_ipkd',$data['id_kategori_ipkd']);
		$this->db->delete('kategori_ipkd',$data);
	}
}

/* End of file Kategori_ipkd_model.php */
/* Location: ./application/models/Kategori_ipkd_model.php */