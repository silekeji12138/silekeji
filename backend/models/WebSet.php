<?php
/**
 * Created by PhpStorm.
 * User: M S I
 * Date: 2017/12/15
 * Time: 10:58
 */
namespace backend\models;
use yii\db\ActiveRecord;

class WebSet extends ActiveRecord{
    public static function tableName()
    {
        return 'jnc_webset';
    }

    public function rules()
    {
        return[
            ['title','required'],
            [['keywords','describe'],'safe'],
        ];
    }

    public function attributeLabels()
    {
        return[
            'title'=>'SEO标题',
            'keywords'=>'SEO关键字',
            'describe'=>'SEO描述',
        ];
    }
}