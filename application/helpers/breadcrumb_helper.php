function generate_breadcrumbs($breadcrumbs)
{
    $CI = &get_instance();
    $output = '<ul class="breadcrumb">';
    
    $current_url = $CI->uri->uri_string();
    
    $url_segments = explode('/', $current_url);
    $breadcrumb_url = '';
    
    foreach ($url_segments as $segment)
    {
        $breadcrumb_url .= $segment.'/';
        
        $breadcrumb = array(
            'title' => ucwords(str_replace(array('-', '_'), ' ', $segment)),
            'url' => $breadcrumb_url
        );
        
        $output .= '<li><a href="'.site_url($breadcrumb['url']).'">'.$breadcrumb['title'].'</a></li>';
    }
    
    $output .= '</ul>';
    
    return $output;
}
