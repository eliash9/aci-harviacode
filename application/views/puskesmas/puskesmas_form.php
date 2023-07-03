
        <h2 style="margin-top:0px">Puskesmas <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('Keterangan') ?></label>
            <input type="text" class="form-control" name="Keterangan" id="Keterangan" placeholder="Keterangan" value="<?php echo $Keterangan; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('puskesmas') ?>" class="btn btn-default">Cancel</a>
	</form>
   