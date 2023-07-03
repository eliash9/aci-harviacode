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
        <h2>Penduduk List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nik</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Nama Lengkap</th>
		<th>Alamat</th>
		<th>No Rt</th>
		<th>No Rw</th>
		<th>No Prop</th>
		<th>Nama Prop</th>
		<th>No Kab</th>
		<th>Nama Kab</th>
		<th>No Kec</th>
		<th>Nama Kec</th>
		<th>No Kel</th>
		<th>Nama Kel</th>
		
            </tr><?php
            foreach ($penduduk_data as $penduduk)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $penduduk->nik ?></td>
		      <td><?php echo $penduduk->nama ?></td>
		      <td><?php echo $penduduk->jenis_kelamin ?></td>
		      <td><?php echo $penduduk->nama_lengkap ?></td>
		      <td><?php echo $penduduk->alamat ?></td>
		      <td><?php echo $penduduk->no_rt ?></td>
		      <td><?php echo $penduduk->no_rw ?></td>
		      <td><?php echo $penduduk->no_prop ?></td>
		      <td><?php echo $penduduk->nama_prop ?></td>
		      <td><?php echo $penduduk->no_kab ?></td>
		      <td><?php echo $penduduk->nama_kab ?></td>
		      <td><?php echo $penduduk->no_kec ?></td>
		      <td><?php echo $penduduk->nama_kec ?></td>
		      <td><?php echo $penduduk->no_kel ?></td>
		      <td><?php echo $penduduk->nama_kel ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>