<?php

namespace app\models;

use Yii;
use yii\web\HttpException;
/**
 * This is the model class for table "admin_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $realname
 * @property string $add_time
 * @property string $edit_time
 * @property integer $sort
 * @property integer $disabled
 */
class AdminUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'password', 'username'], 'required'],
            [['add_time', 'edit_time'], 'safe'],
            [['sort', 'disabled'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 32],
            [['realname'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'password' => '密码',
            'realname' => '姓名',
            'add_time' => '添加时间',
            'edit_time' => '修改时间',
            'sort' => '序号',
            'disabled' => '状态',
        ];
    }

    /*
     * Finds an identity by the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    /*
     * Finds an identity by the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
    /*
     * Returns a key that can be used to check the validity of a given identity ID.
     */
    public function getId()
    {
        return $this->id;
    }
    /*
     * Returns an ID that can uniquely identify a user identity.
     */
    public function getAuthKey()
    {
        return $this->authKey = Yii::$app->getSecurity()->generatePasswordHash($this->id);
    }
    /*
     * Validates the given auth key.
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5(md5($password));
        // return $this->password === $password;
    }


    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
          $user = AdminUser::find()
            ->where(['username' => $username])
            ->asArray()
            ->one();
            if($user){
            return new static($user);
        }
        return null;
    }
    /*
     * User details
     * param int $id Manage user table key
     * return Object
     */
    public static function findByUser($id) {
        $id = intval($id);
        $result = AdminUser::findOne([ 'id' => $id ]);
        if ( $result) {
            return $result;
        }
        else {
            throw new HttpException(404, "The requested data is not present.～ 。 ～");
        }
    }
    /*
     * Return user name
     * param int $id Administrator table primary key
     * return string
     */
    public static function findByRealname($id) {
        $id = intval($id);
        $result = AdminUser::find()->where(['id' => $id])->select(['realname'])->one();
        return $result['realname'];
    }
    /**
     * Return user Avatar
     * param int $id
     * return string
     */
    public static function findUserhead($id){
        $id=  intval($id);
        $result=  AdminUser::find()->where(['id'=>$id])->select(['userhead'])->one();
        return $result['userhead'];
    }
    /**
     * Dynamically modify nickname
     */
    public static function upRealname($realname,$id){
        $model=  AdminUser::findOne(['id'=>$id]);
        $model->realname=$realname;
        if($model->save()){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
