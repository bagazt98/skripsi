<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {

            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'id_roles' => $user['id_roles']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_roles'] == 1) {
                        redirect('admin');
                    }
                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is Not registered</div>');
        }
    }
    // public function registration()
    // {
    //     if ($this->session->userdata('email')) {

    //         redirect('user');
    //     }
    //     $this->form_validation->set_rules('name', 'Name', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', ['is_unique' => 'This Email has already registered!']);
    //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
    //         'matches' => 'password dont match',
    //         'min_length ' => 'Password too Short'
    //     ]);
    //     $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'User Registration';
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('auth/registration');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $email = $this->input->post('email', true);
    //         $data = [
    //             'name' => htmlspecialchars($this->input->post('name', true)),
    //             'email' => htmlspecialchars($email),
    //             'img' => 'default.jpg',
    //             'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //             'id_roles' => 2,
    //             'is_active' => 0,
    //             'date_created' => time()
    //         ];
    //         $token = base64_encode(random_bytes(32));
    //         $user_token = [
    //             'email' => $email,
    //             'token' => $token,
    //             'date_created' => time()

    //         ];
    //         $this->db->insert('tb_user', $data);
    //         $this->db->insert('user_token', $user_token);

    //         $this->_sendEmail($token, 'verify');

    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Activate Your Account!</div>');
    //         redirect('auth');
    //     }
    // }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_roles');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout !</div>');
        redirect('auth');
    }
    // private function _sendEmail($token, $type)
    // {
    //     $config = [
    //         'protocol' => 'smtp',
    //         'smtp_host' => 'ssl://smtp.googlemail.com',
    //         'smtp_user' => 'bagazt12180017@nusamandiri.ac.id',
    //         'smtp_pass' => 'bagazt36148',
    //         'smtp_port' => 465,
    //         'mailtype' => 'html',
    //         'charset' => 'utf-8',
    //         'newline' => "\r\n"

    //     ];
    //     $this->load->library('email', $config);
    //     $this->email->initialize($config);
    //     $this->email->from('bagazt12180017@nusamandiri.ac.id', 'JMTO');
    //     $this->email->to($this->input->post('email'));

    //     if ($type == 'verify') {
    //         $this->email->subject('Account Verification');
    //         $this->email->message('Click this link to verify your account :<a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Active</a>');
    //     } else if ($type == 'forgot') {
    //         $this->email->subject('Reset Password');
    //         $this->email->message('Click this link to reset your password :<a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
    //     }
    //     if ($this->email->send()) {
    //         return true;
    //     } else {
    //         echo $this->mail->print_debugger();
    //         die;
    //     }
    // }
    // public function verify()
    // {
    //     $email = $this->input->get('email');
    //     $token = $this->input->get('token');
    //     $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
    //     if ($user) {
    //         $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
    //         if ($user_token) {
    //             if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
    //                 $this->db->set('is_active', 1);
    //                 $this->db->where('email', $email);
    //                 $this->db->update('tb_user');
    //                 $this->db->delete('user_token', ['email' => $email]);

    //                 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . 'has been activated! Please Login</div>');
    //                 redirect('auth');
    //             } else {
    //                 $this->db->delete('tb_user', ['email' => $email]);
    //                 $this->db->delete('user_token', ['email' => $email]);
    //                 $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Accont Activation failed !Token Expire!!</div>');
    //                 redirect('auth');
    //             }
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Accont Activation failed !Wrong Token!!</div>');
    //             redirect('auth');
    //         }
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Accont Activation failed !Wrong email!!</div>');
    //         redirect('auth');
    //     }
    // }
    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    // public function forgotPassword()
    // {
    //     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Forgot Password';
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('auth/forgot-password');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $email = $this->input->post('email');
    //         $user = $this->db->get_where('tb_user', ['email' => $email, 'is_active' => 1])->row_array();
    //         if ($user) {
    //             $token = base64_encode(random_bytes(32));
    //             $user_token = [
    //                 'email' => $email,
    //                 'token' => $token,
    //                 'date_created' => time()
    //             ];
    //             $this->db->insert('user_token', $user_token);
    //             $this->_sendEmail($token, 'forgot');
    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!!</div>');
    //             redirect('auth/forgotpassword');
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!!</div>');
    //             redirect('auth/forgotpassword');
    //         }
    //     }
    // }
    // public function resetPassword()
    // {
    //     $email = $this->input->get('email');
    //     $token = $this->input->get('token');
    //     $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
    //     if ($user) {
    //         $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
    //         if ($user_token) {
    //             $this->session->set_userdata('reset_email', $email);
    //             $this->changePassword();
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Failed. Wrong Token!!</div>');
    //             redirect('auth/forgotpassword');
    //         }
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Failed. Wrong Email!!</div>');
    //         redirect('auth/forgotpassword');
    //     }
    // }
    // public function changePassword()
    // {
    //     if (!$this->session->userdata('reset_email')) {
    //         redirect('auth');
    //     }
    //     $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
    //     $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[6]|matches[password1]');
    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Change Password';
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('auth/change-password');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
    //         $email = $this->session->userdata('reset_email');
    //         $this->db->set('password', $password);
    //         $this->db->where('email', $email);
    //         $this->db->update('tb_user');
    //         $this->session->unset_userdata('reset_email');
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been change, Please login!!</div>');
    //         redirect('auth');
    //     }
    // }
}
