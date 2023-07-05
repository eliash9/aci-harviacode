<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        $this->load->model('Menus_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'menus/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'menus/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'menus/index.html';
            $config['first_url'] = base_url() . 'menus/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Menus_model->total_rows($q);
        $menus = $this->Menus_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'menus_data' => $menus,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
      
        $this->load->view('parsial/head');
        $this->load->view('menus/menus_list', $data);
        $this->load->view('parsial/foot');
    }

    public function read($id) 
    {
        $row = $this->Menus_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'url' => $row->url,
		'urutan' => $row->urutan,
		'id_parent' => $row->id_parent,
		'status' => $row->status,
	    );
          
            $this->load->view('parsial/head');
            $this->load->view('menus/menus_read', $data);
            $this->load->view('parsial/foot');


        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menus'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menus/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'url' => set_value('url'),
	    'urutan' => set_value('urutan'),
	    'id_parent' => set_value('id_parent'),
	    'status' => set_value('status'),
	);
       
$this->load->view('parsial/head');
        $this->load->view('menus/menus_form', $data);
        $this->load->view('parsial/foot');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'url' => $this->input->post('url',TRUE),
		'urutan' => $this->input->post('urutan',TRUE),
		'id_parent' => $this->input->post('id_parent',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Menus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menus'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Menus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menus/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'url' => set_value('url', $row->url),
		'urutan' => set_value('urutan', $row->urutan),
		'id_parent' => set_value('id_parent', $row->id_parent),
		'status' => set_value('status', $row->status),
	    );
          
$this->load->view('parsial/head');
            $this->load->view('menus/menus_form', $data);
            $this->load->view('parsial/foot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menus'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'url' => $this->input->post('url',TRUE),
		'urutan' => $this->input->post('urutan',TRUE),
		'id_parent' => $this->input->post('id_parent',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Menus_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menus'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Menus_model->get_by_id($id);

        if ($row) {
            $this->Menus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menus'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim|required');
	$this->form_validation->set_rules('urutan', 'urutan', 'trim|required');
	$this->form_validation->set_rules('id_parent', 'id parent', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Menus.php */
/* Location: ./application/controllers/Menus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-27 11:05:56 */
/* http://harviacode.com */