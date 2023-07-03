<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelurahan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelurahan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        
        $this->load->view('parsial/head');
        $this->load->view('kelurahan/kelurahan_list');
        $this->load->view('parsial/foot');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kelurahan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kelurahan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kecamatan_id' => $row->kecamatan_id,
		'nama' => $row->nama,
	    );
          
            $this->load->view('parsial/head');
            $this->load->view('kelurahan/kelurahan_read', $data);
            $this->load->view('parsial/foot');


        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelurahan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelurahan/create_action'),
	    'id' => set_value('id'),
	    'kecamatan_id' => set_value('kecamatan_id'),
	    'nama' => set_value('nama'),
	);
       
$this->load->view('parsial/head');
        $this->load->view('kelurahan/kelurahan_form', $data);
        $this->load->view('parsial/foot');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kecamatan_id' => $this->input->post('kecamatan_id',TRUE),
		'nama' => $this->input->post('nama',TRUE),
	    );

            $this->Kelurahan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kelurahan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kelurahan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelurahan/update_action'),
		'id' => set_value('id', $row->id),
		'kecamatan_id' => set_value('kecamatan_id', $row->kecamatan_id),
		'nama' => set_value('nama', $row->nama),
	    );
          
$this->load->view('parsial/head');
            $this->load->view('kelurahan/kelurahan_form', $data);
            $this->load->view('parsial/foot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelurahan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kecamatan_id' => $this->input->post('kecamatan_id',TRUE),
		'nama' => $this->input->post('nama',TRUE),
	    );

            $this->Kelurahan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelurahan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kelurahan_model->get_by_id($id);

        if ($row) {
            $this->Kelurahan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelurahan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelurahan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kecamatan_id', 'kecamatan id', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kelurahan.xls";
        $judul = "kelurahan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");

	foreach ($this->Kelurahan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan_id);
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
        header("Content-Disposition: attachment;Filename=kelurahan.doc");

        $data = array(
            'kelurahan_data' => $this->Kelurahan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kelurahan/kelurahan_doc',$data);
    }

}

/* End of file Kelurahan.php */
/* Location: ./application/controllers/Kelurahan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-03 10:35:15 */
/* http://harviacode.com */