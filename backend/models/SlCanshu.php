<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/18
 * Time: 17:13
 */

namespace backend\models;


use yii\db\ActiveRecord;

class SlCanshu extends ActiveRecord
{
    public static function tableName()
    {
        return 'sl_canshu';
    }
    //验证规则
    public function rules(){
        return [
            [['u1','u2','classid'],'required'],
            [['u3'],'safe'],
            ['u4','integer'],
            ['u1','unique']
        ];
    }
    //与classid建立关系
    public function getCanshu(){
        return $this->hasOne(SlCanshu::className(),['id'=>'classid']);
    }
}