<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function masuk()
    {
        $data['title'] = 'Kas Masuk';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        //$data['km'] = $this->db->get_where('tb_kas')->result_array();
        // $data['btn_edit'] = $this->m_keuangan->editKas($data);
        $data['daftar_kas'] = $this->m_keuangan->getKas('pemasukan');
        $data['kategori'] = $this->m_keuangan->getKategori();
        // $data['km'] = $this->db->select('*')
        // ->from('tb_kas')
        // ->join('tb_kas_kategori', 'tb_kas_kategori.id_kategori = tb_kas.id_kategori')
        // ->join('tb_user', 'tb_user.id_user = tb_kas.id_user')->get()
        // ->result_array();

        $data['kat'] = $this->db->get('tb_kas_kategori')->result_array();

        $this->form_validation->set_rules('kd_transaksi', 'Kode Transaksi', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('pemasukan', 'Pemasukan', 'required');
        //$this->form_validation->set_rules('dokumentasi', 'Dokumentasi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/masuk', $data);
            $this->load->view('templates/footer');
        } else {
            $kd_transaksi = $this->input->post('kd_transaksi');
            $kategori = $this->input->post('kategori');
            $petugas = $data['user']['id_user'];
            $tgl_transaksi = $this->input->post('tgl_transaksi');
            $keterangan = $this->input->post('keterangan');
            $pemasukan = $this->input->post('pemasukan');
            $dokumentasi = $_FILES['dokumentasi']['name'];
            if ($dokumentasi) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '5120';
                $config['upload_path'] = './assets/img/dokumentasi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('dokumentasi')) {
                    $old_file = $data['km']['dokumentasi'];
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
                'kd_transaksi' => $kd_transaksi,
                'id_kategori' => $kategori,
                'id_user' => $petugas,
                'date' => $tgl_transaksi,
                'keterangan' => $keterangan,
                'pemasukan' => $pemasukan,
                'dokumentasi' => $new_file
            ];
            $this->db->insert('tb_kas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kas Masuk Ditambahkan!</div>');
            redirect('keuangan/masuk');
        }
    }
    public function masukUbah()
    {
        $data['title'] = 'Ubah Kas Masuk';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['km'] = $this->m_keuangan->kmWhere(['id' => $this->uri->segment(3)])->row_array();
        $data['kat'] = $this->db->get_where('tb_kas_kategori')->result_array();

        $this->form_validation->set_rules('kd_transaksi', 'Kode Transaksi', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('pemasukan', 'Pemasukan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/masuk-edit', $data);
            $this->load->view('templates/footer');
        } else {
            $kd_transaksi = $this->input->post('kd_transaksi');
            $kategori = $this->input->post('kategori');
            $petugas = $data['user']['id_user'];
            $date = $this->input->post('date');
            $keterangan = $this->input->post('keterangan');
            $pemasukan = $this->input->post('pemasukan');
            $dokumentasi = $_FILES['dokumentasi']['name'];
            if ($dokumentasi) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '5120';
                $config['upload_path'] = './assets/img/dokumentasi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('dokumentasi')) {
                    $old_file = $data['km']['dokumentasi'];
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
                'kd_transaksi' => $kd_transaksi,
                'id_kategori' => $kategori,
                'id_user' => $petugas,
                'date' => $date,
                'keterangan' => $keterangan,
                'pemasukan' => $pemasukan,
                'dokumentasi' => $new_file
            ];
            $this->m_keuangan->updateKm($data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kas Masuk Telah Diubah!</div>');
            redirect('keuangan/masuk');
        }
    }
    public function masukHapus()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->m_keuangan->hapusKm($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kas Masuk Telah Dihapus!</div>');
        redirect('keuangan/masuk');
    }
    public function keluar()
    {
        $data['title'] = 'Kas Keluar';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['daftar_kas'] = $this->m_keuangan->getKas('pengeluaran');
        $data['kategori'] = $this->m_keuangan->getSaldoGroupByKategori();
        $data['kk'] = $this->db->select('*')
            ->from('tb_kas')
            ->join('tb_kas_kategori', 'tb_kas_kategori.id_kategori = tb_kas.id_kategori')
            ->join('tb_user', 'tb_user.id_user = tb_kas.id_user')->get()
            ->result_array();

        $this->form_validation->set_rules('kd_transaksi', 'Kode Transaksi', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('pengeluaran', 'Pengeluaran', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/keluar', $data);
            $this->load->view('templates/footer');
        } else {
            $kd_transaksi = $this->input->post('kd_transaksi');
            $kategori = $this->input->post('id_kategori');
            $petugas = $data['user']['id_user'];
            $tgl_transaksi = $this->input->post('tgl_transaksi');
            $keterangan = $this->input->post('keterangan');
            $pengeluaran = $this->input->post('pengeluaran');
            $dokumentasi = $_FILES['dokumentasi']['name'];
            if ($dokumentasi) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '5120';
                $config['upload_path'] = './assets/img/dokumentasi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('dokumentasi')) {
                    $old_file = $data['kk']['dokumentasi'];
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
                'kd_transaksi' => $kd_transaksi,
                'id_kategori' => $kategori,
                'id_user' => $petugas,
                'date' => $tgl_transaksi,
                'keterangan' => $keterangan,
                'pengeluaran' => $pengeluaran,
                'dokumentasi' => $new_file
            ];
            $this->m_keuangan->inputDataKas($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kas Keluar Ditambahkan!</div>');
            redirect('keuangan/keluar');
        }
    }
    public function keluarUbah()
    {
        $data['title'] = 'Ubah Kas Keluar';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['km'] = $this->m_keuangan->kmWhere(['id' => $this->uri->segment(3)])->row_array();
        $data['kat'] = $this->db->get_where('tb_kas_kategori')->result_array();


        $this->form_validation->set_rules('kd_transaksi', 'Kode Transaksi', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('pemasukan', 'Pemasukan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/keluar-edit', $data);
            $this->load->view('templates/footer');
        } else {
            $kd_transaksi = $this->input->post('kd_transaksi');
            $kategori = $this->input->post('kategori');
            $petugas = $data['user']['id_user'];
            $date = $this->input->post('date');
            $keterangan = $this->input->post('keterangan');
            $pengeluaran = $this->input->post('pengeluaran');
            $dokumentasi = $_FILES['dokumentasi']['name'];
            if ($dokumentasi) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '5120';
                $config['upload_path'] = './assets/img/dokumentasi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('dokumentasi')) {
                    $old_file = $data['km']['dokumentasi'];
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
                'kd_transaksi' => $kd_transaksi,
                'id_kategori' => $kategori,
                'id_user' => $petugas,
                'date' => $date,
                'keterangan' => $keterangan,
                'pengeluaran' => $pengeluaran,
                'dokumentasi' => $new_file
            ];
            $this->m_keuangan->updateKm($data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kas Keluar Telah Diubah!</div>');
            redirect('keuangan/keluar');
        }
    }
    public function keluarHapus()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->m_keuangan->hapusKm($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kas Keluar Telah Dihapus!</div>');
        redirect('keuangan/keluar');
    }
    public function saldo()
    {
        $data['title'] = 'Saldo Kas';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['saldo_kas'] = $this->m_keuangan->getSaldoKas();

        $this->form_validation->set_rules('kd_barang', 'Kode Barang', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/saldo', $data);
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
            redirect('keuangan/saldo');
        }
    }
    public function kategori()
    {
        $data['title'] = 'Kategori Kas';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->db->get('tb_kas_kategori')->result_array();

        $this->form_validation->set_rules('kategori', 'Judul Berita', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('tb_kas_kategori', ['nama_kategori' => $this->input->post('kategori')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori Kas Telah Ditambahkan!</div>');
            redirect('keuangan/kategori');
        }
    }
    public function kategoriHapus()
    {
        $where = ['id_kategori' => $this->uri->segment(3)];
        $this->m_keuangan->hapusKat($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori Telah Dihapus!</div>');
        redirect('keuangan/kategori');
    }
}
