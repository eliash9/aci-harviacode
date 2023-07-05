<?php 
class Location_model extends CI_Model {

    public function get_provinces() {
        $query = $this->db->get('provinsi');
        return $query->result_array();
    }

    public function get_cities_by_province($province_id) {
        $query = $this->db->get_where('kodya', array('provinsi_id' => $province_id));
        return $query->result_array();
    }

    public function get_subdistricts_by_city($city_id) {
        $query = $this->db->get_where('kecamatan', array('kodya_id' => $city_id));
        return $query->result_array();
    }

    public function get_kelurahan_by_kecamatan($kecamatan_id) {
        $query = $this->db->get_where('kelurahan', array('kecamatan_id' => $kecamatan_id));
        return $query->result_array();
    }

    public function get_desa() {
        $query = $this->db->get_where('kelurahan', array('kecamatan_id' => '3514080'));
        return $query->result_array();
    }

}
