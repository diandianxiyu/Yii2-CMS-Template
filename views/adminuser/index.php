<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
?>
<div class="row">
    <div class="col-md-12 ">
        <h3 class="page-title">
            Administrator  management <small> Administrator  list  </small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.html">home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo Yii::$app->urlManager->createUrl(['adminuser/index']) ?>">Administrator management</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo Yii::$app->urlManager->createUrl(['adminuser/index']) ?>">Administrator  list</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Operation <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a href="<?php echo Yii::$app->urlManager->createUrl(['adminuser/create']) ?>">Administrator add</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Administrator  list
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th> ID    </th>
                            <th> nikename      </th>
                            <th> User name  </th>
                            <th> Disable  </th>
                            <th> Added time  </th>
                            <th> Modified time  </th>
                            <th> Operation     </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($models as $val) { ?>
                        <tr>
                            <td> <?php echo $val->id ?> </td>
                            <td> <a href="<?php echo Yii::$app->urlManager->createUrl(['adminuser/view',  "id" => $val->id  ]) ?>"> <?php echo $val->realname ?> </a> </td>
                            <td> <?php echo $val->username ?> </td>
                            <td> <?php echo $val->disabled ? "<i class='fa fa-check-circle-o'></i>" : "<i class='fa fa-circle-o'></i>" ?> </td>
                            <td> <?php echo $val->add_time  ?> </td>
                            <td> <?php echo $val->edit_time  ?> </td>
                            <td> 
                            <!-- Yii::$app->createUrl(Yii::$app->urlManager, 'post/view', ['id'=>101]) -->
                                <a href="<?php echo Yii::$app->urlManager->createUrl(['assignment/create',  "id" => $val->id  ]) ?>" class="btn btn-xs blue"> Role of binding <i class="fa fa-edit"></i> </a>
                                <a href="<?php echo Yii::$app->urlManager->createUrl(['assignment/index',  "id" => $val->id  ]) ?>" class="btn btn-xs yellow"> Binding authority details <i class="fa fa-edit"></i> </a>
                                <a href="<?php echo Yii::$app->urlManager->createUrl(['adminuser/update',  "id" => $val->id  ]) ?>" class="btn btn-xs green"> update <i class="fa fa-edit"></i> </a>
                                <a href="<?php echo Yii::$app->urlManager->createUrl(['adminuser/disabled',  "id" => $val->id  ]) ?>" class="btn btn-xs red"> Modify disabled state <i class="fa fa-edit"></i> </a>
                                <a href="<?php echo Yii::$app->urlManager->createUrl(['adminuser/delete',  "id" => $val->id  ]) ?>" onclick="if (!confirm('Are you sure you want to delete <?php echo $val->realname ?> ?')) return false;" class="btn btn-xs purple"> delete <i class="fa fa-times"></i> </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                    <?php echo LinkPager::widget([ 'pagination' => $pages ]); ?>
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