<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_keuangan extends CI_Model
{
	public function getKategori()
	{
		$this->db->order_by('nama_kategori', 'asc');
		return $this->db->get('tb_kas_kategori')->result();
	}

	public function getKas($opsi)
	{
		$this->db->select('a.kd_transaksi, a.keterangan, a.id, 
						   a.date, a.pemasukan, a.pengeluaran, 
						   b.nama_kategori, c.name');
		$this->db->join('tb_kas_kategori b', 'a.id_kategori = b.id_kategori', 'inner');
		$this->db->join('tb_user c', 'a.id_user = c.id_user', 'left');
		($opsi === 'pemasukan') ? $this->db->where('a.pengeluaran IS NULL') : $this->db->where('a.pemasukan IS NULL');
		$this->db->order_by('date', 'desc');
		return $this->db->get('tb_kas a')->result_array();
	}
	public function getKasByKodeTransaksi($kode)
	{
		$this->db->select("*, CONCAT(date_format(date, '%Y/%m'), '/', dokumentasi) AS lokasi_file");
		$this->db->where('md5(kd_transaksi)', ($kode));
		return $this->db->get('tb_kas')->row_array();
	}
	public function inputDataKas($data)
	{
		return $this->db->insert('tb_kas', $data);
	}
	private function _pengeluaran($id_kategori)
	{
		$this->db->select('SUM(pengeluaran) AS pengeluaran');
		$this->db->where('id_kategori', $id_kategori);
		$this->db->group_by('id_kategori');
		$keluar = $this->db->get('tb_kas')->row();

		return $keluar->pengeluaran;
	}
	public function getSaldoGroupByKategori()
	{
		$saldoKas = [];

		$this->db->select('a.id_kategori, SUM(a.pemasukan) AS saldo, b.nama_kategori');
		$this->db->join('tb_kas_kategori b', 'a.id_kategori = b.id_kategori', 'inner');
		$this->db->where('a.pengeluaran IS NULL');
		$this->db->group_by('a.id_kategori');
		$saldo = $this->db->get('tb_kas a')->result();

		foreach ($saldo as $s) {
			$saldoKas[] = ['nama_kategori' => $s->nama_kategori, 'id_kategori' => $s->id_kategori, 'saldo' => $s->saldo - $this->_pengeluaran($s->id_kategori)];
		}

		return $saldoKas;
	}
	public function getSaldoKas()
	{
		$saldoKas = [];

		$this->db->select('a.id, a.id_kategori, a.date, SUM(a.pemasukan) AS saldo, b.nama_kategori');
		$this->db->join('tb_kas_kategori b', 'a.id_kategori = b.id_kategori', 'inner');
		$this->db->where('a.pengeluaran IS NULL');
		$this->db->group_by('a.id_kategori');
		$saldo = $this->db->get('tb_kas a')->result();

		foreach ($saldo as $s) {
			$saldoKas[] = ['date' => $s->date, 'nama_kategori' => $s->nama_kategori, 'pemasukan' => $s->saldo, 'pengeluaran' => $this->_pengeluaran($s->id_kategori)];
		}

		return $saldoKas;
	}

	public function getKm()
	{
		return $this->db->get('tb_kas');
	}
	public function kmWhere($where)
	{
		return $this->db->get_where('tb_kas', $where);
	}
	public function updateKm($data = null, $where = null)
	{
		$this->db->update('tb_kas', $data, $where);
	}

	public function hapusKm($where)
	{
		$this->db->delete('tb_kas', $where);
	}
}
