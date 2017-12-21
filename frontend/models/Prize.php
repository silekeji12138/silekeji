<?php
/**
 * Created by PhpStorm.
 * User: M S I LW
 * Date: 2017/12/17
 * Time: 16:25
 */
namespace frontend\models;
use yii\db\ActiveRecord;

class Prize extends  ActiveRecord{
    public static function tableName()
    {
        return 'cb_luck_item';
    }

    public static function prize(){
        $result=self::find()->select(['number','level'])->asArray()->all();
        $arr=[];
        foreach ($result as $rs){
            if ($rs['number']>0){
                $arr[]=$rs['level'];
            }
        }
        return $arr;
    }
}