<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('settings')) {
    function settings($kol) {
        $CI =& get_instance();
        $CI->load->database();
        $CI->db->select($kol);
        
        $query = $CI->db->get('setting');
        foreach ($query->result_array() as $set) {
            $response= $set[$kol];
        }
       // $response['f'] = $query->row($kol);

        return $response;
    }
}

