<div class="content">
<?php  $this->load->view('parsial/top_bar');?>
                
                <!-- END: Top Bar -->
        <h2 class="intro-y text-lg font-medium mt-10">
            Cetak Permohonan
        </h2>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                        <a  href="<?=base_url('permohonan/create')?>" class="button text-white bg-theme-1 shadow-md mr-2">Tambahkan Data Baru</a>
                        <div class="dropdown relative">
                            <button class="dropdown-toggle button px-2 box text-gray-700">
                                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                            </button>
                            <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
                                <div class="dropdown-box__content box p-2">
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block mx-auto text-gray-600">Jumlah data <?php echo $total_rows ?> </div>
                        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                            <div class="w-56 relative text-gray-700">
                            <form action="<?php echo site_url('cetak/index'); ?>" class="form-inline" method="get">
                                   
                                        <input type="text" class="input w-56 box pr-10 placeholder-theme-13" name="q" value="<?php echo $q; ?>" placeholder="Search...">
                                       
                                            <?php 
                                                if ($q <> '')
                                                {
                                                    ?>
                                                    <a href="<?php echo site_url('cetak'); ?>" class="btn btn-default">Reset</a>
                                                    <?php
                                                }
                                            ?>
                                       
                                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                                       
                                  
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- BEGIN: Data List -->
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-no-wrap">IMAGES</th>
                                    <th class="whitespace-no-wrap">NAMA</th>
                                    <th class="text-center whitespace-no-wrap">JENIS</th>
                                    <th class="text-center whitespace-no-wrap">STATUS</th>
                                    <th class="text-center whitespace-no-wrap">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tr>
                           
                                  
                            <?php
                                    foreach ($cetak_data as $cetak)
                                    {
                                        if($cetak->status==2){
                                            $texcolor="text-theme-6";
                                            $status='<i data-feather="x-square" class="w-4 h-4 mr-2"></i> Ditolak';
                                        }else if($cetak->status==1){
                                            $texcolor="text-theme-9";
                                            $status='<i data-feather="check-square" class="w-4 h-4 mr-2"></i> Disetujui';
                                        }else {
                                            $texcolor="text-theme-4";
                                            $status='<i data-feather="check-square" class="w-4 h-4 mr-2"></i> Dimohon';
                                        }



                                        ?>

                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="img" class="tooltip rounded-full" src="uploads/<?php echo ($cetak->foto)?$cetak->foto:'200x200.jpg';?>" title="<?php echo $cetak->nama ?>">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="img" class="tooltip rounded-full" src="uploads/<?php echo ($cetak->foto)?$cetak->foto:'200x200.jpg';?>" title="<?php echo $cetak->nama ?>">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="img" class="tooltip rounded-full" src="uploads/<?php echo ($cetak->foto)?$cetak->foto:'200x200.jpg';?>" title="<?php echo $cetak->nama ?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-no-wrap"><?php echo $cetak->nama ?></a> 
                                        <div class="text-gray-600 text-xs whitespace-no-wrap"><?php echo $cetak->nik ?></div>
                                    </td>
                                    <td class="text-center"><?php echo $cetak->surat ?></td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center <?=$texcolor?>"> <?=$status?> </div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                        <!--a class="flex items-center text-theme-6 print-modal mr-3" href="javascript:;" data-id="<?=$cetak->id?>" data-toggle="modal" data-target="#print-confirmation-modal"> <i data-feather="printer" class="w-4 h-4 mr-1"></i> Cetak </a--> 
                                   
                                            <a class="flex items-center text-theme-4" href="<?php echo site_url('cetak/word/'.$cetak->id); ?>"> <i data-feather="printer" class="w-4 h-4 mr-1"></i> Print </a>
                                           </div>
                                    </td>
                                </tr>
                                <?php
                                    }
                                    ?>


                                
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- END: Data List -->
                    <!-- BEGIN: Pagination -->
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
                    <?php echo $pagination ?>
                        <!--ul class="pagination">
                       
                            <li>
                                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
                            </li>
                            <li>
                                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
                            </li>
                            <li> <a class="pagination__link" href="">...</a> </li>
                            <li> <a class="pagination__link" href="">1</a> </li>
                            <li> <a class="pagination__link pagination__link--active" href="">2</a> </li>
                            <li> <a class="pagination__link" href="">3</a> </li>
                            <li> <a class="pagination__link" href="">...</a> </li>
                            <li>
                                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
                            </li>
                            <li>
                                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
                            </li>
                        </ul-->
                        <!--select class="w-20 input box mt-3 sm:mt-0">
                            <option>10</option>
                            <option>25</option>
                            <option>35</option>
                            <option>50</option>
                        </select-->
                    </div>
                    <!-- END: Pagination -->
                </div>
                <!-- BEGIN: Delete Confirmation Modal -->
                <div class="modal" id="delete-confirmation-modal">
                    <div class="modal__content">
                        <div class="p-5 text-center">
                            <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i> 
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                            <button type="button" class="button w-24 bg-theme-6 text-white">Delete</button>
                        </div>
                    </div>
                </div>
                <!-- END: Delete Confirmation Modal -->
                <!-- BEGIN: Delete Confirmation Modal -->
                <div class="modal" id="print-confirmation-modal">
                    <div class="modal__content">
                        <div class="p-5 text-center">
                            <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i> 
                            <div class="text-3xl mt-5">Cetak data ini?</div>
                            <div id="idrow"></div>
                            <div class="text-gray-600 mt-2">Anda bisa mencetaknya setelah file terbuka.</div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                            <button id="confirmModalYes" type="button" class="button w-24 bg-theme-6 text-white">Lanjutkan</button>
                        </div>
                    </div>
                </div>
                <!-- END: Delete Confirmation Modal -->
           

                                
                    <div class="modal" id="success-modal-preview"> 
                        <div class="modal__content"> 
                            
                            <div class="p-5 text-center"> 
                                <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Oops...</div>
                                
                                <div class="text-gray-600 mt-2">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>

                                </div> 
                            </div> 
                            <div class="px-5 pb-8 text-center"> 
                                <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok

                                </button> 
                            </div> 
                        </div> 
                    </div> 

         

            <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
            <?php 
       if($this->session->flashdata('message') !=   ''){ ?>

        <script>
                   
                   $(document).ready(function(){
                   
                    $('#success-modal-preview').modal('show');
                  });
        </script>
                
                <?php } ?>
        <script type="text/javascript">
            $(document).ready(function() {

                
            $(".print-modal").click(function () {
                    var ids = $(this).attr('data-id');

                    $("#idrow").text( ids );
              
                    $('#print-confirmation-modal').modal('show');           


            });
          

            $('#confirmModalYes').click(function() {

                var id = $("#idrow").text();

                $.ajax({
                    url: '<?php echo base_url("cetak/print/"); ?>'+id,
                    type: 'post',
                 //   data: {province_id: province_id},
                  //  dataType: 'json',
                    success:function(response) {
                        $('#print-confirmation-modal').css('display', 'none');
                    }
                });
              
            });

        });

        </script>


</div>