<div class="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <?php foreach ($feed as $feed) { ?>
                <div class="col-md-4 col-sm-4">
                    <div class="panel panel-danger" align="left">
                            <div class="panel-heading">
                                <img src="<?=base_url('assets').'/uploads/'.$feed->source?>" style="width:400px;height:400px;" alt="Italian Trulli">
                            </div>
                            <div class="panel-body">
                                <button type="button" class="btn btn-default btn-circle"><i class="fa fa-heart"></i>
                                </button>
                                <button type="button" id="btncomment" class="btn btn-default btn-circle" onclick="showComment()"><i class="fa fa-comment"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-circle"><i class="fa fa-send"></i>
                                </button>
                            </div>
                            <div class="panel-footer">
                                <?=$feed->caption?>
                            </div>
                            <div class="panel-footer">
                                <form role="form" method="post" action="<?php echo base_url('confeed/saveComment'); ?>" id="form-body" hidden>
                                    <input type="hidden" id="idPost" class="form-control" placeholder="comment..." name="idPost" value="<?=$feed->id?>" />
                                    <input type="hidden" id="idUser" class="form-control" placeholder="comment..." name="idUser" value="5" />
                                    <input type="text" id="comment" class="form-control" placeholder="comment..." name="comment" />
                                    <button type="button" onclick="reset_form()" class="btn btn-default">Batal</button>
                                    <button type="submit" value="Simpan" name="simpan" class="btn btn-primary"><i class="fa fa-send"></i></button>
                                </form>
                                comment..
                            </div>
                    </div>
                </div>
            <?php  } ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    shc = 0;
    function showComment() {
        if (shc == 0) {
            $( "#form-body" ).show();
            shc = 1;
        }else{
            $( "#form-body" ).hide();
            shc = 0;
        }
        
    }

    function reset_form()
    {
        $('#form-body')[0].reset(); // reset form on modals
    }
</script>

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
