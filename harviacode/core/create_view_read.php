<?php 

$string="<div class=\"content\">
         
                    
                    <div class=\"col-span-12 lg:col-span-12 xxl:col-span-9\">
                        <div class=\"intro-y flex items-center mt-8\">
                    <h2 class=\"text-lg font-medium mr-auto\">
                       ".ucfirst($table_name)." Read
                    </h2>
                </div>";

$string .= "
        <div class=\"intro-y datatable-wrapper box p-5 mt-5\">
        <table class=\"table table-report table-report--bordered display w-full -mt-2\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td class=\"border-b-2 whitespace-no-wrap\">".label($row["column_name"])."</td><td class=\"border-b-2 whitespace-no-wrap\"><?php echo $".$row["column_name"]."; ?></td></tr>";
}
$string .= "\n\t    <tr><td class=\"border-b-2 whitespace-no-wrap\"></td><td class=\"border-b-2 whitespace-no-wrap\"><a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"button w-20 bg-theme-1 text-white mt-3\">Cancel</a></td></tr>";
$string .= "\n\t</table></div></div></div>
       ";



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>