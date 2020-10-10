<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login | CI-Perpustakaan</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Isi CSS -->
    <link href="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/bootstrap/css/custom.css" rel="stylesheet">

    <!-- Custom Login CSS -->
    <link href="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/bootstrap/css/customlogin.css" rel="stylesheet"> 

    <!-- MetisMenu CSS -->
    <link href="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php print_r base_url(); ?>template/backend/sbadmin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- end navbar -->
    
    <!-- line-height -->
    <br />
    <div class="container">
    <div class="row">
    <div class="col-md-12">      
    <?php
    if(!empty($pesan)) {
        print_r $pesan;
    }
    ?>
    </div>
    </div>
    </div>       
    <br />


<br>

<br>

<br>
<br>
<br>
<div class="row" >
<div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-image: url(<?php print_r base_url(); ?>/assets/img/loginheader.png); height: 200px;">
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" action="<?php print_r site_url('login');?>" method="post">
                    <?php print_r $this->session->flashdata('message');?>
                    <div class="form-group">
                        <p class="col-sm-3">Username </p>
                        
                        <div class="col-sm-9">
                           <?php print_r form_error('username'); ?>
                            <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username" value="<?php print_r set_value('username'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                    <p class="col-sm-3">Password </p>
                        <div class="col-sm-9">
                            <?php print_r form_error('password'); ?>
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" value="<?php print_r set_value('password'); ?>">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"/>
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" name="proses" class="btn btn-success btn-sm">
                                Login</button>
                                 <button type="reset" class="btn btn-default btn-sm">
                                Reset</button>
                        </div>
                    </div>
                </form>
            </div>
           
        </div>
    </div>
</div>
</div>

    <!-- jQuery -->
    <script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php print_r base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>

</body>

</html>
