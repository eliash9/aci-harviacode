<?php 

$string = "
<div class=\"content\">
    <div class=\"intro-y flex flex-col sm:flex-row items-center mt-8\">
    <h2 class=\"text-lg font-medium mr-auto\">".ucfirst($table_name)." List</h2>
    <div class=\"w-full sm:w-auto flex mt-4 sm:mt-0\">
            <div class=\"col-md-4\">
                <?php echo anchor(site_url('".$c_url."/create'),'Create', 'class=\"button text-white bg-theme-1 shadow-md mr-2\"'); ?>
            </div>
            <div class=\"col-md-4 text-center\">
                <div style=\"margin-top: 8px\" id=\"message\">
                    <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class=\"col-md-1 text-right\">
            </div>
            <div class=\"col-md-3 text-right\">
                <form action=\"<?php echo site_url('$c_url/index'); ?>\" class=\"form-inline\" method=\"get\">
                    <div class=\"input-group\">
                        <input type=\"text\" class=\"form-control\" name=\"q\" value=\"<?php echo \$q; ?>\">
                        <span class=\"input-group-btn\">
                            <?php 
                                if (\$q <> '')
                                {
                                    ?>
                                    <a href=\"<?php echo site_url('$c_url'); ?>\" class=\"btn btn-default\">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class=\"btn btn-primary\" type=\"submit\">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class=\"intro-y datatable-wrapper box p-5 mt-5\">
        <table class=\"table table-report table-report--bordered -mt-2\" style=\"margin-bottom: 10px\" width=\"100%\">
            <tr>
            <th class=\"border-b-2 whitespace-no-wrap\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t<th class=\"border-b-2 whitespace-no-wrap\">" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t<th class=\"border-b-2 whitespace-no-wrap\">Action</th>
            </tr>";
$string .= "<?php
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
                <tr>";

$string .= "\n\t\t\t<td width=\"80px\"><?php echo ++\$start ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t<td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}


$string .= "\n\t\t\t<td style=\"text-align:center\" width=\"200px\">"
        . "\n\t\t\t\t<?php "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/read/'.$".$c_url."->".$pk."),'Read'); "
        . "\n\t\t\t\techo ' | '; "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/update/'.$".$c_url."->".$pk."),'Update'); "
        . "\n\t\t\t\techo ' | '; "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),'Delete','onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"'); "
        . "\n\t\t\t\t?>"
        . "\n\t\t\t</td>";

$string .=  "\n\t\t</tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class=\"row\">
            <div class=\"col-md-6\">
                <a href=\"#\" class=\"btn btn-primary\">Total Record : <?php echo \$total_rows ?></a>";
if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), 'Excel', 'class=\"btn btn-primary\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), 'Word', 'class=\"btn btn-primary\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-primary\"'); ?>";
}
$string .= "\n\t    </div>
            <div class=\"col-md-6 text-right\">
                <?php echo \$pagination ?>
            </div>
        </div>
        </div>
    ";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>