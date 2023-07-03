<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        $this->load->model('Penduduk_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');

        $this->load->model('location_model');   
        $this->load->library('breadcrumb');

            // Add breadcrumbs
            $this->breadcrumb->add('Home', '');
            $this->breadcrumb->add('/Penduduk', '/Penduduk');
           // $this->breadcrumb->add('Product Details');     
    }

    public function index()
    {
        $data['breadcrumbs'] = $this->breadcrumb->render();
        $this->load->view('parsial/head');
        $this->load->view('penduduk/penduduk_list',$data);
        $this->load->view('parsial/foot');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Penduduk_model->json();
    }

    public function read($id) 
    {
        $row = $this->Penduduk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nik' => $row->nik,
		'nama' => $row->nama,
		'jenis_kelamin' => $row->jenis_kelamin,
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
	    );
          
            $this->load->view('parsial/head');
            $this->load->view('penduduk/penduduk_read', $data);
            $this->load->view('parsial/foot');


        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penduduk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('penduduk/create_action'),
	    'id' => set_value('id'),
	    'nik' => set_value('nik'),
	    'nama' => set_value('nama'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
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
        'foto'=>'200x200.jpg',
        'tmp_lahir'=> set_value('tmp_lahir'),
        'tgl_lahir'=> set_value('tgl_lahir'),
	);

        $data['provinces'] = $this->location_model->get_provinces();
        $data['cities'] = array();
        $data['subdistricts'] = array();
        $data['kelurahans'] = array();
       
        $this->load->view('parsial/head');
        $this->load->view('penduduk/penduduk_form', $data);
        $this->load->view('parsial/foot');
    }

    public function get_cities_by_province() {
        $this->load->model('location_model');
        $province_id = $this->input->post('province_id');
        $cities = $this->location_model->get_cities_by_province($province_id);
        echo json_encode($cities);
    }

    public function get_subdistricts_by_city() {
        $this->load->model('location_model');
        $city_id = $this->input->post('city_id');
        $subdistricts = $this->location_model->get_subdistricts_by_city($city_id);
        echo json_encode($subdistricts);
    }

    public function get_kelurahan_by_kecamatan() {
        $this->load->model('location_model');
        $subdistrict_id = $this->input->post('subdistrict_id');
        $kelurahans = $this->location_model->get_kelurahan_by_kecamatan($subdistrict_id);
        echo json_encode($kelurahans);
    }



    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

        		$config['upload_path'] = './uploads/';
			    $config['allowed_types'] = 'gif|jpg|png';
			    $config['max_size'] = 2048; // 2MB

			    $this->load->library('upload', $config);

			    if ($this->upload->do_upload('image')) {
			      $uploadData = $this->upload->data();
			      $uploadData = $this->upload->data();
    				$filename = $uploadData['file_name'];
			      // Save the uploaded image data to the database or perform any other actions

			      // Redirect or show a success message
			     // redirect('upload');
			    } else {
			      $error = $this->upload->display_errors();
			      // Handle the upload error (e.g., show an error message)
			    }



            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		//'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_rt' => $this->input->post('no_rt',TRUE),
		'no_rw' => $this->input->post('no_rw',TRUE),
		'no_prop' => $this->input->post('no_prop',TRUE),
		//'nama_prop' => $this->input->post('nama_prop',TRUE),
		'no_kab' => $this->input->post('no_kab',TRUE),
		//'nama_kab' => $this->input->post('nama_kab',TRUE),
		'no_kec' => $this->input->post('no_kec',TRUE),
		//'nama_kec' => $this->input->post('nama_kec',TRUE),
		'no_kel' => $this->input->post('no_kel',TRUE),
		//'nama_kel' => $this->input->post('nama_kel',TRUE),
		'foto'=>$filename,
        'tmp_lahir'=>$this->input->post('tmp_lahir',TRUE),
        'tgl_lahir'=>$this->input->post('tgl_lahir',TRUE),
	    );

            $this->Penduduk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penduduk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penduduk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penduduk/update_action'),
		'id' => set_value('id', $row->id),
		'nik' => set_value('nik', $row->nik),
		'nama' => set_value('nama', $row->nama),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
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
        'foto'=> set_value('nama_kel', $row->foto),
        'tmp_lahir'=>set_value('nama_kel', $row->tmp_lahir),
        'tgl_lahir'=>set_value('nama_kel', $row->tgl_lahir),

	    );

        $data['provinces'] = $this->location_model->get_provinces();
        $data['cities'] = array();
        $data['subdistricts'] = array();
        $data['kelurahans'] = array();
          
            $this->load->view('parsial/head');
            $this->load->view('penduduk/penduduk_form', $data);
            $this->load->view('parsial/foot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penduduk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules('update');

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {

           
                $config['upload_path'] = './uploads/';
			    $config['allowed_types'] = 'gif|jpg|png';
			    $config['max_size'] = 2048; // 2MB

			    $this->load->library('upload', $config);

			    if ($this->upload->do_upload('image')) {
			      $uploadData = $this->upload->data();
			      $uploadData = $this->upload->data();
    				$filename = $uploadData['file_name'];			    
			    } else {
			      $error = $this->upload->display_errors();
			    }



            $data = array(
				'nik' => $this->input->post('nik',TRUE),
				'nama' => $this->input->post('nama',TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
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
                'foto'=>$filename,
                'tmp_lahir'=>$this->input->post('tmp_lahir',TRUE),
                'tgl_lahir'=>$this->input->post('tgl_lahir',TRUE),
			    );

            $this->Penduduk_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penduduk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penduduk_model->get_by_id($id);

        if ($row) {
            $this->Penduduk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penduduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penduduk'));
        }
    }

    public function _rules($update=null) 
    {
    	if($update=='update'){
 			$this->form_validation->set_rules('nik','NIK', 'trim|required|numeric|min_length[16]|max_length[17]');
    	}else {
    		 $this->form_validation->set_rules('nik','NIK', 'trim|required|numeric|min_length[16]|max_length[17]|is_unique[penduduk.nik]');
    	}
   
	//$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
//	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_rt', 'no rt', 'trim|required');
	$this->form_validation->set_rules('no_rw', 'no rw', 'trim|required');
//	$this->form_validation->set_rules('no_prop', 'no prop', 'trim|required');
//	$this->form_validation->set_rules('nama_prop', 'nama prop', 'trim|required');
//	$this->form_validation->set_rules('no_kab', 'no kab', 'trim|required');
//	$this->form_validation->set_rules('nama_kab', 'nama kab', 'trim|required');
//	$this->form_validation->set_rules('no_kec', 'no kec', 'trim|required');
//	$this->form_validation->set_rules('nama_kec', 'nama kec', 'trim|required');
//	$this->form_validation->set_rules('no_kel', 'no kel', 'trim|required');
//	$this->form_validation->set_rules('nama_kel', 'nama kel', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "penduduk.xls";
        $judul = "penduduk";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
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

	foreach ($this->Penduduk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
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

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=penduduk.doc");

        $data = array(
            'penduduk_data' => $this->Penduduk_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('penduduk/penduduk_doc',$data);
    }

}

/* End of file Penduduk.php */
/* Location: ./application/controllers/Penduduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-30 10:06:48 */
/* http://harviacode.com */