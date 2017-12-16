<?php
/**
 * Created by PhpStorm.
 * User: M S I
 * Date: 2017/12/15
 * Time: 14:55
 */
namespace backend\models;
use yii\db\ActiveRecord;

class Action extends ActiveRecord{
    public static function tableName()
    {
        return 'jnc_action';
    }

    public function rules()
    {
        return[
            [['title','starttime','endtime'],'required'],
            [['rule','type'],'safe'],

        ];
    }

    public function attributeLabels()
    {
        return[
            'title'=>'活动名称',
            'starttime'=>'活动开始时间',
            'endtime'=>'活动结束时间',
            'rule'=>'活动规则',
            'type'=>'活动分类',

        ];
    }
}