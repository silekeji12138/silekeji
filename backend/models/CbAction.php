<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/15
 * Time: 15:38
 */

namespace backend\models;

use yii\db\ActiveRecord;

class CbAction extends ActiveRecord
{
    public function rule(){
        return [
            [['title'],'required'],
        ];
    }
    public function attributeLabel(){
        return [
            'title'=>'活动标题',
        ];
    }
}