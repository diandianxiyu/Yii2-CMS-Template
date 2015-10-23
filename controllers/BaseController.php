<?php

namespace app\controllers;

header("Content-type:text/html;charset=utf-8");

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use app\controllers\MenuController;

/*
 * Privilege verification base class
 * 2015-04-15
 * CalvinLee
 */

class BaseController extends Controller {

    public function init() {
        parent::init();
        //According to the authority, a good menu list has been created.
        $menuResult = MenuController::createMenuList();
        Yii::$app->view->params['menu'] = $menuResult;
    }

    /*
     * Default action every time running function will be executed
     * For permission validation, landing judgment
     */

    public function beforeAction($action) {
        //Judge whether to log in
        if (Yii::$app->user->isGuest && ($action->id != 'login')) {
            return $this->redirect(Yii::$app->user->loginUrl);
        }
        //User right judgment
        $controller = $action->controller->id; //Gets the current controller name
        //echo $controller."<br>";
        $actionName = $action->id; //Gets the current method name
        //Splicing after segmentation
        $pin_arr = explode("-", $controller);
        $pin = "";
        foreach ($pin_arr as $key => $value) {
            $pin.= ucfirst($value);
        }
        $permission = $pin . ucfirst($actionName);
        $userId = Yii::$app->user->getId();
        //Splicing after segmentation
        Yii::$app->view->params['tag'] = array(
            'controller' => $controller,
            'action' => $controller . '/' . $actionName,
        );
        // Current user authority detection
        if (!Yii::$app->authManager->checkAccess($userId, $permission)) {
            throw new HttpException(200, "You do not have permission to access this feature~");
        }
        return parent::beforeAction($action);
    }

}
