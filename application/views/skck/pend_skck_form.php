<div class="content">
<?php  $this->load->view('parsial/top_bar');?>

                    
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-9">
                        <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       Pend_skck <?php echo $button ?>
                    </h2>
                </div>   <div class="col-span-12 lg:col-span-6 xxl:col-span-9 intro-y box p-5"><form action="<?php echo $action; ?>" method="post">
                <div class="mt-3">
                    <label>NIK: </label>
                    <div class="mt-2">
                    <select id="niks" class="select2 w-full" name="nik" onchange="getSelectedText()">
                    <label for="varchar">Nik <?php echo form_error('nik') ?></label>
                        <option value="">Pilih </option>
                        <?php
                        foreach($niks as $vnik) {
                                    $selected = ($vnik['nik'] === $nik) ? 'selected' : '';
                                    echo '<option value="'.$vnik['nik'].'" '.$selected.'>'.$vnik['nama'].'</option>';

                            
                        }
                        ?>
                    </select>
                    <input type="hidden" class="input w-full border mt-2" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
       
                    </div>
                </div>
        
                
	   
	    <div class="mt-3">
            <label for="varchar">Tujuan <?php echo form_error('tujuan') ?></label>
            <input type="text" class="input w-full border mt-2" name="tujuan" id="tujuan" placeholder="Tujuan" value="<?php echo $tujuan; ?>" />
        </div>
	    
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="button w-20 bg-theme-1 text-white mt-3"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('skck') ?>" class="button w-20 bg-theme-2 text-white mt-3">Cancel</a>
	</form></div></div></div>

    <script>
        function getSelectedText() {
    var dropdown = document.getElementById("niks");
    var selectedText = dropdown.options[dropdown.selectedIndex].text;
    var selectedValue = dropdown.value;
    document.getElementById("nama").value= selectedText;

    console.log("Selected Text: " + selectedText);
    console.log("Selected Value: " + selectedValue);
}

        </script>
   