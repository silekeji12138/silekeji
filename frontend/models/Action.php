<?php
/**
 * Created by PhpStorm.
 * User: M S I LW
 * Date: 2017/12/17
 * Time: 16:25
 */
namespace frontend\models;
use yii\db\ActiveRecord;

class Action extends  ActiveRecord{
    public static function tableName()
    {
        return 'jnc_action';
    }
}