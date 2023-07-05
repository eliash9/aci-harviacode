<?php 
 
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		      
		$this->load->model('m_login');
 
	}
 
	function index(){
		$this->load->view('loginlogin');
	}
 
	function aksi_login(){
		$username = $this->input->post('username');
	//	$password = $this->input->post('password');
		$where = array(
			'username' =>  $this->input->post('username',TRUE),
			'password' =>sha1($this->input->post('password', TRUE)),
			);
		$cek = $this->m_login->cek_login("user",$where)->num_rows();
		if($cek > 0){
			$profil = $this->m_login->cek_login("user",$where)->row();
			$data_session = array(
				'nama' => $username,
				'status' => "login",
				'desa'=>$profil->desa,
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}