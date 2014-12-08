<!DOCTYPE html>
    <html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $siteTitle; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Favicons -->

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>admin_assets/images/icons/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>admin_assets/images/icons/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>admin_assets/images/icons/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>admin_assets/images/icons/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>admin_assets/images/icons/favicon.png">

        <!--[if lt IE 9]>
          <script src="assets/js/minified/core/html5shiv.min.js"></script>
          <script src="assets/js/minified/core/respond.min.js"></script>
        <![endif]-->

        <!-- Fides Admin CSS Core -->

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/css/minified/aui-production.min.css">

        <!-- Theme UI -->

        <link id="layout-theme" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/themes/minified/fides/color-schemes/dark-blue.min.css">

        <!-- Fides Admin Responsive -->

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/themes/minified/fides/common.min.css">
        <!-- <link rel="stylesheet" type="text/css" href="../_assets/themes/fides/common.css"> -->

        <link id="theme-animations" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/minified/fides/animations.min.css">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/minified/fides/responsive.min.css">



    </head>
    <body>
    
    
    
    <div id="loading" class="ui-front loader ui-widget-overlay bg-white opacity-100">
            <img src="<?php echo base_url(); ?>admin_assets/images/loader-dark.gif" alt="">
        </div>

        <div id="page-wrapper" class="demo-example">
        <div class="row">

    <form action="<?php echo base_url(); ?>index.php/admin/login" id="login-validation" class="col-md-4 center-margin" method="post">

        <div id="login-form" class="content-box form-vertical">
            <h3 class="content-box-header ui-state-default">
                <div class="glyph-icon icon-separator">
                    <i class="glyph-icon icon-user"></i>
                </div>
                <span>Login example</span>
            </h3>
            <?php echo $invalid; ?>
            <div class="content-box-wrapper pad20A pad0B">
                <div class="form-row">
                    <div class="form-label col-md-2">
                        <label for="login_email">
                            Username:
                            <span class="required">*</span>
                        </label>
                    </div>
                    <div class="form-input col-md-10">
                        <div class="form-input-icon">
                            <i class="glyph-icon icon-envelope-o ui-state-default"></i>
                            <input placeholder="Email address" data-type="email" data-trigger="change" data-required="true" type="text" name="login_email" id="login_email">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-label col-md-2">
                        <label for="login_pass">
                            Password:
                        </label>
                    </div>
                    <div class="form-input col-md-10">
                        <div class="form-input-icon">
                            <i class="glyph-icon icon-unlock-alt ui-state-default"></i>
                            <input placeholder="Password" data-trigger="keyup" data-rangelength="[3,25]" type="password" name="login_pass" id="login_pass">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-checkbox-radio col-md-6">
                        <input type="checkbox" class="custom-checkbox" name="remember-password" id="remember-password">
                        <label for="remember-password" class="pad5L">Remember password?</label>
                    </div>
                </div>
            </div>
            <div class="button-pane text-center">
                <input type="submit" class="btn large primary-bg text-transform-upr font-size-11" id="demo-form-valid" title="Validate!" name="submit" value="Login">
                    <!--<span class="button-content">
                        Login
                    </span>
                </button>-->
            </div>
        </div>

    </form>

</div>
