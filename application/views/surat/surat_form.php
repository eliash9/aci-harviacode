<div class="content">
<?php  $this->load->view('parsial/top_bar');?>
        
                    
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-9">
                        <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       Surat <?php echo $button ?>
                    </h2>
                </div>   <div class="col-span-12 lg:col-span-6 xxl:col-span-9 intro-y box p-5">
                
                <?php echo form_open_multipart($action); ?>
	    <div class="mt-3">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="input w-full border mt-2" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Ttd1 <?php echo form_error('ttd1') ?></label>
            <input type="text" class="input w-full border mt-2" name="ttd1" id="ttd1" placeholder="Ttd1" value="<?php echo $ttd1; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Ttd2 <?php echo form_error('ttd2') ?></label>
            <input type="text" class="input w-full border mt-2" name="ttd2" id="ttd2" placeholder="Ttd2" value="<?php echo $ttd2; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">File <?php echo form_error('file') ?></label>
            <input type="file" class="input w-full border mt-2" name="file" id="file" placeholder="File" value="<?php echo $file; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="button w-20 bg-theme-1 text-white mt-3"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('surat') ?>" class="button w-20 bg-theme-2 text-white mt-3">Cancel</a>
	</form></div></div></div>
   