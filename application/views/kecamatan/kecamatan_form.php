<div class="content">
        
                    
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-9">
                        <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       Kecamatan <?php echo $button ?>
                    </h2>
                </div>   <div class="col-span-12 lg:col-span-6 xxl:col-span-9 intro-y box p-5"><form action="<?php echo $action; ?>" method="post">
	    <div class="mt-3">
            <label for="char">Kodya Id <?php echo form_error('kodya_id') ?></label>
            <input type="text" class="input w-full border mt-2" name="kodya_id" id="kodya_id" placeholder="Kodya Id" value="<?php echo $kodya_id; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="input w-full border mt-2" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="mt-3">
            <label for="char">Id Dagri <?php echo form_error('id_dagri') ?></label>
            <input type="text" class="input w-full border mt-2" name="id_dagri" id="id_dagri" placeholder="Id Dagri" value="<?php echo $id_dagri; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="button w-20 bg-theme-1 text-white mt-3"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kecamatan') ?>" class="button w-20 bg-theme-2 text-white mt-3">Cancel</a>
	</form></div></div></div>
   