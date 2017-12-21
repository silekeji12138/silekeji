<?php
/**
 * Created by PhpStorm.
 * User: M S I LW
 * Date: 2017/12/17
 * Time: 16:25
 */
namespace frontend\models;
use yii\db\ActiveRecord;

class Sign extends  ActiveRecord{
    public static function tableName()
    {
        return 'jnc_sign';
    }
    //验证规则
    public function rules()
    {
        return[
            [['title','join_person','contact','address','info','story','type'],'required'],
            [['header','city','prvoince','county'],'safe']
        ];
    }

    public function attributeLabels()
    {
        return[
            'title'=>'主题',
            'join_person'=>'参赛人',
            'contact'=>'联系电话',
            'address'=>'地址',
            'header'=>'头像',
            'info'=>'工作服务简介',
            'story'=>'照片故事',
        ];
    }
}