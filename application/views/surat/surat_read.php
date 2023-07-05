<div class="content">
<?php  $this->load->view('parsial/top_bar');?>
         
                    
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-9">
                        <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       Surat Read
                    </h2>
                </div>
        <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display w-full -mt-2">
	    <tr><td class="border-b-2 whitespace-no-wrap">Keterangan</td><td class="border-b-2 whitespace-no-wrap"><?php echo $keterangan; ?></td></tr>
	    <tr><td class="border-b-2 whitespace-no-wrap">Ttd1</td><td class="border-b-2 whitespace-no-wrap"><?php echo $ttd1; ?></td></tr>
	    <tr><td class="border-b-2 whitespace-no-wrap">Ttd2</td><td class="border-b-2 whitespace-no-wrap"><?php echo $ttd2; ?></td></tr>
	    <tr><td class="border-b-2 whitespace-no-wrap">File</td><td class="border-b-2 whitespace-no-wrap"><?php echo $file; ?></td></tr>
	    <tr><td class="border-b-2 whitespace-no-wrap"></td><td class="border-b-2 whitespace-no-wrap"><a href="<?php echo site_url('surat') ?>" class="button w-20 bg-theme-1 text-white mt-3">Cancel</a></td></tr>
	</table></div></div></div>
       