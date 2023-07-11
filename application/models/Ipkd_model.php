<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipkd_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('ipkd.*, kategori_ipkd.nama_kategori_ipkd, users.nama');
		$this->db->from('ipkd');
		// Join dg 2 tabel
		$this->db->join('kategori_ipkd','kategori_ipkd.id_kategori_ipkd = ipkd.id_kategori_ipkd','LEFT');
		$this->db->join('users','users.id_user = ipkd.id_user','LEFT');
		// End join
		$this->db->order_by('id_ipkd','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function populer() {
		$this->db->select('*');
		$this->db->from('ipkd');
		$this->db->order_by('hits','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function slider() {
		$this->db->select('ipkd.*, kategori_ipkd.nama_kategori_ipkd, users.nama');
		$this->db->from('ipkd');
		// Join dg 2 tabel
		$this->db->join('kategori_ipkd','kategori_ipkd.id_kategori_ipkd = ipkd.id_kategori_ipkd','LEFT');
		$this->db->join('users','users.id_user = ipkd.id_user','LEFT');
		// End join
		$this->db->where('jenis_ipkd','Homepage');
		$this->db->order_by('id_ipkd','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function ipkd() {
		$this->db->select('ipkd.*, kategori_ipkd.nama_kategori_ipkd, users.nama, 
						kategori_ipkd.slug_kategori_ipkd');
		$this->db->from('ipkd');
		// Join dg 2 tabel
		$this->db->join('kategori_ipkd','kategori_ipkd.id_kategori_ipkd = ipkd.id_kategori_ipkd','LEFT');
		$this->db->join('users','users.id_user = ipkd.id_user','LEFT');
		// End join
		$this->db->where('jenis_ipkd','ipkd');
		$this->db->order_by('id_ipkd','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function total() {
		$this->db->select('ipkd.*, kategori_ipkd.nama_kategori_ipkd, users.nama');
		$this->db->from('ipkd');
		// Join dg 2 tabel
		$this->db->join('kategori_ipkd','kategori_ipkd.id_kategori_ipkd = ipkd.id_kategori_ipkd','LEFT');
		$this->db->join('users','users.id_user = ipkd.id_user','LEFT');
		// End join
		$this->db->where('jenis_ipkd','ipkd');
		$this->db->order_by('id_ipkd','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Kategori
	public function kategori($id_kategori_ipkd) {
		$this->db->select('ipkd.*, kategori_ipkd.nama_kategori_ipkd, users.nama, 
						kategori_ipkd.slug_kategori_ipkd');
		$this->db->from('ipkd');
		// Join dg 2 tabel
		$this->db->join('kategori_ipkd','kategori_ipkd.id_kategori_ipkd = ipkd.id_kategori_ipkd');
		$this->db->join('users','users.id_user = ipkd.id_user','LEFT');
		// End join
		$this->db->where(array(	'jenis_ipkd'				=> 'ipkd',
								'ipkd.id_kategori_ipkd'	=> $id_kategori_ipkd));
		$this->db->order_by('id_ipkd','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id_ipkd) {
		$this->db->select('*');
		$this->db->from('ipkd');
		$this->db->where('id_ipkd',$id_ipkd);
		$this->db->order_by('id_ipkd','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('ipkd',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_ipkd',$data['id_ipkd']);
		$this->db->update('ipkd',$data);
	}

	// Edit
	public function edit2($data2) {
		$this->db->where('id_ipkd',$data2['id_ipkd']);
		$this->db->update('ipkd',$data2);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_ipkd',$data['id_ipkd']);
		$this->db->delete('ipkd',$data);
	}
}

/* End of file ipkd_model.php */
/* Location: ./application/models/ipkd_model.php */