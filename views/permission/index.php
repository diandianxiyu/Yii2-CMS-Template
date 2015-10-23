<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
?>
<div class="row">
    <div class="col-md-12 ">
        <h3 class="page-title">
            Authority management <small> Permission list  </small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo Yii::$app->request->baseUrl . '/permission/index' ?>">Authority management</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo Yii::$app->request->baseUrl . '/permission/index' ?>">Permission list</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                        操作 <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a href="<?php echo Yii::$app->request->baseUrl . '/permission/create' ?>">Permission add</a>
                            <a href="<?php echo Yii::$app->request->baseUrl . '/permission/create-by-file' ?>">Batch add permissions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="portlet box ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Permission list
                </div>
            </div>
            <?php
            $form = ActiveForm::begin([
                        'options' => [


                            'enctype' => 'multipart/form-data',
                        ],
                        'action' => 'dels',
            ]);
            ?>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table  table-bordered ">
                        <thead>
                            <tr>
                                <th style="width:90px"><a href="javascript:select()">Select</a>/<a href="javascript:fanselect()">Reverse selection</a></th>
                                <th> Permission name    </th>
                                <th> Brief introduction      </th>
                                <th> Add time  </th>
                                <th> Update time  </th>
                                <th> Operation     </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($models as $val) { ?>
                                <tr>
                                    <td> <input type="checkbox" name="ck[]" value="<?php echo $val->name ?>"> </td>
                                    <td> <a href="<?php echo Yii::$app->urlManager->createUrl(['permission/view', "name" => $val->name]) ?>"> <?php echo $val->name ?> </a> </td>
                                    <td> <?php echo $val->description ?> </td>
                                    <td> <?php echo date('Y-m-d H:i:s', $val->created_at) ?> </td>
                                    <td> <?php echo date('Y-m-d H:i:s', $val->updated_at) ?> </td>
                                    <td> 
                                        <!-- Yii::$app->createUrl(Yii::$app->urlManager, 'post/view', ['id'=>101]) -->

                                        <a href="<?php echo Yii::$app->urlManager->createUrl(['permission/update', "name" => $val->name]) ?>" class="btn btn-xs red"> edit <i class="fa fa-edit"></i> </a>
                                        <a href="<?php echo Yii::$app->urlManager->createUrl(['permission/delete', "name" => $val->name]) ?>" onclick="if (!confirm('Are you sure you want to delete <?php echo $val->name ?> ?'))
                                                return false;" class="btn btn-xs purple"> delete <i class="fa fa-times"></i> </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                    <button type="submit" class="btn green">Batch delete permissions</button><br><br>
                    <?php echo LinkPager::widget([ 'pagination' => $pages]); ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>

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
                                var checkall = document.getElementsByName("ck[]");
                                function select() {

                                    for (var $i = 0; $i < checkall.length; $i++) {
                                        //checkall[$i].att['selected']='checked';
                                        checkall[$i].
                                                checkall[$i].checked = true;
                                    }
                                }
                                function fanselect() {
                                    for (var $i = 0; $i < checkall.length; $i++) {
                                        if (checkall[$i].checked) {
                                            checkall[$i].checked = false;
                                        } else {
                                            checkall[$i].checked = true;
                                        }
                                    }
                                }

</script>
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

