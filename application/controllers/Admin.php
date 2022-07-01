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
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dash', $data);
        $this->load->view('templates/footer');
    }
    public function coba()
    {
        $data['title'] = 'Cobain';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/coba', $data);
        $this->load->view('templates/footer');
    }
    public function roleUbah()
    {
        $data['title'] = 'Ubah Role';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->m_role->roleWhere(['id_roles' => $this->uri->segment(3)])->row_array();
        $this->form_validation->set_rules('rd', 'Nama Roles', 'required', [
            'required' => 'Nama Roles Harus Di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role-edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_roles' => $this->input->post('rd', true)
            ];
            $this->m_role->updateRole($data, ['id_roles' => $this->input->post('id')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Roles Has Been Updated</div>');
            redirect('admin/role');
        }
    }

    public function roleHapus()
    {
        $where = ['id_roles' => $this->uri->segment(3)];
        $this->m_role->hapusRole($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Roles has been Deleted</div>');
        redirect('admin/role');
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('tb_roles')->result_array();
        $this->form_validation->set_rules('rol', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('tb_roles', ['nama_roles' => $this->input->post('rol')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Roles Added!</div>');
            redirect('admin/role');
        }
    }
    public function roleAccess($id_roles)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('tb_roles', ['id_roles' => $id_roles])->row_array();
        $this->db->where('id !=', 1);

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }
    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'id_roles' => $role_id,
            'id_menu' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function group()
    {
        $data['title'] = 'User';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['grup'] = $this->db->get_where('tb_user')->result_array();
        $data['role'] = $this->db->get_where('tb_roles')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', ['is_unique' => 'This Email has already registered!']);
        $this->form_validation->set_rules('roles', 'Roles', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/group', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $gambar = $_FILES['img']['name'];
            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('img')) {
                    $old_image = $data['user']['img'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('img', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $roles = $this->input->post('roles');
            $is_active = $this->input->post('is_active');
            $data = [
                'name' => $nama,
                'email' => $email,
                'img' => $new_image,
                'password' => password_hash(('123456'), PASSWORD_DEFAULT),
                'id_roles' => $roles,
                'is_active' => $is_active,
                'date_created' => time()
            ];
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Ditambahkan!</div>');
            redirect('admin/group');
        }
    }

    public function userHapus()
    {
        $where = ['id_user' => $this->uri->segment(3)];
        $this->m_user->hapusUser($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User has been Deleted</div>');
        redirect('admin/group');
    }

    public function groupUser($id_user)
    {
        $data['title'] = 'Group Departement';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['grup'] = $this->db->get_where('tb_user', ['id_user' => $id_user])->row_array();
        $data['dept'] = $this->db->get('tb_dept')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/group-user', $data);
        $this->load->view('templates/footer');
    }
    public function groupAccess()
    {
        $dept_id = $this->input->post('deptId');
        $user_id = $this->input->post('userId');

        $data = [
            'id_user' => $user_id,
            'id_dept' => $dept_id
        ];
        $result = $this->db->get_where('user_access_dept', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_dept', $data);
        } else {
            $this->db->delete('user_access_dept', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }
    public function deptUbah()
    {
        $data['title'] = 'Ubah Department';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['dept'] = $this->m_dept->deptWhere(['id_dept' => $this->uri->segment(3)])->row_array();
        $this->form_validation->set_rules('kd', 'Kode Surat', 'required', [
            'required' => 'Kode Surat Harus Di isi'
        ]);
        $this->form_validation->set_rules('rd', 'Nama Department', 'required', [
            'required' => 'Nama Department Harus Di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/dept-edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_surat' => $this->input->post('kd', true),
                'nama_dept' => $this->input->post('rd', true)
            ];
            $this->m_dept->updateDept($data, ['id_dept' => $this->input->post('id')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Department Has Been Updated</div>');
            redirect('admin/dept');
        }
    }
    public function deptHapus()
    {
        $where = ['id_dept' => $this->uri->segment(3)];
        $this->m_dept->hapusDept($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Department has been Deleted</div>');
        redirect('admin/dept');
    }

    public function groupSec($id_user)
    {
        $data['title'] = 'Group Section';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['grup'] = $this->db->get_where('tb_user', ['id_user' => $id_user])->row_array();
        $data['sec'] = $this->db->get('tb_section')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/section-grup', $data);
        $this->load->view('templates/footer');
    }
    public function secAccess()
    {
        $sec_id = $this->input->post('secId');
        $user_id = $this->input->post('userId');

        $data = [
            'id_user' => $user_id,
            'id_sec' => $sec_id
        ];
        $result = $this->db->get_where('user_access_sec', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_sec', $data);
        } else {
            $this->db->delete('user_access_sec', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }
    public function secUbah()
    {
        $data['title'] = 'Ubah Section';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['sec'] = $this->m_sec->secWhere(['id_sec' => $this->uri->segment(3)])->row_array();
        $this->form_validation->set_rules('rd', 'Nama Section', 'required', [
            'required' => 'Nama Section Harus Di isi'
        ]);
        $this->form_validation->set_rules('kd', 'Kode Surat', 'required', [
            'required' => 'Kode Surat Harus Di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/section-edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_surat' => $this->input->post('kd', true),
                'nama_sec' => $this->input->post('rd', true)
            ];
            $this->m_sec->updateSec($data, ['id_sec' => $this->input->post('id')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Section Has Been Updated</div>');
            redirect('admin/section');
        }
    }
    public function secHapus()
    {
        $where = ['id_sec' => $this->uri->segment(3)];
        $this->m_sec->hapusSec($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Section has been Deleted</div>');
        redirect('admin/section');
    }

    public function groupDir($id_user)
    {
        $data['title'] = 'Group Direktorat';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['grup'] = $this->db->get_where('tb_user', ['id_user' => $id_user])->row_array();
        $data['dir'] = $this->db->get('tb_dir')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dir-grup', $data);
        $this->load->view('templates/footer');
    }
    public function dirAccess()
    {
        $dir_id = $this->input->post('dirId');
        $user_id = $this->input->post('userId');

        $data = [
            'id_user' => $user_id,
            'id_dir' => $dir_id
        ];
        $result = $this->db->get_where('user_access_dir', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_dir', $data);
        } else {
            $this->db->delete('user_access_dir', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }
    public function dirUbah()
    {
        $data['title'] = 'Ubah Direktorat';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('m_dir');

        $data['dir'] = $this->m_dir->dirWhere(['id_dir' => $this->uri->segment(3)])->row_array();
        $this->form_validation->set_rules('kd', 'Kode Surat', 'required', [
            'required' => 'Kode Surat Harus Di isi'
        ]);
        $this->form_validation->set_rules('rd', 'Nama Direktorat', 'required', [
            'required' => 'Nama Direktorat Harus Di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/dir-edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_surat' => $this->input->post('kd', true),
                'nama_dir' => $this->input->post('rd', true)
            ];
            $this->m_dir->updateDir($data, ['id_dir' => $this->input->post('id')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Direktorat Has Been Updated</div>');
            redirect('admin/dir');
        }
    }
    public function dirHapus()
    {
        $this->load->model('m_dir');
        $where = ['id_dir' => $this->uri->segment(3)];
        $this->m_dir->hapusDir($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Direktorat has been Deleted</div>');
        redirect('admin/dir');
    }

    public function dir()
    {
        $data['title'] = 'Direktorat Management';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['dir'] = $this->db->get('tb_dir')->result_array();

        $this->form_validation->set_rules('kd', 'Kode Surat', 'required');
        $this->form_validation->set_rules('dir', 'Direktorat', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/dir', $data);
            $this->load->view('templates/footer');
        } else {
            $kd = $this->input->post('kd');
            $dir = $this->input->post('dir');
            $data = [
                'kd_surat' => $kd,
                'nama_dir' => $dir
            ];
            $this->db->insert('tb_dir', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Section Added!</div>');
            redirect('admin/dir');
        }
    }
    public function dept()
    {
        $data['title'] = 'Departement Management';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['depar'] = $this->db->get('tb_dept')->result_array();

        $this->form_validation->set_rules('depar', 'Departement', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/dept', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('tb_dept', ['nama_dept' => $this->input->post('depar')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Departement Added!</div>');
            redirect('admin/dept');
        }
    }
    public function section()
    {
        $data['title'] = 'Section Management';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['section'] = $this->db->get('tb_section')->result_array();

        $this->form_validation->set_rules('kd', 'Kode Section', 'required');
        $this->form_validation->set_rules('sec', 'Section', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/section', $data);
            $this->load->view('templates/footer');
        } else {
            $kd = $this->input->post('kd');
            $sec = $this->input->post('sec');
            $data = [
                'kd_surat' => $kd,
                'nama_section' => $sec
            ];
            $this->db->insert('tb_section', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Section Added!</div>');
            redirect('admin/section');
        }
    }
}
