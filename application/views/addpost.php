<div class="page-wrapper">
	<div id="page-inner">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<b>Add Post</b>
			</div>
			<div class="panel-body">
				<form role="form" method="post" action="<?php echo base_url('conaddpost/save'); ?>" id="form-body" enctype="multipart/form-data">
				<input type="hidden" value="<?=isset($edit) ? $edit : 'save'?>" name="method"/>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label class="form-label">foto</label>
                    </div>
                    <div class="col-md-5">
                        <input type='file' id="imgPost" onchange="PreviewImage()" name="imgPost" />
   						<img id="preview" src="#" alt="preview" style="width: 500px; height: 400px;" />
                    </div>
                </div>
                <div class="row form-group">
                	<div class="col-md-2">
                    	<label class="form-label">Caption</label>
                    </div>
                    <div class="col-md-5">
                    	<input type="text" class="form-control" placeholder="caption" name="caption" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12" align="right">
                        <button type="button" onclick="reset_form()" class="btn btn-default">Batal</button>
                        <button type="submit" value="Simpan" name="simpan" class="btn btn-primary">publish</button>
                    </div>
                </div>
            </form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imgPost").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("preview").src = oFREvent.target.result;
        };
    };

    function reset_form()
    {
        $('#form-body')[0].reset(); // reset form on modals
        $('#preview').attr('src', "preview");
        $('[name="method"]').val('save');
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