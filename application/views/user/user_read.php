<div class="content">
<?php  $this->load->view('parsial/top_bar');?>
         
                    
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-9">
                        <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       User Read
                    </h2>
                </div>
        <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display w-full -mt-2">
	    <tr><td class="border-b-2 whitespace-no-wrap">Name</td><td class="border-b-2 whitespace-no-wrap"><?php echo $name; ?></td></tr>
	    <tr><td class="border-b-2 whitespace-no-wrap">Email</td><td class="border-b-2 whitespace-no-wrap"><?php echo $email; ?></td></tr>
	    <tr><td class="border-b-2 whitespace-no-wrap">Username</td><td class="border-b-2 whitespace-no-wrap"><?php echo $username; ?></td></tr>
	    <tr><td class="border-b-2 whitespace-no-wrap">Desa</td><td class="border-b-2 whitespace-no-wrap"><?php echo $desa; ?></td></tr>
	    <tr><td class="border-b-2 whitespace-no-wrap"></td><td class="border-b-2 whitespace-no-wrap"><a href="<?php echo site_url('user') ?>" class="button w-20 bg-theme-1 text-white mt-3">Cancel</a></td></tr>
	</table></div></div></div>
       