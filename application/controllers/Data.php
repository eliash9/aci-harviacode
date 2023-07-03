<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('data/data_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Data_model->json();
    }

    public function read($id) 
    {
        $row = $this->Data_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'provinsi' => $row->provinsi,
		'kabupaten' => $row->kabupaten,
		'faskes' => $row->faskes,
		'nik' => $row->nik,
		'nama' => $row->nama,
		'jenis_kelamin' => $row->jenis_kelamin,
		'kelompok_usia' => $row->kelompok_usia,
		'kategori' => $row->kategori,
		'sub_kategori' => $row->sub_kategori,
		'kanal' => $row->kanal,
		'status' => $row->status,
		'nikdisduk' => $row->nikdisduk,
		'nama_lengkap' => $row->nama_lengkap,
		'alamat' => $row->alamat,
		'no_rt' => $row->no_rt,
		'no_rw' => $row->no_rw,
		'no_prop' => $row->no_prop,
		'nama_prop' => $row->nama_prop,
		'no_kab' => $row->no_kab,
		'nama_kab' => $row->nama_kab,
		'no_kec' => $row->no_kec,
		'nama_kec' => $row->nama_kec,
		'no_kel' => $row->no_kel,
		'nama_kel' => $row->nama_kel,
		'puskesmas' => $row->puskesmas,
	    );
            $this->load->view('data/data_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data/create_action'),
	    'id' => set_value('id'),
	    'provinsi' => set_value('provinsi'),
	    'kabupaten' => set_value('kabupaten'),
	    'faskes' => set_value('faskes'),
	    'nik' => set_value('nik'),
	    'nama' => set_value('nama'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'kelompok_usia' => set_value('kelompok_usia'),
	    'kategori' => set_value('kategori'),
	    'sub_kategori' => set_value('sub_kategori'),
	    'kanal' => set_value('kanal'),
	    'status' => set_value('status'),
	    'nikdisduk' => set_value('nikdisduk'),
	    'nama_lengkap' => set_value('nama_lengkap'),
	    'alamat' => set_value('alamat'),
	    'no_rt' => set_value('no_rt'),
	    'no_rw' => set_value('no_rw'),
	    'no_prop' => set_value('no_prop'),
	    'nama_prop' => set_value('nama_prop'),
	    'no_kab' => set_value('no_kab'),
	    'nama_kab' => set_value('nama_kab'),
	    'no_kec' => set_value('no_kec'),
	    'nama_kec' => set_value('nama_kec'),
	    'no_kel' => set_value('no_kel'),
	    'nama_kel' => set_value('nama_kel'),
	    'puskesmas' => set_value('puskesmas'),
	);
        $this->load->view('data/data_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'faskes' => $this->input->post('faskes',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'kelompok_usia' => $this->input->post('kelompok_usia',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
		'sub_kategori' => $this->input->post('sub_kategori',TRUE),
		'kanal' => $this->input->post('kanal',TRUE),
		'status' => $this->input->post('status',TRUE),
		'nikdisduk' => $this->input->post('nikdisduk',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_rt' => $this->input->post('no_rt',TRUE),
		'no_rw' => $this->input->post('no_rw',TRUE),
		'no_prop' => $this->input->post('no_prop',TRUE),
		'nama_prop' => $this->input->post('nama_prop',TRUE),
		'no_kab' => $this->input->post('no_kab',TRUE),
		'nama_kab' => $this->input->post('nama_kab',TRUE),
		'no_kec' => $this->input->post('no_kec',TRUE),
		'nama_kec' => $this->input->post('nama_kec',TRUE),
		'no_kel' => $this->input->post('no_kel',TRUE),
		'nama_kel' => $this->input->post('nama_kel',TRUE),
	    );

            $this->Data_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data/update_action'),
		'id' => set_value('id', $row->id),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'kabupaten' => set_value('kabupaten', $row->kabupaten),
		'faskes' => set_value('faskes', $row->faskes),
		'nik' => set_value('nik', $row->nik),
		'nama' => set_value('nama', $row->nama),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'kelompok_usia' => set_value('kelompok_usia', $row->kelompok_usia),
		'kategori' => set_value('kategori', $row->kategori),
		'sub_kategori' => set_value('sub_kategori', $row->sub_kategori),
		'kanal' => set_value('kanal', $row->kanal),
		'status' => set_value('status', $row->status),
		'nikdisduk' => set_value('nikdisduk', $row->nikdisduk),
		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
		'alamat' => set_value('alamat', $row->alamat),
		'no_rt' => set_value('no_rt', $row->no_rt),
		'no_rw' => set_value('no_rw', $row->no_rw),
		'no_prop' => set_value('no_prop', $row->no_prop),
		'nama_prop' => set_value('nama_prop', $row->nama_prop),
		'no_kab' => set_value('no_kab', $row->no_kab),
		'nama_kab' => set_value('nama_kab', $row->nama_kab),
		'no_kec' => set_value('no_kec', $row->no_kec),
		'nama_kec' => set_value('nama_kec', $row->nama_kec),
		'no_kel' => set_value('no_kel', $row->no_kel),
		'nama_kel' => set_value('nama_kel', $row->nama_kel),
		'puskesmas' => set_value('puskesmas', $row->puskesmas),
	    );
            $this->load->view('data/data_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'faskes' => $this->input->post('faskes',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'kelompok_usia' => $this->input->post('kelompok_usia',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
		'sub_kategori' => $this->input->post('sub_kategori',TRUE),
		'kanal' => $this->input->post('kanal',TRUE),
		'status' => $this->input->post('status',TRUE),
		'nikdisduk' => $this->input->post('nikdisduk',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_rt' => $this->input->post('no_rt',TRUE),
		'no_rw' => $this->input->post('no_rw',TRUE),
		'no_prop' => $this->input->post('no_prop',TRUE),
		'nama_prop' => $this->input->post('nama_prop',TRUE),
		'no_kab' => $this->input->post('no_kab',TRUE),
		'nama_kab' => $this->input->post('nama_kab',TRUE),
		'no_kec' => $this->input->post('no_kec',TRUE),
		'nama_kec' => $this->input->post('nama_kec',TRUE),
		'no_kel' => $this->input->post('no_kel',TRUE),
		'nama_kel' => $this->input->post('nama_kel',TRUE),
	    );

            $this->Data_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_model->get_by_id($id);

        if ($row) {
            $this->Data_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
	$this->form_validation->set_rules('faskes', 'faskes', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('kelompok_usia', 'kelompok usia', 'trim|required');
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
	$this->form_validation->set_rules('sub_kategori', 'sub kategori', 'trim|required');
	$this->form_validation->set_rules('kanal', 'kanal', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('nikdisduk', 'nikdisduk', 'trim|required');
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_rt', 'no rt', 'trim|required');
	$this->form_validation->set_rules('no_rw', 'no rw', 'trim|required');
	$this->form_validation->set_rules('no_prop', 'no prop', 'trim|required');
	$this->form_validation->set_rules('nama_prop', 'nama prop', 'trim|required');
	$this->form_validation->set_rules('no_kab', 'no kab', 'trim|required');
	$this->form_validation->set_rules('nama_kab', 'nama kab', 'trim|required');
	$this->form_validation->set_rules('no_kec', 'no kec', 'trim|required');
	$this->form_validation->set_rules('nama_kec', 'nama kec', 'trim|required');
	$this->form_validation->set_rules('no_kel', 'no kel', 'trim|required');
	$this->form_validation->set_rules('nama_kel', 'nama kel', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "data.xls";
        $judul = "data";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Kabupaten");
	xlsWriteLabel($tablehead, $kolomhead++, "Faskes");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Usia");
	xlsWriteLabel($tablehead, $kolomhead++, "Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Sub Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Kanal");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Nikdisduk");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "No Rt");
	xlsWriteLabel($tablehead, $kolomhead++, "No Rw");
	xlsWriteLabel($tablehead, $kolomhead++, "No Prop");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Prop");
	xlsWriteLabel($tablehead, $kolomhead++, "No Kab");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kab");
	xlsWriteLabel($tablehead, $kolomhead++, "No Kec");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kec");
	xlsWriteLabel($tablehead, $kolomhead++, "No Kel");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kel");

	foreach ($this->Data_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kabupaten);
	    xlsWriteLabel($tablebody, $kolombody++, $data->faskes);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kelompok_usia);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sub_kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kanal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nikdisduk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_rt);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_rw);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_prop);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_prop);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_kab);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kab);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_kec);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kec);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_kel);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kel);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Data.php */
/* Location: ./application/controllers/Data.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-29 11:16:48 */
/* http://harviacode.com */