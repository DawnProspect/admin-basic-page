<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function  __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
    }
    public function index()
    {
        // * Fitur untuk login
        // * Validasi email dan password
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if($this->form_validation->run() == false){
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header');
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // * Validasi login
            $this->_login(); // Method Private login
        }
    }

    private function _login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if($user) {
            if(password_verify($password, $user['password'])) {
                // * Jika password benar, simpan data ke session
                $data = [
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'name' => $user['name'],
                    'position' => $user['position']
                ];
                // * Simpan data ke session
                $this->session->set_userdata($data);
                // * Jika role admin, redirect ke admin
                if($user['role'] == 'admin') {
                    redirect('admin');
                } else {
                    // * Jika role user, redirect ke user
                    redirect('user');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email is not registered.</div>');
        }
    }

    public function registration()
    {
        // * Fitur untuk register
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Create Account';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email'=> htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => "user",
                'position' => "employee",
                'date_created' => time(),
            ];

            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Account has been created! Please login</div>');
            redirect('auth');
        }
    }

    // * Method untuk logout
    public function logout(){
        // * Bagian ini untuk hapus session user dari data yang ada
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');

        // * Ketika session sudah dihapus, bagian ini akan redirect ke halaman login dan menampilkan pesan berhasil logout
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out.</div>');
        redirect('auth');
    }
}
