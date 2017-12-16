<?php
/**
 * Created by PhpStorm.
 * User: M S I
 * Date: 2017/12/15
 * Time: 11:54
 */
namespace backend\models;
use yii\db\ActiveRecord;

class PasswordForm extends ActiveRecord{
    public static function tableName()
    {
        return 'jnc_admin';
    }
    //Identity
    public function rules()
    {
        return[
            ['password','required'],

        ];
    }
}