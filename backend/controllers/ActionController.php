<?php
/**
 * Created by PhpStorm.
 * User: M S I
 * Date: 2017/12/15
 * Time: 15:25
 */
namespace backend\controllers;


use backend\models\Action;
use yii\helpers\Url;

class ActionController extends \yii\web\Controller{
    public function actionAction(){
        $model=Action::find()->all();
        return $this->render('action',compact('model'));
    }
    //添加活动
    public function actionAddAction(){
        $model=new Action();
        $request=\Yii::$app->request;
        if ($request->isPost){
            $model->load($request->post(),'');
            if ($model->validate()){
                $model->save();
                \Yii::$app->session->setFlash('success','添加成功');
                return $this->redirect(Url::to(['action/action']));
            }
        }
        return $this->render('addaction',compact('model'));
    }
    //删除活动
    public function actionDelAction($id){
        $model=Action::findOne($id);
        $model->delete();
        \Yii::$app->session->setFlash('success','添加成功');
        return $this->redirect(Url::to(['action/action']));
    }
    //修改活动
    public function actionEditAction($id){
        $model=Action::findOne($id);
        $request=\Yii::$app->request;
        if ($request->isPost){
            $model->load($request->post(),'');
            if ($model->validate()){
                $model->save();
                \Yii::$app->session->setFlash('success','修改成功');
                return $this->redirect(Url::to(['action/action']));
            }
        }
        return $this->render('editaction',compact('model'));
    }
}