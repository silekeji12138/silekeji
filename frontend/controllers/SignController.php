<?php
/**
 * Created by PhpStorm.
 * User: M S I  LW 报名系统
 * Date: 2017/12/18
 * Time: 13:25
 */
namespace frontend\controllers;
use frontend\models\Action1;
use frontend\models\Sign;
use yii\rest\Action;
use yii\web\Controller;

class SignController extends Controller{
    public $enableCsrfValidation=false;
       public function actionSign(){  //参与活动的页面=>报名的页面
           $model=new Sign();
           $request=\Yii::$app->request;
           if ($request->isPost){
               $model->load($request->post(),'');
               if ($model->validate()){
                   $model->addtime=time()+3600*8;
                   $model->save();
                   var_dump(1110);die;
               }
           }
            return $this->render('sign');
       }
       public function actionIndex(){ //首页参加人数 访问人数 投票数量的显示
           $time=\frontend\models\Action::find()->select(['end'])->one();
           $model2=Action1::find()->select(['vote_num','view','join_num'])->where(['action_id'=>1])->asArray()->all();
           $model=Sign::find()->all();
           return $this->render('index',compact('model','model2','time'));
       }
       public function actionIntro($id){    //参加用户的详细信息
           $model=Sign::findOne($id);
           return $this->render('intro',compact('model'));
       }

}