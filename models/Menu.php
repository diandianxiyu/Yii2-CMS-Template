<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property string $url
 * @property integer $sort
 * @property string $auth_item
 * @property string $icon
 * @property string $create_at
 * @property string $update_at
 * @property string $controller_tag
 * @property string $action_tag
 */
class Menu extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'auth_item'], 'required'],
            [['parent_id', 'sort'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['url', 'controller_tag', 'action_tag'], 'string', 'max' => 255],
            [['auth_item'], 'string', 'max' => 150],
            [['icon'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => '',
            'name' => '',
            'parent_id' => '',
            'url' => '',
            'sort' => '',
            'auth_item' => '',
            'icon' => '',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'controller_tag' => '',
            'action_tag' => '',
        ];
    }

    /*
     * Multilevel drop option data
     */

    public function getByDropDownList($parent_id = 0, $level = 0) {

        $data = $this->findAll([ 'parent_id' => $parent_id]);
        $result = array();
        $str = '|-';
        for ($i = 0; $i < $level; $i++) {
            $str .= '---';
        }
        foreach ($data as $key => $value) {
            $result[][$value->id] = $str . $value->name;
            $levelArray = $this->getByDropDownList($value->id, $level + 1);
            $result = is_array($levelArray) ? array_merge($result, $levelArray) : $result;
        }
        return $result;
    }

    /*
     * Reduce the list of menu drop-down list
     */

    public function changeMenuBuild() {
        $data = $this->getByDropDownList();
        $result = array();
        foreach ($data as $key => $value) {
            foreach ($value as $k => $val) {
                $result[$k] = $val;
            }
        }
        return $result;
    }

    /*
     * Get menu name
     */

    public function getMenuName($pid, $id) {
        $pid = intval($pid);
        $id = intval($id);
        //Judge whether it is a parent
        if (!empty($pid)) {
            $result = $this->findOne([ 'id' => $pid]);
        } else {
            $result = $this->findOne([ 'id' => $id]);
        }
        return $result->name;
    }

    /*
     * To determine whether there is a sub grade
     */

    public static function checkChild($id) {
        $result = self::findAll([ 'parent_id' => $id]);
        if (!empty($result)) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * Get the parent menu
     */

    public static function getByMenuParent() {
        return self::find()->where('parent_id=:parent_id', [':parent_id' => 0])->orderBy('sort DESC')->all();
    }

    /*
     * Get sub menu
     */

    public static function getByMenuChild() {
        return self::find()->where('parent_id not in(0) ')->orderBy('sort DESC')->all();
    }

    /*
     * Menu array
     */

    public static function createTree() {
        $dataParent = self::getByMenuParent();
        $dataChild = self::getByMenuChild();
        $result = array();
        foreach ($dataParent as $key => $value) {
            $result[$key]['name'] = $value->name;
            $result[$key]['url'] = $value->url;
            $result[$key]['auth_item'] = $value->auth_item;
            $result[$key]['icon'] = $value->icon;
            $result[$key]['controller_tag'] = $value->controller_tag;
            $result[$key]['action_tag'] = $value->action_tag;
            foreach ($dataChild as $k => $val) {
                if ($value->id == $val->parent_id) {
                    $result[$key]['child'][$k]['name'] = $val->name;
                    $result[$key]['child'][$k]['url'] = $val->url;
                    $result[$key]['child'][$k]['auth_item'] = $val->auth_item;
                    $result[$key]['child'][$k]['icon'] = $val->icon;
                    $result[$key]['child'][$k]['controller_tag'] = $val->controller_tag;
                    $result[$key]['child'][$k]['action_tag'] = $val->action_tag;
                }
            }
        }
        return $result;
    }

    /**
     * 得到菜单名称
     */
    public static function getName($url) {
        $name = Menu::find()
                ->where(['url' => $url])
                ->all();

        if (empty($name)) {
            $menuname = '';
        } else {
            $menuname = $name[0]['name'];
        }
        return $menuname;
    }

}
