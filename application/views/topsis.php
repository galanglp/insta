<div id="page-wrapper">
	<!-- text perbandingan ahp -->
    <div class="panel panel-default" align="left">
        <div class="panel-heading">
            Perbandingan antar kategori AHP
        </div>
        <div class="panel-body">
            <div class="row form-group">
                <div class="col-md-1">
                    <label class="form-label">Reading</label>
                </div>
                <div class="col-md-2">
                    <label class="form-label" id="labelRL" name="labelRL"><?=$readingListening?></label>
                </div>
                <div class="col-md-1">
                    <label class="form-label">Listening</label>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-1">
                    <label class="form-label">Structure & written expression</label>
                </div>
                <div class="col-md-2">
                    <label class="form-label" id="labelSR" name="labelSR"><?=$structureReading?></label>
                </div>
                <div class="col-md-1">
                    <label class="form-label">Reading</label>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-1">
                    <label class="form-label">Listening</label>
                </div>
                <div class="col-md-2">
                    <label class="form-label" id="labelLS" name="labelLS"><?=$listeningStructure?></label>
                </div>
                <div class="col-md-1">
                    <label class="form-label">Structure & written expression</label>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label class="form-label">Bobot reading : </label>
                </div>
                <div class="col-md-2">
                    <label class="form-label" id="labelBR" name="labelBR"><?=$bobotReading?></label>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Lambda : </label>
                </div>
                <div class="col-md-2">
                    <label class="form-label" id="labelLamb" name="labelLamb"><?=$lambda?></label>
                </div>
                <div class="col-md-2">
                    <label class="form-label">CR : </label>
                </div>
                <div class="col-md-2">
                    <label class="form-label" id="labelCR" name="labelCR"><?=$consistencyRatio?></label>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label class="form-label">Bobot Listening : </label>
                </div>
                <div class="col-md-2">
                    <label class="form-label" id="labelBL" name="labelBL"><?=$bobotListening?></label>
                </div>
                <div class="col-md-2">
                    <label class="form-label">CI : </label>
                </div>
                <div class="col-md-2">
                    <label class="form-label" id="labelCI" name="labelCI"><?=$consistencyIndex?></label>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label class="form-label">Bobot Structure & written expression : </label>
                </div>
                <div class="col-md-2">
                    <label class="form-label" id="labelBS" name="labelBS"><?=$bobotStructure?></label>
                </div>
                <div class="col-md-2">
                    <label class="form-label">RI : </label>
                </div>
                <div class="col-md-2">
                    <label class="form-label" id="labelRI" name="labelRI"><?=$indexRandom?></label>
                </div>
            </div>
        </div>
    </div>
	<!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
            Daftar Nilai Toefl
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover" id="table-list">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Reading</th>
                            <th>Listening</th>
                            <th>Structure & written expression</th>
                            <th>Reading Norm</th>
                            <th>Listening Norm</th>
                            <th>Structure & written expression Norm</th>
                            <th>Reading Norm Terbobot</th>
                            <th>Listening Norm Terbobot</th>
                            <th>Structure & written expression Norm Terbobot</th>
                            <th>Reading Max</th>
                            <th>Listening Max</th>
                            <th>Structure & written expression Max</th>
                            <th>Reading Min</th>
                            <th>Listening Min</th>
                            <th>Structure & written expression Min</th>
                            <th>SM Max</th>
                            <th>SM Min</th>
                            <th>Nilai Preferensi</th>
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

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Contopsis/ajax_list/');?>",
                "type": "POST"
            },

            "paging":   false,

        });
    });
</script>