<?php 
$string="<div class=\"content\">
        
                    
                    <div class=\"col-span-12 lg:col-span-12 xxl:col-span-9\">
                        <div class=\"intro-y flex items-center mt-8\">
                    <h2 class=\"text-lg font-medium mr-auto\">
                       ".ucfirst($table_name)." <?php echo \$button ?>
                    </h2>
                </div>";

$string .= "   <div class=\"col-span-12 lg:col-span-6 xxl:col-span-9 intro-y box p-5\"><form action=\"<?php echo \$action; ?>\" method=\"post\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t    <div class=\"mt-3\">
            <label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <textarea class=\"input w-full border mt-2\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
        </div>";
    } else
    {
    $string .= "\n\t    <div class=\"mt-3\">
            <label for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <input type=\"text\" class=\"input w-full border mt-2\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
        </div>";
    }
}
$string .= "\n\t    <input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"button w-20 bg-theme-1 text-white mt-3\"><?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"button w-20 bg-theme-2 text-white mt-3\">Cancel</a>";
$string .= "\n\t</form></div></div></div>
   ";

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>