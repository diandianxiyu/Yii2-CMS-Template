<?php

namespace app\controllers;

use Yii;
use app\controllers\AuthItemController;
use app\models\PermissionForm;
use app\models\AuthItem;
use yii\rbac\Permission;
use yii\data\Pagination;
use yii\web\HttpException;

/*
 * Authority management
 * 2015-04-15
 * CalvinLee
 * update at 2015.09.21
 * 
 */

class PermissionController extends AuthItemController {
    /*
     * Permission list
     */

    public function actionIndex() {
        $query = AuthItem::find()->where(['type' => 2])->orderBy(['created_at' => SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'defaultPageSize' => 2000,
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
     * Permission view
     */

    public function actionView($name) {
        $name = trim($name);
        return $this->render('view', [ 'model' => $this->loadModel($name)]);
    }

    /*
     * Permission add
     */

    public function actionCreate() {
        $model = new PermissionForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //Permission object in RBAC
            $permission = new Permission();
            $permission->name = trim($model->name);
            $permission->type = $model->type;
            $permission->description = isset($model->description) ? $model->description : NULL;
            //Permission add
            $bool = Yii::$app->authManager->add($permission);
            if ($bool) {
                return $this->redirect([ 'view', 'name' => $model->name]);
            }
        }
        return $this->render('create', [ 'model' => $model]);
    }

    /*
     * Permission modification
     */

    public function actionUpdate($name) {
        $name = trim($name);
        $model = $this->loadModel($name);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //Permission object in RBAC
            $permission = new Permission();
            //Assignment of Permission objects in DbManager
            $permission->name = trim($model->name);
            $permission->type = $model->type;
            $permission->description = isset($model->description) ? $model->description : NULL;
            //Updates the specified permission
            $bool = Yii::$app->authManager->update($name, $permission);
            if ($bool) {
                $this->redirect([ 'view', 'name' => $model->name]);
            }
        }
        return $this->render('update', [ 'model' => $model]);
    }

    //Permission deletion
    public function actionDelete() {
        $name = trim($_GET['name']);
        //Returns the named permission.
        $permission = Yii::$app->authManager->getPermission($name);
        //Removes a permission or rule from the RBAC system.
        $bool = Yii::$app->authManager->remove($permission);
        if ($bool) {
            return $this->redirect([ 'index']);
        } else {
            throw new HttpException(404, 'TAT Delete failed。。。');
        }
    }

    /**
     * Batch delete the corresponding permissions
     */
    public function actionDels() {
        foreach ($_POST['ck'] as $value) {
            $name = trim($value);
            //Returns the named permission.
            $permission = Yii::$app->authManager->getPermission($name);
            //Removes a permission or rule from the RBAC system.
            Yii::$app->authManager->remove($permission);
        }
        return $this->redirect([ 'index']);
    }

    /**
     * Scan file, add permissions
     */
    public function actionCreateByFile() {
        //Get controller folder
        $file_path = Yii::$app->controllerPath;
        //Get all the files
        //PHP traverse all the files in the folder
        $handle = opendir($file_path);
        //Defines an array for storing file names
        $array_file = array();
        while (false !== ($file = readdir($handle))) {
            //Matching file name
            if ($file != "." && $file != ".." && $file != ".DS_Store" && $file != ".gitignore") {
                $array_file[] = $file;
            }
        }
        closedir($handle);
        //Find out the class name, method and inside
        $t = explode('\\', __CLASS__)[2];
        //Initialize all the file results
        $all_functions = [];
        foreach ($array_file as $value) {
            //Get the class name, the name of the method
            $t_class = $file_path . '/' . $value;
            $class_name_file = str_replace('.php', '', $value);
            if (1 == 1
            ) {
                //Get the class name
                $class_name = str_replace('Controller', '', $class_name_file);
                //Loop to find out the lines that contain the common method.
                $file_handle = fopen($t_class, "r");
                //Full public method name
                $all_funcs = [];
                while (!feof($file_handle)) {
                    $line = fgets($file_handle);
                    //进行判断
                    if (count(explode('public function action', $line)) >= 2) {
                        $function_name = str_replace("public function action", "", $line);
                        $function_name = trim(explode("(", $function_name)[0]);
                        if ($function_name != 's') {
                            //Judge whether it is already there.
                            $names = $class_name . $function_name;
                            if (!AuthItem::findOne($names)) {
                                $all_funcs[] = $names;
                            }
                        }
                    }
                }
                fclose($file_handle);
            }
            //Judge whether this has no corresponding right


            $all_functions[$class_name] = $all_funcs;
        }

        //To carry out the corresponding display
        $model = new PermissionForm();
        if (Yii::$app->request->post()) {
            //View data
            $post = Yii::$app->request->post();
            foreach ($post['check'] as $key => $value) {
                $permission = new Permission();
                $permission->name = trim($key);
                $permission->type = $model->type;
                $permission->description = $post['remark'][$key];
                //Permission add
                $bool = Yii::$app->authManager->add($permission);
            }

            if ($bool) {
                return $this->redirect([ 'index']);
            }
        }
        return $this->render('all_func', [ 'model' => $model, 'funcs' => $all_functions]);
    }

}
