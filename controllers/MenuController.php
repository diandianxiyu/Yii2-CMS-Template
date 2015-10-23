<?php

namespace app\controllers;

use Yii;
use yii\web\HttpException;
use app\controllers\BaseController;
use yii\data\Pagination;
use app\models\Menu;

/*
 * Menu management
 * 2015-04-15
 * CalvinLee
 */

class MenuController extends BaseController
{

    /*
     * Menu list
     */
    public function actionIndex() {
        $query = Menu::find()->orderBy('sort DESC');
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
     * View menu details
     */
    public function actionView($id) {
        $model = new Menu();
        $model->checkChild($id);
        return $this->render('view', ['model' => $this->loadModel($id) ]);
    }

    /*
     * Add menu
     */
    public function actionCreate() {
        $model = new Menu();

        if ( $model->load( Yii::$app->request->post() ) && $model->validate() ) {
            $model->attributes = $_POST['Menu'];
            $model->auth_item  = !empty( $model->auth_item ) ? trim( $model->auth_item ) : '';
            $model->parent_id  = !empty( $model->parent_id ) ? $model->parent_id : 0;
            $model->sort       = !empty( $model->sort ) ? $model->sort : 0;
            if ( $model->save() ) {
                return $this->redirect(['view', 'id' => $model->id ]);
            }
        }
        return $this->render('create', ['model' => $model]);
    }

    /*
     * Update menu
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        if ( $model->load( Yii::$app->request->post() ) && $model->validate() ) {
            $model->attributes = $_POST['Menu'];
            $model->auth_item  = !empty( $model->auth_item ) ? trim( $model->auth_item ) : '';
            $model->parent_id  = !empty( $model->parent_id ) ? $model->parent_id : 0;
            $model->sort       = !empty( $model->sort ) ? $model->sort : 0;
            if ( $model->save() ) {
                return $this->redirect(['view', 'id' => $model->id ]);
            }
        }
        return $this->render('update', ['model' => $model]);
    }

    /*
     *Delete menu
     */
    public function actionDelete() {
        $id = intval( trim( $_GET['id'] ) );
        $res = Menu::findOne($id)->delete();
        if($res) {
            return $this->redirect(['index']);    
        }
        else {
            throw new HttpException(404, "The resource does not exist, delete a mistake");
        }
    }


    /*
     * Data query
     */
    public function loadModel($id) {
        $id = intval( trim($id) );
        // $model = new Menu();
        $result = Menu::findOne(['id' => $id]);
        if ( isset($result) ) {
            return $result;
        }
        else {
            throw new HttpException( 403, "Yo ~ this data does not exist");
        }

    }

    /*
     * After the user logs in the menu list
     */
    public static function createMenuList() {
        $menuData = Menu::createTree();
        $userId = Yii::$app->user->getId();
        //Returns all permissions that the user has.
        $userPermissionData = Yii::$app->authManager->getPermissionsByUser( $userId );
        $permissionArray = array();
        $result = array();
        //Put the user's permissions in a one-dimensional array
        foreach ($userPermissionData as $key => $value) {
            $permissionArray[] = $value->name; 
        }
        //Circular menu array, View menu authentication permissions exist in the array of permissions in the new array
        foreach ($menuData as $key => $val) {
            //To determine whether the parent menu is in the right array
            if ( in_array($val['auth_item'], $permissionArray) ) {
                $result[$key]['name']  = $val['name'];
                
                $result[$key]['url']   = $val['url'];
                $result[$key]['icon']  = $val['icon'];
                $result[$key]['controller_tag']  = isset( $val['controller_tag'] ) ? array_filter( explode(',', $val['controller_tag']) ) : $val['controller_tag'];
                $result[$key]['action_tag']  = isset( $val['action_tag'] ) ? array_filter( explode(',', $val['action_tag']) ) : $val['action_tag'];
                
                //Whether there is a sub menu, the existence of the right to continue to judge
                if ( isset($val['child']) ) {
                    foreach ($val['child'] as $k => $v) {
                        if ( in_array($v['auth_item'], $permissionArray) ) {
                            $result[$key]['child'][$k]['name']  = $v['name'];
                            
                            $result[$key]['child'][$k]['url']   = $v['url'];
                            $result[$key]['child'][$k]['icon']  = $v['icon'];
                            $result[$key]['child'][$k]['controller_tag']  = isset( $v['controller_tag'] ) ? array_filter( explode(',', $v['controller_tag']) ) : $v['controller_tag'];
                            $result[$key]['child'][$k]['action_tag']  = isset( $v['action_tag'] ) ? array_filter( explode(',', $v['action_tag']) ) : $v['action_tag'];
                            //Check the menu name from the menu URL
                            for($i=0;$i<count($result[$key]['child'][$k]['action_tag']);$i++){
                                $result[$key]['child'][$k]['action_tag']['name']= Menu::getName($result [$key]['child'][$k]['action_tag']);
                                //echo $result[$key]['child'][$k]['action_tag']['name'];
                            }
                        }   
                    }
                }
            }
        }
        //print_r($result);die;
        return $result;
    }

    /*
     * Icon rendering
     */
    public function actionIcon() {
        return $this->renderPartial('icon');
    }

}