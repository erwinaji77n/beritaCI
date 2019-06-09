<?php

class Model_m extends CI_Model
{
    public function getListBerita()
    {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->order_by('tgl_berita', 'desc');
        
        return $this->db->get()->result();
    }

    public function getDetailBerita($idBerita)
    {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('id_berita', $idBerita);
        
        return $this->db->get()->result();
    }

    public function cariBerita($judul)
    {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->like('judul_berita', $judul);

        return $this->db->get()->result();
    }

    public function hapusBerita($idBerita)
    {
        $this->db->where('id_berita', $idBerita);
        $this->db->delete('content');
        
        return $this->db->affected_rows();
    }

    public function insertBerita($object)
    {
        $this->db->insert('content', $object);
        return $this->db->affected_rows();
    }
}
