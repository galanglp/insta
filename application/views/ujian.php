<div id="page-wrapper" >
    <div class="panel panel-danger" align="left">
        <div class="panel-heading">
            <b>UJIAN TOEFL</b> (Silahkan periksa kembali data TOEFL yang akan diikuti)
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2">
                    <label>Nama Peserta</label>
                </div>
                <div class="col-md-2">:</div>
                <div class="col-md-8">
                    <?=$this->session->userdata('nama')?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Tes</label>
                </div>
                <div class="col-md-2">:</div>
                <div class="col-md-8">
                    TOEFL
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Waktu</label>
                </div>
                <div class="col-md-2">:</div>
                <div class="col-md-8">
                    90 menit
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Jumlah Soal</label>
                </div>
                <div class="col-md-2">:</div>
                <div class="col-md-8">
                    70 Soal
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" align="right">
                    <a href="<?php echo base_url('conujian/kertasujian')?>" class="btn btn-primary">Mulai</a>
                </div>
            </div>
        </div>
    </div>
    
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

</body>
</html>
