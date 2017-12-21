<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/19
 * Time: 11:35
 */

namespace backend\controllers;



use backend\models\CreateTable;
use backend\models\CUtf8_PY;
use backend\models\SlCanshu;
use backend\models\SlFiled;
use yii\web\Controller;

class FiledController extends Controller
{
    public $enableCsrfValidation = false;
    //模型的字段
    public function actionIndex($model_id){
        $model = SlFiled::find()->where(['model_id'=>$model_id])->andWhere(['u5'=>1])->all();
        return $this->render('index',['model'=>$model,'model_id'=>$model_id]);
    }
    //模型添加字段
    public function actionAdd($model_id){
        $model = new SlFiled();
        $request = \Yii::$app->request;
        if ($request->isPost){
            $model->model_id = $model_id;
            $model->load($request->post(),'');
            if ($model->validate()){
                //给表添加字段
                $table = new CreateTable();
                $tableName = $model->table->u1;
                $table->addColumn($tableName,$model);
                $model->save();
                return $this->redirect(['index','model_id'=>$model_id]);
            }else{
                var_dump($model->getErrors());exit;
            }
        }
        //字段类型
        $types = SlCanshu::find()->where(['classid'=>7])->all();
        return $this->render('add',['model_id'=>$model_id,'types'=>$types]);
    }
    //修改模型的字段
    public function actionEdit($model_id,$id){
        $model = SlFiled::findOne(['id'=>$id]);
        $oldColumn = $model->u1;
        $request = \Yii::$app->request;
        if ($request->isPost){
            $model->model_id = $model_id;
            $model->load($request->post(),'');
            $tableName = $model->table->u1;
            if ($model->validate()){
                //修改对应表结构
                $table = new CreateTable();
                //修改表字段
                $table->updateColumn($tableName,$model,$oldColumn);
                $model->save();
                return $this->redirect(['index','model_id'=>$model_id]);
            }else{
                var_dump($model->getErrors());exit;
            }
        }
        //字段类型
        $types = SlCanshu::find()->where(['classid'=>7])->all();
        return $this->render('edit',['model'=>$model,'model_id'=>$model_id,'types'=>$types]);
    }
    //删除字段
    public function actionDel($id,$model_id){
        $model = SlFiled::findOne(['id'=>$id]);
        if ($model){
            //删除数据表字段
            $table = new CreateTable();
            $tableName = $model->table->u1;
            $name = $model->u1;
            $table->delColumn($tableName,$name);
            $model->delete();
            return $this->redirect(['index','model_id'=>$model_id]);
        }
    }
    //汉字转拼音
    public function actionZh2py($model_id){
        $zh_str = \Yii::$app->request->post('zh_str');
        if(!isset($model_id))
        {
            return '{"code": 0,"content": "缺少model_id"}';
        }
        //汉字转拼音
        $str=CUtf8_PY::encode($zh_str,"all");
        $test = SlFiled::find()->where(['u1'=>$str])->all();
        if ($test){
            return '{"code": 0,"content": "该字段已存在"}';
        }else{
            return '{"code": 1,"content": "'.$str.'"}';
        }
    }
}