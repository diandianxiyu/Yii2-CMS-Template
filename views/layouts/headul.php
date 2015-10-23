<?php

use app\models\AuthItem;
?>
<ul class="page-breadcrumb">
    <li>
        <i class="fa fa-home"></i>
        <a href="<?php echo Yii::$app->urlManager->createUrl(['index.php']) ?>">HOME</a>
    </li>
    <?php if (isset($this->params['menu'])) { ?>

        <?php
        foreach ($this->params['menu'] as $val) {
            if (isset($val['controller_tag']) && in_array(Yii::$app->view->params['tag']['controller'], $val['controller_tag'])) {
                echo '<li class="start active open">';
                ?>
                <a href="javascript:;">
                    <i class="fa fa-angle-right"></i>
                    <span class="title"> <?php echo $val['name'] ?></span>
                </a>
                <?php
                if (isset($val['child'])) {
                    ?>
                    <?php
                    foreach ($val['child'] as $k => $v) {
                        if (isset($v['action_tag']) && in_array(Yii::$app->view->params['tag']['action'], $v['action_tag'])) {
                            echo '<li class="active">';
                            ?>
                                           <!-- <a href="<?php echo Yii::$app->request->baseUrl . '/' . Yii::$app->view->params['tag']['action'] ?>">//-->
                            <a >
                                <i class="fa fa-angle-right"></i>
                            <?php echo $name1 = AuthItem::getName(Yii::$app->view->params['tag']['action']); ?>
                            </a>           
                            <?php
                        } else {
                            echo "<li >";
                        }
                        ?>													
                    </li> <?php } ?>                              
                <?php
            }
        } else {
            echo "<li >";
        }
        ?>				
        </li><?php } ?>                   
<?php } ?>                 
</ul>



