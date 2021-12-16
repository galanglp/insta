<div class="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <?php foreach ($post as $post) { ?>
                <div class="col-md-4 col-sm-4">
                    <div class="panel panel-danger" align="left">
                            <div class="panel-heading">
                                <img src="<?=base_url('assets').'/uploads/'.$post->source?>" style="width:400px;height:400px;" alt="Italian Trulli">
                            </div>
                            <div class="panel-body">
                                <button type="button" class="btn btn-default btn-circle"><i class="fa fa-heart"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-circle"><i class="fa fa-comment"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-circle"><i class="fa fa-send"></i>
                                </button>
                            </div>
                            <div class="panel-footer">
                                <?=$post->caption?>
                            </div>
                            <div class="panel-footer">
                                comment..
                            </div>
                    </div>
                </div>
            <?php  } ?>
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
