<div class="content">
        
                    
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-9">
                        <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       Menus <?php echo $button ?>
                    </h2>
                </div>   <div class="col-span-12 lg:col-span-6 xxl:col-span-9 intro-y box p-5"><form action="<?php echo $action; ?>" method="post">
	    <div class="mt-3">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="input w-full border mt-2" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Url <?php echo form_error('url') ?></label>
            <input type="text" class="input w-full border mt-2" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" />
        </div>
	    <div class="mt-3">
            <label for="int">Urutan <?php echo form_error('urutan') ?></label>
            <input type="text" class="input w-full border mt-2" name="urutan" id="urutan" placeholder="Urutan" value="<?php echo $urutan; ?>" />
        </div>
	    <div class="mt-3">
            <label for="int">Id Parent <?php echo form_error('id_parent') ?></label>
            <input type="text" class="input w-full border mt-2" name="id_parent" id="id_parent" placeholder="Id Parent" value="<?php echo $id_parent; ?>" />
        </div>
	    <div class="mt-3">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <input type="text" class="input w-full border mt-2" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="button w-20 bg-theme-1 text-white mt-3"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('menus') ?>" class="button w-20 bg-theme-2 text-white mt-3">Cancel</a>
	</form></div></div></div>
   