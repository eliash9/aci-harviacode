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
        <h2 style="margin-top:0px">Data <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Provinsi <?php echo form_error('provinsi') ?></label>
            <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kabupaten <?php echo form_error('kabupaten') ?></label>
            <input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?php echo $kabupaten; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Faskes <?php echo form_error('faskes') ?></label>
            <input type="text" class="form-control" name="faskes" id="faskes" placeholder="Faskes" value="<?php echo $faskes; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kelompok Usia <?php echo form_error('kelompok_usia') ?></label>
            <input type="text" class="form-control" name="kelompok_usia" id="kelompok_usia" placeholder="Kelompok Usia" value="<?php echo $kelompok_usia; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kategori <?php echo form_error('kategori') ?></label>
            <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo $kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Sub Kategori <?php echo form_error('sub_kategori') ?></label>
            <input type="text" class="form-control" name="sub_kategori" id="sub_kategori" placeholder="Sub Kategori" value="<?php echo $sub_kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kanal <?php echo form_error('kanal') ?></label>
            <input type="text" class="form-control" name="kanal" id="kanal" placeholder="Kanal" value="<?php echo $kanal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Nikdisduk <?php echo form_error('nikdisduk') ?></label>
            <input type="text" class="form-control" name="nikdisduk" id="nikdisduk" placeholder="Nikdisduk" value="<?php echo $nikdisduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Rt <?php echo form_error('no_rt') ?></label>
            <input type="text" class="form-control" name="no_rt" id="no_rt" placeholder="No Rt" value="<?php echo $no_rt; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Rw <?php echo form_error('no_rw') ?></label>
            <input type="text" class="form-control" name="no_rw" id="no_rw" placeholder="No Rw" value="<?php echo $no_rw; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Prop <?php echo form_error('no_prop') ?></label>
            <input type="text" class="form-control" name="no_prop" id="no_prop" placeholder="No Prop" value="<?php echo $no_prop; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Prop <?php echo form_error('nama_prop') ?></label>
            <input type="text" class="form-control" name="nama_prop" id="nama_prop" placeholder="Nama Prop" value="<?php echo $nama_prop; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Kab <?php echo form_error('no_kab') ?></label>
            <input type="text" class="form-control" name="no_kab" id="no_kab" placeholder="No Kab" value="<?php echo $no_kab; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kab <?php echo form_error('nama_kab') ?></label>
            <input type="text" class="form-control" name="nama_kab" id="nama_kab" placeholder="Nama Kab" value="<?php echo $nama_kab; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Kec <?php echo form_error('no_kec') ?></label>
            <input type="text" class="form-control" name="no_kec" id="no_kec" placeholder="No Kec" value="<?php echo $no_kec; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kec <?php echo form_error('nama_kec') ?></label>
            <input type="text" class="form-control" name="nama_kec" id="nama_kec" placeholder="Nama Kec" value="<?php echo $nama_kec; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Kel <?php echo form_error('no_kel') ?></label>
            <input type="text" class="form-control" name="no_kel" id="no_kel" placeholder="No Kel" value="<?php echo $no_kel; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kel <?php echo form_error('nama_kel') ?></label>
            <input type="text" class="form-control" name="nama_kel" id="nama_kel" placeholder="Nama Kel" value="<?php echo $nama_kel; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('data') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>