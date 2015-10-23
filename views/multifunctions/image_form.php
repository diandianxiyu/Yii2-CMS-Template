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
                            <?php echo $model->isNewRecord ? 'add' : 'update' ?>Custom variable
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <?php $form = ActiveForm::begin([
                            'id' => 'form_sample_1',
                            'options' => [
                                'class' => 'form-horizontal',
                                'novalidate'  => 'novalidate',
                                'enctype' => 'multipart/form-data',
                            ],
                        ]); ?>
                            <div class="form-body">
                               
                                <div class="form-group">
                                    <label class="control-label col-md-3">Variable name <span class="required" aria-required="true">
                                     *</span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'function_id')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Variable name' ] )->label(false) ?>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3">Value of variable <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-4">
                                      <?= $form->field($model, 'value')->fileInput([ 'value' => !$model->isNewRecord ? $model->value : '','class' => 'form-control' ])->label(false) ?>
                                    <?php if( !$model->isNewRecord ) { 
                                                echo "<img src='".@$image."' />";
                                            }
                                        ?>
                                        <input type="hidden" name='value' value='<?php echo @$value?>'>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">remark <span class="required" aria-required="true">
                                     </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="remark" value="<?php echo @$remark?>" class = 'form-control'>
                                      
                                    </div>
                                </div>
                                
   
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Submit</button>
                                        <a href="<?php echo Yii::$app->urlManager->createUrl('multifunctions/index')?>" class="btn default">Return list </a>

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