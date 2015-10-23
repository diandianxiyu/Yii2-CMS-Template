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
                            <?php echo $model->isNewRecord ? 'Menu' : 'edit' ?>
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
                                    <label class="control-label col-md-3">Menu name <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'name')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter the menu name' ] )->label(false) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Parent menu <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-4">
                                      <?= $form->field($model, 'parent_id')->dropDownList($model->changeMenuBuild(), [ 'prompt'=> 'Parent menu','options' => [  ] ])->label(false) ?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Access path <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'url')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter the access path' ] )->label(false) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Authentication authority <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'auth_item')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter authentication permissions' ] )->label(false) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">SORT <span class="required" aria-required="true">
                                     </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'sort')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Enter the sort number' ] )->label(false) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">icon 
                                        <a href="#" class="btn btn-icon-only btn-circle grey-cascade">
                                        <i class="fa fa-link" onclick="openwin()"></i></a>
                                        <span class="required" aria-required="true">
                                     </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'icon')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter the icon name' ] )->label(false) ?>
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Parent menu selection 
                                        <span class="required" aria-required="true">
                                     </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'controller_tag')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter the parent menu to select the number of tags to be separated (parent menu)' ] )->label(false) ?>
                                        
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3">Sub menu selection 
                                        <span class="required" aria-required="true">
                                     </span>
                                    </label>
                                    <div class="col-md-4">
                                        <?= $form->field($model, 'action_tag')->textInput( [ 'class' => 'form-control', 'placeholder' => 'Please enter the sub menu to select the tag to use, separate (sub - level menu)' ] )->label(false) ?>
                                        
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Submit</button>
                                        <a href="<?php echo Yii::$app->urlManager->createUrl('menu/index')?>" class="btn default">Return list </a>

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



<script language="javascript"> 
<!-- 
function openwin() {
    window.open("<?php echo Yii::$app->urlManager->createUrl('menu/icon')?>","","width=800,height=800") 
} 
//--> 
</script>



