<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h3 class="page-title">
    Authority management <small>  Authority details  </small>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo Yii::$app->urlManager->createUrl('permission/index') ?>">Authority management</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo Yii::$app->urlManager->createUrl(['permission/update', 'name' => $model->name]) ?>">Authority details</a>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                Actions <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <li>
                    <a href="<?php echo Yii::$app->urlManager->createUrl('permission/create') ?>">Permission add</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    Authority details
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php
                $form = ActiveForm::begin([
                            'id' => 'form_sample_1',
                            'options' => [
                                'class' => 'form-horizontal',
                                'novalidate' => 'novalidate',
                            ],
                ]);
                ?>
                <div class="form-body">


                    <div class="form-group">
                        <label class="control-label col-md-3">Permission name <span class="required" aria-required="true">
                                * </span>
                        </label>
                        <div class="col-md-4">
<?= $form->field($model, 'name')->textInput([ 'class' => 'form-control', 'placeholder' => 'Please enter the right name', 'disabled' => 'disabled'])->label(false) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Permission type <span class="required" aria-required="true">
                                * </span>
                        </label>
                        <div class="col-md-4">
<?= $form->field($model, 'type')->textInput([ 'value' => isset($model->type) ? $model->type : NULL, 'disabled' => 'disabled', 'class' => 'form-control'])->label(false) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Rule name <span class="required" aria-required="true">
                            </span>
                        </label>
                        <div class="col-md-4">
<?= $form->field($model, 'rule_name')->textInput([ 'class' => 'form-control', 'placeholder' => '', 'disabled' => 'disabled'])->label(false) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Description <span class="required" aria-required="true">
                            </span>
                        </label>
                        <div class="col-md-4">
<?= $form->field($model, 'description')->textarea(['rows' => 6, 'cols' => 5, 'disabled' => 'disabled'])->label(false) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Data <span class="required" aria-required="true">
                            </span>
                        </label>
                        <div class="col-md-4">
<?= $form->field($model, 'data')->textarea(['rows' => 6, 'cols' => 5, 'disabled' => 'disabled'])->label(false) ?>
                        </div>
                    </div>


<?php if (($model->type == 1) && isset($permissions)) { ?>
                        <div class="form-group">
                            <label class="control-label col-md-3">Permission list <span class="required" aria-required="true">
                                </span>
                            </label>
                            <div class="col-md-4">
                        <?= $form->field($model, 'child')->checkboxList($permissions) ?>
                            </div>
                        </div>   
<?php } ?>


                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <a href="<?php echo Yii::$app->urlManager->createUrl(['permission/update', "name" => $model->name]) ?>" class="btn default">Modify </a>
                            <a href="<?php echo Yii::$app->urlManager->createUrl('permission/index') ?>" class="btn default">Return list </a>

                        </div>
                    </div>
                </div>
                <!-- </form> -->
<?php ActiveForm::end(); ?>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->

    </div>
</div>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/pages/scripts/components-pickers.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        // initiate layout and plugins
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
        Tasks.initDashboardWidget();
        ComponentsPickers.init();
    });
</script>