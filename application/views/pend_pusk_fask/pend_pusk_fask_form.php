
        <h2 style="margin-top:0px">Pend_pusk_fask <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nik <?php echo form_error('nik') ?></label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Id Puskesmas <?php echo form_error('id_puskesmas') ?></label>
            <input type="text" class="form-control" name="id_puskesmas" id="id_puskesmas" placeholder="Id Puskesmas" value="<?php echo $id_puskesmas; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Id Faskes <?php echo form_error('id_faskes') ?></label>
            <input type="text" class="form-control" name="id_faskes" id="id_faskes" placeholder="Id Faskes" value="<?php echo $id_faskes; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pend_pusk_fask') ?>" class="btn btn-default">Cancel</a>
	</form>
   