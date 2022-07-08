<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zakat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
	}
	// public function rupiah(numb) {
	//     return 'Rp. ' + (Number(numb)).toLocaleString('id-ID', {
	//         style: 'decimal',
	//         maximumFractionDigits: 2,
	//         minimumFractionDigits: 2
	//     });
	// }
	public function fitrah()
	{
		$data['title'] = 'Zakat Fitrah Masuk';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['zakat'] = $this->m_fitrah->getZakatFitrah('masuk');
		$data['fitrah'] = $this->db->get_where('tb_fitrah')->result_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('zakat/fitrah', $data);
			$this->load->view('templates/footer');
		} else {

			$status = $this->input->post('status');
			$kode_transaksi = $this->input->post('kode_transaksi');
			$nama = $this->input->post('nama');
			$id_user = $data['user']['id_user'];
			$date = $this->input->post('date');
			$alamat = $this->input->post('alamat');
			$no_telepon = $this->input->post('no_telepon');
			$bentuk_zakat = $this->input->post('bentuk_zakat');
			$satuan_zakat = $this->input->post('satuan_zakat');
			$jumlah_jiwa = $this->input->post('jumlah_jiwa');
			$jumlah_zakat = $this->input->post('jumlah_zakat');
			$data = [
				'kode_transaksi' => $kode_transaksi,
				'nama' => $nama,
				'status' => $status,
				'id_user' => $id_user,
				'date' => $date,
				'alamat' => $alamat,
				'no_telepon' => $no_telepon,
				'bentuk_zakat' => $bentuk_zakat,
				'satuan_zakat' => $satuan_zakat,
				'jumlah_jiwa' => $jumlah_jiwa,
				'jumlah_zakat' => $jumlah_zakat
			];
			$this->db->insert('tb_fitrah', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Zakat Fitrah Ditambahkan!</div>');
			redirect('zakat/fitrah');
		}
	}
	public function keluar()
	{
		$data['title'] = 'Zakat Fitrah Keluar';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['zakat'] = $this->m_fitrah->getZakatFitrah('keluar');
		$data['fitrah'] = $this->db->get_where('tb_fitrah')->result_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('zakat/fitrah', $data);
			$this->load->view('templates/footer');
		} else {

			$status = $this->input->post('status');
			$kode_transaksi = $this->input->post('kode_transaksi');
			$nama = $this->input->post('nama');
			$id_user = $data['user']['id_user'];
			$date = $this->input->post('date');
			$alamat = $this->input->post('alamat');
			$no_telepon = $this->input->post('no_telepon');
			$bentuk_zakat = $this->input->post('bentuk_zakat');
			$satuan_zakat = $this->input->post('satuan_zakat');
			$jumlah_jiwa = $this->input->post('jumlah_jiwa');
			$jumlah_zakat = $this->input->post('jumlah_zakat');
			$data = [
				'kode_transaksi' => $kode_transaksi,
				'nama' => $nama,
				'status' => $status,
				'id_user' => $id_user,
				'date' => $date,
				'alamat' => $alamat,
				'no_telepon' => $no_telepon,
				'bentuk_zakat' => $bentuk_zakat,
				'satuan_zakat' => $satuan_zakat,
				'jumlah_jiwa' => $jumlah_jiwa,
				'jumlah_zakat' => $jumlah_zakat
			];
			$this->db->insert('tb_fitrah', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Zakat Fitrah Ditambahkan!</div>');
			redirect('zakat/keluar');
		}
	}
	public function fitrahUbah()
	{
		$data['title'] = 'Ubah Zakat Fitrah';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['fu'] = $this->m_fitrah->fitrahWhere(['id_transaksi' => $this->uri->segment(3)])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('zakat/fitrah-edit', $data);
			$this->load->view('templates/footer');
		} else {
			$status = $this->input->post('status');
			$kode_transaksi = $this->input->post('id');
			$nama = $this->input->post('nama');
			$id_user = $data['user']['id_user'];
			$date = $this->input->post('date');
			$alamat = $this->input->post('alamat');
			$no_telepon = $this->input->post('no_telepon');
			$bentuk_zakat = $this->input->post('bentuk_zakat');
			$satuan_zakat = $this->input->post('satuan_zakat');
			$jumlah_jiwa = $this->input->post('jumlah_jiwa');
			$jumlah_zakat = $this->input->post('jumlah_zakat');
			$data = [
				'kode_transaksi' => $kode_transaksi,
				'nama' => $nama,
				'status' => $status,
				'id_user' => $id_user,
				'date' => $date,
				'alamat' => $alamat,
				'no_telepon' => $no_telepon,
				'bentuk_zakat' => $bentuk_zakat,
				'satuan_zakat' => $satuan_zakat,
				'jumlah_jiwa' => $jumlah_jiwa,
				'jumlah_zakat' => $jumlah_zakat
			];
			$this->m_fitrah->updateFitrah($data, ['id_transaksi' => $this->input->post('id')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Zakat Fitrah DiUbah</div>');
			redirect('zakat/fitrah');
		}
	}
	public function hapusFitrah()
	{
		$where = ['id_transaksi' => $this->uri->segment(3)];
		$this->m_fitrah->hapusFitrah($where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Zakat Fitrah Dihapus</div>');
		redirect('zakat/fitrah');
	}

	public function mal()
	{
		$data['title'] = 'Zakat Mal';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['muzakki'] = $this->m_mal->getZakatMal('masuk');
		$data['mal'] = $this->db->get('tb_mal')->result_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('zakat/mal', $data);
			$this->load->view('templates/footer');
		} else {

			$status = $this->input->post('status');
			$kode_transaksi = $this->input->post('kode_transaksi');
			$nama = $this->input->post('nama');
			$id_user = $data['user']['id_user'];
			$date = $this->input->post('date');
			$alamat = $this->input->post('alamat');
			$no_telepon = $this->input->post('no_telepon');
			$bentuk_zakat = $this->input->post('bentuk_zakat');
			$satuan_zakat = $this->input->post('satuan_zakat');
			$jumlah_jiwa = $this->input->post('jumlah_jiwa');
			$jumlah_zakat = $this->input->post('jumlah_zakat');
			$data = [
				'kode_transaksi' => $kode_transaksi,
				'nama' => $nama,
				'status' => $status,
				'id_user' => $id_user,
				'date' => $date,
				'alamat' => $alamat,
				'no_telepon' => $no_telepon,
				'bentuk_zakat' => $bentuk_zakat,
				'satuan_zakat' => $satuan_zakat,
				'jumlah_jiwa' => $jumlah_jiwa,
				'jumlah_zakat' => $jumlah_zakat
			];
			$this->db->insert('tb_mal', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Zakat Mal Ditambahkan!</div>');
			redirect('zakat/mal');
		}
	}
	public function malUbah()
	{
		$data['title'] = 'Ubah Zakat Mal';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['fu'] = $this->m_fitrah->fitrahWhere(['id_transaksi' => $this->uri->segment(3)])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('zakat/fitrah-edit', $data);
			$this->load->view('templates/footer');
		} else {
			$status = $this->input->post('status');
			$kode_transaksi = $this->input->post('kode_transaksi');
			$nama = $this->input->post('nama');
			$id_user = $data['user']['id_user'];
			$date = $this->input->post('date');
			$alamat = $this->input->post('alamat');
			$no_telepon = $this->input->post('no_telepon');
			$bentuk_zakat = $this->input->post('bentuk_zakat');
			$satuan_zakat = $this->input->post('satuan_zakat');
			$jumlah_jiwa = $this->input->post('jumlah_jiwa');
			$jumlah_zakat = $this->input->post('jumlah_zakat');
			$data = [
				'kode_transaksi' => $kode_transaksi,
				'nama' => $nama,
				'status' => $status,
				'id_user' => $id_user,
				'date' => $date,
				'alamat' => $alamat,
				'no_telepon' => $no_telepon,
				'bentuk_zakat' => $bentuk_zakat,
				'satuan_zakat' => $satuan_zakat,
				'jumlah_jiwa' => $jumlah_jiwa,
				'jumlah_zakat' => $jumlah_zakat
			];
			$this->m_fitrah->updateFitrah($data, ['id_transaksi' => $this->input->post('id')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Zakat Mal Telah dirubah</div>');
			redirect('zakat/mal');
		}
	}
	public function malHapus()
	{
		$where = ['id_transaksi' => $this->uri->segment(3)];
		$this->m_mal->hapusMal($where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Zakat Mal Dihapus</div>');
		redirect('zakat/mal');
	}
	public function malKeluar()
	{
		$data['title'] = 'Zakat Mal Keluar';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['muzakki'] = $this->m_mal->getZakatMal('keluar');
		$data['mal'] = $this->db->get('tb_mal')->result_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('zakat/mal', $data);
			$this->load->view('templates/footer');
		} else {

			$status = $this->input->post('status');
			$kode_transaksi = $this->input->post('kode_transaksi');
			$nama = $this->input->post('nama');
			$id_user = $data['user']['id_user'];
			$date = $this->input->post('date');
			$alamat = $this->input->post('alamat');
			$no_telepon = $this->input->post('no_telepon');
			$bentuk_zakat = $this->input->post('bentuk_zakat');
			$satuan_zakat = $this->input->post('satuan_zakat');
			$jumlah_jiwa = $this->input->post('jumlah_jiwa');
			$jumlah_zakat = $this->input->post('jumlah_zakat');
			$data = [
				'kode_transaksi' => $kode_transaksi,
				'nama' => $nama,
				'status' => $status,
				'id_user' => $id_user,
				'date' => $date,
				'alamat' => $alamat,
				'no_telepon' => $no_telepon,
				'bentuk_zakat' => $bentuk_zakat,
				'satuan_zakat' => $satuan_zakat,
				'jumlah_jiwa' => $jumlah_jiwa,
				'jumlah_zakat' => $jumlah_zakat
			];
			$this->db->insert('tb_mal', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Zakat Mal Ditambahkan!</div>');
			redirect('zakat/malkeluar');
		}
	}
	public function rekapitulasi()
	{
		$data['rekap_zakat'] = $this->m_fitrah->rekapitulasiZakat();
		$this->load->view('zakat/fitrah-rekap', $data);
	}
}
