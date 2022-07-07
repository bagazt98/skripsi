<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kas_masjid'] = $this->m_dashboard->getKasMasjid();
        $data['zakat_fitrah'] = $this->m_dashboard->getZakatFitrahUang();
        $data['zakat_mal'] = $this->m_dashboard->getZakatMalUang();
        $data['transaksi_terakhir'] = $this->m_dashboard->transaksiTerakhir();
        $data['agenda_hari_ini'] = $this->m_dashboard->getAgendaToday();
        $data['inventaris'] = $this->m_dashboard->getStokBarang();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/dash', $data);
        $this->load->view('templates/footer');
    }
}
