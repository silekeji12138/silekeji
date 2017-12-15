<?php
/**
 * Created by PhpStorm.
 * User: M S I
 * Date: 2017/11/7
 * Time: 15:35
 */
namespace backend\models;

use yii\db\ActiveRecord;

class EditForm extends ActiveRecord {
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
            [['name','email','really_name','user'],'required'],
        ];
    }

    public function attributeLabels()
    {
        return[
            'username'=>'账号',
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


}