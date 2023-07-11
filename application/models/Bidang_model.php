<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		
		$this->db->select('*');
		$this->db->from('bidang');
		$this->db->order_by('id_bidang','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Read data
	public function read($slug_bidang) {
		
		$this->db->select('*');
		$this->db->from('bidang');
		$this->db->where('slug_bidang',$slug_bidang);
		$this->db->order_by('id_bidang','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_bidang) {
		
		$this->db->select('*');
		$this->db->from('bidang');
		$this->db->where('id_bidang',$id_bidang);
		$this->db->order_by('id_bidang','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		
		$this->db->insert('bidang',$data);
	}

	// Edit
	public function edit($data) {
		
		$this->db->where('id_bidang',$data['id_bidang']);
		$this->db->update('bidang',$data);
	}

	// Delete
	public function delete($data) {
		
		$this->db->where('id_bidang',$data['id_bidang']);
		$this->db->delete('bidang',$data);
	}
}

/* End of file bidang_model.php */
/* Location: ./application/models/bidang_model.php */