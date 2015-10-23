<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use app\models\AdminLogin;

/*
 * login
 * 2015-05-14
 * CalvinLee
 */

class LoginController extends Controller {
    /*
     * User login
     */

    public function actionLogin() {

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new AdminLogin();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->renderPartial('login', ['model' => $model]);
        }
    }

    /*
     * User exit
     */

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
?>