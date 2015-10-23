<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
?>
<div class="row">
    <div class="col-md-12 ">
        <h3 class="page-title">
            User information management<small> User basic information </small>
        </h3>
        <div class="page-bar">
            <?php include_once '../views/layouts/headul.php'; ?>

        </div>

        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>用户基本信息
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive" style="margin-left: 400px">
                    <?php $userhead = unserialize($model->userhead); ?>
                    <a href="<?php echo Yii::$app->urlManager->createUrl(['userprofile/uphead']) ?>"> <img src="<?php echo $userhead['cn'] ?>" class="img-circle" width="80px" height="80px"></a>
                    <br><br><br><font color="purple" size="3">User basic information：</font><?php echo $model->username ?>
                    <br> <br><font color="purple" size="3">User nickname：</font>

                    <span id="spname<?php echo $model->id ?>" onclick="getspname('<?php echo $model->id ?>')">   <?php echo $model->realname ?></span>
                    <input type="text" value='<?php echo $model->realname ?>' style="display:none;" id="valtext<?php echo $model->id ?>"  onblur="gettext('<?php echo $model->id ?>')" onfocus="textfocus('<?php echo $model->id ?>')">





                    &nbsp;&nbsp; <font color="#cccccc">< Click Modify nickname ></font>

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
<script>
    function getspname(id) {
        spname = $('#spname' + id).html();
        $('#valtext' + id).show();
        $('#spname' + id).hide();
        $('#valtext' + id).focus();
    }
    function gettext(id) {
        textval = $('#valtext' + id).val();
        if (textval == '') {
            alert('Not allowed to be empty');
            $('#valtext' + id).focus();
            return false;
        } else {
            $.ajax({
                url: 'uprealname',
                data: {'textval': textval, 'id': id},
                type: 'get',
                success: function (e) {
                    if (e == 1) {
                        $('#spname' + id).show();
                        $('#valtext' + id).hide();
                        history.go(0);
                    }
                }
            });
        }


    }
</script>