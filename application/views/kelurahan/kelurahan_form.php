<div class="content">
        
                    
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-9">
                        <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       Kelurahan <?php echo $button ?>
                    </h2>
                </div>   <div class="col-span-12 lg:col-span-6 xxl:col-span-9 intro-y box p-5"><form action="<?php echo $action; ?>" method="post">
	    <div class="mt-3">
            <label for="char">Kecamatan Id <?php echo form_error('kecamatan_id') ?></label>
            <input type="text" class="input w-full border mt-2" name="kecamatan_id" id="kecamatan_id" placeholder="Kecamatan Id" value="<?php echo $kecamatan_id; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="input w-full border mt-2" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Kades <?php echo form_error('kades') ?></label>
            <input type="text" class="input w-full border mt-2" name="kades" id="kades" placeholder="Kades" value="<?php echo $kades; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="input w-full border mt-2" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Telepon <?php echo form_error('telepon') ?></label>
            <input type="text" class="input w-full border mt-2" name="telepon" id="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="button w-20 bg-theme-1 text-white mt-3"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kelurahan') ?>" class="button w-20 bg-theme-2 text-white mt-3">Cancel</a>
	</form></div></div></div>
   