<?php
/**
 * Created by PhpStorm.
 * User: M S I
 * Date: 2017/12/20
 * Time: 9:56
 */
namespace frontend\models;
use yii\db\ActiveRecord;

class index extends  ActiveRecord{
    public static function tableName()
    {
        return 'jnc_sign';
    }
}