<!-- BEGIN: Content -->
<div class="content">
                <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <!--div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Penduduk</a--> 
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <?php echo $breadcrumbs; ?>
</div>
      
           
            <!-- END: Breadcrumb -->
            
            
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8 relative">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                    <img alt="img" src="dist/images/profile-8.jpg">
                </div>
                <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                    <div class="dropdown-box__content box bg-theme-38 text-white">
                        <div class="p-4 border-b border-theme-40">
                            <div class="font-medium">Johnny Depp</div>
                            <div class="text-xs text-theme-41">Software Engineer</div>
                        </div>
                        <div class="p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                        </div>
                        <div class="p-2 border-t border-theme-40">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
        <!-- END: Top Bar -->
                
       

        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Data Penduduk
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="<?=site_url('penduduk/create');?>" class="button text-white bg-theme-1 shadow-md mr-2">Add New </a>
                <div class="dropdown relative ml-auto sm:ml-0">
                    <button class="dropdown-toggle button px-2 box text-gray-700">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                    </button>
                    <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">                       
                            <a href="<?=site_url('penduduk/excel')?>" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> Excel </a>
                            <a href="<?=site_url('penduduk/word')?>" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> Word </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
                 
        <div class="intro-y datatable-wrapper box p-5 mt-5">
                     
        <table class="table table-report table-report--bordered display w-full -mt-2" id="mytable">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">No</th>
                    <th class="border-b-2 whitespace-no-wrap">Action</th>
                    <th class="border-b-2 whitespace-no-wrap">Nik</th>
                    <th class="border-b-2 whitespace-no-wrap">Nama</th>
                    <th class="border-b-2 whitespace-no-wrap">Jenis Kelamin</th>
                    <th class="border-b-2 whitespace-no-wrap">Alamat</th>
                   	   
                    
                </tr>
            </thead>
	    
        </table>
</div>

<div class="modal" id="success-modal-preview"> 
    <div class="modal__content"> 
        <div class="p-5 text-center"> 
            <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i> 
            <div class="text-3xl mt-5">Good job!

            </div> 
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
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    responsive: {
                        details: {
                            display: $.fn.dataTable.Responsive.display.childRowImmediate
                        }
                    },
                    ajax: {"url": "penduduk/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        },
                        {"data": "nik",
                            class:"font-medium whitespace-no-wrap"
                        },
                        {"data": "nama",
                            class:"font-medium whitespace-no-wrap"
                        },{"data": "jenis_kelamin"},{"data": "alamat"}
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>
    </div>