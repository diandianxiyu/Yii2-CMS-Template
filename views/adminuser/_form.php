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
                            <?php echo $model->isNewRecord ? 'Role add' : 'Role change' ?>
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
                                    <label class="control-label col-md-3">User name <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'username')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter a user name' ] )->label(false) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Nickname <span class="required" aria-required="true">
                                    </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'realname')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter a nickname' ] )->label(false) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Password <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'password')->textInput( [ 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Please enter a password' ] )->label(false) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Serial number <span class="required" aria-required="true">
                                    </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'sort')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter serial number' ] )->label(false) ?>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Submit</button>
                                        <a href="<?php echo Yii::$app->urlManager->createUrl('role/index')?>" class="btn default">Submit </a>
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