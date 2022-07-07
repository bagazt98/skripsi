<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventaris extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function masuk()
	{
		$data['title'] = 'Barang Masuk';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();


		$data['kdBrg'] = $this->m_keuangan->kdbarangLast();
		$data['barang'] = $this->m_inventaris->getBarang('masuk');
		$data['saldo_kas'] = $this->m_keuangan->getSaldoGroupByKategori();
		// $data['bm'] = $this->db->get_where('tb_bm')->result_array();

		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('inventaris/masuk', $data);
			$this->load->view('templates/footer');
		} else {
			$id_barang = $this->input->post('id_barang');
			$kd_barang = $this->input->post('kode_barang');
			$nama_barang = $this->input->post('nama_barang');
			$petugas = $data['user']['id_user'];
			$keterangan = $this->input->post('keterangan');
			$tanggal_pendataan = $this->input->post('tgl_pendataan');
			$kuantitas = $this->input->post('kuantitas_masuk');
			$id_kategori = $this->input->post('id_kategori');
			$pengeluaran = $this->input->post('pengeluaran');
			$satuan = $this->input->post('satuan');
			$dokumentasi = $_FILES['dokumentasi']['name'];
			if ($dokumentasi) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/img/dokumentasi/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('dokumentasi')) {
					$old_file = $data['bm']['dokumentasi'];
					if ($old_file != 'default.pdf') {
						unlink(FCPATH . 'assets/img/dokumentasi/' . $old_file);
					}
					$new_file = $this->upload->data('file_name');
					$this->db->set('dokumentasi', $new_file);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [
				'kode_barang' => $kd_barang,
				'nama_barang' => $nama_barang,
				'id_user' => $petugas,
				'keterangan' => $keterangan,
				'tgl_pendataan' => $tanggal_pendataan,
				'kuantitas_masuk' => $kuantitas,
				'kuantitas_keluar' => 0,
				'satuan' => $satuan,
				'dokumentasi' => $dokumentasi
			];

			$dataKas = [
				'kd_transaksi' => $kd_barang,
				'id_barang' => $id_barang,
				'id_kategori' => $id_kategori,
				'id_user' => $petugas,
				'keterangan' => $keterangan,
				'date' => $tanggal_pendataan,
				'pengeluaran' => $pengeluaran,
				'dokumentasi' => $dokumentasi
			];
			$status = ($this->m_inventaris->inputDataBarang($data) == true) ? 1 : 0;

			if ($status === 1 && !empty($id_kategori)) $this->m_keuangan->inputDataKas($dataKas);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang Masuk Ditambahkan!</div>');
			redirect('inventaris/masuk');
		}
	}
	public function masukUbah()
	{
		$data['title'] = 'Ubah Barang Masuk';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['barang'] = $this->m_inventaris->getBarang('masuk');
		$data['saldo_kas'] = $this->m_keuangan->getSaldoGroupByKategori();
		$data['bm'] = $this->m_inventaris->bmWhere(['a.id_barang' => $this->uri->segment(3)])->row_array();

		$this->form_validation->set_rules('tgl_pendataan', 'Tanggal', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('inventaris/masuk-edit', $data);
			$this->load->view('templates/footer');
		} else {
			$id_barang = $this->input->post('id_$id_barang');
			$kd_barang = $this->input->post('kode_barang');
			$nama_barang = $this->input->post('nama_barang');
			$tanggal_pendataan = $this->input->post('tgl_pendataan');
			$id_kategori = $this->input->post('id_kategori');
			$pengeluaran = $this->input->post('pengeluaran');
			$petugas = $data['user']['id_user'];
			$kuantitas = $this->input->post('kuantitas_masuk');
			$keterangan = $this->input->post('keterangan');
			$satuan = $this->input->post('satuan');
			$dokumentasi = $_FILES['dokumentasi']['name'];
			if ($dokumentasi) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/img/dokumentasi/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('dokumentasi')) {
					$old_file = $data['bm']['dokumentasi'];
					if ($old_file != 'default.pdf') {
						unlink(FCPATH . 'assets/img/dokumentasi/' . $old_file);
					}
					$new_file = $this->upload->data('file_name');
					$this->db->set('dokumentasi', $new_file);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [

				'nama_barang' => $nama_barang,
				'id_user' => $petugas,
				'keterangan' => $keterangan,
				'tgl_pendataan' => $tanggal_pendataan,
				'kuantitas_masuk' => $kuantitas,
				'kuantitas_keluar' => 0,
				'satuan' => $satuan,
				'dokumentasi' => $dokumentasi
			];

			$dataKas = [
				'id_barang' => $id_barang,
				'id_kategori' => $id_kategori,
				'id_user' => $petugas,
				'keterangan' => $keterangan,
				'date' => $tanggal_pendataan,
				'pengeluaran' => $pengeluaran,
				'dokumentasi' => $dokumentasi
			];
			$status = ($this->m_inventaris->updateBm($data, $id_barang) == true) ? 1 : 0;
			if ($status === 1 && !empty($id_kategori)) $this->m_keuangan->updateKm($dataKas);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang Masuk Telah Diubah!</div>');
			redirect('inventaris/masuk');
		}
	}
	public function masukHapus()
	{
		$where = ['id_barang' => $this->uri->segment(3)];
		$this->m_inventaris->hapusBm($where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang Masuk Telah Dihapus!</div>');
		redirect('inventaris/masuk');
	}
	public function keluar()
	{
		$data['title'] = 'Barang Keluar';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['barang'] = $this->m_inventaris->getBarang('keluar');
		$data['stok_list'] = $this->m_inventaris->getStokGroupByBarang();
		$data['bk'] = $this->db->get('tb_inventaris')->result_array();

		$this->form_validation->set_rules('kd_barang', 'Kode Barang', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('inventaris/keluar', $data);
			$this->load->view('templates/footer');
		} else {
			$kd_barang = $this->input->post('kd_barang');
			$nama_barang = $this->input->post('nama_barang');
			$tanggal_pendataan = $this->input->post('tgl_pendataan');
			$petugas = $data['user']['id_user'];
			$kuantitas = $this->input->post('kuantitas_keluar');
			$keterangan = $this->input->post('keterangan');
			$satuan = $this->input->post('satuan');
			$dokumentasi = $_FILES['dokumentasi']['name'];
			if ($dokumentasi) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/img/dokumentasi/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('dokumentasi')) {
					$old_file = $data['bk']['dokumentasi'];
					if ($old_file != 'default.pdf') {
						unlink(FCPATH . 'assets/img/dokumentasi/' . $old_file);
					}
					$new_file = $this->upload->data('file_name');
					$this->db->set('dokumentasi', $new_file);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [
				'kode_barang' => $kd_barang,
				'nama_barang' => $nama_barang,
				'id_user' => $petugas,
				'keterangan' => $keterangan,
				'tgl_pendataan' => $tanggal_pendataan,
				'kuantitas_masuk' => 0,
				'kuantitas_keluar' => $kuantitas,
				'satuan' => $satuan,
				'dokumentasi' => $dokumentasi
			];
			$this->db->insert('tb_inventaris', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang Keluar Ditambahkan!</div>');
			redirect('inventaris/keluar');
		}
	}
	public function keluarUbah()
	{
		$data['title'] = 'Ubah Barang Keluar';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['bk'] = $this->m_inventaris->bmWhere(['id_barang' => $this->uri->segment(3)])->row_array();

		$this->form_validation->set_rules('kd_barang', 'Kode Barang', 'required');
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('kuantitas', 'Kuantitas Barang', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('inventaris/keluar-edit', $data);
			$this->load->view('templates/footer');
		} else {
			$kd_barang = $this->input->post('kd_barang');
			$nama_barang = $this->input->post('nama_barang');
			$tanggal_pendataan = time();
			$petugas = $data['user']['id_user'];
			$kuantitas = $this->input->post('kuantitas');
			$keterangan = $this->input->post('keterangan');
			$satuan = $this->input->post('satuan');
			$dokumentasi = $_FILES['dokumentasi']['name'];
			if ($dokumentasi) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/img/dokumentasi/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('dokumentasi')) {
					$old_file = $data['bk']['dokumentasi'];
					if ($old_file != 'default.pdf') {
						unlink(FCPATH . 'assets/img/dokumentasi/' . $old_file);
					}
					$new_file = $this->upload->data('file_name');
					$this->db->set('dokumentasi', $new_file);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [
				'kode_barang' => $kd_barang,
				'nama_barang' => $nama_barang,
				'id_user' => $petugas,
				'keterangan' => $keterangan,
				'tgl_pendataan' => $tanggal_pendataan,
				'kuantitas_masuk' => 0,
				'kuantitas_keluar' => $kuantitas,
				'satuan' => $satuan,
				'dokumentasi' => $dokumentasi
			];
			$this->m_inventaris->updateBm($data, ['id_barang' => $this->input->post('id')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang Keluar Telah Diubah!</div>');
			redirect('inventaris/keluar');
		}
	}
	public function keluarHapus()
	{
		$where = ['id' => $this->uri->segment(3)];
		$this->m_inventaris->hapusBk($where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang Keluar Telah Dihapus!</div>');
		redirect('inventaris/keluar');
	}
	public function stok()
	{
		$data['title'] = 'Stok Barang';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['stok_brg'] = $this->m_inventaris->getStokBarang();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventaris/stokbarang', $data);
		$this->load->view('templates/footer');
	}
}
