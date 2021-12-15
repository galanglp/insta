<div id="page-wrapper" >
    <!-- /. ROW  -->
    <?php 
    if ($error != "") {
        if ($error == 0) {
            echo '<div class="alert alert-success" id="alert" align="center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Proses simpan berhasil
            </div>';
        }elseif ($error == 1) {
            echo '<div class="alert alert-success" id="alert" align="center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Proses edit berhasil
            </div>';
        }elseif ($error == 2) {
            echo '<div class="alert alert-success" id="alert" align="center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Proses delete berhasil
            </div>';
        }elseif ($error == 3) {
            echo '<div class="alert alert-danger" id="alert" align="center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Proses gagal
            </div>';
        }
    } 
    ?>
    <hr />
    <div class="panel panel-default" align="left">
        <div class="panel-heading">
            Buat Soal
        </div>
        <div class="panel-body">
            <form role="form" method="post" action="<?php echo base_url('consoal/save'); ?>" id="form-body" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $soal_id != null ? $soal_id: 'null'?>" name="id"/>
                <input type="hidden" value="<?=isset($edit) ? $edit : 'save'?>" name="method"/>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label class="form-label">Jenis Soal</label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control" name="jenis_soal" id="jenis_soal">
                            <option value="1" <?=$jenis_soal == '1' ? ' selected="selected"' : '';?>>Reading</option>
                            <option value="2" <?=$jenis_soal == '2' ? ' selected="selected"' : '';?>>Listening</option>
                            <option value="3" <?=$jenis_soal == '3' ? ' selected="selected"' : '';?>>Structure & Written expression</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label class="form-label">Soal</label>
                    </div>
                    <div class="col-md-10">
                        <textarea class="form-control" name="soal" id="soal"><?php echo $soal != null ? $soal: ''?></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label class="form-label">File Listening</label>
                    </div>
                    <div class="col-md-5">
                        <input class="form-control" id="namaAudio" name="namaAudio" value="<?php echo $audio != null ? $audio: ''?>" readonly>
                    </div>
                    <div class="col-md-5">
                        <input class="form-control" type="file" id="audio" name="audio">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12" align="right">
                        <button type="button" onclick="reset_form()" class="btn btn-default">Batal</button>
                        <button type="submit" value="Simpan" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
            Daftar Soal
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover" id="table-list">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Jenis Soal</th>
                            <th>Soal</th>
                            <th>Jawaban</th>
                            <th>SETTING</th>
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
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
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
<script src="<?php echo base_url('assets');?>/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $(function(){
        $('#tanggalLahir').datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true,
            changeYear: true,
            changeMonth: true,
            yearRange: "-100:+0",
        });
    });
</script>
<script type="text/javascript">
    var table;
    $(document).ready(function() {
        table = $('#table').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Consoal/ajax_list')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
            { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
            },
            ],

        });
    });
</script>
<script type="text/javascript">
    function reset_form()
    {
        $('#form-body')[0].reset(); // reset form on modals
        CKEDITOR.instances['soal'].setData('');
        $('[name="method"]').val('save');
    }
    function edit_soal(identifier){
        $('#form-body')[0].reset(); // reset form on modals

        $('[name="method"]').val('edit');
        $('[name="id"]').val($(identifier).data('id'));
        $('[name="jenis_soal"]').val($(identifier).data('jenis_soal'));
        CKEDITOR.instances['soal'].setData($(identifier).data('soal'));
        $('[name="namaAudio"]').val($(identifier).data('audio'));
    }
    document.getElementById('audio').onchange = function () {
        audio = this.value;
        name = audio.replace(/.*[\/\\]/, '');
        $('[name="namaAudio"]').val(name);
    };
</script>
<script>
// Replace the <textarea id="editor1"> with a CKEditor 4
// instance, using default configuration.
CKEDITOR.replace( 'soal' );
</script>

</body>
</html>
