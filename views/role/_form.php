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

                    <div class="form-group">
                        <label class="control-label col-md-3">Role name <span class="required" aria-required="true">
                                * </span>
                        </label>
                        <div class="col-md-4">
<?= $form->field($model, 'name')->textInput([ 'class' => 'form-control', 'placeholder' => 'Please enter the role name'])->label(false) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Role type <span class="required" aria-required="true">
                                * </span>
                        </label>
                        <div class="col-md-4">
<?= $form->field($model, 'type')->textInput([ 'value' => isset($model->type) ? $model->type : NULL, 'disabled' => 'disabled', 'class' => 'form-control'])->label(false) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Rule name <span class="required" aria-required="true">
                            </span>
                        </label>
                        <div class="col-md-4">
<?= $form->field($model, 'rule_name')->textInput([ 'class' => 'form-control', 'placeholder' => ''])->label(false) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Description <span class="required" aria-required="true">
                            </span>
                        </label>
                        <div class="col-md-4">
<?= $form->field($model, 'description')->textarea(['rows' => 6, 'cols' => 5])->label(false) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Data <span class="required" aria-required="true">
                            </span>
                        </label>
                        <div class="col-md-4">
<?= $form->field($model, 'data')->textarea(['rows' => 6, 'cols' => 5])->label(false) ?>
                        </div>
                    </div>


<?php if (!empty($permissions)) { ?>
                        <div class="form-group">
                            <label class="control-label col-md-3">Role list <span class="required" aria-required="true">
                                </span>
                            </label>
                            <div class="col-md-4">
                        <?= $form->field($model, 'child')->checkboxList($permissions, $model->child)->label(false) ?>
                            </div>
                        </div>   
<?php } ?>


                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">Submit</button>
                            <a href="<?php echo Yii::$app->urlManager->createUrl('role/index') ?>" class="btn default">Return list </a>

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