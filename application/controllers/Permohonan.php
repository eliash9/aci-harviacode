<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permohonan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
       
        $this->load->model('Permohonan_model');
        $this->load->model('Penduduk_model');
        $this->load->model('Surat_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        
        $this->load->view('parsial/head');
        $this->load->view('permohonan/permohonan_list');
        $this->load->view('parsial/foot');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Permohonan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Permohonan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nik' => $row->nik,
		'nama' => $row->nama,
		'tujuan' => $row->tujuan,
		'status' => $row->status,
		'permohonan' => $row->permohonan,
	    );
          
            $this->load->view('parsial/head');
            $this->load->view('permohonan/permohonan_read', $data);
            $this->load->view('parsial/foot');


        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permohonan'));
        }
    }

    public function create() 
    {
        
        $data = array(
            'button' => 'Create',
            'action' => site_url('permohonan/create_action'),
	    'id' => set_value('id'),
	    'nik' => set_value('nik'),
	    'nama' => set_value('nama'),
	    'tujuan' => set_value('tujuan'),
	    'status' => set_value('status'),
	    'permohonan' => set_value('permohonan'),
	);
        $data['niks'] = $this->Penduduk_model->get_nik();
        $data['permohonans'] = $this->Surat_model->get_list();
        $this->load->view('parsial/head');
        $this->load->view('permohonan/permohonan_form', $data);
        $this->load->view('parsial/foot');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'tujuan' => $this->input->post('tujuan',TRUE),
		//'status' => $this->input->post('status',TRUE),
		'permohonan' => $this->input->post('permohonan',TRUE),
	    );

            $this->Permohonan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('permohonan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Permohonan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('permohonan/update_action'),
		'id' => set_value('id', $row->id),
		'nik' => set_value('nik', $row->nik),
		'nama' => set_value('nama', $row->nama),
		'tujuan' => set_value('tujuan', $row->tujuan),
		//'status' => set_value('status', $row->status),
		'permohonan' => set_value('permohonan', $row->permohonan),
	    );
            $data['niks'] = $this->Penduduk_model->get_nik();
            $data['permohonans'] = $this->Surat_model->get_list();
            $this->load->view('parsial/head');
            $this->load->view('permohonan/permohonan_form', $data);
            $this->load->view('parsial/foot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permohonan'));
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
		'nama' => $this->input->post('nama',TRUE),
		'tujuan' => $this->input->post('tujuan',TRUE),
		//'status' => $this->input->post('status',TRUE),
		'permohonan' => $this->input->post('permohonan',TRUE),
	    );

            $this->Permohonan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('permohonan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Permohonan_model->get_by_id($id);

        if ($row) {
            $this->Permohonan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('permohonan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permohonan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('tujuan', 'tujuan', 'trim|required');
	//$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('permohonan', 'permohonan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "permohonan.xls";
        $judul = "permohonan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Tujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Permohonan");

	foreach ($this->Permohonan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tujuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->permohonan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=permohonan.doc");

        $data = array(
            'permohonan_data' => $this->Permohonan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('permohonan/permohonan_doc',$data);
    }

}

/* End of file Permohonan.php */
/* Location: ./application/controllers/Permohonan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-04 05:01:37 */
/* http://harviacode.com */