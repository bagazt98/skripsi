<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zakat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function fitrah()
    {
        $data['title'] = 'Zakat Fitrah';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['fitrah'] = $this->db->get_where('tb_fitrah')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('zakat/fitrah', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $beras = $this->input->post('beras');
            $uang = $this->input->post('uang');
            $tanggal_input = time();
            $dibuat_oleh = $data['user']['name'];
            $data = [
                'nama' => $nama,
                'beras' => $beras,
                'uang' => $uang,
                'tanggal_input' => $tanggal_input,
                'dibuat_oleh' => $dibuat_oleh
            ];
            $this->db->insert('tb_fitrah', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Zakat Fitrah Ditambahkan!</div>');
            redirect('zakat/fitrah');
        }
    }
    public function fitrahUbah()
    {        
        $data['title'] = 'Ubah Zakat Fitrah';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['fu'] = $this->m_fitrah->fitrahWhere(['id' => $this->uri->segment(3)])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('zakat/fitrah-edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $beras = $this->input->post('beras');
            $uang = $this->input->post('uang');
            $tanggal_input = time();
            $dibuat_oleh = $data['user']['name'];
            $data = [                
                'nama' => $nama,
                'beras' => $beras,
                'uang' => $uang,
                'tanggal_input' => $tanggal_input,
                'dibuat_oleh' => $dibuat_oleh
            ];
            $this->m_mal->updateMal($data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Incoming Mail Has Been Updated</div>');
            redirect('zakat/fitrah');
        }
    }
    public function hapusFitrah1()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->db->delete('tb_fitrah', $where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Zakat Fitrah Dihapus</div>');
        redirect('zakat/fitrah');
    }
    public function kendali()
    {
        require_once('vendor/tecnickcom/tcpdf/examples/tcpdf_include.php');
        $this->load->library('MYPDF');
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $this->load->model('Surat_Model', 'dept');
        $accessDir = $this->dept->getAccessDir($id_user);
        $accessDept = $this->dept->getAccessDept($id_user);
        $accessSec = $this->dept->getAccessSec($id_user);

        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 003');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', 'BI', 12);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $pdf->SetFont('', '', 10);
        $pdf->Cell(277, 10, "NOMOR SURAT", 0, 1, 'L');
        $pdf->Cell(277, 10, "TANGGAL SURAT", 0, 1, 'L');
        $pdf->Cell(277, 10, "DARI", 0, 1, 'L');
        $pdf->Cell(277, 10, "PERIHAL", 0, 1, 'L');

        $left_column = '<div class="col-md-4">
        <input type="checkbox">Ketahui dan File <br>
        <input type="checkbox">Proses Selesai <br>
        <input type="checkbox">Teliti dan Pendapat <br>
        <input type="checkbox">Buatkan Resume <br>
        <input type="checkbox">Edarkan <br>
        <input type="checkbox">Bicarakan dengan saya <br>
        <input type="checkbox">Bicarakan dengan <br><br>
        <input type="checkbox">Sesuai Disposisi<br>
        <input type="checkbox">Teruskan Kepada<br>
        </div>';
        $right_column = '<div class="col-md-4">
        <input type="checkbox">Ketahui dan File <br>
        <input type="checkbox">Proses Selesai <br>
        <input type="checkbox">Teliti dan Pendapat <br>
        <input type="checkbox">Buatkan Resume <br>
        <input type="checkbox">Edarkan <br>
        <input type="checkbox">Bicarakan dengan saya <br>
        <input type="checkbox">Bicarakan dengan <br><br>
        <input type="checkbox">Sesuai Disposisi<br>
        <input type="checkbox">Teruskan Kepada<br>
        </div>';
        //         '<table class="table table-hover col-sm-3">

        // <tbody>
        //     <div class="container">
        //         <div class="row">
        //             <div class="col-md-2"></div>
        //             <div class="col-md-6">
        //                                 <label class="col-sm-8 col-form-label">Disposisi Kepada</label><br>';

        //         foreach ($accessDir as $a) {

        //             $html .= '<input type="checkbox" value="' . $a['id_dir'] . '"> ' . $a['nama_dir'] . ' "<br>"';
        //         }


        //         foreach ($accessDept as $b) {


        //             $html .= '<input type="checkbox" value="' . $b['id_dept'] . '"> ' . $b['nama_dept'] . '"<br>"';
        //         }


        //         foreach ($accessSec as $c) {

        //             $html .= '<input type="checkbox" value="' . $c['id_sec'] . '"> ' . $c['nama_sec'] . ' "<br>"';
        //         }

        //         $html .= '<input type="checkbox">Senior Officer<br>
        // <input type="checkbox">Senior Officer<br>
        // </div>
        // <div class="col-md-6">
        //     <label class="col-sm-8 col-form-label">Catatan</label><br>
        //     <label class="col-sm-8 col-form-label">Catatan</label><br>
        // </div>
        // </div>
        // </div>
        // </tbody>
        // </table>';

        // ---------------------------------------------------------
        $y = $pdf->getY();
        $pdf->writeHTMLCell(80, '', '', $y, $left_column,  true, 'J', true);
        $pdf->writeHTMLCell(80, '', '', '', $right_column,  true, 'J', true);
        // $pdf->writeHTML($left_column, $right_column, true, false, true, false, '');
        //Close and output PDF document
        $pdf->Output('Kartu Kendali.pdf', 'I');
    }
    public function mal()
    {
        $data['title'] = 'Zakat Mal';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['mal'] = $this->db->get_where('tb_mal')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('zakat/mal', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $beras = $this->input->post('beras');
            $uang = $this->input->post('uang');
            $tanggal_input = time();
            $dibuat_oleh = $data['user']['name'];
            $data = [
                'nama' => $nama,
                'beras' => $beras,
                'uang' => $uang,
                'tanggal_input' => $tanggal_input,
                'dibuat_oleh' => $dibuat_oleh
            ];
            $this->db->insert('tb_mal', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Zakat Fitrah Ditambahkan!</div>');
            redirect('zakat/mal');
        }
    }
    public function malUbah()
    {
        $data['title'] = 'Ubah Zakat Mal';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['mal'] = $this->m_mal->malWhere(['id' => $this->uri->segment(3)])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('zakat/mal-edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $beras = $this->input->post('beras');
            $uang = $this->input->post('uang');
            $tanggal_input = time();
            $dibuat_oleh = $data['user']['name'];
            $data = [                
                'nama' => $nama,
                'beras' => $beras,
                'uang' => $uang,
                'tanggal_input' => $tanggal_input,
                'dibuat_oleh' => $dibuat_oleh
            ];
            $this->m_mal->updateMal($data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Incoming Mail Has Been Updated</div>');
            redirect('zakat/mal');
        }
        
    }
    public function malHapus()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->db->delete('tb_mal', $where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Zakat Mal Dihapus</div>');
        redirect('zakat/mal');
    }
}
