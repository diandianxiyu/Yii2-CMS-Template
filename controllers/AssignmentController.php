<?php

namespace app\controllers;

use Yii;
use app\controllers\BaseController;
use yii\rbac\Assignment;
use app\models\AuthAssignment;
use app\models\AdminUser;

/*
 * Role related user class
 * 2015-04-15
 * CalvinLee
 */

class AssignmentController extends BaseController {
    /*
     * The role has a detailed authority, which manages the user to view
     * param int $id Administrator user ID
     * return Permission two-dimensional array
     */

    public function actionIndex($id) {
        //Returns all the roles assigned by the specified user。
        $assignObj = Yii::$app->authManager->getAssignments($id);
        $roleList = array();
        foreach ($assignObj as $key => $value) {
            //Returns all permissions for the specified role representative.
            $roleList[$value->roleName]['child'] = Yii::$app->authManager->getPermissionsByRole($value->roleName);
        }
        return $this->render('index', ['data' => $roleList]);
    }

    /*
     * Binding between role users
     * param int $id Administrator user ID
     */

    public function actionCreate($id) {
        $model = new AuthAssignment();
        //Gets the current user information
        $adminResult = AdminUser::findByUser($id);
        //Return all the roles in the system.
        $roleObj = Yii::$app->authManager->getRoles();
        $roleArray = array();
        foreach ($roleObj as $val) {
            $roleArray[$val->name] = $val->name;
        }
        //Returns all the roles assigned by the specified user.
        $assignArray = array();
        $assignObj = Yii::$app->authManager->getAssignments($id);
        if (!empty($assignObj)) {
            foreach ($assignObj as $va) {
                $assignArray[] = $va->roleName;
            }
        }
        $model->item_name = $assignArray;
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            $model->attributes = $_POST['AuthAssignment'];
            $assign = new Assignment();
                $bool = Yii::$app->authManager->revokeAll($id);
            $itemName = isset($model->item_name) ? $model->item_name : NULL;
            foreach ($itemName as $v) {
                //Returns the named role.
                $role = Yii::$app->authManager->getRole($v);
                // Assigns a role to a user.
                // $bool = Yii::$app->authManager->assign( $role, $model->user_id);
                $bool = Yii::$app->authManager->assign($role, $id);
            }
            if ($bool) {
                return $this->redirect(['index', 'id' => $id]);
            }
        }
        return $this->render('create', [
                    'model' => $model,
                    'roleArray' => $roleArray,
                    'adminResult' => $adminResult,
        ]);
    }
}
