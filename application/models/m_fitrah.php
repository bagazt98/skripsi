<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_fitrah extends CI_Model
{
    public function getZakatFitrah($status)
    {
        $this->db->select('a.id_transaksi, a.kode_transaksi, a.date, a.nama, 
						   a.alamat, a.no_telepon, a.bentuk_zakat, 
						   a.satuan_zakat, a.jumlah_jiwa, a.jumlah_zakat, b.name');
        $this->db->join('tb_user b', 'a.id_user = b.id_user', 'left');
        $this->db->where('a.status', $status);
        $this->db->order_by('a.date', 'desc');
        return $this->db->get('tb_fitrah a')->result_array();
    }





    public function getDetailTransaksi($hash)
    {
        $this->db->select('a.kode_transaksi, a.date, a.nama, a.status,
						   a.alamat, a.no_telepon, a.bentuk_zakat, 
						   a.satuan_zakat, a.jumlah_jiwa, a.jumlah_zakat, b.name');
        $this->db->join('tb_user b', 'a.id_user = b.id_user', 'left');
        $this->db->where('(a.kode_transaksi)', $hash);
        return $this->db->get('tb_fitrah a')->row();
    }

    public function rekapitulasiZakat()
    {
        $this->db->select('date, bentuk_zakat, satuan_zakat, SUM(jumlah_zakat) AS zakat_masuk');
        $this->db->where('status', 'masuk');
        $this->db->group_by('bentuk_zakat');
        return $this->db->get('tb_fitrah')->result();
    }

    public function rekapZakatKeluar($bentuk_zakat)
    {
        $this->db->select('SUM(jumlah_zakat) AS zakat_keluar');
        $this->db->where('bentuk_zakat', $bentuk_zakat);
        $this->db->where('status', 'keluar');
        $zakat = $this->db->get('tb_fitrah')->row();
        return $zakat->zakat_keluar;
    }
    public function getFitrah()
    {
        return $this->db->get('tb_fitrah');
    }
    public function fitrahWhere($where)
    {
        return $this->db->get_where('tb_fitrah', $where);
    }
    public function updateFitrah($data = null, $where = null)
    {
        $this->db->update('tb_fitrah', $data, $where);
    }

    public function hapusFitrah($where)
    {
        $this->db->delete('tb_fitrah', $where);
    }
}
