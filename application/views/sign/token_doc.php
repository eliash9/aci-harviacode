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
        <h2>Token List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Created On</th>
		<th>Request By</th>
		<th>Needs</th>
		<th>Token</th>
		<th>Qrcode</th>
		<th>Visited Count</th>
		
            </tr><?php
            foreach ($sign_data as $sign)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $sign->created_on ?></td>
		      <td><?php echo $sign->request_by ?></td>
		      <td><?php echo $sign->needs ?></td>
		      <td><?php echo $sign->token ?></td>
		      <td><?php echo $sign->qrcode ?></td>
		      <td><?php echo $sign->visited_count ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>