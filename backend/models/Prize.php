<?php
/**
 * Created by PhpStorm.
 * User: M S I
 * Date: 2017/12/15
 * Time: 16:32
 */
namespace backend\models;
use yii\db\ActiveRecord;

class Prize extends ActiveRecord{
    public static function tableName()
    {
        return 'cb_luck_get';
    }
    public static function getCbAction(){

    }
}