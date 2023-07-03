<!doctype html>
<html>
    <head>
        <title>Gubeng</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            .dataTables_wrapper {
                min-height: 500px
            }
            
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Data List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('data/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('data/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Provinsi</th>
		    <th>Kabupaten</th>
		    <th>Faskes</th>
		    <th>Nama</th>
		    <th>Jenis Kelamin</th>
		    <th>Kelompok Usia</th>
		    <th>Kategori</th>
		    <th>Sub Kategori</th>
		    <th>Kanal</th>
		    <th>Status</th>
		    <th>Nikdisduk</th>
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
		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
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
                    ajax: {"url": "data/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },{"data": "provinsi"},{"data": "kabupaten"},{"data": "faskes"},{"data": "nama"},{"data": "jenis_kelamin"},{"data": "kelompok_usia"},{"data": "kategori"},{"data": "sub_kategori"},{"data": "kanal"},{"data": "status"},{"data": "nikdisduk"},{"data": "nama_lengkap"},{"data": "alamat"},{"data": "no_rt"},{"data": "no_rw"},{"data": "no_prop"},{"data": "nama_prop"},{"data": "no_kab"},{"data": "nama_kab"},{"data": "no_kec"},{"data": "nama_kec"},{"data": "no_kel"},{"data": "nama_kel"},
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
    </body>
</html>