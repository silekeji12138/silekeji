<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/19
 * Time: 18:34
 */

namespace backend\models;


use yii\base\Model;

class CreateTable extends Model
{
    //创建模型时，自动添加默认字段
    public function autoAdd($model_id,$data=[]){
        foreach ($data as $v){
            $model = new SlFiled();
            $model->model_id = $model_id;
            $model->u1=$v['u1'];
            $model->u2=$v['u2'];
            $model->u4=$v['u4'];
            $model->u5=$v['u5'];
            $model->u6=$v['u6'];
            $model->u7=$v['u7'];
            $model->save();
        }
    }
    //创建用户模型表
    public function createUserModel($tableName){
        $now = time();
        $sql = "
        CREATE TABLE `{$tableName}` (
        `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
        `yonghuming` varchar(255) NOT NULL DEFAULT '' COMMENT '用户名',
        `mima` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
        `create_time` int  DEFAULT {$now} COMMENT '添加时间',
        PRIMARY KEY (`id`)
        ) ENGINE=INNODB  CHARSET=utf8;";
        $command = \Yii::$app->db->createCommand($sql);
        $res = $command->query();
        if ($res){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 创建表单模型表
     * @param $tableName
     * @return bool
     */
    public function createFormModel($tableName)
    {
        $sql = "
        CREATE TABLE `{$tableName}` (
        `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
        
        `create_time` timestamp NULL DEFAULT now() COMMENT '添加时间',
        PRIMARY KEY (`id`)
        ) ENGINE=INNODB  CHARSET=utf8;";
        $command = \Yii::$app->db->createCommand($sql);
        $res = $command->query();
        if ($res){
            return true;
        }else{
            return false;
        }
    }
    //删除数据表
    public function delTable($tableName,$model_id){
        //删除对应数据表
        $sql = "DROP TABLE {$tableName}";
        $command = \Yii::$app->db->createCommand($sql);
        $res = $command->query();
        if ($res){
            //删表成功，删除filed表中的字段
            $count = SlFiled::deleteAll(['model_id'=>$model_id]);
            if ($count){
                return true;
            }
            return false;
        }else{
            return false;
        }
    }
    //添加字段
    public function addColumn($tableName,$model){
        //是否必填
        $null = $model->u4==1?'NOT NULL':'NULL';
        //字段默认值
        $default = empty($model->u8)?'':'DEFAULT '.$model->u8;
        //字段类型
        $type = $model->type->u2;
        $sql = "ALTER TABLE `{$tableName}` ADD COLUMN `{$model->u1}`  {$type} {$null} {$default} COMMENT '{$model->u2}';";
//        var_dump($sql);die;
        $command = \Yii::$app->db->createCommand($sql);
        $command->query();
    }
    //修改表字段
    public function updateColumn($tableName,$model,$oldColumn){
        //是否必填
        $null = $model->u4==1?'NOT NULL':'NULL';
        //字段默认值
        $default = empty($model->u8)?'':'DEFAULT '.$model->u8;
        //字段类型
        $type = $model->type->u2;
        $sql = "ALTER TABLE `{$tableName}` CHANGE COLUMN `{$oldColumn}` `{$model->u1}`  {$type}  {$null} {$default} COMMENT '{$model->u2}';";
        //执行sql
        $command = \Yii::$app->db->createCommand($sql);
        $command->query();
    }
    //删除字段
    public function delColumn($tableName,$name){
        $sql = "ALTER TABLE `{$tableName}`
DROP COLUMN `{$name}`;";
        $command = \Yii::$app->db->createCommand($sql);
        $command->query();
    }
}