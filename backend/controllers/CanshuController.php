<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/18
 * Time: 16:25
 */

namespace backend\controllers;


use backend\models\SlCanshu;
use yii\helpers\Url;
use yii\web\Controller;

class CanshuController extends Controller
{
    public $enableCsrfValidation = false;
    //参数列表
    public function actionIndex($classid=0){
        $model = SlCanshu::find()->where(['classid'=>$classid])->all();
//        var_dump($model);die;
        return $this->render('index',['model'=>$model,'classid'=>$classid]);
    }
    //参数添加
    public function actionAdd($classid=0){
        $model = new SlCanshu();
        $request = \Yii::$app->request;
        if ($request->isPost){
            $model->load($request->post(),'');
//            var_dump($model);die;
            if ($model->validate()){
                $model->save();
                return $this->redirect(Url::to(['index','classid'=>$classid]));
            }else{
                var_dump($model->getErrors());die;
            }
        }
        $parents = SlCanshu::find()->select(['id','u1'])->all();
//        var_dump($parents);die;
        return $this->render('add',['model'=>$model,'parents'=>$parents,'classid'=>$classid]);
    }
    //修改参数
    public function actionEdit($id){
        $model = SlCanshu::findOne(['id'=>$id]);
        $request = \Yii::$app->request;
        if ($request->isPost){
            $model->load($request->post(),'');
            if ($model->validate()){
                $model->save();
                return $this->redirect(['index']);
            }else{
                var_dump($model->getErrors());die;
            }
        }
        $parents = SlCanshu::find()->select(['id','u1'])->all();
        return $this->render('edit',['model'=>$model,'parents'=>$parents]);
    }
    //删除参数
    public function actionDel($id){
        $model = SlCanshu::findOne(['id'=>$id]);
        if ($model){
            $model->delete();
            return $this->redirect(['index']);
        }
    }
}