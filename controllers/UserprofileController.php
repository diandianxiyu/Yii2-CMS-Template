<?php

namespace app\controllers;

use Yii;
use app\controllers\BaseController;
use yii\data\Pagination;
use app\models\AdminUser;
use yii\web\HttpException;
use yii\web\UploadedFile;
use app\components\tools\Tools;

/*
 * Modification of user's personal information
 * 2015-07-13
 * arthur.alston
 */

class UserprofileController extends BaseController {

    /**
     * Modify user Avatar
     */
    public function actionUphead() {
        $model = AdminUser::findone(Yii::$app->user->getId());
        $uploadFile = UploadedFile::getInstance($model, 'userhead');
        if ($uploadFile != '') {
            $url = Tools::upthumb($uploadFile);
            $model->userhead = $url;
            if ($model->save()) {
                return $this->render('uphead', ['model' => $model]);
            }
        }
        return $this->render('uphead', ['model' => $model]);
    }

    /**
     * User basic information
     */
    public function actionUserinfo() {
        $model = AdminUser::findOne(Yii::$app->user->getId());
        return $this->render('userinfo', ['model' => $model]);
    }

    /**
     * Modify user password
     */
    public function actionUppwd() {
        $model = AdminUser::findOne(Yii::$app->user->getId());
        if (Yii::$app->request->post()) {
            $pwd = Yii::$app->request->post('pwd2');
            $model->password = md5(md5($pwd));
            $model->save();
            Yii::$app->user->logout();
            return $this->goHome();
        }
        return $this->render('userpwd', ['model' => $model]);
    }

    /**
     * Password consistency
     */
    public function actionOldpwd() {
        $pwd = Yii::$app->request->get('pwd');
        $model = AdminUser::findOne(Yii::$app->user->getId());
        if ($model->password == md5(md5($pwd))) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /**
     * Modify nickname
     */
    public function actionUprealname() {
        $realname = Yii::$app->request->get('textval');
        $id = Yii::$app->request->get('id');
        $re = AdminUser::upRealname($realname, $id);
        if ($re) {
            return 1;
        } else {
            return 0;
        }
    }

}
