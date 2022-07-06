<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_inventaris extends CI_Model
{
    public function getBarang($status)
    {
        $this->db->select('a.id_barang, a.kode_barang, a.tgl_pendataan, a.nama_barang, a.kuantitas_masuk, a.kuantitas_keluar, a.satuan, a.keterangan, b.name');
        $this->db->join('tb_user b', 'a.id_user = b.id_user', 'left');
        if ($status === 'masuk') {
            $this->db->where('a.kuantitas_masuk != ', 0);
        } else {
            $this->db->where('a.kuantitas_keluar != ', 0);
        }
        $this->db->order_by('a.tgl_pendataan', 'desc');
        return $this->db->get('tb_inventaris a')->result_array();
    }

    public function getStokBarang()
    {
        $this->db->select('satuan, nama_barang, SUM(kuantitas_masuk) AS stok_in, SUM(kuantitas_keluar) stok_out');
        $this->db->group_by('nama_barang');
        $this->db->order_by('nama_barang', 'asc');
        return $this->db->get('tb_inventaris')->result_array();
    }

    public function getBarangByID($hash)
    {
        $this->db->select("a.kode_barang, a.tgl_pendataan, a.nama_barang, a.kuantitas_masuk, a.kuantitas_keluar, a.satuan, a.keterangan, a.dokumentasi, date_format(a.tgl_pendataan, '%Y/%m') AS month, b.id_kategori, b.pemasukan, b.pengeluaran");
        $this->db->join('tb_kas_masjid b', 'a.kode_barang = b.kode_transaksi', 'left');
        $this->db->where('md5(a.kode_barang)', ($hash));
        return $this->db->get('tb_inventaris a')->row_array();
    }

    private function _kuantitasKeluar($nama_barang)
    {
        $this->db->select('SUM(kuantitas_keluar) AS stok_keluar');
        $this->db->where('nama_barang', $nama_barang);
        $this->db->group_by('nama_barang');
        $keluar = $this->db->get('tb_inventaris')->row();

        return $keluar->stok_keluar;
    }

    public function getStokGroupByBarang()
    {
        $stokBarang = [];

        $this->db->select('SUM(kuantitas_masuk) AS stok, nama_barang');
        $this->db->where('kuantitas_masuk != ', 0);
        $this->db->group_by('nama_barang');
        $stok = $this->db->get('tb_inventaris')->result();

        foreach ($stok as $s) {
            $stokBarang[] = ['nama_barang' => $s->nama_barang, 'stok' => $s->stok - $this->_kuantitasKeluar($s->nama_barang)];
        }

        return $stokBarang;
    }
    public function inputDataBarang($data)
    {
        return $this->db->insert('tb_inventaris', $data) ? true : false;
    }
    public function getBm()
    {
        return $this->db->get('tb_inventaris');
    }
    public function bmWhere($where)
    {
        return $this->db->get_where('tb_inventaris', $where);
    }
    public function updateBm($data = null, $where = null)
    {
        $this->db->update('tb_inventaris', $data, $where);
    }

    public function hapusBm($where)
    {
        $this->db->delete('tb_inventaris', $where);
    }
}
