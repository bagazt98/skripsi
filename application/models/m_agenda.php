<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_agenda extends CI_Model
{
    public function getAgenda()
    {
        $this->db->select('a.id, a.tanggal, a.mulai, a.selesai, a.judul_kegiatan, a.narasumber, a.keterangan, b.jenis_kegiatan');
        $this->db->join('tb_jenis_kegiatan b', 'a.id_jenis = b.id_jenis', 'left');
        $this->db->order_by('a.tanggal', 'desc');
        return $this->db->get('tb_agenda a')->result_array();
    }

    public function getJenisAgenda()
    {
        $this->db->order_by('jenis_kegiatan', 'asc');
        return $this->db->get('tb_jenis_kegiatan')->result();
    }
    public function getAk()
    {
        return $this->db->get('tb_agenda');
    }
    public function akWhere($where)
    {
        return $this->db->get_where('tb_agenda', $where);
    }
    public function updateAk($data = null, $where = null)
    {
        $this->db->update('tb_agenda', $data, $where);
    }

    public function hapusAk($where)
    {
        $this->db->delete('tb_agenda', $where);
    }
    public function getJk()
    {
        return $this->db->get('tb_jenis_kegiatan');
    }
    public function jenisWhere($where)
    {
        return $this->db->get_where('tb_jenis_kegiatan', $where);
    }
    public function updateJk($data = null, $where = null)
    {
        $this->db->update('tb_jenis_kegiatan', $data, $where);
    }

    public function hapusJk($where)
    {
        $this->db->delete('tb_jenis_kegiatan', $where);
    }
}
