<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use app\models\AdminUser;
use app\models\AuthItem;
?>
<div class="row">
    <div class="col-md-12 ">
        <h3 class="page-title">
            Custom variable management <small>   </small>
        </h3>
        <div class="page-bar">
             <?php include_once '../views/layouts/headul.php';?>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Operation <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a href="<?php echo Yii::$app->urlManager->createUrl(['multifunctions/createfunc','type'=>2]) ?>">Text added</a>
                            <a href="<?php echo Yii::$app->urlManager->createUrl(['multifunctions/createfunc','type'=>1]) ?>">Picture added</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                   Custom variable list
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover ">
                    <thead>
                        <tr>
                            <th>  key   </th>
                            <th> value </th>
                            <th> remark</th>
                            <th> Operation     </th>
                        </tr>
                    </thead>
                    <tbody>     
                    <?php foreach ($models as $val) {  $remark=  unserialize($val->remark);?>
                       
                        <tr>
                            <td><?php echo $val->function_id?></td>
                            <td><?php                            
                            if($remark['type']==1){
                                echo "<img src='".$val->value."' width='80px' height='80px' class='img-circle'>";
                            }else if($remark['type']==2){
                                echo $val->value;
                            }
                            ?></td>
                            <td><?php echo $remark['content']?></td>
                            <td>
                               
                                  <a href="<?php echo Yii::$app->urlManager->createUrl(['multifunctions/updatefunc','id'=>$val->id])?>" class="btn btn-xs green">Modify </a>
                                  <a href="<?php echo Yii::$app->urlManager->createUrl(['multifunctions/deletefunc','id'=>$val->id,'page'=>$pages->offset/$pages->defaultPageSize+1])?>" class="btn btn-xs red">Delete </a>
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