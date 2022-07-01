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

        $data['bm'] = $this->db->get_where('tb_bm')->result_array();

        $this->form_validation->set_rules('kd_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('kuantitas', 'Kuantitas Barang', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('inventaris/masuk', $data);
            $this->load->view('templates/footer');
        } else {
            $kd_barang = $this->input->post('kd_barang');
            $nama_barang = $this->input->post('nama_barang');
            $tanggal_pendataan = time();
            $petugas = $data['user']['name'];
            $kuantitas = $this->input->post('kuantitas');
            $keterangan = $this->input->post('keterangan');
            $data = [                
                'kd_barang' => $kd_barang,
                'tgl_pendataan' => $tanggal_pendataan,
                'petugas' => $petugas,
                'nama_barang' => $nama_barang,
                'kuantitas_masuk' => $kuantitas,
                'keterangan' => $keterangan
            ];
            $this->db->insert('tb_bm', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang Masuk Ditambahkan!</div>');
            redirect('inventaris/masuk');
        }
    }
    public function masukUbah()
    {        
        $data['title'] = 'Ubah Barang Masuk';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['bm'] = $this->m_inventaris->bmWhere(['id' => $this->uri->segment(3)])->row_array();

        $this->form_validation->set_rules('kd_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('kuantitas', 'Kuantitas Barang', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('inventaris/masuk-edit', $data);
            $this->load->view('templates/footer');
        } else {
            $kd_barang = $this->input->post('kd_barang');
            $nama_barang = $this->input->post('nama_barang');
            $tanggal_pendataan = time();
            $petugas = $data['user']['name'];
            $kuantitas = $this->input->post('kuantitas');
            $keterangan = $this->input->post('keterangan');
            $data = [                
                'kd_barang' => $kd_barang,
                'tgl_pendataan' => $tanggal_pendataan,
                'petugas' => $petugas,
                'nama_barang' => $nama_barang,
                'kuantitas_masuk' => $kuantitas,
                'keterangan' => $keterangan
            ];
            $this->m_inventaris->updatebm($data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang Masuk Telah Diubah!</div>');
            redirect('inventaris/masuk');
        }
    }
    public function masukHapus()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->m_inventaris->hapusBm($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang Masuk Telah Dihapus!</div>');
        redirect('inventaris/masuk');
    }
    public function keluar()
    {
        $data['title'] = 'Barang Keluar';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['bk'] = $this->db->get_where('tb_bk')->result_array();

        $this->form_validation->set_rules('kd_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('kuantitas', 'Kuantitas Barang', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('inventaris/keluar', $data);
            $this->load->view('templates/footer');
        } else {
            $kd_barang = $this->input->post('kd_barang');
            $nama_barang = $this->input->post('nama_barang');
            $tanggal_pendataan = time();
            $petugas = $data['user']['name'];
            $kuantitas = $this->input->post('kuantitas');
            $keterangan = $this->input->post('keterangan');
            $data = [                
                'kd_barang' => $kd_barang,
                'tgl_pendataan' => $tanggal_pendataan,
                'petugas' => $petugas,
                'nama_barang' => $nama_barang,
                'kuantitas_keluar' => $kuantitas,
                'keterangan' => $keterangan
            ];
            $this->db->insert('tb_bk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang Keluar Ditambahkan!</div>');
            redirect('inventaris/keluar');
        }
    }
    public function keluarUbah()
    {        
        $data['title'] = 'Ubah Barang Keluar';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['bk'] = $this->m_inventaris->bkWhere(['id' => $this->uri->segment(3)])->row_array();

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
            $petugas = $data['user']['name'];
            $kuantitas = $this->input->post('kuantitas');
            $keterangan = $this->input->post('keterangan');
            $data = [                
                'kd_barang' => $kd_barang,
                'tgl_pendataan' => $tanggal_pendataan,
                'petugas' => $petugas,
                'nama_barang' => $nama_barang,
                'kuantitas_keluar' => $kuantitas,
                'keterangan' => $keterangan
            ];
            $this->m_inventaris->updatebk($data, ['id' => $this->input->post('id')]);
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
}