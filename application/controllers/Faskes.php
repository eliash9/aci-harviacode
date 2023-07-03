<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faskes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        $this->load->model('Faskes_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        
        $this->load->view('navbar');
        $this->load->view('faskes/faskes_list');
        $this->load->view('footer');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Faskes_model->json();
    }

    public function read($id) 
    {
        $row = $this->Faskes_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'keterangan' => $row->keterangan,
	    );
          
            $this->load->view('navbar');
            $this->load->view('faskes/faskes_read', $data);
            $this->load->view('footer');


        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faskes'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('faskes/create_action'),
	    'id' => set_value('id'),
	    'keterangan' => set_value('keterangan'),
	);
       
        $this->load->view('navbar');
        $this->load->view('faskes/faskes_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Faskes_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('faskes'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Faskes_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('faskes/update_action'),
		'id' => set_value('id', $row->id),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
          
            $this->load->view('navbar');
            $this->load->view('faskes/faskes_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faskes'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Faskes_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('faskes'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Faskes_model->get_by_id($id);

        if ($row) {
            $this->Faskes_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('faskes'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faskes'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "faskes.xls";
        $judul = "faskes";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Faskes_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=faskes.doc");

        $data = array(
            'faskes_data' => $this->Faskes_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('faskes/faskes_doc',$data);
    }

}

/* End of file Faskes.php */
/* Location: ./application/controllers/Faskes.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-30 06:45:41 */
/* http://harviacode.com */