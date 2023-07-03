<!doctype html>
<html>
    <head>
        <title>Gubeng</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Data Read</h2>
        <table class="table">
	    <tr><td>Provinsi</td><td><?php echo $provinsi; ?></td></tr>
	    <tr><td>Kabupaten</td><td><?php echo $kabupaten; ?></td></tr>
	    <tr><td>Faskes</td><td><?php echo $faskes; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Kelompok Usia</td><td><?php echo $kelompok_usia; ?></td></tr>
	    <tr><td>Kategori</td><td><?php echo $kategori; ?></td></tr>
	    <tr><td>Sub Kategori</td><td><?php echo $sub_kategori; ?></td></tr>
	    <tr><td>Kanal</td><td><?php echo $kanal; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Nikdisduk</td><td><?php echo $nikdisduk; ?></td></tr>
	    <tr><td>Nama Lengkap</td><td><?php echo $nama_lengkap; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>No Rt</td><td><?php echo $no_rt; ?></td></tr>
	    <tr><td>No Rw</td><td><?php echo $no_rw; ?></td></tr>
	    <tr><td>No Prop</td><td><?php echo $no_prop; ?></td></tr>
	    <tr><td>Nama Prop</td><td><?php echo $nama_prop; ?></td></tr>
	    <tr><td>No Kab</td><td><?php echo $no_kab; ?></td></tr>
	    <tr><td>Nama Kab</td><td><?php echo $nama_kab; ?></td></tr>
	    <tr><td>No Kec</td><td><?php echo $no_kec; ?></td></tr>
	    <tr><td>Nama Kec</td><td><?php echo $nama_kec; ?></td></tr>
	    <tr><td>No Kel</td><td><?php echo $no_kel; ?></td></tr>
	    <tr><td>Nama Kel</td><td><?php echo $nama_kel; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('data') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>