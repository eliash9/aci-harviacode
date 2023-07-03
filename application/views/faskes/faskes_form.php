
        <h2 style="margin-top:0px">Faskes <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('faskes') ?>" class="btn btn-default">Cancel</a>
	</form>
   