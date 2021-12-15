<div id="page-wrapper">
    <div class="panel panel-default" align="left">
        <div class="panel-heading">
            Atur Kelas
        </div>
        <div class="panel-body">
            <form role="form" id="form">
                <div class="row form-group">
                    <div class="col-md-2">
                        <label class="form-label">Kelas A</label>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" id="kelasA" name="kelasA">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Kelas C</label>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" id="kelasC" name="kelasC">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label class="form-label">Kelas B</label>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" id="kelasB" name="kelasB">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Kelas D</label>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" id="kelasD" name="kelasD">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12" align="right">
                        <button type="button" class="btn btn-default">Batal</button>
                        <button type="button" onclick="reset_kelas()" class="btn btn-danger">Reset Kelas</button>
                        <button type="button" name="simpan" class="btn btn-primary" onclick="bagi()">Bagi Kelas</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
	<!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
            Daftar Nilai Berdasarkan Topsis
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover" id="table-list">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>True Reading</th>
                            <th>True Listening</th>
                            <th>True Structure & written expression</th>
                            <th>Kelas PPBI</th>
                            <!-- <th>Kelas Berdasarkan Toefl</th> -->
                            <th>Kelas Berdasarkan Topsis</th>
                            <!-- <th>Nilai Toefl</th> -->
                            <th>Nilai Topsis</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!--End Advanced Tables -->
</div>
<script src="<?php echo base_url('assets');?>/binary/assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url('assets');?>/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php echo base_url('assets');?>/binary/assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="<?php echo base_url('assets');?>/binary/assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="<?php echo base_url('assets');?>/binary/assets/js/custom.js"></script>
<script src="<?php echo base_url('assets');?>/binary/assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets');?>/binary/assets/js/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
    var table;
    $(document).ready(function() {
        table = $('#table').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "destroy": true,

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Conpembagiankelas/ajax_list/');?>",
                "type": "POST"
            },

            "paging":   false,

        });
    });
</script>
<script type="text/javascript">
    function bagi() {
        let tableBagi = $('#table').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "destroy": true,

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Conpembagiankelas/ajax_list/');?>/"+$('[name="kelasA"]').val()+"/"+$('[name="kelasB"]').val()+"/"+$('[name="kelasC"]').val()+"/"+$('[name="kelasD"]').val(),
                "type": "POST"
            },

            "paging":   false,

        });
    }

    function reset_kelas() {
        $.ajax({
            url : "<?php echo site_url('Conpembagiankelas/resetKelas')?>",
            type: "POST",
            success: function(data)
            {   
                $('#form')[0].reset();
                table = $('#table').DataTable({ 

                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "destroy": true,

                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": "<?php echo site_url('Conpembagiankelas/ajax_list/');?>",
                        "type": "POST"
                    },

                    "paging":   false,

                });
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert('Error adding / update data');
            }
      });
    }
</script>