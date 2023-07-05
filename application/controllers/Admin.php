<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct(){
		parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('Admin_model');
		
	}
	

	
	public function index()
	{
		$data=array(
			'penduduk'=>$this->Admin_model->total_rows('penduduk'),
			'permohonan'=>$this->Admin_model->total_rows('permohonan'),
			'permohonan_pending'=>$this->Admin_model->total_rows('permohonan','status=0'),
			'permohonan_setuju'=>$this->Admin_model->total_rows('permohonan','status=1'),

		);
        $this->load->view('parsial/head');
		$this->load->view('dashboard',$data);
        $this->load->view('parsial/foot');
	}
}
