<h3 class="page-title">
    Administration <small> Role permissions</small>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo Yii::$app->urlManager->createUrl(['adminuser/index']) ?>">User list</a>
            <i class="fa fa-angle-right"></i>
        </li>

    </ul>
</div>

<div class="row">
    <?php 

    if ( !empty($data) ) { 
        foreach ($data as $key => $value) {

    ?>

    <div class="col-md-4 ">
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet box <?php $num = rand(0,4);$arr = array('blue-hoki','red','yellow','blue','green');echo $arr[$num]; ?>">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i><?=$key?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; "><div class="scroller"  data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd" data-initialized="1">
                   
                   <?php
                    if (!empty( $value['child'] ) ) {
                        foreach ($value['child'] as $val) { ?>
                        <strong><?=$val->name?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?=mb_substr($val->description, 0,12)?></strong><i class="fa fa-check"></i><br>
                   <?php  
                        }
                    } else {
                        echo 'The role is not added to the';
                    }
                    ?>
                </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 111.111111111111px; background: rgb(161, 178, 189);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; display: none; background: yellow;"></div></div>
            </div>
        </div>
        <!-- END Portlet PORTLET-->
    </div>

    <?php 
        } 
    }
    ?>

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
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
        });   
    </script>

