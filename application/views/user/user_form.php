<div class="content">
        
                    
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
            <input type="text" class="input w-full border mt-2" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Avatar <?php echo form_error('avatar') ?></label>
            <input type="text" class="input w-full border mt-2" name="avatar" id="avatar" placeholder="Avatar" value="<?php echo $avatar; ?>" />
        </div>
	    <div class="mt-3">
            <label for="timestamp">Created At <?php echo form_error('created_at') ?></label>
            <input type="text" class="input w-full border mt-2" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="mt-3">
            <label for="timestamp">Last Login <?php echo form_error('last_login') ?></label>
            <input type="text" class="input w-full border mt-2" name="last_login" id="last_login" placeholder="Last Login" value="<?php echo $last_login; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="button w-20 bg-theme-1 text-white mt-3"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user') ?>" class="button w-20 bg-theme-2 text-white mt-3">Cancel</a>
	</form></div></div></div>
   