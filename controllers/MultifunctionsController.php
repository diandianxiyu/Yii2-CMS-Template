<?php

namespace app\controllers;

use Yii;
use app\controllers\BaseController;
use app\models\AppDefined;
use yii\web\UploadedFile;
use yii\web\HttpException;
use app\components\pic2sdk\ImgUpload;

/**
 * Function management
 * 2015-07-22
 * CalvinLee
 */
class MultifunctionsController extends BaseController {

    /**
     * Function list
     */
    public function actionIndex() {
        $result = AppDefined::getInfo();
        return $this->render('index', [
                    'models' => $result[0],
                    'pages' => $result[1]
        ]);
    }

    /**
     * Create a functional type 1 picture type 2 text
     */
    public function actionCreatefunc() {
        $type = Yii::$app->request->get('type');
        $model = new AppDefined;
        if ($type == 1) {
            if ($model->load(Yii::$app->request->post())) {
                $remarkArray = [
                    'type' => 1,
                    'content' => Yii::$app->request->post('remark')
                ];
                $model->remark = serialize($remarkArray);
                //获取上传图片信息
                $uploadFile = UploadedFile::getInstance($model, 'value');
                if ($uploadFile == null) {
                    echo "<script>alert('Choose a picture');location.href='createfunc?type=1'</script>";
                    die;
                } else {
                    $result = $model->uppicture($uploadFile);
                    $model->value = $result;
                }
                if ($model->save()) {
                    return $this->redirect('index');
                }
            }
            return $this->render('image_create', [
                        'model' => $model
            ]);
        } else if ($type == 2) {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $remarkArray = [
                    'type' => 2,
                    'content' => Yii::$app->request->post('remark')
                ];
                $model->remark = serialize($remarkArray);
                if ($model->save()) {
                    return $this->redirect('index');
                }
            }
            return $this->render('text_create', [
                        'model' => $model
            ]);
        }
    }

    /**
     * update
     */
    public function actionUpdatefunc() {
        $id = Yii::$app->request->get('id');
        $model = AppDefined::findOne(['id' => $id]);
        $remark = unserialize($model->remark);
        if ($remark['type'] == 1) {
            $head = unserialize($model->value);
            $headthumb = unserialize($head['thumb']);
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $remarkArray = [
                    'type' => 1,
                    'content' => Yii::$app->request->post('remark')
                ];
                $model->remark = serialize($remarkArray);
                //Get the upload picture information
                $uploadFile = UploadedFile::getInstance($model, 'value');
                if ($uploadFile == null) {
                    $model->value = Yii::$app->request->post('value');
                } else {
                    $result = $model->uppicture($uploadFile);
                    $model->value = $result;
                }
                if ($model->save()) {
                    return $this->redirect('index');
                }
            }
            return $this->render('image_update', [
                        'model' => $model,
                        'image' => $headthumb['cn'],
                        'remark' => $remark['content'],
                        'value' => $model->value
            ]);
        } else if ($remark['type'] == 2) {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $remarkArray = [
                    'type' => 2,
                    'content' => Yii::$app->request->post('remark')
                ];
                $model->remark = serialize($remarkArray);
                if ($model->save()) {
                    return $this->redirect('index');
                }
            }
            return $this->render('text_update', [
                        'model' => $model,
                        'remark' => $remark['content']
            ]);
        }
    }

    /*
     * del
     */
    public function actionDeletefunc() {
        $id = Yii::$app->request->get('id');
        $page = Yii::$app->request->get('page');
        $model = AppDefined::findOne(['id' => $id]);
        if ($model->delete()) {
            return $this->redirect(['index', 'page' => $page]);
        }
    }

}
