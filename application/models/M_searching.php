<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_searching extends CI_Model
{
    //ambil data
    public function lihat($sampai, $dari, $like = '')
    {
        if ($like) {
            $this->db->where($like);
        }

        $query = $this->db->get('berita', $sampai, $dari);
        $this->db->where('status_berita', 'Publish');
        $this->db->order_by('tanggal_publish', 'desc');
        return $query->result_array();
		
		
    }

    //hitung jumlah row
    public function jumlah($like='')
    {
        if ($like) {
            $this->db->where($like);
        }

        $query = $this->db->get('berita');
        $this->db->where('status_berita', 'Publish');
        $this->db->order_by('tanggal_publish', 'desc');
        return $query->num_rows();
    }
}