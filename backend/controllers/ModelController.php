<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/18
 * Time: 15:06
 */

namespace backend\controllers;

use backend\models\CreateTable;
use backend\models\Html;
use backend\models\SlCanshu;
use backend\models\SlField;
use backend\models\SlFiled;
use backend\models\SlMoxing;
use yii\web\Controller;

class ModelController extends Controller
{
    public $enableCsrfValidation = false;
    //模型列表
    public function actionIndex($page=1){
        $query = SlMoxing::find();
        //分页查询
        $offset = 10;
        $count = $query->count();
        //总页数
        $total = ceil($count/$offset);
        $start = ($page-1)*$offset;
        $model = $query->limit($offset)->offset($start)->all();
        return $this->render('index',['model'=>$model,'total'=>$total]);
    }
    //添加模型
    public function actionAdd(){
        $model = new SlMoxing();
        $request = \Yii::$app->request;
        if($request->isPost){
            $model->load($request->post(),'');
            if ($model->validate()){
                //保存模型数据
                $model->save();
                $model_id = \Yii::$app->db->getLastInsertID();
                //验证通过创建数据表
                $create_model = new CreateTable();
                $canshu = SlCanshu::findOne(['id'=>$model->u3]);
                $type = $canshu['u1'];
                $tableName = $model->u1;
                switch (trim($type)) {
                    case "表单模型":
                        $res = $create_model->createFormModel($tableName);
                        $data=[
                            ['u1'=>'create_time','u2'=>'添加时间','u4'=>1,'u5'=>1,'u6'=>0,'u7'=>'时间框'],
                        ];
                        $create_model->autoAdd($model_id,$data);
                        break;
                    case "用户模型":
                        $res = $create_model->createUserModel($tableName);
                        $data=[
                        ['u1'=>'yonghuming','u2'=>'用户名','u4'=>1,'u5'=>1,'u6'=>0,'u7'=>'文本框'],
                        ['u1'=>'mima','u2'=>'密码','u4'=>1,'u5'=>1,'u6'=>0,'u7'=>'文本框'],
                        ['u1'=>'create_time','u2'=>'添加时间','u4'=>1,'u5'=>1,'u6'=>0,'u7'=>'时间框'],
                    ];
                        $create_model->autoAdd($model_id,$data);
                        break;
                    default:
                        echo "没有这个模型!";
                }
                //创表成功保存数据到模型表
                if ($res){
                    \Yii::$app->session->setFlash('success','添加成功');
                    return $this->redirect(['model/index']);
                }else{
                    \Yii::$app->session->setFlash('error','添加失败');
                    return $this->redirect(['model/add']);
                }
            }else{
                var_dump($model->getErrors());die;
            }
        }
        //获取模型类型参数
        $canshu = SlCanshu::find()->where(['classid'=>4])->all();
        return $this->render('add',['model'=>$model,'canshu'=>$canshu]);
    }
    //修改模型
    public function actionEdit(){
        $request = \Yii::$app->request;
        $id = $request->get('id');
        $model = SlMoxing::findOne(['id'=>$id]);
        if ($request->isPost){
            $model->load($request->post(),'');
            if ($model->validate()){
                $model->save();
                return $this->redirect(['index']);
            }else{
                var_dump($model->getErrors());die;
            }
        }
        //获取模型类型参数
        $canshu = SlCanshu::find()->where(['classid'=>4])->all();
        return $this->render('edit',['model'=>$model,'canshu'=>$canshu]);
    }
    //删除模型
    public function actionDel($id){
        $model = SlMoxing::findOne(['id'=>$id]);
        $table = new CreateTable();
        //删除模型数据表和对应字段
        $res = $table->delTable($model->u1,$model->id);
        if ($model && $res){
            //删除模型表中的记录
            $model->delete();
            return $this->redirect(['index']);
        } else{
            var_dump($model->getErrors());die;
        }
    }

    public function actionTest(){
        $fileds = SlFiled::find()->where(['model_id'=>94])->andWhere(['u5'=>1])->asArray()->all();
        $html = '';
        foreach ($fileds as $v){
            $obj = new Html();
            $html .= $obj->getInput($v['u7'],$v['u2'],$v['u1']);
        }
        return $this->render('test',['html'=>$html]);
    }
}