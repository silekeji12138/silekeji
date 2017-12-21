<?php
namespace backend\models;

use yii\base\Model;

class AdminForm extends Model{
    public $username;
    public $password;
    public function rules()
    {
        return [
          [['username','password'],'required'],
        ];
    }

    public function attributeLabels()
    {
        return[
            'username'=>'账号',
            'password'=>'密码'
        ];
    }

    public  function login(){
        $admin=Admin::findOne(['username'=>$this->username]);
        if ($admin){
            if (md5($this->password)==$admin->password){
                \Yii::$app->user->login($admin);
                return true;
            }else{
                $this->addError('password','密码错误');
                return false;
            }
        }else{
            $this->addError('username','账户不存在');
        }
        return false;
    }


}