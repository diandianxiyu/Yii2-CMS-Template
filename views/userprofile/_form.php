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
                            User password change
                        </div>
                    </div>
             
            
            <div class="portlet-body form" >
                   <div class="form-body" id="yuanpwd">
                       <br>
                 <div class="form-group">
                                    <label class="control-label col-md-1">Enter the original password <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-2">
                                        <input type="password" name="pwdy" id="pwdy"><span class="required" aria-required="true" id="sppwdy">
                                     </span> </div> <button class="btn green" onclick="yanpwdy()">Next step</button>
                                        
                                   
                 </div>
                    
                   </div>
                
                <!--hidden//-->
                        <!-- BEGIN FORM-->
                        <div style="display: none" id="resetpwd">
                        <?php $form = ActiveForm::begin([
                            'id' => 'form_sample_1',
                            'options' => [
                                'class' => 'form-horizontal',
                                'novalidate'  => 'novalidate',
                            ],
                        ]); ?>
                            <div class="form-body">
                                

                                <div class="form-group">
                                    <label class="control-label col-md-3">Enter a new password <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" name="pwd1" id="pwd1" onblur="shen()"><span id="sppwd1"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Confirm password <span class="required" aria-required="true">
                                    * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" name="pwd2" id="pwd2" onblur="shen()"><span id="sppwd2"></span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-actions" style="display: none" id="tijiao">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Submit</button>
                                    </div>
                                </div>
                            </div>
                           
                        <!-- </form> -->
                        <?php ActiveForm::end(); ?></div><!--end hidden//-->
                        <!-- END FORM-->
                    </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
        
    </div>
</div>
<script>
function yanpwdy(){
    pwd=$('#pwdy').val();
    $.ajax({
            url:'oldpwd',
            data:{'pwd':pwd},
            type:'get',
            success:function(e){
                   if(e==1){
                      $('#resetpwd').show();  
                      $('#yuanpwd').hide();
                   }else{
                      $('#sppwdy').html('<font color="red">Not the same as that of the original password</font>');
                   }
            }
    });
}
function shen(){
    pwd1=$('#pwd1').val();
    pwd2=$('#pwd2').val();
    if(pwd1==''){
        $('#sppwd1').html('<font color="red">Can t be empty</font>');
    }else if(pwd2==''||pwd1==''){
        $('#sppwd2').html('<font color="red">Can t be empty</font>');
        $('#sppwd1').html('');
    }else if(pwd1==pwd2){
        $('#tijiao').show(); 
        $('#sppwd2').html('');
        $('#sppwd1').html('');
    }else{
         $('#sppwd2').html('<font color="red">First time inconsistency</font>');
    }
}
</script>