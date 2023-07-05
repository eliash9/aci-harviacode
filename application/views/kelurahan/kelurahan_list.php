
<div class="content">

        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
            Kelurahan
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="<?=site_url('kelurahan/create');?>" class="button text-white bg-theme-1 shadow-md mr-2">Add New </a>
                <div class="dropdown relative ml-auto sm:ml-0">
                    <button class="dropdown-toggle button px-2 box text-gray-700">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                    </button>
                    <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">                       
                            <a href="<?=site_url('kelurahan/excel')?>" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> Excel </a>
                            <a href="<?=site_url('kelurahan/word')?>" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> Word </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="intro-y datatable-wrapper box p-5 mt-5">
                     
        <table class="table table-report table-report--bordered display w-full -mt-2" id="mytable" width="100%">

            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">No</th>
		    <th class="border-b-2 whitespace-no-wrap">Kecamatan Id</th>
		    <th class="border-b-2 whitespace-no-wrap">Nama</th>
		    <th class="border-b-2 whitespace-no-wrap">Kades</th>
		    <th class="border-b-2 whitespace-no-wrap">Alamat</th>
		    <th class="border-b-2 whitespace-no-wrap">Telepon</th>
		    <th class="border-b-2 whitespace-no-wrap">Action</th>
                </tr>
            </thead>
	    
        </table>
        </div>
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
                    ajax: {"url": "kelurahan/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },{"data": "kecamatan_id"},{"data": "nama"},{"data": "kades"},{"data": "alamat"},{"data": "telepon"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
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
    