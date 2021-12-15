<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CBT</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="<?php echo base_url('assets');?>/binary/assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="<?php echo base_url('assets');?>/binary/assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="<?php echo base_url('assets');?>/binary/assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2> CBT : Register</h2>
               
                <h5>( Register yourself to get access )</h5>
                 <br />
            </div>
        </div>

         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  New User ? Register Yourself </strong>
                            </div>
                            <?php if ($message == "gagal") {
                                echo '<div class="alert alert-danger" id="alert" align="center">Register '.$message.'</div>';
                              }?>
                            <div class="panel-body">
                                <form role="form" method="post" action="<?php echo base_url($action); ?>">
                                    <br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Username" name="Username" />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password" />
                                            <span class="btn input-group-addon" title="tampilkan" id="span-password" onclick="tampilkan()"><i id="i-password" class="fa fa-eye-slash"  ></i></span>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Email" name="Email" />
                                        </div>
                                     
                                     <input class="btn btn-success" type="submit" value="Register Me" />
                                    <hr />
                                    Already Registered ?  <a href="<?php echo base_url('Login');?>" >Login here</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
  <!-- JQUERY SCRIPTS -->
  <script src="<?php echo base_url('assets');?>/binary/assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="<?php echo base_url('assets');?>/binary/assets/js/bootstrap.min.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="<?php echo base_url('assets');?>/binary/assets/js/jquery.metisMenu.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="<?php echo base_url('assets');?>/binary/assets/js/custom.js"></script>
  <script type="text/javascript">
      function tampilkan() {
        if ($("#password").prop("type")=="password") {
            $("#password").prop("type","text");
            $("#span-password").prop("title","sembunyikan");
            $("#i-password").prop("class","fa fa-eye");
        }else{
            $("#password").prop("type","password");
            $("#span-password").prop("title","tampilkan");
            $("#i-password").prop("class","fa fa-eye-slash");
        }
      }

      window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
      });
    }, 5000);
  </script>
   
</body>
</html>
