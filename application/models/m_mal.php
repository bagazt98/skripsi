<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_mal extends CI_Model
{
    public function getZakatMal($status)
    {
        $this->db->select('a.id_transaksi, a.kode_transaksi, a.date, a.nama, 
						   a.alamat, a.no_telepon, a.bentuk_zakat, a.satuan_zakat, 
						   a.jumlah_jiwa, a.jumlah_zakat, b.name');
        $this->db->join('tb_user b', 'a.id_user = b.id_user', 'left');
        $this->db->where('a.status', $status);
        $this->db->order_by('a.date', 'desc');
        return $this->db->get('tb_mal a')->result_array();
    }

    public function rekapitulasiZakat()
    {
        $this->db->select('date, bentuk_zakat, satuan_zakat, SUM(jumlah_zakat) AS zakat_masuk');
        $this->db->where('status', 'masuk');
        $this->db->group_by('bentuk_zakat');
        return $this->db->get('tb_mal')->result();
    }

    public function rekapZakatKeluar($bentuk_zakat)
    {
        $this->db->select('SUM(jumlah_zakat) AS zakat_keluar');
        $this->db->where('bentuk_zakat', $bentuk_zakat);
        $this->db->where('status', 'keluar');
        $zakat = $this->db->get('tb_mal')->row();
        return $zakat->zakat_keluar;
    }
    public function getMal()
    {
        return $this->db->get('tb_mal');
    }
    public function malWhere($where)
    {
        return $this->db->get_where('tb_mal', $where);
    }
    public function updateMal($data = null, $where = null)
    {
        $this->db->update('tb_mal', $data, $where);
    }

    public function hapusMal($where)
    {
        $this->db->delete('tb_mal', $where);
    }
}
