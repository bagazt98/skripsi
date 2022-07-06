<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_dashboard extends CI_Model
{

    public function getKasMasjid()
    {
        $this->db->select('(SUM(pemasukan) - SUM(pengeluaran)) AS saldo');
        return $this->db->get('tb_kas')->row();
    }

    public function getZakatFitrahUang()
    {
        $this->db->select('
			((SELECT SUM(jumlah_zakat) FROM tb_fitrah WHERE status = "masuk" AND bentuk_zakat = "uang tunai") -
			(SELECT SUM(jumlah_zakat) FROM tb_fitrah WHERE status = "keluar" AND bentuk_zakat = "uang tunai")) AS sisa_zakat_fitrah');
        return $this->db->get('tb_fitrah')->row();
    }

    public function getZakatMalUang()
    {
        $this->db->select('
			((SELECT SUM(jumlah_zakat) FROM tb_mal WHERE status = "masuk" AND satuan_zakat = "RUPIAH") -
			(SELECT SUM(jumlah_zakat) FROM tb_mal WHERE status = "keluar" AND satuan_zakat = "RUPIAH")) AS sisa_zakat_mal');
        return $this->db->get('tb_mal')->row();
    }

    public function chartKas()
    {
        $sumberKas = [];
        $jumlah = [];

        $this->db->select('SUM(a.pemasukan) AS jumlah, b.nama_kategori');
        $this->db->join('tb_kas_kategori b', 'a.id_kategori = b.id_kategori', 'left');
        $this->db->group_by('a.id_kategori');
        $sumber = $this->db->get('tb_kas a')->result();

        foreach ($sumber as $value) {
            $sumberKas[] = $value->nama_kategori;
            $jumlah[] = $value->jumlah;
        }

        return array('labels' => $sumberKas, 'data' => ['jumlah' => $jumlah]);
    }

    public function transaksiTerakhir()
    {
        $this->db->select('a.keterangan, a.date, a.pemasukan, a.pemasukan, a.pengeluaran, b.nama_kategori');
        $this->db->join('tb_kas_kategori b', 'a.id_kategori = b.id_kategori', 'left');
        $this->db->order_by('a.id', 'desc');
        return $this->db->get('tb_kas a', 3)->result();
    }

    public function getAgendaToday()
    {
        $this->db->select('a.judul_kegiatan, a.tanggal, a.mulai, a.selesai, a.narasumber, b.jenis_kegiatan');
        $this->db->join('tb_jenis_kegiatan b', 'a.id_jenis = b.id_jenis', 'inner');
        $this->db->where('a.tanggal', date('Y-m-d'));
        $this->db->order_by('a.mulai', 'desc');
        return $this->db->get('tb_agenda a')->result();
    }

    public function getStokBarang()
    {
        $this->db->select('satuan, nama_barang, tgl_pendataan, (SUM(kuantitas_masuk) - SUM(kuantitas_keluar)) AS stok');
        $this->db->group_by('nama_barang');
        $this->db->order_by('(SUM(kuantitas_masuk) - SUM(kuantitas_keluar))', 'desc');
        return $this->db->get('tb_inventaris', 5)->result();
    }
}

/* End of file dashboard_m.php */
/* Location: ./application/models/dashboard_m.php */