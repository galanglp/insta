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
            Buat Jawaban
        </div>
        <div class="panel-body">
            <form role="form" method="post" action="<?php echo base_url('conjawaban/save'); ?>" id="form-body">
                <input type="hidden" value="" name="id" value="<?php echo $jawaban_id != null ? $jawaban_id: 'null'?>" />
                <input type="hidden" value="<?=$id_soal?>" name="soal_id"/>
                <input type="hidden" value="save" name="method"/>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label class="form-label">Jawaban</label>
                    </div>
                    <div class="col-md-10">
                        <textarea class="form-control" name="jawaban" id="jawaban"><?php echo $jawaban != null ? $jawaban: ''?></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label class="form-label">Kunci</label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control" name="kunci" id="kunci">
                            <option value="1" <?=$kunci == '1' ? ' selected="selected"' : '';?>>Benar</option>
                            <option value="0" <?=$kunci == '0' ? ' selected="selected"' : '';?>>Salah</option>
                        </select>
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
            Daftar Jawaban
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover" id="table-list">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Jawaban</th>
                            <th>Kunci</th>
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
    var table;
    $(document).ready(function() {
        table = $('#table').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Conjawaban/ajax_list/').$id_soal;?>",
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
        CKEDITOR.instances['jawaban'].setData('');
        $('[name="method"]').val('save');
        $('[name="id"]').val('');
        $('[name="kunci"]').val('');
    }
    function edit_jawaban(identifier){
        // reset_form();

        $('[name="method"]').val('edit');
        $('[name="id"]').val($(identifier).data('id'));
        CKEDITOR.instances['jawaban'].setData($(identifier).data('jawaban'));
        $('[name="kunci"]').val($(identifier).data('kunci'));
    }
</script>
<script>
// Replace the <textarea id="editor1"> with a CKEditor 4
// instance, using default configuration.
CKEDITOR.replace( 'jawaban' );
</script>

</body>
</html>
