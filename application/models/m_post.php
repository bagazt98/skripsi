<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_post extends CI_Model
{
    public function getKategori()
    {
        $this->db->order_by('kategori', 'asc');
        return $this->db->get('tb_berita_kategori')->result_array();
    }

    public function getKatber()
    {
        $this->db->select('a.*,b.kategori,c.name');
        $this->db->join('tb_berita_kategori b', 'a.id_kategori = b.id_kategori', 'inner');
        $this->db->join('tb_user c', 'a.id_user = c.id_user', 'left');
        return $this->db->get('tb_berita a')->result_array();
    }

    public function beritaWhere($where)
    {
        return $this->db->get_where('tb_berita', $where);
    }
    public function updateBerita($data = null, $where = null)
    {
        $this->db->update('tb_berita', $data, $where);
    }

    public function hapusBerita($where)
    {
        $this->db->delete('tb_berita', $where);
    }

    public function benerWhere($where)
    {
        return $this->db->get_where('tb_bener', $where);
    }
    public function updateBener($data = null, $where = null)
    {
        $this->db->update('tb_bener', $data, $where);
    }
    public function hapusBener($where)
    {
        $this->db->delete('tb_bener', $where);
    }

    public function kategoriWhere($where)
    {
        return $this->db->get_where('tb_berita_kategori', $where);
    }
    public function updateKategori($data = null, $where = null)
    {
        $this->db->update('tb_berita_kategori', $data, $where);
    }

    public function hapusKategori($where)
    {
        $this->db->delete('tb_berita_kategori', $where);
    }
}
