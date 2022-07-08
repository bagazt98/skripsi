<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_home extends CI_Model
{
    // public function getKategori()
    // {
    // 	$this->db->order_by('nama_kategori', 'asc');
    // 	return $this->db->get('tb_kas_kategori')->result();
    // }

    public function getRole()
    {
        $this->db->select('a.id_user, a.name, a.img, a.id_roles, b.nama_roles');
        $this->db->join('tb_roles b', 'a.id_roles = b.id_roles', 'inner');
        $this->db->order_by('id_roles', 'asc');
        // $this->db->where('id !=', 1);
        return $this->db->get('tb_user a')->result_array();
    }
    public function getAgendaToday()
    {
        $this->db->select('a.judul_kegiatan, a.tanggal, a.mulai, a.selesai, a.narasumber, b.jenis_kegiatan');
        $this->db->join('tb_jenis_kegiatan b', 'a.id_jenis = b.id_jenis', 'inner');
        $this->db->where('a.tanggal', date('Y-m-d'));
        $this->db->order_by('a.mulai', 'desc');
        return $this->db->get('tb_agenda a')->result_array();
    }
    public function getPost()
    {
        $this->db->select('a.*, b.kategori,c.name');
        $this->db->join('tb_berita_kategori b', 'a.id_kategori = b.id_kategori', 'inner');
        $this->db->join('tb_user c', 'a.id_user = c.id_user', 'left');
        return $this->db->get('tb_berita a');
    }
    // public function postWhere($where)
    // {
    //     return $this->db->get_where('tb_berita', $where);
    // }
    public function pkWhere($where)
    {
        return $this->db->get_where('tb_berita', $where);
    }
    public function postWhere($where)
    {
        $this->db->select('a.*, b.kategori,c.name');
        $this->db->join('tb_berita_kategori b', 'a.id_kategori = b.id_kategori', 'inner');
        $this->db->join('tb_user c', 'a.id_user = c.id_user', 'left');
        return $this->db->get_where('tb_berita a', $where);
    }
    // public function urut()
    // {
    //     $this->db->select_max('id');
    //     $this->db->where('id');
    //     return $this->db->get('tb_berita')->result();
    // }
}
