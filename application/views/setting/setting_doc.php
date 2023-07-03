<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Setting List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Tlp</th>
		<th>Email</th>
		<th>Logo</th>
		<th>Website</th>
		<th>Bank Mandiri</th>
		<th>Bank Bca</th>
		<th>Wallet</th>
		
            </tr><?php
            foreach ($setting_data as $setting)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $setting->nama ?></td>
		      <td><?php echo $setting->alamat ?></td>
		      <td><?php echo $setting->tlp ?></td>
		      <td><?php echo $setting->email ?></td>
		      <td><?php echo $setting->logo ?></td>
		      <td><?php echo $setting->website ?></td>
		      <td><?php echo $setting->bank_mandiri ?></td>
		      <td><?php echo $setting->bank_bca ?></td>
		      <td><?php echo $setting->wallet ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>