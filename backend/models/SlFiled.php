<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/19
 * Time: 11:37
 */

namespace backend\models;



use yii\db\ActiveRecord;

class SlFiled extends ActiveRecord
{
    public function rules(){
        return [
            [['u1','u2','u7'],'required'],
            [['u8','u9','u10','u4','u5','u6','u3'],'safe']
        ];
    }
    //建立字段与参数的关系
    public function getType(){
        return $this->hasOne(SlCanshu::className(),['u1'=>'u7']);
    }
    public function getTable(){
        return $this->hasOne(SlMoxing::className(),['id'=>'model_id']);
    }
}