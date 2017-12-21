<?php
/**
 * Created by PhpStorm.
 * User: M S I LW
 * Date: 2017/12/17
 * Time: 16:25
 */
namespace frontend\models;
use yii\db\ActiveRecord;

class Rule extends  ActiveRecord{
    public $start;
    public $end;
    public static function tableName()
    {
        return 'jnc_rule';
    }
    //验证规则
    public function rules()
    {
        return[
            [['y_z','fy','ss','p_x','t_x','l_x','p_z','start','end'],'safe'],
        ];
    }

}