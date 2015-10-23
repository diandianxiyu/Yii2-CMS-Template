<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\AdminLogin;
use yii\filters\VerbFilter;
use app\models\AdminUser;
use app\controllers\BaseController;

/**
 * Site controller
 */
class SiteController extends BaseController {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
        ];
    }

    public function actionIndex() {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('index');
        } else {
            $model = new AdminLogin();
            return $this->renderPartial('login', ['model' => $model]);
        }
    }

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

    /**
     * Display error message
     */
    public function actionError() { 
          $message =  \Yii::$app->errorHandler->exception->getMessage();
          $code= \Yii::$app->errorHandler->exception->getCode();
         return $this->render('new_error',[
             'message'=>$message,
             'code'=>$code,
         ]);
           
        
    }
}
        