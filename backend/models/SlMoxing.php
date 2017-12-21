<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/18
 * Time: 15:32
 */

namespace backend\models;


use yii\db\ActiveRecord;

class SlMoxing extends ActiveRecord
{
    public static function tableName()
    {
        return 'sl_moxing';
    }
    public function rules(){
        return [
            [['u1','u2','u3'],'required'],
            ['u1','unique']
        ];
    }
    //与模型类型建立关系
    public function getCanshu(){
        return $this->hasOne(SlCanshu::className(),['id'=>'u3']);
    }
}