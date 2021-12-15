<div id="page-wrapper" >
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
            Daftar Soal
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover" border="0" id="table-list">
                    <thead>
                        <tr>
                            <th width="5%">NO</th>
                            <th width="15%">Jenis Soal</th>
                            <th width="80%">Soal</th>
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
                "url": "<?php echo site_url('condaftarsoal/ajax_list/')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
            { 
            "targets": [ 1, 2 ], //last column
            "orderable": false, //set not orderable
            },
            ],

        });
    });
</script>
<script type="text/javascript">
    function reset_form()
    {
        // CKEDITOR.instances['jawaban'].setData('');
        $('[name="method"]').val('save');
        $('[name="id"]').val('');
        $('[name="kunci"]').val('');
    }
    function edit_jawaban(identifier){

        $('[name="method"]').val('edit');
        $('[name="id"]').val($(identifier).data('id'));
        // CKEDITOR.instances['jawaban'].setData($(identifier).data('jawaban'));
        $('[name="kunci"]').val($(identifier).data('kunci'));
    }
</script>
<script>
</script>

</body>
</html>
