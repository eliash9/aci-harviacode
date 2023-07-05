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
        <h2>Surat List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Keterangan</th>
		<th>Ttd1</th>
		<th>Ttd2</th>
		<th>File</th>
		
            </tr><?php
            foreach ($surat_data as $surat)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $surat->keterangan ?></td>
		      <td><?php echo $surat->ttd1 ?></td>
		      <td><?php echo $surat->ttd2 ?></td>
		      <td><?php echo $surat->file ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>