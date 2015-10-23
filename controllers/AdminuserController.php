<?php

namespace app\controllers;

use Yii;
use app\controllers\BaseController;
use yii\data\Pagination;
use app\models\AdminUser;
use yii\web\HttpException;
use yii\web\UploadedFile;

/*
 * Administrator management
 * 2015-04-15
 * CalvinLee
 */

class AdminuserController extends BaseController {
    /*
     * Administrator management user list
     */
    public function actionIndex() {
        $query = AdminUser::find();
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'defaultPageSize' => 20,
        ]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return $this->render('index', [
                    'models' => $models,
                    'pages' => $pages,
        ]);
    }

    /*
     * Background user information in detail
     * param int $id
     */
    public function actionView($id) {
        return $this->render('view', [ 'model' => $this->loadModel($id)]);
    }

    /*
     * Administrator user add
     */
    public function actionCreate() {
        $model = new AdminUser();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->attributes = $_POST['AdminUser'];
            $model->password = md5(md5($model->password));
            $model->disabled = 1;
            $model->add_time = date('Y-m-d H:i:s', time());
            $model->edit_time = date('Y-m-d H:i:s', time());
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [ 'model' => $model]);
    }

    /*
     * Administrator user modification
     * param int $_GET['id']
     */
    public function actionUpdate() {
        $model = $this->loadModel($_GET['id']);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->attributes = $_POST['AdminUser'];
            $model->password = md5(md5($model->password));
            $model->edit_time = date('Y-m-d H:i:s', time());
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [ 'model' => $model]);
    }

    /*
     * Administrator user delete
     * param int $_GET['id']
     */
    public function actionDelete() {
        $id = intval(trim($_GET['id']));
        $res = AdminUser::findOne($id)->delete();
        if ($res) {
            return $this->redirect(['index']);
        } else {
            throw new HttpException(404, "该资源不存在，删除有误");
        }
    }

    /*
     * Enable disable administrator account
     */
    public function actionDisabled() {
        $id = intval(trim($_GET['id']));
        $model = $this->loadModel($id);
        $model->disabled = abs($this->loadModel($id)->disabled - 1);
        if ($model->update()) {
            return $this->redirect(['index']);
        } else {
            throw new HttpException(404, 'TAT Enable failure。。。');
        }
    }

    /*
     * Query specified data
     * param int $id
     * return object $result
     */
    public function loadModel($id) {
        $id = intval(trim($id));
        return AdminUser::findOne(['id' => $id]);
    }

    /**
     * Modify user Avatar
     */
    public function actionUphead() {
        $model = AdminUser::findone(Yii::$app->user->getId());
        $uploadFile = UploadedFile::getInstance($model, 'userhead');
        if ($uploadFile != '') {
            $url = $model->uppicture($uploadFile);
            $model->userhead = $url;
            if ($model->save()) {
                return $this->render('uphead', ['model' => $model]);
            }
        }
        return $this->render('uphead', ['model' => $model]);
    }

}
