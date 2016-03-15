<?php
/*
if(!isset($_SESSION))
{
	session_start();
}*/
//we need to start session in order to access it through CI

Class User_Authentication extends CI_Controller {

public function __construct() {
parent::__construct();

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
public function index() {
$this->load->view('login_form');
}

// Check for user login process
public function user_login_process() {

$this->form_validation->set_rules('login', '"Login"', 'trim|required');
$this->form_validation->set_rules('mdp', '"Mot de passe"', 'trim|required');

if ($this->form_validation->run() == FALSE) {
if(isset($this->session->userdata['logged_in'])){
$this->load->view('admin_page');
}else{
$this->load->view('login_form');
}
} else {
$data = array(
'login' => $this->input->post('login'),
'mdp' => $this->input->post('mdp')
);
$result = $this->login_database->login($data);
if ($result == TRUE) {

$username = $this->input->post('login');
$result = $this->login_database->read_user_information($username);
if ($result != false) {
$session_data = array(
'login' => $result[0]->login,
'prenom' => $result[0]->prenom,
);
// Add user data in session
$this->session->set_userdata('logged_in', $session_data);
$this->load->view('admin_page');
}
} else {
$data = array(
'error_message' => 'Login ou mot de passe invalide !'
);
$this->load->view('login_form', $data);
}
}
}

// Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'login' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Deconnecté avec succès !';
$this->load->view('login_form', $data);
}

}

?>