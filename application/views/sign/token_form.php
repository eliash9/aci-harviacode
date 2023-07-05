<div class="content">
<?php  $this->load->view('parsial/top_bar');?>
        
                    
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-9">
                        <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       Token <?php echo $button ?>
                    </h2>
                </div>   <div class="col-span-12 lg:col-span-6 xxl:col-span-9 intro-y box p-5"><form action="<?php echo $action; ?>" method="post">
	    

                <div class="mt-3">
                    <label>Permohonan: </label>
                    <div class="mt-2">
                    <select id="permohonan" class="select2 w-full" name="permohonan" onchange="getSelectedText()">
                   
                        <option value="">Pilih </option>
                        <?php
                       
                        foreach($permohonans as $vpermohonan) {
                                 //   $selected = ($vnik['nik'] === $nik) ? 'selected' : '';
                                    echo '<option data-tujuan="'.$vpermohonan['tujuan'].'" value="'.$vpermohonan['id'].'" '.$selected.'>'.$vpermohonan['nama'].'</option>';

                            
                        }
                        ?>
                    </select>
               
                    </div>
                </div>


	    <div class="mt-3">
            <label for="request_by">Pemohon <?php echo form_error('request_by') ?></label>
            <textarea class="input w-full border mt-2" rows="3" name="request_by" id="request_by" placeholder="Request By"><?php echo $request_by; ?></textarea>
        </div>
	    <div class="mt-3">
            <label for="needs">Tujuan <?php echo form_error('needs') ?></label>
            <textarea class="input w-full border mt-2" rows="3" name="needs" id="needs" placeholder="Needs"><?php echo $needs; ?></textarea>
        </div>	    
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="button w-20 bg-theme-1 text-white mt-3"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sign') ?>" class="button w-20 bg-theme-2 text-white mt-3">Cancel</a>
	</form></div></div></div>
   

     
    <script>
        function getSelectedText() {
                var dropdown = document.getElementById("permohonan");
                var selectedIndex = dropdown.selectedIndex;
                var selectedOption = dropdown.options[selectedIndex];
                var selectedText = dropdown.options[dropdown.selectedIndex].text;
                var selectedData = selectedOption.getAttribute("data-tujuan");
                var selectedValue = dropdown.value;
                document.getElementById("request_by").value= selectedText;
                document.getElementById("needs").value= selectedData;

                console.log("Selected Text: " + selectedText);
                console.log("Selected Value: " + selectedValue);
            }

        </script>