<?php
class Clogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('parser');

        // Load form helper library
        $this->load->helper('form');

        // Load form validation library
        $this->load->library('form_validation');

        // Load session library
        $this->load->library('session');

        // Load database
        $this->load->model('login_database');
    }

    // Show login page
    public function index()
    {
        $data = array(
            'title' => 'Login Page'
        );
        $this->load->helper('url');
        $this->load->view('header', $data);
        $this->load->view('loginView');
    }

    // Check for user login process
    public function user_login_process()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                redirect('Crud');
            } else {
                $this->load->view('loginView');
            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password'))
            );
            $result = $this->login_database->login($data);
            if ($result == TRUE) {

                $username = $this->input->post('username');
                $result = $this->login_database->read_user_information($username);
                $role = $result[0]->role;
                if ($result != false) {
                    $session_data = array(
                        'username' => $result[0]->user_name,
                        'email' => $result[0]->user_email,
                        'role' => $result[0]->role,
                    );
                    // Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    if ($role == 'admin') {
                        redirect('Crud');
                    } else if ($role == 'user') {
                        redirect('Crud/biasa');
                    } else if ($role == 'mngr') {
                        redirect('Crud/manajer');
                    }
                }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password',
                    'title' => 'Login Page'
                );
                $this->load->view('header', $data);
                $this->load->view('loginView', $data);
            }
        }
    }

    // Logout from admin page
    public function logout()
    {

        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        redirect('Clogin/');
    }
}
