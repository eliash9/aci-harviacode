
<div class="content">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Menus List</h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="col-md-4">
                <?php echo anchor(site_url('menus/create'),'Create', 'class="button text-white bg-theme-1 shadow-md mr-2"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('menus/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('menus'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered -mt-2" style="margin-bottom: 10px" width="100%">
            <tr>
            <th class="border-b-2 whitespace-no-wrap">No</th>
		<th class="border-b-2 whitespace-no-wrap">Nama</th>
		<th class="border-b-2 whitespace-no-wrap">Url</th>
		<th class="border-b-2 whitespace-no-wrap">Urutan</th>
		<th class="border-b-2 whitespace-no-wrap">Id Parent</th>
		<th class="border-b-2 whitespace-no-wrap">Status</th>
		<th class="border-b-2 whitespace-no-wrap">Action</th>
            </tr><?php
            foreach ($menus_data as $menus)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $menus->nama ?></td>
			<td><?php echo $menus->url ?></td>
			<td><?php echo $menus->urutan ?></td>
			<td><?php echo $menus->id_parent ?></td>
			<td><?php echo $menus->status ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('menus/read/'.$menus->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('menus/update/'.$menus->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('menus/delete/'.$menus->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
    