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
        <h2>Permohonan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nik</th>
		<th>Nama</th>
		<th>Tujuan</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($skck_data as $skck)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $skck->nik ?></td>
		      <td><?php echo $skck->nama ?></td>
		      <td><?php echo $skck->tujuan ?></td>
		      <td><?php echo $skck->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>