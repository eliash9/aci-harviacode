<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kecamatan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        
        $this->load->view('parsial/head');
        $this->load->view('kecamatan/kecamatan_list');
        $this->load->view('parsial/foot');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kecamatan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kecamatan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kodya_id' => $row->kodya_id,
		'nama' => $row->nama,
		'id_dagri' => $row->id_dagri,
	    );
          
            $this->load->view('parsial/head');
            $this->load->view('kecamatan/kecamatan_read', $data);
            $this->load->view('parsial/foot');


        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kecamatan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kecamatan/create_action'),
	    'id' => set_value('id'),
	    'kodya_id' => set_value('kodya_id'),
	    'nama' => set_value('nama'),
	    'id_dagri' => set_value('id_dagri'),
	);
       
$this->load->view('parsial/head');
        $this->load->view('kecamatan/kecamatan_form', $data);
        $this->load->view('parsial/foot');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kodya_id' => $this->input->post('kodya_id',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'id_dagri' => $this->input->post('id_dagri',TRUE),
	    );

            $this->Kecamatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kecamatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kecamatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kecamatan/update_action'),
		'id' => set_value('id', $row->id),
		'kodya_id' => set_value('kodya_id', $row->kodya_id),
		'nama' => set_value('nama', $row->nama),
		'id_dagri' => set_value('id_dagri', $row->id_dagri),
	    );
          
$this->load->view('parsial/head');
            $this->load->view('kecamatan/kecamatan_form', $data);
            $this->load->view('parsial/foot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kecamatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kodya_id' => $this->input->post('kodya_id',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'id_dagri' => $this->input->post('id_dagri',TRUE),
	    );

            $this->Kecamatan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kecamatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kecamatan_model->get_by_id($id);

        if ($row) {
            $this->Kecamatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kecamatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kecamatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kodya_id', 'kodya id', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('id_dagri', 'id dagri', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kecamatan.xls";
        $judul = "kecamatan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kodya Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Dagri");

	foreach ($this->Kecamatan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kodya_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_dagri);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kecamatan.doc");

        $data = array(
            'kecamatan_data' => $this->Kecamatan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kecamatan/kecamatan_doc',$data);
    }

}

/* End of file Kecamatan.php */
/* Location: ./application/controllers/Kecamatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-03 10:35:09 */
/* http://harviacode.com */