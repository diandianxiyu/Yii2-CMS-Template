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
                            Role assignment
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
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">User name <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type='text' class="form-control" value= "<?=$adminResult->realname?>" disabled='disabled'/>
                                        <?= $form->field($model, 'user_id')->textInput( [ 'class' => 'form-control', 'value' => $adminResult->id, 'type' => 'hidden' ] )->label(false) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Permission list <span class="required" aria-required="true">
                                     </span>
                                    </label>
                                    <div class="col-md-4">
                                         <?= $form->field($model, 'item_name')->checkboxList($roleArray, $model->item_name)->label(false) ?>
                                    </div>
                                </div>   


                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">提交</button>
                                        <a href="<?php echo Yii::$app->urlManager->createUrl('adminuser/index')?>" class="btn default">Return list </a>

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