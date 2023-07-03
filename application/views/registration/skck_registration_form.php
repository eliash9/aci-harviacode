<div class="content">
        
                    
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-9">
                        <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       Skck_registration <?php echo $button ?>
                    </h2>
                </div>   <div class="col-span-12 lg:col-span-6 xxl:col-span-9 intro-y box p-5"><form action="<?php echo $action; ?>" method="post">
	    <div class="mt-3">
            <label for="varchar">Applicant Id <?php echo form_error('applicant_id') ?></label>
            <input type="text" class="input w-full border mt-2" name="applicant_id" id="applicant_id" placeholder="Applicant Id" value="<?php echo $applicant_id; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Applicant Name <?php echo form_error('applicant_name') ?></label>
            <input type="text" class="input w-full border mt-2" name="applicant_name" id="applicant_name" placeholder="Applicant Name" value="<?php echo $applicant_name; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Applicant Email <?php echo form_error('applicant_email') ?></label>
            <input type="text" class="input w-full border mt-2" name="applicant_email" id="applicant_email" placeholder="Applicant Email" value="<?php echo $applicant_email; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Unit Type <?php echo form_error('unit_type') ?></label>
            <input type="text" class="input w-full border mt-2" name="unit_type" id="unit_type" placeholder="Unit Type" value="<?php echo $unit_type; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Reg Type <?php echo form_error('reg_type') ?></label>
            <input type="text" class="input w-full border mt-2" name="reg_type" id="reg_type" placeholder="Reg Type" value="<?php echo $reg_type; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Status Type <?php echo form_error('status_type') ?></label>
            <input type="text" class="input w-full border mt-2" name="status_type" id="status_type" placeholder="Status Type" value="<?php echo $status_type; ?>" />
        </div>
	    <div class="mt-3">
            <label for="mediumtext">Purpose Desc <?php echo form_error('purpose_desc') ?></label>
            <input type="text" class="input w-full border mt-2" name="purpose_desc" id="purpose_desc" placeholder="Purpose Desc" value="<?php echo $purpose_desc; ?>" />
        </div>
	    <div class="mt-3">
            <label for="int">Staff Id <?php echo form_error('staff_id') ?></label>
            <input type="text" class="input w-full border mt-2" name="staff_id" id="staff_id" placeholder="Staff Id" value="<?php echo $staff_id; ?>" />
        </div>
	    <div class="mt-3">
            <label for="varchar">Application Id <?php echo form_error('application_id') ?></label>
            <input type="text" class="input w-full border mt-2" name="application_id" id="application_id" placeholder="Application Id" value="<?php echo $application_id; ?>" />
        </div>
	    <div class="mt-3">
            <label for="int">Print Id <?php echo form_error('print_id') ?></label>
            <input type="text" class="input w-full border mt-2" name="print_id" id="print_id" placeholder="Print Id" value="<?php echo $print_id; ?>" />
        </div>
	    <div class="mt-3">
            <label for="timestamp">Timestamps <?php echo form_error('timestamps') ?></label>
            <input type="text" class="input w-full border mt-2" name="timestamps" id="timestamps" placeholder="Timestamps" value="<?php echo $timestamps; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="button w-20 bg-theme-1 text-white mt-3"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('registration') ?>" class="button w-20 bg-theme-2 text-white mt-3">Cancel</a>
	</form></div></div></div>
   