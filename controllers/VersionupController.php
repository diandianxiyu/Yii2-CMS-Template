<?php

namespace app\controllers;

use Yii;
use app\controllers\BaseController;
use app\models\AppVersion;
use yii\web\HttpException;
use yii\web\UploadedFile;
use app\components\tools\Tools;

/*
 * App version management
 * 2015-05-26
 * 
 */
class VersionupController extends BaseController{
    /**
     * Version list
     */
    public function actionIndex(){
        $model=new AppVersion;
        $query = AppVersion::find()
                ->orderBy(['disabled'=>SORT_ASC]);
        $result=$model->getlist($query);
        return $this->render('index', [
	         'models' => $result[0],
	         'pages' => $result[1]
	    ]);
    }
    /**
     * Disable this version
     */
    public function actionJin(){
        $id=Yii::$app->request->get('id');
        $page=Yii::$app->request->get('page');
        $model=  AppVersion::findOne(['id'=>$id]);
        $model->disabled=1;
        if($model->save()){
            return $this->redirect(['index','page'=>$page]);
        }
    }
    /**
     * Enable this version
     */
    public function actionQi(){
        $id=Yii::$app->request->get('id');
        $page=Yii::$app->request->get('page');
        $type=Yii::$app->request->get('type');
        $model= AppVersion::findone(['type'=>$type,'disabled'=>0]);
        //To determine if there is an enabled version
        if($model==null){
            $object=  AppVersion::findOne(['id'=>$id]);
            $object->disabled=0;
            if($object->save()){
                return $this->redirect(['index','page'=>$page]);
            }
        }else{
            $model->disabled=1;
            $object=  AppVersion::findOne(['id'=>$id]);
            $object->disabled=0;
            if($model->save()&&$object->save()){
                return $this->redirect(['index','page'=>$page]);
            }
        }
    }
    /**
     * Increased version
     */
    public function actionCreate(){
        $model=new AppVersion;
        $type=Yii::$app->request->get('type');
        $model->status=0;
        if($model->load(Yii::$app->request->post())&&$model->validate()){
            $model->attributes = Yii::$app->request->post('versionup');
            $model->describe=htmlspecialchars($model->describe);
            if($type==2){
                $model->url=Yii::$app->request->post('url');         
            }else if($type==1){
                $uploadFile = UploadedFile::getInstance($model, 'url');
                //($uploadFile);
                if($uploadFile==null){
                    echo "<script>alert('Please choose the installation package');location.href='create?type=$type'</script>";return false;
                }
                $result=Tools::upthumb($uploadFile);
                $model->url=$result;
            }          
            $model->manager = Yii::$app->user->getId();
            $model->type=$type;
            $model->update_time=  time();
            $model->status=Yii::$app->request->post('status');
            if($model->save()){
                return $this->redirect(['index']);
            }
        }
        if($type==2){
            return $this->render('ioscreate',['model'=>$model]);
        }else{
            return $this->render('azcreate',['model'=>$model]);
        }
    }
    /**
     * Modified version
     */
    public function actionUpdate(){
        $id=Yii::$app->request->get('id');
        $type=Yii::$app->request->get('type');
        $model=  AppVersion::findOne(['id'=>$id]);
         if($model->load(Yii::$app->request->post())&&$model->validate()){
            $model->attributes = Yii::$app->request->post('versionup');
            $model->describe=htmlspecialchars($model->describe);
            if($type==2){
                $model->url=Yii::$app->request->post('url');              
            }else if($type==1){
                $uploadFile = UploadedFile::getInstance($model, 'url');
                if($uploadFile==null){
                    $model->url=Yii::$app->request->post('url');
                }else{
                    $result=Tools::upthumb($uploadFile);
                    $model->url=$result;
                }
            }            
            $model->manager = Yii::$app->user->getId();
            $model->type=$type;
            $model->update_time=  time();
            $model->status=Yii::$app->request->post('status');
            if($model->save()){
                return $this->redirect(['index']);
            }
        }
        if($type==2){
            return $this->render('iosupdate',['model'=>$model,'url'=>$model->url]);
        }else{
            return $this->render('azupdate',['model'=>$model,'url'=>$model->url]);
        }
    }
    /**
     * Delete version
     */
    public function actionDelete(){
        $id=Yii::$app->request->get('id');
        $page=Yii::$app->request->get('page');
        $model =  AppVersion::findOne(['id' => $id]);
        $res = $model->delete();
        if ($res) {
            return $this->redirect(['index','page'=>$page]);
        }
    }
}

