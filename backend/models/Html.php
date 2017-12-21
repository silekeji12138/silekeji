<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/21
 * Time: 14:20
 */

namespace backend\models;


use yii\base\Model;

class Html extends Model
{
    //根据模板获取HTML内容
    public function getInput($type,$name,$filedName){
        switch ($type){
            case '文本框':
                $fileName = \Yii::getAlias('@backend/web/public/text.tpl');
                $html = file_get_contents($fileName);
                $html = str_replace('{%name%}',$name,$html);
                $html = str_replace('{%filedName%}',$filedName,$html);
                return $html;
            case '文本域':

                break;
            case '时间框':
                $fileName = \Yii::getAlias('@backend/web/public/time.tpl');
                $html = file_get_contents($fileName);
                $html = str_replace('{%name%}',$name,$html);
                $html = str_replace('{%filedName%}',$filedName,$html);
                return $html;
            case '数字框':
                $fileName = \Yii::getAlias('@backend/web/public/integer.tpl');
                $html = file_get_contents($fileName);
                $html = str_replace('{%name%}',$name,$html);
                $html = str_replace('{%filedName%}',$filedName,$html);
                return $html;
            case '密码框':
                $fileName = \Yii::getAlias('@backend/web/public/pwd.tpl');
                $html = file_get_contents($fileName);
                $html = str_replace('{%name%}',$name,$html);
                $html = str_replace('{%filedName%}',$filedName,$html);
                return $html;
            case '性别':
                $fileName = \Yii::getAlias('@backend/web/public/sex.tpl');
                $html = file_get_contents($fileName);
                $html = str_replace('{%name%}',$name,$html);
                $html = str_replace('{%filedName%}',$filedName,$html);
                return $html;
            default:
                echo '还没有开发此模块';
                break;
        }

    }
}