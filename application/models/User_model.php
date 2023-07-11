<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	// load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
	
	// Listing
	public function listing()
	{
		$db2 = $this->load->database('db2', TRUE);
		$db2->select('users.*,
							bagian.nama_bagian');
		$db2->from('users');
		// join
		$db2->join('bagian', 'bagian.id_bagian = users.id_bagian', 'left');
		// End join
		$db2->order_by('users.id_user', 'desc');
		$query = $db2->get();
		return $query->result();
	}

	// Total
	public function total()
	{
		$db2 = $this->load->database('db2', TRUE);
		$db2->select('COUNT(*) AS total');
		$db2->from('users');
		$query = $db2->get();
		return $query->row();
	}

	// Login
	public function login($username,$password)
	{
		$db2 = $this->load->database('db2', TRUE);
		$db2->select('users.*,
							bagian.nama_bagian, kategori.id_kategori');
		$db2->from('users');
		// join
		$db2->join('bagian', 'bagian.id_bagian = users.id_bagian', 'left');
		$db2->join('kategori', 'kategori.id_kategori = users.id_kategori', 'left');
		// End join
		// where
		$db2->where(array(	'username'	=> $username,
								'password'	=> sha1($password)
							));
		$db2->order_by('users.id_user', 'desc');
		$query = $db2->get();
		return $query->row();
	}

	// Detail
	public function detail($id_user)
	{
		$db2 = $this->load->database('db2', TRUE);
		$db2->select('users.*,
							bagian.nama_bagian');
		$db2->from('users');
		// join
		$db2->join('bagian', 'bagian.id_bagian = users.id_bagian', 'left');
		// End join
		// where
		$db2->where('users.id_user', $id_user);
		$db2->order_by('users.id_user', 'desc');
		$query = $db2->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$db2 = $this->load->database('db2', TRUE);
		$db2->insert('users', $data);
	}

	// Edit
	public function edit($data)
	{
		$db2 = $this->load->database('db2', TRUE);
		$db2->where('id_user', $data['id_user']);
		$db2->update('users', $data);
	}

	// Delete
	public function delete($data)
	{
		$db2 = $this->load->database('db2', TRUE);
		$db2->where('id_user', $data['id_user']);
		$db2->delete('users', $data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */