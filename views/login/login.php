<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.0
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo Yii::$app->params['name'] ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->

<link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
    <img src="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/img/logo-big.png" alt=""/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <!-- <form class="login-form" action="index.html" method="post"> -->
        <?php 
            $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => [   
                    'class'  => 'login-form',
                ],
            ]);
        ?>
        <h3 class="form-title">Management system</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>
            Please enter a user name and password</span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <!-- <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/> -->
            <?= $form->field($model, 'username')->textInput(['class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete'=> 'off', 'placeholder'=>'用户名'])->label(false) ?>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <!-- <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/> -->
            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete'=> 'off', 'placeholder'=>'密码'])->label(false) ?>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success uppercase">Sign in</button>
            <label class="rememberme check">
            <!-- <input type="checkbox" name="rememberMe" value="1"/>Remember  -->
            <?= $form->field($model, 'rememberMe')->checkbox(['value' => '1', 'label'=>'Remember passwords'])->label(false) ?>
            </label>
            <!-- <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a> -->
        </div>
    <!-- </form> -->
    <?php ActiveForm::end();?>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <!-- END FORGOT PASSWORD FORM -->
    <!-- BEGIN REGISTRATION FORM -->

    <!-- END REGISTRATION FORM -->
</div>
<div class="copyright">
     <?php echo Yii::$app->params['copyright'] ?>
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/respond.min.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Login.init();
    Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>