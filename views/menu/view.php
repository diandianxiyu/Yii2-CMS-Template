<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<h3 class="page-title">
    Menu management <small>  Menu details  </small>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo Yii::$app->urlManager->createUrl('menu/index')?>">Menu management</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo Yii::$app->urlManager->createUrl(['menu/update', 'id' => $model->id] ) ?>">Menu details</a>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
            Actions <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <li>
                    <a href="<?php echo Yii::$app->urlManager->createUrl('menu/create')?>">add menu</a>
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
                            Menu details
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <?php $form = ActiveForm::begin([
                            'id' => 'form_sample_1',
                            'options' => [
                                'class' => 'form-horizontal',
                                'novalidate'  => 'novalidate',
                            ],
                        ]); ?>
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button>
                                    Your form validation is successful!
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Menu name <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'name')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter the menu name', 'disabled' => 'disabled' ] )->label(false) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Parent menu <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-4">
                                      <?= $form->field($model, 'parent_id')->textInput( [ 'class' => 'form-control', 'value' => $model->getMenuName($model->parent_id, $model->id), 'placeholder' => 'Please enter the menu name', 'disabled' => 'disabled' ] )->label(false) ?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Access path <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'url')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter the access path', 'disabled' => 'disabled' ] )->label(false) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Authentication authority <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'auth_item')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter authentication permissions', 'disabled' => 'disabled' ] )->label(false) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Sort <span class="required" aria-required="true">
                                     </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'sort')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter serial number', 'disabled' => 'disabled' ] )->label(false) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">icon <span class="required" aria-required="true">
                                     </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'icon')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter the icon number', 'disabled' => 'disabled' ] )->label(false) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Parent menu selection 
                                        <span class="required" aria-required="true">
                                     </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'controller_tag')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter the parent menu to select the number of tags to be separated (parent menu)', 'disabled' => 'disabled' ] )->label(false) ?>
                                        
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3">Sub menu selection 
                                        <span class="required" aria-required="true">
                                     </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'action_tag')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter the sub menu to select the tag to use, separate (sub - level menu)', 'disabled' => 'disabled' ] )->label(false) ?>
                                        
                                    </div>
                                </div>
                                

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <a href="<?php echo Yii::$app->urlManager->createUrl(['menu/update',  "id" => $model->id  ]) ?>" class="btn default">Modify </a>
                                        <a href="<?php echo Yii::$app->urlManager->createUrl('menu/index')?>" class="btn default">Return list </a>

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
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
 Tasks.initDashboardWidget();
           ComponentsPickers.init();
        });   
    </script>