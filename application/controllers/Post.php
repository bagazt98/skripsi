<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function berita()
	{
		$data['title'] = 'Daftar Berita';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['daftar_berita'] = $this->m_post->getKatber();
		$data['kategori'] = $this->m_post->getKategori();
		$data['brt'] = $this->db->get('tb_berita')->result_array();

		$this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required');
		$this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('post/berita', $data);
			$this->load->view('templates/footer');
		} else {
			$judul_berita = $this->input->post('judul_berita');
			$isi_berita = $this->input->post('isi_berita');
			$id_kategori = $this->input->post('kategori');
			$tanggal = time();
			$dibuat_oleh = $data['user']['id_user'];
			$gambar = $_FILES['gambar']['name'];
			if ($gambar) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/img/berita/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$old_file = $data['brt']['gambar'];
					if ($old_file != 'default.pdf') {
						unlink(FCPATH . 'assets/img/berita/' . $old_file);
					}
					$new_file = $this->upload->data('file_name');
					$this->db->set('gambar', $new_file);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [
				'judul_berita' => $judul_berita,
				'isi_berita' => $isi_berita,
				'id_kategori' => $id_kategori,
				'gambar' => $new_file,
				'tanggal' => $tanggal,
				'id_user' => $dibuat_oleh
			];
			$this->db->insert('tb_berita', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berita Telah Ditambahkan!</div>');
			redirect('post/berita');
		}
	}
	public function beritaUbah()
	{
		$data['title'] = 'Ubah Data Berita';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['berita'] = $this->m_post->beritaWhere(['id' => $this->uri->segment(3)])->row_array();
		$data['kategori'] = $this->m_post->getKategori();

		$this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required');
		$this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('post/berita-edit', $data);
			$this->load->view('templates/footer');
		} else {
			$judul_berita = $this->input->post('judul_berita');
			$isi_berita = $this->input->post('isi_berita');
			$kategori = $this->input->post('kategori');
			$tanggal = $this->input->post('date');
			$dibuat_oleh = $data['user']['id_user'];
			$gambar = $_FILES['gambar']['name'];
			if ($gambar) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/img/berita/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$old_file = $data['brt']['gambar'];
					if ($old_file != 'default.pdf') {
						unlink(FCPATH . 'assets/img/berita/' . $old_file);
					}
					$new_file = $this->upload->data('file_name');
					$this->db->set('gambar', $new_file);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [
				'judul_berita' => $judul_berita,
				'isi_berita' => $isi_berita,
				'id_kategori' => $kategori,
				'tanggal' => $tanggal,
				'gambar' => $gambar,
				'id_user' => $dibuat_oleh
			];
			$this->m_post->updateBerita($data, ['id' => $this->input->post('id')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">ubah!</div>');
			redirect('post/berita');
		}
	}
	public function beritaHapus()
	{
		$where = ['id' => $this->uri->segment(3)];
		$this->m_post->hapusBerita($where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berita Telah Dihapus!</div>');
		redirect('post/berita');
	}
	public function banner()
	{
		$data['title'] = 'Daftar Benner';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['ban'] = $this->db->get('tb_bener')->result_array();

		$this->form_validation->set_rules('judul_bener', 'Judul Bener', 'required');
		$this->form_validation->set_rules('isi_bener', 'Isi Bener', 'required');
		$this->form_validation->set_rules('gambar', 'Gambar', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('post/banner', $data);
			$this->load->view('templates/footer');
		} else {
			$judul_bener = $this->input->post('judul_bener');
			$isi_bener = $this->input->post('isi_bener');
			$gambar = $_FILES['gambar']['name'];
			if ($gambar) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/img/banner/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$old_file = $data['ban']['gambar'];
					if ($old_file != 'default.pdf') {
						unlink(FCPATH . 'assets/img/banner/' . $old_file);
					}
					$new_file = $this->upload->data('file_name');
					$this->db->set('gambar', $new_file);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [
				'judul_bener' => $judul_bener,
				'isi_bener' => $isi_bener,
				'gambar' => $new_file
			];
			$this->db->insert('tb_bener', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Banner Telah Ditambahkan!</div>');
			redirect('post/banner');
		}
	}
	public function benerHapus()
	{
		$where = ['id' => $this->uri->segment(3)];
		$this->m_post->hapusBener($where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Banner Telah Dihapus!</div>');
		redirect('post/banner');
	}
	public function kategori()
	{
		$data['title'] = 'Kategori Berita';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kategori'] = $this->db->get('tb_berita_kategori')->result_array();

		$this->form_validation->set_rules('kategori', 'Judul Berita', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('post/berita-kategori', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('tb_berita_kategori', ['kategori' => $this->input->post('kategori')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori Berita Telah Ditambahkan!</div>');
			redirect('post/kategori');
		}
	}
	public function kategoriUbah()
	{
		$data['title'] = 'Ubah Kategori Berita';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kategori'] = $this->m_post->kategoriWhere(['id_kategori' => $this->uri->segment(3)])->row_array();

		$this->form_validation->set_rules('kategori', 'Kategori Berita', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('post/berita-kategori-edit', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'kategori' => $this->input->post('kategori')
			];
			$this->m_post->updateKategori($data, ['id_kategori' => $this->input->post('id')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori Berita Telah Ditambahkan!</div>');
			redirect('post/kategori');
		}
	}
	public function kategoriHapus()
	{
		$where = ['id_kategori' => $this->uri->segment(3)];
		$this->m_post->hapusKategori($where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori Berita Telah Dihapus!</div>');
		redirect('post/kategori');
	}
}
