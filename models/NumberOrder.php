<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "number_order".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $lastest
 * @property integer $update_time
 */
class NumberOrder extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'number_order';
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
            [['type', 'lastest', 'update_time'], 'required'],
            [['type', 'lastest', 'update_time'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => '',
            'type' => '',
            'lastest' => '',
            'update_time' => '',
        ];
    }

    /**
     * Get the latest sequence ID, 1 users, 2 manuscript
     */
    public static function getNewid($type = 1) {
        $ids = self::find()->where(['type' => $type])->one();
        if (!$ids) {
            $model = new NumberOrder();
            $model->lastest = 1000;
            $model->type = $type;
            $model->update_time = time();
            $model->insert();
            return $model->lastest;
        }
        self::updateAll([
            'lastest' => $ids['lastest'] + 1,
            'update_time' => time(),
                ], ['id' => $ids['id']]);
        return $ids['lastest'] + 1;
    }

}
