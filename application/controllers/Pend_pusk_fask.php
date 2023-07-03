<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pend_pusk_fask extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pend_pusk_fask_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        
        $this->load->view('navbar');
        $this->load->view('pend_pusk_fask/pend_pusk_fask_list');
        $this->load->view('footer');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pend_pusk_fask_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pend_pusk_fask_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nik' => $row->nik,
		'id_puskesmas' => $row->id_puskesmas,
		'id_faskes' => $row->id_faskes,
	    );
          
            $this->load->view('navbar');
            $this->load->view('pend_pusk_fask/pend_pusk_fask_read', $data);
            $this->load->view('footer');


        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pend_pusk_fask'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pend_pusk_fask/create_action'),
	    'id' => set_value('id'),
	    'nik' => set_value('nik'),
	    'id_puskesmas' => set_value('id_puskesmas'),
	    'id_faskes' => set_value('id_faskes'),
	);
       
        $this->load->view('navbar');
        $this->load->view('pend_pusk_fask/pend_pusk_fask_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'id_puskesmas' => $this->input->post('id_puskesmas',TRUE),
		'id_faskes' => $this->input->post('id_faskes',TRUE),
	    );

            $this->Pend_pusk_fask_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pend_pusk_fask'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pend_pusk_fask_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pend_pusk_fask/update_action'),
		'id' => set_value('id', $row->id),
		'nik' => set_value('nik', $row->nik),
		'id_puskesmas' => set_value('id_puskesmas', $row->id_puskesmas),
		'id_faskes' => set_value('id_faskes', $row->id_faskes),
	    );
          
            $this->load->view('navbar');
            $this->load->view('pend_pusk_fask/pend_pusk_fask_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pend_pusk_fask'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'id_puskesmas' => $this->input->post('id_puskesmas',TRUE),
		'id_faskes' => $this->input->post('id_faskes',TRUE),
	    );

            $this->Pend_pusk_fask_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pend_pusk_fask'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pend_pusk_fask_model->get_by_id($id);

        if ($row) {
            $this->Pend_pusk_fask_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pend_pusk_fask'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pend_pusk_fask'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('id_puskesmas', 'id puskesmas', 'trim|required');
	$this->form_validation->set_rules('id_faskes', 'id faskes', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pend_pusk_fask.xls";
        $judul = "pend_pusk_fask";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nik");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Puskesmas");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Faskes");

	foreach ($this->Pend_pusk_fask_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_puskesmas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_faskes);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pend_pusk_fask.doc");

        $data = array(
            'pend_pusk_fask_data' => $this->Pend_pusk_fask_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pend_pusk_fask/pend_pusk_fask_doc',$data);
    }

}

/* End of file Pend_pusk_fask.php */
/* Location: ./application/controllers/Pend_pusk_fask.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-30 09:45:37 */
/* http://harviacode.com */