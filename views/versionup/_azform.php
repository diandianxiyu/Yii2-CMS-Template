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
                           <?php echo $model->isNewRecord ? 'Version added' : 'Version modification' ?>
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
                                    <label class="control-label col-md-3">Version name <span class="required" aria-required="true">
                                     *</span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'name')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter a version name' ] )->label(false) ?>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3">Upload the installation package <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-4">
                                      <?= $form->field($model, 'url')->fileInput([ 'value' => !$model->isNewRecord ? $model->url : '','class' => 'form-control' ])->label(false) ?>
                                        <input type='hidden' name='url' value='<?php echo @$url?>'>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Version number <span class="required" aria-required="true">
                                     *</span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'ver')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please input the version number' ] )->label(false) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Is forced to update <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                     <div class="icheck-inline col-md-4">
                                                <?php if($model->status==1){?>
                          
                                <label class="">
                                <div class="iradio_minimal-grey" style="position: relative;">
                                    <input type="radio" name="status" class="icheck" style="position: absolute; opacity: 0;" checked="" value="1">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
                                        
                                    </ins>
                                </div> Y </label>
                                <label class="">
                                <div class="iradio_minimal-grey " style="position: relative;">
                                    <input type="radio" name="status" class="icheck" style="position: absolute; opacity: 0;" value="0">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
                                        
                                    </ins>
                                </div> N </label>
                                  <?php
                                                }else if($model->status==0){
                                  ?>   
                                   <label class="">
                                <div class="iradio_minimal-grey" style="position: relative;">
                                    <input type="radio" name="status" class="icheck" style="position: absolute; opacity: 0;"  value="1">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
                                        
                                    </ins>
                                </div> Y </label>
                                <label class="">
                                <div class="iradio_minimal-grey " style="position: relative;">
                                    <input type="radio" name="status" class="icheck" style="position: absolute; opacity: 0;" value="0" checked="">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
                                        
                                    </ins>
                                </div> N </label>             
                                                <?php
                                                }else{
                                                ?>
                                          <label class="">
                                <div class="iradio_minimal-grey" style="position: relative;">
                                    <input type="radio" name="status" class="icheck" style="position: absolute; opacity: 0;"  value="1"  checked="">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
                                        
                                    </ins>
                                </div> Y </label>
                                <label class="">
                                <div class="iradio_minimal-grey " style="position: relative;">
                                    <input type="radio" name="status" class="icheck" style="position: absolute; opacity: 0;" value="0">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
                                        
                                    </ins>
                                </div> N </label>    
                                         <?php
                                                }
                                         ?>
                                        
                                        
                                       <!-- <?= $form->field($model, 'status')->radioList(['1'=>'Y','0'=>'N'])->label(false); ?>//-->
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Version Description <span class="required" aria-required="true">
                                     *</span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'describe')->textarea( [ 'class' => 'form-control', 'placeholder' => 'Please enter Version Description' ] )->label(false) ?>
                                    </div>
                                </div>
                                
   
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Submit</button>
                                        <a href="<?php echo Yii::$app->urlManager->createUrl('optionalbubble2/index')?>" class="btn default">Return list </a>

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