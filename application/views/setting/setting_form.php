<div class="content">
        
                    
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-9">
                        <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       Setting <?php echo $button ?>
                    </h2>
                </div>   <div class="col-span-12 lg:col-span-6 xxl:col-span-9 intro-y box p-5">
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="mt-3">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="input w-full border mt-2" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="input w-full border mt-2" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Tlp <?php echo form_error('tlp') ?></label>
            <input type="text" class="input w-full border mt-2" name="tlp" id="tlp" placeholder="Tlp" value="<?php echo $tlp; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="input w-full border mt-2" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Logo <?php echo form_error('logo') ?></label>
            
            <div class="flex flex-wrap px-4">
                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                    <img class="rounded-md" alt="Midone Tailwind HTML Admin Template" src="<?=base_url('assets/img/') .$logo; ?>">
                    <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2"> <i data-feather="x" class="w-4 h-4"></i> </div>
                </div>
            </div>
            <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                <i data-feather="image" class="w-4 h-4 mr-2"></i> <span class="text-theme-1 mr-1">Upload a file</span>
                <input type="file" name="logo" id="logo" class="w-full h-full top-0 left-0 absolute opacity-0">
            </div>
           
            <!--input type="text" class="input w-full border mt-2" name="logo" id="logo" placeholder="Logo" value="<?php echo $logo; ?>" /-->
        </div>
	    <div class="mt-3">
            <label for="varchar">Website <?php echo form_error('website') ?></label>
           
            <input type="text" class="input w-full border mt-2" name="website" id="website" placeholder="Website" value="<?php echo $website; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Bank Mandiri <?php echo form_error('bank_mandiri') ?></label>
            <input type="text" class="input w-full border mt-2" name="bank_mandiri" id="bank_mandiri" placeholder="Bank Mandiri" value="<?php echo $bank_mandiri; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Bank Bca <?php echo form_error('bank_bca') ?></label>
            <input type="text" class="input w-full border mt-2" name="bank_bca" id="bank_bca" placeholder="Bank Bca" value="<?php echo $bank_bca; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Wallet <?php echo form_error('wallet') ?></label>
            <input type="text" class="input w-full border mt-2" name="wallet" id="wallet" placeholder="Wallet" value="<?php echo $wallet; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="button w-20 bg-theme-1 text-white mt-3"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('setting') ?>" class="button w-20 bg-theme-2 text-white mt-3">Cancel</a>
	</form></div></div></div>
   