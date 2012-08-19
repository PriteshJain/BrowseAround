<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Retailer Login</title>
        <meta name="robots" content="noindex,nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">    
        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/font-awesome.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/adminia.css" rel="stylesheet"> 
        <link href="<?= base_url() ?>assets/css/adminia-responsive.css" rel="stylesheet"> 
        <link href="<?= base_url() ?>assets/css/pages/login.css" rel="stylesheet"> 
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="login-container">
            <div class="loginError"><?= isset($loginMessage) ? $loginMessage : '' ?></div>
            <div id="login-header">
                <h3>Login</h3>
            </div> <!-- /login-header -->            
            <div id="login-content" class="clearfix">
                <form action="<?= site_url('login') ?>" method="post">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="userName">Username <?php echo form_error('userName'); ?></label>
                            <div class="controls">
                                <input id="userName" type="text" name="userName" value="<?php echo set_value('userName'); ?>" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="passcode">Password <?php echo form_error('passcode'); ?></label>
                            <div class="controls">
                                <input id="passcode" type="password" name="passcode" value="<?php echo set_value('passcode'); ?>" />
                            </div>
                        </div>
                    </fieldset>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-inverse btn-large">
                            Login
                        </button>
                    </div>
                </form>
            </div> <!-- /login-content -->
        </div> <!-- /login-wrapper -->
        <script src="<?= base_url() ?>assets/js/jquery-1.7.2.min.js"></script>
        <script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
    </body>   
</html>