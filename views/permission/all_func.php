
<h3 class="page-title">
    Authority management <small>  Permission add  </small>
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
            <a href="<?php echo Yii::$app->urlManager->createUrl('permission/create') ?>">Permission add</a>
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
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->




<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <?php echo $model->isNewRecord ? 'Permission add' : 'Permission edit' ?>
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
                    <!--Cycle to make the corresponding authority, as well as to determine whether there is-->
                    <?php
                    foreach ($funcs as $key => $value) {
                        ?>
                        <div class="form-group">
                            <label class="control-label col-md-3"><?php echo $key ?>
                            </label>
                            <div class="col-md-6">
                                <div class="portlet-body <?php
                                if (count($value) == 0) {
                                    echo "hidden";
                                }
                                ?>">
                                    <div class="table-scrollable">
                                        <table class="table table-hover">
                                            <tbody>
                                                <?php
                                                foreach ($value as $value2) {
                                                    ?>
                                                    <tr>

                                                        <td class="col-md-1">
                                                            <label>  <input type="checkbox"  name="check[<?php echo $value2; ?>]" >Choice</label>
                                                        </td>
                                                        <td class="col-md-4">
                                                            <h5 > <?php echo $value2; ?></h5>

                                                        </td >
                                                        <td class="col-md-6">
                                                            <input type="text" class="form-control input-medium" name="remark[<?php echo $value2; ?>]">
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <?php
                    }
                    ?>


                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">submit</button>
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
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/metronic/admin/layout/scripts/demo.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        // initiate layout and plugins
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
    });
</script>




