<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('generate_menu')) {
    function generate_menu($parent_id = 0) {
        $CI =& get_instance();
        $CI->load->database();

        $CI->db->where('id_parent', $parent_id);
        $CI->db->where('status', 'aktif');
        $CI->db->order_by('urutan', 'asc');
        $query = $CI->db->get('menus');

        $menu_html = '';
        $page = $CI->uri->segment(1);
        $subpage = $CI->uri->segment(2);
        if($subpage!=""){
            $open = "side-menu__sub-open";
        }else {
            $open="";
        }
        
     
        $menu_html .= "<ul class=''>";
        foreach ($query->result_array() as $menu) {
            if($page== $menu['url'] || $menu['url'] == $page.'/'.$subpage){
                $active= 'side-menu side-menu--active';
            }else {
                $active= 'side-menu';
            }

            if($parent_id==0){               
                $chev="<i data-feather='chevron-down' class='side-menu__sub-icon'></i>";
                $url='javascript:;';
                $menu_html .= "<li><a href='" . $url . "'  class=' ".$active."'><div class='side-menu__icon'> <i data-feather='box'></i> </div><div class='side-menu__title'> " . $menu['nama'] .$chev. " </div></a>";
                $menu_html .= generate_menu($menu['id']); // Menyusun submenu secara rekursif
                $menu_html .= "</li>";
            }else {
                
                $chev='';
                $url= base_url($menu['url']); 
                $menu_html .= "<li><a href='" . $url . "'  class=' ".$active."'><div class='side-menu__icon'> <i data-feather='box'></i> </div><div class='side-menu__title'> " . $menu['nama'] .$chev. " </div></a>";
                $menu_html .= generate_menu($menu['id']); // Menyusun submenu secara rekursif
                $menu_html .= "</li>";
         }
        }
        $menu_html .= "</ul>";
        return $menu_html;
    }
}

