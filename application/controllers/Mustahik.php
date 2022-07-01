<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mustahik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function daftar()
    {
        $data['title'] = 'Daftar Mustahik';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['dm'] = $this->db->get_where('tb_dm')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mustahik/daftar', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $kategori = $this->input->post('kategori');
            $alamat = $this->input->post('alamat');
            $no_telpon = $this->input->post('no_telepon');
            $dibuat_oleh = $data['user']['name'];
            $data = [
                'nama' => $nama,
                'kategori' => $kategori,
                'alamat' => $alamat,
                'no_telpon' => $no_telpon,
                'petugas' => $dibuat_oleh
            ];
            $this->db->insert('tb_dm', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mustahik Ditambahkan!</div>');
            redirect('mustahik/daftar');
        }
    }
    public function daftarUbah()
    {        
        $data['title'] = 'Ubah Data Mustahik';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['dm'] = $this->m_mustahik->dmWhere(['id' => $this->uri->segment(3)])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telpon', 'No Telepon', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mustahik/daftar-edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $kategori = $this->input->post('kategori');
            $alamat = $this->input->post('alamat');
            $no_telpon = $this->input->post('no_telpon');
            $dibuat_oleh = $data['user']['name'];
            $data = [
                'nama' => $nama,
                'kategori' => $kategori,
                'alamat' => $alamat,
                'no_telpon' => $no_telpon,
                'petugas' => $dibuat_oleh
            ];
            $this->m_mustahik->updateDm($data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mustahik Telah Diubah!</div>');
            redirect('mustahik/daftar');
        }
    }
    public function daftarHapus()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->m_mustahik->hapusDm($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mustahik Telah Dihapus!</div>');
        redirect('mustahik/daftar');
    }    
}