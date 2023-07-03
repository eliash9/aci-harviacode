<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Breadcrumb
{
    protected $CI;
    protected $breadcrumbs = array();

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->helper('url');
    }

    public function add($title, $url = '')
    {
        $this->breadcrumbs[] = array('title' => $title, 'url' => $url);
    }

    public function render()
    {
        $output = '<ul class="breadcrumb"> ';

        foreach ($this->breadcrumbs as $key => $breadcrumb)
        {
            if ($key === array_key_last($this->breadcrumbs))
            {
                $output .= '<li class="active">'.$breadcrumb['title'].'</li>';
            }
            else
            {
                $output .= '<li><a href="'.site_url($breadcrumb['url']).'">'.$breadcrumb['title'].'</a></li>';
            }
        }

        $output .= '</ul>';

        return $output;
    }
}
