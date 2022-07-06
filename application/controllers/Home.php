<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['brt'] = $this->m_home->getPost()->result_array();
		$data['baner'] = $this->db->get('tb_bener')->result_array();
		$data['agenda_hari_ini'] = $this->m_home->getAgendaToday();

		$this->load->view('templates/header-home');
		$this->load->view('home/home', $data);
		$this->load->view('templates/footer-home');
	}
	public function about()
	{
		$data['user'] = $this->m_home->getRole();
		$data['brt'] = $this->db->get('tb_berita')->result_array();

		$this->load->view('templates/header-home');
		$this->load->view('home/about', $data);
		$this->load->view('templates/footer-home');
	}
	public function berita()
	{
		$data['user'] = $this->m_home->getRole();
		$data['brt'] = $this->m_home->getPost()->result_array();

		// $data['ur'] = $this->m_home->urut();

		$this->load->view('templates/header-home');
		$this->load->view('home/berita', $data);
		$this->load->view('templates/footer-home');
	}
	public function kategori()
	{
		$data['user'] = $this->m_home->getRole();
		$data['brt'] = $this->db->get('tb_berita_kategori')->result_array();
		// $data['ur'] = $this->m_home->urut();

		$this->load->view('templates/header-home');
		$this->load->view('home/kategori', $data);
		$this->load->view('templates/footer-home');
	}
	public function post()
	{
		$data['brt'] = $this->m_home->postWhere(['id' => $this->uri->segment(3)])->row_array();
		$this->load->view('templates/header-home');
		$this->load->view('home/post', $data);
		$this->load->view('templates/footer-home');
	}
	public function pk()
	{
		$data['brt'] = $this->m_home->pkWhere(['id_kategori' => $this->uri->segment(3)])->result_array();
		$this->load->view('templates/header-home');
		$this->load->view('home/berita', $data);
		$this->load->view('templates/footer-home');
	}
	public function uk()
	{
		$data['brt'] = $this->m_home->pkWhere(['id_user' => $this->uri->segment(3)])->result_array();
		$this->load->view('templates/header-home');
		$this->load->view('home/berita', $data);
		$this->load->view('templates/footer-home');
	}
}
