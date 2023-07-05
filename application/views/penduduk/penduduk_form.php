            <div class="content">
                <!-- BEGIN: Top Bar -->
                <?php  $this->load->view('parsial/top_bar');?>

                <!-- END: Top Bar -->
                <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Data baru
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-6">
                    
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-9">
                        <!-- BEGIN: Display Information -->
                        <!--form action="<?php echo $action; ?>" method="post"-->
                             <?php echo form_open_multipart($action); ?>
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    Display Information
                                </h2>
                            </div>
                            <div class="p-5">
                                <div class="grid grid-cols-12 gap-5">
                                    <div class="col-span-12 xl:col-span-4">
                                        <div class="border border-gray-200 rounded-md p-5">
                                            <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                <img class="rounded-md" alt="foto" src="<?=base_url()?>uploads/<?=$foto?>" id="preview-image">
                                                <div title="Remove this profile photo?" class="tooltip remove-foto w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2"> <i data-feather="x" class="w-4 h-4"></i> </div>
                                            </div>
                                            <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                                <button type="button" class="button w-full bg-theme-1 text-white">Ganti Photo</button>
                                                <input name="image" type="file" class="w-full h-full top-0 left-0 absolute opacity-0" id="upload-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 xl:col-span-8">
                                        <div>
                                            <label for="varchar">Nik <?php echo form_error('nik') ?></label>
                                            <div class="grid grid-cols-12 gap-2"> 
                                                <input type="text"class="input w-full border col-span-6 bg-gray-100 mt-2" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" />
                                                <input type="text"class="input w-full border col-span-6 bg-gray-100 mt-2" name="no_kk" id="nik" placeholder="No KK" value="<?php echo $no_kk; ?>" />
                                          
                                            </div>
                                         </div>
                                         <div>
                                            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                                            <input type="text" class="input w-full border bg-gray-100 mt-2" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                                        </div>

                                        <div class="mt-3">
                                            <label>Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
                                            <div class="mt-2">
                                                <select class="select2 w-full" name="jenis_kelamin" id="jenis_kelamin">
                                                <?php if($jenis_kelamin=="Perempuan"){
                                                    $selected="selected";
                                                } else {
                                                    $selected="";
                                                }
                                                   
                                                ?>
                                                    <option value="Laki-laki" <?=$selected?>>Laki-Laki</option>
                                                    <option value="Perempuan" <?=$selected?> >Perempuan</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label>Agama <?php echo form_error('agama') ?></label>
                                            <div class="mt-2">
                                                <select class="select2 w-full" name="agama" id="agama">
                                                    <option value="ISLAM" <?=($agama=='ISLAM')?'selected':''?>>ISLAM</option>
                                                    <option value="KRISTEN" <?=($agama=='KRISTEN')?'selected':''?>>KRISTEN</option>
                                                    <option value="KATOLIK" <?=($agama=='KATOLIK')?'selected':''?>>KATOLIK</option>
                                                    <option value="HINDU" <?=($agama=='HINDU')?'selected':''?>>HINDU</option>
                                                    <option value="BUDHA" <?=($agama=='BUDHA')?'selected':''?>>BUDHA</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label for="varchar">LAHIR <?php echo form_error('tmp_lahir') ?></label>
                                            <div class="grid grid-cols-12 gap-2"> 
                                                <input type="text" class="input w-full border col-span-6 mt-2" name="tmp_lahir" id="tmp_lahir" placeholder="tmp_lahir" value="<?php echo $tmp_lahir; ?>"> 
                                                <input type="date" class="input w-full border col-span-6 mt-2" name="tgl_lahir" id="tgl_lahir" placeholder="No Rw" value="<?php echo $tgl_lahir; ?>">  
                                            </div> 
                                      
                                        </div>
                                        <div class="mt-3">
                                            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                                          
                                            <textarea  name="alamat" id="alamat" class="input w-full border mt-2" placeholder="Adress"><?php echo $alamat; ?></textarea>
                                        </div>
                                        
                                        <div class="mt-3">
                                            <label for="varchar">No RT/RW <?php echo form_error('no_rt') ?></label>
                                            <div class="grid grid-cols-12 gap-2"> 
                                                <input type="text" class="input w-full border col-span-6 mt-2" name="no_rt" id="no_rt" placeholder="No Rt" value="<?php echo $no_rt; ?>"> 
                                                <input type="text" class="input w-full border col-span-6 mt-2" name="no_rw" id="no_rw" placeholder="No Rw" value="<?php echo $no_rw; ?>">  
                                            </div> 
                                      
                                        </div>


                                        <div class="mt-3">
                                            <label>Provinsi: </label>
                                            <div class="mt-2">
                                            <select id="province" class="select2 w-full" name="no_prop">
                                                <option value="">Pilih Provinsi</option>
                                                <?php
                                                foreach($provinces as $province) {
                                                          $selected = ($province['id'] == $no_prop) ? 'selected' : '';
                                                           echo '<option value="'.$province['id'].'" '.$selected.'>'.$province['nama'].'</option>';
    
                                                    
                                                }
                                                ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label>Kab/Kota: </label>
                                            <div class="mt-2">
                                            <select id="city" class="select2 w-full" name="no_kab">
                                                <option value="">Pilih Kota/Kab</option>
                                                <?php

                                                foreach($cities as $city) {
                                                    $selected = ($city['id'] == $no_kab) ? 'selected' : '';
                                                    echo '<option value="'.$city['id'].'"'.$selected.'>'.$city['nama'].'</option>';
                                                }
                                                ?>
                                            </select>

                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label>Kecamatan:</label>
                                            <div class="mt-2">
                                            <select id="subdistrict" class="select2 w-full" name="no_kec">
                                                <option value="">Pilih Kecamatan</option>
                                                <?php
                                                    foreach($subdistricts as $subdistrict) {
                                                        $selected = ($subdistrict['id'] == $no_kec) ? 'selected' : '';
                                                        echo '<option value="'.$subdistrict['id'].'"'.$selected.'>'.$subdistrict['nama'].'</option>';
                                                    }
                                                    ?>
                                            </select>

                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label>Desa/Kelurahan:</label>
                                            <div class="mt-2">
                                            <select id="kelurahan" class="select2 w-full" name="no_kel">
                                                <option value="">Pilih Desa/Kelurahan</option>
                                                <?php
                                                    foreach($kelurahans as $kelurahan) {
                                                        $selected = ($kelurahan['id'] == $no_kel) ? 'selected' : '';
                                                        echo '<option value="'.$kelurahan['id'].'"'.$selected.'>'.$kelurahan['nama'].'</option>';
                                                    }
                                                    ?>
                                            </select>

                                            </div>
                                        </div>

                                        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                                        <button type="submit" class="button w-20 bg-theme-1 text-white mt-3"><?php echo $button ?></button> 
                                        <a href="<?php echo site_url('penduduk') ?>" class="button w-20 bg-theme-2 mt-3">Cancel</a>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Display Information -->
                        </form>
                        
                    </div>
                </div>

    </div>

    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
    
    <script>
        $(document).ready(function() {

              // Set pre-selected values
            var selectedProvince = "<?php echo $no_prop; ?>";
            var selectedCity = "<?php echo $no_kab; ?>";
            var selectedSubdistrict = "<?php echo $no_kec; ?>";
            var selectedKelurahan = "<?php echo $no_kel; ?>";
            if(selectedProvince != "") {
                $('#province').val(selectedProvince);
                getCities(selectedProvince);
            }
            /*
            if(selectedCity != "") {
                $('#city').val(selectedCity);
                getSubdistricts(selectedCity);
            }
            if(selectedSubdistrict != "") {
                $('#subdistrict').val(selectedSubdistrict);
            }

            // Event listeners for dropdown changes
            $('#province').change(function() {
                getCities($(this).val());
            });

            $('#city').change(function() {
                getSubdistricts($(this).val());
            });
*/
            // Functions to retrieve data using AJAX
            function getCities(province_id) {
                $.ajax({
                    url: '<?php echo base_url("penduduk/get_cities_by_province"); ?>',
                    type: 'post',
                    data: {province_id: province_id},
                    dataType: 'json',
                    success:function(response) {
                        var len = response.length;
                        $("#city").empty();
                        $("#subdistrict").empty();
                        $("#city").append("<option value=''>Select City</option>");
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['nama'];
                            $("#city").append("<option value='"+id+"'>"+name+"</option>");
                        }
                        $('#city').val(selectedCity);
                        getSubdistricts(selectedCity);
                    }
                });
            }

            function getSubdistricts(city_id) {
                $.ajax({
                    url: '<?php echo base_url("penduduk/get_subdistricts_by_city"); ?>',
                    type: 'post',
                    data: {city_id: city_id},
                    dataType: 'json',
                    success:function(response) {
                        var len = response.length;
                        $("#subdistrict").empty();
                       $("#subdistrict").append("<option value=''>Select Subdistrict</option>");
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['nama'];
                            $("#subdistrict").append("<option value='"+id+"'>"+name+"</option>");
                        }
                        $('#subdistrict').val(selectedSubdistrict);
                        getKelurahan(selectedSubdistrict)
                    }
                });
            }

            function getKelurahan(subdistrict_id) {
                $.ajax({
                    url: '<?php echo base_url("penduduk/get_kelurahan_by_kecamatan"); ?>',
                    type: 'post',
                    data: {subdistrict_id: subdistrict_id},
                    dataType: 'json',
                    success:function(response) {
                        var len = response.length;
                        $("#kelurahan").empty();
                       $("#kelurahan").append("<option value=''>Select </option>");
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['nama'];
                            $("#kelurahan").append("<option value='"+id+"'>"+name+"</option>");
                        }
                        $('#kelurahan').val(selectedKelurahan);
                    }
                });
            }






            $('#province').change(function() {
               
                var province_id = $(this).val();
                $.ajax({
                    url: '<?php echo base_url("penduduk/get_cities_by_province"); ?>',
                    type: 'post',
                    data: {province_id: province_id},
                    dataType: 'json',
                    success:function(response) {
                        var len = response.length;
                        $("#city").empty();
                        $("#subdistrict").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['nama'];
                            $("#city").append("<option value='"+id+"'>"+name+"</option>");
                        }
                    }
                });
            });

            $('#city').change(function() {
                var city_id = $(this).val();
                $.ajax({
                    url: '<?php echo base_url("penduduk/get_subdistricts_by_city"); ?>',
                    type: 'post',
                    data: {city_id: city_id},
                    dataType: 'json',
                    success:function(response) {
                        var len = response.length;
                        $("#subdistrict").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['nama'];
                            $("#subdistrict").append("<option value='"+id+"'>"+name+"</option>");
                        }
                    }
                });
            });

            $('#subdistrict').change(function() {
                var subdistrict_id = $(this).val();
                $.ajax({
                    url: '<?php echo base_url("penduduk/get_kelurahan_by_kecamatan"); ?>',
                    type: 'post',
                    data: {subdistrict_id: subdistrict_id},
                    dataType: 'json',
                    success:function(response) {
                        var len = response.length;
                        $("#kelurahan").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['nama'];
                            $("#kelurahan").append("<option value='"+id+"'>"+name+"</option>");
                        }
                    }
                });
            });




        });
    </script>

    <script>
    document.getElementById('upload-input').addEventListener('change', function (e) {
      var reader = new FileReader();
      reader.onload = function (event) {
        document.getElementById('preview-image').setAttribute('src', event.target.result);
      }
      reader.readAsDataURL(e.target.files[0]);
    });
  </script>