<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$db2 = $this->load->database('db2', TRUE);
		$db2->select('*');
		$db2->from('kategori');
		$db2->order_by('id_kategori','DESC');
		$query = $db2->get();
		return $query->result();
	}

	// Read data
	public function read($slug_kategori) {
		$db2 = $this->load->database('db2', TRUE);
		$db2->select('*');
		$db2->from('kategori');
		$db2->where('slug_kategori',$slug_kategori);
		$db2->order_by('id_kategori','DESC');
		$query = $db2->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_kategori) {
		$db2 = $this->load->database('db2', TRUE);
		$db2->select('*');
		$db2->from('kategori');
		$db2->where('id_kategori',$id_kategori);
		$db2->order_by('id_kategori','DESC');
		$query = $db2->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$db2 = $this->load->database('db2', TRUE);
		$db2->insert('kategori',$data);
	}

	// Edit
	public function edit($data) {
		$db2 = $this->load->database('db2', TRUE);
		$db2->where('id_kategori',$data['id_kategori']);
		$db2->update('kategori',$data);
	}

	// Delete
	public function delete($data) {
		$db2 = $this->load->database('db2', TRUE);
		$db2->where('id_kategori',$data['id_kategori']);
		$db2->delete('kategori',$data);
	}
}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */