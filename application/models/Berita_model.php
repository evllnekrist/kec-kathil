<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->database('db2');
	}

	// Listing data
	public function listing() {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function listing22() {
		$db2 = $this->load->database('db2', TRUE);
		$db2->select('berita.*, berita.slug_berita, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$db2->from('berita');
		// Join dg 2 tabel
		$db2->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$db2->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$db2->order_by('id_berita','DESC');
		$query = $db2->get();
		return $query->result();
	}
	public function listing_pesan() {
		$db2 = $this->load->database('db2', TRUE);
		$db2->select('log_pesan_berita.id_berita, log_pesan_berita.pesan,log_pesan_berita.tanggal,  users.nama');
		$db2->from('log_pesan_berita');
	
		$db2->join('berita','log_pesan_berita.id_berita = berita.id_berita','LEFT');
		$db2->join('users','users.id_user = log_pesan_berita.id_user','LEFT');
		
		$db2->order_by('id_log','DESC');
		//$this->db->select('SELECT log_pesan_berita.pesan,log_pesan_berita.tanggal, berita.judul_berita, users.nama FROM log_pesan_berita LEFT JOIN berita ON berita.id_berita = log_pesan_berita.id_berita LEFT JOIN users ON users.id_user = log_pesan_berita.id_user ORDER by id_log DESC', FALSE);
		$query = $db2->get();
		return $query->result();
	}
	
	public function listing2($id_user) {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where('berita.id_user',$id_user);
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function listing3($id_user) {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where('berita.id_user',$id_user);
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}
   
	// Listing data
	public function dasbor() {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function bulanan($bulan) {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where('DATE_FORMAT(berita.tanggal,"%Y-%m")',$bulan);
		$this->db->order_by('hits','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function tahunan($tahun) {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where('DATE_FORMAT(berita.tanggal,"%Y")',$tahun);
		$this->db->order_by('hits','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	// Kunjungan berita teramai
	public function populer()
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where_not_in('berita.id_kategori', '11');
		$this->db->where(array(	'berita.status_berita'	=> 'Publish'));
		$this->db->order_by('hits','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	// Kunjungan berita teramai
	public function hits()
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->order_by('hits','DESC');
		$this->db->limit(100);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori
	public function kategori_admin($id_kategori) {
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.id_kategori'	=> $id_kategori));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori
	public function status_admin($status_berita) {
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> $status_berita));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori
	public function jenis_admin($jenis_berita) {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.jenis_berita'	=> $jenis_berita));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori
	public function author_admin($id_user) {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		// End join
		$this->db->where(array(	'berita.id_user'	=> $id_user));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori
	public function kategori($id_kategori,$limit,$start) {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.id_kategori'	=> $id_kategori,
								'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->order_by('tanggal_publish','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori
	public function all_kategori($id_kategori) {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		
		$this->db->where(array(	'berita.id_kategori'	=> $id_kategori,
								'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}


	// Listing berita
	public function berita($limit,$start) {
		$this->db->select('berita.*, 
					users.nama, 
					kategori.nama_kategori, kategori.slug_kategori,
					kategori.slug_kategori
					');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where_not_in('berita.id_kategori', '11');
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->order_by('berita.tanggal_publish','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}
	// public function berita($limit,$start) {
	// 	$db1 = $this->load->database('db1', TRUE);
	// 	$db2 = $this->load->database('db2', TRUE);
	// 	$db1->select('berita.*, 
					 
	// 				kategori.nama_kategori, kategori.slug_kategori,
	// 				kategori.slug_kategori
	// 				');
	// 	$db2->select('users.nama');
	// 	$db1->from('berita');
	// 	// Join dg 2 tabel
	// 	$db1->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
	// 	$db2->join('users','users.id_user = berita.id_user','LEFT');
	// 	// End join
	// 	$db1->where_not_in('berita.id_kategori', '11');
	// 	$db1->where(array(	'berita.status_berita'	=> 'Publish',
	// 							'berita.jenis_berita'	=> 'Berita'));
	// 	$db1->order_by('berita.tanggal_publish','DESC');
	// 	$db1->limit($limit,$start);
	// 	$query1 = $db1->get();
	// 	// return $query->result();
	// 	$query2 = $db2->get();
	// 	// $result_array = merge($query1->result(), $query2->result());
	// 	// return $result_array;
	// 	$result_query = $db1->db->query("(".$query1->compil‌​e_select().") UNION ALL (".$query2->compile_select().")");
	// 	return $result_query;
	// }

	// Listing total
	public function total() {
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->order_by('id_berita','DESC');
		
		$q = $this->db->get();
		
		if($q->num_rows() > 0) {
			return $q->num_rows();
		}else{
			return false;
		}
	}

	// Listing berita
	public function search($keywords,$limit,$start) {
		$this->db->select('berita.*, 
					users.nama, 
					kategori.nama_kategori, kategori.slug_kategori,
					kategori.slug_kategori
					');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->like('berita.judul_berita',$keywords);
		$this->db->or_like('berita.isi',$keywords);
		$this->db->group_by('id_berita');
		$this->db->order_by('id_berita','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing total
	public function total_search($keywords) {
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->like('berita.judul_berita',$keywords);
		$this->db->or_like('berita.isi',$keywords);
		$this->db->group_by('id_berita');
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing read
	public function listing_read() {
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}
	public function listing_hoax() {
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where('id_kategori', '11');
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}
	// Listing profil
	public function listing_profil() {
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Profil'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing layanan
	public function listing_layanan() {
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Layanan'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing headline
	public function listing_headline() {
		$this->db->select('berita.*, 
					users.nama, 
					kategori.nama_kategori, kategori.slug_kategori,
					kategori.slug_kategori
					');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Headline'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(9);
		$query = $this->db->get();
		return $query->result();
	}


	// Read data
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

	// Detail data
	public function detail($slug_berita) {
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('slug_berita',$slug_berita);
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	public function detail_proses($id_berita) {
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('id_berita',$id_berita);
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	public function detail2($slug_berita) {
		$db2 = $this->load->database('db2', TRUE);
		$db2->select('*');
		$db2->from('berita');
		$db2->where('slug_berita',$slug_berita);
		$db2->order_by('id_berita','DESC');
		$query = $db2->get();
		return $query->row();
	}

	// Tambah
	public function tambah_pesan($data) {
		$db2 = $this->load->database('db2', TRUE);
		$db2->insert('log_pesan_berita',$data);
	}

	// Edit
	public function edit_pesan($data) {
		$db2 = $this->load->database('db2', TRUE);
		$db2->where('id_log',$data['id_log']);
		$db2->update('log_pesan_berita',$data);
	}
	public function delete_pesan($data) {
		$db2 = $this->load->database('db2', TRUE);
		$db2->where('id_log',$data['id_log']);
		$db2->delete('log_pesan_berita',$data);
	}

	public function tambah($data) {
		$this->db->insert('berita',$data);
	}
	public function tambah2($data) {
		$db2 = $this->load->database('db2', TRUE);
		$db2->insert('berita',$data);
	}
	// Edit
	public function edit($data) {
		$this->db->where('slug_berita',$data['slug_berita']);
		$this->db->update('berita',$data);
	}
	public function edit_proses($data) {
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->update('berita',$data);
	}
	public function edit2($data) {
		$db2 = $this->load->database('db2', TRUE);
		$db2->where('slug_berita',$data['slug_berita']);
		$db2->update('berita',$data);
	}

	// Edit hit
	public function update_hit($hit) {
		$this->db->where('id_berita',$hit['id_berita']);
		$this->db->update('berita',$hit);
	}

	// Delete
	public function delete($data) {
		$this->db->where('slug_berita',$data['slug_berita']);
		$this->db->delete('berita',$data);
	}
	public function delete2($data) {
		$db2 = $this->load->database('db2', TRUE);
		$db2->where('slug_berita',$data['slug_berita']);
		$db2->delete('berita',$data);
	}

	//search
	public function lihat($sampai, $dari, $like = '')
    {
        if ($like) {
            $this->db->where($like);
        }

        $query = $this->db->get('berita', $sampai, $dari);
        return $query->result_array();
    }

    //hitung jumlah row
    public function jumlah($like='')
    {
        if ($like) {
            $this->db->where($like);
        }

        $query = $this->db->get('berita');
        return $query->num_rows();
    }

//REST SERVER
public function getAll() {
    // SELECT * FROM Berita
    // return $this->db->get('berita')->result_array();
	$this->db->select('*');
		$this->db->from('berita');
		$query = $this->db->get();
		return $query->result();
}
public function getByID($id_berita) {
    // SELECT * FROM berita WHERE id=$id
    return $this->db->get_where('berita',array('id_berita'=>$id_berita))->result_array();
}
public function addData($data) {
	//INSERT INTO berita VALUES()
	$simpan=$this->db->insert('berita',$data); 
	if($simpan) {
		return TRUE;
	} else {
		return FALSE;
	}
}

public function updateData($data,$id_berita){
	// UPDATE berita SET WHERE id=id
	$update=$this->db->update('berita',$data,array('id_berita'=>$id_berita));
	if($update) {
		return TRUE;
	} else {
		return FALSE;
	}
}
public function delData($id_berita) {
	$hapus=$this->db->delete('berita',array('id_berita'=>$id_berita));
	if($hapus) {
		return TRUE;
	} else {
		return FALSE;
	}
}








}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */