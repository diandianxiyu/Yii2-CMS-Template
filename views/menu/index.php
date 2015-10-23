<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use app\models\Menu;
?>
<div class="row">
    <div class="col-md-12 ">
        <h3 class="page-title">
            Menu management <small> Menu list  </small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo Yii::$app->request->baseUrl . '/menu/index' ?>">Menu management </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo Yii::$app->request->baseUrl . '/menu/index' ?>">Menu list </a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                        Operation <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a href="<?php echo Yii::$app->request->baseUrl . '/menu/create' ?>">Add menu</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Menu list
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> ID    </th>
                                <th> Menu name    </th>
                                <th> Parent menu      </th>
                                <th> Access path  </th>
                                <th> Authentication authority  </th>
                                <th> Sort  </th>
                                <th> icon  </th>
                                <th> Operation     </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($models as $val) { ?>
                                <tr>
                                    <td> <?php echo $val->id ?> </td>
                                    <td> <a href="<?php echo Yii::$app->urlManager->createUrl(['menu/view', "id" => $val->id]) ?>"> <?php echo $val->name ?> </a> </td>
                                    <td> <?php echo $val->parent_id ?> </td>
                                    <td> <?php echo $val->url ?> </td>
                                    <td> <?php echo $val->auth_item ?> </td>
                                    <td> <?php echo $val->sort ?> </td>
                                    <td> <i class="<?php echo $val->icon ?>"></i> </td>
                                    <td> 
                                        <a href="<?php echo Yii::$app->urlManager->createUrl(['menu/update', "id" => $val->id]) ?>" class="btn btn-xs red"> Modify <i class="fa fa-edit"></i> </a>
                                        <a href="<?php echo Yii::$app->urlManager->createUrl(['menu/delete', "id" => $val->id]) ?>" onclick="if (!confirm('You sure you want to delete <?php echo $val->name ?> ?'))
                                                return false;" class="btn btn-xs purple" <?php if (Menu::checkChild($val->id)) { ?>disabled<?php } ?>> delete <i class="fa fa-times"></i> </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php echo LinkPager::widget([ 'pagination' => $pages]); ?>
                </div>
            </div>
        </div>

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