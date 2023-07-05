<div class="content">
<?php  $this->load->view('parsial/top_bar');?>
         
                    
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-9">
                        <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       Token Read
                    </h2>
                </div>
        <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display w-full -mt-2">
	    <tr><td class="border-b-2 whitespace-no-wrap">Created On</td><td class="border-b-2 whitespace-no-wrap"><?php echo $created_on; ?></td></tr>
	    <tr><td class="border-b-2 whitespace-no-wrap">Request By</td><td class="border-b-2 whitespace-no-wrap"><?php echo $request_by; ?></td></tr>
	    <tr><td class="border-b-2 whitespace-no-wrap">Needs</td><td class="border-b-2 whitespace-no-wrap"><?php echo $needs; ?></td></tr>
	    <tr><td class="border-b-2 whitespace-no-wrap">Token</td><td class="border-b-2 whitespace-no-wrap"><?php echo $token; ?></td></tr>
	    <tr><td class="border-b-2 whitespace-no-wrap">Qrcode</td><td class="border-b-2 whitespace-no-wrap"><?php echo $qrcode; ?></td></tr>
	    <tr><td class="border-b-2 whitespace-no-wrap">Visited Count</td><td class="border-b-2 whitespace-no-wrap"><?php echo $visited_count; ?></td></tr>
	    <tr><td class="border-b-2 whitespace-no-wrap"></td><td class="border-b-2 whitespace-no-wrap"><a href="<?php echo site_url('sign') ?>" class="button w-20 bg-theme-1 text-white mt-3">Cancel</a></td></tr>
	</table></div></div></div>
       