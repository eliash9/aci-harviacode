<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Puskesmas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        $this->load->model('Puskesmas_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        
        $this->load->view('navbar');
        $this->load->view('puskesmas/puskesmas_list');
        $this->load->view('footer');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Puskesmas_model->json();
    }

    public function read($id) 
    {
        $row = $this->Puskesmas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'Keterangan' => $row->Keterangan,
	    );
          
            $this->load->view('navbar');
            $this->load->view('puskesmas/puskesmas_read', $data);
            $this->load->view('footer');


        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('puskesmas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('puskesmas/create_action'),
	    'id' => set_value('id'),
	    'Keterangan' => set_value('Keterangan'),
	);
       
        $this->load->view('navbar');
        $this->load->view('puskesmas/puskesmas_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Keterangan' => $this->input->post('Keterangan',TRUE),
	    );

            $this->Puskesmas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('puskesmas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Puskesmas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('puskesmas/update_action'),
		'id' => set_value('id', $row->id),
		'Keterangan' => set_value('Keterangan', $row->Keterangan),
	    );
          
            $this->load->view('navbar');
            $this->load->view('puskesmas/puskesmas_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('puskesmas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'Keterangan' => $this->input->post('Keterangan',TRUE),
	    );

            $this->Puskesmas_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('puskesmas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Puskesmas_model->get_by_id($id);

        if ($row) {
            $this->Puskesmas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('puskesmas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('puskesmas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "puskesmas.xls";
        $judul = "puskesmas";
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

	foreach ($this->Puskesmas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=puskesmas.doc");

        $data = array(
            'puskesmas_data' => $this->Puskesmas_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('puskesmas/puskesmas_doc',$data);
    }

}

/* End of file Puskesmas.php */
/* Location: ./application/controllers/Puskesmas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-30 06:47:55 */
/* http://harviacode.com */