<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function kegiatan()
    {
        $data['title'] = 'Agenda Kegiatan';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jenis'] = $this->m_agenda->getJenisAgenda();
        $data['agenda'] = $this->m_agenda->getAgenda();
        $data['kegi'] = $this->db->get('tb_agenda')->result_array();


        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('id_jenis', 'Jenis Agenda', 'required');
        $this->form_validation->set_rules('judul_kegiatan', 'Judul Kegiatan', 'required');
        $this->form_validation->set_rules('narasumber', 'Narasumber', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kegiatan/kegiatan', $data);
            $this->load->view('templates/footer');
        } else {
            $id_jenis = $this->input->post('id_jenis');
            $id_user = $data['user']['id_user'];
            $tanggal = $this->input->post('date');
            $jam_mulai = $this->input->post('jam_mulai');
            $jam_selesai = $this->input->post('jam_selesai');
            $judul_kegiatan = $this->input->post('judul_kegiatan');
            $narasumber = $this->input->post('narasumber');
            $keterangan = $this->input->post('keterangan');
            $data = [
                'id_jenis' => $id_jenis,
                'id_user' => $id_user,
                'tanggal' => $tanggal,
                'mulai' => $jam_mulai,
                'selesai' => $jam_selesai,
                'judul_kegiatan' => $judul_kegiatan,
                'narasumber' => $narasumber,
                'keterangan' => $keterangan
            ];
            $this->db->insert('tb_agenda', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Agenda Kegiatan Ditambahkan!</div>');
            redirect('agenda/kegiatan');
        }
    }
    public function kegiatanUbah()
    {
        $data['title'] = 'Ubah Agenda Kegiatan';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['jenis'] = $this->m_agenda->getJenisAgenda();
        $data['ak'] = $this->m_agenda->akWhere(['id' => $this->uri->segment(3)])->row_array();

        $this->form_validation->set_rules('kd_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('kuantitas', 'Kuantitas Barang', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kegiatan/kegiatan-edit', $data);
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
            $this->m_agenda->updateAk($data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Agenda Kegiatan Telah Diubah!</div>');
            redirect('agenda/kegiatan');
        }
    }
    public function kegiatanHapus()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->m_agenda->hapusAk($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Agenda Kegiatan Telah Dihapus!</div>');
        redirect('agenda/kegiatan');
    }
    public function jenis()
    {
        $data['title'] = 'Jenis Kegiatan';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kegiatan'] = $this->db->get('tb_jenis_kegiatan')->result_array();

        $this->form_validation->set_rules('kegiatan', 'Jenis Kegiatan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kegiatan/kegiatan-jenis', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('tb_jenis_kegiatan', ['jenis_kegiatan' => $this->input->post('kegiatan')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis Kegiatan Telah Ditambahkan!</div>');
            redirect('agenda/jenis');
        }
    }
    public function jenisHapus()
    {
        $where = ['id_jenis' => $this->uri->segment(3)];
        $this->m_agenda->hapusJk($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis Kegiatan Telah Dihapus!</div>');
        redirect('agenda/jenis');
    }
}
