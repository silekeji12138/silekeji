<?php
/**
 * Created by PhpStorm.
 * User: M S I
 * Date: 2017/11/7
 * Time: 15:35
 */
namespace backend\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Admin extends ActiveRecord implements IdentityInterface {
    public static function tableName()
    {
        return 'jnc_admin';
    }
 //Identity
    public function rules()
    {
        return[
            ['username','unique', 'message' => '账号不能重复'],
            ['email','match','pattern'=>'/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/','message'=>'邮箱格式不正确'],
            ['email', 'unique','message'=>'{attribute}已经被占用了'],
            [['qq','address','status','sex','role_id','mobile'],'safe'],
            ['mobile','unique', 'message' => '电话不能重复'],
            [['name','password','email','really_name','username'],'required'],
        ];
    }

    public function attributeLabels()
    {
        return[
            'username'=>'账号',
            'password'=>'密码',
            'email'=>'邮箱',
            'name'=>'昵称',
            'qq'=>'qq号码',
            'address'=>'详细地址',
            'header'=>'头像',
            'mobile'=>'手机号码',
            'role_id'=>'角色',
            'status'=>'状态',
            'really_name'=>'真实姓名',
            'sex'=>'性别',
        ];
    }
   //identity
    public static function findIdentity($id)
    {
        return self::findOne(['id'=>$id]);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        return $this->auth_key;
        // TODO: Implement getAuthKey() method.
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key===$authKey;
        // TODO: Implement validateAuthKey() method.
    }

}