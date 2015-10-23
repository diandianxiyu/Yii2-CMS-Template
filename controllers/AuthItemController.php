<?php

namespace app\controllers;

use Yii;
use app\controllers\BaseController;
use app\models\AuthItem;
use yii\web\HttpException;

/*
 * Authority role class
 * 2015-04-15
 * CalvinLee
 */

class AuthItemController extends BaseController {

    //Universal query based on the authority and role of a table
    public function loadModel($name) {

        $model = AuthItem::findOne($name);
        if ($model === null)
            throw new HttpException(404, 'Data does not exist～～～');
        return $model;
    }

}
