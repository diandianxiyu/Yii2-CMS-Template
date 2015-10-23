<?php

namespace app\controllers;

use Yii;
use app\controllers\AuthItemController;
use app\models\AuthItem;
use app\models\RoleForm;
use yii\data\Pagination;
use yii\web\HttpException;
use yii\rbac\Role;

/*
 * Role management
 * 2015-04-15
 * CalvinLee
 */

class RoleController extends AuthItemController {
    /*
     * Role list
     */

    public function actionIndex() {
        $query = AuthItem::find()->where(['type' => 1]);
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
     * View role
     */

    public function actionView($name) {
        $name = trim($name);
        $model = $this->loadModel($name);
        $child = $this->loadRolePermission($model->name);
        $childArray = array();
        if (!empty($child)) {
            foreach ($child as $value) {
                $childArray[$value] = $value;
            }
            $model->child = $childArray;
        } else {
            $model->child = array();
        }
        return $this->render('view', [ 'model' => $model, 'childArray' => $childArray]);
    }

    /*
     * Role add
     */

    public function actionCreate() {
        $model = new RoleForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //Instance role object
            $role = new Role();
            $role->name = $model->name;
            $role->type = $model->type;
            $role->description = isset($model->description) ? $model->description : NULL;
            // Role add
            $bool = Yii::$app->authManager->add($role);
            if ($bool) {
                return $this->redirect(['view', 'name' => $model->name]);
            }
        }
        $permissions = $this->loadPermission();

        return $this->render('create', [
                    'model' => $model,
                    'permissions' => $permissions
        ]);
    }

    /*
     * role delete
     */

    public function actionUpdate($name) {
        $name = trim($name);
        $model = $this->loadModel($name);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //Instance role object
            $role = new Role();
            $model->attributes = $_POST['AuthItem'];
            $role->name = $model->name;
            $role->type = $model->type;
            $role->description = isset($model->description) ? $model->description : NULL;
            $bool = Yii::$app->authManager->update($name, $role);
            if ($bool) {
                return $this->redirect(['view', 'name' => $model->name]);
            }
        }
        //Permission list
        $permissions = $this->loadPermission();
        return $this->render('update', [
                    'model' => $model,
                    'permissions' => $permissions
        ]);
    }

    /*
     * Check the current role permissions list
     */

    public function actionViewchild($name) {
        $name = trim($name);
        //Returns all permissions that the specified role represents.
        $permissions = Yii::$app->authManager->getPermissionsByRole($name);
        return $this->render('viewChild', [
                    'name' => $name,
                    'permissions' => $permissions
        ]);
    }

    /*
     * Create role permissions
     */

    public function actionSharechild($name) {
        $name = trim($name);
        $model = $this->loadModel($name);
        //The authority to the current role
        $childArray = $this->loadRolePermission($model->name);
        if (!empty($childArray)) {
            $model->child = $childArray;
        } else {
            $model->child = array();
        }
        //Returns all permissions in the system. 
        $permissions = Yii::$app->authManager->getPermissions();
        $perArr = array();
        foreach ($permissions as $key => $value) {
            $perArr[$value->name] = $value->name;
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //Role object
            $child = isset($_POST['AuthItem']['child']) ? $_POST['AuthItem']['child'] : NULL;
            //The form cannot be verified child so when the time to jump back to the original page
            if (empty($child)) {
                return $this->redirect(['updatechild', 'name' => $model->name]);
            }
            //To determine whether the role is assigned to the authority, has been assigned to delete, and vice versa
            if (!empty($childArray)) {
                //Removed all children form their parent.
                $bool = Yii::$app->authManager->removeChildren($model);
                if (!$bool) {
                    throw new HttpException(404, "Don't try to fool me! Make up your face.");
                }
            }
            //Current role object
            $role = Yii::$app->authManager->getRole($model->name);
            //Child permission to add
            if (isset($child)) {
                foreach ($child as $val) {
                    //Access permissions
                    $childObj = Yii::$app->authManager->getPermission($val);
                    //Write data to the item_child table (table)
                    Yii::$app->authManager->addChild($role, $childObj);
                }
                return $this->redirect([ 'view', 'name' => $model->name]);
            }
        }
        return $this->render('createChild', ['model' => $model, 'permissions' => $perArr]);
    }

    /*
     * Role deletion
     * The authority to bind the role is also removed.
     */

    public function actionDelete() {
        $name = trim($_GET['name']);
        $roleobj = Yii::$app->authManager->getRole($name);
        $role = $roleobj->name;
        //Returns the child roles.
        //角色的所有权限
        $childAll = Yii::$app->authManager->getChildren($role);
        if (isset($childAll)) {
            foreach ($childAll as $value) {
                //Returns the named permission.
                $perObj = Yii::$app->authManager->getPermission($value->name);
                //Removes a child from its parent.
                Yii::$app->authManager->removeChild($roleobj, $perObj);
            }
        }
        $bool = Yii::$app->authManager->remove($roleobj);
        if ($bool) {
            return $this->redirect([ 'index']);
        } else {
            throw new HttpException(404, 'TAT Delete failed。。。');
        }
    }

    /*
     * Returns all permissions in the system.
     * return Array
     */

    public function loadPermission() {
        $permissions = Yii::$app->authManager->getPermissions();
        $perArr = array();
        foreach ($permissions as $key => $value) {
            $perArr[$value->name] = $value->name;
        }
        return $perArr;
    }

    /*
     * Returns all permissions that the specified role represents.
     * return Array
     */

    public function loadRolePermission($name) {
        $permissObj = Yii::$app->authManager->getPermissionsByRole($name);
        $childArray = array();
        if (!empty($permissObj)) {
            foreach ($permissObj as $v) {
                $childArray[] = $v->name;
            }
        }
        return $childArray;
    }

}
