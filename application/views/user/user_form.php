<div class="content">
<?php  $this->load->view('parsial/top_bar');?>
        
                    
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-9">
                        <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       User <?php echo $button ?>
                    </h2>
                </div>   <div class="col-span-12 lg:col-span-6 xxl:col-span-9 intro-y box p-5"><form action="<?php echo $action; ?>" method="post">
	    <div class="mt-3">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="input w-full border mt-2" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="input w-full border mt-2" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="input w-full border mt-2" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="password" class="input w-full border mt-2" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>

       
        <div class="mt-3">
            <label>Desa/Kelurahan:<label for="varchar">Desa <?php echo form_error('desa') ?></label></label>
            <div class="mt-2">
            <select id="desa" class="select2 w-full" name="desa">
                <option value="">Pilih Desa/Kelurahan</option>
                <?php
                    foreach($kelurahans as $kelurahan) {
                        $selected = ($kelurahan['id'] == $desa) ? 'selected' : '';
                        echo '<option value="'.$kelurahan['id'].'"'.$selected.'>'.$kelurahan['nama'].'</option>';
                    }
                    ?>
            </select>

            </div>
        </div>
	   
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="button w-20 bg-theme-1 text-white mt-3"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user') ?>" class="button w-20 bg-theme-2 mt-3">Cancel</a>
	</form></div></div></div>
   