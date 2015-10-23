<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use app\components\pic2sdk\ImgUpload;


/**
 * This is the model class for table "app_defined".
 *
 * @property integer $id
 * @property string $function_id
 * @property string $value
 * @property string $remark
 */
class AppDefined extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'app_defined';
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
            [['function_id', 'value'], 'required'],
            [['value'], 'string'],
            [['function_id', 'remark'], 'string', 'max' => 96]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => '',
            'function_id' => '',
            'value' => '',
            'remark' => '',
        ];
    }

    /**
     * Get functional information
     */
    public static function getInfo() {
        $query = AppDefined::find()
                ->orderBy(['id' => SORT_ASC]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'defaultPageSize' => 10,
        ]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        $result = array();
        $result[0] = $models;
        $result[1] = $pages;
        return $result;
    }

    /**
     * Upload pictures
     */
    public static function uppicture($uploadFile) {
        if ($uploadFile->error == 0) {
            $filename = explode(".", $uploadFile->name);
            $data = date("Y", time()) . '/' . date("m", time()) . '/' . date("d", time()) . '/';
            $save_path = "../uploads/func/$data";
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $namef = md5(uniqid(rand(), true)) . '.' . end($filename);
            $savePath = $save_path . $namef;
            $img_full_path = str_replace("..", "", Yii::$app->basePath . $save_path . $namef);
            $uploadFile->saveAs($savePath);
            $file_url = ImgUpload::upload($img_full_path, $namef, 'func', Yii::$app->params['namespace']);
            return $file_url;
        }
    }

}
