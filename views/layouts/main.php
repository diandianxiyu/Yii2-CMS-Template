<?php

use yii\helpers\Url;
use app\models\AdminUser;
use app\models\AuthItem;
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.0
Version: 3.5
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
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/> 
        <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl ?>/favicon.ico"/>
        <title><?php echo Yii::$app->params['name'] ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- END PAGE STYLES -->
        <!-- BEGIN THEME STYLES -->
        <!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
        <link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>


    </head>
    <!-- END HEAD -->
    <body class="page-header-fixed page-quick-sidebar-over-content page-style-square"> 
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php echo Yii::$app->urlManager->createUrl([ 'site/index']) ?>">
                        <img src="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
                    </a>
                    <div class="menu-toggler sidebar-toggler hide">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <!-- END TODO DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->                 
                        <li class="dropdown dropdown-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <?php
                                if (AdminUser::findUserhead(Yii::$app->user->getId()) == '') {
                                    ?>
                                    <img alt="" class="img-circle" src="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/img/avatar3_small.jpg"/>
                                    <?php
                                } else {
                                    ?>
                                    <img alt="" class="img-circle img-responsive" src="<?php echo AdminUser::findUserhead(Yii::$app->user->getId()) ?>"/>
                                    <?php
                                }
                                ?>
                                <span class="username username-hide-on-mobile">
                                    <?php echo AdminUser::findByRealname(Yii::$app->user->getId()) ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['userprofile/userinfo']) ?>">
                                        <i class="icon-user"></i> Personal information </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['userprofile/uphead']) ?>">
                                        <i class="icon-calendar"></i> Head set </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['userprofile/uppwd']) ?>">
                                        <i class="icon-envelope-open"></i> Change password 
                                    </a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl([ 'site/logout']) ?>">
                                        <i class="icon-key"></i> Logout </a>
                                </li>
                            </ul>
                        </li>


                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>   

                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->

        </div>

        <!-- END HEADER -->
        <div class="clearfix">

        </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

                        <!-- BEGIN ANGULARJS LINK -->
                        <!-- END ANGULARJS LINK -->
                        <li class="heading">
                            <h3 class="uppercase">Operation menu</h3>
                        </li>
                        <?php if (isset($this->params['menu'])) { ?>
                            <?php
                            foreach ($this->params['menu'] as $val) {
                                if (isset($val['controller_tag']) && in_array(Yii::$app->view->params['tag']['controller'], $val['controller_tag'])) {
                                    echo '<li class="start active open">';
                                } else {
                                    echo "<li >";
                                }
                                ?>
                                <a href="javascript:;">
                                    <i class="<?php echo $val['icon'] ?>"></i>
                                    <span class="title"> <?php echo $val['name'] ?></span>
                                    <span class="arrow "></span>
                                </a>
                                <?php if (isset($val['child'])) { ?>
                                    <ul class="sub-menu">
                                        <?php
                                        foreach ($val['child'] as $k => $v) {
                                            if (isset($v['action_tag']) && in_array(Yii::$app->view->params['tag']['action'], $v['action_tag'])) {

                                                echo '<li class="active">';
                                            } else {
                                                echo "<li >";
                                            }
                                            ?>
                                            <a href="<?php echo Yii::$app->request->baseUrl . '/' . $v['url'] ?>">
                                                <i class="<?php echo $v['icon'] ?>"></i>
                                                <?php echo $v['name'] ?>
                                            </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                                </li>
                            <?php } ?>
                        <?php } ?>

                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </div>

            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <!-- /.modal -->
                    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <!-- BEGIN STYLE CUSTOMIZER -->
                    <!-- END STYLE CUSTOMIZER -->
                    <!-- BEGIN PAGE HEADER-->

                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS -->
                    <?= $content ?>
                </div>
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->

            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner">
                <?php echo Yii::$app->params['copyright'] ?>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>

    </body>
    <!-- END BODY -->
</html>