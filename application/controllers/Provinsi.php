<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Provinsi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Provinsi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        
        $this->load->view('parsial/head');
        $this->load->view('provinsi/provinsi_list');
        $this->load->view('parsial/foot');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Provinsi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Provinsi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
	    );
          
            $this->load->view('parsial/head');
            $this->load->view('provinsi/provinsi_read', $data);
            $this->load->view('parsial/foot');


        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('provinsi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('provinsi/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	);
       
$this->load->view('parsial/head');
        $this->load->view('provinsi/provinsi_form', $data);
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
	    );

            $this->Provinsi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('provinsi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Provinsi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('provinsi/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
	    );
          
$this->load->view('parsial/head');
            $this->load->view('provinsi/provinsi_form', $data);
            $this->load->view('parsial/foot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('provinsi'));
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
	    );

            $this->Provinsi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('provinsi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Provinsi_model->get_by_id($id);

        if ($row) {
            $this->Provinsi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('provinsi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('provinsi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "provinsi.xls";
        $judul = "provinsi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");

	foreach ($this->Provinsi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=provinsi.doc");

        $data = array(
            'provinsi_data' => $this->Provinsi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('provinsi/provinsi_doc',$data);
    }

}

/* End of file Provinsi.php */
/* Location: ./application/controllers/Provinsi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-03 10:34:16 */
/* http://harviacode.com */