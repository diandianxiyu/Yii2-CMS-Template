<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\web\UploadedFile;
use app\components\pic2sdk\ImgUpload;

/**
 * This is the model class for table "{{%version_up}}".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $url
 * @property string $describe
 * @property integer $status
 * @property integer $ver
 * @property integer $manager
 * @property integer $update_time
 */
class AppVersion extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%app_version}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb() {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'ver', 'describe'], 'required'],
            [['status', 'ver'], 'integer'],
            [['name'], 'string', 'max' => 96],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => '',
            'type' => 'Type',
            'name' => 'Name',
            'url' => 'Url',
            'describe' => 'Describe',
            'status' => 'Status',
            'ver' => 'Ver',
            'manager' => 'Manager',
            'update_time' => 'Update Time',
        ];
    }

    //list
    public static function getlist($query) {
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'defaultPageSize' => 20,
        ]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        $result = array();
        $result[0] = $models;
        $result[1] = $pages;
        return $result;
    }

    //Upload Android installation package address
    public function upthumb($uploadFile) {
        if ($uploadFile->error == 0) {
            //2015-09-11 09:21:55 Calvin Modify file upload part
            $filename = explode(".", $uploadFile->name);
            $data = date("Y", time()) . '/' . date("m", time()) . '/' . date("d", time()) . '/';
            $save_path = "../uploads/apk/$data";
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $namef = md5(uniqid(rand(), true)) . '.' . end($filename);
            $savePath = $save_path . $namef;
            $full_path = str_replace("..", "", Yii::$app->basePath . $save_path . $namef);
            $uploadFile->saveAs($savePath);
            //Upload files
            $file_url = ImgUpload::upload($full_path, $namef, 'apk', Yii::$app->params['namespace']);
            @unlink($full_path);
            return $file_url;
        }
    }

}
